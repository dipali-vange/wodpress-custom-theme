<?php get_header(); ?>
   <section id="intro">
        <div id="intro-info">
            <div>
                <h1><?php the_title(); ?></h1>
                <div id="intro-tag-btn">
                    <span><?php the_content();?></span>
                    <!-- <a href="" class="brand-btn">Let's Talk</a> -->
                </div>
            </div>
        </div>

        <div id="development-img">
            <?php 
                $feature = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()));
                if(!empty($feature)){  ?>
                <img src="<?php echo $feature; ?>" alt="Mobile App Development" title="Mobile App Development" height="200px" width="500;">
            <?php } ?>   
        </div>
    </section>
<?php get_footer(); 

