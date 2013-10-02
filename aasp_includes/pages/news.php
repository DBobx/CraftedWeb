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

	 $page->validatePageAccess('News');

     if($page->validateSubPage() == TRUE) {
		 $page->outputSubPage();
	 } else {
?>
 <!-- Breadcrumb -->
 <div class="three-fourths breadcrumb">
     <span><a href="index.php">Home</a></span>
     <span class="middle"></span>
     <span><a href="?p=news">Post News</a></span>
     <span class="end"></span>
 </div>
 <!-- /Breadcrumb -->
         <div id="news_status"></div>
<div class="three-fifths">
    <div class="box">
        <div class="inner">

            <div class="titlebar">Post News</div>
                <div class="row">
                    <label>Title</label> <div class="field-box">
                        <input type="text" name="news_title">
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="row">
                    <label>Author</label> <div class="field-box">
                        <input type="text" name="news_author">
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="row">
                    <label>Image URL</label> <div class="field-box">
                        <input type="text" name="news_image">
                    </div>
                    <div class="clear"></div>
                </div>
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
                        <textarea id="textarea" name="news_content"></textarea>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
            <div class="bar-big">
                <input type="submit" value="Post" onclick="postNews()"/>
                <input type="submit" value="Preview" onclick="previewNews()" disabled="disabled"/>
            </div>
        </div>
    </div>
</div>
<?php } ?>
