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
$server = new server;
$account = new account;
$per_page = 20;
$pages_query = mysql_query("SELECT COUNT(*) FROM admin_log");
$pages = ceil(mysql_result($pages_query,0) / $per_page );
$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $per_page;

if(isset($_SESSION['cw_staff']) && !isset($_SESSION['cw_admin']))
{
	if($_SESSION['cw_staff_level'] < $GLOBALS['adminPanel_minlvl'])
		exit('Hey! You shouldn\'t be here!');
}
?>
<!-- Breadcrumb -->
<div class="three-fourths breadcrumb">
    <span><a href="index.php">Home</a></span>
    <span class="middle"></span>
    <span><a href="?p=logs">Logs</a></span>
    <span class="middle"></span>
    <span><a href="?p=logs&s=admin">Admin Panel</a></span>
    <span class="end"></span>
</div>
<!-- /Breadcrumb -->
<div class="two-thirds">
    <div class="box">
        <div class="inner">
            <div class="titlebar">Admin Logs</div>
            <table class="data-table">
               <thead>
                   <tr>
                       <th>Date</th>
                       <th>User</th>
                       <th>Action</th>
                       <th>IP</th>
                   </tr>
               </thead>
                <tbody>
               <?php
                    $server->selectDB('webdb');
                    $result = mysql_query("SELECT * FROM admin_log ORDER BY id DESC LIMIT ".$start.",".$per_page);
                    while($row = mysql_fetch_assoc($result)) { ?>
                        <tr>
                            <td class="center"><?php echo date("Y-m-d H:i:s",$row['timestamp']); ?></td>
                            <td class="center"><?php echo $account->getAccName($row['account']); ?></td>
                            <td class="center"><?php echo $row['action']; ?></td>
                            <td class="center"><?php echo $row['ip']; ?></td>
                        </tr>
                    <?php }
               ?>
                </tbody>
            </table>

            <?php
                if($pages>=1 && $page <= $pages)
                {
                    if($page>1)
                    {
                       $prev = $page-1;
                       echo '<a href="?p=logs&s=admin&page='.$prev.'" title="Previous" class="button large first">Prev</a>';
                    }
                    for($x=1; $x<=$pages; $x++)
                    {
                        if($page == $x)
                           echo '<a href="?p=logs&s=admin&page='.$x.'" title="Page '.$x.'" class="button large"><b>'.$x.'</b></a>';
                        else
                           echo '<a href="?p=logs&s=admin&page='.$x.'" title="Page '.$x.'" class="button large">'.$x.'</a>';
                    }
                    if($page<$x - 1)
                    {
                       $next = $page+1;
                       echo '&nbsp; <a href="?p=logs&s=admin&page='.$next.'" title="Next" class="button large last">Next</a>';
                    }
                }
            ?>
        </div>
    </div>
</div>