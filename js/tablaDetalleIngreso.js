$(document).on('ready', funcMain);


function funcMain()
{
    //console.log("Llego a main");
	$("#add_row").on('click',newRowTable);

	$("loans_table").on('click','.fa-eraser',deleteProduct);
	$("loans_table").on('click','.fa-edit',editProduct);

	$("body").on('click',".fa-eraser",deleteProduct);
	$("body").on('click',".fa-edit",editProduct);
}


function funcEliminarProductosso(){
	//Obteniendo la fila que se esta eliminando
	var a=this.parentNode.parentNode;
	//Obteniendo el array de todos loe elementos columna en esa fila
	//var b=a.getElementsByTagName("td");
	var cantidad=a.getElementsByTagName("td")
	console.log(a);

	$(this).parent().parent().fadeOut("slow",function(){$(this).remove();});
}


function deleteProduct(){
	//Guardando la referencia del objeto presionado
	var _this = this;
	//Obtener las filas los datos de la fila que se va a elimnar
	var array_fila=getRowSelected(_this);
	//Restar esos datos a los totales mostrados al finales
	//calculateTotals(cantidad, precio, subtotal, impuesto, totalneto, accioneliminar)
	//calculateTotals(array_fila[3],array_fila[4],array_fila[5],array_fila[6],array_fila[7],2)
	$(this).parent().parent().fadeOut("slow",function(){$(this).remove();});
}


function editProduct(){
	var _this = this;;
	var array_fila=getRowSelected(_this);
	console.log(array_fila[0]+" - "+array_fila[1]+" - "+array_fila[2]+" - "+array_fila[3]+" - "+array_fila[4]+" - "+array_fila[5]+" - "+array_fila[6]+" - "+array_fila[7]+" - "+array_fila[8]);
	//Codigo de editar una fila lo pueden agregar aqui
}

function recorre(){
	var _this = this;;
	var array_fila=3;
	console.log(array_fila[0]+" - "+array_fila[1]+" - "+array_fila[2]+" - "+array_fila[3]+" - "+array_fila[4]+" - "+array_fila[5]+" - "+array_fila[6]+" - "+array_fila[7]+" - "+array_fila[8]);
	//Codigo de editar una fila lo pueden agregar aqui
}




function getRowSelected(objectPressed){
	//Obteniendo la linea que se esta eliminando
	var a=objectPressed.parentNode.parentNode;
	//b=(fila).(obtener elementos de clase columna y traer la posicion 0).(obtener los elementos de tipo parrafo y traer la posicion0).(contenido en el nodo)

	var cbMedicamento=a.getElementsByTagName("td")[0].getElementsByTagName("p")[0].innerHTML;
    var txtMedicamento=a.getElementsByTagName("td")[1].getElementsByTagName("p")[0].innerHTML;
	var fechaVencimiento=a.getElementsByTagName("td")[2].getElementsByTagName("p")[0].innerHTML;
	var lote=a.getElementsByTagName("td")[3].getElementsByTagName("p")[0].innerHTML;
	var cantidad=a.getElementsByTagName("td")[4].getElementsByTagName("p")[0].innerHTML;
	//var impuesto=a.getElementsByTagName("td")[6].getElementsByTagName("p")[0].innerHTML;
	//var total=a.getElementsByTagName("td")[7].getElementsByTagName("p")[0].innerHTML;

	var array_fila = [cbMedicamento, txtMedicamento, fechaVencimiento, lote, cantidad];

	return array_fila;
	console.log(numero+' '+codigo+' '+descripcion);
}



function newRowTable()
{
	

	var cbMedicamento=document.getElementById("cbMedicamento").value;


    var selMedicamento = document.getElementById("cbMedicamento");
    var textMedicamento= selMedicamento.options[selMedicamento.selectedIndex].text;
    var txtMedicamento = textMedicamento;



	var fechaVencimiento=document.getElementById("txtFechaVencimiento").value;
	var lote=document.getElementById("txtLote").value;
    var cantidad=document.getElementById("txtCantidad").value;
//	var subtotal=parseFloat(cantidad)*parseFloat(precio);
//	var impuesto=parseFloat(subtotal)*0.15;
//	var total_n=parseFloat(subtotal)+parseFloat(impuesto);
	var name_table=document.getElementById("transactionTable");

	var fechaIngreso=document.getElementById("txtFechaIngreso").value;

	if (lote == "" || fechaVencimiento =="" || fechaIngreso ==""){
		alert("Debe rellenar las fechas de ingreso y vencimiento, y el lote del medicamento");
	}else{

		if(cantidad > 0 ){

			var row = name_table.insertRow(0+1);
			var cell1 = row.insertCell(0);
			var cell2 = row.insertCell(1);
			var cell3 = row.insertCell(2);
			var cell4 = row.insertCell(3);
			var cell5 = row.insertCell(4);
			var cell6 = row.insertCell(5);
		   
			
			cell1.innerHTML = '<p name="cbMedicamento_p[]" class="non-margin">'+cbMedicamento+'</p>';
			cell2.innerHTML = '<p name="txtMedicamento_p[]" class="non-margin">'+txtMedicamento+'</p>';
			cell3.innerHTML = '<p name="fechaVencimiento_p[]" class="non-margin">'+fechaVencimiento+'</p>';
			cell4.innerHTML = '<p name="lote_p[]" class="non-margin">'+lote+'</p>';
			cell5.innerHTML = '<p name="cantidad_p[]" class="non-margin">'+cantidad+'</p>';
			cell6.innerHTML = '<button class="fa-eraser">Quitar</button>';
		
		
			document.getElementById("txtCantidad").value = "0";
			
			
		
			}else{
				alert("La cantidad debe ser mayor que el número ingresado");
			}
		



	}

	
	


	
    
    
    
    //cell7.innerHTML = '<span class="icon fa-edit"></span><input type="button" class="icon fa-eraser">Eliminar</input>';
    //Para calcular los totales enviando los parametros
  //  calculateTotals(cantidad, precio, subtotal, impuesto, total_n, 1);
    //Para calcular los totales sin enviar los parametros, solo adquiriendo los datos de la columna con mismo tipo de datos
    //calculateTotalsBySumColumn()
}


/*
function calculateTotalsBySumColumn(){
	var total_cantidad=0;
	var array_cantidades=document.getElementsByName("cantidad_p[]");
	for (var i=0; i<array_cantidades.length; i++) {
		total_cantidad+=parseFloat(array_cantidades[i].innerHTML);
	}
	document.getElementById("total_catidad").innerHTML=total_cantidad;


	var total_precios=0;
	var array_precios=document.getElementsByName("precio_p[]");
	for (var i=0; i<array_precios.length; i++) {
		total_precios+=parseFloat(array_precios[i].innerHTML);
	}
	document.getElementById("total_precio").innerHTML=total_precios;


	var subtotales=0;
	var array_subtotales=document.getElementsByName("subtotal_p[]");
	for (var i=0; i<array_subtotales.length; i++) {
		subtotales+=parseFloat(array_subtotales[i].innerHTML);
	}
	document.getElementById("total_subtotales").innerHTML=subtotales;


	var total_impuesto=0;
	var array_impuestos=document.getElementsByName("impuesto_p[]");
	for (var i=0; i<array_impuestos.length; i++) {
		total_impuesto+=parseFloat(array_impuestos[i].innerHTML);
	}
	document.getElementById("total_impuesto").innerHTML=total_impuesto;

	var totales_n=0;
	var array_totalesn=document.getElementsByName("total_p[]");
	for (var i=0; i<array_totalesn.length; i++) {
		totales_n+=parseFloat(array_totalesn[i].innerHTML);
	}
	document.getElementById("total_total").innerHTML=totales_n;
}

 */

/*
function calculateTotals(cantidad, precio, subtotal, impuesto, totaln, accion){
	//funcTotalsConParametro(cantidad, precio,subtotal,impuesto,total_n);
	var t_cantidad=parseFloat(document.getElementById("total_catidad").innerHTML);
	var t_precio=parseFloat(document.getElementById("total_precio").innerHTML);
	var t_subtotal=parseFloat(document.getElementById("total_subtotales").innerHTML);
	var t_impuesto=parseFloat(document.getElementById("total_impuesto").innerHTML);
	var t_total=parseFloat(document.getElementById("total_total").innerHTML);

	//accion=1		Sumarle al los totales
	//accion=2		Restarle al los totales
	if (accion==1) {
		document.getElementById("total_catidad").innerHTML=parseFloat(t_cantidad)+parseFloat(cantidad);
		document.getElementById("total_precio").innerHTML=parseFloat(t_precio)+parseFloat(precio);
		document.getElementById("total_subtotales").innerHTML=parseFloat(t_subtotal)+parseFloat(subtotal);
		document.getElementById("total_impuesto").innerHTML=parseFloat(t_impuesto)+parseFloat(impuesto);
		document.getElementById("total_total").innerHTML=parseFloat(t_total)+parseFloat(totaln);
	}else if(accion==2){
		document.getElementById("total_catidad").innerHTML=parseFloat(t_cantidad)-parseFloat(cantidad);
		document.getElementById("total_precio").innerHTML=parseFloat(t_precio)-parseFloat(precio);
		document.getElementById("total_subtotales").innerHTML=parseFloat(t_subtotal)-parseFloat(subtotal);
		document.getElementById("total_impuesto").innerHTML=parseFloat(t_impuesto)-parseFloat(impuesto);
		document.getElementById("total_total").innerHTML=parseFloat(t_total)-parseFloat(totaln);
	}else{
		alert('Accion Invalida');
	}
}
*/




function format(input)
{
	var num = input.value.replace(/\,/g,'');
	if(!isNaN(num)){
		input.value = num;
	}
	else{ alert('Solo se permiten numeros');
		input.value = input.value.replace(/[^\d\.]*/g,'');
	}
}

