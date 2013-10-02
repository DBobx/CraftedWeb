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
	
	$filename = $_GET['plugin']; 
	include('../plugins/'.$filename.'/info.php');			
?>
<div class="one-half">
    <div class="box">
    <div class="inner">
    <div class="titlebar"><?php echo $title; ?></div>
        <div class="row">
            <label>Description:</label> <div class="field-box" style="margin-top: 8px;">
                <?php echo $desc; ?>
            </div>
            <div class="clear">&nbsp;</div>
        </div>
        <div class="row">
            <label>Author:</label> <div class="field-box" style="margin-top: 8px;">
                <?php echo $author; ?> - <?php echo $created; ?>
            </div>
            <div class="clear">&nbsp;</div>
        </div>
        <div class="row">
            <label>Files:</label> <div class="field-box" style="margin-top: 8px;">
                <?php
                $bad = array('.','..');
                //Classes
                $folder = scandir('../plugins/'.$filename.'/classes/');
                foreach($folder as $file)
                {
                    if(!in_array($file,$bad))
                    {
                        echo $file.' (Class)<br/>';
                    }
                }
                //Modules
                $folder = scandir('../plugins/'.$filename.'/modules/');
                foreach($folder as $file)
                {
                    if(!in_array($file,$bad))
                    {
                        echo $file.' (Module)<br/>';
                    }
                }

                //Pages
                $folder = scandir('../plugins/'.$filename.'/pages/');
                foreach($folder as $file)
                {
                    if(!in_array($file,$bad))
                    {
                        echo $file.' (Page)<br/>';
                    }
                }

                //Styles
                $folder = scandir('../plugins/'.$filename.'/styles/');
                foreach($folder as $file)
                {
                    if(!in_array($file,$bad))
                    {
                        echo $file.' (Stylesheet)<br/>';
                    }
                }

                //Javascript
                $folder = scandir('../plugins/'.$filename.'/javascript/');
                foreach($folder as $file)
                {
                    if(!in_array($file,$bad))
                    {
                        echo $file.' (Javascript)<br/>';
                    }
                }
                    ?>
                </div>
            <div class="clear">&nbsp;</div>
            </div>
            <div class="bar-big">
                <?php
                $server->selectDB('webdb');
                $chk = mysql_query("SELECT COUNT(*) FROM disabled_plugins WHERE foldername='".mysql_real_escape_string($filename)."'");
                if(mysql_result($chk,0)>0)
                    echo '<input type="submit" value="Enable Plugin" onclick="enablePlugin(\''.$filename.'\')">';
                else
                    echo '<input type="submit" value="Disable Plugin" onclick="disablePlugin(\''.$filename.'\')">';
                ?>
            </div>
        </div>
    </div>
</div>