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
    <span><a href="?p=dashboard">Dashboard</a></span>
    <span class="end"></span>
</div>
<!-- /Breadcrumb -->
<section class="two-sixths">
    <div class="box">
        <div class="inner">
        <div class="titlebar">Dashboard</div>
        <table>
            <tr><td><span class='fleft'>Account logged in today: </span></td><td><?php echo $server->getAccountsLoggedToday(); ?></td></tr>
            <tr><td><span class='fleft'>Web Database: </span></td><td><?php echo $GLOBALS['connection']['webdb']; ?></td></tr>
            <tr><td><span class='fleft'>Logon Database: </span></td><td><?php echo $GLOBALS['connection']['logondb']; ?></td></tr>
            <tr><td><span class='fleft'>World Database: </span></td><td><?php echo $GLOBALS['connection']['worlddb']; ?></td></tr>
            <tr><td><span class='fleft'>MySQL Host: </span></td><td><?php echo $GLOBALS['connection']['host'];?></td></tr>
        </table>
        </div>
    </div>
</section>
<?php
$server->checkForNotifications();
?>
<?php if(isset($_SESSION['cw_admin']))  { ?>
    <section class="two-sixths">
        <div class="box">
            <div class="inner">
                <div class="titlebar">Server Status</div>
            <?php $server->serverStatus(); ?>
            </div>
        </div>
    </section>
<?php } ?>
<section class="two-thirds">
    <div class="box">
        <div class="inner">
            <div class="titlebar">Admin Log</div>
            <?php
                $server->selectDB('webdb');
                $result = mysql_query("SELECT * FROM admin_log ORDER BY id DESC LIMIT 10");
                if(mysql_num_rows($result)==0) {
                    echo "The admin log was empty!";
                } else { ?>
                <table class="data-table">
                    <thead>
                    <tr>
                        <th>Date</th>
                        <th>User</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                        while($row = mysql_fetch_assoc($result)) { ?>
                            <tr>
                                <td class="center"><?php echo date("Y-m-d H:i:s",$row['timestamp']); ?></td>
                                <td class="center"><?php echo $account->getAccName($row['account']); ?></td>
                                <td class="center"><?php echo $row['action']; ?></td>
                            </tr>
                        <?php }?>
                    </tbody>
                </table>
            <a href="?p=logs&s=admin" title="Get more logs">Older logs...</a>
            <?php } ?>
            </div>
        </div>
</section>