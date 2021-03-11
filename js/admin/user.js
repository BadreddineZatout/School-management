$('document').ready(get());
function get(){
    $.ajax({
        type: "GET",
        url: "/?action=getUser",
        success: function (response) {
            buildUsers(JSON.parse(response));
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
//TODO add user type to table
function buildUsers(rows){
    $('#users-body').html('');
    for (let row of rows) {
        let tr = $('<tr></tr>');
        let nom = $('<td></td>').text(row.nom);
        let prenom = $('<td></td>').text(row.prenom);
        let adresse = $('<td></td>').text(row.adresse);
        let email = $('<td></td>').text(row.email);
        let telephone1 = $('<td></td>').text(row.telephone1);
        let telephone2 = $('<td></td>').text(row.telephone2);
        let telephone3 = $('<td></td>').text(row.telephone3);
        let username = $('<td></td>').text(row.username);
        let password = $('<td></td>').text(row.password);
        let maj = $('<td></td>');
        maj.append(update_btn(row));
        let supp = $('<td></td>');
        supp.append(delete_btn(row.id));
        tr.append(nom);
        tr.append(prenom);
        tr.append(adresse);
        tr.append(email);
        tr.append(telephone1);
        tr.append(telephone2);
        tr.append(telephone3);
        tr.append(username);
        tr.append(password);
        tr.append(maj);
        tr.append(supp);
        $('#users-body').append(tr);
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

