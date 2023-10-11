<?php
session_start();
$pageName="index.php";
$whereLocated="https://murthy.wiseturtle.in/MPC/";

//if session is not true we will instantiate our array and add 1 and 2 to it.
if(!isset($_SESSION['MyArray'])){
$_SESSION['MyArray'] = [] ; 
}
///////////////////////////////////////////////
///////////////////////////////////////////////
if(isset($_GET['reset'])){
    session_destroy();
    header('Location:'.$whereLocated);
    exit;
}
/*
if(isset($_GET['addItem'])){
    $lastValue='';
    $oneAddedtoLastValue='';
    $lastValue=end($_SESSION['MyArray']);
    //    echo $lastValue;
    $oneAddedtoLastValue=$lastValue+"1";
    array_push($_SESSION['MyArray'],$oneAddedtoLastValue);
    header('Location:'.$whereLocated);
    exit;
}
*/

if(isset($_GET['deleteId'])){
    $del_val=trim($_GET['deleteId']);
    $key = array_search($del_val, $_SESSION['MyArray']);
    unset($_SESSION['MyArray'][$key]);
    header('Location:'.$whereLocated);
    exit;
}

if(isset($_POST['submit45'])){
  //Do the deeds
  //A)Get new numbers.
  $lastValue='';
  $oneAddedtoLastValue='';
  $lastValue=end($_SESSION['MyArray']);
  //    echo $lastValue;
  $oneAddedtoLastValue=$lastValue+"1";
  array_push($_SESSION['MyArray'],$oneAddedtoLastValue);
  //Create new session variables.
  $subject=$_POST['subject'];
  $actualMarks=$_POST['actualMarks'];
  $marksObtained=$_POST['marksObtained'];
  $_SESSION['sub'.$oneAddedtoLastValue]=$subject;
  $_SESSION['actMarks'.$oneAddedtoLastValue]=$actualMarks;
  $_SESSION['marksObt'.$oneAddedtoLastValue]=$marksObtained;
  header('location:'.$whereLocated);
  exit;
}

function clearboth(){
    $var="";
    $var="<div style='clear:both;'>&nbsp;</div>";
    return $var;
}


if (isset($_POST['stName'])){
//    echo "I am here.";

    $_SESSION['stName']=trim($_POST['stName']);
    $_SESSION['stClass']=trim($_POST['stClass']);
    //header('location:'.$whereLocated);
    //exit;
}

function studentDetail() {
    $var="";
    $var.='<div class="panel panel-default stdDetails">';
    $var.='<div class="panel-heading">Student Detials</div>';
    $var.='<div class="panel-body">';
    $var.='<form class="form-inline" action="" method="post">';
    $var.='<div class="form-outline mb-4">';
    $var.='<input type="text" id="stName" name="stName" class="form-control" placeholder="Name"/>';
    $var.='</div>';
    $var.='';
    $var.='<div class="form-outline mb-4">';
    $var.='<input type="text" id="stClass" name="stClass" class="form-control" placeholder="Class"/>';
    $var.='</div>';
    $var.='<button type="submit" class="btn btn-info" name="submit" value="submit" style="float:right;">SUBMIT</button>';
    $var.='</form>';
    $var.='</div>';
    $var.='</div>';
    return $var;
    }

?>
<HTML>	
	
<HEAD>
    <TITLE>MPC:Marks Percentage Calculator</TITLE>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="<?php echo $whereLocated;?>inc/coustom.css" rel="stylesheet">
</HEAD>	
<BODY>
<div class="tableContainer">