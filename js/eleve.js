$('document').ready(function(){
    $('#notes').hide();
    $('#activites').hide();
    $('#remarques').hide();
});
$('#edt-btn').click(function () { 
    $('#notes').hide();
    $('#activites').hide();
    $('#remarques').hide();
    $('#edt').show();
});
$('#note-btn').click(function () { 
    $('#activites').hide();
    $('#remarques').hide();
    $('#edt').hide();
    Notes();
    $('#notes').show();
});
$('#activ-btn').click(function () { 
    $('#notes').hide();
    $('#remarques').hide();
    $('#edt').hide();
    $('#activites').show();
});
$('#rque-btn').click(function () { 
    $('#notes').hide();
    $('#activites').hide();
    $('#edt').hide();
    $('#remarques').show();
});