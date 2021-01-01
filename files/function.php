<script type="text/javascript">
    function printData(){
    var divToPrint = document.getElementById("myTable");
    var container = document.getElementById("container");
    newWin = window.open("");
    newWin.document.write("<html><head><style>body{font-family: calibri; padding: 5px;} th {border: 1px solid; color: black;} h3{display: inline-block; margin: 0 auto;} table{color: #333; width: 100%; font-size: 15; line-height: 20px; margin: 50px auto; text-align: center;} .fit {max-width: 75px; max-height: 75px; width: auto; height: auto; margin: 0 auto} td{border : 1px solid black; color: black;}</style></head><body>"+container.outerHTML+"</body></html>");
    newWin.print();
    newWin.close();
    }
  </script>