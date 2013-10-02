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
 	 $server->selectDB('webdb'); 
 	 $page = new page;
	 
	 $page->validatePageAccess('Users');
	 
     if($page->validateSubPage() == TRUE) {
		 $page->outputSubPage();
	 } else {
		 $server->selectDB('logondb');
		 $usersTotal = mysql_query("SELECT COUNT(*) FROM account");
		 $usersToday = mysql_query("SELECT COUNT(*) FROM account WHERE joindate LIKE '%".date("Y-m-d")."%'");
		 $usersMonth = mysql_query("SELECT COUNT(*) FROM account WHERE joindate LIKE '%".date("Y-m")."%'");
		 $usersOnline = mysql_query("SELECT COUNT(*) FROM account WHERE online=1");
		 $usersActive = mysql_query("SELECT COUNT(*) FROM account WHERE last_login LIKE '%".date("Y-m")."%'");
		 $usersActiveToday = mysql_query("SELECT COUNT(*) FROM account WHERE last_login LIKE '%".date("Y-m-d")."%'");	 
?>
<!-- Breadcrumb -->
<div class="three-fourths breadcrumb">
    <span><a href="index.php">Home</a></span>
    <span class="middle"></span>
    <span><a href="?p=users">Users</a></span>
    <span class="end"></span>
</div>
<!-- /Breadcrumb -->
<div class="two-thirds">
    <div class="box">
        <div class="inner">
            <div class="titlebar">User Manager</div>
            <table style="width: 100%;">
            <tr>
            <td><span class='blue_text'>Total users</span></td><td><?php echo round(mysql_result($usersTotal,0)); ?></td>
            <td><span class='blue_text'>New users today</span></td><td><?php echo round(mysql_result($usersToday,0)); ?></td>
            </tr>
            <tr>
                <td><span class='blue_text'>New users this month</span></td><td><?php echo round(mysql_result($usersMonth,0)); ?></td>
                <td><span class='blue_text'>Users online</span></td><td><?php echo round(mysql_result($usersOnline,0)); ?></td>
            </tr>
            <tr>
                <td><span class='blue_text'>Active users (this month)</span></td><td><?php echo round(mysql_result($usersActive,0)); ?></td>
                <td><span class='blue_text'>Users logged in today</span></td><td><?php echo round(mysql_result($usersActiveToday,0)); ?></td>
            </tr>
            </table>
            <div class="clear">&nbsp;</div>
            <div class="bar-big center">
                <a href="?p=users&s=manage" class="button green tiny" style="margin-top: 12px;"><span class="icon awesome user"></span> Manage Users</a>
            </div>
            </div>
         </div>
     </div>
 </div>
            <?php } ?>