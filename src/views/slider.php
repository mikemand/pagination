<?php
    $presenter = new Kmd\Pagination\BootstrapPresenter($paginator);
?>

<?php if (Config::get('pagination::always_show') OR $paginator->getLastPage() > 1): ?>
    <?php if (Config::get('pagination::bootstrap_version') === '2'): ?>
    <div class="<?php echo Config::get('pagination::classes') ?>">
        <ul>
    <?php else: ?>
        <ul class="<?php echo Config::get('pagination::classes') ?>">
    <?php endif; ?>
            <?php echo $presenter->render(); ?>
    <?php if (Config::get('pagination::bootstrap_version') === '2'): ?>
        </ul>
    </div>
    <?php else: ?>
        </ul>
    <?php endif; ?>
<?php endif; ?>