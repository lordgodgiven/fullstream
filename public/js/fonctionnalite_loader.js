$(document).ready(function () {

    $("#module").change(function () {
        var module_id = $(this).val();
        console.log(module_id);
        if (module_id) {
            $.ajax({
                url: '/api/fonctionnalites/' + module_id,
                type: "GET",
                dataType: "json",
                beforeSend: function () {
                    $('select[name="fonctionnalite[]"]').empty();
                    $('select[name="fonctionnalite[]"]').prepend($('<option></option>').html('Chargement...'));
                },

                success: function (data) {

                    $('select[name="fonctionnalite[]"]').empty();

                    $.each(data, function (key, value) {

                        $('select[name="fonctionnalite[]"]').append('<option value="' + key + '">' + value + '</option>');

                    });
                },
                complete: function () {

                }
            });
        } else {
            $('select[name="fonctionnalite"]').empty();
        }

    });

});
