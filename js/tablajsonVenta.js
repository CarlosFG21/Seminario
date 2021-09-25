jQuery(document).ready(function() {
    jQuery('#enviar').on('click', function() {
      let txtFechaEgreso  = document.getElementById("txtFechaEgreso").value;
      let cbPuestoSalud  = document.getElementById("cbPuestoSalud").value;
      
      let filas = [];
      $('#transactionTable tbody tr').each(function() {

        var id_detalle_ingreso = $(this).find('td').eq(0).text();
        var nombre_medicamento = $(this).find('td').eq(1).text();
        var cantidad_egreso = $(this).find('td').eq(3).text();
       
        let fila = {
          id_detalle_ingreso,
          nombre_medicamento,
          cantidad_egreso
        };

        filas.push(fila);
      }); // fin de recorrer las filas de la tabla


      if (filas.length == 1){
        alert("No se puede ingresar sin detalles");
      }
         

        
      filas = filas.slice(0, filas.length -1, filas.length-1);
      console.log("Imprimiento detalles filas tabla");
      console.log(filas);
      
      $.ajax({
        type: "POST",
        url: "../controlador/BDEgresoV.php",
        data: {
          valores : JSON.stringify(filas) ,
          fechaEgresoPHP : txtFechaEgreso,
          cbPuestoSaludPHP : cbPuestoSalud,
        },
        success: function(data) { 
          //console.log(data);
          location.href="../vistas/egresos.php";
        }
      });
    });
  });

  
