<?php
/*
             _____           ____
            |   __|_____ _ _|    \ ___ _ _ ___
            |   __|     | | |  |  | -_| | |_ -|
            |_____|_|_|_|___|____/|___|\_/|___|
     Copyright (C) 2013 EmuDevs <http://www.emudevs.com/>
 */
?>
<?php $page = new page; ?>
<div class="one-third">
    <div class="box">
        <div class="inner">
            <div class="titlebar">Donations</div>
            <?php
            $server = new server;
            $account = new account;

            $per_page = 20;

            $pages_query = mysql_query("SELECT COUNT(*) FROM payments_log");
            $pages = ceil(mysql_result($pages_query,0) / $per_page );

            if(mysql_result($pages_query,0)==0) {
               echo "Seems like the donation log was empty!";
            } else {

            $page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
            $start = ($page - 1) * $per_page;
            ?>
                            <table>
                            <tr><th>Date</th><th>User</th><th>Email</th><th>Amount</th><th>Status</th></tr>
                            <?php
                                $server->selectDB('webdb');
                                $result = mysql_query("SELECT * FROM payments_log ORDER BY id DESC LIMIT ".$start.",".$per_page);
                                while($row = mysql_fetch_assoc($result)) { ?>
                                    <tr>
                                        <td><?php echo $row['datecreation']; ?></td>
                                        <td><?php echo $account->getAccName($row['userid']); ?></td>
                                        <td><?php echo $row['buyer_email']; ?></td>
                                        <td><?php echo $row['mc_gross']; ?></td>
                                        <td><?php echo $row['paymentstatus']; ?></td>
                                    </tr>
                                <?php }
                            ?>
            </table>
            <hr/>
            <?php
            if($pages>=1 && $page <= $pages)
            {
                if($page>1)
                {
                   $prev = $page-1;
                   echo '<a href="?p=donations&s=browse&page='.$prev.'" title="Previous">Previous</a> &nbsp;';
                }
                for($x=1; $x<=$pages; $x++)
                {
                    if($page == $x)
                       echo '<a href="?p=donations&s=browse&page='.$x.'" title="Page '.$x.'"><b>'.$x.'</b></a> ';
                    else
                       echo '<a href="?p=donations&s=browse&page='.$x.'" title="Page '.$x.'">'.$x.'</a> ';
                }

                if($page<$x - 1)
                {
                   $next = $page+1;
                   echo '&nbsp; <a href="?p=donations&s=browse&page='.$next.'" title="Next">Next</a> &nbsp; &nbsp;';
                }
            }
            }
            ?>
        </div>
    </div>
</div>
