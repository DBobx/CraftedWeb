<?php
/*
             _____           ____
            |   __|_____ _ _|    \ ___ _ _ ___
            |   __|     | | |  |  | -_| | |_ -|
            |_____|_|_|_|___|____/|___|\_/|___|
     Copyright (C) 2013 EmuDevs <http://www.emudevs.com/>
 */
?>
<p id="steps"><b>Introduction</b> &raquo; MySQL Info &raquo; Configure &raquo; <b>Database</b> &raquo; Realm Info &raquo; Finished<p>
<hr/>
<p>
	After scanning your updates folder, we found the following database updates: 
    <ul>
    	<?php
			$files = scandir('sql/updates/');
			foreach($files as $value) {
				if(substr($value,-3,3)=='sql')
				{
					echo '<a href="#">'.$value.'</a><br/>';	
					$found = true;
				}
			}
		?>
    </ul>
    <?php
	if(!isset($found))
				echo '<code>No updates was found in your /updates folder. <a href="?st=5">Click here to continue</a></code>';
	?>
    <i>* Tip: Click on them to get additional information about them.</i>
</p>
<p>
Click the button below to apply all of these updates. If you do not wish to have these<br />
updates, just click <a href="?st=5">here</a>. You can install them anytime you want manually <br />
by exporting them into your database with any database software of your choise. (HeidiSQL, SQLyog, etc)</p>
<p>
	<br/>
	<input type="submit" value="Apply Updates" onclick="step4()">
</p>