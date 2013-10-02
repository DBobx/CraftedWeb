<?php
/*
             _____           ____
            |   __|_____ _ _|    \ ___ _ _ ___
            |   __|     | | |  |  | -_| | |_ -|
            |_____|_|_|_|___|____/|___|\_/|___|
     Copyright (C) 2013 EmuDevs <http://www.emudevs.com/>
 */
?>
<?php $page = new page; 
$server = new server;
$account = new account;
?>
<!-- Breadcrumb -->
<div class="three-fourths breadcrumb">
    <span><a href="index.php">Home</a></span>
    <span class="middle"></span>
    <span><a href="#">Services</a></span>
    <span class="middle"></span>
    <span><a href="?p=services&s=charservice">Character Services</a></span>
    <span class="end"></span>
</div>
<!-- /Breadcrumb -->
<div class="three-fourths">
    <div class="box">
        <div class="inner">
            <div class="titlebar">Character Services</div>
            <table class="data-table">
                <thead>
                    <tr>
                        <th>Service</th>
                        <th>Price</th>
                        <th>Currency</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $result = mysql_query("SELECT * FROM service_prices");
                while($row = mysql_fetch_assoc($result)) { ?>
                    <tr class="center">
                        <td><?php echo $row['service']; ?></td>
                        <td><input type="text" value="<?php echo $row['price']; ?>" style="width: 50px;" id="<?php echo $row['service']; ?>_price" class="noremove"/></td>
                        <td><select style="width: 200px;" id="<?php echo $row['service']; ?>_currency">
                                <option value="vp" <?php if ($row['currency']=='vp') echo 'selected'; ?>>Vote Points</option>
                                <option value="dp" <?php if ($row['currency']=='dp') echo 'selected'; ?>><?php echo $GLOBALS['donation']['coins_name']; ?></option>
                            </select></td>
                        <td><select style="width: 150px;" id="<?php echo $row['service']; ?>_enabled">
                                <option value="true" <?php if ($row['enabled']=='TRUE') echo 'selected'; ?>>Enabled</option>
                                <option value="false" <?php if ($row['enabled']=='FALSE') echo 'selected'; ?>>Disabled</option>
                            </select></td>
                        <td><input class="button green tiny" type="submit" value="Save" onclick="saveServicePrice('<?php echo $row['service']; ?>')"/>
                    </tr>
                <?php }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>