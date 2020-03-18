<nav class="navigation pagination" role="navigation">
  <div class="nav-links">
    <?php echo paginate_links(array(
        'prev_text' => '',
        'next_text' => '',
        'type'      => 'plain',
        'current'   => max(1, get_query_var('paged')),
        'total'     => $cases_max_num_pages,
    )); ?>
  </div>
</nav>