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

function delete_btn(id, type){
    let del = $('<button></button>').text('Supprimer');
    del.addClass('btn');
    del.css('background-color', '#E27802');
    del.css('color', 'white');
    del.attr('data-toggle', 'modal');
    del.attr('data-target', '#DeleteModal');
    del.bind('click', function () {
        prepare_supp(id, type);
    });
    return del;
}
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
        let type = $('<td></td>');
        switch (row.type) {
            case '0':
                type.text('Eleve');
                break;
            case '1':
                type.text('Parent');
                break;
            case '2':
                type.text('Enseignant');
                break;
            case '3': 
                type.text('Admin');
                break;
        }
        let maj = $('<td></td>');
        maj.append(update_btn(row));
        let supp = $('<td></td>');
        supp.append(delete_btn(row.id, row.type));
        tr.append(nom);
        tr.append(prenom);
        tr.append(adresse);
        tr.append(email);
        tr.append(telephone1);
        tr.append(telephone2);
        tr.append(telephone3);
        tr.append(username);
        tr.append(password);
        tr.append(type);
        tr.append(maj);
        tr.append(supp);
        $('#users-body').append(tr);
    }
}

function prepare(row){
    console.log(row);
    $('#nomMAJ').attr('value', row.nom);
    $('#prenomMAJ').attr('value', row.prenom);
    $('#emailMAJ').attr('value', row.email);
    $('#adresseMAJ').attr('value', row.adresse);
    $('#tele1MAJ').attr('value', row.telephone1);
    $('#tele2MAJ').attr('value', row.telephone2);
    $('#tele3MAJ').attr('value', row.telephone3);
    $('#userMAJ').attr('value', row.username);
    $('#pdwMAJ').attr('value', row.password);
    $('#id').attr('value', row.id);
    $('#typeMAJ').val(row.type);
}
function prepare_supp(id, type){
    $('#supp').bind('click', function () {
        supp(id,type);
    });
}
function supp(id, type){
    $.ajax({
        type: "DELETE",
        url: "/?action=deleteUser&id="+id+"&type="+type,
        success: function (response) {
            get();
        }
    });
}

