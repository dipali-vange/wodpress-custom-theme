<?php get_header(); ?>
    <section id="highlights">
        <h1 class="sec-heading">Company Highlights</h1>         
            <!--  -->
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <div class="slider">
                    <div class="col-6 slide-text">
                        <div>
                            <h2><?php the_title(); ?></h2>
                            <p>
                                <?php the_content(); ?>
                            </p>
                            <a href="<?php echo get_permalink(get_the_ID()); ?>" class="brand-btn">See More</a>
                        </div>
                    </div>
                    <div class="col-6 slide-img">
                        <?php
                        if ( has_post_thumbnail() ) {
                            $post_image= wp_get_attachment_url( get_post_thumbnail_id() );
                        ?>
                        <img src="<?php echo $post_image; ?>" alt="Team Work in Los Angeles" title="Company Team Work">
                        <?php } ?>   
                    </div> 
                </div>                  
            <?php endwhile; endif; ?>
            <!--  -->
        <?php
            global $wp_query;
            $big = 999999999;
            echo paginate_links( array(
                'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                'format' => '?paged=%#%',
                'current' => max( 1, get_query_var('paged') ),
                'total' => $wp_query->max_num_pages,
                'next_text' => __('Next »'),
            ));
        ?>
    </section>

<?php get_footer(); ?>