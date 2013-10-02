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
	
	$page->validatePageAccess('Realms');
	
    if($page->validateSubPage() == TRUE) {
		$page->outputSubPage();
	} else {
?>
<!-- Breadcrumb -->
<div class="three-fourths breadcrumb">
    <span><a href="index.php">Home</a></span>
    <span class="middle"></span>
    <span><a href="?p=realms">Realms</a></span>
    <span class="end"></span>
</div>
<!-- /Breadcrumb -->
<div class="one-half">
    <div class="box">
        <div class="inner">
            <div class="titlebar">Add Realm</div>
            <div class="contents">
                <?php if(isset($_POST['add_realm'])) {
                    $server->addRealm($_POST['realm_id'],$_POST['realm_name'],$_POST['realm_desc'],$_POST['realm_host'],$_POST['realm_port']
                            ,$_POST['realm_chardb'],$_POST['realm_sendtype'],$_POST['realm_rank_username'],
                            $_POST['realm_rank_password'],$_POST['realm_ra_port'],$_POST['realm_soap_port'],$_POST['realm_a_host']
                            ,$_POST['realm_a_user'],$_POST['realm_a_pass']);
                }?>

                <form action="?p=realms" method="post">
                <b>General Realm Information</b>
                    <div class="line-separator"></div>

                <div class="row">
                    <label>Realm ID</label><div class="field-box">
                    <input type="text" name="realm_id" placeholder="Default: 1"/>
                    </div>
                    <div class="clear"></div>
                </div>

                <div class="row">
                    <label>Realm Name</label> <div class="field-box">
                    <input type="text" name="realm_name" placeholder="Default: Sample Realm"/>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="clear"></div>
                <div class="row">
                    <label>(Optional) Realm Description</label> <div class="field-box">
                    <input type="text" name="realm_desc" placeholder="Default: Blizzlike 3x"/>
                    </div>
                    <div class="clear"></div>
                </div>

                <div class="row">
                    <label>Realm Port</label> <div class="field-box">
                    <input type="text" name="realm_port" placeholder="Default: 8085"/>
                    </div>
                    <div class="clear"></div>
                </div>

                <div class="row">
                    <label>Host: (IP or DNS)</label> <div class="field-box">
                    <input type="text" name="realm_host" placeholder="Default: 127.0.0.1"/>
                    </div>
                    <div class="clear"></div>
                </div>

                <b>Remote Console information</b> <i>(For Vote & Donation)</i>
                    <div class="line-separator"></div>
                <div class="row">
                    <label>Remote console</label> <div class="field-box">
                    <select name="realm_sendtype">
                             <option value="ra">RA</option>
                             <option value="soap">SOAP</option>
                    </select>
                    <i>(You can always change this later)</i>
                    </div>
                    <div class="clear"></div>
                </div>

                <i class='blue_text'>Specify a level 3 GM account(Used for the remote console)<br/>
                Tip: Do not use your admin account. Use a level 3 account.</i><br/>

                <div class="row">
                    <label>Username</label> <div class="field-box">
                    <input type="text" name="realm_rank_username" placeholder="Default: rauser"/>
                    </div>
                    <div class="clear"></div>
                </div>

                <div class="row">
                    <label>Password</label> <div class="field-box">
                    <input type="password" name="realm_rank_password" placeholder="Default: rapassword"/>
                    </div>
                    <div class="clear"></div>
                </div>

                <div class="row">
                    <label>RA port</label> <div class="field-box">
                    <input type="text" name="realm_ra_port" placeholder="Default: 3443"/>
                    <i>(Can be ignored if you have chosen SOAP)</i>
                    </div>
                    <div class="clear"></div>
                </div>

                <div class="row">
                    <label>SOAP port</label> <div class="field-box">
                    <input type="text" name="realm_soap_port" placeholder="Default: 7878"/>
                    <i>(Can be ignored if you have chosen RA)</i>
                    </div>
                    <div class="clear"></div>
                </div>
                <b>MySQL information</b> <i>(If left blank, settings will be copied from your configuration file)</i>
                    <div class="line-separator"></div>
                    <div class="row">
                    <label>MySQL Host</label> <div class="field-box">
                    <input type="text" name="realm_m_host" placeholder="Default: 127.0.0.1"/>
                    </div>
                    <div class="clear"></div>
                </div>

                <div class="row">
                    <label>MySQL User</label> <div class="field-box">
                    <input type="text" name="realm_m_user" placeholder="Default: root"/>
                    </div>
                    <div class="clear"></div>
                </div>

                <div class="row">
                    <label>MySQL Password</label> <div class="field-box">
                    <input type="text" name="realm_m_pass" placeholder="Default: ascent"/>
                    </div>
                    <div class="clear"></div>
                </div>

                <div class="row">
                    <label>Character Database</label> <div class="field-box">
                    <input type="text" name="realm_chardb" placeholder="Default: characters"/>
                    </div>
                    <div class="clear"></div>
                </div>

                <div class="bar-big center">
                    <input type="submit" value="Add" name="add_realm" />
                </div>
                </form>
            <?php } ?>
            </div>
        </div>
    </div>
</div>