
<h2 class="page-title">Musik-CD's</h2>
<a href="/cd/views/admin/add_cd" class="btn btn-primary">Neue CD anlegen</a>
<br><br>

<table class="table table-striped alignmiddle">

    <thead>
    <tr>
        <th>Interpret</th>
        <th>Genre</th>
        <th>Jahr</th>
        <th>Cover</th>
        <th>Titel</th>
        <th>Bearbeiten</th>
        <th>Löschen</th>
    </tr>
    </thead>

    <tbody>
    <?php
    if (count($rows) > 0) :
        foreach ($rows as $key => $row) :
    ?>
    <tr>
        <td><?= $row[1] ?></td>
        <td><?= $row[2] ?></td>
        <td><?= $row[3] ?></td>
        <td>
            <?php if (empty($row[4])) : ?>
            <img src="../../public/images/noimage.jpg" class="cds-image">
            <?php else : ?>
            <img src="../../public/images/<?= $row[4] ?>" class="cds-image">
            <?php endif; ?>
        </td>
<?php
        $music = $titelOfCd->getFilesInDir("../../public/audio/".$row[0]);
?>
        <td><?= count($music) ?></td>

        <td><a href="/cd/views/admin/edit_cd?id=<?= $row[0] ?>" class="btn btn-info">Bearbeiten</a></td>
        <td><a href="/cd/views/admin/delete_cd?id=<?= $row[0] ?>&image=<?= $row[4] ?>" onclick="return confirm('Sind Sie sicher?')" class="btn btn-danger">Löschen</a></td>
    </tr>
    <?php
            endforeach;
        else :
            echo "Keine Informationen vorhanden.";
        endif;
        ?>
    </tbody>
</table>