<?php
namespace BusinessModel;

class PrivateTypeCase extends \AbstractBusinessModel
{
    private $entry_point;
    private $category_type;
    private $post_type;
    public function __construct()
    {
        $this->entry_point = null;
        $this->category_type = null;
        $this->post_type = 'case';
        add_action('init', array( $this, 'register_custom_type' ));
    }
    public function register_custom_type()
    {
        $labels = array(
            'name'               => __('Кейсы', TEXT_DOMAIN),
            'singular_name'      => __('Кейсы', TEXT_DOMAIN),
            'menu_name'          => __('Кейсы', TEXT_DOMAIN),
            'name_admin_bar'     => __('Новый кейс', TEXT_DOMAIN),
            'add_new'            => __('Добавить кейс', TEXT_DOMAIN),
            'add_new_item'       => __('Добавить новый кейс', TEXT_DOMAIN),
            'new_item'           => __('Новый кейс', TEXT_DOMAIN),
            'edit_item'          => __('Редактировать кейс', TEXT_DOMAIN),
            'view_item'          => __('Посмотреть кейс', TEXT_DOMAIN),
            'all_items'          => __('Список кейсов', TEXT_DOMAIN),
            'search_items'       => __('Искать кейсы', TEXT_DOMAIN),
            'parent_item_colon'  => __('Родительская категория', TEXT_DOMAIN),
            'not_found'          => __('Кейсы не найдены.', TEXT_DOMAIN),
            'not_found_in_trash' => __('В корзине не найдено ни одного кейса.', TEXT_DOMAIN),
        );

        $args = array(
            'labels'          => $labels,
            'public'          => false,
            'show_ui'         => true,
            'query_var'       => false,
            'rewrite'         => false,
            'taxonomies'      => array(),
            'capability_type' => 'post',
            'has_archive'     => false,
            'hierarchical'    => false,
            'menu_position'   => 20,
            'supports'        => array( 'title', 'revisions' )
        );
    
        register_post_type($this->post_type, $args);
    }
}
