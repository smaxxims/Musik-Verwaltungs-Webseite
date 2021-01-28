
function init () {
    updateCdImage('.submit-image')
    updateCdAudio('.submit-titel')
    updateCdData('.submit-data')
    createNewCd('.submit-add-cd')
    deleteOneTitle('.delete-one-title')
}

// add new cd
function createNewCd(btn) {

    $(btn).mousedown(function (event) {

        let formData = new FormData()
        formData.append('interpret', $('input[name=interpret]').val())
        formData.append('desc', $('input[name=desc]').val())
        formData.append('genre', $('input[name=genre]').val())
        formData.append('year', $('input[name=year]').val())
        formData.append('image', $('input[type=file]')[0].files[0])

        $.ajax({

            type: "POST",
            url: "../../views/admin/add_cd_ajax",
            data: formData,
            contentType: false,
            processData: false,
            error: function (e) {
                console.log(e)
            },
            success: function (res) {
                $('.msb-box-data').hide().html(res).fadeIn('slow')
            }
        })
    })
}

// post update cd image
function updateCdImage(btn) {
    $(btn).mousedown(function (event) {

        const queryString = window.location.search
        const urlParams = new URLSearchParams(queryString)
        const id = urlParams.get('id')

        let formData = new FormData()

        $('input[type=file]').each(function () {
            formData.append('image', $('input[type=file]')[0].files[0])
            formData.append('id', id)
        })

        $.ajax({

            type: "POST",
            url: "../../views/admin/upload",
            dataType: 'text',
            data: formData,
            contentType: false,
            processData: false,
            error: function (e) {
                console.log(e)
            },
            success: function (res) {
                $('.msb-box-image').hide().html(res).fadeIn('slow')

            }
        })
    })
}

// post update cd audio
function updateCdAudio(btn) {

    fileList = [];

    $('input[name=audio]').on('change', function (event) {

        for (var i = 0; i < this.files.length; i++) {
            fileList.push(this.files[i]);
        }
        console.log(fileList);
        // file size show

        //
        let size = 0
        for (let i = 0; i < fileList.length; i++) {
             size = size + fileList[i].size 
        }
        console.log(niceBytes(size))
        $('.msb-box-title').hide().html("<div class='alert alert-info' role='alert'>Gesamtgröße:" +niceBytes(size)+"</div>").fadeIn('slow')

        return fileList
    })

    $(btn).mousedown(function (event) {

        const queryString = window.location.search
        const urlParams = new URLSearchParams(queryString)
        const id = urlParams.get('id')

        var data = new FormData();
        fileList.forEach(function (file, i) {
            data.append('audio'+i, file);
        });
        data.append('id', id)

        $.ajax({

            type: "POST",
            url: "../../views/admin/audio",
            data: data,
            contentType: false,
            processData: false,
            error: function (e) {
                console.log(e)
            },
            success: function (res) {
                $('.msb-box-title').html(res)
            }
        })
    })
}

// bytes in ...
const units = ['bytes', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB'];
function niceBytes(x){

    let l = 0, n = parseInt(x, 10) || 0;

    while(n >= 1024 && ++l){
        n = n/1024;
    }
    //include a decimal point and a tenths-place digit if presenting
    //less than ten of KB or greater units
    return(n.toFixed(n < 10 && l > 0 ? 1 : 0) + ' ' + units[l]);
}

// post update cd data
function updateCdData(btn) {

    $(btn).mousedown(function (event) {

        const queryString = window.location.search
        const urlParams = new URLSearchParams(queryString)
        const id = urlParams.get('id')

        let formData = new FormData()
        formData.append('interpret', $('input[name=interpret]').val())
        formData.append('desc', $('textarea[name=desc]').val())
        formData.append('genre', $('input[name=genre]').val())
        formData.append('year', $('input[name=year]').val())
        formData.append('id', id)

        $.ajax({

            type: "POST",
            url: "../../views/admin/cd_data",
            data: formData,
            contentType: false,
            processData: false,
            error: function (e) {
                console.log(e)
            },
            success: function (res) {
                $('.msb-box-data').hide().html(res).fadeIn('slow')
            }
        })
    })
}

// delete one title
function deleteOneTitle(btn) {

    $(btn).mousedown(function (event) {

        const queryString = window.location.search
        const urlParams = new URLSearchParams(queryString)
        const id = urlParams.get('id')

        let formData = new FormData()
        formData.append('title', $(this).siblings('.titleName').text().trim())
        formData.append('id', id)

        if (confirm($(this).siblings('.titleName').text().trim() + "\n\n Wirklich löschen?\n")) {
        $.ajax({

            type: "POST",
            url: "../../views/admin/delete_one_title",
            data: formData,
            contentType: false,
            processData: false,
            error: function (e) {
                console.log(e)
            },
            success: function (res) {
                $('.msb-box-title').html(res)

                $('.title-row').each(function(i) {
                    if (res.includes($(this).children('.titleName').text().trim()) && res.includes('Gelöscht:')) {
                        $(this).fadeOut('slow')
                    } 
                })
            }
        })
        } else {
            return
        }
    })
}


init()