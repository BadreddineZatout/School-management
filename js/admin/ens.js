var infos;
$('document').ready(get());
$('#ens').change(function (e) { 
    getEnsInfos();
});
$('#class-btn').click(function (e) { 
    $('#reception').hide();    
    $('#classes').show();
});
$('#recep-btn').click(function (e) { 
    $('#classes').hide();
    $('#reception').show();    
});
function get(){
    $('#classes').hide();
    $('#reception').hide();
    $.ajax({
        type: "GET",
        url: "/?action=getEns",
        success: function (response) {
            buildEns(JSON.parse(response));
        }
    });
}
function getEnsInfos(){
    $.ajax({
        type: "GET",
        url: "/?action=getEns&ens="+ $('#ens').val(),
        success: function (response) {
            let rows = JSON.parse(response);
            buildRecep(rows[0]);
            buildClass(rows[1]);
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
function buildEns(rows){
    for (let row of rows) {
        let option = $('<option></option>');
        option.text(row.nom + ' ' + row.prenom);
        $('#ens').append(option);
        option.val(row.id);
    }
}
function buildRecep(rows){
    $('#recep-body').html('');
    for (let row of rows) {
        let tr = $('<tr></tr>');
        let recep = $('<td></td>').text(row.temps_recep);
        let maj = $('<td></td>');
        maj.append(update_btn(row));
        let supp = $('<td></td>');
        supp.append(delete_btn(row.id));
        tr.append(recep);
        tr.append(maj);
        tr.append(supp);
        $('#recep-body').append(tr);
    }
}
function buildClass(rows){
    $('#class-body').html('');
    for (let row of rows) {
        let tr = $('<tr></tr>');
        let classe = $('<td></td>').text(row.classe);
        let heure = $('<td></td>').text(row.heure);
        let maj = $('<td></td>');
        maj.append(update_btn(row));
        let supp = $('<td></td>');
        supp.append(delete_btn(row.id));
        tr.append(classe);
        tr.append(heure);
        tr.append(maj);
        tr.append(supp);
        $('#class-body').append(tr);
    }
}

function prepare(id, paragraphe){
    // $('#paraMAJ').text(paragraphe);
    // $('#id').attr('value', id);
}
function prepare_supp(id){
    $('#supp').attr('onclick', 'supp('+id+')');
}
function supp(id){
    $.ajax({
        type: "DELETE",
        url: "/?action=deleteEns&id="+id,
        success: function (response) {
            get();
        }
    });
}