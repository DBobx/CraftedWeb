<?php
/*
             _____           ____
            |   __|_____ _ _|    \ ___ _ _ ___
            |   __|     | | |  |  | -_| | |_ -|
            |_____|_|_|_|___|____/|___|\_/|___|
     Copyright (C) 2013 EmuDevs <http://www.emudevs.com/>
 */
?>
<?php require('includes/loader.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />
<title>CraftedWeb Admin Panel</title>
<!--<link rel="stylesheet" href="../aasp_includes/styles/wysiwyg.css" />-->
    <script type="text/javascript" src="../javascript/jquery.js"></script>
    <link rel="stylesheet" href="../aasp_includes/styles/admin/css/ui-lightness/jquery-ui-1.8.18.custom.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="../aasp_includes/styles/admin/css/jquery.jgrowl.css" type="text/css"/>
    <link rel="stylesheet" href="../aasp_includes/styles/admin/css/jquery.jqplot.css" type="text/css" />
    <link rel="stylesheet" href="../aasp_includes/styles/admin/css/icons.css" type="text/css" />
    <link rel="stylesheet" href="../aasp_includes/styles/admin/css/forms.css" type="text/css" />
    <link rel="stylesheet" href="../aasp_includes/styles/admin/css/tables.css" type="text/css" />
    <link rel="stylesheet" href="../aasp_includes/styles/admin/css/ui.css" type="text/css" />
    <link rel="stylesheet" href="../aasp_includes/styles/admin/css/style.css" type="text/css" />
    <link rel="stylesheet" href="../aasp_includes/styles/admin/css/responsiveness.css" type="text/css" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.23/jquery-ui.min.js"></script>
    <script type="text/javascript" src="../aasp_includes/styles/admin/js/jquery.jqplot.min.js"></script>
    <script type="text/javascript" src="../aasp_includes/styles/admin/js/plugins/jqplot.barRenderer.min.js"></script>
    <script type="text/javascript" src="../aasp_includes/styles/admin/js/plugins/jqplot.highlighter.min.js"></script>
    <script type="text/javascript" src="../aasp_includes/styles/admin/js/plugins/jqplot.cursor.min.js"></script>
    <script type="text/javascript" src="../aasp_includes/styles/admin/js/plugins/jqplot.pointLabels.min.js"></script>
    <script type="text/javascript" src="../aasp_includes/styles/admin/js/plugins/jqplot.pieRenderer.min.js"></script>
    <script type="text/javascript" src="../aasp_includes/styles/admin/js/plugins/jqplot.donutRenderer.min.js"></script>
    <script type="text/javascript" src="../aasp_includes/styles/admin/js/jquery.jgrowl.min.js"></script>
    <script type="text/javascript" src="../aasp_includes/styles/admin/js/jquery.knob.js"></script>
    <script type="text/javascript" src="../aasp_includes/styles/admin/js/jquery.wysihtml5.js"></script>
    <script type="text/javascript" src="../aasp_includes/styles/admin/js/jquery.sparkline.js"></script>
    <script type="text/javascript" src="../aasp_includes/styles/admin/js/custom.js"></script>
</head>

<body id="index" class="home wysihtml5-supported jqtransformdone">
<div id="loading-block"></div>
<div id="loading"></div>
<div id="container">
    <header id="header">
        <figure id="logo"><a href="?p=dashboard" class="logo"></a></figure>
        <section id="general-options">
            <a href="#" class="settings tipsy-header" title="Settings"></a>
            <a href="#" class="users tipsy-header" title="Users"></a>
        </section>
        <section id="userinfo">
            <?php if(isset($_SESSION['cw_admin'])) { ?> Welcome
                <b><?php echo $_SESSION['cw_admin']; ?> </b>
                <a href="?p=logout"><i>(Log out)</i></a> &nbsp; | &nbsp;
                <a href="<?php echo $GLOBALS['website_domain']; ?>" title="View your site">View your site</a>
            <?php } else {
                echo "Please log in.";
            }?>
            </div>
        </section>
    </header>
    <div class="clear"></div>
    <nav id="sidebar">
    <div class="sidebar-top"></div>
    <ul class="nav">
        <li><a href="#">Dashboard</a>
        <ul class="submenu">
            <li><a href="?p=dashboard">Dashboard</a></li>
            <li><a href="#">Updates</a></li>
        </ul>
        </li>
        <li><a href="#">Pages</a>
        <ul class="submenu">
            <li><a href="?p=pages">All Pages</a></li>
            <li><a href="?p=pages&s=new">Add New</a></li>
        </ul>
        </li>
        <li><a href="#">News</a>
        <ul class="submenu">
            <li><a href="?p=news">Post news</a></li>
            <li><a href="?p=news&s=manage">Manage news</a></li>
        </ul>
        </li>
        <li><a href="#">Shop</a>
        <ul class="submenu">
            <li><a href="?p=shop">Overview</a></li>
            <li><a href="?p=shop&s=add">Add items</a></li>
            <li><a href="?p=shop&s=manage">Manage items</a></li>
            <li><a href="?p=shop&s=tools">Tools</a></li>
        </ul>
        </li>
        <li><a href="#">Donations</a>
        <ul class="submenu">
            <li><a href="?p=donations">Overview</a></li>
            <li><a href="?p=donations&s=browse">Browse</a></li>
        </ul>
        </li>
        <li><a href="#">Logs</a>
        <ul class="submenu">
            <li><a href="?p=logs&s=voteshop">Vote shop</a></li>
            <li><a href="?p=logs&s=donateshop">Donation shop</a></li>
            <li><a href="?p=logs&s=admin">Admin Panel</a></li>
        </ul>
        </li>
        <li><a href="#">Interface</a>
        <ul class="submenu">
            <li><a href="?p=interface">Template</a></li>
            <li><a href="?p=interface&s=menu">Menu</a></li>
            <li><a href="?p=interface&s=slideshow">Slideshow</a></li>
            <li><a href="?p=interface&s=plugins">Plugins</a></li>
        </ul>
        </li>
        <li><a href="#">Users</a>
        <ul class="submenu">
            <li><a href="?p=users">Overview</a></li>
            <li><a href="?p=users&s=manage">Manage Users</a></li>
        </ul>
        </li>
        <li><a href="#">Realms</a>
        <ul class="submenu">
            <li><a href="?p=realms">New realm</a></li>
            <li><a href="?p=realms&s=manage">Manage realm(s)</a></li>
        </ul>
        </li>
        <li><a href="#">Services</a>
        <ul class="submenu">
            <li><a href="?p=services&s=voting">Voting Links</a></li>
            <li><a href="?p=services&s=charservice">Character Services</a></li>
        </ul>
        </li>
        <li><a href="#">Tools</a>
        <ul class="submenu">
            <li><a href="?p=tools&s=tickets">Tickets</a></li>
            <li><a href="?p=tools&s=accountaccess">Account Access</a></li>
        </ul>
        </li>
    </ul>

    <div class="blocks-separator"></div>
    </nav>

    <div class="clear"></div>

    <section id="playground">
    <?php if(!isset($_SESSION['cw_admin'])) { ?>
    <div class="full-width widget-set">
        <div class="box no-bg">
            <div id="login_wrapper">
                <div class="clear"></div>
                <div class="box">
                    <div class="inner">
                        <div class="contents">
                            <div class="one-half username-half">
                                <label>Username</label>
                                <div class="field-box"><span class="icon awesome user for-input"></span><input type="text" id="login_username" class="w-icon validate[required]"></div>
                                <div class="clear"></div>
                            </div>
                            <div class="one-half password-half">
                                <label>Password</label>
                                <div class="field-box"><span class="icon awesome lock for-input"></span><input type="password" id="login_password" class="w-icon validate[required]"></div>
                                <div class="clear"></div>
                            </div>
                            <div class="clear"></div>
                            <div class="line-separator"></div>
                            <div class="one-half">
                                <a href="#">Forgot your password?</a>
                            </div>
                            <div class="one-half right">
                                <input type="submit" value="Login" class="button blue tiny" onClick="login('admin')">
                            </div>
                            <div class="clear"></div>
                            <div class="clear"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
        }else{
    ?>

            <?php
            if(!isset($_GET['p']))
                $page = "dashboard";
            else
            {
                $page = $_GET['p']; }
            $pages = scandir('../aasp_includes/pages');
            unset($pages[0],$pages[1]);

            if (!file_exists('../aasp_includes/pages/'.$page.'.php'))
                include('../aasp_includes/pages/404.php');
            elseif(in_array($page.'.php',$pages))
                include('../aasp_includes/pages/'.$page.'.php');
            else
                include('../aasp_includes/pages/404.php');
            }
            ?>
    <div class="full-width right">
        <div class="box no-bg">
            <div class="line-separator"></div>
            <span class="copyright"><a href="http://emudevs.com/forumdisplay.php/147-CraftedWeb">CraftedWeb</a> by <a href="http://emudevs.com/">EmuDevs.com</a></span>
        </div>
    </div>
</section>
</div>
<?php include("../aasp_includes/javascript_loader.php");
if(!isset($_SESSION['cw_admin']))
{
    ?>
    <script type="text/javascript">
        document.onkeydown = function(event)
        {
            var key_press = String.fromCharCode(event.keyCode);
            var key_code = event.keyCode;
            if(key_code == 13)
            {
                login('admin')
            }
        }
    </script>
<?php } ?>
</body>
</html>