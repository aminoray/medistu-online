<!DOCTYPE html>
<html>
<head>
  <title>FilePond from CDN</title>

  <!-- Filepond stylesheet -->
  <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
  <script src="https://unpkg.com/filepond/dist/filepond.min.js"></script>
  <script src="https://unpkg.com/jquery-filepond/filepond.jquery.js"></script>
  <!-- add to document <head> -->
  <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">
  <!-- add before </body> -->
  <script src="https://unpkg.com/filepond/dist/filepond.js"></script>

</head>
<body>

  <!-- We'll transform this input into a pond -->
  <input type="file" class="filepond">

  <!-- Load FilePond library -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>

  <!-- include FilePond library -->
  <script src="https://unpkg.com/filepond/dist/filepond.min.js"></script>

  <!-- include FilePond plugins -->
  <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.js"></script>

  <!-- include FilePond jQuery adapter -->
  <script src="https://unpkg.com/jquery-filepond/filepond.jquery.js"></script>


  <!-- Turn all file input elements into ponds -->
  <script>
  FilePond.registerPlugin(
        FilePondPluginFileValidateSize,
        FilePondPluginFileValidateType
    );
    // create a FilePond instance at the input element location
    const pond = new FilePond.create(document.querySelector("#filepond"), {
        maxFiles: 1,
        allowPaste: false,
        maxFileSize: "3MB",
        acceptedFileTypes: ['image/png', 'image/jpeg'],
        server: {
            timeout: 99999999,
            process: function (fieldName, file, metadata, load, error, progress, abort) {
                var filepondRequest = new XMLHttpRequest();
                var filepondFormData = new FormData();
                fetch("/audio/signed", {
                    headers: {
                        "Content-Type": "application/json",
                        "Accept": "application/json",
                        "X-Requested-With": "XMLHttpRequest",
                        "X-CSRF-Token": $('input[name="_token"]').val()
                    },
                    method: "post",
                    credentials: "same-origin",
                    body: JSON.stringify({
                       fileName: metadata.fileInfo.filenameWithoutExtension,
                       fileExtension: metadata.fileInfo.fileExtension
                    })
                })
                    .then(function (response) {
                        return response.json();
                    })
                    .then(function (json) {
                        file.additionalData = json.additionalData;
                        // append the FormData() in the order below. Changing the order
                        // would result in 403 bad request error response from S3.
                        // No other fields are needed apart from these ones. Appending extra
                        // fields to the formData would also result in error responses from S3.
                        for (var field in file.additionalData) {
                            filepondFormData.append(field, file.additionalData[field]);
                        }
                        filepondFormData.append("file", file);
                        filepondRequest.upload.onprogress = function (e) {
                            progress(e.lengthComputable, e.loaded, e.total);
                        };
                        filepondRequest.open("POST", json.attributes.action);
                        filepondRequest.onload = function () {
                            load(`${ file.additionalData.key }`);
                        };
                        filepondRequest.send(filepondFormData);
                    });
                return {
                    abort: (function () {
                        filepondRequest.abort();
                        abort();
                    });
                };
            }
        }
    });
    pond.on("addfile", function (error, file) {
        if (error) {
            return;
        }
         // Set file metadata here in order to retrieve it in the custom process function
         // file attributes like fileExtension and filenameWithoutExtension
         // are not availabe in the file object in the custom process function
        file.setMetadata('fileInfo', {
            filenameWithoutExtension: file.filenameWithoutExtension,
            fileExtension: file.fileExtension
        });
    });
  </script>

</body>
</html>
