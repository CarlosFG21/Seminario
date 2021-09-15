function todos() {

    myFunction2();
    myFunction();
}

function myFunction() {

    var filtro = $("#myInput").val().toUpperCase();

    $("#myTable tbody tr").each(function() {
        texto = $(this).children("td:eq(1)").text().toUpperCase();


        if (texto.indexOf(filtro) < 0) {
            $(this).hide();
        } else {
            $(this).show();
        }


    });

}

function myFunction2() {

    $(document).ready(function() {
        (function($) {
            $('#myInput').keyup(function() {
                var rex = new RegExp($(this).val(), 'i');
                $('.buscar tr').hide();
                $('.buscar tr').filter(function() {
                    return rex.test($(this).text());
                }).show();
            })
        }(jQuery));
    });



}