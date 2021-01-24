
<h1 class="page-title">Musik CD´s</h1>
<br>
<div class="row">
    <div class="col-lg-8 search-result">

    </div><!-- /.col-lg-6 -->
    <div class="col-lg-3">
        <div class="input-group">
            <input type="text" class="form-control cd-search-field" placeholder="CD Suchen">
        </div><!-- /input-group -->
    </div><!-- /.col-lg-6 -->
</div><!-- /.row -->
<br>
<div class="row cds">

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
</div>
<div class="row load-next-row">
<button class="btn btn-primary load-more-cds">weitere CD`s laden</button>
</div>
