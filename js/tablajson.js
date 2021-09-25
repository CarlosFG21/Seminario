jQuery(document).ready(function() {

  
    jQuery('#enviar').on('click', function() {
      let txtFechaIngreso  = document.getElementById("txtFechaIngreso").value;
      let cbProveedor  = document.getElementById("cbProveedor").value;
      let bandera = 0;
      
      let filas = [];
      $('#transactionTable tbody tr').each(function() {
        var id_medicamento = $(this).find('td').eq(0).text();
        var nombre_medicamento = $(this).find('td').eq(1).text();
        var fecha_vencimiento = $(this).find('td').eq(2).text();
        var num_lote = $(this).find('td').eq(3).text();
        var cantidad_ingreso = $(this).find('td').eq(4).text();
       
        let fila = {
          id_medicamento,
          nombre_medicamento,
          fecha_vencimiento,
          num_lote,
          cantidad_ingreso
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
        url: "../controlador/BDIngreso.php",
        data: {
          valores : JSON.stringify(filas) ,
          fechaIngresoPHP : txtFechaIngreso,
          cbProveedorPHP : cbProveedor,
        },
        success: function(data) { 
          console.log(data);

    
            location.href="../vistas/ingresos.php";
            
          
            
          
         
          
          
        }
      });


    });
  });

  
