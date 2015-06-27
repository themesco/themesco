<?php /** * The template for displaying all single posts. * * @package themesco */ get_header(); ?>




        <?php while ( have_posts() ) : the_post(); ?>

        <div class="themesco-single-theme row">
            <div class="container">
                <div class="col-md-7 single-theme-details">
                     <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                    <?php $post_id=get_the_ID(); $categories=get_the_terms($post_id, 'download_category' ); if(!empty($categories)){ echo '<ul class="theme-categories">'; foreach($categories as $cat){ echo '<li>'.$cat->name.'</li>'; } echo '</ul>'; } ?>
                    <?php if (class_exists( 'MultiPostThumbnails')) : MultiPostThumbnails::the_post_thumbnail( get_post_type(), 'secondary-image' ); endif; ?>
                </div>
                <div class="col-md-5 ">
                   
                    <p>
                        <?php the_content(); $green_button=get_theme_mod( 'lt_green_button',__( 'demo', 'themesco')); ?>
                        <a class="btn btn-md btn-demo overlay-btn " href="#">
                            <?php if(!empty($green_button)) { echo $green_button; } else{ _e( 'demo', 'themesco');} ?>
                        </a>
                    </p>
                </div>
            </div>

        </div>



        <?php // If comments are open or we have at least one comment, load up the comment template. if ( comments_open() || get_comments_number() ) : comments_template(); endif; ?>

        <?php endwhile; // End of the loop. ?>





<div class="latest-section">
        <div class="container">
            
            <?php 
                $heading_text = get_theme_mod('latest_themes_header', __('Our Latest Themes', 'themesco'));
                    if(!empty($heading_text)) {
                        echo '<h1>'.esc_attr($heading_text).'<h1>';
                    }

$args = array( 'post_type' => 'download', 'posts_per_page' => 2 ,'order' => 'desc', 'showposts' => 2);
            $the_query = new WP_Query( $args ); 
            if ( $the_query->have_posts() ) : 
                echo '<div class="row row-centered latest-elements">';
                
                $green_button = get_theme_mod('lt_green_button',__('demo','themesco'));
                $red_button = get_theme_mod('lt_red_button',__('details','themesco'));
                                    
                                              
                while ( $the_query->have_posts() ) : $the_query->the_post();
                    $post_id = get_the_ID();
                    $categories = get_the_terms($post_id, 'download_category' );
?>
                <div class="col-md-6 latest-showcase-themesco">
                    <div class="latest-img-overlay">
                        <?php the_post_thumbnail( 'latest-thumb', array( 'class' => 'img-responsive latest-thumb' ) ); ?>
                        <div class="overlay img-overlay center-block">
                            <h3><?php the_title();?></h3>
                            <?php
                                if(!empty($categories)){
                                    echo '<ul class="theme-categories">';
                                    foreach($categories as $cat){
                                        echo  '<li>'.$cat->name.'</li>';
                                    }
                                    echo '</ul>';
                                }
                            ?>
                           
                            
                            
                            
                            <a class="btn btn-md btn-demo overlay-btn" href="#"><?php 
                                if(!empty($green_button)) {
                                    echo $green_button;                                                 
                                } else{ _e('demo','themesco');}
                                ?></a>
                            <a class="btn btn-md btn-details overlay-btn" href="<?php the_permalink();
                                                                                ?>"><?php 
                                if(!empty($red_button)) {
                                    echo $red_button;
                                }else {_e('details', 'themesco');}
                                ?></a>
                        </div>
                    </div>
                </div>         
<?php
                    
                endwhile;
                wp_reset_postdata();
                echo '</div>';
                endif; 
            ?>
            
           
        </div>
    </div>
<?php get_footer(); ?>