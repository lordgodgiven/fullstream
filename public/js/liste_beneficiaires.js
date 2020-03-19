$(document).ready(function () {

    $("#btn-load").hide();
    $('.fa-user-plus').on('click', function () {

        $('#listeBeneficiaires').modal('show');
        $.ajax({
            url: '/api/beneficiaires/',
            type: "GET",
            dataType: "json",
            beforeSend: function () {
                $('#liste_beneficiaire').empty();
                $('#liste_beneficiaire').prepend($('<option></option>').html('Chargement...'));
            },

            success: function (data) {

                $('#liste_beneficiaire').empty();

                $.each(data, function (key, value) {

                    $('#liste_beneficiaire').append('<option value="' + key + '">' + value + '</option>');

                });

            },
            complete: function () {

            }
        });
    });

    $('#liste_beneficiaire').on('click', function () {
        var id = $("#liste_beneficiaire").val();

        $.ajax({
            url: '/api/beneficiaires/' + id,
            type: "GET",
            dataType: "json",
            success: function (data) {
                $("#btn-load").show();
                $("#btn-load").html("Charger");
                $('#btn-load').on('click', function () {
                    $('#nom_secretaire').val(data.nom);
                    $('#prenom_secretaire').val(data.prenom);
                    $('#numero_telephone_secretaire').val(data.telephone);
                    $('#email_secretaire').val(data.email);
                    $('#secretaire_id').val(data.individu_id);
                    $('#listeBeneficiaires').modal('hide');
                    $('#nom_secretaire').val();
                    $('#prenom_secretaire').val();
                    $('#telephone_secretaire').val();
                    $('#email_secretaire').val();
                    $('#secretaire_id').val();
                });
                console.log(data.individu_id);
            }
        });
    })

});
