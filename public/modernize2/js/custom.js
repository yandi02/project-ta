Dropzone.autoDiscover = false;

/**
 * Setup dropzone
 */
$('#productForm').dropzone({
    paramName: 'image',
    previewTemplate: $('#dzPreviewContainer').html(),
    addRemoveLinks: true,
    autoProcessQueue: true, 
    uploadMultiple: false,
    parallelUploads: 1,
    maxFiles: 1, 
    acceptedFiles: '.jpeg, .jpg, .png, .gif',
    thumbnailWidth: 900,
    thumbnailHeight: 600,
    previewsContainer: "#previews",
    timeout: 0,
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    init: function () {
        myDropzone = this;

        this.on('addedfile', function (file) {
            $('.dropzone-drag-area').removeClass('is-invalid').next('.invalid-feedback').hide();
        });

        this.on('success', function (file, response) {
            $('#productForm').fadeOut(600);
            setTimeout(function () {
                $('#successMessage').removeClass('d-none');
            }, 600);
        });
    }
});

/**
 * Form on submit
 */
$('#formSubmit').on('click', function (event) {
    event.preventDefault();
    var $this = $(this);

    // show submit button spinner
    $this.children('.spinner-border').removeClass('d-none');

    // validate form & submit if valid
    if ($('#productForm')[0].checkValidity() === false) {
        event.stopPropagation();

        // show error messages & hide button spinner    
        $('#productForm').addClass('was-validated');
        $this.children('.spinner-border').addClass('d-none');

        // if dropzone is empty show error message
        if (!myDropzone.getQueuedFiles().length > 0) {
            $('.dropzone-drag-area').addClass('is-invalid').next('.invalid-feedback').show();
        }
    } else {

        // if everything is ok, submit the form
        myDropzone.processQueue();
    }
});
