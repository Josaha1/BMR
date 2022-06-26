<html>
   <head> 
      <title>hp mp</title> 
      <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.3/Chart.min.js"></script> 
   </head> 
   <body onload="hpmpGraph()"> 
      <script>
      function hpmpGraph() {//from   w w  w. j  a v  a 2  s . c  o  m
         var hp = document.hpmpForm.HP.value,
            mp = document.hpmpForm.MP.value,
            ctx = document.getElementById('hpmpratio').getContext('2d');
         var   data = {
            labels: ["HP","MP"],
            datasets:
               [{
                  data: [hp,mp],
                  backgroundColor: ["#EF0000","#0000EF"],
                  hoverBackgroundColor: ["#FF0000","#0000FF"]
               }]
         };
         var options = {};
         var myPieChart = new Chart(ctx, {
            type: 'pie',
            data: data,
            options: options
         });
      }
   
      </script> 
      <h1>HP &amp; MP</h1> 
      <form name="hpmpForm" method="post">
          HP : 
         <input type="text" name="HP" value="100">
         <br>
          MP : 
         <input type="text" name="MP" value="100">
         <br> 
         <button type="button" onclick="hpmpGraph();">Click</button> 
         <h2>Pie graph</h2> 
         <canvas id="hpmpratio" height="50"></canvas> 
      </form>  
   </body>
</html>