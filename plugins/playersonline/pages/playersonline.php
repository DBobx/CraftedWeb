<?php
/*
              _____           ____
            |   __|_____ _ _|    \ ___ _ _ ___
            |   __|     | | |  |  | -_| | |_ -|
            |_____|_|_|_|___|____/|___|\_/|___|
     Copyright (C) 2013 EmuDevs <http://www.emudevs.com/>
 */
 
	if($GLOBALS['playersOnline']['enablePage']!=true)
	{
		header("Location: ?p=account");
        exit;
	}
	connect::selectDB('webdb');
	$result = mysql_query("SELECT id,name FROM realms WHERE id='".$GLOBALS['playersOnline']['realm_id']."'");
	$row = mysql_fetch_assoc($result);
	$rid = $row['id'];
	$realmname = $row['name'];
	
	connect::connectToRealmDB($rid);
	
	$count = mysql_query("SELECT COUNT(*) FROM characters WHERE name!='' AND online=1");
?>
<div class="box_two_title">Online Players - <?php echo $realmname; ?></div>
<?php
if(mysql_result($count,0)==0)
	echo '<b>No players are online right now!</b>';
else
{		   
		   ?>
<table width="100%">
        <tr>
            <th>Name</th>
            <th>Race</th>
            <th>Class</th>
            <th>Guild</th>
            <th>Hk's</th>
            <th>Level</th>
        </tr>
        <?php
		if($GLOBALS['playersOnline']['pageResults']>0)
		{
			$count = mysql_result($count,0);
			if($count > 10)
				$count = $count - 10;
			
			$rand = rand(1,$count);
			
			$result = mysql_query("SELECT guid, name, totalKills, level, race, class, gender, account FROM characters WHERE name!='' 
			AND online=1 LIMIT ".$rand.",".$GLOBALS['playersOnline']['pageResults']."");
		}
		else
		{
			$result = mysql_query("SELECT guid, name, totalKills, level, race, class, gender, account FROM characters WHERE name!='' 
			AND online=1");
		}
		while($row = mysql_fetch_assoc($result)) 
		{
			connect::connectToRealmDB($rid);
			$getGuild = mysql_query("SELECT guildid FROM guild_member WHERE guid='".$row['guid']."'");
			if(mysql_num_rows($getGuild)==0)
			   $guild = "None";
			else
			{
				$g = mysql_fetch_assoc($getGuild);
				$getGName = mysql_query("SELECT name FROM guild WHERE guildid='".$g['guildid']."'");
				$x = mysql_fetch_assoc($getGName);
				$guild = '&lt; '.$x['name'].' &gt;';
			}
			
			if($GLOBALS['playersOnline']['display_GMS']==false)
			{
				//Check if GM.
				connect::selectDB('logondb');
				$checkGM = mysql_query("SELECT COUNT(*) FROM account_access WHERE id='".$row['account']."' AND gmlevel >0");
				if(mysql_result($checkGM,0)==0)
				{
				echo 
				'<tr style="text-align: center;">
					<td>'.$row['name'].'</td>
					<td><img src="styles/global/images/icons/race/'.$row['race'].'-'.$row['gender'].'.gif" ></td>
					<td><img src="styles/global/images/icons/class/'.$row['class'].'.gif" ></td>
					<td>'.$guild.'</td>
					<td>'.$row['totalKills'].'</td>
					<td>'.$row['level'].'</td>
				</tr>';
				}
			}
			else
			{
				echo 
				'<tr style="text-align: center;">
					<td>'.$row['name'].'</td>
					<td><img src="styles/global/images/icons/race/'.$row['race'].'-'.$row['gender'].'.gif" ></td>
					<td><img src="styles/global/images/icons/class/'.$row['class'].'.gif" ></td>
					<td>'.$guild.'</td>
					<td>'.$row['totalKills'].'</td>
					<td>'.$row['level'].'</td>
				</tr>';
			}
		}
		?>
</table>
<?php } ?>