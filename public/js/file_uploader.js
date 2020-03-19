Dropzone.options.dropzone =
    {
        maxFilesize: 12,
        renameFile: function (file) {
            var dt = new Date();
            var time = dt.getTime();
            return time + file.name;
        },
        acceptedFiles: ".jpeg,.jpg,.png,.gif,.pdf,.doc,.docx",
        addRemoveLinks: true,
        timeout: 50000,
        dictDefaultMessage: "déposer des fichiers ici ou cliquer pour les télécharger",
        removedfile: function (file) {
            var name = file.upload.filename;
            var url = "https://prcce.dev/document/delete";
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                },
                type: 'POST',
                url: url,
                data: {filename: name},
                success: function (data) {
                    console.log("File has been successfully removed!!");
                    console.log(data);
                },
                error: function (e) {
                    console.log(e);
                }
            });
            var fileRef;
            return (fileRef = file.previewElement) != null ?
                fileRef.parentNode.removeChild(file.previewElement) : void 0;
        },

        success: function (file, response) {
            console.log(response);
        },
        error: function (file, response) {
            return false;
        }
    };
