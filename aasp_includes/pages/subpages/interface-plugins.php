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
	  $server = new server; ?>
<!-- Breadcrumb -->
<div class="three-fourths breadcrumb">
    <span><a href="index.php">Home</a></span>
    <span class="middle"></span>
    <span><a href="?p=interface">Interface</a></span>
    <span class="middle"></span>
    <span><a href="?p=interface&s=plugins">Plugins</a></span>
    <span class="end"></span>
</div>
<!-- /Breadcrumb -->
<div class="two-thirds">
    <div class="box">
        <div class="inner">
            <div class="titlebar">Plugins</div>
<table class="data-table">
    <thead>
	<tr>
    	<th>Name</th>
        <th>Description</th>
        <th>Author</th>
        <th>Created</th>
        <th>Status</th>
    </tr>
    </thead>
    <tbody>
        <?php
            $bad = array('.','..','index.html');

            $folder = scandir('../plugins/');
            foreach($folder as $folderName)
            {
                if(!in_array($folderName,$bad))
                {
                    if(file_exists('../plugins/'.$folderName.'/info.php'))
                    {
                        include('../plugins/'.$folderName.'/info.php');
                        ?> <tr class="center" onclick="window.location='?p=interface&s=viewplugin&plugin=<?php echo $folderName; ?>'"> <?php
                            echo '<td><a href="?p=interface&s=viewplugin&plugin='.$folderName.'">'.$title.'</a></td>';
                            echo '<td>'.substr($desc,0,40).'</td>';
                            echo '<td>'.$author.'</td>';
                            echo '<td>'.$created.'</td>';
                            $server->selectDB('webdb');
                            $chk = mysql_query("SELECT COUNT(*) FROM disabled_plugins WHERE foldername='".mysql_real_escape_string($folderName)."'");
                            if(mysql_result($chk,0)>0)
                                echo '<td>Disabled</td>';
                            else
                                echo '<td>Enabled</td>';
                        echo '</tr>';
                    }
                }
            }

            if($count==0)
            {
                $_SESSION['loaded_plugins'] = NULL;
            }
            else
            {
                $_SESSION['loaded_plugins'] = $loaded_plugins;
            }
        ?>
    </tbody>
</table>