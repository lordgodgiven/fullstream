$(document).ready(function () {
    $('#liste_nom_cluster').change(function () {

        var nom_cluster_id = $(this).val();

        $.ajax({
            url: '/api/chaine-valeurs/' + nom_cluster_id,
            type: "GET",
            dataType: "json",
            success: function (data) {

                $('#nom_chaine_valeur').val(data.designation);
                $('#chaine_valeur_id').val(data.id);
            }
        });
    });
});
