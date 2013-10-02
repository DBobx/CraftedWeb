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
    <span><a href="?p=shop">Shop</a></span>
    <span class="middle"></span>
    <span><a href="?p=shop&s=tools">Shop Tools</a></span>
    <span class="end"></span>
</div>
<!-- /Breadcrumb -->
<div class="one-third">
    <div class="box">
        <div class="inner">
            <div class="titlebar">Shop Tools</div>
            <div class="row">
                <center><h3>This will clear all items from the vote shop</h3></center>
                <div class="clear"></div>
                <div class="bar-big"><input type="submit" value="Clear Vote shop" onclick="clearShop('vote')"/></div>
                <div class="clear"></div>
            </div>
            <div class="line-separator"></div>
            <div class="row">
                <center><h3>This will clear all items from the donation shop</h3></center>
                <div class="clear"></div>
                <div class="bar-big"><input type="submit" value="Clear Donation shop" onclick="clearShop('donate')"/></div>
                <div class="clear"></div>
            </div>
        </div>
    </div>
</div>