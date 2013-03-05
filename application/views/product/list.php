<div id="container">
    <h1>搜索结果</h1>

    <form method="post">

        <div class="">
            <table>
                <tbody><tr height="30">

                        <td>
                            <input value="对比选中" type="submit">&nbsp;

                        </td>
                        <td align="right">


                            <select onchange="">
                                <option value="0">显示顺序</option>
                                <option value="2">价格由高到低</option>
                                <option value="3">价格由低到高</option>
                                <option value="4">签约会员级别由高到低</option>
                                <option value="5">签约会员级别由低到高</option>
                                <option value="6">供货量由高到低</option>
                                <option value="7">供货量由低到高</option>
                                <option value="8">起订量由高到低</option>
                                <option value="9">起订量由低到高</option>
                            </select>&nbsp;
                        </td>
                    </tr>
                </tbody></table>
        </div>
        <?php foreach ($products as $product): ?>

            <div class="list" id="">
                <table cellpadding="0" cellspacing="0">
                    <tbody>
                        <tr align="center">
                            <td valign="top" width="25">&nbsp;<input id="" name="" value="" onclick="" type="checkbox"> </td>
                            <td valign="top" width="105"><div><a href="" target="" title=""><img  height="100" width="100"></a></div></td>
                            <td width="10"> </td>
                            <td align="left" valign="top">
                                <ul>
                                    <li>
                                        <a href="/product/detail/<?= $grpId; ?>/<?= $catId; ?>/<?= $ssn; ?>/<?= $product['sn']; ?>" class="" title="<?php echo $product['Product Name']; ?>" target="_blank"><?php echo $product['Product Name']; ?></a>
                                    </li>
                                    <!--    <li style="color:#949494; margin:3px 0;">
                                    <?php //echo $product->description; ?></li>-->
                                    <li>
                                        <span class="">
                                        </span>
                                        <a href="" target="_blank" class=""><?php echo $product['supplier']; ?></a>&nbsp;
                                        <span class="">
                                        </span>
                                    </li>
                                </ul>
                            </td>
                            <td width="20"> </td>
                            <td align="left" width="140"><span class="">分类：</span><a href="" target="_blank" class="green"><?php echo $catName; ?></a></td>
                            <td width="150"> 
                                <span class=""><strong class="px14"><?php echo $product['Price']; ?></strong><br /><?php echo $product['Quantity']; ?></span><br>
                            </td>
                        </tr>
                    </tbody></table>
            </div>

        <?php endforeach; ?>

<!--    <table>
<tbody><tr height="30">
<td width="25"></td>
<td>
<input value="对比选中" onclick="this.form.action='http://www.biomean.com/product/compare.php';" class="btn_1" onmouseover="this.className='btn_2'" onmouseout="this.className='btn_1'" type="submit">&nbsp;
<input value="批量询价" onclick="this.form.action='http://www.biomean.com/product/inquiry.php';" class="btn_1" onmouseover="this.className='btn_2'" onmouseout="this.className='btn_1'" type="submit">
</td>
</tr>
</tbody></table>-->

    </form>
    <div id ="pagniation"><?php echo $pagination; ?></div>

</div>