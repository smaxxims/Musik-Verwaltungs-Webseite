<div class="row scrollDesign">
    <h1 class="page-header">Musik-CD</h1>
    <div class="col-xs-12 col-md-5">
        <?php if (empty($util->valStr($row["image"]))) : ?>
            <img src="../../public/images/noimage.jpg" class="cd-image">
        <?php else : ?>
            <img src="../public/images/<?= $util->valStr($row["image"]) ?>" class="cd-image">
        <?php endif; ?>
        <br>
    </div>
    <div class="col-xs-12 col-md-7">

        <h3><?= $util->valStr($row["interpret"]) ?></h3>
        <h5><?= $util->valStr($row["desc"]) ?></h5>

        <table class="table alignmiddle">
            <thead>
                <tr>
                    <th>Genre</th>
                    <th>Jahr</th>
                    <th>Titel</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td><?= $util->valStr($row["genre"]) ?></td>
                    <td><?= $util->valStr($row["year"]) ?></td>

                    <td><?= count($music) ?></td>

                </tr>
            </tbody>
        </table>
    </div>

    <div class="col-xs-12 row cds">

        <table class="table alignmiddle">
            <thead>
                <tr>
                    <th>Titel</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>';
                <?php
                if (count($music) > 0) :

                    $titleNameNum = 1;
                    $titleIndex = 0;
                    $playerIndex = 0;
                    $titleLengthNum = 1;
                    $check = count($music);

                    while ($check > 0) :
                        $check--;
                ?>
                        <tr class="tr-hover">
                            <td class="cd-title"><?= $util->valStr($music[$titleIndex++]['filename']) ?></td>
                            <td class="player-td">
                                <audio controls="controls">
                                    <source src="../public/audio/<?= $util->valStr($row["id"]) ?>/<?= $util->valStr($music[$playerIndex++]["filename"]) ?>" type="audio/mpeg" />
                                    Your browser does not support the audio element.
                                </audio>
                            </td>
                        </tr>
                <?php

                    endwhile;
                endif;
                ?>
            </tbody>
        </table>
    </div>
</div>