<?php
/*
             _____           ____
            |   __|_____ _ _|    \ ___ _ _ ___
            |   __|     | | |  |  | -_| | |_ -|
            |_____|_|_|_|___|____/|___|\_/|___|
     Copyright (C) 2013 EmuDevs <http://www.emudevs.com/>
 */
?>
<?php $page = new page; $server = new server;?>
<!-- Breadcrumb -->
<div class="three-fourths breadcrumb">
    <span><a href="index.php">Home</a></span>
    <span class="middle"></span>
    <span><a href="?p=realms">Realms</a></span>
    <span class="middle"></span>
    <span><a href="?p=realms">Manage Realms</a></span>
    <span class="end"></span>
</div>
<!-- /Breadcrumb -->
<div class="full-width">
    <div class="box">
        <div class="inner">
        <div class="titlebar">Manage Realm</div>
            <table class="data-table">
                <thead>
                    <tr><th>ID</th>
                        <th>Name</th>
                        <th>Host</th>
                        <th>Port</th>
                        <th>Character DB</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                        $server->selectDB('webdb');
                        $result = mysql_query("SELECT * FROM realms ORDER BY id DESC");
                        while($row = mysql_fetch_assoc($result)) { ?>
                              <tr class="center">
                                  <td><?php echo $row['id']; ?></td>
                                  <td><?php echo $row['name']; ?></td>
                                  <td><?php echo $row['host']; ?></td>
                                  <td><?php echo $row['port']; ?></td>
                                  <td><?php echo $row['char_db']; ?></td>
                                  <td><a href="#" onclick="edit_realm(<?php echo $row['id']; ?>,'<?php echo $row['name']; ?>','<?php echo $row['host']; ?>',
                                  '<?php echo $row['port']; ?>','<?php echo $row['char_db']; ?>')" class="button green tiny"><span class="icon entypo write"></span> Edit</a> &nbsp;
                                  <a href="#" onclick="delete_realm(<?php echo $row['id']; ?>,'<?php echo $row['name']; ?>')" class="button red tiny">
                                  <span class="icon entypo minus"></span> Delete</a><br/>
                                  <a href="#" onclick="edit_console(<?php echo $row['id']; ?>,'<?php echo $row['sendType']; ?>','<?php echo $row['rank_user']; ?>',
                                  '<?php echo $row['rank_pass']; ?>')" class="button blue tiny"><span class="icon entypo write"></span> Edit Console settings</a>
                                  </td>
                              </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
    </div>
</div>