$('.generated').on('click', function (e) {
    e.preventDefault()
    console.log('123')
    $('#original_link_error').text('')
    $.ajax({
        type: "post",
        url: "/api/create_link",
        data: {original_link: $('input[name="original_link"]').val()},
        success: function (result) {
            $('.generated_link').text(result.generated_link);
        },
        error: function (response) {
            if (response.responseJSON.errors) {
                if (response.responseJSON.errors.original_link) {
                    $.each(response.responseJSON.errors.original_link, function (key, value) {
                        $('#original_link_error').text(value)
                    });
                }
            }
        }

    })
});

$('.clear').on('click', function (e) {
    e.preventDefault()
    console.log('eee')
    $('input[name="original_link"]').val('');
    $('.generated_link').text('');
    $('#original_link_error').text('')
});
