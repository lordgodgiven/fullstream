$(document).ready(function () {

    var noteD = $("#noteD");

    noteD.keyup(function () {

        var somme = ($("#noteA").val() + $("#noteB").val + $("#noteC").val() + noteD.val());


        console.log(somme);
    });


});

/*$(document).ready(function(){
    var qty=$("#qty");
    qty.keyup(function(){
        var total=isNaN(parseInt(qty.val()* $("#price").val())) ? 0 :(qty.val()* $("#price").val())
        $("#total").val(total);
    });
});*/
