<?php

if ( ! defined( 'ABSPATH' ) ) exit;
include_once SEOCIFY_SHORTCODE_DIR . 'manager/controls.php';
class Xs_Shortcode{

	/**
     * Holds the class object.
     *
     * @since 1.0
     *
     */
    public static $_instance;


    /**
     * Localize data array
     *
     * @var array
     */
    public $localize_data = array();

	/**
     * Load Construct
     *
     * @since 1.0
     */

	public function __construct(){

		add_action('elementor/init', array($this, 'xs_elementor_init'));
        add_action('elementor/controls/controls_registered', array( $this, 'xs_icon_pack' ), 11 );
        add_action('elementor/widgets/widgets_registered', array($this, 'xs_shortcode_elements'));
        add_action( 'elementor/editor/after_enqueue_styles', array( $this, 'editor_enqueue_styles' ) );
        add_action('elementor/controls/controls_registered', array( $this, 'control_image_choose' ), 13 );
        add_action('elementor/controls/controls_registered', array( $this, 'xs_ajax_select2' ), 13 );
        add_action( 'elementor/frontend/before_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
        add_action( 'elementor/preview/enqueue_styles', array( $this, 'preview_enqueue_scripts' ) );

        //elementor icons load
        $this -> Seocify_elementor_icon_pack();

	}


    /**
     * Enqueue Scripts
     *
     * @return void
     */

     public function enqueue_scripts() {
         wp_enqueue_script( 'xs-main-elementor', SEOCIFY_SCRIPTS  . '/elementor.js',array( 'jquery', 'elementor-frontend' ), rand(), true );
    }

    /**
     * Enqueue editor styles
     *
     * @return void
     */

    public function editor_enqueue_styles() {
        wp_enqueue_style( 'panel-elementor', SEOCIFY_CSS.'/panel.css',null, SEOCIFY_VERSION );
        //wp_enqueue_style( 'xs-icon-elementor', SEOCIFY_CSS.'/iconfont.css',null, SEOCIFY_VERSION );

    }

    /**
     * Preview Enqueue Scripts
     *
     * @return void
     */

    public function preview_enqueue_scripts() {}
	/**
     * Elementor Initialization
     *
     * @since 1.0
     *
     */

    public function xs_elementor_init(){
        \Elementor\Plugin::$instance->elements_manager->add_category(
            'seocify-elements',
            [
                'title' =>esc_html__( 'seocify', 'seocify' ),
                'icon' => 'fa fa-plug',
            ],
            1
        );
    }

    /**
     * Extend Icon pack core controls.
     *
     * @param  object $controls_manager Controls manager instance.
     * @return void
     */

    public function xs_icon_pack( $controls_manager ) {

        require_once SEOCIFY_SHORTCODE_DIR. 'controls/xs-icon.php';

        $controls = array(
            $controls_manager::ICON => 'Xs_Icon_Controler',
        );

        foreach ( $controls as $control_id => $class_name ) {
            $controls_manager->unregister_control( $control_id );
            $controls_manager->register_control( $control_id, new $class_name() );
        }

    }

    // elementor icon fonts loaded
    public function Seocify_elementor_icon_pack(  ) {

		$this->__generate_font();
		
        add_filter( 'elementor/icons_manager/additional_tabs', [ $this, '__add_font']);
		
    }
    
    public function __add_font( $font){
        $font_new['icon-seocify'] = [
            'name' => 'icon-seocify',
            'label' => esc_html__( 'Seocify Icons', 'seocify' ), 
            'url' => SEOCIFY_CSS . '/xs-icons.css',
            'enqueue' => [ SEOCIFY_CSS . '/xs-icons.css' ],
            'prefix' => 'xsicon-',
            'displayPrefix' => 'xsicon',
            'labelIcon' => 'xsicon xsicon-paper-plane',
            'ver' => '5.9.0',
            'fetchJson' =>  SEOCIFY_SCRIPTS . '/xs-icons.js',
            'native' => true,
        ];
        return  array_merge($font, $font_new);
    }


    public function __generate_font(){
        global $wp_filesystem;

        require_once ( ABSPATH . '/wp-admin/includes/file.php' );
        WP_Filesystem();
        $css_file =  SEOCIFY_CSS_DIR . '/xs-icons.css';
    
        if ( $wp_filesystem->exists( $css_file ) ) {
            $css_source = $wp_filesystem->get_contents( $css_file );
        } // End If Statement
        
        preg_match_all( "/\.(xsicon-.*?):\w*?\s*?{/", $css_source, $matches, PREG_SET_ORDER, 0 );
        $iconList = []; 
        
        foreach ( $matches as $match ) {
            $new_icons[$match[1] ] = str_replace('xsicon-', '', $match[1]);
            $iconList[] = str_replace('xsicon-', '', $match[1]);
        }

        $icons = new \stdClass();
        $icons->icons = $iconList;
        $icon_data = json_encode($icons);
        
        $file = SEOCIFY_THEMEROOT_DIR . '/assets/js/xs-icons.js';
        
            global $wp_filesystem;
            require_once ( ABSPATH . '/wp-admin/includes/file.php' );
            WP_Filesystem();
            if ( $wp_filesystem->exists( $file ) ) {
                $content =  $wp_filesystem->put_contents( $file, $icon_data) ;
            } 
        
    }
        // registering ajax select 2 control
        public function xs_ajax_select2( $controls_manager ) {

            require_once SEOCIFY_SHORTCODE_DIR. 'controls/xs-select2.php';
            $controls_manager->register_control( 'ajaxselect2', new \Control_Ajax_Select2() );

        }

        // registering image choose
        public function control_image_choose( $controls_manager ) {

            require_once SEOCIFY_SHORTCODE_DIR. 'controls/xs-choose.php';
            $controls_manager->register_control( 'imagechoose', new \Control_Image_Choose() );

        }

    public function xs_shortcode_elements($widgets_manager){

        require_once SEOCIFY_SHORTCODE_DIR.'xs-heading.php';
        require_once SEOCIFY_SHORTCODE_DIR.'xs-work-process.php';
        require_once SEOCIFY_SHORTCODE_DIR.'xs-case-studies.php';
        require_once SEOCIFY_SHORTCODE_DIR.'xs-image-box.php';
        require_once SEOCIFY_SHORTCODE_DIR.'xs-price.php';
        require_once SEOCIFY_SHORTCODE_DIR.'xs-tab.php';
        require_once SEOCIFY_SHORTCODE_DIR.'xs-blog.php';
        require_once SEOCIFY_SHORTCODE_DIR.'xs-piechart.php';
        require_once SEOCIFY_SHORTCODE_DIR.'xs-boosting-lists.php';
        require_once SEOCIFY_SHORTCODE_DIR.'xs-funfact.php';
        require_once SEOCIFY_SHORTCODE_DIR.'xs-doodle-parallax.php';
        require_once SEOCIFY_SHORTCODE_DIR.'xs-delighter-parallax.php';
        require_once SEOCIFY_SHORTCODE_DIR.'xs-team.php';
        require_once SEOCIFY_SHORTCODE_DIR.'xs-portfolio.php';
        require_once SEOCIFY_SHORTCODE_DIR.'xs-testimonial.php';
        require_once SEOCIFY_SHORTCODE_DIR.'xs-button.php';
        require_once SEOCIFY_SHORTCODE_DIR.'xs-service.php';
        require_once SEOCIFY_SHORTCODE_DIR.'xs-page-link.php';
        require_once SEOCIFY_SHORTCODE_DIR.'xs-service-banner.php';


        $widgets_manager->register_widget_type(new Elementor\Xs_Heading_Widget());
        $widgets_manager->register_widget_type(new Elementor\XS_Work_Process_Widget());
        $widgets_manager->register_widget_type(new Elementor\Xs_Case_studies_Widget());
        $widgets_manager->register_widget_type(new Elementor\Xs_Image_Box_Widget());
        $widgets_manager->register_widget_type(new Elementor\XS_Price_Widget());
        $widgets_manager->register_widget_type(new Elementor\Xs_Tabs_Widget());
        $widgets_manager->register_widget_type(new Elementor\Xs_Post_Widget());
        $widgets_manager->register_widget_type(new Elementor\Xs_Piechart_Widget());
        $widgets_manager->register_widget_type(new Elementor\Xs_Boosting_lists_Widget());
        $widgets_manager->register_widget_type(new Elementor\Xs_Funfact_Widget());
        $widgets_manager->register_widget_type(new Elementor\Xs_Doodle_Parallax_Widget());
        $widgets_manager->register_widget_type(new Elementor\Xs_Delighter_Parallax_Widget());

        $widgets_manager->register_widget_type(new Elementor\Xs_Service_Box_Widget());
        $widgets_manager->register_widget_type(new Elementor\Xs_Testimonial_Widget());
        $widgets_manager->register_widget_type(new Elementor\Xs_Button_Widget());
        $widgets_manager->register_widget_type(new Elementor\Xs_Team_Widget());
        $widgets_manager->register_widget_type(new Elementor\Xs_Portfolio_Widget());
        $widgets_manager->register_widget_type(new Elementor\Xs_Page_List_Widget());
        $widgets_manager->register_widget_type(new Elementor\XS_Service_banenr_Widget());

    }

	public static function xs_get_instance() {
        if (!isset(self::$_instance)) {
            self::$_instance = new Xs_Shortcode();
        }
        return self::$_instance;
    }

}
$Xs_Shortcode = Xs_Shortcode::xs_get_instance();

if(!defined('ELEMENTOR_PRO_VERSION')){
    add_action( 'elementor/editor/after_enqueue_styles', function() {
        wp_enqueue_style( 'xs-elementor-editor-panel',  SEOCIFY_CSS . '/elementor-editor-panel.css', null,  SEOCIFY_VERSION );
    });
}