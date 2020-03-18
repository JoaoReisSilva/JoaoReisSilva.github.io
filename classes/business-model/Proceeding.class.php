<?php
namespace BusinessModel;

class Proceeding extends \AbstractBusinessModel
{
    private $entry_point;
    private $category_type;
    private $post_type;
    public function __construct()
    {
        $this->entry_point = 'proceedings';
        $this->category_type = 'counterparty_type';
        $this->post_type = 'proceeding';
        add_action('init', array( $this, 'register_custom_type' ));
        add_action('init', array( $this, 'register_custom_taxonomy' ));
        add_filter('rewrite_rules_array', array( $this, 'add_archive_rewrite_rules' ));
        add_action('init', array( $this, 'add_taxonomy_rewrite_rules' ), 11);
        add_filter('post_type_link', array( $this, 'post_type_link' ), 10, 2);
        add_filter('post_type_archive_link', array( $this, 'post_type_archive_link' ), 10, 2);
        add_action('pre_get_posts', array( $this, 'pagination_filter' ));
    }
    public function register_custom_type()
    {
        $labels = array(
            'name'               => __('Практики', TEXT_DOMAIN),
            'singular_name'      => __('Практики', TEXT_DOMAIN),
            'menu_name'          => __('Практики', TEXT_DOMAIN),
            'name_admin_bar'     => __('Новая практика', TEXT_DOMAIN),
            'add_new'            => __('Добавить практику', TEXT_DOMAIN),
            'add_new_item'       => __('Добавить новую практику', TEXT_DOMAIN),
            'new_item'           => __('Новая практика', TEXT_DOMAIN),
            'edit_item'          => __('Редактировать практику', TEXT_DOMAIN),
            'view_item'          => __('Посмотреть практику', TEXT_DOMAIN),
            'all_items'          => __('Список практик', TEXT_DOMAIN),
            'search_items'       => __('Искать практики', TEXT_DOMAIN),
            'parent_item_colon'  => __('Родительская категория', TEXT_DOMAIN),
            'not_found'          => __('Практика не найдена.', TEXT_DOMAIN),
            'not_found_in_trash' => __('В корзине не найдено ни одной практики.', TEXT_DOMAIN),
        );

        $args = array(
            'labels'          => $labels,
            'public'          => true,
            'show_ui'         => true,
            'query_var'       => true,
            'rewrite'         => array( 'slug' => "{$this->entry_point}/%{$this->category_type}%" ),
            'taxonomies'      => array( $this->category_type ),
            'capability_type' => 'post',
            'has_archive'     => true,
            'hierarchical'    => true,
            'menu_position'   => 10,
            'supports'        => array( 'title', 'editor', 'excerpt', 'revisions' )
        );
    
        register_post_type($this->post_type, $args);
    }
    
    public function register_custom_taxonomy()
    {
        $labels = array(
            'name'                       => __('Типы контрагентов', TEXT_DOMAIN),
            'singular_name'              => __('Тип контрагента', TEXT_DOMAIN),
            'search_items'               => __('Поиск по типам контрагентов', TEXT_DOMAIN),
            'all_items'                  => __('Все типы контрагентов', TEXT_DOMAIN),
            'popular_items'              => __('Часто используемые типы контрагентов', TEXT_DOMAIN),
            'parent_item'                => null,
            'parent_item_colon'          => null,
            'edit_item'                  => __('Редактировать тип контрагента', TEXT_DOMAIN),
            'update_item'                => __('Обновить тип контрагента', TEXT_DOMAIN),
            'add_new_item'               => __('Добавить новый тип контрагента', TEXT_DOMAIN),
            'new_item_name'              => __('Название нового типа контрагента', TEXT_DOMAIN),
            'separate_items_with_commas' => __('Названия типов контрагентов', TEXT_DOMAIN),
            'add_or_remove_items'        => __('Добавить / Удалить типы контрагентов', TEXT_DOMAIN),
            'choose_from_most_used'      => __('Выбрать из часто используемых типов контрагентов', TEXT_DOMAIN),
            'not_found'                  => __('Типы контрагентов не найдены.', TEXT_DOMAIN),
            'menu_name'                  => __('Типы контрагентов', TEXT_DOMAIN),
        );
    
        $args = array(
            'hierarchical'      => true,
            'labels'            => $labels,
            'public'            => true,
            'show_ui'           => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite'           => array( 'slug' => $this->entry_point )
        );
    
        register_taxonomy($this->category_type, $this->post_type, $args);
    }

    public function add_archive_rewrite_rules(array $rules)
    {
        $new = array();
      
        $new["{$this->entry_point}?$"] = "index.php?post_type={$this->post_type}";
        $new["{$this->entry_point}/page/([^/]+)/?$"] = 'index.php?post_type=' . $this->post_type . '&paged=$matches[1]';
      
        return array_merge($new, $rules);
    }
      
    public function add_taxonomy_rewrite_rules()
    {
        add_rewrite_tag("%{$this->category_type}%", '([^/]+)', "{$this->category_type}=");
        add_permastruct("{$this->entry_point}", "{$this->entry_point}/%{$this->category_type}%", true);
    }

    public function post_type_link(string $link, object $post)
    {
        if ($post->post_type == $this->post_type) {
            if ($terms = get_the_terms($post->ID, $this->category_type)) {
                $link = str_replace("%{$this->category_type}%", current($terms)->slug, $link);
            }
        }
    
        return $link;
    }
 
    public function post_type_archive_link(string $link, string $post_type)
    {
        if ($post_type == $this->post_type) {
            $link = str_replace("%{$this->category_type}%/", '', $link);
        }
    
        return $link;
    }

    public function pagination_filter(object $query)
    {
        if (! is_admin() && $query->is_main_query()) {
            if ($query->is_tax($this->category_type) || is_post_type_archive($this->post_type)) {
                $query->set('posts_per_page', -1);
            }
        }
    }
}
