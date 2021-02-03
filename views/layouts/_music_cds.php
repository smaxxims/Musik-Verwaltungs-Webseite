<div class="music-cds-div">
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

        <?php foreach ($cds as $cd) { ?>

            <div class="col-xs-12 col-md-4 p cd icon-item">
                <h3><?= $util->valStr($cd['interpret']); ?></h3>
                <a data-id='<?= $util->valStr($cd['id']); ?>' class="pa musik-cd-btn icon-link">
                    <?php if (empty($util->valStr($cd["image"]))) : ?>
                        <img src="../../public/images/noimage.jpg" class="pimage">
                    <?php else : ?>
                        <img src="../public/images/<?= $util->valStr($cd["image"]) ?>" class="pimage">
                    <?php endif; ?>
                </a>
                <div class="cd-desc">
                    <h4><?= $util->valStr($cd['genre']); ?></h4>
                    <h4><?= $util->valStr($cd['year']); ?></h4>
                    <a data-id='<?= $util->valStr($cd['id']); ?>' class="musik-cd-btn">Mehr Details</a>
                </div>
            </div>


        <?php } ?>
    </div>
    <div class="row load-next-row">
        <button class="btn btn-primary load-more-cds">weitere CD`s laden</button>
    </div>

    <svg class="scroll-top-arrow" width="32" height="32" viewBox="0 0 100 100">
        <path fill="#16c3cf"
              d="m50 0c-13.262 0-25.98 5.2695-35.355 14.645s-14.645 22.094-14.645 35.355 5.2695 25.98 14.645 35.355 22.094 14.645 35.355 14.645 25.98-5.2695 35.355-14.645 14.645-22.094 14.645-35.355-5.2695-25.98-14.645-35.355-22.094-14.645-35.355-14.645zm20.832 62.5-20.832-22.457-20.625 22.457c-1.207 0.74219-2.7656 0.57812-3.7891-0.39844-1.0273-0.98047-1.2695-2.5273-0.58594-3.7695l22.918-25c0.60156-0.61328 1.4297-0.96094 2.2891-0.96094 0.86328 0 1.6914 0.34766 2.293 0.96094l22.918 25c0.88672 1.2891 0.6875 3.0352-0.47266 4.0898-1.1562 1.0508-2.9141 1.0859-4.1133 0.078125z"></path>
    </svg>

</div>