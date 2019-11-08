function pesqref(input) {
    var query = input.value;
    var id = '#' + input.id;
    var target = id + '-list';

    if (query != '') {
        $.ajax({
            url: "pesqref.php",
            method: "POST",
            data: { 
                query: query,
                table: input.id
            },
            success: function (data) {
                $(target).fadeIn();
                $(target).html(data);
            }
        });
    }
    else {
        $(target).fadeOut();
        $(target).html("");
    }
    $(document).on('click', 'li', function () {
        $(id).val($(this).text());
        $(target).fadeOut();
    })
}


//DROPDOWN AJAX
$(document).ready(function() {
    var class_array = document.getElementsByClassName('dropdown');

    for(let i = 0; i < class_array.length; i++){
        $.ajax({
            url: "dropdown-data.php",
            method: "POST",
            data: {
                id: class_array[i].id
            },
            success: function (data) {
                var result = data.split(",");
                class_array[i].innerHTML += result[1];
            }
        });
    }
});

    // var query = input.value;
    // var id = '#' + input.id;
    // var target = id + '-list';

    // if (query != '') {
    //     $.ajax({
    //         url: "pesqref.php",
    //         method: "POST",
    //         data: { 
    //             query: query,
    //             table: input.id
    //         },
    //         success: function (data) {
    //             $(target).fadeIn();
    //             $(target).html(data);
    //         }
    //     });
    // }
    // else {
    //     $(target).fadeOut();
    //     $(target).html("");
    // }
    // $(document).on('click', 'li', function () {
    //     $(id).val($(this).text());
    //     $(target).fadeOut();
    // })
