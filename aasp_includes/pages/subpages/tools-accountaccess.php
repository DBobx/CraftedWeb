<?php
/*
             _____           ____
            |   __|_____ _ _|    \ ___ _ _ ___
            |   __|     | | |  |  | -_| | |_ -|
            |_____|_|_|_|___|____/|___|\_/|___|
     Copyright (C) 2013 EmuDevs <http://www.emudevs.com/>
 */
$server = new server;
$account = new account;
$page = new page;

$page->validatePageAccess('Tools->Account Access');

?>
<!-- Breadcrumb -->
<div class="three-fourths breadcrumb">
    <span><a href="index.php">Home</a></span>
    <span class="middle"></span>
    <span><a href="#">Tools</a></span>
    <span class="middle"></span>
    <span><a href="?p=tools&s=accountaccess">Account Tools</a></span>
    <span class="end"></span>
</div>
<!-- /Breadcrumb -->
<div class="three-fourths">
    <div class="box">
        <div class="inner">
            <div class="titlebar">Account Access</div>
            <p style="text-align: center;">All GM accounts are listed below.</p>
            <br/>&nbsp;
            <table class="data-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Rank</th>
                        <th>Realms</th>
                        <th>Status</th>
                        <th>Last Login</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                <tbody>
                <?php
                $server->selectDB('logondb');
                $result = mysql_query("SELECT * FROM account_access");
                if(mysql_num_rows($result)==0)
                    echo "<b>No GM accounts found!</b>";
                else
                {
                    while($row = mysql_fetch_assoc($result))
                    {
                        ?>
                        <tr class="center">
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $account->getAccName($row['id']); ?></td>
                            <td><?php echo $row['gmlevel']; ?></td>
                            <td>
                            <?php
                                if($row['RealmID']=='-1')
                                    echo 'All';
                                else
                                {
                                    $getRealm = mysql_query("SELECT name FROM realmlist WHERE id='".$row['RealmID']."'");
                                    if(mysql_num_rows($getRealm)==0)
                                        echo 'Unknown';
                                    $rows = mysql_fetch_assoc($getRealm);
                                    echo $rows['name'];
                                }
                            ?>
                            </td>
                            <td>
                            <?php
                                $getData = mysql_query("SELECT last_login,online FROM account WHERE id='".$row['id']."'");
                                $rows = mysql_fetch_assoc($getData);
                                if($rows['online']==0)
                                    echo '<font color="red">Offline</font>';
                                else
                                    echo '<font color="green">Online</font>';
                            ?>
                            </td>
                            <td>
                            <?php
                                echo $rows['last_login'];
                            ?>
                            </td>
                            <td>
                                <a href="#" onclick="editAccA(<?php echo $row['id']; ?>,<?php echo $row['gmlevel']; ?>,<?php echo $row['RealmID']; ?>)">Edit</a>
                                &nbsp;
                                <a href="#" onclick="removeAccA(<?php echo $row['id']; ?>)">Remove</a>
                            </td>
                        </tr>
                        <?php
                    }

                }
                ?>
                </tbody>
            </table>
            <div class="bar-big center">
                <a href="#" style="margin-top: 12px;" class="button green tiny" onclick="addAccA()"><span class="entypo icon user"></span> Add account</a>
            </div>
        </div>
    </div>
</div>