//$(document).on('ready', readTable);

function recorrerTablaF() {
    //console.log("CLIC TABLA");

    var table = document.getElementById("transactionTable");
    var rowCount = table.rows.length;
    for (var i= 0; i < table.rows.lenght; i++){   
    }
    console.log(rowCount);



  }

  function readTable(){

    var oTable = document.getElementById('transactionTable');

    //gets rows of table
    var rowLength = oTable.rows.length;
  

    //loops through rows    
    for (i = 0; i < rowLength; i++){

      //gets cells of current row  
       var oCells = oTable.rows.item(i).cells;
   

       //gets amount of cells of current row
       var cellLength = oCells.length;

       //loops through each cell in current row
       for(var j = 0; j < cellLength; j++){

              // get your cell info here

              

              var cellVal = oCells.item(j).textContent;
              console.log(cellVal);



           // console.log(a.getElementsByTagName("td")[2].getElementsByTagName("p")[0].innerHTML); 
           }
    }
  
   
  }