<?php
// Enqueue parent theme styles
add_action('wp_enqueue_scripts', 'astra_child_enqueue_styles');
function astra_child_enqueue_styles()
{
    wp_enqueue_style('astra-parent-style', get_template_directory_uri() . '/style.css');
}

//Register Custom Post Type: Skills
function register_skills_cpt()
{
    $labels = array(
        'name' => 'Skills',
        'singular_name' => 'Skill',
        'add_new' => 'Add New Skill',
        'add_new_item' => 'Add New Skill',
        'edit_item' => 'Edit Skill',
        'new_item' => 'New Skill',
        'all_items' => 'All Skills',
        'view_item' => 'View Skill',
        'search_items' => 'Search Skills',
        'not_found' => 'No Skills found',
        'not_found_in_trash' => 'No Skills found in Trash',
        'menu_name' => 'Skills'
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'skills'),
        'supports' => array('title', 'editor', 'thumbnail'),
        'show_in_rest' => true,
    );

    register_post_type('skill', $args);
}
add_action('init', 'register_skills_cpt');

// Register "Hide Post" meta
function register_skill_hide_meta()
{
    register_post_meta('skill', 'is_hidden', [
        'show_in_rest' => true,
        'single' => true,
        'type' => 'boolean',
        'default' => false,
    ]);
}
add_action('init', 'register_skill_hide_meta');

// Add meta box for "Hide Post" in admin
function skill_hide_meta_box()
{
    add_meta_box(
        'skill_hide_box',
        'Hide Post',
        'skill_hide_meta_box_callback',
        'skill',
        'side',
        'default'
    );
}
add_action('add_meta_boxes', 'skill_hide_meta_box');

function skill_hide_meta_box_callback($post)
{
    $is_hidden = get_post_meta($post->ID, 'is_hidden', true);
    ?>
    <label>
        <input type="checkbox" name="is_hidden" value="1" <?php checked($is_hidden, 1); ?> />
        Hide this skill
    </label>
    <?php
}

function save_skill_hide_meta($post_id)
{
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
        return;

    $value = isset($_POST['is_hidden']) ? 1 : 0;
    update_post_meta($post_id, 'is_hidden', $value);
}
add_action('save_post', 'save_skill_hide_meta');

//Add "Hidden" column with toggle in admin list
function skill_add_hidden_column($columns)
{
    $columns['is_hidden'] = 'Hidden';
    return $columns;
}
add_filter('manage_skill_posts_columns', 'skill_add_hidden_column');

function skill_hidden_column_content($column, $post_id)
{
    if ($column == 'is_hidden') {
        $is_hidden = get_post_meta($post_id, 'is_hidden', true);
        $action = $is_hidden ? 'Unhide' : 'Hide';
        $nonce = wp_create_nonce('skill_hide_toggle_' . $post_id);
        $url = admin_url("admin-post.php?action=toggle_skill_hide&post_id={$post_id}&nonce={$nonce}");
        echo $is_hidden ? "<strong>Yes</strong> | <a href='{$url}'>$action</a>" : "No | <a href='{$url}'>$action</a>";
    }
}
add_action('manage_skill_posts_custom_column', 'skill_hidden_column_content', 10, 2);

// Handle toggle
function toggle_skill_hide()
{
    if (!isset($_GET['post_id'], $_GET['nonce']))
        wp_die('Invalid request');
    $post_id = intval($_GET['post_id']);
    $nonce = $_GET['nonce'];
    if (!wp_verify_nonce($nonce, 'skill_hide_toggle_' . $post_id))
        wp_die('Security check failed');
    $current = get_post_meta($post_id, 'is_hidden', true);
    update_post_meta($post_id, 'is_hidden', $current ? 0 : 1);
    wp_redirect(wp_get_referer());
    exit;
}
add_action('admin_post_toggle_skill_hide', 'toggle_skill_hide');

//Register Taxonomy: Domain (Skill Categories)
function register_skill_categories_taxonomy()
{
    $labels = array(
        'name' => 'Domains',
        'singular_name' => 'Domain',
        'search_items' => 'Search Domains',
        'all_items' => 'All Domains',
        'parent_item' => 'Parent Domain',
        'parent_item_colon' => 'Parent Domain:',
        'edit_item' => 'Edit Domain',
        'update_item' => 'Update Domain',
        'add_new_item' => 'Add New Domain',
        'new_item_name' => 'New Domain Name',
        'menu_name' => 'Domains',
    );

    $args = array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'rewrite' => array('slug' => 'domain'),
        'show_in_rest' => true,
    );

    register_taxonomy('domain', array('skill'), $args);
}
add_action('init', 'register_skill_categories_taxonomy');


//Enforce minimum 300 characters on "short_bio"
add_filter('acf/validate_value/key=field_68a09b6619594', function ($valid, $value, $field, $input) {
    if ($valid !== true) return $valid;

    // Direct raw strlen check, no trim, no space collapse
    if (strlen($value) < 300) {
        return '⚠️ Short bio must be at least 300 characters long.';
    }

    return $valid;
}, 10, 4);



//Custom message for Agreement Checkbox
add_filter('acf/validate_value/key=field_68c6d030dfd9e', function ($valid, $value, $field, $input) {
    if ($valid !== true) {
        return '⚠️ Please agree to continue';
    }
    return $valid;
}, 10, 4);


//Set CPT title to user email on form submission
add_action('acf/save_post', 'set_skill_title_from_email', 20);
function set_skill_title_from_email($post_id)
{
    if (get_post_type($post_id) != 'skill')
        return;
    $email = get_post_meta($post_id, 'email_address', true);
    if ($email) {
        wp_update_post(['ID' => $post_id, 'post_title' => sanitize_email($email)]);
    }
}
// Add a "Publish" column to Skills CPT admin list

add_filter('manage_skill_posts_columns', 'add_publish_column');
function add_publish_column($columns)
{
    $columns['quick_publish'] = 'Publish';
    return $columns;
}

// Fill the "Publish" column
add_action('manage_skill_posts_custom_column', 'publish_column_content', 10, 2);
function publish_column_content($column, $post_id)
{
    if ($column === 'quick_publish') {
        $post = get_post($post_id);
        if ($post->post_status === 'pending') {

            echo '<a href="' . wp_nonce_url(
                admin_url('admin-post.php?action=quick_publish&post_id=' . $post_id),
                'quick_publish_' . $post_id
            ) . '" class="button button-primary">Publish</a>';
        } else {
            echo 'Published';
        }
    }
}


// Handle the quick publish action
add_action('admin_post_quick_publish', 'handle_quick_publish');
function handle_quick_publish()
{
    if (!isset($_GET['post_id']))
        wp_die('No post specified.');

    $post_id = intval($_GET['post_id']);
    if (!current_user_can('edit_post', $post_id))
        wp_die('You cannot edit this post.');

    check_admin_referer('quick_publish_' . $post_id);

    wp_update_post(array(
        'ID' => $post_id,
        'post_status' => 'publish'
    ));

    wp_redirect(admin_url('edit.php?post_type=skill'));
    exit;
}

// Optional: Make column sortable (nice for large lists)
add_filter('manage_edit-skill_sortable_columns', function ($columns) {
    $columns['quick_publish'] = 'quick_publish';
    return $columns;
});
// Exclude hidden Skills posts from frontend
function exclude_hidden_skills_from_frontend($query)
{
    if (!is_admin() && $query->is_main_query() && (is_post_type_archive('skill') || is_tax('domain'))) {
        $meta_query = array(
            array(
                'key' => 'is_hidden',
                'value' => '1',
                'compare' => '!=',
            ),
            array(
                'relation' => 'OR',
                array(
                    'key' => 'is_hidden',
                    'compare' => 'NOT EXISTS'
                ),
                array(
                    'key' => 'is_hidden',
                    'value' => '0',
                    'compare' => '='
                )
            )
        );
        $query->set('meta_query', $meta_query);
    }
}
add_action('pre_get_posts', 'exclude_hidden_skills_from_frontend');


// EMAIL SENDING FUNCTION

add_action('acf/save_post', 'send_skill_submission_email_to_admin', 20);
function send_skill_submission_email_to_admin($post_id)
{
    if (get_post_type($post_id) !== 'skill') {
        return;
    }

    
    $first_name = get_field('first_name', $post_id);
    $middle_name = get_field('middle_name', $post_id);
    $last_name = get_field('last_name', $post_id);
    $user_name = trim($first_name . ' ' . $middle_name . ' ' . $last_name);

    $user_email = get_field('email_address', $post_id);

    
    $domain_field = get_field('domain', $post_id);
    if ($domain_field instanceof WP_Term) {
        $domain = $domain_field->name;
    } elseif (is_array($domain_field) && isset($domain_field['label'])) {
        $domain = $domain_field['label'];
    } else {
        $domain = (string) $domain_field;
    }

    $expertise_field = get_field('expertise', $post_id);
    if (is_array($expertise_field)) {
        $expertise = implode(', ', $expertise_field);
    } else {
        $expertise = (string) $expertise_field;
    }

    $skills_list_url = admin_url('edit.php?post_type=skill');

    $subject = 'New Skill Submission Received';
    $message = "
    <html>
    <body style='font-family: Arial, sans-serif; line-height: 1.5; color: #333;'>
        <p><strong>Name:</strong> " . (!empty($user_name) ? $user_name : '<em>Not provided</em>') . "</p>
        <p><strong>Email:</strong> " . (!empty($user_email) ? $user_email : '<em>Not provided</em>') . "</p>
        <p><strong>Domain:</strong> " . (!empty($domain) ? $domain : '<em>Not provided</em>') . "</p>
        <p><strong>Expertise:</strong> " . (!empty($expertise) ? $expertise : '<em>Not provided</em>') . "</p>

        <p style='margin-top:20px;'>
            <a href='{$skills_list_url}' style='background-color:#0073aa;color:#fff;padding:10px 16px;text-decoration:none;border-radius:5px;display:inline-block;font-weight:bold;'>
                View in dashboard
            </a>
        </p>
    </body>
    </html>";

    $headers = [
        "X-User-Email: {$user_email}",
        "Content-Type: text/html; charset=UTF-8"
    ];
    wp_mail('contact@neighborskillnook.com', $subject, $message, $headers); 
    wp_mail('sabrinamanahilsmw@gmail.com', $subject, $message, $headers);
}


// Notify user when admin publishes their Skill post
add_action('transition_post_status', 'notify_user_on_publish', 10, 3);
function notify_user_on_publish($new_status, $old_status, $post)
{
    if ($post->post_type !== 'skill') {
        return;
    }

    if ($old_status === 'pending' && $new_status === 'publish') {
        $post_id = $post->ID;
        $user_email = get_field('email_address', $post_id);

        $first_name = get_field('first_name', $post_id);
        $middle_name = get_field('middle_name', $post_id);
        $last_name = get_field('last_name', $post_id);
        $user_name = trim($first_name . ' ' . $middle_name . ' ' . $last_name);

        if (empty($user_email)) {
            return; // no email = no notification
        }

        $post_link = get_permalink($post_id);

        $subject = "Congratulations! Your Skill Profile is Now Live";
        $message = "
        <html>
        <body style='font-family: Arial, sans-serif; line-height: 1.6; color: #333;'>
            <p>Hi " . (!empty($user_name) ? $user_name : 'there') . ",</p>
            <p>Good news! Your skill submission has been viewed by Nisar Ali and is now visible on website.</p>

            <p style='margin-top:20px;'>
                <a href='{$post_link}' style='background-color:#28a745;color:#fff;padding:12px 20px;text-decoration:none;border-radius:5px;display:inline-block;font-weight:bold;'>
                    View Your Profile
                </a>
            </p>

            <p>Thank you for contributing your expertise!</p>
        </body>
        </html>";

        $headers = ["Content-Type: text/html; charset=UTF-8"];

        wp_mail($user_email, $subject, $message, $headers);
    }
}


add_filter('acf/validate_value', 'custom_required_field_validation', 10, 4);
function custom_required_field_validation($valid, $value, $field, $input) {

    // Agar already invalid ho, return
    if (!$valid) return $valid;

    // REQUIRED FIELD CHECK sab ke liye same message
    if ($field['required'] && empty($value)) {
        return '⚠️ Please fill out this field.';
    }

    
    $name_fields = ['first_name', 'middle_name', 'last_name'];
    if (in_array($field['name'], $name_fields) && !empty($value)) {
        if (!preg_match('/^[a-zA-Z\s]+$/', $value)) {
            return "Please enter a valid name.";
        }
    }

    // Phone number validation
    $contact_fields = ['primary_contact']; // Make it an array
    if (in_array($field['name'], $contact_fields) && !empty($value)) {
        if (!preg_match('/^\d{3}-\d{3}-\d{4}$/', $value)) {
            return "Please enter a valid phone number in the format 123-456-7890.";
        }
    }

    // ZIP code validation
    $zip_fields = ['secondary_contact'];
    if (in_array($field['name'], $zip_fields) && !empty($value)) {
        if (!preg_match('/^\d{5}$/', $value)) {
            return "Please enter a valid 5-digit ZIP code.";
        }
    }

    return $valid;
}

add_action('acf/input/admin_footer', function () {
    ?>
    <script type="text/javascript">
    (function($){
        // Jab bhi ACF ka datepicker load ho
        acf.add_filter('date_picker_args', function(args, $field){
            if($field.data('name') === 'date_of_birth'){ 
                args.maxDate = 0; // 0 = aaj tak, future block
            }
            return args;
        });
    })(jQuery);
    </script>
    <?php
});


?>