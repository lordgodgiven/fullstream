$(document).ready(function () {

    $("#loading_liste_beneficiaire_president").hide();
    $("#label_loading_liste_beneficiaire_president").hide();
    $("#label_choix_president").hide();
    $('.fa-user-circle-o').on('click', function () {

        $('#listeBeneficiairePresidents').modal('show');
        $.ajax({
            url: '/api/beneficiaires/',
            type: "GET",
            dataType: "json",
            beforeSend: function () {
                $('#liste_beneficiaire_president').hide();
                $('#liste_beneficiaire_president').empty();
                $("#loading_liste_beneficiaire_president").show();
            },

            success: function (data) {
                if (!$.trim(data)) {
                    $('#listeBeneficiairePresidents').modal('hide');
                    toastr.warning("Aucun bénéficiaire");
                } else {
                    $('#liste_beneficiaire_president').empty();

                    $.each(data, function (key, value) {
                        $("#loading_liste_beneficiaire_president").hide();
                        $("#label_choix_president").show();
                        $('#liste_beneficiaire_president').show();
                        $('#liste_beneficiaire_president').append('<option value="' + key + '">' + value + '</option>');

                    });
                }
            }
        });
    });

    $('#liste_beneficiaire_president').on('click', function () {
        var id = $("#liste_beneficiaire_president").val();
        $("#label_loading_liste_beneficiaire_president").show();
        $.ajax({
            url: '/api/beneficiaires/' + id,
            type: "GET",
            dataType: "json",
            success: function (data) {
                $('#nom_president').val(data.nom);
                $('#structure_responsable_cluster').val(data.denomination_raison_sociale);
                $('#identifiant_prcce').val(data.identifiant_prcce);
                $('#prenom_president').val(data.prenom);
                $('#numero_telephone_president1').val(data.telephone);
                $('#numero_telephone_president2').val(data.telephone);
                $('#numero_fax_president').val(data.fax);
                $('#email_president').val(data.email);
                $('#president_id').val(data.individu_id);
                $("#label_loading_liste_beneficiaire_president").hide();
                $('#listeBeneficiairePresidents').modal('hide');
                $("#label_choix_president").hide();
                $("#label_loading_liste_beneficiaire_president").hide();
            }
        });
    })

});
