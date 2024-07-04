<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Gsquared_Test
 */

?>

</div>

<footer class="footer background-white">
  <div class="footer-top">
	<div class="container">
	  <div class="footer-top-row row">
		<div class="footer-top-col col-lg-3">
		  <div class="footer-about text-center">
			<div class="logowrap">
			  <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
			  	<?php 
					$custom_logo_id = get_theme_mod( 'custom_logo' );
					$logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
					if ( has_custom_logo() ) {
						echo '<img src="' . esc_url( $logo[0] ) . '" alt="' . get_bloginfo( 'name' ) . '">';
					} else {
						echo '<h1>' . get_bloginfo('name') . '</h1>';
					}
				?>
			  </a>
			</div>
			<div class="footer-social">
				<?php
				// Check if the ACF function exists (to prevent errors if ACF is not installed)
				if( function_exists('get_field') ) {
					// Retrieve individual social media URLs
					$facebook_url = get_field('facebook', 'option');
					$instagram_url = get_field('instagram', 'option');
					$youtube_url = get_field('youtube', 'option');

					// Output social icons
					if( $facebook_url ) {
						echo '<a href="' . esc_url($facebook_url) . '"><img src="' . get_template_directory_uri() . '/images/icons/facebook.svg" alt="Facebook"></a>';
					}
					if( $instagram_url ) {
						echo '<a href="' . esc_url($instagram_url) . '"><img src="' . get_template_directory_uri() . '/images/icons/instagram.svg" alt="Instagram"></a>';
					}
					if( $youtube_url ) {
						echo '<a href="' . esc_url($youtube_url) . '"><img src="' . get_template_directory_uri() . '/images/icons/youtube.svg" alt="YouTube"></a>';
					}
				}
				?>
			</div>

		  </div>
		</div>
		<div class="footer-top-col col-lg-3">
			<?php
				// Check if the ACF function exists (to prevent errors if ACF is not installed)
				if( function_exists('get_field') ) {
					// Retrieve description field
					$description = get_field('description', 'option');
					
					// Output description
					if( $description ) {
						echo '<p>' . esc_html($description) . '</p>';
					}
				}
			?>
		</div>
		<div class="footer-top-col col-lg-2">
			<ul class="footer-list">
				<?php
				// Check if the ACF function exists (to prevent errors if ACF is not installed)
				if( function_exists('get_field') ) {
					// Retrieve repeater field
					
					// Check if there are items in the repeater
						// Start the while loop to iterate through each item
						while( have_rows('list_item', 'option') ) {
							the_row();
							$item_text = get_sub_field('item','option'); // Get sub field 'list_item'
							
							if( !empty($item_text) ) {
								echo '<li><a href="' . esc_url($item_text['url']) . '">' . esc_html($item_text['title']) . '</a></li>';
							}
						}
					
				}
				?>
			</ul>
		</div>

		<div class="footer-top-col col-lg-4">
			<div class="footer-img-collection">
				<?php
				// Check if the ACF function exists (to prevent errors if ACF is not installed)
				if( function_exists('get_field') ) {
					// Retrieve image fields
					$image_1 = get_field('gallery', 'option');
					$image_2 = get_field('image_2', 'option');
					
					// Output each image if they exist
					if( $image_1 ) {
						echo '<div class="footer-img footer-img-1">';
						echo '<img src="' . esc_url($image_1['url']) . '" alt="' . esc_attr($image_1['alt']) . '">';
						echo '</div>';
					}
					if( $image_2 ) {
						echo '<div class="footer-img footer-img-2">';
						echo '<img src="' . esc_url($image_2['url']) . '" alt="' . esc_attr($image_2['alt']) . '">';
						echo '</div>';
					}
				}
				?>
			</div>
		</div>

	  </div>
	</div>
  </div>
  <div class="footer-bot background-gray">
	<div class="container">
	  <div class="footer-bot-row row text-center">
		<div class="footer-bot-col col-lg-6 text-md-left">
		  <span>© 2020 S, All right reserved - Legal</span>
		</div>
		<div class="footer-bot-col col-lg-6 text-md-right">
		  <span>Website carefully created by Sunil Singh</span>
		</div>
	  </div>
	</div>
  </div>
</footer>
</div>

<script src="<?php echo get_template_directory_uri(); ?>/./js/bundle-min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/./js/custom.js" defer></script>
<?php wp_footer(); ?>

</body>

</html>
	