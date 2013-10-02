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
	$server = new server;
	$account = new account;
?>
<!-- Breadcrumb -->
<div class="three-fourths breadcrumb">
    <span><a href="index.php">Home</a></span>
    <span class="middle"></span>
    <span><a href="#">Services</a></span>
    <span class="middle"></span>
    <span><a href="?p=services&s=voting">Voting Links</a></span>
    <span class="end"></span>
</div>
<!-- /Breadcrumb -->
<div class="three-fourths">
    <div class="box">
        <div class="inner">
            <div class="titlebar">Voting Links</div>
            <table class="data-table">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Points</th>
                        <th>Image</th>
                        <th>Url</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $server->selectDB('webdb');
                    $result = mysql_query("SELECT * FROM votingsites ORDER BY id ASC");
                    while($row = mysql_fetch_assoc($result)) { ?>
                         <tr class="center">
                              <td><?php echo $row['title']; ?></td>
                              <td><?php echo $row['points']; ?></td>
                              <td><img src="<?php echo $row['image']; ?>"></td>
                              <td><?php echo $row['url']; ?></td>
                              <td><a href="#" class="button green tiny" onclick="editVoteLink('<?php echo $row['id']; ?>','<?php echo $row['title']; ?>','<?php echo $row['points']; ?>',
                              '<?php echo $row['image']; ?>','<?php echo $row['url']; ?>')"><span class="icon entypo write"></span> Edit</a>
                              <a href="#" class="button red tiny" onclick="removeVoteLink('<?php echo $row['id']; ?>')"><span class="icon entypo minus"></span> Remove</a>
                              </td>
                          </tr>
                      <?php
                      }
                    ?>
                </tbody>
            </table>
            <div class="bar-big center">
                <a href="#" style="margin-top: 12px;" class="button green tiny" onclick="addVoteLink()"><span class="icon entypo plus"></span> Add Site</a>
            </div>
        </div>
    </div>
</div>