function calculMoyenne() {

    var noteAValue = parseFloat($('#noteA').val());
    var noteBValue = parseFloat($('#noteB').val());
    var noteCValue = parseFloat($('#noteC').val());
    var noteDValue = parseFloat($('#noteD').val());

    var somme = isNaN(noteAValue + noteBValue + noteCValue + noteDValue) ? 0 : (noteAValue + noteBValue + noteCValue + noteDValue);
    $("#total").val(somme);
    $("#moyenne").val(somme / 4);

}

$('#noteA, #noteB, #noteB, #noteC, #noteD').keyup(function () {
    calculMoyenne();
});

