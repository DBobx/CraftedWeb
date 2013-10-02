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
    <span><a href="?p=pages">Pages</a></span>
    <span class="middle"></span>
    <span><a href="?p=pages&s=new">New Page</a></span>
    <span class="end"></span>
</div>
<!-- /Breadcrumb -->
<div class="three-fifths">
    <div class="box">
        <div class="inner">
            <?php $page = new page;
            if(isset($_POST['newpage'])) {

                $name = mysql_real_escape_string($_POST['newpage_name']);
                $filename = trim(strtolower(mysql_real_escape_string($_POST['newpage_filename'])));
                $content = mysql_real_escape_string(htmlentities($_POST['newpage_content']));

                if(empty($name) || empty($filename) || empty($content)) {
                    echo "<center><h3>Please enter <u>all</u> fields.</h3></center>";
                } else {
                    mysql_query("INSERT INTO custom_pages VALUES ('','".$name."','".$filename."','".$content."',
                    '".date("Y-m-d H:i:s")."')");

                                echo "<h3>The page was successfully created.</h3>
                    <a href='".$GLOBALS['website_domain']."?p=".$filename."' target='_blank'>View Page</a><br/><br/>";
                }
            } ?>
            <div class="titlebar">Create Custom Page</div>
            <form action="?p=pages&s=new" method="post" class="center">
                <div class="row">
                    <label>Name</label> <div class="field-box">
                    <input type="text" name="newpage_name">
                    </div>
                    <div class="clear"></div>
                </div>

                <div class="row">
                    <label>Filename</label> <div class="field-box">
                    <input type="text" name="newpage_filename" placeholder="Eg: ?p=connect">
                    </div>
                    <div class="clear"></div>
                </div><BR />
                <div class="clear"></div>
                <div class="clear"></div>
                <div class="row">
                    <label>Content</label> <div class="field-box">
                        <div id="wysihtml5-toolbar" class="wysihtml5-toolbar" style="display: none;">
                            <a data-wysihtml5-command="bold" title="CTRL+B"><span class="icon awesome bold"></span></a>
                            <a data-wysihtml5-command="italic" title="CTRL+I"><span class="icon awesome italic"></span></a>
                            <a data-wysihtml5-command="createLink"><span class="icon awesome link"></span></a>
                            <a data-wysihtml5-command="insertImage"><span class="icon awesome picture"></span></a> |
                            <a data-wysihtml5-command="formatBlock" data-wysihtml5-command-value="h1">H1</a>
                            <a data-wysihtml5-command="formatBlock" data-wysihtml5-command-value="h2">H2</a>
                            <a data-wysihtml5-command="formatBlock" data-wysihtml5-command-value="h3">H3</a>
                            <a data-wysihtml5-command="formatBlock" data-wysihtml5-command-value="h4">H4</a>
                            <a data-wysihtml5-command="formatBlock" data-wysihtml5-command-value="h5">H5</a>
                            <a data-wysihtml5-command="formatBlock" data-wysihtml5-command-value="h6">H6</a> |
                            <a data-wysihtml5-command="insertUnorderedList"><span class="icon awesome list-ul"></span></a>
                            <a data-wysihtml5-command="insertOrderedList"><span class="icon awesome list-ol"></span></a> |
                            <a data-wysihtml5-command="foreColor" data-wysihtml5-command-value="red">red</a>
                            <a data-wysihtml5-command="foreColor" data-wysihtml5-command-value="green">green</a>
                            <a data-wysihtml5-command="foreColor" data-wysihtml5-command-value="blue">blue</a> |
                            <a data-wysihtml5-command="undo"><span class="icon awesome undo"></span></a>
                            <a data-wysihtml5-command="redo"><span class="icon awesome repeat"></span></a> |
                            <a data-wysihtml5-command="insertSpeech"><span class="icon awesome comment"></span></a> |
                            <a data-wysihtml5-action="change_view"><span class="icon awesome eye-open"></span></a>
                            <div data-wysihtml5-dialog="createLink" style="display: none;">
                                <label>
                                    Link:
                                    <input data-wysihtml5-dialog-field="href" value="http://">
                                </label>
                                <a data-wysihtml5-dialog-action="save">OK</a>&nbsp;<a data-wysihtml5-dialog-action="cancel">Cancel</a>
                            </div>

                            <div data-wysihtml5-dialog="insertImage" style="display: none;">
                                <label>
                                    Image:
                                    <input data-wysihtml5-dialog-field="src" value="http://">
                                </label>
                                <label>
                                    Align:
                                    <select data-wysihtml5-dialog-field="className">
                                        <option value="">default</option>
                                        <option value="wysiwyg-float-left">left</option>
                                        <option value="wysiwyg-float-right">right</option>
                                    </select>
                                </label>
                                <a data-wysihtml5-dialog-action="save">OK</a>&nbsp;<a data-wysihtml5-dialog-action="cancel">Cancel</a>
                            </div>
                        </div>
                        <div class="wysihtml5-contents">
                            <textarea id="textarea" name="newpage_content"><?php if(isset($_POST['newpage_content'])) { echo $_POST['newpage_content']; } ?></textarea>
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="bar-big">
                    <input type="submit" value="Create" name="newpage">
                    <input type="reset" value="Reset">
                </div>
            </form>
        </div>
    </div>
</div>