<?php
	$presenter = new Kmd\Pagination\BootstrapPresenter($paginator);

	$trans = $environment->getTranslator();
?>

<?php if (Config::get('pagination::always_show') OR $paginator->getLastPage() > 1): ?>
	<ul class="pager">
		<?php
			echo $presenter->getPrevious($trans->trans('pagination::pagination.simple.prev_link_text'));

			echo $presenter->getNext($trans->trans('pagination::pagination.simple.next_link_text'));
		?>
	</ul>
<?php endif; ?>
