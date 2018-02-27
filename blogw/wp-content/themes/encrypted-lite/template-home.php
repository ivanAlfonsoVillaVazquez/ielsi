<?php
/**
* @package CodeTrendy
* @subpackage Encrypted
* @title Main/ Home/ Front Page of Theme
* 
* Change Template form front-page.php to template-home.php to support latest post
* @since ver 1.0.0
* @version 1.0.0
* Template Name: Home Page
*
*/
get_header();
?>

<?php

$encrypted_lite_et_to = encrypted_lite_get_options_values();
$encrypted_ed_cta = $encrypted_lite_et_to['call_to_action'];
if($encrypted_ed_cta==1):
?>
<section class="call-to-action white-bg">
    <div class="el-container">
        <div class="call-to-action-wrapper">
        <?php
        $encrypted_cta_page_id = $encrypted_lite_et_to['call_to_action_post'];
        $encrypted_cta_char = $encrypted_lite_et_to['enter_number_of_character_show_call_to_action'];
        $encrypted_cta_read_more = $encrypted_lite_et_to['read_more_text'];
        if(!empty($encrypted_cta_page_id)):
        $encrypted_args_cta = array('page_id'=>$encrypted_cta_page_id, 'post_status'=>'publish');
        $encrypted_query_cta = new WP_Query($encrypted_args_cta);
        if($encrypted_query_cta->have_posts()):
            while($encrypted_query_cta->have_posts()): $encrypted_query_cta->the_post();
        ?>
            <div class="cta-left">
                <div class="call-to-action-title wow fadeIn animated" data-wow-delay="0.5s">
                    <?php the_title() ?>
                </div>
                <div class="call-to-action-desc wow fadeIn animated" data-wow-delay="0.4s">
                    <?php echo encrypted_lite_excerpt(get_the_content(), $encrypted_cta_char, true ); ?> 
                </div>
            </div>
            
            <?php if(!empty($encrypted_cta_read_more)): ?>
            <div class="btn wow fadeIn animate cta-right" data-wow-delay="0.8s"><a class="read_more_text" href="<?php the_permalink() ?>"><?php echo esc_html($encrypted_cta_read_more); ?></a>
            </div>  

            <?php endif; ?>
        <?php
            endwhile;
        endif;
        endif;
        ?>
        </div>
    </div>
</section>
<?php endif;  ?>

<?php 
$encrypted_ed_fp = $encrypted_lite_et_to['feature_post'];
if($encrypted_ed_fp==1){ ?>
<section class="feature-layout wow animated" data-wow-delay="0.5s">
    <div class="el-container">
    <h2>
    <span class="line"> </span>
    <div class="feature-layout-title"><span class="title_feature_post_section"><?php echo esc_attr($encrypted_lite_et_to['title_feature_post_section']); ?></span></div>
    </h2>
    
        <div class="three-layout">
            <?php
            $encrypted_feature_page_id1 = $encrypted_lite_et_to['select_post_feature_post_1'];
            $encrypted_feature_page_id2 = $encrypted_lite_et_to['select_post_feature_post_2'];
            $encrypted_feature_page_id3 = $encrypted_lite_et_to['select_post_feature_post_3'];
            $encrypted_feature_page_id4 = $encrypted_lite_et_to['select_post_feature_post_4'];
            $encrypted_feature_page_id5 = $encrypted_lite_et_to['select_post_feature_post_5'];
            $encrypted_feature_page_id6 = $encrypted_lite_et_to['select_post_feature_post_6'];
            $encrypted_feature_page_char= $encrypted_lite_et_to['numbwe_character_feature_post'];
            $encrypted_feature_pages = array($encrypted_feature_page_id1, $encrypted_feature_page_id2, $encrypted_feature_page_id3,$encrypted_feature_page_id4, $encrypted_feature_page_id5, $encrypted_feature_page_id6);
            $encrypted_count = 0;
            if(!empty($encrypted_feature_pages)):
            foreach($encrypted_feature_pages as $encrypted_feature_page){
               
                $encrypted_args_fp = array('page_id'=>absint($encrypted_feature_page), 'post_status'=>'publish');
                $encrypted_query_fp = new WP_Query($encrypted_args_fp);
                if($encrypted_query_fp->have_posts() && !empty($encrypted_feature_page)):
                while($encrypted_query_fp->have_posts()): $encrypted_query_fp->the_post();
                 $encrypted_count++;
            ?>
            <div data-wow-delay="0.5s" class="feature wow fadeIn animated feature<?php echo esc_attr($encrypted_count) ?>">
                
                <div class="feature_content_wrap">
                    <?php if (has_post_thumbnail()):
                $encrypted_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()),'thumbnail'); ?>  
                <a href="<?php the_permalink(); ?>">         
                <div class="feature-circle">
                    <img src="<?php echo esc_url($encrypted_image[0]); ?>" alt="<?php the_title_attribute(); ?>" />
                    <div class="mask"></div>
                </div>
                </a>
                <?php endif; ?>
                    <a href="<?php the_permalink(); ?>"><div class="feature-number"><h2><?php the_title(); ?></h2></div></a>
                    <div class="feature-text"><?php echo encrypted_lite_excerpt(get_the_content(), absint($encrypted_feature_page_char), true); ?> </div>
                </div>
            </div>
            <?php
            endwhile;
            endif;
            wp_reset_postdata();;
            }
            endif;
           ?>
        </div>
    </div>
    
</section>
<?php } ?>
<?php 
$encrypted_ed_port = $encrypted_lite_et_to['enable_portfolio'];
if($encrypted_ed_port==1){ ?>
<section class="portfolio encrypted-section white-bg wow fadeIn animated" data-wow-delay="0.5s">
    <div class="portfolio-container">
    <h2><span class="line"> </span>
    <div class="feature-layout-title"><span class="portfolio_section_title"><?php echo esc_html($encrypted_lite_et_to['portfolio_section_title']); ?></span></div>
    </h2>
        <div class="portfolio-desc portfolio_section_description"><?php echo wp_kses_post($encrypted_lite_et_to['portfolio_section_description']); ?></div>
        <div class="grid">
    <?php 
    $encrypted_port_cat = absint($encrypted_lite_et_to['select_portfolio_category']);
    $encrypted_port_char = absint($encrypted_lite_et_to['numbwe_character_portfolio']);
    $encrypted_port_args = array('cat'=>absint($encrypted_port_cat), 'post_type'=>'post', 'post_status'=>'publish', 'posts_per_page'=>9);
    $encrypted_port_query = new WP_Query($encrypted_port_args);
    $encrypted_count = 0;
    if($encrypted_port_query->have_posts() && !empty($encrypted_port_cat)):
        while($encrypted_port_query->have_posts()): $encrypted_port_query->the_post();
        $encrypted_count++;
        $encrypted_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()),'encrypted-lite-port-home'); ?>
	<?php $port_cat_name = get_the_category(); ?>
               <figure class="effect-sarah wow fadeIn animated" data-wow-delay="0.8s">
                <?php if (has_post_thumbnail()):
                ?>
                <img src="<?php echo esc_url($encrypted_image[0]); ?>" alt="<?php the_title_attribute(); ?>" />
                 <?php
                 endif;?>
                <figcaption>
                    <h2><?php the_title(); ?></h2>
                    <ul class="portfolio_tag">
                        <?php foreach($port_cat_name as $key)
                        {
                            ?>
                            <li><a href="<?php echo esc_url(site_url().'/category/'.$key->slug); ?>"><?php echo esc_html($key->cat_name); ?></a></li>
                            <?php
                        } ?>
                    </ul>
                    <div class="dtl_link"> 
                    <a href="<?php the_permalink() ?>"><i class="fa fa-link"></i></a>
                    </div>
                    
                </figcaption>
            </figure>
	
    <?php
    endwhile;
    endif;
    wp_reset_postdata();;
    ?>
    </div>
      
    </div>
</section>
<?php } ?>


<?php
if($encrypted_lite_et_to['horizontal_sidebar_1_enable'] == 1)
{
 if(is_active_sidebar('horizontal-sidebar-1')):
    ?>
    <section class="horizontal-sidebar1 hside-bar clearfix encrypted-section  wow fadeIn animated" data-wow-delay="0.5s">
        <div class="el-container">
            <h2>
                <div class="feature-layout-title"><span class="horizontal_sidebar_1_title"><?php echo esc_html($encrypted_lite_et_to['horizontal_sidebar_1_title']); ?></span></div>
            </h2>
            <div class="portfolio-desc horizontal_sidebar_title_1_desc"><?php echo wp_kses_post($encrypted_lite_et_to['horizontal_sidebar_title_1_desc']); ?></div>
        
            <?php dynamic_sidebar('horizontal-sidebar-1') ?>
            </div>
    </section>
    <?php
 endif;
}
?>


<?php 
$encrypted_ed_blog = $encrypted_lite_et_to['enable_blog'];
if($encrypted_ed_blog==1){ ?>
<section class="el-blog encrypted-section white-bg  wow fadeIn animated" data-wow-delay="0.5s">
    <div class="el-container">
        <h2 class="blog-main-title blog_section_title"><?php echo esc_html($encrypted_lite_et_to['blog_section_title']); ?></h2>
        <div class="blog-main-desc blog_section_description"><?php echo esc_html($encrypted_lite_et_to['blog_section_description']); ?></div>
        <div class="blog-wrap">
            <?php 
                $encrypted_blog_cat   = absint($encrypted_lite_et_to['select_blog_category']);
                $encrypted_ed_date    = absint($encrypted_lite_et_to['enable_date_over_blog_image']);
                $encrypted_blog_char  = absint($encrypted_lite_et_to['number_character_blog_content']);
                $encrypted_blog_args  =   array('cat'=>absint($encrypted_blog_cat), 'post_status'=>'publish', 'posts_per_page'=>3);
                $encrypted_blog_query =   new WP_Query($encrypted_blog_args);
                if($encrypted_blog_query->have_posts() && !empty($encrypted_blog_cat)):
                while($encrypted_blog_query->have_posts()):$encrypted_blog_query->the_post();
                    $encrypted_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'encrypted-lite-land-blog', false );
                     ?>
                    <div class="blogs-main-wrap clearfix">
                        <a href="<?php the_permalink(); ?>">
                            <figure class="blog-img img">
                                <img src="<?php echo esc_url($encrypted_image[0]); ?>" alt="<?php the_title_attribute(); ?>" />
                                <?php if($encrypted_ed_date==1):?>
                                <div class="el-date"><span><?php echo get_the_date('d'); ?></span><span><?php echo get_the_date('M'); ?></span></div>
                                <?php endif;?>
                                <div class="el-overlay"></div>
                            </figure>
                        </a>
                                                
                        <div class="blog-content-wrap">
                            <a href="<?php the_permalink(); ?>"><div class="blog-title"><?php the_title(); ?></div></a>
                            <div class="blog-content"><?php echo encrypted_lite_excerpt(get_the_content(), absint($encrypted_blog_char), true);  ?></div>
                        </div>
                                                
                    </div>
                     <?php
                endwhile;
                endif;
                wp_reset_postdata();
            ?>
        </div>
    </div>
</section>
<?php } ?>

<?php 
$encrypted_ed_testi = $encrypted_lite_et_to['enable_testimonial'];
if($encrypted_ed_testi==1){
    $encrypted_testimonials_title = $encrypted_lite_et_to['testimonial_section_title'];
    $encrypted_testimonials_desc = $encrypted_lite_et_to['testimonial_section_description'];
    ?>
<section class="testimonial encrypted-section wow fadeIn animated" data-wow-delay="0.5s">
     <div class="el-container">
        <h2 class="testimonial-title testimonial_section_title"><?php echo esc_html($encrypted_testimonials_title); ?></h2>
        <div class="testimonial-desc testimonial_section_description"><?php echo esc_html($encrypted_testimonials_desc); ?></div>
        <div class="owl-carousel owl-theme testimonial-wrap">
            <?php 
                $encrypted_testi_cat = $encrypted_lite_et_to['select_testimonial_category'];
                $encrypted_testi_char = absint($encrypted_lite_et_to['number_character_testimonail_content']);
                $encrypted_testi_args  =   array('cat'=>absint($encrypted_testi_cat), 'post_status'=>'publish', 'posts_per_page'=>10);
                $encrypted_testi_query =   new WP_Query($encrypted_testi_args);
                if($encrypted_testi_query->have_posts()&& !empty($encrypted_testi_cat)):
                while($encrypted_testi_query->have_posts()):$encrypted_testi_query->the_post();
                    $encrypted_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full', false );
                     ?>
                    <div class="item">
                        <div class="team-content"><?php echo encrypted_lite_excerpt(get_the_content(), absint($encrypted_testi_char), true); ?></div>
                        <div class="tm-img">
        					<a href="<?php the_permalink(); ?>"><img src="<?php echo esc_url($encrypted_image[0]); ?>" alt="<?php the_title_attribute(); ?>" /></a>
                        </div>
                        <div class="team-title"><?php the_title(); ?></div>
                    </div>
                     <?php
                endwhile;
                endif;
                wp_reset_postdata();
            ?>
        </div>
    </div>
</section>
<?php } ?>

<?php 
$encrypted_ed_team = $encrypted_lite_et_to['enable_team_member'];
if($encrypted_ed_team==1){ 
    $encrypted_team_title = $encrypted_lite_et_to['team_member_section_title'];
    $encrypted_team_desc = $encrypted_lite_et_to['team_member_section_description'];
    ?>
<section class="team encrypted-section white-bg  wow fadeIn animated" data-wow-delay="0.5s">
    <div class="el-container">
        <h2 class="team_memeber_title team_member_section_title"><?php echo esc_html($encrypted_team_title); ?></h2>
        <div class="team_member_desc team_member_section_description"><?php echo esc_html($encrypted_team_desc);?></div>
        <div class="team-wrap-all">
        <?php
        $encrypted_team_char = $encrypted_lite_et_to['number_character_team_member_content'];
        $encrypted_team_cat = $encrypted_lite_et_to['select_team_member_category'];
        $encrypted_team_args = array('cat'=>absint($encrypted_team_cat), 'post_status'=>'publish', 'posts_per_page'=>4);
        $encrypted_team_query = new WP_Query($encrypted_team_args);
        $i=0;
        if($encrypted_team_query->have_posts() && !empty($encrypted_team_cat) ):
            while($encrypted_team_query->have_posts()): $encrypted_team_query->the_post();
            $i++;
            $animate_class = '';
            if($i%2 == '0'){
                $animate_class = 'slideInRight';
            }
            else{
                $animate_class = 'slideInLeft';
            }
            
        ?>
                <div class="team_member_wrap wow <?php echo esc_attr($animate_class); ?> animated" data-wow-delay="0.5s">
                    <figure class="team_member_image">
                    <?php
                    $encrypted_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'encrypted-lite-team-home', false );
                    ?>
                        <a href="<?php the_permalink(); ?>"><img src="<?php echo esc_url($encrypted_image[0]); ?>" alt="<?php the_title_attribute(); ?>" />
                        <div class="team_detail">
                            <div class="team_member_name"><?php the_title(); ?></div>
                            <div class="team_conten_hover">
                                <div class="team_member_content"><?php echo encrypted_lite_excerpt(get_the_content(), absint($encrypted_team_char), true) ?></div>
                            </div>
                        </div>
                        </a>
                    </figure>
                </div>
        <?php
            endwhile;
        endif;
        wp_reset_postdata();
        ?> 
       </div>       
    </div>
</section>
<?php } ?>


<?php
$encrypted_ed_client_logo = $encrypted_lite_et_to['enable_client_logo_slider_section'];
if($encrypted_ed_client_logo==1):
?>
<section class="client_logo encrypted-section white-bg wow fadeIn animated" data-wow-delay="0.8s">
    <div class="el-container">
        
        <h2 class="client_section_title">
           <?php echo esc_html($encrypted_lite_et_to['client_section_title']); ?>
        </h2>
        <div class="client_desc client_section_description"><?php echo esc_html($encrypted_lite_et_to['client_section_description']); ?></div>
        
        <div class="owl-carousel owl-theme client_logo_wrap">
        <?php
        $encrypted_client_cat = $encrypted_lite_et_to['select_client_category'];
        if(!empty($encrypted_client_cat)){
        $encrypted_client_args = array('cat'=>absint($encrypted_client_cat), 'post_status'=>'publish', 'posts_per_page'=>-1);
        $encrypted_client_query = new WP_Query($encrypted_client_args);
        if($encrypted_client_query->have_posts()):
            while($encrypted_client_query->have_posts()): $encrypted_client_query->the_post();
            
            $encrypted_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'client-logo', false );
            ?>
            <div class="item client_img"> 
                <img src="<?php echo esc_url($encrypted_image[0]); ?>" alt="<?php the_title_attribute(); ?>" />
            </div> 
            <?php
            endwhile;
        endif;
        wp_reset_postdata();
        }
        ?>
        </div> 
        
    </div>
</section>
<?php endif; ?>
 <?php
$encrypted_ed_gmap = $encrypted_lite_et_to['enable_google_map_section'];
if($encrypted_ed_gmap==1):
$encrypted_google_map =$encrypted_lite_et_to['google_map_iframe'];
$encrypted_address = $encrypted_lite_et_to['map_info_adderss'];
$encrypted_phone = $encrypted_lite_et_to['map_info_phone'];
$encrypted_email = $encrypted_lite_et_to['map_info_email'];
?>
<section class="google-map">
<div class="el-container">
     
</div> 
    <div class="content-area googlemap-section">
        <div class="googlemap-content">
            <?php echo wp_kses_post($encrypted_google_map); ?>
        </div>
     </div>
</section>
<?php
endif;
?>


    
    <ul class="bottom_info_address">
        <div class="el-container">
        <li><i class="fa fa-map-marker"></i><p class="map_info_adderss"><?php echo esc_html($encrypted_address) ?></p></li>
        <li><i class="fa fa-phone"></i><p class="map_info_phone"><?php echo esc_html($encrypted_phone) ?></p></li>
        <li><i class="fa fa-envelope"></i><p class="map_info_email"><?php echo esc_html($encrypted_email) ?></p></li>
        </div>
    </ul>   

<?php
/**
 * Removed Latest Post Section Since latest post can be set from Reading -> Setting 
 * @since 1.0.0
 * 
 * 
 */
?>

<?php get_footer(); 