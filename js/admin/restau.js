var restau;
$('document').ready(get());
function get(){
    $.ajax({
        type: "GET",
        url: "/?action=getRestau",
        success: function (response) {
            restau = JSON.parse(response);
            buildInfos(restau);
        }
    });
}
function update_btn(row){
    let update = $('<button></button>').text('Modifier');
    update.addClass('btn');
    update.css('background-color', '#E27802');
    update.css('color', 'white');
    update.attr('data-toggle', 'modal');
    update.attr('data-target', '#UpdateModal');
    update.bind("click", function(){
        prepare(row);
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
    $('#restau-body').html('');
    for (let row of rows) {
        let tr = $('<tr></tr>');
        let cycle = $('<td></td>').text(row.cycle);
        let jour = $('<td></td>').text(row.jour);
        let repas = $('<td></td>').text(row.repas);
        let maj = $('<td></td>');
        maj.append(update_btn(row));
        let supp = $('<td></td>');
        supp.append(delete_btn(row.id));
        tr.append(cycle);
        tr.append(jour);
        tr.append(repas);
        tr.append(maj);
        tr.append(supp);
        $('#restau-body').append(tr);
    }
}

function prepare(row){
    $('#paraMAJ').text(paragraphe);
    $('#id').attr('value', id);
}
function prepare_supp(id){
    $('#supp').attr('onclick', 'supp('+id+')');
}
function supp(id){
    $.ajax({
        type: "DELETE",
        url: "/?action=deleteRestau&id="+id,
        success: function (response) {
            get();
        }
    });
}