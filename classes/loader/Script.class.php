<?php

namespace Loader;

class Script extends \AbstractLoader
{
    public function __construct(array $args)
    {
        $this->name = $args['name'];
        $this->is_std_src = $args['is_std_lib'] ?? false;
        $this->should_load = $args['should_load'] ?? true;
        $this->deps = $args['deps'] ?? array();
        $this->ver = $args['ver'] ?? '1.0';
        $this->process();
    }
    public function process()
    {
        if ($this->is_std_src) {
            wp_enqueue_script($this->name);
        } elseif ($this->should_load) {
            wp_register_script($this->name, get_template_directory_uri() . "/assets/js/{$this->name}.js", $this->deps, $this->ver, true);
            wp_enqueue_script($this->name);
        }
    }
}
