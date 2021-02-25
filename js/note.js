function Notes(){
    $.ajax({
        type: "GET",
        url: "/?action=notes",
        success: function (response) {
            build(JSON.parse(response));
        }
    });
}

function build(rows){
    $('#notes-body').html('');
    for (let row of rows) {
        let tr = $('<tr></tr>');
        let th = $('<th></th>').text(row.nom);
        let eval = $('<td></td>').text(row.evaluation);
        let int1 = $('<td></td>').text(row.interro1);
        let int2 = $('<td></td>').text(row.interro2);
        let ex = $('<td></td>').text(row.examen);
        let moy = $('<td></td>').text(row.moyenne);
        tr.append(th);
        tr.append(eval);
        tr.append(int1);
        tr.append(int2);
        tr.append(ex);
        tr.append(moy);
        $('#notes-body').append(tr);
    }
}