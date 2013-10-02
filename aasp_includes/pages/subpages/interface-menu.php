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
<!-- Breadcrumb -->
<div class="three-fourths breadcrumb">
    <span><a href="index.php">Home</a></span>
    <span class="middle"></span>
    <span><a href="?p=interface">Interface</a></span>
    <span class="middle"></span>
    <span><a href="?p=interface&s=menu">Menu</a></span>
    <span class="end"></span>
</div>
<!-- /Breadcrumb -->
<div class="two-thirds">
    <div class="box">
        <div class="inner">
            <div class="titlebar">News Manager</div>
            <table class="data-table">
                <thead>
                    <tr>
                        <th>Position</th>
                        <th>Title</th>
                        <th>Url</th>
                        <th>Shown When</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $x = 1;
                    $result = mysql_query("SELECT * FROM site_links ORDER BY position ASC");
                    while($row = mysql_fetch_assoc($result)) { ?>
                        <tr class="center">
                            <td><?php echo $x; ?></td>
                            <td><?php echo $row['title']; ?></td>
                            <td><?php echo $row['url']; ?></td>
                            <td><?php
                                    if($row['shownWhen']=='logged') {
                                        echo "Logged in";
                                    } elseif($row['shownWhen']=='notlogged') {
                                        echo "Not logged in";
                                    }  else {
                                        echo ucfirst($row['shownWhen']);
                                    }
                               ?>
                            </td>
                            <td>
                                <a href="#" onclick="editMenu(<?php echo $row['position']; ?>)" class="button green tiny"><span class="icon awesome pencil"></span> Edit</a>
                                &nbsp; <a href="#" onclick="deleteLink(<?php echo $row['position']; ?>)" class="button red tiny"><span class="icon entypo minus"></span> Delete</a>
                            </td>
                        </tr>
                    <?php $x++; }
                ?>
                </tbody>
            </table>
            <div class="clear">&nbsp;</div>
            <div class="bar-big center">
                <a href="#" onclick="addLink()" class="button green tiny" style="margin-top: 12px;"><span class="icon entypo plus"></span>Add Linkk</a>
            </div>
        </div>
    </div>
</div>