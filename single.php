<?php get_header(); ?>
<section id="highlights">
        <h1 class="sec-heading"><?php the_title();?></h1> 
    
        <div class="slider">
            <div class="col-6 slide-text">
                <div>
                    <p>
                        <?php the_content();?>
                    </p>
                    <!-- <a href="" class="brand-btn">See More</a> -->
                </div>
            </div>
            <div class="col-6 slide-img">
               <?php  $post_img = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()));  
                if(!empty($post_img)){?>
                            <img src="<?php  echo $post_img; ?>" alt="Team Work in Los Angeles" title="Company Team Work">
                <?php } ?>
            </div> 
        </div>
    </section>
<?php get_footer();    