<h2 class="page-title">CD bearbeiten</h2>
<a href="/cd/views/admin/cds" class="btn btn-primary">Zurück zu allen CD's</a>
<br><br>

<div class="panel panel-info cover-panel">
    <div class="panel-heading">
        <h3 class="panel-title">Cover</h3>
    </div>
    <div class="panel-body">
        <form>
            <div class="form-group ">
                <p>
                    <?php if (empty($util->valStr($rowCD["image"]))) : ?>
                        <img src="../../../public/images/noimage.jpg" class="cd-image">
                    <?php else : ?>
                        <img src="../../public/images/<?= $util->valStr($rowCD['image']) ?>" class="cd-image">
                    <?php endif; ?>
                </p>
            </div>
            <div class="form-group">
                <label>Neues Cover hochladen</label>
                <input type="file" accept="image/png, image/jpeg" class="form-control btn btn-info input-upload" name="image" id="img">
                <br>
                <img src="#" id="imgPreview" alt="Vorschau-Bild">
            </div>
            <input type="button" name="submit" class="btn btn-success submit-image" value="Bild aktuallisieren"></input>
        </form>
        <div class="msb-box-image"></div>
    </div>
    <!-- error msg -->
</div>
<br>
<!--  -->
<div class="panel panel-info">
    <div class="panel-heading">
        <h3 class="panel-title">CD Daten</h3>
    </div>
    <div class="panel-body">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label>Interpret</label>
                <input type="text" class="form-control" name="interpret" data-data="interpret" value="<?= $util->valStr($rowCD['interpret']) ?>" placeholder="Interpret" required>
            </div>
            <div class="form-group ">
                <label>Beschreibung</label>
                <textarea type="text" class="form-control" name="desc" cols="30" rows="10" placeholder="Beschreibung" required>
               <?php echo $util->valStr($rowCD['desc'])?>
                </textarea>
            </div>
            <div class="form-group">
                <label>Genre</label>
                <input type="text" class="form-control" name="genre" data-data="genre" value="<?= $util->valStr($rowCD['genre']) ?>" placeholder="Genre" required>
            </div>
            <div class="form-group">
                <label>Jahr</label>
                <input name="year" type="number" data-data="year" min="1900" max="2021" step="1" class="form-control" value="<?= $util->valStr($rowCD['year']) ?>" placeholder="Jahr" required>
            </div>
            <input type="button" class="btn btn-success submit-data" value="CD Daten aktuallisieren"></input>
        </form>
        <!-- error msg -->
        <div class="msb-box-data"></div>
    </div>
</div>
<br>

<!--  -->
<div class="panel panel-info panel-title">
    <div class="panel-heading">
        <h3 class="panel-title">Titel</h3>
    </div>
    <div class="panel-body">
        <form>

            <div class="table-responsive">
                <table class="table table-hover alignmiddle">
                    <tbody>

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
                                <tr class="title-row">
                                    <td class="titleName" name="title<?= $titleNameNum++; ?>" placeholder="Titel">
                                        <?= $util->valStr($music[$titleIndex++]['filename']) ?>
                                    </td>
                                    <td class="player-td" style="width:30%">
                                        <audio controls="controls">
                                            <source src="../../public/audio/<?= $util->valStr($rowCD['id']) ?>/<?= $util->valStr($music[$playerIndex++]['filename']) ?>" type="audio/mpeg" />
                                            Your browser does not support the audio element.
                                        </audio>
                                    </td>
                                    <td class="delete-one-title">
                                    <i class="glyphicon glyphicon-trash"></i>
                                    </td>
                                </tr>
                        <?php
                            endwhile;
                        else :
                            echo "<div class='alert alert-info' role='alert'>Keine Titel für \"" . $util->valStr($rowCD['interpret']) . "\" gespeichert.</div>";
                        endif;
                        ?>
                    </tbody>
                </table>
            </div>
            <label>Upload Titel</label>
            <input name="audio" type="file" value="2048576" multiple accept="audio/mpeg" class="form-control btn btn-info input-upload">
            <br>
            <input type="button" class="btn btn-success submit-titel" value="Titel aktualisieren"></input>
        </form>
        <!-- error msg -->
        <div class="msb-box-title"></div>
    </div>
</div>