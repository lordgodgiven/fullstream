$(document).ready(function () {

    $("#loading_liste_beneficiaire_secretaire").hide();
    $("#label_loading_liste_beneficiaire_secretaire").hide();
    $("#label_choix_secretaire").hide();
    $('.fa-user-plus').on('click', function () {

        $('#listeBeneficiaireSecretaires').modal('show');
        $.ajax({
            url: '/api/beneficiaires/',
            type: "GET",
            dataType: "json",
            beforeSend: function () {
                $('#liste_beneficiaire_secretaire').hide();
                $('#liste_beneficiaire_secretaire').empty();
                $("#loading_liste_beneficiaire_secretaire").show();
            },

            success: function (data) {
                if (!$.trim(data)) {
                    $('#listeBeneficiaireSecretaires').modal('hide');
                    toastr.warning("Aucun bénéficiaire");
                } else {
                    $('#liste_beneficiaire_secretaire').empty();

                    $.each(data, function (key, value) {
                        $("#loading_liste_beneficiaire_secretaire").hide();
                        $("#label_choix_secretaire").show();
                        $('#liste_beneficiaire_secretaire').show();
                        $('#liste_beneficiaire_secretaire').append('<option value="' + key + '">' + value + '</option>');

                    });
                }
            }
        });
    });

    $('#liste_beneficiaire_secretaire').on('click', function () {
        var id = $("#liste_beneficiaire_secretaire").val();
        $("#label_loading_liste_beneficiaire_secretaire").show();
        $.ajax({
            url: '/api/beneficiaires/' + id,
            type: "GET",
            dataType: "json",
            success: function (data) {
                $('#nom_secretaire').val(data.nom);
                $('#prenom_secretaire').val(data.prenom);
                $('#numero_telephone_secretaire').val(data.telephone);
                $('#email_secretaire').val(data.email);
                $('#secretaire_id').val(data.individu_id);
                $("#label_loading_liste_beneficiaire_secretaire").hide();
                $('#listeBeneficiaireSecretaires').modal('hide');
                $("#label_choix_secretaire").hide();
                $("#label_loading_liste_beneficiaire_secretaire").hide();

            }
        });
    })

});
