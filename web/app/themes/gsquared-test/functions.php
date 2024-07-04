<?php
/**
 * Gsquared Test functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Gsquared_Test
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function gsquared_test_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Gsquared Test, use a find and replace
		* to change 'gsquared-test' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'gsquared-test', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'gsquared-test' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'gsquared_test_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'gsquared_test_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function gsquared_test_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'gsquared_test_content_width', 640 );
}
add_action( 'after_setup_theme', 'gsquared_test_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function gsquared_test_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'gsquared-test' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'gsquared-test' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'gsquared_test_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function gsquared_test_scripts() {
	wp_enqueue_style( 'gsquared-test-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'gsquared-test-style', 'rtl', 'replace' );

	wp_enqueue_script( 'gsquared-test-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'gsquared_test_scripts' );


add_theme_support( 'custom-logo' );

function themename_custom_logo_setup() {
	$defaults = array(
		'height'               => 100,
		'width'                => 400,
		'flex-height'          => true,
		'flex-width'           => true,
		'header-text'          => array( 'site-title', 'site-description' ),
		'unlink-homepage-logo' => true, 
	);
	add_theme_support( 'custom-logo', $defaults );
}
add_action( 'after_setup_theme', 'themename_custom_logo_setup' );


if( function_exists('acf_add_options_page') ) {

    acf_add_options_page(array(
        'page_title'    => 'Theme General Settings',
        'menu_title'    => 'Theme Settings',
        'menu_slug'     => 'theme-general-settings',
        'capability'    => 'edit_posts',
        'redirect'      => false
    ));

    acf_add_options_sub_page(array(
        'page_title'    => 'Social Icons Settings',
        'menu_title'    => 'Social Icon',
        'parent_slug'   => 'theme-general-settings',
    ));

    acf_add_options_sub_page(array(
        'page_title'    => 'Theme Footer Settings',
        'menu_title'    => 'Footer',
        'parent_slug'   => 'theme-general-settings',
    ));

}


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/module-register.php';
/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/post-type.php';


/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}


function handle_enrollment_form_submission() {
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['email'])) {
        $email = sanitize_email($_POST['email']);
        $first_name = sanitize_text_field($_POST['first_name']);
        $last_name = sanitize_text_field($_POST['last_name']);
        $course_id = intval($_POST['course_id']);

        // Get course capacity
        $capacity = get_post_meta($course_id, 'course_capacity', true);
        $capacity = intval($capacity); // Ensure capacity is an integer

        if ($capacity <= 0) {
            wp_die('Course capacity must be greater than zero. Please update course settings.');
        }

        // Check if email is already enrolled in this course
        $enrollments = get_post_meta($course_id, 'enrollments', true);
        
        if (!is_array($enrollments)) {
            $enrollments = array();
        }

        foreach ($enrollments as $enrollment) {
            if ($enrollment['email'] === $email) {
                wp_die('You are already enrolled in this course.');
            }
        }

        // Check if course is fully booked
        if (count($enrollments) >= $capacity) {
            wp_die('This course is fully booked.');
        }

        // Save the enrollment
        $enrollments[] = array(
            'email' => $email,
            'first_name' => $first_name,
            'last_name' => $last_name,
        );
        update_post_meta($course_id, 'enrollments', $enrollments);

        // Send email notification to user
        $course_title = get_the_title($course_id);
        $subject = 'Course Enrollment Confirmation';
        $message = "Hello $first_name $last_name,\n\nYou have successfully enrolled in the course: $course_title.\n\nThank you!";
        $headers = array('Content-Type: text/plain; charset=UTF-8');

        wp_mail($email, $subject, $message, $headers);

        // Redirect with success message
        wp_redirect(add_query_arg('enrolled', 'true', get_permalink($course_id)));
        exit;
    }
}
add_action('init', 'handle_enrollment_form_submission');


// Add meta box for enrolled students
function add_enrolled_students_meta_box() {
    add_meta_box(
        'enrolled_students_meta_box',
        'Enrolled Students',
        'display_enrolled_students_meta_box',
        'courses',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'add_enrolled_students_meta_box');



// Display enrolled students meta box
function display_enrolled_students_meta_box($post) {
    $enrollments = get_post_meta($post->ID, 'enrollments', true);

    if (!empty($enrollments)) {
        echo '<ul>';
        foreach ($enrollments as $key => $enrollment) {
            $email = $enrollment['email'];
            $name = $enrollment['first_name'] . ' ' . $enrollment['last_name'];
            echo "<li>$name - $email (<a href='" . admin_url("admin-post.php?action=remove_enrollment&course_id={$post->ID}&enrollment_index=$key") . "'>Remove</a>)</li>";
        }
        echo '</ul>';
    } else {
        echo 'No students enrolled yet.';
    }
}

// Handle remove enrollment action
function handle_remove_enrollment() {
    if (isset($_GET['action']) && $_GET['action'] === 'remove_enrollment' && isset($_GET['course_id']) && isset($_GET['enrollment_index'])) {
        $course_id = intval($_GET['course_id']);
        $enrollment_index = intval($_GET['enrollment_index']);
        $enrollments = get_post_meta($course_id, 'enrollments', true);

        if (is_array($enrollments) && isset($enrollments[$enrollment_index])) {
            unset($enrollments[$enrollment_index]);
            update_post_meta($course_id, 'enrollments', array_values($enrollments));
            wp_redirect(admin_url("post.php?post=$course_id&action=edit"));
            exit;
        }
    }
}
add_action('admin_init', 'handle_remove_enrollment');


// Add meta box for course capacity
function add_course_capacity_meta_box() {
    add_meta_box(
        'course_capacity_meta_box',
        'Course Capacity',
        'display_course_capacity_meta_box',
        'courses',
        'side',
        'default'
    );
}
add_action('add_meta_boxes', 'add_course_capacity_meta_box');

// Display course capacity meta box
function display_course_capacity_meta_box($post) {
    $capacity = get_post_meta($post->ID, 'course_capacity', true);
    ?>
    <label for="course_capacity">Enrollment Capacity:</label>
    <input type="number" id="course_capacity" name="course_capacity" value="<?php echo esc_attr($capacity); ?>" min="1">
    <?php
}

// Save course capacity meta box data
function save_course_capacity_meta_box($post_id) {
    if (isset($_POST['course_capacity'])) {
        update_post_meta($post_id, 'course_capacity', intval($_POST['course_capacity']));
    }
}
add_action('save_post_courses', 'save_course_capacity_meta_box');



