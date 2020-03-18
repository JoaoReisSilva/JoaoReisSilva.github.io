<?php

const TEXT_DOMAIN = 'legalright';

/**
 * Abstract class definitions
 */

abstract class AbstractLoader
{
    public $name;
    public $should_load;
    public $deps;
    public $ver;
    public function process()
    {
    }
}

abstract class AbstractCustomizerSection
{
    private $code;
    private $title;
    private $priority;
    private $wp_customize;
    private $elements;
    private function create_section()
    {
    }
    private function create_element(string $code, AbstractCustomizerSectionElement $element)
    {
    }
}

abstract class AbstractCustomizerSectionElement
{
    public $label;
    public $type;
    public $default;
}

abstract class AbstractBusinessModel
{
    private $entry_point;
    private $category_type;
    private $post_type;
    public function register_custom_type()
    {
    }
}


require get_template_directory() . '/classes/loader/Loader.class.php';
require get_template_directory() . '/classes/loader/Lazy.class.php';

use Loader\Lazy;
use Loader\Init as Loader;

if (! isset($content_width)) {
    $content_width = 800;
}
 
if (! function_exists('legalright_theme_setup')) {
    function legalright_theme_setup(): void
    {
        add_theme_support('post-thumbnails');

        add_theme_support('title-tag');

        register_nav_menus(array(
            'header_menu' => __('Меню в шапке', TEXT_DOMAIN),
            'footer_menu' => __('Меню в подвале', TEXT_DOMAIN)
        ));

        add_theme_support('post-formats', array( 'aside', 'gallery', 'quote', 'image', 'video' ));

        add_filter('use_block_editor_for_post', '__return_false', 10);

        /**
         * Load scripts async
         */

        new Lazy();
    }
}

add_action('after_setup_theme', 'legalright_theme_setup');

add_action('wp_enqueue_scripts', function () {

    // Disable Windows Live Writer

    remove_action('wp_head', 'wlwmanifest_link');
    remove_action('wp_head', 'rsd_link');

    // Disable metatag "generator"

    remove_action('wp_head', 'wp_generator');

    // Remove WordPress version

    add_filter('the_generator', '__return_false');
});

/**
 * Disable WPCF7 styles
 */

add_action('wp_print_styles', function () {
    wp_deregister_style('contact-form-7');
}, 100);


/**
 * Load styles and scripts
 */

new Loader();

/**
 * Customizer
 */

require get_template_directory() . '/classes/customizer/Customizer.class.php';

use Customizer\Init as Customizer;

new Customizer();

/**
 * Business model
 */

require get_template_directory() . '/classes/business-model/Proceeding.class.php';

use BusinessModel\Proceeding;
new Proceeding();

require get_template_directory() . '/classes/business-model/Case.class.php';

use BusinessModel\PrivateTypeCase;
new PrivateTypeCase();

/**
 * Custom template tags
 */

require get_template_directory() . '/inc/template-tags.php';
