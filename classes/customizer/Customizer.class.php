<?php

namespace Customizer;

require 'Header.class.php';
require 'Footer.class.php';

class Init
{
    public function __construct()
    {
        add_action('customize_register', array( $this, 'list' ));
    }
    public function list(\WP_Customize_Manager $wp_customize)
    {
        new Header($wp_customize, array(
            'logo_title' => new class extends \AbstractCustomizerSectionElement {
                public function __construct()
                {
                    $this->label = __('Заголовок логотипа', TEXT_DOMAIN);
                    $this->type = 'text';
                }
            },
            'logo_subtitle' => new class extends \AbstractCustomizerSectionElement {
                public function __construct()
                {
                    $this->label = __('Подзаголовок логотипа', TEXT_DOMAIN);
                    $this->type = 'text';
                }
            },
            'phone' => new class extends \AbstractCustomizerSectionElement {
                public function __construct()
                {
                    $this->label = __('Телефон', TEXT_DOMAIN);
                    $this->type = 'tel';
                }
            },
        ));
        new Footer($wp_customize, array(
            'logo_title' => new class extends \AbstractCustomizerSectionElement {
                public function __construct()
                {
                    $this->label = __('Заголовок логотипа', TEXT_DOMAIN);
                    $this->type = 'text';
                }
            },
            'logo_subtitle' => new class extends \AbstractCustomizerSectionElement {
                public function __construct()
                {
                    $this->label = __('Подзаголовок логотипа', TEXT_DOMAIN);
                    $this->type = 'text';
                }
            },
            'copyright' => new class extends \AbstractCustomizerSectionElement {
                public function __construct()
                {
                    $this->label = __('Копирайт', TEXT_DOMAIN);
                    $this->type = 'text';
                }
            },
            'phone' => new class extends \AbstractCustomizerSectionElement {
                public function __construct()
                {
                    $this->label = __('Телефон', TEXT_DOMAIN);
                    $this->type = 'tel';
                }
            },
            'opening_hours' => new class extends \AbstractCustomizerSectionElement {
                public function __construct()
                {
                    $this->label = __('Часы работы', TEXT_DOMAIN);
                    $this->type = 'text';
                }
            },
            'email' => new class extends \AbstractCustomizerSectionElement {
                public function __construct()
                {
                    $this->label = __('Эл. почта', TEXT_DOMAIN);
                    $this->type = 'email';
                }
            },
            'address' => new class extends \AbstractCustomizerSectionElement {
                public function __construct()
                {
                    $this->label = __('Адрес', TEXT_DOMAIN);
                    $this->type = 'textarea';
                }
            },
        ));
    }
}
