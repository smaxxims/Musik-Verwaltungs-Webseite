<?php foreach ($cds as $cd) {?>

    <div class="col-xs-12 col-md-4 p cd icon-item">
        <a data-id='<?= $cd['id']; ?>' class="pa musik-cd-btn icon-link">
            <?php if (empty($cd["image"])) : ?>
                <img src="../../public/images/noimage.jpg" class="pimage">
            <?php else : ?>
                <img src="../public/images/<?= $cd["image"] ?>" class="pimage">
            <?php endif; ?>
        </a>
        <h3><?= $cd['interpret']; ?></h3>
        <h4><?= $cd['genre']; ?></h4>
        <h4><?= $cd['year']; ?></h4>
        <a data-id='<?= $cd['id']; ?>' class="musik-cd-btn" >Mehr Details</a>
    </div>

<?php } ?>
