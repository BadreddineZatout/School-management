var edt;
$('document').ready(get());
$('#add').bind('click', function (e) {
    matiere();
});
$('#cycle').bind('change', function (e) {
    classe();
});
function get(){
    $.ajax({
        type: "GET",
        url: "/?action=getedt",
        success: function (response) {
            edt = JSON.parse(response);
            buildEdt(edt);
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
function buildEdt(rows){
    $('#edt-body').html('');
    for (let row of rows) {
        let tr = $('<tr></tr>');
        let cycle = $('<td></td>').text(row.cycle);
        let classe = $('<td></td>').text(row.classe);
        let jour = $('<td></td>').text(row.jour);
        let t1 = $('<td></td>').text(row.t1);
        let t2 = $('<td></td>').text(row.t2);
        let t3 = $('<td></td>').text(row.t3);
        let t4 = $('<td></td>').text(row.t4);
        let t5 = $('<td></td>').text(row.t5);
        let t6 = $('<td></td>').text(row.t6);
        let t7 = $('<td></td>').text(row.t7);
        let t8 = $('<td></td>').text(row.t8);
        
        let maj = $('<td></td>');
        maj.append(update_btn(row.id, row.paragraphe));
        let supp = $('<td></td>');
        supp.append(delete_btn(row.id));
        tr.append(cycle);
        tr.append(classe);
        tr.append(jour);
        tr.append(t1);
        tr.append(t2);
        tr.append(t3);
        tr.append(t4);
        tr.append(t5);
        tr.append(t6);
        tr.append(t7);
        tr.append(t8);
        tr.append(maj);
        tr.append(supp);
        $('#edt-body').append(tr);
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
        url: "/?action=deleteedt&id="+id,
        success: function (response) {
            get();
        }
    });
}
function matiere(){
    $.ajax({
        type: "GET",
        url: "/?action=getmatiere",
        success: function (response) {
            buildMatiere(JSON.parse(response));
        }
    });
}
function buildMatiere(rows){
    for(let i = 1; i<=8; i++)
    {
        let mat = $('#t' + i);
        for (let row of rows){
            let option = $('<option></option>');
            option.text(row.nom);
            option.attr('value', row.code_mat);
            mat.append(option);
        }
    }
}
function classe(){
    $.ajax({
        type: "GET",
        url: "/?action=getclasses&cycle="+$('#cycle').val(),
        success: function (response) {
            buildClasse(JSON.parse(response));
        }
    });
}
function buildClasse(rows){
    let classes = $('#class');
    classes.html('');
    for(let row of rows){
        let option = $('<option></option>');
        option.text(row.classe);
        option.attr('value', row.id);
        classes.append(option);
    }
}