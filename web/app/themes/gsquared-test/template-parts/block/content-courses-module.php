<?php
/**
 * Block Name: accordion-module
 *
 * This is the template that displays the feature module.
 */

// create id attribute for specific styling
$id = 'course-module-' . $block['id'];
$heading = get_field('heading');
$select_course = get_field('select_courses');
?>

<section id="<?php echo esc_attr($id); ?>" class="section section-courses section-courses-ateliers background-gray">
    <div class="container">
        <div class="section-inner">
            <div class="courses">
                <div class="section-head text-center">
                    <?php if (!empty($heading)): ?>
                        <h2 class="heading"><?php echo esc_html($heading); ?></h2>
                    <?php endif; ?>
                </div>
                <div class="section-body">
                    <div class="courses-slider">
                            <?php foreach ($select_course as $post): setup_postdata($post); ?>
                                <?php
                                
                    
                                $course_title = get_the_title($post->ID);
                                $course_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' ); // Get featured image URL
                                $teachers = get_field('instructor', $post->ID); // Assuming 'teacher' is the ACF relationship field
                                $permalink = get_permalink( $post->ID );
                                ?>
                                <div class="courses-slider-item">
                                    <div class="courses-card background-white">
                                        <a href="<?php echo $permalink; ?>" class="courses-card-link">
                                            <div class="courses-card-img">
                                                <?php if (!empty($course_image)): ?>
                                                    <img src="<?php echo $course_image[0]; ?>" alt="">
                                                <?php else: ?>
                                                    <img src="path_to_placeholder_image.jpg" alt="Placeholder Image">
                                                <?php endif; ?>
                                            </div>
                                            <div class="courses-card-text">
                                                <h3 class="courses-card-title"><?php echo esc_html($course_title); ?></h3>
                                                <div class="courses-card-details">
                                                <?php if (!empty($teachers)): ?>
                                                        <?php foreach ($teachers as $teacher): ?>
                                                            <p>by <?php echo esc_html($teacher->post_title); ?></p>
                                                        <?php endforeach; ?>
                                                    <?php else: ?>
                                                        <p>No teacher assigned</p>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                            <?php wp_reset_postdata(); ?>
                       
                    </div>
                    <div class="courses-link text-center">
                        <a href="./ateliers-courses.html" class="link-common">view all</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
