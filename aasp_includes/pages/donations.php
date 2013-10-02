<?php
/*
             _____           ____
            |   __|_____ _ _|    \ ___ _ _ ___
            |   __|     | | |  |  | -_| | |_ -|
            |_____|_|_|_|___|____/|___|\_/|___|
     Copyright (C) 2013 EmuDevs <http://www.emudevs.com/>
 */
?>
<!-- Breadcrumb -->
<div class="three-fourths breadcrumb">
    <span><a href="index.php">Home</a></span>
    <span class="middle"></span>
    <span><a href="?p=donations">Donations</a></span>
    <span class="end"></span>
</div>
<!-- /Breadcrumb -->
<?php 
	 $server->selectDB('webdb'); 
 	 $page = new page;
	 
	 $page->validatePageAccess('Donations');
	 
     if($page->validateSubPage() == TRUE) {
		 $page->outputSubPage();
	 } else {
		$donationsTotal = mysql_query("SELECT mc_gross FROM payments_log");
		$donationsTotalAmount = 0;
		while($row = mysql_fetch_assoc($donationsTotal)) 
		{
			$donationsTotalAmount = $donationsTotalAmount + $row['mc_gross'];
		}
		
		$donationsThisMonth = mysql_query("SELECT mc_gross FROM payments_log WHERE paymentdate LIKE '%".date('Y-md')."%'");
		$donationsThisMonthAmount = 0;
		while($row = mysql_fetch_assoc($donationsThisMonth)) 
		{
			$donationsThisMonthAmount = $donationsThisMonthAmount + $row['mc_gross'];
		}
		
		$q = mysql_query("SELECT mc_gross,userid FROM payments_log ORDER BY paymentdate DESC LIMIT 1");
		$row = mysql_fetch_assoc($q);
		$donationLatestAmount = $row['mc_gross'];
		
		$donationLatest = $account->getAccName($row['userid']);
?>
<div class="one-third">
    <div class="box">
        <div class="inner">
            <div class="titlebar">Donations</div>
            <table>
                <tr>
                    <td>Total donations</td><td><?php echo mysql_num_rows($donationsTotal); ?></td>
                    <td>Total donation amount</td><td><?php echo round($donationsTotalAmount,0); ?>$</td>
                </tr>
                <tr>
                    <td>Donations this month</td><td><?php echo mysql_num_rows($donationsThisMonth); ?></td>
                    <td>Donation amount this month</td><td><?php echo round($donationsThisMonthAmount,0); ?>$</td>
                </tr>
                <tr>
                    <td>Latest donation amount</td><td><?php echo round($donationLatestAmount); ?>$</td>
                    <td>Latest donator</td><td><?php echo $donationLatest; ?></td>
                </tr>
            </table>
            <hr/>
            <a href="?p=donations&s=browse" class="button blue medium" style="margin: 0 auto; display:block; text-align: center">Browse Donations</a>
            <?php } ?>
        </div>
    </div>
</div>