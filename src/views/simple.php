<?php
    $presenter = new Kmd\Pagination\BootstrapPresenter($paginator);
?>

<?php if (Config::get('pagination::always_show') OR $paginator->getLastPage() > 1): ?>
    <ul class="pager">
        <?php echo $presenter->getPrevious(Config::get('pagination::simple.prev_link_text')) . $presenter->getNext(Config::get('pagination::simple.next_link_text'));
        ?>
    </ul>
<?php endif; ?>
