<?php

namespace Loader;

require 'Style.class.php';
require 'Script.class.php';

use Loader\Style;
use Loader\Script;

class Init
{
    public function __construct()
    {
        add_action('wp_enqueue_scripts', array( $this, 'list' ));
    }
    public function list()
    {
        new Style(array( 'name' => 'reset', 'should_load' => (bool) 'always' ));
        new Style(array( 'name' => '_index', 'should_load' => (bool) 'always' ));
        new Style(array( 'name' => '_career', 'should_load' => is_page_template('page-career.php') ));
        new Style(array( 'name' => '_contacts', 'should_load' => is_page_template('page-contacts.php') ));
        new Style(array( 'name' => '_news', 'should_load' => is_page_template('page-home.php') || is_archive() || is_single() ));
        new Style(array( 'name' => '_services', 'should_load' => is_page_template('page-home.php') || is_post_type_archive('proceeding') || is_tax('counterparty_type') || is_singular('proceeding') ));
        new Style(array( 'name' => 'custom', 'should_load' => (bool) 'always' ));
        new Style(array( 'name' => 'jquery.fancybox' ));
        new Style(array( 'name' => 'slick', 'should_load' => (bool) 'always' ));
        new Style(array( 'name' => 'slick-theme', 'should_load' => (bool) 'always' ));
        new Script(array( 'name' => 'jquery', 'is_std_lib' => true ));
        new Script(array( 'name' => 'jquery.fancybox.min', 'deps' => array('jquery') ));
        new Script(array( 'name' => 'slick.min', 'deps' => array('jquery'), 'should_load' => (bool) 'always' ));
        new Script(array( 'name' => 'scripts', 'deps' => array('jquery') ));
    }
}
