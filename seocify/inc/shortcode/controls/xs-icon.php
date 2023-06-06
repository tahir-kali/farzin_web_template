<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * A Font Icon select box.
 *
 * @property array $icons   A list of font-icon classes. [ 'class-name' => 'nicename', ... ]
 *                          Default Font Awesome icons. @see Control_Icon::get_icons().
 * @property array $include list of classes to include form the $icons property
 * @property array $exclude list of classes to exclude form the $icons property
 *
 * @since 1.0.0
 */
class Xs_Icon_Controler extends Elementor\Base_Data_Control {

	public function get_type() {
		return 'icon';
	}

	/**
	 * Get icons list
	 *
	 * @return array
	 */

	public static function get_icons() {

		$icons = array(
        	'xsicon xsicon-align-justify'       	   => 'xsicon xsicon-align-justify',
			'xsicon xsicon-arrow-down'       		   => 'xsicon xsicon-arrow-down',
			'xsicon xsicon-arrow-left'       		   => 'xsicon xsicon-arrow-left',
			'xsicon xsicon-arrow-right'       		   => 'xsicon xsicon-arrow-right',
			'xsicon xsicon-arrow-up'       			   => 'xsicon xsicon-arrow-up',
			'xsicon xsicon-bars'       				   => 'xsicon xsicon-bars',
			'xsicon xsicon-briefcase'       		   => 'xsicon xsicon-briefcase',
			'xsicon xsicon-bullhorn'         		   => 'xsicon xsicon-bullhorn',
			'xsicon xsicon-calendar-alt'       		   => 'xsicon xsicon-calendar-alt',
			'xsicon xsicon-chart-line'       		   => 'xsicon xsicon-chart-line',
			'xsicon xsicon-check'       			   => 'xsicon xsicon-check',
			'xsicon xsicon-check-square'       		   => 'xsicon xsicon-check-square',
			'xsicon xsicon-chevron-down'       		   => 'xsicon xsicon-chevron-down',
			'xsicon xsicon-chevron-left'       		   => 'xsicon xsicon-chevron-left',
			'xsicon xsicon-chevron-right'       	   => 'xsicon xsicon-chevron-right',
			'xsicon xsicon-chevron-up'       		   => 'xsicon xsicon-chevron-up',
			'xsicon xsicon-clipboard'       		   => 'xsicon xsicon-clipboard',
			'xsicon xsicon-comment-alt'       		   => 'xsicon xsicon-comment-alt',
			'xsicon xsicon-dollar-sign'       		   => 'xsicon xsicon-dollar-sign',
			'xsicon xsicon-dribble'       			   => 'xsicon xsicon-dribble',
			'xsicon xsicon-envelope-open'       	   => 'xsicon xsicon-envelope-open',
			'xsicon xsicon-envelope-regular'       	   => 'xsicon xsicon-envelope-regular',
			'xsicon xsicon-facebook-f'       		   => 'xsicon xsicon-facebook-f',
			'xsicon xsicon-file-alt'       			   => 'xsicon xsicon-file-alt',
			'xsicon xsicon-file'       				   => 'xsicon xsicon-file',
			'xsicon xsicon-folder-open'       		   => 'xsicon xsicon-folder-open',
			'xsicon xsicon-folder-open-solid'          => 'xsicon xsicon-folder-open-solid',
			'xsicon xsicon-google-plus-g'       	   => 'xsicon xsicon-google-plus-g',
			'xsicon xsicon-heart'       			   => 'xsicon xsicon-heart',
			'xsicon xsicon-instagram'       		   => 'xsicon xsicon-instagram',
			'xsicon xsicon-linkedin-in'       		   => 'xsicon xsicon-linkedin-in',
			'xsicon xsicon-long-arrow-alt-down'        => 'xsicon xsicon-long-arrow-alt-down',
			'xsicon xsicon-long-arrow-alt-left'        => 'xsicon xsicon-long-arrow-alt-left',
			'xsicon xsicon-long-arrow-alt-right'       => 'xsicon xsicon-long-arrow-alt-right',
			'xsicon xsicon-long-arrow-alt-up'          => 'xsicon xsicon-long-arrow-alt-up',
			'xsicon xsicon-map-marked-alt'       	   => 'xsicon xsicon-map-marked-alt',
			'xsicon xsicon-minus'       			   => 'xsicon xsicon-minus',
			'xsicon xsicon-pencil-alt'       		   => 'xsicon xsicon-pencil-alt',
			'xsicon xsicon-phone-alt'       		   => 'xsicon xsicon-phone-alt',
			'xsicon xsicon-phone-volume'       		   => 'xsicon xsicon-phone-volume',
			'xsicon xsicon-pinterest-p'       		   => 'xsicon xsicon-pinterest-p',
			'xsicon xsicon-play'       				   => 'xsicon xsicon-play',
			'xsicon xsicon-question-circle'       	   => 'xsicon xsicon-question-circle',
			'xsicon xsicon-quote-right'       		   => 'xsicon xsicon-quote-right',
			'xsicon xsicon-reddit-alien'       		   => 'xsicon xsicon-reddit-alien',
			'xsicon xsicon-search'       			   => 'xsicon xsicon-search',
			'xsicon xsicon-signal'       			   => 'xsicon xsicon-signal',
			'xsicon xsicon-sistrix'       			   => 'xsicon xsicon-sistrix',
			'xsicon xsicon-star'       				   => 'xsicon xsicon-star',
			'xsicon xsicon-star-solid'       		   => 'xsicon xsicon-star-solid',
			'xsicon xsicon-tags'       				   => 'xsicon xsicon-tags',
			'xsicon xsicon-tenge'       			   => 'xsicon xsicon-tenge',
			'xsicon xsicon-times'       			   => 'xsicon xsicon-times',
			'xsicon xsicon-twitter'       			   => 'xsicon xsicon-twitter',
			'xsicon xsicon-unlock-alt'       		   => 'xsicon xsicon-unlock-alt',
			'xsicon xsicon-user-friends'       		   => 'xsicon xsicon-user-friends',
			'xsicon xsicon-user'       				   => 'xsicon xsicon-user',
			'xsicon xsicon-yoast'       			   => 'xsicon xsicon-yoast',

		);

		return $icons;
	}

	/**
	 * Retrieve icons control default settings.
	 *
	 * Get the default settings of the icons control. Used to return the default
	 * settings while initializing the icons control.
	 *
	 * @since 1.0.0
	 * @access protected
	 *
	 * @return array Control default settings.
	 */

	protected function get_default_settings() {
		return [
			'options' => self::get_icons(),
		];
	}

	/**
	 * Render icons control output in the editor.
	 *
	 * Used to generate the control HTML in the editor using Underscore JS
	 * template. The variables for the class are available using `data` JS
	 * object.
	 *
	 * @since 1.0.0
	 * @access public
	 */

	public function content_template() {
		?>
		<div class="elementor-control-field">
			<label class="elementor-control-title">{{{ data.label }}}</label>
			<div class="elementor-control-input-wrapper">
				<select class="elementor-control-icon" data-setting="{{ data.name }}" data-placeholder="<?php esc_attr_e( 'Select Icon', 'seocify' ); ?>">
					<option value=""><?php esc_html_e( 'Select Icon', 'seocify' ); ?></option>
					<# _.each( data.options, function( option_title, option_value ) { #>
					<option value="{{ option_value }}">{{{ option_title }}}</option>
					<# } ); #>
				</select>
			</div>
		</div>
		<# if ( data.description ) { #>
		<div class="elementor-control-field-description">{{ data.description }}</div>
		<# } #>
		<?php
	}

}
