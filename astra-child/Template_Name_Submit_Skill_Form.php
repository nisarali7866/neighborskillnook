<?php
/* Template Name: Submit Skill Form */
acf_form_head();
get_header();
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">

        
        <?php the_content(); ?>

        <div class="skill-submit-wrapper">
            <div class="skill-submit-container">

                <h2>Offer your Services</h2>

                <?php if (isset($_GET['submitted']) && $_GET['submitted'] === 'true'): ?>
                    <div class="success-message">
                        ✅ Your Service has been submitted successfully! It will appear once approved by Nisar Ali
                        <div style="margin-top:15px;">
                            <div class="success-actions">
                                <a href="<?php echo home_url(); ?>" class="button-go-home">Go Back</a>
                            </div>
                        </div>
                    </div>
                <?php else: ?>

                    <?php
                    acf_form(array(
                        'post_id' => 'new_post',
                        'new_post' => array(
                            'post_type' => 'skill',
                            'post_status' => 'pending'
                        ),
                        'field_groups' => array('group_68a06d4fa13b3'),
                        'submit_value' => 'Submit',
                        'return' => add_query_arg('submitted', 'true', get_permalink()),
                        'html_before_fields' => '<div class="acf-fields-wrapper">',
                        'html_after_fields' => '</div>',
                        'field_wrapper' => '<div class="acf-field-wrapper">%s</div>',
                        'ajax' => false
                    ));
                    ?>

                <?php endif; ?>

            </div>
        </div>

    </main>
</div>

<a href="<?php echo home_url(); ?>" class="top-home-icon" aria-label="Home">
    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor"
        stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
        <path d="M3 12L12 3L21 12" /> 
        <path d="M5 12H19V21H5V12Z" />
        <path d="M10 21V15H14V21" /> 
    </svg>
</a>

<style>
    body {
        font-family: 'Poppins', sans-serif;
        background: #fffefeff;
        margin: 0;
        padding: 0;
    }

    .top-home-icon {
        position: absolute;
        top: 20px;
        right: 20px;
        z-index: 9999;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 30px;
        height: 30px;
        background: rgba(255, 255, 255, 0.95);
        border-radius: 30%;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        transition: all 0.3s ease;
        color: #333;
        backface-visibility: hidden;
        transform-style: preserve-3d;
    }

    .skill-submit-wrapper {
        position: relative;
        /* isse icon isi container ke hisab se place hoga */
    }

    .top-home-icon:hover {
        transform: scale(1.1);
        box-shadow: 0 6px 16px rgba(0, 0, 0, 0.2);
        color: #eba925ff;
    }
    /*desktop*/
    @media (min-width: 992px) {
        .top-home-icon {
            top: 30px;
            right: 40px;
        }
    }
    /*mob*/ 
    @media (max-width: 991px) {
        .top-home-icon {
            top: 40px;
            right: 65px;
        }
    }

    .skill-submit-wrapper {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 60px 15px;
        background: transparent;
        margin-top: 60px;
    }

    .skill-submit-container {
        width: 100%;
        max-width: 700px;
        padding: 40px;
        background: #fff;
        backdrop-filter: blur(10px);
        border-radius: 16px;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
        transition: all 0.3s ease;
        font-family: 'Segoe UI', sans-serif;
    }

    .skill-submit-container:hover {
        transform: translateY(-3px);
    }

    .skill-submit-container h2 {
        text-align: center;
        margin-bottom: 25px;
        font-size: 28px;
        font-weight: 700;
        color: #222;
        position: relative;
    }

    .skill-submit-container h2::after {
        content: "";
        display: block;
        width: 70px;
        height: 4px;
        background: #eba925ff;
        margin: 10px auto 0;
        border-radius: 3px;
    }

    .success-message {
        padding: 10px 15px;
        background: rgba(0, 204, 102, 0.1);
        border-left: 5px solid #00cc66;
        border-radius: 8px;
        margin-top: 15px;
        margin-bottom: 20px;
        color: #00aa55;
        font-weight: 500;
        text-align: center;
        line-height: 1.6;
        animation: fadeIn 0.6s ease-in-out;
    }

    .button-go-home {
        display: inline-block;
        margin: 5px 10px 0 0;
        padding: 10px 20px;
        background: #00cc66;
        color: #000;
        border-radius: 6px;
        text-decoration: none;
        font-weight: 600;
        transition: 0.3s ease;
    }

    .button-go-home:hover {
        background: #009944;
    }

    .acf-fields-wrapper {
        display: flex;
        flex-direction: column;
        gap: 22px;
    }

    .acf-field-wrapper label {
        font-size: 14px;
        font-weight: 600;
        color: #0c0c0c;
        margin-bottom: 6px;
        display: block;
    }

    .acf-field-wrapper input,
    .acf-field-wrapper select,
    .acf-field-wrapper textarea {
        width: 100%;
        padding: 12px 14px;
        font-size: 15px;
        border-radius: 10px;
        border: 1px solid #c5c4c4;
        background: rgba(255, 255, 255, 0.6);
        backdrop-filter: blur(6px);
        transition: all 0.3s ease;
        color: #121212 !important;
    }

    .acf-field-wrapper input:focus,
    .acf-field-wrapper select:focus,
    .acf-field-wrapper textarea:focus {
        border-color: #00cc66;
        box-shadow: 0 0 6px rgba(0, 204, 102, 0.15);
        outline: none;
    }

    .acf-form-submit input[type="submit"] {
        background: #00cc66;
        color: #000 !important;
        font-size: 16px;
        font-weight: 600;
        padding: 12px 26px;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        transition: all 0.3s ease;
        margin: 20px auto 0;
        display: block;
    }

    .acf-form-submit input[type="submit"]:hover {
        background: #009944;
        transform: scale(1.05);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(-5px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Agreement checkbox field ka gap thoda kam karne ke liye */
    .acf-field[data-key="field_68c6d030dfd9e"] {
        margin-top: 0px;
        margin-bottom: 15px;
    }
</style>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const bioField = document.querySelector('[name="acf[field_68a09b6619594]"]');
    if (!bioField) return;

    bioField.setAttribute("maxlength", "300");

    const counter = document.createElement("div");
    counter.style.fontSize = "13px";
    counter.style.marginTop = "5px";
    counter.style.color = "#d33";
    counter.textContent = `0 / 300`;
    bioField.parentNode.appendChild(counter);

    bioField.addEventListener("input", function () {
        const length = bioField.value.length; // raw length, spaces count honge
        counter.textContent = `${length} / 300`;

        if (length < 300) {
            counter.style.color = "#d33"; // red until 300
        } else {
            counter.style.color = "#28a745"; // green when exactly 300
        }
    });
});
</script>


<?php get_footer(); ?>