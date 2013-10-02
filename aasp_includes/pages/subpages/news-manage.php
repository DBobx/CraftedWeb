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
    <span><a href="?p=news">News</a></span>
    <span class="middle"></span>
    <span><a href="?p=news&s=manage">Manage News</a></span>
    <span class="end"></span>
</div>
<!-- /Breadcrumb -->
<?php
$server = new server;
$server->selectDB('webdb');
$result = mysql_query("SELECT * FROM news ORDER BY id DESC");
if(mysql_num_rows($result)==0)
{ 
    echo "<span class='blue_text'>No news has been posted yet!</span>";
}
else { 
?>
<div class="two-thirds">
    <div class="box">
        <div class="inner">
            <div class="titlebar">News Manager</div>
            <table class="data-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Content</th>
                        <th>Comments</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while($row=mysql_fetch_assoc($result)) {
                        $comments = mysql_query("SELECT COUNT(id) FROM news_comments WHERE newsid='".$row['id']."'");
                         echo '<tr class="center">
                                   <td>'.$row['id'].'</td>
                                   <td>'.$row['title'].'</td>
                                   <td>'.strip_tags(substr($row['body'],0,25)).'...</td>
                                   <td>'.mysql_result($comments,0).'</td>
                                   <td> <a onClick="editNews('.$row['id'].')" href="#" class="button green tiny"><span class="icon entypo plus"></span> Edit</a>
                                   <a onClick="deleteNews('.$row['id'].')" href="#" class="button red tiny"><span class="icon entypo minus"></span> Delete</a></td>
                         </tr>';
                    }?>
                </tbody>
            </table>
        </div>
    </div>
</div><?php
}?>