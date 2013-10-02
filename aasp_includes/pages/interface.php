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
	$server->selectDB('webdb'); 
 	$page = new page;
	
	$page->validatePageAccess('Interface');
	
    if($page->validateSubPage() == TRUE) {
		$page->outputSubPage();
	} else {
?>
<!-- Breadcrumb -->
<div class="three-fourths breadcrumb">
    <span><a href="index.php">Home</a></span>
    <span class="middle"></span>
    <span><a href="?p=interface">Interface</a></span>
    <span class="end"></span>
</div>
<!-- /Breadcrumb -->
<div class="full-width">
    <div class="box">
        <div class="inner">
            <div class="titlebar">Template</div>
 <center>Here you can choose which template that should be active on your website. This is also where you install new themes for your website.</center>
        </div>
    </div>
</div>

<div class="one-third">
    <div class="box">
        <div class="inner">
        <div class="titlebar">Choose Template</div>
            <div class="row">
                <div class="field-box">
                    <select id="choose_template">
                        <?php
                        $result = mysql_query("SELECT * FROM template ORDER BY id ASC");
                        while($row = mysql_fetch_assoc($result)) {
                            if($row['applied']==1)
                                echo "<option selected='selected' value='".$row['id']."'>[Active] ";
                            else
                                echo "<option value='".$row['id']."'>";

                            echo $row['name']."</option>";
                        }
                        ?>
                    </select>
                    <a href="#" class="button blue medium" onclick="setTemplate()">Save</a>
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </div>
</div>

<div class="one-third">
    <div class="box">
        <div class="inner">
            <div class="titlebar">Install Template</div>
            <div class="row">
                <div class="field-box">
                    <a href="#" onclick="templateInstallGuide()">How to install new templates on your website</a><br/><br/><br/>
                    Path to the template<br/>
                    <input type="text" id="installtemplate_path"/><br/>
                    Choose a name<br/>
                    <input type="text" id="installtemplate_name"/><br/>
                    <a href="#" class="button blue medium" onclick="installTemplate()">Install</a>
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </div>
</div>

<div class="one-third">
    <div class="box">
        <div class="inner">
            <div class="titlebar">Uninstall Template</div>
            <div class="row">
                <div class="field-box">
                <select id="uninstall_template_id">
                        <?php
                        $result = mysql_query("SELECT * FROM template ORDER BY id ASC");
                        while($row = mysql_fetch_assoc($result)) {
                            if($row['applied']==1)
                                echo "<option selected='selected' value='".$row['id']."'>[Active] ";
                            else
                                echo "<option value='".$row['id']."'>";

                            echo $row['name']."</option>";
                        }
                        ?>
                </select>
                    <a href="#" class="button blue medium" onclick="uninstallTemplate()">Uninstall</a>
         <?php } ?>
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </div>
</div>