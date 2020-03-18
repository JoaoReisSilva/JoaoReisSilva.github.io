<?php

namespace Loader;

class Style extends \AbstractLoader
{
    public function __construct(array $args)
    {
        $this->name = $args['name'];
        $this->should_load = $args['should_load'] ?? true;
        $this->deps = $args['deps'] ?? array();
        $this->ver = $args['ver'] ?? '1.0';
        $this->process();
    }
    public function process() {
        if ($this->should_load) {
            wp_register_style($this->name, get_template_directory_uri() . "/assets/css/{$this->name}.css", $this->deps, $this->ver);
            wp_enqueue_style($this->name);
        }
    }
}
