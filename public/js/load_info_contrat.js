$(document).ready(function () {

    $('#tdr').on('click', function () {
        var tdr_id = $(this).val();

        $.ajax({
            url: '/api/tdrs/' + tdr_id,
            type: "GET",
            dataType: "json",
            success: function (data) {
                console.log(data.beneficiaire);
                $('#beneficiaire').val(data.famille_intervention.designation);
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
