<?php
/**
 * Block Name: cta-module
 *
 * This is the template that displays the feature module.
 */

// create id attribute for specific styling
$id = 'cta-module-' . $block['id'];
$heading = get_field('heading');
$module_id = get_field('module_id');
$hero_image = get_field('hero_image');
$link = get_field('link');
$enable_disable_module = get_field('enable_disable_module');

if ($enable_disable_module): // Check if the module is enabled
?>

<section class="section section-cta py-0 text-center" id="<?php echo esc_attr($id); ?>">
    <div class="container">
        <div class="section-inner">
            <div class="cta">
                <?php if (!empty($hero_image)): ?>
                <div class="cta-img">
                    <img class="img-fit" src="<?php echo esc_url($hero_image['url']); ?>" alt="<?php echo esc_attr($hero_image['alt']); ?>">
                </div>
                <?php endif; ?>

                <div class="cta-text">
                    <?php if (!empty($heading)): ?>
                    <h2 class="heading"><?php echo esc_html($heading); ?></h2>
                    <?php endif; ?>
                    
                    <?php if (!empty($link)): ?>
                    <a href="<?php echo esc_url($link['url']); ?>" class="link-box"><?php echo esc_html($link['title']); ?></a>
                    <?php endif; ?>
                    
                </div>
            </div>
        </div>
    </div>
</section>

<?php endif; ?>
