<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div id="breadcrumb">
    <ul>
        <li class="first">您在这里</li>
        <li>&#187;</li>
        <li><a href="/">主页</a></li>
        <li>&#187;</li>
        <li><a href="/product/category/<?=$grpId ?>/<?=$catId ?>"><?=$catName; ?></a></li>
        <li>&#187;</li>
        <li class="current"><?=$subCatName; ?></li>
    </ul>
</div>