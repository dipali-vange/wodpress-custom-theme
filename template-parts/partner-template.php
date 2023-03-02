<?php 
// Template Name:Our Partner
get_header();
?>
<section id="partners" class="brand-logos">
        <h1 class="sec-heading">Our Partners</h1> 
       
        <div>
            
            <?php
                $args = array( 'post_type' => 'our-partner', 'posts_per_page' => 9 );
                $the_query = new WP_Query( $args ); 
                if($the_query->have_posts()):
                    while ( $the_query->have_posts() ) : $the_query->the_post();
                        ?> <a href="<?php  echo get_permalink( get_the_ID() );?>"><?php 
                            $logo = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()));
                            if(!empty($logo)){  ?>
                            <img src="<?php  echo $logo; ?>" alt="Our Partner" title="<?php the_title();?>">
                        <?php }?></a> <?php    
                    endwhile;
                endif;
            ?>     
           
        </div>
        
    </section>
<?php// get_footer(); ?>