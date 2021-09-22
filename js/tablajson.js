jQuery(document).ready(function() {
    jQuery('#enviar').on('click', function() {
      let txtFechaIngreso  = document.getElementById("txtFechaIngreso").value;
      let cbProveedor  = document.getElementById("cbProveedor").value;
      
      let filas = [];
      $('#transactionTable tbody tr').each(function() {
        var fecha_ingreso = $(this).find('td').eq(0).text();
        var id_proveedor = $(this).find('td').eq(1).text();
        var nombre_proveedor = $(this).find('td').eq(2).text();
        var id_medicamento = $(this).find('td').eq(3).text();
        var nombre_medicamento = $(this).find('td').eq(4).text();
        var fecha_vencimiento = $(this).find('td').eq(5).text();
        var num_lote = $(this).find('td').eq(6).text();
        var cantidad_ingreso = $(this).find('td').eq(7).text();
       
        let fila = {
          fecha_ingreso,
          id_proveedor,
          nombre_proveedor,
          id_medicamento,
          nombre_medicamento,
          fecha_vencimiento,
          num_lote,
          cantidad_ingreso
        };

        filas.push(fila);
      }); // fin de recorrer las filas de la tabla
        
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
        }
      });
    });
  });

  
