<?php
get_header();

if (have_posts()) : while (have_posts()) : the_post(); 

// Fetch ACF fields
$fees = get_field('fees');
$start_date = get_field('start_date');
$end_date = get_field('end_date');
$teacher = get_field('instructor');
$teacher_names = array();
if ($teacher) {
    foreach ($teacher as $teacher_post) {
        $teacher_names[] = get_the_title($teacher_post->ID);
    }
}
$featured_image_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
?>

<!-- Modal  Course -->
<div class="custom-modal custom-modal-course">
    <div class="modal-dialog" role="document">
        <div class="modal-content custom-modal-content">
            <div class="purchase-modal">
                <div class="purchase-modal-hero">
                    <img src="<?php echo esc_url($featured_image_url); ?>" alt="">
                </div>
                <div class="purchase-modal-cont">
                    <div class="purchase-modal-head dotted-border-bot">
                        <h2 class="purchase-modal-title heading"><?php the_title(); ?></h2>
                        <p class="price">
                            <span class="heading color-price">$<?php echo esc_html($fees); ?></span>
                        </p>
                    </div>
                    <div class="purchase-modal-body">
                        <div class="purchase-modal-desc">
                            <?php the_content(); ?>
                        </div>
                        <div class="purchase-modal-details">
                            <p><span>Teacher:</span><span><?php echo esc_html(implode(', ', $teacher_names)); ?></span></p>
                            <p><span>Start Date:</span><span><?php echo esc_html($start_date); ?></span></p>
                            <p><span>End Date:</span><span><?php echo esc_html($end_date); ?></span></p>
                            <!-- <a href="#" class="link-box"><img src="images/icons/plus.svg" alt=""> Book Now</a> -->
                            <h2>Enroll in this course</h2>
                            <form class="contact-form" id="enrollment-form" method="post">
                                <div class="form-group">
                                    <input type="email" class="form-control" name="email" placeholder="Email" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="first_name" placeholder="First Name" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="last_name" placeholder="Last Name" required>
                                </div>
                                
                                <input type="hidden" name="course_id" value="<?php echo get_the_ID(); ?>">
                                <!-- <input type="submit" value="Enroll"> -->
                                <button type="submit">Enroll</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php endwhile; endif;

get_footer();
