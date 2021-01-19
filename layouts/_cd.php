<div class="row">
    <h1 class="page-header">Musik-CD</h1>
    <div class="col-xs-12 col-md-5">
        <?php if (empty($row["image"])) : ?>
            <img src="../public/images/noimage.jpg" class="cd-image">
        <?php else : ?>
            <img src="../public/images/<?= $row["image"] ?>" class="cd-image">
        <?php endif; ?>
        <br>
    </div>
    <div class="col-xs-12 col-md-7">

        <h3><?= $row["interpret"] ?></h3>
        <h5><?= $row["desc"] ?></h5>

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
                    <td><?= $row["genre"] ?></td>
                    <td><?= $row["year"] ?></td>

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
                            <td><?= $music[$titleIndex++]['filename'] ?></td>
                            <td class="player-td">

                                <audio controls="controls">
                                    <source src="../public/audio/<?= $row["id"] ?>/<?= $music[$playerIndex++]["filename"] ?>" type="audio/mpeg" />
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