<?php foreach ($cds as $cd) {?>

    <div class="col-xs-12 col-md-4 p cd icon-item">
        <a data-id='<?php $util->valStr($cd['id']); ?>' class="pa musik-cd-btn icon-link">
            <?php if (empty($util->valStr($cd["image"]))) : ?>
                <img src="../../public/images/noimage.jpg" class="pimage">
            <?php else : ?>
                <img src="../public/images/<?= $util->valStr($cd["image"]) ?>" class="pimage">
            <?php endif; ?>
        </a>
        <h3><?= $util->valStr($cd['interpret']); ?></h3>
        <h4><?= $util->valStr($cd['genre']); ?></h4>
        <h4><?= $util->valStr($cd['year']); ?></h4>
        <a data-id='<?= $util->valStr($cd['id']); ?>' class="musik-cd-btn" >Mehr Details</a>
    </div>

<?php } ?>
