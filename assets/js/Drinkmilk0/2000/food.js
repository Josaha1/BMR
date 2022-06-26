function addFood()
      {
        var A = 9;
        var C = 5;
        var D = 4;
        var B = 12;
        var DiffRice1 = parseFloat(document.AddFood.DiffRice1.value);
        var DiffMeet1 = parseFloat(document.AddFood.DiffMeet1.value);
        var DiffVeg1 = parseFloat(document.AddFood.DiffVeg1.value);
        var DiffFriut1 = parseFloat(document.AddFood.DiffFriut1.value);
        
        document.AddFood.totalRice.value = Math.round(A-DiffRice1);
        document.AddFood.totalMeet.value = Math.round(B-DiffMeet1);
        document.AddFood.totalVeg.value = Math.round(C-DiffVeg1);
        document.AddFood.totalFriut.value = Math.round(D-DiffFriut1);
        document.AddFood.totalRice2.value = Math.round(A-DiffRice2);
        document.AddFood.totalMeet2.value = Math.round(B-DiffMeet2);
        document.AddFood.totalVeg2.value = Math.round(C-DiffVeg2);
        document.AddFood.totalFriut2.value = Math.round(D-DiffFriut2);
        var chart1 = new CanvasJS.Chart("chartContainer1", {
                                animationEnabled: true,

                                data: [{
                                        type: "pie",
                                        startAngle: 240,
                                        yValueFormatString: "##0\"\"",
                                        indexLabel: "{label} {y}",
                                        dataPoints: [
                                                {y: DiffRice1, label: "ข้าว"},
                                                {y: DiffMeet1, label: "เนื้อสัตว์"},
                                                {y: DiffVeg1, label: "ผัก"},
                                                {y: DiffFriut1, label: "ผลไม้"},
                                        ]
                                }]

                        });
        
                        chart1.render();
                        
      }
      function addFood2()
      {
        var ricetotal = document.AddFood.totalRice.value;
        var Meettotal = document.AddFood.totalMeet.value;
        var Vegtotal = document.AddFood.totalVeg.value;
        var friuttotal = document.AddFood.totalFriut.value;
        var DiffRice2 = document.AddFood.DiffRice2.value;

        var DiffMeet2 = document.AddFood.DiffMeet2.value;
        var DiffVeg2 = document.AddFood.DiffVeg2.value;
        var DiffFriut2 = document.AddFood.DiffFriut2.value;
        document.AddFood.totalRice2.value = Math.round(ricetotal-DiffRice2);
        document.AddFood.totalMeet2.value = Math.round(Meettotal-DiffMeet2);
        document.AddFood.totalVeg2.value = Math.round(Vegtotal-DiffVeg2);
        document.AddFood.totalFriut2.value = Math.round(friuttotal-DiffFriut2);
        var chart2 = new CanvasJS.Chart("chartContainer2", {
                                animationEnabled: true,

                                data: [{
                                        type: "pie",
                                        startAngle: 240,
                                        yValueFormatString: "##0\"\"",
                                        indexLabel: "{label} {y}",
                                        dataPoints: [
                                                {y: DiffRice2, label: "ข้าว"},
                                                {y: DiffMeet2, label: "เนื้อสัตว์"},
                                                {y: DiffVeg2, label: "ผัก"},
                                                {y: DiffFriut2, label: "ผลไม้"},
                                        ]
                                }]

                        });
        
                        chart2.render();
      }
      function addFood3()
      {
        var ricetotal = document.AddFood.totalRice2.value;
        var Meettotal = document.AddFood.totalMeet2.value;
        var Vegtotal = document.AddFood.totalVeg2.value;
        var friuttotal = document.AddFood.totalFriut2.value;
        
        var DiffRice3 = document.AddFood.DiffRice3.value;
        var DiffMeet3 = document.AddFood.DiffMeet3.value;
        var DiffVeg3 = document.AddFood.DiffVeg3.value;
        var DiffFriut3 = document.AddFood.DiffFriut3.value;
        document.AddFood.totalRice3.value = Math.round(ricetotal-DiffRice3);
        document.AddFood.totalMeet3.value = Math.round(Meettotal-DiffMeet3);
        document.AddFood.totalVeg3.value = Math.round(Vegtotal-DiffVeg3);
        document.AddFood.totalFriut3.value = Math.round(friuttotal-DiffFriut3);
        var chart3 = new CanvasJS.Chart("chartContainer3", {
                                animationEnabled: true,

                                data: [{
                                        type: "pie",
                                        startAngle: 240,
                                        yValueFormatString: "##0\"\"",
                                        indexLabel: "{label} {y}",
                                        dataPoints: [
                                                {y: DiffRice3, label: "ข้าว"},
                                                {y: DiffMeet3, label: "เนื้อสัตว์"},
                                                {y: DiffVeg3, label: "ผัก"},
                                                {y: DiffFriut3, label: "ผลไม้"},
                                        ]
                                }]

                        });
        
                        chart3.render();
      }