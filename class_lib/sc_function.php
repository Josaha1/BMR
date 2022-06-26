<?php

function chk_teacher($tid, $day, $Term, $block) {
    $db = new Database();
    $chk = [];
    $sqlCommand = "SELECT `startblock`,`endblock`,`sub_id` FROM  `list_load_teacher` WHERE (`tea_ID`='$tid' AND `day_teach`='" . $day . "') AND (term='" . $Term . "') ORDER BY `startblock`";
    $result_chk = 0;
    foreach ($db->to_Object($sqlCommand) as $chkt) {
        //$result = count($b);
        //unset($chk); //reset คาบ
        //$chk = []; //สร้างตัวแปรใหม่
        for ($i = $chkt[startblock]; $i <= $chkt[endblock]; $i++) {
            array_push($chk, $i);
        }
    }
    $chk_array = count($chk); //หาจำนวน array
    $arraytrue = $chk_array - 1;

    for ($p = 0; $p <= $arraytrue; $p++) { //เช็คคาบว่าชนไหม
        if ($chk[$p] == $block) {
            $result_chk++;
        }
    }

    return $result_chk; //คืนค่า ไม่ 1 ก็ 0
    //return $chk;
}

/* function chk_subject_in_term($tid, $Term) {
  $db = new Database();
  $chk = [];
  $sqlCommand = "SELECT `startblock`,`endblock`,`section`,`sub_id`,`d` FROM  `list_load_teacher` WHERE (`tea_ID`='$tid' AND `day_teach`='" . $day . "') AND (term='" . $Term . "') ORDER BY `startblock`";
  $result_chk = 0;
  foreach ($db->to_Object($sqlCommand) as $chkt) {
  //$result = count($b);
  unset($chk); //reset คาบ
  $chk = []; //สร้างตัวแปรใหม่
  for ($i = $chkt[startblock]; $i <= $chkt[endblock]; $i++) {
  array_push($chk, $i);
  }
  $chk_array = count($chk); //หาจำนวน array
  $arraytrue = $chk_array - 1;

  for ($p = 0; $p <= $arraytrue; $p++) { //เช็คคาบว่าชนไหม
  if ($chk[$p] == $block) {
  $result_chk++;
  }
  }
  }
  return $result_chk;//คืนค่า ไม่ 1 ก็ 0
  //return $chk;
  }
 */

function chk_student_only($st, $day, $Term, $block) {
    $db = new Database();
    $chk = [];
    $sqlCommand = "SELECT `startblock`,`endblock`,`sub_id`,`r_no`,`Tnames` FROM `list_load_teacher_for_chk` WHERE (`sec_stu`='$st' AND `day_teach`='" . $day . "') AND (term='" . $Term . "') ORDER BY `startblock`";
    //$sqlCommand = "SELECT `startblock`,`endblock`,`sub_id`,`sec_stu`,`r_no` FROM  `list_load_teacher` WHERE (`tea_ID`='$tid' AND `day_teach`='" . $day . "') AND (term='" . $Term . "') ORDER BY `startblock`";
    $result_chk = [];
    foreach ($db->to_Object($sqlCommand) as $chkt) {
        //$result = count($b);
        unset($chk); //reset คาบ
        $chk = []; //สร้างตัวแปรใหม่
        for ($i = $chkt[startblock]; $i <= $chkt[endblock]; $i++) {
            array_push($chk, $i);
        }
        $chk_array = count($chk); //หาจำนวน array
        $arraytrue = $chk_array - 1;
       // $k = 1;
        for ($p = 0; $p <= $arraytrue; $p++) { //เช็คคาบว่าชนไหม
            if ($chk[$p] == $block) {
                //$result_chk =  $chkt[sub_id];
                $result_chk["sub_id"] = "$chkt[sub_id]";
                $result_chk["r_no"] = "$chkt[r_no]";
                $result_chk["Tnames"] = "$chkt[Tnames]";
                //$result_chk["k"] = "$k";
            }
            //$k++;
        }
    }
    return $result_chk; //คืนค่า ไม่ 1 ก็ 0
    //return $chk;
}

function chk_tea_only($tid, $day, $Term, $block) {
    $db = new Database();
    $chk = [];
    $sqlCommand = "SELECT `startblock`,`endblock`,`sub_id`,`sec_stu`,`r_no` FROM  `list_load_teacher_for_chk` WHERE (`tea_ID`='$tid' AND `day_teach`='" . $day . "') AND (term='" . $Term . "') ORDER BY `startblock`";
    $result_chk = [];
    foreach ($db->to_Object($sqlCommand) as $chkt) {
        //$result = count($b);
        unset($chk); //reset คาบ
        $chk = []; //สร้างตัวแปรใหม่
        for ($i = $chkt[startblock]; $i <= $chkt[endblock]; $i++) {
            array_push($chk, $i);
        }
        $chk_array = count($chk); //หาจำนวน array
        $arraytrue = $chk_array - 1;
        //$k = 1;
        for ($p = 0; $p <= $arraytrue; $p++) { //เช็คคาบว่าชนไหม
            if ($chk[$p] == $block) {
                $result_chk["sec_stu"] = "$chkt[sec_stu]";
                $result_chk["sub_id"] = "$chkt[sub_id]";
                $result_chk["r_no"] = "$chkt[r_no]";
                //$result_chk["k"] = "$k";
            }
            //$k++;
        }
    }
    return $result_chk; //คืนค่า ไม่ 1 ก็ 0
    //return $chk;
}

function chk_room_only($r, $day, $Term, $block) {
    $db = new Database();
    $chk = [];
    $sqlCommand = "SELECT `startblock`,`endblock`,`sec_stu`,`sub_id`,`Tnames` FROM `list_load_teacher_for_chk` WHERE (`r_no`='$r' AND `day_teach`='" . $day . "') AND (term='" . $Term . "') ORDER BY `startblock`";
    $result_chk = [];
    foreach ($db->to_Object($sqlCommand) as $chkt) {
        //$result = count($b);
        unset($chk); //reset คาบ
        $chk = []; //สร้างตัวแปรใหม่
        for ($i = $chkt[startblock]; $i <= $chkt[endblock]; $i++) {
            array_push($chk, $i);
        }
        $chk_array = count($chk); //หาจำนวน array
        $arraytrue = $chk_array - 1;
       // $k = 1;
        for ($p = 0; $p <= $arraytrue; $p++) { //เช็คคาบว่าชนไหม
            if ($chk[$p] == $block) {
                $result_chk["sec_stu"] = "$chkt[sec_stu]";
                $result_chk["sub_id"] = "$chkt[sub_id]";
                $result_chk["Tnames"] = "$chkt[Tnames]";
                //$result_chk["k"] = "$k";
            }
            //$k++;
        }
    }
    return $result_chk; //คืนค่า ไม่ 1 ก็ 0
    //return $chk;
}

function chk_student($st, $day, $Term, $block) {
    $db = new Database();
    $chk = [];
    $sqlCommand = "SELECT `startblock`,`endblock`,`sub_id` FROM `teach` WHERE (`sec_stu`='$st' AND `day_teach`='" . $day . "') AND (term='" . $Term . "') ORDER BY `startblock`";
    $result_chk = 0;
    foreach ($db->to_Object($sqlCommand) as $chkt) {
        //$result = count($b);
        //unset($chk); //reset คาบ
        //$chk = []; //สร้างตัวแปรใหม่
        for ($i = $chkt[startblock]; $i <= $chkt[endblock]; $i++) {
            array_push($chk, $i);
        }
    }
    $chk_array = count($chk); //หาจำนวน array
    $arraytrue = $chk_array - 1;

    for ($p = 0; $p <= $arraytrue; $p++) { //เช็คคาบว่าชนไหม
        if ($chk[$p] == $block) {
            $result_chk++;
        }
    }

    return $result_chk; //คืนค่า ไม่ 1 ก็ 0
    //return $chk;
}

function chk_stu_befor_save($st, $day, $Term, $blockstart, $blockend) {
    $db = new Database();
    $chk = [];
    $sqlCommand = "SELECT `startblock`,`endblock`,`sub_id` FROM `teach` WHERE (`sec_stu`='$st' AND `day_teach`='" . $day . "') AND (term='" . $Term . "') ORDER BY `startblock`";
    $result_chk = 0;
    foreach ($db->to_Object($sqlCommand) as $chkt) {
        //$result = count($b);
        //unset($chk); //reset คาบ
        //$chk = []; //สร้างตัวแปรใหม่
        for ($i = $chkt[startblock]; $i <= $chkt[endblock]; $i++) {
            array_push($chk, $i);
        }
    }
    $chk_array = count($chk); //หาจำนวน array
    $arraytrue = $chk_array - 1;

    for ($p = 0; $p <= $arraytrue; $p++) { //เช็คคาบว่าชนไหม
        for ($k = $blockstart; $k <= $blockend; $k++) { //เช็คคาบว่าชนไหม
            if ($chk[$p] == $k) {
                $result_chk++;
            }
        }
    }

    return $result_chk; //คืนค่า ไม่ 1 ก็ 0
    //return $chk;
}

function chk_room_befor_save($r_no, $day, $Term, $blockstart, $blockend) {
    $db = new Database();
    $chk = [];
    $sqlCommand = "SELECT `startblock`,`endblock`,`sub_id` FROM `teach` WHERE (`r_no`='$r_no' AND `day_teach`='" . $day . "') AND (term='" . $Term . "') ORDER BY `startblock`";
    $result_chk = 0;
    foreach ($db->to_Object($sqlCommand) as $chkt) {
        //$result = count($b);
        //unset($chk); //reset คาบ
        //$chk = []; //สร้างตัวแปรใหม่
        for ($i = $chkt[startblock]; $i <= $chkt[endblock]; $i++) {
            array_push($chk, $i);
        }
    }
    $chk_array = count($chk); //หาจำนวน array
    $arraytrue = $chk_array - 1;

    for ($p = 0; $p <= $arraytrue; $p++) { //เช็คคาบว่าชนไหม
        for ($k = $blockstart; $k <= $blockend; $k++) { //เช็คคาบว่าชนไหม
            if ($chk[$p] == $k) {
                $result_chk++;
            }
        }
    }

    return $result_chk; //คืนค่า ไม่ 1 ก็ 0
    //return $chk;
}

function chk_tea_befor_save($t, $day, $Term, $blockstart, $blockend) {
    $db = new Database();
    $chk = [];
    $sqlCommand = "SELECT `startblock`,`endblock`,`sub_id` FROM  `list_load_teacher` WHERE (`tea_ID`='$t' AND `day_teach`='" . $day . "') AND (term='" . $Term . "') ORDER BY `startblock`";
    $result_chk = 0;
    foreach ($db->to_Object($sqlCommand) as $chkt) {
        //$result = count($b);
        //unset($chk); //reset คาบ
        //$chk = []; //สร้างตัวแปรใหม่
        for ($i = $chkt[startblock]; $i <= $chkt[endblock]; $i++) {
            array_push($chk, $i);
        }
    }
    $chk_array = count($chk); //หาจำนวน array
    $arraytrue = $chk_array - 1;

    for ($p = 0; $p <= $arraytrue; $p++) { //เช็คคาบว่าชนไหม
        for ($k = $blockstart; $k <= $blockend; $k++) { //เช็คคาบว่าชนไหม
            if ($chk[$p] == $k) {
                $result_chk++;
            }
        }
    }

    return $result_chk; //คืนค่า ไม่ 1 ก็ 0
    //return $chk;
}

function chk_room($r, $day, $Term, $block) {
    $db = new Database();
    $chk = [];
    $sqlCommand = "SELECT `startblock`,`endblock`,`sub_id` FROM `teach` WHERE (`r_no`='$r' AND `day_teach`='" . $day . "') AND (term='" . $Term . "') ORDER BY `startblock`";
    $result_chk = 0;
    foreach ($db->to_Object($sqlCommand) as $chkt) {
        //$result = count($b);
        //unset($chk); //reset คาบ
        //$chk = []; //สร้างตัวแปรใหม่
        for ($i = $chkt[startblock]; $i <= $chkt[endblock]; $i++) {
            array_push($chk, $i);
        }
    }
    $chk_array = count($chk); //หาจำนวน array
    $arraytrue = $chk_array - 1;

    for ($p = 0; $p <= $arraytrue; $p++) { //เช็คคาบว่าชนไหม
        if ($chk[$p] == $block) {
            $result_chk++;
        }
    }

    return $result_chk; //คืนค่า ไม่ 1 ก็ 0
    //return $chk;
}

function chk_tea_bf_addtoteach($dayteach, $Term, $bcStart, $bcStop, $teaid) {
    $db = new Database();
    $timeteach = [];
    $timeteachadd = [];
    $sqlCommand = "SELECT `startblock`,`endblock`,`sub_id` FROM  `teach` WHERE (`tea_ID`='$teaid') AND (`term`='$Term' AND `day_teach`='$dayteach') ORDER BY `startblock`";
    //$sqlCommand = "SELECT `startblock`,`endblock`,`sub_id` FROM `teach` WHERE (`r_no`='$r' AND `day_teach`='" . $day . "') AND (term='" . $Term . "') ORDER BY `startblock`";
    $result_chk = 0;
    foreach ($db->to_Object($sqlCommand) as $chkt) {
        //$result = count($b);
        //unset($chk); //reset คาบ
        //$chk = []; //สร้างตัวแปรใหม่
        for ($i = $chkt[startblock]; $i <= $chkt[endblock]; $i++) {
             array_push($timeteachadd, array("block" => "$i", "subid" => "$chkt[sub_id]"));
            //array_push($timeteachadd, $i);
        }
    }
    //$timeteach_array = count($timeteach); //หาจำนวน array
    // $arraytrue = $timeteach_array - 1;
    for ($a = $bcStart; $a <= $bcStop; $a++) {
        array_push($timeteach, $a);
       
    }


    foreach ($timeteachadd as $valueadd) {
        foreach ($timeteach as $value) {
            if ($valueadd["block"] == $value) {
                $result_chk++;
            }
        }
    }
    return $result_chk; //คืนค่า ไม่ 1 ก็ 0
    //return $chk;
}
