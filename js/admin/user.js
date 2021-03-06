$('document').ready(get());
function get(){
    $.ajax({
        type: "GET",
        url: "/?action=getUser",
        success: function (response) {
            console.log(JSON.parse(response));
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
function buildUsers(rows){
    $('#article-body').html('');
    for (let row of rows) {
        let tr = $('<tr></tr>');
        let titre = $('<td></td>').text(row.titre);
        let contenu = $('<td></td>').text(row.contenu);
        let maj = $('<td></td>');
        maj.append(update_btn(row));
        let supp = $('<td></td>');
        supp.append(delete_btn(row.id));
        tr.append(titre);
        tr.append(contenu);
        tr.append(maj);
        tr.append(supp);
        $('#article-body').append(tr);
    }
}

function prepare(id, titre, contenu){
    $('#titreMAJ').attr('value', titre);
    $('#contenuMAJ').text(contenu);
    $('#id').attr('value', id);
}
function prepare_supp(id){
    $('#supp').attr('onclick', 'supp('+id+')');
}
function supp(id){
    $.ajax({
        type: "DELETE",
        url: "/?action=deleteUser&id="+id,
        success: function (response) {
            get();
        }
    });
}

