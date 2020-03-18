<?php

namespace Loader;

class Lazy
{
    public function __construct()
    {
        if (!is_admin()) {
            add_filter('script_loader_tag', array( $this, 'filter' ), 10, 2);
        }
    }
    public function filter(string $tag, string $handle): string
    {
        foreach ([ 'defer' ] as $attr) { // 'async'
            if (wp_scripts()->get_data($handle, $attr)) {
                continue;
            }
            // Prevent adding attribute when already added
            if (! preg_match(":\s$attr(=|>|\s):", $tag)) {
                $tag = preg_replace(':(?=></script>):', " $attr", $tag, 1);
            }
            // Only allow async or defer, not both.
            break;
        }
        return $tag;
    }
}
