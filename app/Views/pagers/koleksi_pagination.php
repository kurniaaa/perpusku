<?php $pager->setSurroundCount(2) ?>
<nav class="navigation pagination text-center">
    <h2 class="screen-reader-text">Posts navigation</h2>
    <div class="nav-links">
        <?php if ($pager->hasPrevious()) : ?>
            <a class="prev page-numbers" href="<?= $pager->getPrevious() ?>"><i class="fa fa-long-arrow-left"></i> <?= lang('Pager.previous') ?></a>
        <?php endif ?>
        <?php foreach ($pager->links() as $link) : ?>
            <a class="page-numbers <?= $link['active'] ? 'current' : '' ?>" href="<?= $link['uri'] ?>">
                <?= $link['title'] ?>
            </a>
        <?php endforeach ?>
        <?php if ($pager->hasNext()) : ?>
            <a class="next page-numbers" href="<?= $pager->getNext() ?>"><?= lang('Pager.next') ?> <i class="fa fa-long-arrow-right"></i></a>
        <?php endif ?>
    </div>
</nav>