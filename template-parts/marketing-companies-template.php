<?php 
//Template Name:Marketing Companies Template
get_header();
?>
<section id="revenue" class="brand-logos">
    <h1 class="sec-heading">We Drive Growth &amp; Revenue for the Best Companies</h1> 
    <div>
        <?php
            $args = array( 'post_type' => 'marketing-company', 'posts_per_page' => 9 );
            $the_query = new WP_Query( $args ); 
            if($the_query->have_posts()):
                while ( $the_query->have_posts() ) : $the_query->the_post(); 
                    ?> <a href="<?php  echo get_permalink( get_the_ID() );?>"><?php 
                    $logo = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()));
                    if(!empty($logo)){  ?>
                    <img src="<?php  echo $logo; ?>" alt="Company Logo" title="<?php the_title();?>"> 
                    </a>
                    <?php } 
                endwhile;
            endif;
        ?>
    </div>
</section>
<?php //get_footer();