
 $(document).ready(function(){
     $("#cbDepartamento").change(function () { 		
         $("#cbDepartamento option:selected").each(function () {
             id_departamento = $(this).val();
             $.post("../controlador/getMunicipio.php", { id_departamento: id_departamento }, function(data){
                 $("#cbMunicipio").html(data);
             });            
         });
     })
 });


