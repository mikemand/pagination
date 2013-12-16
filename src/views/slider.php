<?php
    $presenter = new Kmd\Pagination\BootstrapPresenter($paginator);
?>

<?php if (Config::get('pagination::always_show') OR $paginator->getLastPage() > 1): ?>
    <div class="<?php echo Config::get('pagination::classes') ?>">
        <ul>
            <?php echo $presenter->render(); ?>
        </ul>
    </div>
<?php endif; ?>
