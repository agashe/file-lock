/**
 * FileLock
 * 
 * author: Mohamed Yousef
 * contact: engineer.mohamed.yossef@gmail.com
 * version: 1.0.0
 * license: MIT
 */

$(document).ready(function(){
    /**
     * CSRF Token
     */
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    /**
     * Trigger select file
     */
    $('input[type="text"]').click(function(){
        $('input[type="file"]').trigger('click');
    });

    /**
     * Update text value
     */
    $('input[type="file"]').on('change', function(){
        let text = `
            ${this.files[0].name} (${Math.ceil(this.files[0].size/1024) + "KiB"})
        `;

        $('input[type="text"]').val(text);
    });

    /**
     * Encrypt/Decrypt file
     */
    $('.upload').click(function(e){
        // stop form submition
        e.preventDefault();

        // validate file
        if ($('input[type="file"]').val() == '') {
            alert('Please choose file!')
            return;
        }

        // send the request
        var formData = new FormData($('form')[0]);

        $.ajax({
            url: window.location.href + $(this).data('url'),
            type: 'POST',
            enctype: 'multipart/form-data',
            processData: false,
            contentType: false,
            data: formData,
        })
        .done(function(response){
            $('.message').text(response.message);
            $('#download-button').attr('href', response.file).removeClass('d-none');
        });
    })
});