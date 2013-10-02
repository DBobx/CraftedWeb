<?php
/*
             _____           ____
            |   __|_____ _ _|    \ ___ _ _ ___
            |   __|     | | |  |  | -_| | |_ -|
            |_____|_|_|_|___|____/|___|\_/|___|
     Copyright (C) 2013 EmuDevs <http://www.emudevs.com/>
 */
?>
<?php $page = new page; 
$server = new server;
$account = new account;
?>
<!-- Breadcrumb -->
<div class="three-fourths breadcrumb">
    <span><a href="index.php">Home</a></span>
    <span class="middle"></span>
    <span><a href="?p=logs">Logs</a></span>
    <span class="middle"></span>
    <span><a href="?p=logs&s=donationshop">Donation Shop</a></span>
    <span class="end"></span>
</div>
<!-- /Breadcrumb -->
<div class="one-third">
    <div class="box">
        <div class="inner">
            <div class="titlebar">Donation Shop Logs</div>
<?php $result = mysql_query("SELECT * FROM shoplog WHERE shop='donate' ORDER BY id DESC LIMIT 10 "); 
if(mysql_num_rows($result)==0) {
	echo "Seems like the donation shop log was empty!";
} else {
?>
 <input type='text' value='Search...' id="logs_search" onkeyup="searchLog('donate')"><hr/>
<table>
        <tr><th>User</th><th>Character</th><th>Realm</th><th>Item</th><th>Date</th></tr>
        <?php while($row = mysql_fetch_assoc($result)) { ?>
		<tr class="center">
            <td><?php echo $account->getAccName($row['account']); ?></td>
            <td><?php echo $account->getCharName($row['char_id'],$row['realm_id']); ?></td>
            <td><?php echo $server->getRealmName($row['realm_id']); ?></td>
            <td><a href="http://<?php echo $GLOBALS['tooltip_href']; ?>item=<?php echo $row['entry']; ?>" title="" target="_blank">
			<?php echo $server->getItemName($row['entry']); ?></a></td>
            <td><?php echo $row['date']; ?></td>
        </tr>	
		<?php } ?>
</table>
<?php } ?>
        </div>
    </div>
</div>