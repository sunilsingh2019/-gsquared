<?php 
//creating custom blocks
add_action('acf/init', 'gsquared_acf_init');

function gsquared_acf_init() {
	// check function exists
	if( function_exists('acf_register_block') ) {

		acf_register_block(array(
			'name'				=> 'hero-module',
			'title'				=> __('Hero Module'),
			'description'		=> __('Hero Header Module for header section'),
			'render_callback'	=> 'aipm_acf_module_template_block_render_callback',
			'icon'              => 'superhero',
			'keywords'          => array( 'hero image', 'header', 'banner' ),
			'mode'				=> 'edit',
			'category'			=> 'custom_modules',
			'example' => array(
				'attributes' => array(
					'mode' => 'preview', // Important!
					'data' => array(
						'image' => '<img src="' . get_template_directory_uri() . '/images/module-preview/hero-header-module.png' . '" style="width:100%; height:auto;">'
					),
				),
			),
		));

		acf_register_block(array(
			'name'				=> 'cta-module',
			'title'				=> __('CTA Module'),
			'description'		=> __('CTA'),
			'render_callback'	=> 'aipm_acf_module_template_block_render_callback',
			'icon'              => 'superhero',
			'keywords'          => array( 'hero image', 'header', 'banner' ),
			'mode'				=> 'edit',
			'category'			=> 'custom_modules',
			'example' => array(
				'attributes' => array(
					'mode' => 'preview', // Important!
					'data' => array(
						'image' => '<img src="' . get_template_directory_uri() . '/images/module-preview/hero-header-module.png' . '" style="width:100%; height:auto;">'
					),
				),
			),
		));
		acf_register_block(array(
			'name'				=> 'courses-module',
			'title'				=> __('Courses Module'),
			'description'		=> __('Courses'),
			'render_callback'	=> 'aipm_acf_module_template_block_render_callback',
			'icon'              => 'superhero',
			'keywords'          => array( 'hero image', 'header', 'banner' ),
			'mode'				=> 'edit',
			'category'			=> 'custom_modules',
			'example' => array(
				'attributes' => array(
					'mode' => 'preview', // Important!
					'data' => array(
						'image' => '<img src="' . get_template_directory_uri() . '/images/module-preview/hero-header-module.png' . '" style="width:100%; height:auto;">'
					),
				),
			),
		));

		
		

		

	}
}

function aipm_acf_module_template_block_render_callback($block, $content = '', $is_preview = false) {
	$slug = str_replace('acf/', '', $block['name']);
	if( file_exists( get_theme_file_path("/template-parts/block/content-{$slug}.php") ) ) {
		include( get_theme_file_path("/template-parts/block/content-{$slug}.php") );
	}

	if ( $is_preview && ! empty( $block['data'] ) ) {
		echo $block['data']['image'];
		return;
   } else {
		if ( $block ) :
			 $template = $block['render_template'];
			 $template = str_replace( '.php', '', $template );
			 get_template_part( '/' . $template );
		endif;
   }
}

