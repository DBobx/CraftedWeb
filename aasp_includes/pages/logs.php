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
	
	$page->validatePageAccess('Logs');
	
    if($page->validateSubPage() == TRUE) {
		$page->outputSubPage();
	} else {
		?>
        <div class="one-third">
            <div class="box">
                <div class="inner">
                    <div class="titlebar">Logs</div><center>
                    <a href="?p=logs&s=voteshop" class="button blue medium">Vote Shop logs</a>
                    <a href="?p=logs&s=donateshop" class="button blue medium">Donation Shop logs</a>
                    </center>
                </div>
            </div>
        </div>
		<?php
	 }
?>