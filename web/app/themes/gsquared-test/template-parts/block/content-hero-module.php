<?php
/**
 * Block Name: Hero-module
 *
 * This is the template that displays the feature module.
 */

// create id attribute for specific styling
$id = 'hero-module-' . $block['id'];
$heading = get_field('heading');
$module_id = get_field('module_id');
$hero_image = get_field('hero_image');
$enable_disable_module = get_field('enable_disable_module');

if ($enable_disable_module): // Check if the module is enabled
?>

<section class="section section-hero-banner section-hero-banner-home py-0" id="<?php echo esc_attr($id); ?>">
    <div class="container">
        <div class="section-inner">
            <div class="hero-banner">
                <?php if (!empty($hero_image)): ?>
                <div class="hero-banner-img">
                    <img src="<?php echo esc_url($hero_image['url']); ?>" alt="<?php echo esc_attr($hero_image['alt']); ?>">
                </div>
                <?php endif; ?>
                
                <div class="hero-banner-text">
                    <?php if (!empty($heading)): ?>
                    <h1 class="hero-banner-title"><?php echo esc_html($heading); ?></h1>
                    <?php endif; ?>
                    
                </div>
            </div>
        </div>
    </div>
</section>

<?php endif; ?>
