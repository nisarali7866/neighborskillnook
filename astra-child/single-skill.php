<?php
/* Single Template for Skill CPT */
get_header();

if (have_posts()):
    while (have_posts()):
        the_post();

        $first = get_field('first_name');
        $middle = get_field('middle_name');
        $last = get_field('last_name');
        $full_name = trim($first . ' ' . ($middle ? $middle . ' ' : '') . $last);

        $gender = get_field('gender');
        $dob = get_field('date_of_birth');
        $email = get_field('email_address');
        $primary = get_field('primary_contact');
        $secondary = get_field('secondary_contact');
        $profile_pic = get_field('profile_picture');
        $bio = get_field('short_bio');
        $domain = get_field('domain');
        $skills = get_field('expertise');
        $skill_level = get_field('level');
        $years = get_field('years_of_experience');
        $certifications = get_field('certificates_optional');
        $resume = get_field('resume_optional');
        ?>


        <a href="<?php echo home_url(); ?>" class="top-home-icon" aria-label="Home">
            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" vector-effect="non-scaling-stroke">
                <path d="M3 12L12 3L21 12" />
                <path d="M5 12H19V21H5V12Z" />
                <path d="M10 21V15H14V21" />
            </svg>
        </a>
        <style>
            html,
            body {
                max-width: 100%;
                overflow-x: hidden;
            }


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

            /* Main Container */
            .profile-container {
                max-width: 1000px;
                margin: 50px auto;
                background: rgba(250, 246, 246, 1);
                border-radius: 16px;
                padding: 40px 50px;
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
                margin-top: 100px;
            }


            .profile-header {
                display: flex;
                align-items: center;
                gap: 30px;
                flex-wrap: wrap;
                margin-bottom: 40px;
            }

            .profile-info {
                flex: 1;
            }

            .profile-info h1 {
                font-size: 36px;
                margin: 0 0 12px 0;
                color: #222;
            }

            .profile-info p {
                font-size: 15px;
                margin: 6px 0;
                color: #555;
            }

            .profile-info a {
                color: #0073aa;
                text-decoration: none;
                transition: color 0.3s;
            }

            .profile-info a:hover {
                color: #005177;
            }


            .section-title {
                font-size: 18px;
                font-weight: 700;
                color: #222;
                margin-bottom: 12px;
            }


            .section-separator {
                height: 1px;
                background: #ddd;
                margin: 35px 0;
            }


            .bio {
                margin-bottom: 30px;
                line-height: 1.8;
                color: #444;
            }


            .info-row {
                display: grid;
                gap: 20px;
                margin-bottom: 20px;
            }


            .info-top-row {
                grid-template-columns: repeat(3, 1fr);
            }


            .skills-row .tag-container {
                display: flex;
                flex-wrap: wrap;
                gap: 10px;
            }


            .info-block {
                background: #f8f7f7;
                border-radius: 12px;
                padding: 20px;
                box-shadow: 0 6px 15px rgba(0, 0, 0, 0.05);
                display: flex;
                flex-direction: column;
                justify-content: space-between;
                transition: transform 0.3s, box-shadow 0.3s;
            }

            .info-block:hover {
                transform: translateY(-4px);
                box-shadow: 0 12px 20px rgba(0, 0, 0, 0.1);
            }


            .tag {
                display: inline-block;
                background: linear-gradient(135deg, #f1c40f, #f39c12);
                color: #fff;
                padding: 6px 14px;
                border-radius: 14px;
                font-size: 13px;
                margin: 4px 0;
                transition: transform 0.2s, box-shadow 0.2s;
            }

            .tag:hover {
                transform: scale(1.05);
                box-shadow: 0 3px 8px rgba(0, 0, 0, 0.15);
            }


            .button-link {
                display: inline-block;
                background: linear-gradient(90deg, #f1c40f, #f39c12);
                color: #fff;
                text-decoration: none;
                padding: 12px 25px;
                border-radius: 12px;
                transition: transform 0.3s, box-shadow 0.3s;
                font-size: 14px;
                font-weight: 600;
                text-align: center;
                min-width: 150px;
            }

            .button-link:hover {
                transform: scale(1.05);
                box-shadow: 0 6px 14px rgba(0, 0, 0, 0.2);
            }


            .cert-resume-row {
                display: flex;
                gap: 20px;
                margin-top: 25px;
            }


            @media (max-width: 768px) {
                .profile-container {
                    padding: 20px 15px;
                }

                .profile-header {
                    flex-direction: column;
                    align-items: center;
                    gap: 10px;
                }

                .profile-info h1 {
                    text-align: center;
                }

                .info-top-row {
                    grid-template-columns: 1fr !important;
                }


                .skills-row,
                .section-separator {
                    margin: 20px 0;

                }

                .info-row {
                    margin-bottom: 10px;

                }

                .bio {
                    margin-bottom: 15px;
                    /* kam gap for mobile */
                }

                .cert-resume-row {
                    margin-top: 15px;
                }

                .cert-resume-row {
                    flex-direction: column;
                    gap: 10px;
                }

                .tag-container {
                    justify-content: flex-start;
                }
            }


            @keyframes fadeSlideUp {
                0% {
                    opacity: 0;
                    transform: translateY(20px);
                }

                100% {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            @keyframes tagPop {
                0% {
                    opacity: 0;
                    transform: scale(0.5);
                }

                100% {
                    opacity: 1;
                    transform: scale(1);
                }
            }


            .info-block {
                background: #f8f7f7;
                border-radius: 12px;
                padding: 20px;
                box-shadow: 0 6px 15px rgba(0, 0, 0, 0.05);
                display: flex;
                flex-direction: column;
                justify-content: space-between;
                transition: transform 0.3s, box-shadow 0.3s;
                opacity: 0;
                animation: fadeSlideUp 0.8s forwards;
            }

            .info-block:hover {
                transform: translateY(-4px);
                box-shadow: 0 12px 20px rgba(0, 0, 0, 0.1);
            }

            /* Stagger animation for multiple blocks */
            .info-top-row .info-block:nth-child(1) {
                animation-delay: 0.1s;
            }

            .info-top-row .info-block:nth-child(2) {
                animation-delay: 0.3s;
            }

            .info-top-row .info-block:nth-child(3) {
                animation-delay: 0.5s;
            }

            .skills-row .info-block {
                animation-delay: 0.7s;
            }

            /* Tags Animation */
            .tag {
                display: inline-block;
                background: linear-gradient(135deg, #f1c40f, #f39c12);
                color: #fff;
                padding: 6px 14px;
                border-radius: 14px;
                font-size: 13px;
                margin: 4px 0;
                transition: transform 0.2s, box-shadow 0.2s;
                opacity: 0;
                animation: tagPop 0.5s forwards;
            }

            .tag:nth-child(1) {
                animation-delay: 0.8s;
            }

            .tag:nth-child(2) {
                animation-delay: 0.9s;
            }

            .tag:nth-child(3) {
                animation-delay: 1s;
            }

            .tag:nth-child(4) {
                animation-delay: 1.1s;
            }

            .tag:nth-child(5) {
                animation-delay: 1.2s;
            }


            .button-link {
                display: inline-block;
                background: linear-gradient(90deg, #f1c40f, #f39c12);
                color: #fff;
                text-decoration: none;
                padding: 12px 25px;
                border-radius: 12px;
                font-size: 14px;
                font-weight: 600;
                text-align: center;
                min-width: 150px;
                transition: transform 0.4s cubic-bezier(0.34, 1.56, 0.64, 1), box-shadow 0.3s;
            }

            .button-link:hover {
                transform: scale(1.08);
                box-shadow: 0 8px 18px rgba(0, 0, 0, 0.25);
            }


            .profile-container {
                opacity: 0;
                animation: fadeSlideUp 1s forwards;
            }


            @media (max-width: 768px) {
                .profile-header {
                    flex-direction: column;
                    align-items: center;
                    gap: 20px;
                }

                .profile-info h1 {
                    text-align: center;
                }

                .info-top-row {
                    grid-template-columns: 1fr !important;
                }

                .info-row,
                .skills-row,
                .cert-resume-row,
                .bio {
                    padding: 10px 5px;
                }

                .cert-resume-row {
                    flex-direction: column;
                    gap: 15px;
                }

                .tag-container {
                    justify-content: flex-start;
                }
            }

            .bio p {
                opacity: 0;
                transform: translateY(15px);
                animation: fadeSlide 0.8s 0.6s forwards;
            }


            @keyframes fadeSlide {
                0% {
                    opacity: 0;
                    transform: translateY(15px);
                }

                100% {
                    opacity: 1;
                    transform: translateY(0);
                }
            }


            .info-block {
                opacity: 0;
                transform: translateY(15px);
                animation: fadeSlide 0.8s forwards;
            }


            .info-top-row .info-block:nth-child(1) {
                animation-delay: 0.2s;
            }

            .info-top-row .info-block:nth-child(2) {
                animation-delay: 0.4s;
            }

            .info-top-row .info-block:nth-child(3) {
                animation-delay: 0.6s;
            }

            .skills-row .info-block {
                animation-delay: 0.8s;
            }

            .cert-resume-row a {
                animation: fadeSlide 0.8s 1s forwards;
            }


            .bio p {
                opacity: 0;
                transform: translateY(15px);
                animation: fadeSlide 0.8s 0.6s forwards;
            }

            .profile-header img {
                width: 200px;
                height: 200px;
                border-radius: 20%;
                object-fit: cover;
                border: 4px solid #eba925ff;
                box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            }

            .profile-header img:hover {
                transform: scale(1.05);
                transition: transform 0.4s ease;
                box-shadow: 0 0 25px rgba(255, 200, 50, 0.6);
            }

            .profile-header img {
                opacity: 0;
                transform: translateY(-30px);
                animation: fadeSlide 0.8s forwards;
            }

            @keyframes fadeSlide {
                0% {
                    opacity: 0;
                    transform: translateY(-30px);
                }

                100% {
                    opacity: 1;
                    transform: translateY(0);
                }
            }
        </style>

        <div class="profile-container">


            <div class="profile-header">
                <?php if ($profile_pic): ?>
                    <img src="<?php echo esc_url($profile_pic['url']); ?>"
                        alt="<?php echo esc_attr($full_name ?: get_the_title()); ?>">
                <?php endif; ?>
                <div class="profile-info">
                    <h1><?php echo esc_html(ucwords(strtolower($full_name ?: get_the_title()))); ?></h1>
                    <?php if ($gender): ?>
                        <p><strong>Gender:</strong> <?php echo esc_html($gender); ?></p><?php endif; ?>
                    <?php if ($dob): ?>
                        <p><strong>DOB:</strong> <?php echo esc_html($dob); ?></p><?php endif; ?>
                    <?php if ($secondary): ?>
                        <p><strong>Zip code:</strong> <?php echo esc_html($secondary); ?></p><?php endif; ?>
                    <?php if ($primary): ?>
                        <p><strong>Phone number:</strong> <?php echo esc_html($primary); ?></p><?php endif; ?>
                    <?php if ($email): ?>
                        <p><strong>Email:</strong> <a
                                href="mailto:<?php echo esc_attr($email); ?>"><?php echo esc_html($email); ?></a></p><?php endif; ?>

                </div>
            </div>

            <div class="section-separator"></div>


            <?php if ($bio): ?>
                <div class="bio">
                    <div class="section-title">Bio</div>
                    <p><?php echo esc_html($bio); ?></p>
                </div>
                <div class="section-separator"></div>
            <?php endif; ?>


            <div class="info-row info-top-row">
                <?php if ($domain): ?>
                    <div class="info-block">
                        <div class="section-title">Domain</div>
                        <div class="tag-container">
                            <?php
                            if (is_array($domain)) {
                                foreach ($domain as $d)
                                    echo '<span class="tag">' . esc_html($d->name) . '</span>';
                            } else
                                echo '<span class="tag">' . esc_html($domain->name ?? $domain) . '</span>';
                            ?>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if ($skill_level): ?>
                    <div class="info-block">
                        <div class="section-title">Expertise Level</div>
                        <p><?php echo esc_html($skill_level); ?></p>
                    </div>
                <?php endif; ?>

                <?php if ($years): ?>
                    <div class="info-block">
                        <div class="section-title">Years of Experience</div>
                        <p><?php echo esc_html($years); ?></p>
                    </div>
                <?php endif; ?>
            </div>


            <?php if ($skills): ?>
                <div class="info-row skills-row">
                    <div class="info-block" style="flex:1">
                        <div class="section-title">Skills</div>
                        <div class="tag-container">
                            <?php foreach ($skills as $skill)
                                echo '<span class="tag">' . esc_html($skill) . '</span>'; ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <div class="section-separator"></div>


            <div class="info-row cert-resume-row">
                <?php if ($certifications): ?>
                    <a class="button-link" href="<?php echo esc_url($certifications['url']); ?>" target="_blank" rel="noopener">View
                        Certificate</a>
                <?php endif; ?>

                <?php if ($resume): ?>
                    <a class="button-link" href="<?php echo esc_url($resume['url']); ?>" target="_blank" rel="noopener">View
                        Resume</a>
                <?php endif; ?>
            </div>

        </div>

        <?php
    endwhile;
endif;
get_footer();
?>