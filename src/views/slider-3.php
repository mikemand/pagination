<?php
    $presenter = new Illuminate\Pagination\BootstrapPresenter($paginator);
?>

<?php if (Config::get('pagination::always_show') OR $paginator->getLastPage() > 1): ?>
    <ul class="<?php echo Config::get('pagination::classes') ?>">
        <?php echo $presenter->render(); ?>
    </ul>
<?php endif; ?>
