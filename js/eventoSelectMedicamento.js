
 $(document).ready(function(){
    $("#cbMedicamento").change(function () { 		
        $("#cbMedicamento option:selected").each(function () {
            id_medicamento = $(this).val();
            $.post("../controlador/getLote.php", { id_medicamento: id_medicamento }, function(data){
                $("#cbLote").html(data);
            });            
        });
    })
});


