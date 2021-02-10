<h2 class="page-title">Musik-CD's</h2>
<a href="/cd/views/admin/add_cd" class="btn btn-primary">Neue CD anlegen</a>
<br><br>

<table class="table table-striped alignmiddle tablesorter">

    <thead>
    <tr>
        <th class="th-interpret">Interpret <i class="glyp-interpret glyphicon glyphicon-sort-by-alphabet-alt"></i></th>
        <th class="th-genre phone-admin-table">Genre <i class="glyp-genre glyphicon glyphicon-sort-by-alphabet-alt"></i></th>
        <th class="th-year phone-admin-table">Jahr <i class="glyp-year glyphicon glyphicon-sort-by-order"></i></th>
        <th data-sorter="false" class="phone-admin-table">Cover</th>
        <th class="th-title phone-admin-table">Titel <i class="glyp-title glyphicon glyphicon-sort-by-order"></i></th>
        <th data-sorter="false">Bearbeiten</th>
        <th data-sorter="false">Löschen</th>
    </tr>
    </thead>

    <tbody>
    <?php
    if (count($rows) > 0) :
        foreach ($rows as $key => $row) :
            ?>
            <tr>
                <td><?= $util->valStr($row[1]) ?></td>
                <td class="phone-admin-table"><?= $util->valStr($row[2]) ?></td>
                <td class="phone-admin-table"><?= $util->valStr($row[3]) ?></td>
                <td class="phone-admin-table">
                    <?php if (empty($util->valStr($row[4]))) : ?>
                        <img src="../../../public/images/noimage.jpg" class="cds-image">
                    <?php else : ?>
                        <img src="../../public/images/<?= $util->valStr($row[4]) ?>" class="cds-image">
                    <?php endif; ?>
                </td>
                <?php
                $music = $titelOfCd->getFilesInDir("../../public/audio/" . $util->valStr($row[0]));
                ?>
                <td class="phone-admin-table"><?= count($music) ?></td>

                <td><a href="/cd/views/admin/edit_cd?id=<?= $util->valStr($row[0]) ?>"
                       class="btn btn-info">Bearbeiten</a></td>
                <td>
                    <a href="/cd/views/admin/delete_cd?id=<?= $util->valStr($row[0]) ?>&image=<?= $util->valStr($row[4]) ?>"
                       onclick="return confirm('Sind Sie sicher?')" class="btn btn-danger">Löschen</a></td>
            </tr>
        <?php
        endforeach;
    else :
        echo "Keine Informationen vorhanden.";
    endif;
    ?>
    </tbody>
</table>

<script>
    $(".table").tablesorter({
        theme: 'blue',
        // sort on the first column and second column in ascending order
        sortList: [[0, 0], [1, 0]]
    });
$(document).ready(function () {

    $('.th-interpret').click(function () {
        if ($('.glyp-interpret').hasClass('glyphicon-sort-by-alphabet')) {
            $('.glyp-interpret').removeClass('glyphicon-sort-by-alphabet').addClass('glyphicon-sort-by-alphabet-alt')
        } else if ($('.glyp-interpret').hasClass('glyphicon-sort-by-alphabet-alt')) {
            $('.glyp-interpret').removeClass('glyphicon-sort-by-alphabet-alt').addClass('glyphicon-sort-by-alphabet')
        }
    })
    $('.th-genre').click(function () {
        if ($('.glyp-genre').hasClass('glyphicon-sort-by-alphabet')) {
            $('.glyp-genre').removeClass('glyphicon-sort-by-alphabet').addClass('glyphicon-sort-by-alphabet-alt')
        } else if ($('.glyp-genre').hasClass('glyphicon-sort-by-alphabet-alt')) {
            $('.glyp-genre').removeClass('glyphicon-sort-by-alphabet-alt').addClass('glyphicon-sort-by-alphabet')
        }
    })
    $('.th-year').click(function () {
        if ($('.glyp-year').hasClass('glyphicon-sort-by-order')) {
            $('.glyp-year').removeClass('glyphicon-sort-by-order').addClass('glyphicon-sort-by-order-alt')
        } else if ($('.glyp-year').hasClass('glyphicon-sort-by-order-alt')) {
            $('.glyp-year').removeClass('glyphicon-sort-by-order-alt').addClass('glyphicon-sort-by-order')
        }
    })
    $('.th-title').click(function () {
        if ($('.glyp-title').hasClass('glyphicon-sort-by-order')) {
            $('.glyp-title').removeClass('glyphicon-sort-by-order').addClass('glyphicon-sort-by-order-alt')
        } else if ($('.glyp-title').hasClass('glyphicon-sort-by-order-alt')) {
            $('.glyp-title').removeClass('glyphicon-sort-by-order-alt').addClass('glyphicon-sort-by-order')
        }
    })

})


</script>