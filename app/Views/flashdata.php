    <!-- show flash data -->
    <?php if ($f = $session->getFlashdata('message')) { ?>
        <div class="alert alert-<?= $session->getFlashdata('type'); ?> alert-dismissible fade show" role="alert">
            <?= $f; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php } ?>
    <!-- show flash data end -->