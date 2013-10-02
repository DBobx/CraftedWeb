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
    <span><a href="?p=shop&s=manage">Manage Shop Item(s)</a></span>
    <span class="end"></span>
</div>
<!-- /Breadcrumb -->
<div class="one-third">
    <div class="box">
        <div class="inner">
            <form>
                <div class="titlebar">Modify Single Item</div>
                <div class="contents">
                    <div class="row">
                        <label>Entry</label> <div class="field-box"><input type="text" class="small"  placeholder="1" id="modsingle_entry"></div>
                        <div class="clear"></div>
                    </div>
                    <div class="row">
                        <label>Price</label> <div class="field-box"><input type="text" class="small"  placeholder="1" id="modsingle_price"></div>
                        <div class="clear"></div>
                    </div>
                    <div class="row">
                        <label>Shop</label> <div class="field-box">
                            <select id="modsingle_shop">
                                <option value="vote">Vote Shop</option>
                                <option value="donate">Donation Shop</option>
                            </select>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="bar-big">
                        <input type="submit" value="Update" onclick="modSingleItem()">
                        <input type="reset" value="Remove" onclick="delSingleItem()">
                    </div>
                 </div>
            </form>
        </div>
    </div>
</div>

<div class="one-third">
    <div class="box">
        <div class="inner">
            <form>
                <div class="titlebar">Modify Multiple Items</div>
                <div class="contents">
                    <div class="row">
                        <label>Entry</label> <div class="field-box"><input type="text" class="small"  placeholder="1" id="modsingle_entry"></div>
                        <div class="clear"></div>
                    </div>
                    <div class="row">
                        <label>Min. Item Level</label> <div class="field-box">
                            <select style="width: 140px;" id="modmulti_il_from">
                                <?php for ($i = 1; $i <= $GLOBALS['maxItemLevel']; $i++) {
                                    echo "<option>".$i."</option>";
                                } ?>
                            </select>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="row">
                        <label>Max. Item Level</label> <div class="field-box">
                            <select style="width: 140px;" id="modmulti_il_to">
                                <?php for ($i = $GLOBALS['maxItemLevel']; $i >= 1; $i--) {
                                    echo "<option>".$i."</option>";
                                } ?>
                            </select>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="row">
                        <label>Price</label> <div class="field-box"><input type="text" id="modmulti_price"/></div>
                        <div class="clear"></div>
                    </div>
                    <div class="row">
                        <label>Quality</label> <div class="field-box">
                            <select style="width: 205px;" id="modmulti_quality">
                                <option value="all">All</option>
                                <option value="0">Poor</option>
                                <option value="1">Common</option>
                                <option value="2">Uncommon</option>
                                <option value="3">Rare</option>
                                <option value="4">Epic</option>
                                <option value="5">Legendary</option>
                            </select>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="row">
                        <label>Type</label> <div class="field-box">
                            <select id="modmulti_type" style="width: 205px;">
                                <option value="all">All</option>
                                <option value="0">Consumable</option>
                                <option value="1">Container</option>
                                <option value="2">Weapons</option>
                                <option value="3">Gem</option>
                                <option value="4">Armor</option>
                                <option value="15">Miscellaneous</option>
                                <option value="16">Glyph</option>
                                <option value="15-5">Mount</option>
                                <option value="15-2">Pet</option>
                            </select>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="row">
                        <label>Shop</label> <div class="field-box">
                            <select style="width: 205px;" id="modmulti_shop">
                                <option value="vote">Vote Shop</option>
                                <option value="donate">Donation Shop</option>
                            </select>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="bar-big">
                        <input type="submit" value="Update" onclick="modMultiItem()">
                        <input type="reset" value="Remove" onclick="delMultiItem()">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>