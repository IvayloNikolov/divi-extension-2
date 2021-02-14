<?php

require('CustomWalker.php');

class BIFW_BackgroundIdeas extends ET_Builder_Module {

	public $slug       = 'bifw_background_ideas';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => '',
		'author'     => 'Ivaylo Nikolov',
		'author_uri' => '',
	);

	public function init() {
		$this->name = esc_html__( 'Background Ideas For Web', 'bifw-background-ideas-for-web' );
	}

	public function get_fields() {

		return array(
			'menu_id'              => array(
				'label'            => esc_html__( 'Menu', 'et_builder' ),
				'type'             => 'select',
				'option_category'  => 'basic_option',
				'options'          => et_builder_get_nav_menus_options(),
				'description'      => sprintf('Pick a menu'),
				'toggle_slug'      => 'dropdown',
				'computed_affects' => array(
					'__menu',
				),
			),
			'imagesid' => array(
				'label'           => esc_html__( 'Images To Pick', 'bifw-background-ideas-for-web' ),
				'type'            => 'upload-gallery',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Pick a image', 'bifw-background-ideas-for-web' ),
				'toggle_slug'     => 'images',
			),
		);
	}

	public function render( $attrs, $content = null, $render_slug ) {
		
		wp_enqueue_style( 'style', plugin_dir_url(__FILE__) . '/style.css' );
		$images = explode(',', $this->props['imagesid']);
		$menu = '';
		$menu .= "<div id='background-of-menu'>";
		
		$menu .= '<div id="header-menu">
			<img src="' . plugin_dir_url(__FILE__) . '/images/logo.png" />
			<hr />
			<div id="cross">x</div>
		</div>';

		$menu .= "<div id='background-menu-links'>";

		foreach($images as $image){
			$backgroundImageMenu = wp_get_attachment_image_src((string) $image, "full")[0];
			$menu .= "<div class='background-menu-image' style='background-image: url(" . $backgroundImageMenu . ");'></div>";
		}	
		$menu .= '</div>';		
		$menu .= wp_nav_menu(array('menu'=>"2", 'echo'=>false, 'after'=> '<hr />','walker' => new CustomWalker() )) . "</div>";
		$menu .= "</div>
		<div id='hamburger'></div>
		<style>
			#hamburger{
			    background-image: url('" . plugin_dir_url(__FILE__) . "/images/BG Header.png');
    			width: 45px;
				height: 31px;
			}
		</style>
		";
		
		return $menu;
		
	}
}

new BIFW_BackgroundIdeas;
