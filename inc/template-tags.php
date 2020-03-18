<?php

// the_breadcrumbs

new class {
    private $position;
    public function __construct()
    {
        if (function_exists('yoast_breadcrumb')) {
            $this->position = 0;
            add_filter('wpseo_breadcrumb_single_link', array($this, 'filter_link'));
            add_filter('wpseo_breadcrumb_output_wrapper', array($this, 'filter_wrapper'));
            add_filter('wpseo_breadcrumb_separator', '__return_false');
            add_filter('wpseo_breadcrumb_output_id', '__return_false');
            add_filter('wpseo_breadcrumb_output_class', array($this, 'filter_wrapper_class'));
        }
    }
    public function filter_wrapper(string $wrapper)
    {
        return 'ul';
    }
    public function filter_wrapper_class(string $wrapper_class)
    {
        return 'breadcrumbs-list';
    }
    public function filter_link(string $link_output)
    {
        preg_match('/href="([^\"]+)"/', $link_output, $urls);

        $url = empty($urls) ? null : $urls[1];

        preg_match('/>([^>|<]+)</', $link_output, $titles);

        $title = empty($titles) ? null : $titles[1];

        if ($url) {
            $this->position++;
            $outout = <<<HTML
            <li
                class="breadcrumbs-list__item"
                itemscope=""
                itemprop="itemListElement"
                itemtype="http://schema.org/ListItem"
            >
                <a href="{$url}" itemprop="item">
                    <span itemprop="name">{$title}</span>
                    <meta itemprop="position" content="{$this->position}" />
                </a>
            </li>
            <li class="breadcrumbs-list__divider"><span></span></li>
            HTML;
        } else {
            $outout = <<<HTML
            <li class="breadcrumbs-list__item breadcrumbs-list__item_current">
                <span rel="nofollow"><span>{$title}</span></span>
            </li>
            HTML;
        }
        return $outout;
    }
};

function the_breadcrumbs(string $before = null, string $after = null)
{
    if (function_exists('yoast_breadcrumb')) {
        yoast_breadcrumb($before, $after);
    }
}

// the_archive_title

new class {
    public function __construct()
    {
        add_filter('get_the_archive_title', array($this, 'remove_prefix'));
    }
    public function remove_prefix(string $title)
    {
        return preg_replace('~^[^:]+: ~', '', $title);
    }
};

// the_excerpt

new class {
    private $length;
    private $more;
    public function __construct()
    {
        $this->length = 15;
        $this->more = '&hellip;';
        add_filter('excerpt_length', array($this, 'filter_length'));
        add_filter('excerpt_more', array($this, 'filter_more'));
    }
    public function filter_length()
    {
        return $this->length;
    }
    public function filter_more()
    {
        return $this->more;
    }
};
