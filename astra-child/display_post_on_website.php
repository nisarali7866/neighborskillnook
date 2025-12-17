<?php
/* Template Name: Display Skills */
get_header();
?>


<div class="skills-container" style="max-width:1200px;margin:100px auto;text-align:center;">

  <h1 style="font-size:40px;font-weight:700;margin-bottom:10px;">
    Find a Skilled individual to do the job
  </h1>
  <p style="font-size:18px;color:#555;margin-bottom:30px;">
    Your trusted platform to find reliable, skilled, and passionate people for every job.
  </p>

  <!-- Search + Filter Form -->
  <div class="skillconnect-search">
    <form method="get" action="<?php echo esc_url(get_permalink(get_the_ID())); ?>">


      <!-- Domain -->
      <select name="domain_filter" class="filter-select <?php
      echo (isset($_GET['domain_filter']) && $_GET['domain_filter'] !== '') ? 'active' : '';
      ?>">

        <option value="">Domain</option>
        <?php
        $terms = get_terms([
          'taxonomy' => 'domain',
          'hide_empty' => false,
        ]);
        if (!empty($terms)) {
          foreach ($terms as $term) {
            $selected = (isset($_GET['domain_filter']) && $_GET['domain_filter'] == $term->slug) ? 'selected' : '';
            echo '<option value="' . $term->slug . '" ' . $selected . '>' . $term->name . '</option>';
          }
        }
        ?>
      </select>

      <!-- Expertise -->
      <select name="expertise"
        class="filter-select <?php echo (isset($_GET['expertise']) && $_GET['expertise'] !== '') ? 'active' : ''; ?>">
        <option value="">Expertise</option>

        <!-- 1. Software & IT -->
        <option value="Software Engineer" data-domain="it" <?php echo (isset($_GET['expertise']) && $_GET['expertise'] == "Software Engineer") ? "selected" : ""; ?>>Software Engineer</option>
        <option value="Web Developer" data-domain="it" <?php echo (isset($_GET['expertise']) && $_GET['expertise'] == "Web Developer") ? "selected" : ""; ?>>Web Developer</option>
        <option value="Mobile App Developer" data-domain="it" <?php echo (isset($_GET['expertise']) && $_GET['expertise'] == "Mobile App Developer") ? "selected" : ""; ?>>Mobile App Developer</option>
        <option value="Data Scientist" data-domain="it" <?php echo (isset($_GET['expertise']) && $_GET['expertise'] == "Data Scientist") ? "selected" : ""; ?>>Data Scientist</option>
        <option value="Cybersecurity Specialist" data-domain="it" <?php echo (isset($_GET['expertise']) && $_GET['expertise'] == "Cybersecurity Specialist") ? "selected" : ""; ?>>Cybersecurity Specialist</option>
        <option value="Database Administrator" data-domain="it" <?php echo (isset($_GET['expertise']) && $_GET['expertise'] == "Database Administrator") ? "selected" : ""; ?>>Database Administrator</option>
        <option value="Cloud Engineer" data-domain="it" <?php echo (isset($_GET['expertise']) && $_GET['expertise'] == "Cloud Engineer") ? "selected" : ""; ?>>Cloud Engineer</option>
        <option value="AI / Machine Learning Engineer" data-domain="it" <?php echo (isset($_GET['expertise']) && $_GET['expertise'] == "AI / Machine Learning Engineer") ? "selected" : ""; ?>>AI / Machine Learning Engineer
        </option>
        <option value="IT Support Specialist" data-domain="it" <?php echo (isset($_GET['expertise']) && $_GET['expertise'] == "IT Support Specialist") ? "selected" : ""; ?>>IT Support Specialist</option>
        <option value="UI/UX Designer" data-domain="it" <?php echo (isset($_GET['expertise']) && $_GET['expertise'] == "UI/UX Designer") ? "selected" : ""; ?>>UI/UX Designer</option>

        <!-- 2. Healthcare & Medical -->
        <option value="Doctor" data-domain="healthcare-medical" <?php echo (isset($_GET['expertise']) && $_GET['expertise'] == "Doctor") ? "selected" : ""; ?>>Doctor</option>
        <option value="Dentist" data-domain="healthcare-medical" <?php echo (isset($_GET['expertise']) && $_GET['expertise'] == "Dentist") ? "selected" : ""; ?>>Dentist</option>
        <option value="Nurse" data-domain="healthcare-medical" <?php echo (isset($_GET['expertise']) && $_GET['expertise'] == "Nurse") ? "selected" : ""; ?>>Nurse</option>
        <option value="Pharmacist" data-domain="healthcare-medical" <?php echo (isset($_GET['expertise']) && $_GET['expertise'] == "Pharmacist") ? "selected" : ""; ?>>Pharmacist</option>
        <option value="Physiotherapist" data-domain="healthcare-medical" <?php echo (isset($_GET['expertise']) && $_GET['expertise'] == "Physiotherapist") ? "selected" : ""; ?>>Physiotherapist</option>
        <option value="Lab Technician" data-domain="healthcare-medical" <?php echo (isset($_GET['expertise']) && $_GET['expertise'] == "Lab Technician") ? "selected" : ""; ?>>Lab Technician</option>
        <option value="Radiologist" data-domain="healthcare-medical" <?php echo (isset($_GET['expertise']) && $_GET['expertise'] == "Radiologist") ? "selected" : ""; ?>>Radiologist</option>
        <option value="Paramedic" data-domain="healthcare-medical" <?php echo (isset($_GET['expertise']) && $_GET['expertise'] == "Paramedic") ? "selected" : ""; ?>>Paramedic</option>
        <option value="Nutritionist" data-domain="healthcare-medical" <?php echo (isset($_GET['expertise']) && $_GET['expertise'] == "Nutritionist") ? "selected" : ""; ?>>Nutritionist</option>
        <option value="Psychologist" data-domain="healthcare-medical" <?php echo (isset($_GET['expertise']) && $_GET['expertise'] == "Psychologist") ? "selected" : ""; ?>>Psychologist</option>

        <!-- 3. Trades & Technical -->
        <option value="Electrician" data-domain="trades-technical" <?php echo (isset($_GET['expertise']) && $_GET['expertise'] == "Electrician") ? "selected" : ""; ?>>Electrician</option>
        <option value="Plumber" data-domain="trades-technical" <?php echo (isset($_GET['expertise']) && $_GET['expertise'] == "Plumber") ? "selected" : ""; ?>>Plumber</option>
        <option value="Carpenter" data-domain="trades-technical" <?php echo (isset($_GET['expertise']) && $_GET['expertise'] == "Carpenter") ? "selected" : ""; ?>>Carpenter</option>
        <option value="Welder" data-domain="trades-technical" <?php echo (isset($_GET['expertise']) && $_GET['expertise'] == "Welder") ? "selected" : ""; ?>>Welder</option>
        <option value="Mechanic" data-domain="trades-technical" <?php echo (isset($_GET['expertise']) && $_GET['expertise'] == "Mechanic") ? "selected" : ""; ?>>Mechanic</option>
        <option value="HVAC Technician" data-domain="trades-technical" <?php echo (isset($_GET['expertise']) && $_GET['expertise'] == "HVAC Technician") ? "selected" : ""; ?>>HVAC Technician</option>
        <option value="Mason" data-domain="trades-technical" <?php echo (isset($_GET['expertise']) && $_GET['expertise'] == "Mason") ? "selected" : ""; ?>>Mason</option>
        <option value="Painter" data-domain="trades-technical" <?php echo (isset($_GET['expertise']) && $_GET['expertise'] == "Painter") ? "selected" : ""; ?>>Painter</option>
        <option value="Roofer" data-domain="trades-technical" <?php echo (isset($_GET['expertise']) && $_GET['expertise'] == "Roofer") ? "selected" : ""; ?>>Roofer</option>
        <option value="Auto Technician" data-domain="trades-technical" <?php echo (isset($_GET['expertise']) && $_GET['expertise'] == "Auto Technician") ? "selected" : ""; ?>>Auto Technician</option>

        <!-- 4. Education & Training -->
        <option value="School Teacher" data-domain="education-training" <?php echo (isset($_GET['expertise']) && $_GET['expertise'] == "School Teacher") ? "selected" : ""; ?>>School Teacher</option>
        <option value="College Lecturer" data-domain="education-training" <?php echo (isset($_GET['expertise']) && $_GET['expertise'] == "College Lecturer") ? "selected" : ""; ?>>College Lecturer</option>
        <option value="University Professor" data-domain="education-training" <?php echo (isset($_GET['expertise']) && $_GET['expertise'] == "University Professor") ? "selected" : ""; ?>>University Professor</option>
        <option value="Private Tutor" data-domain="education-training" <?php echo (isset($_GET['expertise']) && $_GET['expertise'] == "Private Tutor") ? "selected" : ""; ?>>Private Tutor</option>
        <option value="Language Instructor" data-domain="education-training" <?php echo (isset($_GET['expertise']) && $_GET['expertise'] == "Language Instructor") ? "selected" : ""; ?>>Language Instructor</option>
        <option value="Curriculum Designer" data-domain="education-training" <?php echo (isset($_GET['expertise']) && $_GET['expertise'] == "Curriculum Designer") ? "selected" : ""; ?>>Curriculum Designer</option>
        <option value="Special Education Teacher" data-domain="education-training" <?php echo (isset($_GET['expertise']) && $_GET['expertise'] == "Special Education Teacher") ? "selected" : ""; ?>>Special Education Teacher</option>
        <option value="Training Instructor" data-domain="education-training" <?php echo (isset($_GET['expertise']) && $_GET['expertise'] == "Training Instructor") ? "selected" : ""; ?>>Training Instructor</option>

        <!-- 5. Business & Administration -->
        <option value="Accountant" data-domain="business-administration" <?php echo (isset($_GET['expertise']) && $_GET['expertise'] == "Accountant") ? "selected" : ""; ?>>Accountant</option>
        <option value="HR Manager" data-domain="business-administration" <?php echo (isset($_GET['expertise']) && $_GET['expertise'] == "HR Manager") ? "selected" : ""; ?>>HR Manager</option>
        <option value="Marketing Executive" data-domain="business-administration" <?php echo (isset($_GET['expertise']) && $_GET['expertise'] == "Marketing Executive") ? "selected" : ""; ?>>Marketing Executive</option>
        <option value="Sales Representative" data-domain="business-administration" <?php echo (isset($_GET['expertise']) && $_GET['expertise'] == "Sales Representative") ? "selected" : ""; ?>>Sales Representative</option>
        <option value="Business Analyst" data-domain="business-administration" <?php echo (isset($_GET['expertise']) && $_GET['expertise'] == "Business Analyst") ? "selected" : ""; ?>>Business Analyst</option>
        <option value="Project Manager" data-domain="business-administration" <?php echo (isset($_GET['expertise']) && $_GET['expertise'] == "Project Manager") ? "selected" : ""; ?>>Project Manager</option>
        <option value="Customer Service Representative" data-domain="business-administration" <?php echo (isset($_GET['expertise']) && $_GET['expertise'] == "Customer Service Representative") ? "selected" : ""; ?>>
          Customer Service Representative</option>
        <option value="Financial Advisor" data-domain="business-administration" <?php echo (isset($_GET['expertise']) && $_GET['expertise'] == "Financial Advisor") ? "selected" : ""; ?>>Financial Advisor</option>
        <option value="Operations Manager" data-domain="business-administration" <?php echo (isset($_GET['expertise']) && $_GET['expertise'] == "Operations Manager") ? "selected" : ""; ?>>Operations Manager</option>

        <!-- 6. Creative & Media -->
        <option value="Graphic Designer" data-domain="creative-media" <?php echo (isset($_GET['expertise']) && $_GET['expertise'] == "Graphic Designer") ? "selected" : ""; ?>>Graphic Designer</option>
        <option value="Video Editor" data-domain="creative-media" <?php echo (isset($_GET['expertise']) && $_GET['expertise'] == "Video Editor") ? "selected" : ""; ?>>Video Editor</option>
        <option value="Animator" data-domain="creative-media" <?php echo (isset($_GET['expertise']) && $_GET['expertise'] == "Animator") ? "selected" : ""; ?>>Animator</option>
        <option value="Photographer" data-domain="creative-media" <?php echo (isset($_GET['expertise']) && $_GET['expertise'] == "Photographer") ? "selected" : ""; ?>>Photographer</option>
        <option value="Content Writer" data-domain="creative-media" <?php echo (isset($_GET['expertise']) && $_GET['expertise'] == "Content Writer") ? "selected" : ""; ?>>Content Writer</option>
        <option value="Social Media Manager" data-domain="creative-media" <?php echo (isset($_GET['expertise']) && $_GET['expertise'] == "Social Media Manager") ? "selected" : ""; ?>>Social Media Manager</option>
        <option value="Fashion Designer" data-domain="creative-media" <?php echo (isset($_GET['expertise']) && $_GET['expertise'] == "Fashion Designer") ? "selected" : ""; ?>>Fashion Designer</option>
        <option value="Interior Designer" data-domain="creative-media" <?php echo (isset($_GET['expertise']) && $_GET['expertise'] == "Interior Designer") ? "selected" : ""; ?>>Interior Designer</option>
        <option value="Music Producer" data-domain="creative-media" <?php echo (isset($_GET['expertise']) && $_GET['expertise'] == "Music Producer") ? "selected" : ""; ?>>Music Producer</option>

        <!-- 7. Law & Public Services -->
        <option value="Lawyer" data-domain="law-public-services" <?php echo (isset($_GET['expertise']) && $_GET['expertise'] == "Lawyer") ? "selected" : ""; ?>>Lawyer</option>
        <option value="Judge" data-domain="law-public-services" <?php echo (isset($_GET['expertise']) && $_GET['expertise'] == "Judge") ? "selected" : ""; ?>>Judge</option>
        <option value="Police Officer" data-domain="law-public-services" <?php echo (isset($_GET['expertise']) && $_GET['expertise'] == "Police Officer") ? "selected" : ""; ?>>Police Officer</option>
        <option value="Firefighter" data-domain="law-public-services" <?php echo (isset($_GET['expertise']) && $_GET['expertise'] == "Firefighter") ? "selected" : ""; ?>>Firefighter</option>
        <option value="Social Worker" data-domain="law-public-services" <?php echo (isset($_GET['expertise']) && $_GET['expertise'] == "Social Worker") ? "selected" : ""; ?>>Social Worker</option>
        <option value="Government Officer" data-domain="law-public-services" <?php echo (isset($_GET['expertise']) && $_GET['expertise'] == "Government Officer") ? "selected" : ""; ?>>Government Officer</option>
        <option value="Paralegal" data-domain="law-public-services" <?php echo (isset($_GET['expertise']) && $_GET['expertise'] == "Paralegal") ? "selected" : ""; ?>>Paralegal</option>

        <!-- 8. Science & Research -->
        <option value="Research Scientist" data-domain="science-research" <?php echo (isset($_GET['expertise']) && $_GET['expertise'] == "Research Scientist") ? "selected" : ""; ?>>Research Scientist</option>
        <option value="Chemist" data-domain="science-research" <?php echo (isset($_GET['expertise']) && $_GET['expertise'] == "Chemist") ? "selected" : ""; ?>>Chemist</option>
        <option value="Biologist" data-domain="science-research" <?php echo (isset($_GET['expertise']) && $_GET['expertise'] == "Biologist") ? "selected" : ""; ?>>Biologist</option>
        <option value="Environmental Scientist" data-domain="science-research" <?php echo (isset($_GET['expertise']) && $_GET['expertise'] == "Environmental Scientist") ? "selected" : ""; ?>>Environmental Scientist</option>
        <option value="Statistician" data-domain="science-research" <?php echo (isset($_GET['expertise']) && $_GET['expertise'] == "Statistician") ? "selected" : ""; ?>>Statistician</option>
        <option value="Lab Researcher" data-domain="science-research" <?php echo (isset($_GET['expertise']) && $_GET['expertise'] == "Lab Researcher") ? "selected" : ""; ?>>Lab Researcher</option>

        <!-- 9. Logistics & Transportation -->
        <option value="Driver" data-domain="logistics-transportation" <?php echo (isset($_GET['expertise']) && $_GET['expertise'] == "Driver") ? "selected" : ""; ?>>Driver</option>
        <option value="Pilot" data-domain="logistics-transportation" <?php echo (isset($_GET['expertise']) && $_GET['expertise'] == "Pilot") ? "selected" : ""; ?>>Pilot</option>
        <option value="Ship Captain" data-domain="logistics-transportation" <?php echo (isset($_GET['expertise']) && $_GET['expertise'] == "Ship Captain") ? "selected" : ""; ?>>Ship Captain</option>
        <option value="Logistics Coordinator" data-domain="logistics-transportation" <?php echo (isset($_GET['expertise']) && $_GET['expertise'] == "Logistics Coordinator") ? "selected" : ""; ?>>Logistics
          Coordinator</option>
        <option value="Warehouse Manager" data-domain="logistics-transportation" <?php echo (isset($_GET['expertise']) && $_GET['expertise'] == "Warehouse Manager") ? "selected" : ""; ?>>Warehouse Manager</option>
        <option value="Supply Chain Specialist" data-domain="logistics-transportation" <?php echo (isset($_GET['expertise']) && $_GET['expertise'] == "Supply Chain Specialist") ? "selected" : ""; ?>>Supply
          Chain Specialist</option>

        <!-- 10. Other Professions -->
        <option value="Entrepreneur" data-domain="other-professions" <?php echo (isset($_GET['expertise']) && $_GET['expertise'] == "Entrepreneur") ? "selected" : ""; ?>>Entrepreneur</option>
        <option value="Freelancer" data-domain="other-professions" <?php echo (isset($_GET['expertise']) && $_GET['expertise'] == "Freelancer") ? "selected" : ""; ?>>Freelancer</option>
        <option value="Consultant" data-domain="other-professions" <?php echo (isset($_GET['expertise']) && $_GET['expertise'] == "Consultant") ? "selected" : ""; ?>>Consultant</option>
        <option value="Volunteer Worker" data-domain="other-professions" <?php echo (isset($_GET['expertise']) && $_GET['expertise'] == "Volunteer Worker") ? "selected" : ""; ?>>Volunteer Worker</option>
        <option value="NGO Specialist" data-domain="other-professions" <?php echo (isset($_GET['expertise']) && $_GET['expertise'] == "NGO Specialist") ? "selected" : ""; ?>>NGO Specialist</option>

        <!-- 11 Engineering -->
        <option value="Aerospace" data-domain="engineering" <?php echo (isset($_GET['expertise']) && $_GET['expertise'] == "Aerospace") ? "selected" : ""; ?>>Aerospace</option>
        <option value="Chemical" data-domain="engineering" <?php echo (isset($_GET['expertise']) && $_GET['expertise'] == "Chemical") ? "selected" : ""; ?>>Chemical</option>
        <option value="Electrical" data-domain="engineering" <?php echo (isset($_GET['expertise']) && $_GET['expertise'] == "Electrical") ? "selected" : ""; ?>>Electrical</option>
        <option value="Electronic" data-domain="engineering" <?php echo (isset($_GET['expertise']) && $_GET['expertise'] == "Electronic") ? "selected" : ""; ?>>Electronic</option>
        <option value="Environmental" data-domain="engineering" <?php echo (isset($_GET['expertise']) && $_GET['expertise'] == "Environmental") ? "selected" : ""; ?>>Environmental</option>
        <option value="Mechanical" data-domain="engineering" <?php echo (isset($_GET['expertise']) && $_GET['expertise'] == "Mechanical") ? "selected" : ""; ?>>Mechanical</option>
        <option value="Software" data-domain="engineering" <?php echo (isset($_GET['expertise']) && $_GET['expertise'] == "Software") ? "selected" : ""; ?>>Software</option>
        <option value="Telecommunications" data-domain="engineering" <?php echo (isset($_GET['expertise']) && $_GET['expertise'] == "Telecommunications") ? "selected" : ""; ?>>Telecommunications</option>

        <!-- Other for each -->
        <option value="Other" data-domain="it" <?php echo (isset($_GET['expertise']) && $_GET['expertise'] == "Other") ? "selected" : ""; ?>>Other</option>
        <option value="Other" data-domain="healthcare-medical" <?php echo (isset($_GET['expertise']) && $_GET['expertise'] == "Other") ? "selected" : ""; ?>>Other</option>
        <option value="Other" data-domain="trades-technical" <?php echo (isset($_GET['expertise']) && $_GET['expertise'] == "Other") ? "selected" : ""; ?>>Other</option>
        <option value="Other" data-domain="education-training" <?php echo (isset($_GET['expertise']) && $_GET['expertise'] == "Other") ? "selected" : ""; ?>>Other</option>
        <option value="Other" data-domain="business-administration" <?php echo (isset($_GET['expertise']) && $_GET['expertise'] == "Other") ? "selected" : ""; ?>>Other</option>
        <option value="Other" data-domain="creative-media" <?php echo (isset($_GET['expertise']) && $_GET['expertise'] == "Other") ? "selected" : ""; ?>>Other</option>
        <option value="Other" data-domain="law-public-services" <?php echo (isset($_GET['expertise']) && $_GET['expertise'] == "Other") ? "selected" : ""; ?>>Other</option>
        <option value="Other" data-domain="science-research" <?php echo (isset($_GET['expertise']) && $_GET['expertise'] == "Other") ? "selected" : ""; ?>>Other</option>
        <option value="Other" data-domain="logistics-transportation" <?php echo (isset($_GET['expertise']) && $_GET['expertise'] == "Other") ? "selected" : ""; ?>>Other</option>
        <option value="Other" data-domain="other-professions" <?php echo (isset($_GET['expertise']) && $_GET['expertise'] == "Other") ? "selected" : ""; ?>>Other</option>
        <option value="Other" data-domain="engineering" <?php echo (isset($_GET['expertise']) && $_GET['expertise'] == "Other") ? "selected" : ""; ?>>Other</option>

        <!-- 12 Miscellaneous -->
        <option value="Other" data-domain="miscellaneous" <?php echo (isset($_GET['expertise']) && $_GET['expertise'] == "Other") ? "selected" : ""; ?>>Other</option>

      </select>


      <select name="zip_code" class="filter-select <?php
      echo (isset($_GET['zip_code']) && $_GET['zip_code'] !== '') ? 'active' : '';
      ?>">
        <option value="">Zip Code</option>
        <?php
        // Zip codes dynamically fetch karo
        global $wpdb;
        $zip_codes = $wpdb->get_col("
    SELECT DISTINCT meta_value 
    FROM {$wpdb->postmeta} 
    WHERE meta_key = 'secondary_contact' AND meta_value != ''
    ORDER BY meta_value ASC
");


        if ($zip_codes) {
          foreach ($zip_codes as $zip) {
            $selected = (isset($_GET['zip_code']) && $_GET['zip_code'] == $zip) ? 'selected' : '';
            echo '<option value="' . esc_attr($zip) . '" ' . $selected . '>' . esc_html($zip) . '</option>';
          }
        }
        ?>
      </select>



      <select name="experience" class="filter-select <?php
      echo (isset($_GET['experience']) && $_GET['experience'] !== '') ? 'active' : '';
      ?>">
        <option value="">Experience</option>
        <option value="1" <?php echo (isset($_GET['experience']) && $_GET['experience'] == "1") ? "selected" : ""; ?>>1+
          year
        </option>
        <option value="3" <?php echo (isset($_GET['experience']) && $_GET['experience'] == "3") ? "selected" : ""; ?>>3+
          years
        </option>
        <option value="5" <?php echo (isset($_GET['experience']) && $_GET['experience'] == "5") ? "selected" : ""; ?>>5+
          years
        </option>
      </select>

      <button type="submit" class="search-btn">Apply</button>
    </form>
  </div>

  <p style="margin:10px 0 40px 0;font-size:16px;">
    If you are a Service provider <a href="<?php echo esc_url(home_url('/form/')); ?>"
      style="color:#2563eb;text-decoration:none;">Click here</a>
  </p>

  <h2 class="section-title">Top Searches</h2>

  <div class="skills-grid">
    <?php
    $paged = (get_query_var('paged')) ? get_query_var('paged') : (get_query_var('page') ? get_query_var('page') : 1);


    $args = [
      'post_type' => 'skill',
      'posts_per_page' => 20,
      'paged' => $paged,
      'post_status' => 'publish',
    ];

    $meta_query = [];
    $tax_query = [];

    if (!empty($_GET['domain_filter'])) {
      $tax_query[] = [
        'taxonomy' => 'domain',
        'field' => 'slug',
        'terms' => sanitize_text_field($_GET['domain_filter']),
      ];
    }

    if (!empty($tax_query)) {
      $args['tax_query'] = [
        'relation' => 'AND',
        $tax_query[0]
      ];
    }
    if (!empty($_GET['expertise'])) {
      $meta_query[] = [
        'key' => 'expertise',
        'value' => sanitize_text_field($_GET['expertise']),
        'compare' => 'LIKE',
      ];
    }

    // zip_code filter YAHAN ADD KARO
    if (!empty($_GET['zip_code'])) {
      $meta_query[] = [
        'key' => 'secondary_contact', // ACF field ka naam
        'value' => sanitize_text_field($_GET['zip_code']),
        'compare' => '='
      ];
    }

    if (!empty($_GET['experience'])) {
      $meta_query[] = [
        'key' => 'years_of_experience',
        'value' => sanitize_text_field($_GET['experience']),
        'compare' => '>=',
        'type' => 'NUMERIC',
      ];
    }

    // Exclude hidden posts
    $meta_query[] = [
      'relation' => 'OR',
      [
        'key' => 'is_hidden',
        'compare' => 'NOT EXISTS'
      ],
      [
        'key' => 'is_hidden',
        'value' => '0',
        'compare' => '='
      ]
    ];


    if (!empty($meta_query))
      $args['meta_query'] = $meta_query;

    $query = new WP_Query($args);

    if ($query->have_posts()):
      while ($query->have_posts()):
        $query->the_post();
        $first = get_field('first_name');
        $middle = get_field('middle_name');
        $last = get_field('last_name');
        $full_name = trim($first . ' ' . ($middle ? $middle . ' ' : '') . $last);
        $domain = wp_get_post_terms(get_the_ID(), 'domain', ['fields' => 'names']);
        $zip_code = get_field('secondary_contact');
        $experience = get_field('years_of_experience');
        $profile_pic = get_field('profile_picture');
        $expertise = get_field('expertise');
        ?>


        <a href="<?php the_permalink(); ?>" class="skill-card">
          <div class="card-top">
            <?php if (!empty($profile_pic['url'])): ?>
              <img src="<?php echo esc_url($profile_pic['url']); ?>"
                alt="<?php echo esc_attr($full_name ?: get_the_title()); ?>">
            <?php endif; ?>

            <div class="card-info">
              <div class="name-domain">
                <h3><?php echo esc_html($full_name ?: get_the_title()); ?></h3>
                <?php if (!empty($domain)): ?>
                  <p class="domain"><?php echo esc_html(implode(', ', $domain)); ?></p>
                <?php endif; ?>
              </div>
            </div>
          </div>

          <?php if (!empty($expertise)): ?>
            <p class="skills">
              <?php
              $skills = (array) $expertise;
              $max_show = 4; // max 4 show hongi
              $shown = array_slice($skills, 0, $max_show);
              $hidden = array_slice($skills, $max_show);
              echo esc_html(implode(', ', $shown));
              ?>
              <?php if (!empty($hidden)): ?>
                <span class="more-skills" style="display:none;">
                  , <?php echo esc_html(implode(', ', $hidden)); ?>
                </span>
                <span class="more-toggle"> + more</span>
              <?php endif; ?>
            </p>
          <?php endif; ?>

          <div class="card-bottom">
            <?php if (!empty($zip_code)): ?>
              <span class="level" data-label="Zip Code:"><?php echo esc_html($zip_code); ?></span>
            <?php endif; ?>
            <?php if (!empty($experience)): ?>
              <span class="experience" data-label="Experience:"><?php echo esc_html($experience . ' yrs'); ?></span>
            <?php endif; ?>
            <button class="view-btn">View</button>
          </div>

        </a>
      <?php endwhile;

      echo '<div class="pagination-wrapper">';
      echo paginate_links(array(
        'total' => $query->max_num_pages,
        'current' => max(1, $paged),
        'mid_size' => 2,
        'prev_text' => __('« Prev'),
        'next_text' => __('Next »'),
        'add_args' => array(
          'domain_filter' => $_GET['domain_filter'] ?? '',
          'expertise' => $_GET['expertise'] ?? '',
          'zip_code' => $_GET['zip_code'] ?? '',
          'experience' => $_GET['experience'] ?? '',
        )
      ));
      echo '</div>';


      echo '</div>';

      wp_reset_postdata();
    else:
      echo '<p style="text-align:center;">No profile found.</p>';
    endif;
    ?>
  </div>
</div>


<style>
  .skillconnect-search select {
    position: relative !important;
    padding-right: 35px !important;
    -webkit-appearance: none !important;
    -moz-appearance: none !important;
    appearance: none !important;
    background: #f2f0f0ff url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="10" height="6"><path fill="%23666" d="M0 0l5 6 5-6z"/></svg>') no-repeat right 10px center !important;
    background-size: 10px 6px !important;
    height: 38px;
    line-height: 1.2;
  }


  /* Glassmorphism search bar */
  .skillconnect-search form {
    display: flex;
    gap: 10px;
    justify-content: center;
    background: #edeaeaff;
    /* light grey */
    padding: 12px 20px;
    border-radius: 30px;
    backdrop-filter: blur(8px);
  }

  .filter-select {
    padding: 5px 10px;
    border-radius: 15px;
    border: none;
    background: #f2f0f0ff;
    font-size: 14px;
    cursor: pointer;
    outline: none;
  }

  .search-btn {
    padding: 10px 20px;
    border-radius: 20px;
    border: none;
    background: #eba925ff;
    color: #edeaeaff;
    cursor: pointer;
    font-weight: 500;
  }

  .search-btn:hover {
    background: #1d4ed8;
  }

 
  .skills-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(370px, 1fr));
    gap: 30px;
    justify-items: center;

  }

  
  .skill-card {
    display: flex;
    flex-direction: column;
    background: #edeaeaff;
    border-radius: 16px;
    width: 100%;
    max-width: 500px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
    overflow: hidden;
    text-decoration: none;
    color: inherit;
    transition: all 0.3s ease;
    border: 1px solid #d1d1d1;
    
  }

  @media (max-width: 768px) {
    .skills-grid {
      grid-template-columns: 1fr;
    }
  }

  .skills-container {
    max-width: 1000px;
    width: 90%;
    margin: 0 auto;
  }

  .skill-card:hover {
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
    transform: translateY(-3px);
  }

  .card-top {
    display: flex;
    align-items: flex-start;
    gap: 12px;
    padding: 15px;
  }

  .card-top img {
    width: 60px;
    height: 60px;
    border-radius: 8px;
    object-fit: cover;
  }

  .card-info h3 {
    font-size: 20px;
    font-weight: 500;
    color: #262626ff;
    /* zyada readable dark gray */
    margin: 0 0 4px 0;
    text-align: left;
    line-height: 1.4;
    font-family: "Segoe UI", Arial, sans-serif;
    text-transform: capitalize;
  }

  .card-info .domain {
    font-size: 17px;
    font-weight: 500;
    color: #444444ff;
    margin: 0 0 4px 0;
    text-align: left;
    line-height: 1.4;
    font-family: "Segoe UI", Arial, sans-serif;
    text-transform: capitalize;
  }

  .skills {
    display: block;
    font-size: 15px;
    font-weight: 400;
    color: #444;
    margin: 0 15px 15px 15px;
    text-align: left;
    line-height: 1.4;
    font-family: "Segoe UI", Arial, sans-serif;
    text-transform: capitalize;

    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    
  }


  .more-toggle {
    color: #2563eb;
    /* thoda branded blue */
    cursor: pointer;
    font-weight: 500;
    margin-left: 5px;
    font-size: 12px;
  }

  .card-bottom {
    display: flex;
    font-size: 14px;
    font-weight: 500;
    color: #414651ff;
    /* zyada readable dark gray */
    margin: 0 0 4px 0;
    font-family: "Segoe UI", Arial, sans-serif;
    text-transform: capitalize;
    justify-content: space-between;
    align-items: left;
    padding: 10px 18px;
    /* padding increase kiya */
    min-height: 20px;
    border-top: 2px solid #474747ff;
  }

  .card-bottom span::before {
    content: attr(data-label) " ";
  }

  @media(max-width: 768px) {
    .card-bottom span::before {
      content: "";
      
    }
  }


  .view-btn {
    padding: 7px 12px;
    border-radius: 20px;
    border: none;
    background: #414651ff;
    color: #fff;
    font-size: 12px;
    cursor: pointer;
    transition: background 0.3s;
  }

  .view-btn:hover {
    background: #414651ff;
  }

  .section-title {
    font-size: 28px;
    font-weight: 700;
    color: #3e3e3eff;
    margin-bottom: 15px;
    text-align: left;
    position: relative;
    display: block;
    width: 100%;
   
  }

  .section-title::after {
    content: "";
    display: block;
    width: 80px;
    height: 4px;
    background-color: #facc15;
    margin-top: 5px;
    border-radius: 2px;
    
  }



 
  .pagination-wrapper {
    margin: 30px auto;
    text-align: center;
  }

  .pagination-wrapper .page-numbers {
    display: inline-block;
    margin: 0 5px;
    padding: 8px 14px;
    border-radius: 6px;
    background: #f3f4f6;
    color: #333;
    text-decoration: none;
    font-weight: 500;
  }

  .pagination-wrapper .page-numbers.current {
    background: #2563eb;
    color: #fff;
    font-weight: 700;
  }

  .pagination-wrapper .page-numbers:hover {
    background: #dbeafe;
    color: #2563eb;
  }

 
  @media (max-width: 768px) {
    .skillconnect-search form {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 10px;
      justify-items: stretch;
      padding: 12px 10px;
      border-radius: 20px;
      overflow: visible;
      background: #edeaeaff;
      backdrop-filter: blur(8px);
    }

    
    .skillconnect-search .search-btn {
      grid-column: 1 / -1;
      justify-self: center;
      width: 90%;
    }

    .filter-select {
      width: 100%;
      font-size: 14px;
    }
  }
</style>

<script>
  document.addEventListener("DOMContentLoaded", function () {
    const domainSelect = document.querySelector("select[name='domain_filter']");
    const expertiseSelect = document.querySelector("select[name='expertise']");
    const allOptions = Array.from(expertiseSelect.querySelectorAll("option")).filter(opt => opt.value !== "");

    function sortAndRender(options) {
      options.sort((a, b) => a.text.localeCompare(b.text));
      const unique = [];
      const seen = new Set();
      options.forEach(opt => {
        if (!seen.has(opt.value)) {
          unique.push(opt);
          seen.add(opt.value);
        }
      });

      expertiseSelect.innerHTML = '<option value="">Expertise</option>'; // placeholder first
      unique.forEach(opt => expertiseSelect.appendChild(opt));
    }

    function filterExpertise() {
      const selectedDomain = domainSelect.value;
      const currentValue = expertiseSelect.value; // store current user selection

      let filtered;
      if (!selectedDomain) {
        filtered = [...allOptions];
      } else {
        filtered = allOptions.filter(opt => opt.dataset.domain === selectedDomain);
      }

      sortAndRender(filtered);

      // restore previously selected value if still available
      if (currentValue && Array.from(expertiseSelect.options).some(opt => opt.value === currentValue)) {
        expertiseSelect.value = currentValue;
      } else {
        expertiseSelect.value = ""; 
      }
    }

    filterExpertise();

    domainSelect.addEventListener("change", filterExpertise);

    document.querySelectorAll(".more-toggle").forEach(function (btn) {
      btn.addEventListener("click", function () {
        let moreSkills = this.previousElementSibling;
        if (moreSkills.style.display === "none") {
          moreSkills.style.display = "inline";
          this.textContent = " - less";
        } else {
          moreSkills.style.display = "none";
          this.textContent = " + more";
        }
      });
    });
  });
</script>


<?php get_footer(); ?>