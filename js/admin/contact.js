var contact;
$('document').ready(get());
function get(){
    $.ajax({
        type: "GET",
        url: "/?action=getContact",
        success: function (response) {
            contact = JSON.parse(response);
            buildContact(contact);
        }
    });
}

function delete_btn(){
    let del = $('<button></button>').text('Supprimer');
    del.addClass('btn');
    del.css('background-color', '#E27802');
    del.css('color', 'white');
    del.attr('data-toggle', 'modal');
    del.attr('data-target', '#DeleteModal');
    del.attr('onclick', 'prepare_supp()');
    return del;
}
function buildContact(row){
    if (row){
        $('#contact-body').html('');
        let tr = $('<tr></tr>');
        let adresse = $('<td></td>').text(row.adresse);
        let phone = $('<td></td>').text(row.telephone);
        let fax = $('<td></td>').text(row.fax);
        let supp = $('<td></td>');
        supp.append(delete_btn());
        tr.append(adresse);
        tr.append(phone);
        tr.append(fax);
        tr.append(supp);
        $('#contact-body').append(tr);
        $('#modifier').bind('click', function (e) {
            prepare(row);
        });
    }
}

function prepare(contact){
    $('#adresse').attr('value', contact.adresse);
    $('#phone').attr('value', contact.telephone);
    $('#fax').attr('value', contact.fax);
}
function prepare_supp(){
    $('#supp').attr('onclick', 'supp()');
}
function supp(){
    $.ajax({
        type: "DELETE",
        url: "/?action=deleteContact",
        success: function (response) {
            get();
        }
    });
}

