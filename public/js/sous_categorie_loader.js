$(document).ready(function () {

    $('select[name="famille_intervention"]').on('change', function () {
        var famille_intervention_id = $(this).val();

        if (famille_intervention_id) {
            $.ajax({
                url: '/api/sous-categories/' + famille_intervention_id,
                type: "GET",
                dataType: "json",
                beforeSend: function () {
                    $('select[name="sous_categorie"]').empty();
                    $('select[name="sous_categorie"]').prepend($('<option></option>').html('Chargement...'));
                },

                success: function (data) {

                    $('select[name="sous_categorie"]').empty();

                    $.each(data, function (key, value) {

                        $('select[name="sous_categorie"]').append('<option value="' + key + '">' + value + '</option>');

                    });
                },
                complete: function () {

                }
            });
        } else {
            $('select[name="sous_categorie"]').empty();
        }

    });

});
