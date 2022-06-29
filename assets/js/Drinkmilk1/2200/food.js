var A = 11;
var B = 11;
var C = 4;
var M = 1;
function loadTotal() {
  document.AddFood.totalRice1.value = A;
  document.AddFood.totalMeet1.value = B;
  document.AddFood.totalFruit1.value = C;
  document.AddFood.totalMilk1.value = M;
}
function decrementValue(e) {
  $(".input-group").on("click", ".button-plus", function (e) {
    incrementValue(e);
  });

  $(".input-group").on("click", ".button-minus", function (e) {
    decrementValue(e);
  });
}
//start Step 1
//Rice 1
$(function () {
  $(document).on("click", "#incremR1", function () {
    var fieldName = $(this).data("field");
    var parent = $(this).closest("div");
    var currentVal = parseInt(
      parent.find("input[name=" + fieldName + "]").val(),
      10
    );

    if (!isNaN(currentVal)) {
      parent.find("input[name=" + fieldName + "]").val(currentVal + 1);
    } else {
      parent.find("input[name=" + fieldName + "]").val(0);
    }

    var totalRice1 = parseFloat(document.AddFood.totalRice1.value);
    document.AddFood.totalRice1.value = Math.round(totalRice1) - 1;

    if (document.AddFood.totalRice1.value < 0) {
      alert("จำนวนเกิน"); // fail
      document.AddFood.totalRice1.value = 0;

      document.AddFood.DiffRice1.value = document.AddFood.DiffRice1.value - 1;
    } else {
      let imageToADD = 1;
      var src = "assets/img/ทัพพีข้าว.png";
      var img = $(
        "<img src='" +
          src +
          '\'  width="50" height="40" id="imageR1_' +
          imageToADD +
          '">'
      );
      $(".circle-top1").append(img);
      imageToADD++;
    }
  });
});

$(function () {
  $(document).on("click", "#decremR1", function () {
    let imageToDelete = 1;
    $("#imageR1_" + imageToDelete).remove();
    imageToDelete++;

    var fieldName = $(this).data("field");
    var parent = $(this).closest("div");
    var currentVal = parseInt(
      parent.find("input[name=" + fieldName + "]").val(),
      10
    );
    var totalRice1 = document.AddFood.totalRice1.value;
    if (!isNaN(currentVal) && currentVal > 0) {
      parent.find("input[name=" + fieldName + "]").val(currentVal - 1);
      document.AddFood.totalRice1.value = Math.round(totalRice1) + 1;
    } else {
      parent.find("input[name=" + fieldName + "]").val(0);
    }
  });
});
//End Rice 1

//Meet 1
$(function () {
  $("#incremM1").on("click", function () {
    var fieldName = $(this).data("field");
    var parent = $(this).closest("div");
    var currentVal = parseInt(
      parent.find("input[name=" + fieldName + "]").val(),
      10
    );

    if (!isNaN(currentVal)) {
      parent.find("input[name=" + fieldName + "]").val(currentVal + 1);
    } else {
      parent.find("input[name=" + fieldName + "]").val(0);
    }

    var totalMeet1 = parseFloat(document.AddFood.totalMeet1.value);
    document.AddFood.totalMeet1.value = Math.round(totalMeet1) - 1;

    if (document.AddFood.totalMeet1.value < 0) {
      alert("จำนวนเกิน"); // fail
      document.AddFood.totalMeet1.value = 0;

      document.AddFood.DiffMeet1.value = document.AddFood.DiffMeet1.value - 1;
    } else {
      let imageToADD = 1;
      var src = "assets/img/ไก่.png";
      var img = $(
        "<img src='" +
          src +
          '\'  width="50" height="40" id="imageM1_' +
          imageToADD +
          '">'
      );
      $(".circle-bottom1").append(img);
      imageToADD++;
    }
  });
});

$(function () {
  $(document).on("click", "#decremM1", function () {
    let imageToDelete = 1;
    $("#imageM1_" + imageToDelete).remove();
    imageToDelete++;

    var fieldName = $(this).data("field");
    var parent = $(this).closest("div");
    var currentVal = parseInt(
      parent.find("input[name=" + fieldName + "]").val(),
      10
    );
    var totalMeet1 = document.AddFood.totalMeet1.value;
    if (!isNaN(currentVal) && currentVal > 0) {
      parent.find("input[name=" + fieldName + "]").val(currentVal - 1);
      document.AddFood.totalMeet1.value = Math.round(totalMeet1) + 1;
    } else {
      parent.find("input[name=" + fieldName + "]").val(0);
    }
  });
});
//End Meet 1

//Fruit 1
$(function () {
  $("#incremFruit1").on("click", function () {
    var fieldName = $(this).data("field");
    var parent = $(this).closest("div");
    var currentVal = parseInt(
      parent.find("input[name=" + fieldName + "]").val(),
      10
    );

    if (!isNaN(currentVal)) {
      parent.find("input[name=" + fieldName + "]").val(currentVal + 1);
    } else {
      parent.find("input[name=" + fieldName + "]").val(0);
    }

    var totalFruit1 = parseFloat(document.AddFood.totalFruit1.value);
    document.AddFood.totalFruit1.value = Math.round(totalFruit1) - 1;

    if (document.AddFood.totalFruit1.value < 0) {
      alert("จำนวนเกิน"); // fail
      document.AddFood.totalFruit1.value = 0;

      document.AddFood.DiffFruit1.value = document.AddFood.DiffFruit1.value - 1;
    } else {
      let imageToADD = 1;
      var src = "assets/img/Single_apple.png";
      var img = $(
        "<img src='" +
          src +
          '\'  width="100" height="60%" id="imageF1_' +
          imageToADD +
          '">'
      );
      $(".Fruit1").append(img);
      imageToADD++;
    }
  });
});

$(function () {
  $(document).on("click", "#decremFruit1", function () {
    let imageToDelete = 1;
    $("#imageF1_" + imageToDelete).remove();
    imageToDelete++;

    var fieldName = $(this).data("field");
    var parent = $(this).closest("div");
    var currentVal = parseInt(
      parent.find("input[name=" + fieldName + "]").val(),
      10
    );
    var totalFruit1 = document.AddFood.totalFruit1.value;
    if (!isNaN(currentVal) && currentVal > 0) {
      parent.find("input[name=" + fieldName + "]").val(currentVal - 1);
      document.AddFood.totalFruit1.value = Math.round(totalFruit1) + 1;
    } else {
      parent.find("input[name=" + fieldName + "]").val(0);
    }
  });
});
//End Fruit 1

//Milk 1
$(function () {
  $("#incremMilk1").on("click", function () {
    var fieldName = $(this).data("field");
    var parent = $(this).closest("div");
    var currentVal = parseInt(
      parent.find("input[name=" + fieldName + "]").val(),
      10
    );

    if (!isNaN(currentVal)) {
      parent.find("input[name=" + fieldName + "]").val(currentVal + 1);
    } else {
      parent.find("input[name=" + fieldName + "]").val(0);
    }

    var totalMilk1 = parseFloat(document.AddFood.totalMilk1.value);
    document.AddFood.totalMilk1.value = Math.round(totalMilk1) - 1;

    if (document.AddFood.totalMilk1.value < 0) {
      alert("จำนวนเกิน"); // fail
      document.AddFood.totalMilk1.value = 0;

      document.AddFood.DiffMilk1.value = document.AddFood.DiffMilk1.value - 1;
    } else {
      let imageToADD = 1;
      var src = "assets/img/Milk.png";
      var img = $(
        "<img src='" +
          src +
          '\'  width="150" height="60%" id="imageMilk1_' +
          imageToADD +
          '">'
      );
      $(".Milk1").append(img);
      imageToADD++;
    }
  });
});

$(function () {
  $(document).on("click", "#decremMilk1", function () {
    let imageToDelete = 1;
    $("#imageMilk1_" + imageToDelete).remove();
    imageToDelete++;

    var fieldName = $(this).data("field");
    var parent = $(this).closest("div");
    var currentVal = parseInt(
      parent.find("input[name=" + fieldName + "]").val(),
      10
    );
    var totalMilk1 = document.AddFood.totalMilk1.value;
    if (!isNaN(currentVal) && currentVal > 0) {
      parent.find("input[name=" + fieldName + "]").val(currentVal - 1);
      document.AddFood.totalMilk1.value = Math.round(totalMilk1) + 1;
    } else {
      parent.find("input[name=" + fieldName + "]").val(0);
    }
  });
});
//End Milk 1

//End Step1

//start Step 2
//Rice 2
$(function () {
  $(document).on("click", "#incremR2", function () {
    var fieldName = $(this).data("field");
    var parent = $(this).closest("div");
    var currentVal = parseInt(
      parent.find("input[name=" + fieldName + "]").val(),
      10
    );

    if (!isNaN(currentVal)) {
      parent.find("input[name=" + fieldName + "]").val(currentVal + 1);
    } else {
      parent.find("input[name=" + fieldName + "]").val(0);
    }

    var totalRice1 = parseFloat(document.AddFood.totalRice1.value);
    document.AddFood.totalRice1.value = Math.round(totalRice1) - 1;

    if (document.AddFood.totalRice1.value < 0) {
      alert("จำนวนเกิน"); // fail
      document.AddFood.totalRice1.value = 0;

      document.AddFood.DiffRice2.value = document.AddFood.DiffRice2.value - 1;
    } else {
      let imageToADD = 1;
      var src = "assets/img/ทัพพีข้าว.png";
      var img = $(
        "<img src='" +
          src +
          '\'  width="50" height="40" id="imageR2_' +
          imageToADD +
          '">'
      );
      $(".circle-top2").append(img);
      imageToADD++;
    }
  });
});

$(function () {
  $(document).on("click", "#decremR2", function () {
    let imageToDelete = 1;
    $("#imageR2_" + imageToDelete).remove();
    imageToDelete++;

    var fieldName = $(this).data("field");
    var parent = $(this).closest("div");
    var currentVal = parseInt(
      parent.find("input[name=" + fieldName + "]").val(),
      10
    );

    var totalRice1 = document.AddFood.totalRice1.value;
    if (!isNaN(currentVal) && currentVal > 0) {
      parent.find("input[name=" + fieldName + "]").val(currentVal - 1);
      document.AddFood.totalRice1.value = Math.round(totalRice1) + 1;
    } else {
      parent.find("input[name=" + fieldName + "]").val(0);
    }
  });
});
//End Rice 2

//Meet 2
$(function () {
  $("#incremM2").on("click", function () {
    var fieldName = $(this).data("field");
    var parent = $(this).closest("div");
    var currentVal = parseInt(
      parent.find("input[name=" + fieldName + "]").val(),
      10
    );

    if (!isNaN(currentVal)) {
      parent.find("input[name=" + fieldName + "]").val(currentVal + 1);
    } else {
      parent.find("input[name=" + fieldName + "]").val(0);
    }

    var totalMeet1 = parseFloat(document.AddFood.totalMeet1.value);
    document.AddFood.totalMeet1.value = Math.round(totalMeet1) - 1;

    if (document.AddFood.totalMeet1.value < 0) {
      alert("จำนวนเกิน"); // fail
      document.AddFood.totalMeet1.value = 0;

      document.AddFood.DiffMeet2.value = document.AddFood.DiffMeet2.value - 1;
    } else {
      let imageToADD = 1;
      var src = "assets/img/ไก่.png";
      var img = $(
        "<img src='" +
          src +
          '\'  width="50" height="40" id="imageM2_' +
          imageToADD +
          '">'
      );
      $(".circle-bottom2").append(img);
      imageToADD++;
    }
  });
});

$(function () {
  $(document).on("click", "#decremM2", function () {
    let imageToDelete = 1;
    $("#imageM2_" + imageToDelete).remove();
    imageToDelete++;

    var fieldName = $(this).data("field");
    var parent = $(this).closest("div");
    var currentVal = parseInt(
      parent.find("input[name=" + fieldName + "]").val(),
      10
    );
    var totalMeet1 = document.AddFood.totalMeet1.value;
    if (!isNaN(currentVal) && currentVal > 0) {
      parent.find("input[name=" + fieldName + "]").val(currentVal - 1);
      document.AddFood.totalMeet1.value = Math.round(totalMeet1) + 1;
    } else {
      parent.find("input[name=" + fieldName + "]").val(0);
    }
  });
});
//End Meet 2

//Fruit 2
$(function () {
  $("#incremFruit2").on("click", function () {
    var fieldName = $(this).data("field");
    var parent = $(this).closest("div");
    var currentVal = parseInt(
      parent.find("input[name=" + fieldName + "]").val(),
      10
    );

    if (!isNaN(currentVal)) {
      parent.find("input[name=" + fieldName + "]").val(currentVal + 1);
    } else {
      parent.find("input[name=" + fieldName + "]").val(0);
    }

    var totalFruit1 = parseFloat(document.AddFood.totalFruit1.value);
    document.AddFood.totalFruit1.value = Math.round(totalFruit1) - 1;

    if (document.AddFood.totalFruit1.value < 0) {
      alert("จำนวนเกิน"); // fail
      document.AddFood.totalFruit1.value = 0;

      document.AddFood.DiffFruit2.value = document.AddFood.DiffFruit2.value - 1;
    } else {
      let imageToADD = 1;
      var src = "assets/img/Single_apple.png";
      var img = $(
        "<img src='" +
          src +
          '\'  width="100" height="60%" id="imageF2_' +
          imageToADD +
          '">'
      );
      $(".Fruit2").append(img);
      imageToADD++;
    }
  });
});

$(function () {
  $(document).on("click", "#decremFruit2", function () {
    let imageToDelete = 1;
    $("#imageF2_" + imageToDelete).remove();
    imageToDelete++;

    var fieldName = $(this).data("field");
    var parent = $(this).closest("div");
    var currentVal = parseInt(
      parent.find("input[name=" + fieldName + "]").val(),
      10
    );
    var totalFruit1 = document.AddFood.totalFruit1.value;
    if (!isNaN(currentVal) && currentVal > 0) {
      parent.find("input[name=" + fieldName + "]").val(currentVal - 1);
      document.AddFood.totalFruit1.value = Math.round(totalFruit1) + 1;
    } else {
      parent.find("input[name=" + fieldName + "]").val(0);
    }
  });
});
//End Fruit 2

//Milk 2
$(function () {
  $("#incremMilk2").on("click", function () {
    var fieldName = $(this).data("field");
    var parent = $(this).closest("div");
    var currentVal = parseInt(
      parent.find("input[name=" + fieldName + "]").val(),
      10
    );

    if (!isNaN(currentVal)) {
      parent.find("input[name=" + fieldName + "]").val(currentVal + 1);
    } else {
      parent.find("input[name=" + fieldName + "]").val(0);
    }

    var totalMilk1 = parseFloat(document.AddFood.totalMilk1.value);
    document.AddFood.totalMilk1.value = Math.round(totalMilk1) - 1;

    if (document.AddFood.totalMilk1.value < 0) {
      alert("จำนวนเกิน"); // fail
      document.AddFood.totalMilk1.value = 0;

      document.AddFood.DiffMilk2.value = document.AddFood.DiffMilk2.value - 1;
    } else {
      let imageToADD = 1;
      var src = "assets/img/Milk.png";
      var img = $(
        "<img src='" +
          src +
          '\'  width="150" height="60%" id="imageMilk2_' +
          imageToADD +
          '">'
      );
      $(".Milk2").append(img);
      imageToADD++;
    }
  });
});

$(function () {
  $(document).on("click", "#decremMilk2", function () {
    let imageToDelete = 1;
    $("#imageMilk2_" + imageToDelete).remove();
    imageToDelete++;

    var fieldName = $(this).data("field");
    var parent = $(this).closest("div");
    var currentVal = parseInt(
      parent.find("input[name=" + fieldName + "]").val(),
      10
    );
    var totalMilk1 = document.AddFood.totalMilk1.value;
    if (!isNaN(currentVal) && currentVal > 0) {
      parent.find("input[name=" + fieldName + "]").val(currentVal - 1);
      document.AddFood.totalMilk1.value = Math.round(totalMilk1) + 1;
    } else {
      parent.find("input[name=" + fieldName + "]").val(0);
    }
  });
});
//End Milk 2

//End Step2

//start Step 3
//Rice 3
$(function () {
  $(document).on("click", "#incremR3", function () {
    var fieldName = $(this).data("field");
    var parent = $(this).closest("div");
    var currentVal = parseInt(
      parent.find("input[name=" + fieldName + "]").val(),
      10
    );

    if (!isNaN(currentVal)) {
      parent.find("input[name=" + fieldName + "]").val(currentVal + 1);
    } else {
      parent.find("input[name=" + fieldName + "]").val(0);
    }

    var totalRice1 = parseFloat(document.AddFood.totalRice1.value);
    document.AddFood.totalRice1.value = Math.round(totalRice1) - 1;

    if (document.AddFood.totalRice1.value < 0) {
      alert("จำนวนเกิน"); // fail
      document.AddFood.totalRice1.value = 0;

      document.AddFood.DiffRice3.value = document.AddFood.DiffRice3.value - 1;
    } else {
      let imageToADD = 1;
      var src = "assets/img/ทัพพีข้าว.png";
      var img = $(
        "<img src='" +
          src +
          '\'  width="50" height="40" id="imageR3_' +
          imageToADD +
          '">'
      );
      $(".circle-top3").append(img);
      imageToADD++;
    }
  });
});

$(function () {
  $(document).on("click", "#decremR3", function () {
    let imageToDelete = 1;
    $("#imageR3_" + imageToDelete).remove();
    imageToDelete++;

    var fieldName = $(this).data("field");
    var parent = $(this).closest("div");
    var currentVal = parseInt(
      parent.find("input[name=" + fieldName + "]").val(),
      10
    );

    var totalRice1 = document.AddFood.totalRice1.value;
    if (!isNaN(currentVal) && currentVal > 0) {
      parent.find("input[name=" + fieldName + "]").val(currentVal - 1);
      document.AddFood.totalRice1.value = Math.round(totalRice1) + 1;
    } else {
      parent.find("input[name=" + fieldName + "]").val(0);
    }
  });
});
//End Rice 3

//Meet 3
$(function () {
  $("#incremM3").on("click", function () {
    var fieldName = $(this).data("field");
    var parent = $(this).closest("div");
    var currentVal = parseInt(
      parent.find("input[name=" + fieldName + "]").val(),
      10
    );

    if (!isNaN(currentVal)) {
      parent.find("input[name=" + fieldName + "]").val(currentVal + 1);
    } else {
      parent.find("input[name=" + fieldName + "]").val(0);
    }

    var totalMeet1 = parseFloat(document.AddFood.totalMeet1.value);
    document.AddFood.totalMeet1.value = Math.round(totalMeet1) - 1;

    if (document.AddFood.totalMeet1.value < 0) {
      alert("จำนวนเกิน"); // fail
      document.AddFood.totalMeet1.value = 0;

      document.AddFood.DiffMeet3.value = document.AddFood.DiffMeet3.value - 1;
    } else {
      let imageToADD = 1;
      var src = "assets/img/ไก่.png";
      var img = $(
        "<img src='" +
          src +
          '\'  width="50" height="40" id="imageM3_' +
          imageToADD +
          '">'
      );
      $(".circle-bottom3").append(img);
      imageToADD++;
    }
  });
});

$(function () {
  $(document).on("click", "#decremM3", function () {
    let imageToDelete = 1;
    $("#imageM3_" + imageToDelete).remove();
    imageToDelete++;

    var fieldName = $(this).data("field");
    var parent = $(this).closest("div");
    var currentVal = parseInt(
      parent.find("input[name=" + fieldName + "]").val(),
      10
    );
    var totalMeet1 = document.AddFood.totalMeet1.value;
    if (!isNaN(currentVal) && currentVal > 0) {
      parent.find("input[name=" + fieldName + "]").val(currentVal - 1);
      document.AddFood.totalMeet1.value = Math.round(totalMeet1) + 1;
    } else {
      parent.find("input[name=" + fieldName + "]").val(0);
    }
  });
});
//End Meet 3

//Fruit 3
$(function () {
  $("#incremFruit3").on("click", function () {
    var fieldName = $(this).data("field");
    var parent = $(this).closest("div");
    var currentVal = parseInt(
      parent.find("input[name=" + fieldName + "]").val(),
      10
    );

    if (!isNaN(currentVal)) {
      parent.find("input[name=" + fieldName + "]").val(currentVal + 1);
    } else {
      parent.find("input[name=" + fieldName + "]").val(0);
    }

    var totalFruit1 = parseFloat(document.AddFood.totalFruit1.value);
    document.AddFood.totalFruit1.value = Math.round(totalFruit1) - 1;

    if (document.AddFood.totalFruit1.value < 0) {
      alert("จำนวนเกิน"); // fail
      document.AddFood.totalFruit1.value = 0;

      document.AddFood.DiffFruit3.value = document.AddFood.DiffFruit3.value - 1;
    } else {
      let imageToADD = 1;
      var src = "assets/img/Single_apple.png";
      var img = $(
        "<img src='" +
          src +
          '\'  width="100" height="60%" id="imageF3_' +
          imageToADD +
          '">'
      );
      $(".Fruit3").append(img);
      imageToADD++;
    }
  });
});

$(function () {
  $(document).on("click", "#decremFruit3", function () {
    let imageToDelete = 1;
    $("#imageF3_" + imageToDelete).remove();
    imageToDelete++;

    var fieldName = $(this).data("field");
    var parent = $(this).closest("div");
    var currentVal = parseInt(
      parent.find("input[name=" + fieldName + "]").val(),
      10
    );
    var totalFruit1 = document.AddFood.totalFruit1.value;
    if (!isNaN(currentVal) && currentVal > 0) {
      parent.find("input[name=" + fieldName + "]").val(currentVal - 1);
      document.AddFood.totalFruit1.value = Math.round(totalFruit1) + 1;
    } else {
      parent.find("input[name=" + fieldName + "]").val(0);
    }
  });
});
//End Fruit 3

//Milk 3
$(function () {
  $("#incremMilk3").on("click", function () {
    var fieldName = $(this).data("field");
    var parent = $(this).closest("div");
    var currentVal = parseInt(
      parent.find("input[name=" + fieldName + "]").val(),
      10
    );

    if (!isNaN(currentVal)) {
      parent.find("input[name=" + fieldName + "]").val(currentVal + 1);
    } else {
      parent.find("input[name=" + fieldName + "]").val(0);
    }

    var totalMilk1 = parseFloat(document.AddFood.totalMilk1.value);
    document.AddFood.totalMilk1.value = Math.round(totalMilk1) - 1;

    if (document.AddFood.totalMilk1.value < 0) {
      alert("จำนวนเกิน"); // fail
      document.AddFood.totalMilk1.value = 0;

      document.AddFood.DiffMilk3.value = document.AddFood.DiffMilk3.value - 1;
    } else {
      let imageToADD = 1;
      var src = "assets/img/Milk.png";
      var img = $(
        "<img src='" +
          src +
          '\'  width="150" height="60%" id="imageMilk3_' +
          imageToADD +
          '">'
      );
      $(".Milk3").append(img);
      imageToADD++;
    }
  });
});

$(function () {
  $(document).on("click", "#decremMilk3", function () {
    let imageToDelete = 1;
    $("#imageMilk3_" + imageToDelete).remove();
    imageToDelete++;

    var fieldName = $(this).data("field");
    var parent = $(this).closest("div");
    var currentVal = parseInt(
      parent.find("input[name=" + fieldName + "]").val(),
      10
    );
    var totalMilk1 = document.AddFood.totalMilk1.value;
    if (!isNaN(currentVal) && currentVal > 0) {
      parent.find("input[name=" + fieldName + "]").val(currentVal - 1);
      document.AddFood.totalMilk1.value = Math.round(totalMilk1) + 1;
    } else {
      parent.find("input[name=" + fieldName + "]").val(0);
    }
  });
});
//End Milk 3

//End Step3