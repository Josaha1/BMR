<?php
ob_start(); 
session_start(); 
?>
<?php include("class_lib/db_conf.php"); ?>
<?php include("class_lib/database.php"); ?>
<?php $db=new Database(); ?>
<?php

$sql = "SELECT * FROM `food`";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calories Tracker</title>

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src=
        "https://code.jquery.com/jquery-3.2.1.min.js">
    </script>
    <script src=
"https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js">
    </script>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.min.css" />
  </head>
</head>

<body>
    
    <nav>
        <div class="nav-wrapper blue">
            <div class="container">
                <a href="#" class="brand-logo center">Tack calories</a>
                <ul>
                    <li>
                        <a href="#" class="clear-btn btn blue lighten-3">Clear All</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <br>

    <div class="container">
        <div class="card">
            <div class="card-content">
                <span class="card-title">Add Meal / Food item</span>
                
              
                <form class="col">
                    <div class="row">
                        <div class="input-field col s6">
                            <div class="col-md-12">
                                <label for="disabledTextInput" class="form-label">รายการอาหาร</label>
                            
                                    <select class="selectpicker form-control" data-show-subtext="true" data-live-search="true" name="item-name" id="item-name"  onchange="GetDetail(this.value)">
                                    <?php
                                    foreach($db->to_Obj($sql) as $rows)
                                    {    ?>
                                        <option value="<?php echo($rows['FoodName']); ?>" ><?php echo($rows['FoodName']); ?> </option>
                                        <?php } ?>
                                    </select>
                                    
                            </div>
                        </div>
                        <div class="input-field col s6">
                            <div class="col-md-12">
                            
                            <input type="number" class="form-control" placeholder="Add Calories" id="item-calories" name="item-calories">
                            <label for="item-calories">Calories</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <button class="btn add-btn blue white-3"><i class="fa fa-plus"></i> Add Meal</button>
                        <button class="btn update-btn orange"><i class="fa fa-pencil-square-o"></i> Update Meal</button>
                        <button class="btn delete-btn red"><i class="fa fa-remove"></i> Delete Meal</button>
                        <button class="btn back-btn grey pull-right"><i class="fa fa-chevron-circle-left"></i>
                            Back</button>
                    </div>
                </form>
                
            </div>
        </div>
         
        <script>
  
  // onkeyup event will occur when the user 
  // release the key and calls the function
  // assigned to this event
  function GetDetail(str) {
      if (str.length == 0) {
          document.getElementById("item-calories").value = "";
          return;
      }
      else {

          // Creates a new XMLHttpRequest object
          var xmlhttp = new XMLHttpRequest();
          xmlhttp.onreadystatechange = function () {

              // Defines a function to be called when
              // the readyState property changes
              if (this.readyState == 4 && 
                      this.status == 200) {
                    
                  // Typical action to be performed
                  // when the document is ready
                  var myObj = JSON.parse(this.responseText);

               
                    
                  // Assign the value received to
                  // last name input field
                  document.getElementById(
                      "item-calories").value = myObj[0];
              }
          };

          // xhttp.open("GET", "filename", true);
          xmlhttp.open("GET", "gfg.php?item-name=" + str, true);
            
          // Sends the request to the server
          xmlhttp.send();
      }
  }
</script>

        <!-- Calories count -->
        <h3 class="center-align">Total calories: <span class="total-calories">0</span></h3>

        <!-- Item list -->
        <ul id="item-list" class="collection">
            <!-- <li class="collection-item" id="item-0"><strong>Steak:</strong> <em>900 Calories</em>
                <a href=3"" class="secondary-content"><i class="fa fa-pencil"></i></a>
            </li>
            <li class="collection-item" id="item-0"><strong>Egg:</strong> <em>600 Calories</em>
                <a href=3"" class="secondary-content"><i class="fa fa-pencil"></i></a>
            </li>
            <li class="collection-item" id="item-0"><strong>Cookies:</strong> <em>900 Calories</em>
                <a href=3"" class="secondary-content"><i class="fa fa-pencil"></i></a>
            </li> -->
        </ul>

    </div>
    

    <script src="app.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>
</body>

</html>