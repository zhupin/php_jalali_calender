<?php
include 'pdate_helper.php';
$year = isset($_REQUEST['year']) ? (int)$_REQUEST['year'] : (int)pdate('Y');
$month = isset($_REQUEST['month']) ? (int)$_REQUEST['month'] : (int)pdate('m');


 $week = pdate("W");
 $firstDayOfMonth = pmktime(0,0,0,$month,1,$year);
 $numberDays = pdate('t',$firstDayOfMonth);
 $dateComponents = pgetdate($firstDayOfMonth);
 $monthName = $dateComponents['month'];
 $dayOfWeek = $dateComponents['wday'];
$day_plus = $dayOfWeek;

?>



<html dir="rtl" align="right" lang="fa">
<head>
<meta charset="utf8" />
<style>
table#calendar{
	border-collapse:collapse;
	border:solid 1px #ccc;
	width:100%;

	
}
table#calendar th , table#calendar td{
border:solid 1px #ccc;
padding:6px;	

}
table#calendar td{
height:55px;
	text-align:center;
	vertical-align:middle;
}
table#calendar th{
background:#f2f2f2;
}

table#calendar td#holiday{
background:#ffa8a8;

	
}
table#calendar td.day_for_prev_month{
background:#dbe8ff;

	
}
table#calendar td.day_for_next_month{
background:#fffdb7;

	
}
</style>
</head>


<body>
<table id="calendar" >
<thead>
<tr>
<?php foreach(pdateWeekName() as $k=>$v){ ?>
<th id="dow_<?=$k?>" >
<?php echo $v ?>
</th>
<?php } ?>
</tr>
</thead>
<tbody>
<tr>
<?php for($day=1 ; $day <= $numberDays  ; $day++){  $day_plus ++;?>
<?php if( $dayOfWeek && $day==1){ ?>
 <td data-disabled= "1" class="day_for_prev_month" colspan="<?=$dayOfWeek?>" id="td_cal_pre_<?=$year.'_'.$month.'_'.$day ?>" >
      
   <?php    $dayOfWeek = 0; } ?>
<td  <?=$day==7 ? 'id="holiday" ' : ''?> ><?= $day?></td>
   
   <?php if($day==$numberDays && $day_plus!=7){?>
    <td data-disabled= "1" class="day_for_next_month" colspan="<?=7-$day_plus?>" id="td_cal_next_<?=$year.'_'.$month.'_'.$day ?>" >
 
   <?php } ?>
   
   <?php if($day_plus==7){?>
   </tr><tr>
   <?php $day_plus=0;} ?>
   

<?php } ?>
</tbody>
</body>
</html>