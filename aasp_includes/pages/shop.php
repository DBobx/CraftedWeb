<?php
/*
             _____           ____
            |   __|_____ _ _|    \ ___ _ _ ___
            |   __|     | | |  |  | -_| | |_ -|
            |_____|_|_|_|___|____/|___|\_/|___|
     Copyright (C) 2013 EmuDevs <http://www.emudevs.com/>
 */
?>
<?php 
     $page = new page;
	 
	 $page->validatePageAccess('Shop');
	 
     if($page->validateSubPage() == TRUE) {
		 $page->outputSubPage();
	 } else {
		 $server->selectDB('webdb');
		 $inShop = mysql_query("SELECT COUNT(*) FROM shopitems");
		 $purchToday = mysql_query("SELECT COUNT(*) FROM shoplog WHERE date LIKE '%".date('Y-m-d')."%'");
		 $getAvg = mysql_query("SELECT AVG(*) AS priceAvg FROM shopitems");
		 $totalPurch = mysql_query("SELECT COUNT(*) FROM shoplog");
		 
		 //Note: The round() function will return 0 if no value is set :)
?>
 <!-- Breadcrumb -->
 <div class="three-fourths breadcrumb">
     <span><a href="index.php">Home</a></span>
     <span class="middle"></span>
     <span><a href="?p=shop">Shop Overview</a></span>
     <span class="end"></span>
 </div>
 <!-- /Breadcrumb -->
         <div class="clear"></div>
 <div class="one-fourth">
 <div class="box">
 <div class="inner">
 <div class="titlebar">Shop Overview</div>
<table>
<tr>
<td>Items in Shop</td><td><?php echo round(mysql_result($inShop,0));?></td>
</tr>
<tr>
    <td>Purchases Today</td><td><?php echo round(mysql_result($purchToday,0)); ?></td>
    </tr>
    <tr>
    <td>Total Purchases</td><td><?php echo round(mysql_result($totalPurch,0)); ?></td>
</tr>
<tr>
    <td>Avg. Item Cost</td><td><?php echo round(mysql_result($getAvg,0)); ?></td>
</tr>
</table>
<hr/>
             <center>
<a href="?p=shop&s=add" class="button blue medium">Add Items</a>&nbsp;
<a href="?p=shop&s=manage" class="button blue medium">Manage Items</a>&nbsp;
<a href="?p=shop&s=tools" class="button blue medium">Tools</a>
                 </center>
         </div>
         </div>
         </div>
<?php } ?>