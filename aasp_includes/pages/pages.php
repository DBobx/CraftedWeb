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

$page->validatePageAccess('Pages');

if($page->validateSubPage() == TRUE) {
    $page->outputSubPage();
} else {
    ?>
<!-- Breadcrumb -->
<div class="three-fourths breadcrumb">
    <span><a href="index.php">Home</a></span>
    <span class="middle"></span>
    <span><a href="?p=pages">Pages</a></span>
    <span class="end"></span>
</div>
<!-- /Breadcrumb -->
<div class="two-thirds">
    <div class="box">
        <div class="inner">
            <div class="titlebar">Pages</div>
            <?php if(!isset($_GET['action'])) { ?>
                <table class="data-table">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>File name</th>
                        <th>Select</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                        $result = mysql_query("SELECT * FROM custom_pages ORDER BY id ASC");
                        while($row = mysql_fetch_assoc($result)) {
                            $check = mysql_query("SELECT COUNT(filename) FROM disabled_pages WHERE filename='".$row['filename']."'");
                            if(mysql_result($check,0)==0)
                                $disabled = false;
                            else
                                $disabled = true;
                    ?>
                    <tr <?php if($disabled==true) { echo "style='color: #999;'"; }?>>
                        <td class="center"><?php echo $row['name']; ?></td>
                        <td class="center"><?php echo $row['filename']; ?>(Database)</td>
                        <td><select id="action-<?php echo $row['filename']; ?>">
                            <?php if($disabled==true) {  ?>
                            <option value="1">Enable</option>
                            <?php } else { ?>
                            <option value="2">Disable</option>
                            <?php } ?>
                        </select></td>&nbsp;&nbsp;&nbsp;
                        <td class="center"><a style="margin-top: 2px;" onclick="savePage('<?php echo $row['filename']; ?>')" href="#" class="button blue tiny"><span class="icon awesome arrow-right"></span></a>
                        <a href="?p=pages&action=edit&filename='<?php echo $row['filename']; ?>'" class="button green tiny"><span class="icon awesome pencil"></span> Edit</a>
                        <a onclick="deletePage('<?php echo $row['filename']; ?>')" href="#" class="button red tiny"><span class="icon entypo minus"></span> Delete</a></td>
                    </tr>
                    <?php }
                        foreach ($GLOBALS['core_pages'] as $k => $v)
                        {
                            $filename = substr($v, 0, -4);
                            unset ($check);
                            $check = mysql_query("SELECT COUNT(filename) FROM disabled_pages WHERE filename='".$filename."'");
                            if(mysql_result($check,0)==0)
                                $disabled = false;
                            else
                                $disabled = true;
                            ?>

                            <tr <?php if($disabled==true) { echo "style='color: #999;'"; }?>>
                                <td class="center"><?php echo $k; ?></td>
                                <td class="center"><?php echo $v; ?></td>
                                <?php if($disabled==true) { ?>
                                <td>
                                    <select id="action-<?php echo $row['filename']; ?>">
                                        <option value="1">Enable</option>
                                    </select></td><td class="center">
                                    &nbsp;<a style="margin-top: 2px;" onclick="savePage('<?php echo $row['filename']; ?>')" href="#" class="button blue tiny"><span class="icon awesome arrow-right"></span></a></td>
                                    <?php } else { ?>
                                <td>
                                    <select id="action-<?php echo $row['filename']; ?>">
                                        <option value="2">Disable</option>
                                    </select></td><td class="center">
                                    &nbsp;<a style="margin-top: 2px;" onclick="savePage('<?php echo $row['filename']; ?>')" href="#" class="button blue tiny"><span class="icon awesome arrow-right"></span></a></td>
                                <?php } ?>
                            </tr>
                    <?php } ?>
                    </tbody>
                </table>

                <?php } elseif($_GET['action']=='new') { ?>
                <?php } elseif($_GET['action']=='edit') {

                if(isset($_POST['editpage'])) {
                    $name = mysql_real_escape_string($_POST['editpage_name']);
                    $filename = trim(strtolower(mysql_real_escape_string($_POST['editpage_filename'])));
                    $content = mysql_real_escape_string(htmlentities($_POST['editpage_content']));

                    if(empty($name) || empty($filename) || empty($content)) {
                        echo "<h3>Please enter <u>all</u> fields.</h3>";
                    } else {
                        mysql_query("UPDATE custom_pages SET name='".$name."',filename='".$filename."',
                        content='".$content."' WHERE filename='".mysql_real_escape_string($_GET['filename'])."'");

                        echo "<h3>The page was successfully updated.</h3>
                        <a href='".$GLOBALS['website_domain']."?p=".$filename."' target='_blank'>View Page</a>";
                    }
                }

                    $result = mysql_query("SELECT * FROM custom_pages WHERE filename='".mysql_real_escape_string($_GET['filename'])."'");
                    $row = mysql_fetch_assoc($result);
                ?>

                <h4>Editing <?php echo $_GET['filename']; ?>.php</h4>
                    <div class="row">
                        <label>Name</label> <div class="field-box">
                            <input type="text" name="editpage_name" value="<?php echo $row['name']; ?>">
                        </div>
                        <div class="clear"></div>
                    </div>

                    <div class="row">
                        <label>Filename</label> <div class="field-box">
                            <input type="text" name="editpage_filename" value="<?php echo $row['filename']; ?>">
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
                                <textarea id="textarea" name="editpage_content"><?php echo $row['content']; ?></textarea>
                            </div>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="bar-big">
                        <input type="submit" value="Save" name="editpage">
                        <input type="reset" value="Reset">
                    </div>
            <?php } } ?>
        </div>
    </div>
</div>
