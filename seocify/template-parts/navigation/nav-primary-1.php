<?php
if ( defined( 'FW' ) ) {
    //Page settings
    $custom_logo	 = fw_get_db_post_option( get_the_ID(), 'custom_logo' );
}
$default_log = seocify_option('site_logo');
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
$nav_tools_show_mobile = seocify_option('nav_tools_show_mobile');
?>
<header class="xs-header header-main">
    <div class="container">
        <div class="row">
            <div class="col-lg-2">
                <div class="xs-logo-wraper">
                    <a href="<?php echo esc_url(home_url('/'));?>" class="xs-logo">
                        <?php if(!empty($logo)): ?>
                            <?php
								echo wp_get_attachment_image( attachment_url_to_postid($logo), 'full', "", array( 
									"alt" => get_bloginfo(),
								));  
							?>
                        <?php else: ?>
                            <img src="<?php echo esc_url(SEOCIFY_IMAGES.'/logo.png');  ?>" alt="<?php echo get_bloginfo(); ?>">
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
            </div>
            <?php if(($nav_sidebar) || ($nav_search)): ?>
                <div class="col-lg-8">
            <?php else: ?>
                <div class="col-lg-10">
            <?php endif; ?>
                <nav class="xs-menus">
                    <div class="nav-header <?php echo esc_attr( $nav_tools_show_mobile === true ? 'menu-tools-on-mobile' : '' ) ?>">
                        <a class="nav-brand" href="<?php echo esc_url(home_url('/'));?>"></a>
                        <?php
                        if ($nav_tools_show_mobile === true) { ?>
                        <?php if(($nav_sidebar) || ($nav_search) || ($nav_lang) || ($nav_cart)): ?>
                        <ul class="xs-menu-tools xs-menu-tools-mobile">
                            <?php if ($nav_lang): ?>
                                <?php
                                if (class_exists('SitePress')):
                                    $languages = icl_get_languages('skip_missing=0&orderby=code');
                                    $flag_url = $languages[ICL_LANGUAGE_CODE]['country_flag_url'];
                                    $lang_code = ICL_LANGUAGE_CODE;
                                else:
                                    $flag_url = get_template_directory_uri() . '/assets/images/united-states.svg';
                                    $lang_code = 'en';
                                endif; ?>
                                <li>
                                    <a href="#modal-popup-wpml" class="languageSwitcher-button xs-modal-popup">
                                        <span class="xs-flag" style="background-image: url(<?php echo esc_url($flag_url);?>"></span>
                                        <span class="lang-title text-uppercase"><?php echo esc_html($lang_code);?></span>
                                    </a>
                                </li>

                            <?php endif; ?>
                            <?php if ($nav_search): ?>
                                <li>
                                    <a href="#modal-popup-2" class="navsearch-button xs-modal-popup"><i class="xsicon xsicon-search"></i></a>
                                </li>
                            <?php endif; ?>
                            <?php if ($nav_sidebar): ?>
                                <li class="navSidebar-wraper clearfix">
                                    <div class="single-navicon">
                                        <a href="#" class="navSidebar-button"><i class="xsicon xsicon-bars"></i></a>
                                    </div>
                                </li>
                            <?php endif; ?>
                        </ul>
                        <?php endif; ?>
                        <?php }
                        ?>
                        <div class="nav-toggle"></div>
                    </div>
                    <?php
                    if(has_nav_menu('primary')) {
                        wp_nav_menu(
                            array(
                                'theme_location'	 => 'primary',
                                'container_class'	 => 'nav-menus-wrapper',
                                'menu_class'		 => 'nav-menu align-to-right',
                                'fallback_cb'		 => false,
                                'menu_id'			 => 'main-menu',
                                'walker'			 => new Seocify_Custom_Nav_Walker(),
                            )
                        );
                    }
                    ?>

                </nav>
            </div>
            <?php if(($nav_sidebar) || ($nav_search) || ($nav_lang) || ($nav_cart)): ?>
                <div class="col-lg-2 col-md-6">
                    <ul class="xs-menu-tools">
                        <?php if ($nav_lang): ?>
                            <?php
                            if (class_exists('SitePress')):
                                $languages = icl_get_languages('skip_missing=0&orderby=code');
                                $flag_url = $languages[ICL_LANGUAGE_CODE]['country_flag_url'];
                                $lang_code = ICL_LANGUAGE_CODE;
                            else:
                                $flag_url = get_template_directory_uri() . '/assets/images/united-states.svg';
                                $lang_code = 'en';
                            endif; ?>
                            <li class="display-mobile">
                                <a href="#modal-popup-wpml" class="languageSwitcher-button xs-modal-popup">
                                    <span class="xs-flag" style="background-image: url(<?php echo esc_url($flag_url);?>"></span>
                                    <span class="lang-title text-uppercase"><?php echo esc_html($lang_code);?></span>
                                </a>
                            </li>

                        <?php endif; ?>
                        <?php if ($nav_search): ?>
                            <li class="display-mobile">
                                <a href="#modal-popup-2" class="navsearch-button xs-modal-popup"><i class="xsicon xsicon-search"></i></a>
                            </li>
                        <?php endif; ?>
                        <?php if ($nav_sidebar): ?>
                            <li class="navSidebar-wraper clearfix display-mobile">
                                <div class="single-navicon">
                                    <a href="#" class="navSidebar-button"><i class="xsicon xsicon-bars"></i></a>
                                </div>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            <?php endif; ?>
        </div>

    </div>
</header>