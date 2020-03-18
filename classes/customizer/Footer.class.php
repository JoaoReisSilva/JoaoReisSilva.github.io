<?php

namespace Customizer;

class Footer extends \AbstractCustomizerSection
{
    private $code;
    private $title;
    private $priority;
    private $wp_customize;
    private $elements;
    public function __construct(\WP_Customize_Manager $wp_customize, array $elements = array())
    {
        $this->code = 'footer';
        $this->title = __('Подвал сайта', TEXT_DOMAIN);
        $this->priority = 200;
        $this->wp_customize = $wp_customize;
        $this->elements = $elements;
        $this->create_section();
        foreach ($this->elements as $code => $element) {
            $this->create_element($code, $element);
        }
    }
    private function create_section()
    {
        $this->wp_customize->add_section($this->code, array(
            'title'    => $this->title,
            'priority' => $this->priority
        ));
    }
    private function create_element(string $code, object $element)
    {
        $label = $element->label;
        $type = $element->type;
        $default = $element->default ?? '';
        $complete_code = "{$this->code}_{$code}";
        $this->wp_customize->add_setting($complete_code, array(
            'default' => $default,
        ));
        $this->wp_customize->add_control(
            new \WP_Customize_Control(
                $this->wp_customize,
                $complete_code,
                array(
                'label'    => $label,
                'section'  => $this->code,
                'settings' => $complete_code,
                'type'     => $type
                )
            )
        );
    }
}