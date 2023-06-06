<?php
if ( defined( 'FW' ) ) {
    //Page settings
    $custom_logo	 = fw_get_db_post_option( get_the_ID(), 'custom_logo' );
}
if(isset($custom_logo['url']) && $custom_logo['url'] !=''){
    $logo = $custom_logo['url'];
}else{
    $logo = seocify_option('site_logo');
}
$sticky_logo           = seocify_option('sticky_logo');

$nav_search            = seocify_option('nav_search');
$nav_sidebar           = seocify_option('nav_sidebar');
$nav_cart              = seocify_option('nav_cart');
$nav_cart_url          = seocify_option('nav_cart_url');
$nav_lang              = seocify_option('nav_lang');
$is_sticky_header      = seocify_option('is_sticky_header');

$phn_no                = seocify_option('top_header_phn');
$call_now_text         = seocify_option('call_now_text');

$cta_text              = seocify_option('cta_text');
$cta_url               = seocify_option('cta_url');
$nav_tools_show_mobile = seocify_option('nav_tools_show_mobile');


?>

<header class="xs-header header-new">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="xs-logo-wraper">
                    <div class=" header-info">
                        <a href="<?php echo esc_url(home_url('/'));?>" class="xs-logo">
                            <?php if(!empty($logo)): ?>
                                <?php
                                    echo wp_get_attachment_image( attachment_url_to_postid($logo), 'full', "", array( 
                                        "alt" => get_bloginfo(),
                                    ));  
                                ?>
                            <?php else: ?>
                                <span><?php bloginfo('name'); ?></span>
                            <?php endif ?>
                            <?php if(!empty($sticky_logo) && $is_sticky_header): ?>
                                <?php
                                    echo wp_get_attachment_image( attachment_url_to_postid($sticky_logo), 'full', "", array( 
                                        "alt" => get_bloginfo(),
                                        "class" => "logo-sticky",
                                    ));  
                                ?>
                            <?php endif ?>
                        </a>
                    </div>

                    <?php if ($phn_no !=''): ?>
                        <div class="header-info">
                            <span class="contact-info">
                                <?php echo esc_html($call_now_text); ?>
                                <a href="tel:<?php echo esc_html($phn_no); ?>"><?php echo esc_html($phn_no); ?></a>
                            </span>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-lg-8">
                <nav class="xs-menus align-to-right">
                    <div class="nav-header <?php echo esc_attr( $nav_tools_show_mobile === true ? 'menu-tools-on-mobile' : '' ) ?>">
                        <a class="nav-brand" href="<?php echo esc_url(home_url('/'));?>"></a>
                        <?php if ($nav_tools_show_mobile === true) { ?>
                        <?php if($nav_sidebar!='' || $nav_search!='' || $nav_lang!='' || $nav_cart!=''): ?>
                        <ul class=" xs-menu-tools xs-menu-tools-mobile">
                            <?php if ($nav_lang): ?>
                                <?php if (class_exists('SitePress')):
                                    $languages = icl_get_languages('skip_missing=0&orderby=code');
                                    $flag_url = (isset($languages[ICL_LANGUAGE_CODE]))
                                                ? $languages[ICL_LANGUAGE_CODE]['country_flag_url']
                                                : get_template_directory_uri() . '/assets/images/united-states.svg';

                                    $lang_code = (isset($languages[ICL_LANGUAGE_CODE]))
                                                ? ICL_LANGUAGE_CODE
                                                : 'en';
                                ?>
                                    <li class="display-mobile">
                                        <a href="#modal-popup-wpml" class="languageSwitcher-button xs-modal-popup">
                                            <span class="xs-flag" style="background-image: url(<?php echo esc_url($flag_url);?>"></span>
                                            <span class="lang-title text-uppercase"><?php echo esc_html($lang_code);?></span>
                                        </a>
                                    </li>
                                <?php endif; ?>
                            <?php endif; ?>
                            <?php if ($nav_search!=''): ?>
                                <li class="display-mobile">
                                    <a href="#modal-popup-2" class="navsearch-button xs-modal-popup"><i class="xsicon xsicon-search"></i></a>
                                </li>
                            <?php endif; ?>
                            <?php if ($nav_sidebar!=''): ?>
                                <li class="display-mobile"><a href="#" class="navSidebar-button"><i class="xsicon xsicon-bars"></i></a></li>
                            <?php endif; ?>
                        </ul>
                        <?php endif; ?>
                        <?php } ?>
                        <div class="nav-toggle"></div>
                    </div>
                    <div class="nav-menus-wrapper clearfix">
                        <?php
                        if(has_nav_menu('primary')) {
                            wp_nav_menu(
                                array(
                                    'theme_location'	 => 'primary',
                                    'container'	         => '',
                                    'container_class'	 => '',
                                    'menu_class'		 => 'nav-menu single-page-menu',
                                    'fallback_cb'		 => false,
                                    'menu_id'			 => 'main-menu',
                                    'walker'			 => new Seocify_Custom_Nav_Walker(),
                                )
                            );
                        }
                        ?>
                        <?php if ($cta_text !=''): ?>
                            <div class="nav-btn">
                                <a href="<?php echo esc_url($cta_url); ?>" class="btn btn-danger"><?php echo esc_html($cta_text); ?></a>
                            </div>
                        <?php endif; ?>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>