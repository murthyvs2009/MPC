<?php
include('inc/header.php');
?>

<h2><centre>MPC:Marks Percentage Calculator</centre></h2>



<a href="<?php echo $pageName; ?>?reset=true" class="btn btn-danger" style="float:right;">Reset</a>
<?php echo clearboth();?>


<?php
if (!isset($_SESSION['stName']))
{
echo studentDetail();
}
?>

<?php
/////////////////////////////////////////////////////////////////////////
//IF FORM (STUDENT DETAILS SUBMITTED ONLY STARTS)
/////////////////////////////////////////////////////////////////////////

if (isset($_SESSION['stName']))
{
?>

<div class="panel panel-default stdDetails">
    <div class="panel-heading">Student</div>
    <div class="panel-body">
    <?php echo $_SESSION['stName'];?><br/>
    <?php echo $_SESSION['stClass'];?><br/>
    </div>
</div>

<table class="table">
<tbody>
<tr>
  <td><b>Subjects</b></td>
  <td><b>Actual Marks</b></td>
  <td><b>Marks Obtained</b></td>
  <td colspan="2"><b>Percentage %</b></td>
</tr>

<tr>
    <form class="form-inline" action="" method="post">
    <td>  <div class="form-group"><input type="text" class="form-control" name="subject" placeholder="Subject Here!!"></div></td>
    <td> <div class="form-group"><input type="number" class="form-control"name="actualMarks" placeholder="Actual Marks Here!!"/></div></td>
    <td> <div class="form-group"><input type="number" class="form-control"name="marksObtained" placeholder="Marks Obtained Here!!"/></div></td>
    <td colspan="2"> <button type="submit" class="btn btn-info" name="submit45" value="submit" style="float:right;">Add</button></td>
  </form>
</tr>

<?php
$totalActualMarks=0;
$totalObtainedMarks=0;
?>

<?php
foreach ($_SESSION['MyArray']  as $value) {
    //echo $value;

    $indiPercentage=$_SESSION['marksObt'.$value]/$_SESSION['actMarks'.$value]*100;
    $totalActualMarks=$totalActualMarks+$_SESSION['actMarks'.$value];
    $totalObtainedMarks=$totalObtainedMarks+$_SESSION['marksObt'.$value];
?> 

    <tr>
    <td><?php echo $_SESSION['sub'.$value];?></td>
    <td><?php echo $_SESSION['actMarks'.$value];?></td>
    <td><?php echo $_SESSION['marksObt'.$value];?></td>
    <td calspan="2"><?php echo $indiPercentage; ?>%</td>
      <td><a href="<?php echo $pageName;?>?deleteId=<?php echo $value;?>"><img src="images/delIcon.png" style="max-height:15px;"></a></td>
    </tr>
    
 
<?php
}
?>
<tr>
    <td colspan="6"><hr/> </td>
</tr>
<tr>
    <td><b>Totals</b></td>
    <td><?php echo  $totalActualMarks;?></td>
    <td><?php echo  $totalObtainedMarks;?></td>
    <td calspan="2">
    <?php  
    $totalePercentage="";
    $totalePercentage=$totalObtainedMarks/$totalActualMarks*100;
    echo  round($totalePercentage,2);
    ?>
    %
    </td>
  </tr>

<?php
//echo  $totalActualMarks;
//echo  $totalObtainedMarks;
?>

 </tbody>
</table>




<?php
}
/////////////////////////////////////////////////////////////////////////
//IF FORM (STUDENT DETAILS SUBMITTED ONLY ENDS)
/////////////////////////////////////////////////////////////////////////
?>


<?php
include('inc/footer.php');
?>