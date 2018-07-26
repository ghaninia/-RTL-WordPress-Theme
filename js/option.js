$(function(){
    $("table.form-table tr").each(function () {
        var current = $(this) ;
        $('#upload-btn' , current ).click(function(e) {
            e.preventDefault();
            var image = wp.media({
                title: 'Upload Image',
                multiple: false
            }).open()
                .on('select', function(e){
                    var uploaded_image = image.state().get('selection').first();
                    console.log(uploaded_image);
                    var image_url = uploaded_image.toJSON().url;
                    $('input[type="url"]' , current).val(image_url);
                });
        });
    });
});