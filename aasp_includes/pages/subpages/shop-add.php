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
    <span><a href="?p=shop&s=add">Add Shop Item(s)</a></span>
    <span class="end"></span>
</div>
<!-- /Breadcrumb -->
<section class="full-width">
    <div class="box no-bg grid-demo">
        <h3>Add Shop Item(s)</h3>
    </div>
</section>
<div class="one-third">
    <div class="box">
        <div class="inner">
            <form>
                <div class="titlebar">Single Item</div>
                <div class="contents">
                    <div class="row">
                        <label>Entry</label> <div class="field-box"><input type="text" class="small"  placeholder="1" id="addsingle_entry"></div>
                        <div class="clear"></div>
                    </div>
                    <div class="row">
                        <label>Price</label> <div class="field-box"><input type="text" class="small"  placeholder="10" id="addsingle_price"></div>
                        <div class="clear"></div>
                    </div>
                    <div class="row last">
                        <label>Shop</label> <div class="field-box">
                        <select id="addsingle_shop">
                            <option value="vote">Vote Shop</option>
                            <option value="donate">Donation Shop</option>
                        </select></div>
                        <div class="clear"></div>
                    </div>
                    <div class="clear"></div>
                    <div class="line-separator"></div>
                    <div class="bar-big">
                        <input type="submit" value="Submit" onclick="addSingleItem()">
                        <input type="reset" value="Reset">
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
                <div class="titlebar">Multiple items</div>
                <div class="contents">
                    <div class="row">
                        <label>Entry</label> <div class="field-box"><input type="text" class="small"  placeholder="1" id="addsingle_entry"></div>
                        <div class="clear"></div>
                    </div>
                    <div class="row">
                        <label>Min. Item Level</label> <div class="field-box">
                            <select id="addmulti_il_from">
                                <?php for ($i = 1; $i <= $GLOBALS['maxItemLevel']; $i++) {
                                    echo "<option>".$i."</option>";
                                } ?>
                            </select>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="row">
                        <label>Max. Item Level</label> <div class="field-box">
                            <select id="addmulti_il_to">
                                <?php for ($i = $GLOBALS['maxItemLevel']; $i >= 1; $i--) {
                                    echo "<option>".$i."</option>";
                                } ?>
                            </select>
                        </div>
                        <div class="clear"></div>
                    </div>

                    <div class="row">
                        <label>Price</label> <div class="field-box"><input type="text" class="small"  placeholder="10" id="addmulti_price"></div>
                        <div class="clear"></div>
                    </div>
                    <div class="row">
                        <label>Quality</label> <div class="field-box">
                            <select id="addmulti_quality">
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
                            <select id="addmulti_type">
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
                            <select id="addmulti_shop">
                                <option value="vote">Vote Shop</option>
                                <option value="donate">Donation Shop</option>
                            </select>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="bar-big">
                        <input type="submit" value="Submit" onclick="addMultiItem()">
                        <input type="reset" value="Reset">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>