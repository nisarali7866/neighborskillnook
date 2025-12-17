<?php
if (!defined('ABSPATH')) {
    exit;
}
?>

</div>

<footer class="site-footer">
    <style>
        .site-footer {
            background: #eba925ff;
            padding: 60px 20px 30px;
            font-family: 'Roboto', Arial, sans-serif;
            color: #333;
        }

        .footer-container {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            flex-wrap: wrap;
            gap: 150px;
            
        }

        .footer-left,
        .footer-right {
            flex: 1;
            min-width: 280px;
        }

        
        .footer-left h3,
        .footer-right h3 {
            margin-bottom: 18px;
            font-size: 20px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #222;
            border-bottom: 2px solid rgba(0, 0, 0, 0.3);
            display: inline-block;
            padding-bottom: 5px;
        }

        
        .footer-left p {
            font-size: 15px;
            line-height: 2.5;
            text-align: justify;
            color: #222;
        }

        
        .footer-tagline {
            margin-top: 12px;
            font-style: italic;
            font-weight: 600;
            color: #111;
            display: block;
            font-size: 16px;
            border-left: 3px solid #222;
            padding-left: 8px;
        }

        
        .footer-contact p,
        .footer-links p {
            margin: 6px 0;
        }

        .footer-links a,
        .footer-contact a {
            color: #333;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .footer-links a:hover,
        .footer-contact a:hover {
            color: #000;
            text-decoration: underline;
        }

        
        .footer-right {
            display: flex;
            flex-direction: column;
            gap: 30px;
        }

        
        .footer-bottom {
            text-align: center;
            margin-top: 50px;
            font-size: 13px;
            color: #333;
            border-top: 1px solid rgba(0, 0, 0, 0.1);
            padding-top: 15px;
        }

        @media (max-width: 768px) {
            .footer-container {
                flex-direction: column;
                gap: 40px;
                
            }
        }
    </style>

    <div class="footer-container">

        
        <div class="footer-left">
            <h3>About Me</h3>
            <p>
                Meet Nisar Ali a neighbor who’s always willing to help. Whether it’s lending a hand, sharing
                knowledge, or creating new opportunities, he cares deeply about the success of his community. That’s why
                he created a job portal just for us a place where everyone, from plumbers to software engineers, can
                share their skills and find opportunities. It’s about building connections, supporting each other, and
                making our community stronger together.
            </p>
            <span class="footer-tagline">“Connecting Skills. Creating Opportunities.”</span>
            <span class="footer-tagline">“Your Community. Your Careers.”</span>
            <span class="footer-tagline">“From Local Talent to Local Success.”</span>
            <span class="footer-tagline">“Where Neighbors Find Work and Workers.”</span>
            <span class="footer-tagline">“Building Stronger Communities, One Job at a Time”</span>
        </div>

        
        <div class="footer-right">

            <div class="footer-contact">
                <h3>Contact</h3>
                <p>Email: <a href="mailto:contact@neighborskillnook.com">contact@neighborskillnook.com</a></p>
            </div>

            <div class="footer-links">
                <h3>Quick Links</h3>
                <p><a href="<?php echo home_url(); ?>">Home</a></p>
                <p><a href="<?php echo get_permalink(get_option('page_for_posts')); ?>">All Posts</a></p>
                <p><a href="<?php echo site_url('/form/'); ?>">Services Form</a></p>
            </div>

        </div>

    </div>

    <div class="footer-bottom">
        &copy; <?php echo date('Y'); ?> NeighborSkillNook. All Rights Reserved.
    </div>

</footer>
</div>
<?php wp_footer(); ?>
</body>

</html>