window.onload = function() 
                {
                        
                        var A = 4;
                        var B = 4;
                        var C = 1;
                        var D = 5;
                                var chart = new CanvasJS.Chart("chartContainer", {
                                animationEnabled: true,

                                data: [{
                                        type: "pie",
                                        startAngle: 240,
                                        yValueFormatString: "##0\"\"",
                                        indexLabel: "{label} {y}",
                                        dataPoints: [
                                                {y: A, label: "ข้าว"},
                                                {y: B, label: "เนื้อสัตว์"},
                                                {y: C, label: "ผัก"},
                                                {y: D, label: "ผลไม้"},
                                        ]
                                }]

                        });
                        chart.render();
                     
                        document.AddFood.totalRice.value = A;
                        document.AddFood.totalMeet.value = B;
                        document.AddFood.totalVeg.value = C;
                        document.AddFood.totalFriut.value = D;
                }