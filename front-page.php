<?php get_header(); ?>
<!--=============================Jumbotron==============================================-->

<div class=jumbotron>
    <div class="row row-centered">
        <div class="container-fluid">
<?php
            $jumbotron_main_header = get_theme_mod('jumbotron_main_header',__('Simple, Clean & Beautiful WordPress Themes', 'themesco'));
                if(!empty($jumbotron_main_header)) {
                    echo '<h1>'.esc_attr($jumbotron_main_header).'</h1>';
                    }

            $jumbotron_sub_header = get_theme_mod('jumbotron_sub_header',__("It's not Just another WordPress Theme Shop but much more...", 'themesco'));
                if(!empty($jumbotron_sub_header)) {
                    echo '<h2>'.esc_attr($jumbotron_sub_header).'</h2>';
                    }

            $button_text = get_theme_mod('button_text', __('browse our themes', 'themesco'));
            $button_link = get_theme_mod('button_link', "#");
                if(!empty($button_text)) {
                    echo '<div class="centered">';
             ?> 
                        <a class="btn btn-md btn-jumbotron" href="<?php if(!empty($button_link)) echo esc_url($button_link); ?>"><?php echo esc_attr($button_text) ?></a>
            <?php           
                    echo '</div>';
   
                }

            $args = array( 'post_type' => 'themes', 'posts_per_page' => 3 ,'orderby' => 'rand');
            $the_query = new WP_Query( $args ); 
            $it = 0;
            if ( $the_query->have_posts() ) : 
                while ( $the_query->have_posts() ) : $the_query->the_post();
                    $it++;
                    if($it == 1){
                        echo '<div class="site_preview">'.get_the_post_thumbnail().'</div>';
                    } elseif($it == 2){
                        echo '<div class="site_preview themesco_screenshot_left">'.get_the_post_thumbnail().'</div>';
                    } elseif($it == 3){
                        echo '<div class="site_preview themesco_screenshot_right">'.get_the_post_thumbnail().'</div>';
                    }
                    
                endwhile;
                wp_reset_postdata();
            
                endif; 
            ?>
            
        </div>
    </div>
</div>

<!--===========================Our latest themes===================================-->

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
                    $categories = get_the_category( $post_id );
?>
                <div class="col-md-6 latest-showcase-themesco">
                    <div class="latest-img-overlay">
                        <?php the_post_thumbnail( 'latest-thumb', array( 'class' => 'img-responsive latest-thumb' ) ); ?>
                        <div class="overlay img-overlay center-block">
                            <h3><?php the_title();?></h3>
                            <?php
                                if(!empty($categories)){
                                    echo '<p>';
                                    foreach($categories as $cat){
                                        echo ' | '.$cat->name.' | ';
                                    }
                                    echo '</p>';
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

    <!--=========================Why should you choose us============================================-->

    <div class="why-section">
        <div class="container">
            <?php
            $why_section_header = get_theme_mod('why_section_header',__('Why you should choose our Themes?', 'themesco'));
                if(!empty($why_section_header)) {
                    echo '<h1>'.esc_attr($why_section_header).'</h1>';
                    }
        ?>
        <div class="row row-centered why-elements text-center">
            <?php if ( is_active_sidebar( 'sidebar-2' ) ) : ?>
	<ul class="why-elements">
		<?php dynamic_sidebar( 'sidebar-2' ); ?>
	</ul>
<?php endif; ?>   
            </div> 
        </div>
</div>


 <!--=========================What are WordPress themes===========================================-->
    <div class="what-section">
        <div class="container">
            <?php
            $what_section_header = get_theme_mod('what_section_header',__('What are WordPress Themes?', 'themesco'));
                if(!empty($what_section_header)) {
                    echo '<h1>'.esc_attr($what_section_header).'</h1>';
                    }
        ?>
        

        <div class="row row-centered what-elements text-left">
            
            

            <div class="col-md-6 what-col col-fixed col-centered">
                
                <?php
            $textarea_text_setting = get_theme_mod('textarea_text_setting');
                if(!empty($textarea_text_setting)) {
                    echo $textarea_text_setting;
                    }
        ?>   
            </div>
            <div class="col-md-6 what-col col-fixed col-centered">
               <?php
            $textarea2_text_setting = get_theme_mod('textarea2_text_setting');
                if(!empty($textarea2_text_setting)) {
                    echo $textarea2_text_setting;
                    }
        ?>   
                
                </div>
            </div>
        </div>
    </div>








<?php get_footer(); ?>