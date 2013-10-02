<?php
/*
             _____           ____
            |   __|_____ _ _|    \ ___ _ _ ___
            |   __|     | | |  |  | -_| | |_ -|
            |_____|_|_|_|___|____/|___|\_/|___|
     Copyright (C) 2013 EmuDevs <http://www.emudevs.com/>
 */
?>
<?php $page = new page; $server = new server; ?>
<!-- Breadcrumb -->
<div class="three-fourths breadcrumb">
    <span><a href="index.php">Home</a></span>
    <span class="middle"></span>
    <span><a href="?p=interface">Interface</a></span>
    <span class="middle"></span>
    <span><a href="?p=interface&s=slideshow">SlideShow</a></span>
    <span class="end"></span>
</div>
<!-- /Breadcrumb -->
<div class="two-thirds">
    <div class="box">
        <div class="inner">
            <div class="titlebar">SlideShow Manager</div>
            <?php
            if($GLOBALS['enableSlideShow']==true)
            $status = 'Enabled';
            else
            $status = 'Disabled';

            $server->selectDB('webdb');
            $count = mysql_query("SELECT COUNT(*) FROM slider_images");
            ?>
            The slideshow is <b><?php echo $status; ?></b>. You have <b><?php echo round(mysql_result($count,0)); ?></b> images in the slideshow.
            <hr/>
            <?php
            if(isset($_POST['addSlideImage']))
            {
                $page = new page;
                $page->addSlideImage($_FILES['slideImage_upload'],$_POST['slideImage_path'],$_POST['slideImage_url']);
            }
            ?>
            <div class="hidden_content" id="addSlideImage">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <label>Upload an image:</label> <div class="field-box">
                        <input type="file" name="slideImage_upload">
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="row">
                        <label>or enter image URL: (This will override your uploaded image)</label> <div class="field-box">
                        <input type="text" name="slideImage_path">
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="row">
                        <label>Where should the image redirect? (Leave empty if no redirect)</label> <div class="field-box">
                        <input type="text" name="slideImage_url"><br/>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="bar-big center">
                        <a href="#" onclick="addSlideImage()" class="button green tiny" style="margin-top: 12px;"><span class="icon entypo plus"></span> Add</a>
                    </div>
                </form>
            </div>
            <?php
            $server->selectDB('webdb');
            $result = mysql_query("SELECT * FROM slider_images ORDER BY position ASC");
            if(mysql_num_rows($result)==0)
            {
                echo "You don't have any images in the slideshow!";
            }
            else
            {
                echo '<table>';
                $c = 1;
                while($row = mysql_fetch_assoc($result))
                {
                    echo '<tr class="center">';
                    echo '<td><h2>&nbsp; '.$c.' &nbsp;</h2><br/>
                    <a href="#" onclick="removeSlideImage('.$row['position'].'" class="button red tiny" style="margin-top: 12px;"><span class="icon entypo minus"></span> Delete</a></td>';
                    echo '<td><img src="../'.$row['path'].'" alt="'.$c.'" class="slide_image" maxheight="200"/></td>';
                    echo '</tr>';
                    $c++;
                }
                  echo '</table>';
            }
            ?>
        </div>
    </div>
</div>

