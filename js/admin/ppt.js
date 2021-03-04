var infos;
$('document').ready(get());
function get(){
    $.ajax({
        type: "GET",
        url: "/?action=getInfo",
        success: function (response) {
            infos = JSON.parse(response);
            buildInfos(infos);
        }
    });
}
function update_btn(id, paragraphe){
    let update = $('<button></button>').text('Modifier');
    update.addClass('btn');
    update.css('background-color', '#E27802');
    update.css('color', 'white');
    update.attr('data-toggle', 'modal');
    update.attr('data-target', '#UpdateModal');
    update.bind("click", function(){
        prepare(id, paragraphe);
    });
    return update;
}

function delete_btn(id){
    let del = $('<button></button>').text('Supprimer');
    del.addClass('btn');
    del.css('background-color', '#E27802');
    del.css('color', 'white');
    del.attr('data-toggle', 'modal');
    del.attr('data-target', '#DeleteModal');
    del.attr('onclick', 'prepare_supp('+id+')');
    return del;
}
function buildInfos(rows){
    $('#ppt-body').html('');
    for (let row of rows) {
        let tr = $('<tr></tr>');
        let paragraphe = $('<td></td>').text(row.paragraphe);
        let img = $('<img>');
        img.attr('src', row.image);
        img.attr('height', '300px');
        img.attr('width', '300px');
        img.attr('alt', 'Aucune image');
        let image = $('<td></td>');
        image.append(img);
        let maj = $('<td></td>');
        maj.append(update_btn(row.id, row.paragraphe));
        let supp = $('<td></td>');
        supp.append(delete_btn(row.id));
        tr.append(paragraphe);
        tr.append(image);
        tr.append(maj);
        tr.append(supp);
        $('#ppt-body').append(tr);
    }
}

function prepare(id, paragraphe){
    $('#paraMAJ').text(paragraphe);
    $('#id').attr('value', id);
}
function prepare_supp(id){
    $('#supp').attr('onclick', 'supp('+id+')');
}
function supp(id){
    $.ajax({
        type: "DELETE",
        url: "/?action=deleteInfo&id="+id,
        success: function (response) {
            get();
        }
    });
}