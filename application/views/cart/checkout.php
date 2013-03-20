
<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div id ="container">
    <div>
        <form id ="address_book" name="address" action="/cart/processing" method="post">
            <h3>收货地址</h3>
            <div>

                <p style="font-size:12px;color:#F00;">新增收货地址 (带*的为必填项)</p>
                <ul id="addressForm">
                    <li>
                        <label class="label-like">收货人姓名:</label>

                        <input type="text" name="fullName"  value="">
                        <span class="spark-indeed">*</span>
                        <span style="font-size: 11px;color:#F00;"><?php echo form_error('fullName'); ?></span>

                    </li>
                    <li><label class="label-like">所在地区:</label>

                        <input type="text" name="province"  ><span class="spark-indeed">省</span>
                        <input type="text" name="city"  ><span class="spark-indeed">市</span>
                        <input type="text" name="district"  ><span class="spark-indeed">区/县</span>
                        <span class="spark-indeed">*</span>
                        <span style="font-size: 11px;color:#F00;"><?php echo form_error('province'); ?></span>
                        <span style="font-size: 11px;color:#F00;"><?php echo form_error('city'); ?></span>
                        <span style="font-size: 11px;color:#F00;"><?php echo form_error('district'); ?></span>
                    </li>
                    <li><label class="label-like" >街道地址:</label>

                        <textarea name="streetAddress"  rows="3" cols="60"></textarea>
                        <span class="spark-indeed">*</span>
                        <span>不需要重复填写省/市/区</span>
                        <span style="font-size: 11px;color:#F00;"><?php echo form_error('streetAddress'); ?></span>
                    </li>
                    <li>
                        <label class="label-like">邮政编码:</label>
                        <input type="text" name="postCode" value="">
                        <span class="spark-indeed">*</span>
                        <span style="font-size: 11px;color:#F00;"><?php echo form_error('postCode'); ?></span>
                    </li>
                    <li>
                        <label class="label-like">手机号码:</label>
                        <input type="text" name="phone" value="" id="mobilePhone">
                        <span >电话号码、手机号码必填一项</span>
                        <span style="font-size: 11px;color:#F00;"><?php echo form_error('phone'); ?></span>
                    </li>
                    <li>
                        <label class="label-like">电话号码:</label>
                        <input type="text" name="areaCode" title="区号"> -
                        <input type="text" name="phoneNo" title="电话号码"> -
                        <input type="text" name="extension" title="分机">
                        <span >区号-电话号码-分机</span>
                        <span style="font-size: 11px;color:#F00;"><?php echo form_error('areaCode'); ?></span>
                        <span style="font-size: 11px;color:#F00;"><?php echo form_error('phoneNo'); ?></span>
                        <span style="font-size: 11px;color:#F00;"><?php echo form_error('extension'); ?></span>
                    </li>

                    <!--                    <li class="container-btn">
                                            <div class="skin-gray" id="createD">
                                            </div>
                    
                                        </li>-->
                </ul>
                <!--        <div class="tbl-deliver-address">
                            <table border="0" cellspacing="0" cellpadding="0" class="tbl-main">
                                <caption>已保存的有效地址</caption>
                                <colgroup>
                                    <col class="col-man">
                
                                    <col class="col-area">
                                    <col class="col-address">
                                    <col class="col-postcode">
                                    <col class="col-phone">
                                    <col class="col-actions">
                                </colgroup>
                                <tbody><tr class="thead-tbl-grade">
                                        <th>收货人</th><th>所在地区</th><th>街道地址</th><th>邮编</th><th>电话/手机</th><th></th><th>操作</th>
                                    </tr>
                                    <tr class="thead-tbl-address" id="244337775" bgcolor="white">
                                        <td class="cell-align-center"></td>
                                        <td></td>
                                        <td></td>
                                        <td class="cell-align-center"></td>
                                        处理单个电话号码，上下居中的问题：add by yundian
                                        这里的座机和手机可能为null或“”或有值
                                        <td></td>
                                        <td class="thead-tbl-status" style="color:blue"></td>
                                        <td class="cell-align-center">
                                            <a href="#" onclick="selectDeliver(244337775)">修改</a> |
                                            <a href="#" onclick="del(244337775)">删除</a>
                                        </td>
                                    </tr>
                                    <tr class="thead-tbl-address" id="580905708" bgcolor="#C6D9F0">
                                        <td class="cell-align-center"></td>
                                        <td>  </td>
                                        <td></td>
                                        <td class="cell-align-center"></td>
                                        处理单个电话号码，上下居中的问题：add by yundian
                                        这里的座机和手机可能为null或“”或有值
                                        <td></td>
                                        <td class="thead-tbl-status" style="color:blue">默认地址</td>
                                        <td class="cell-align-center">
                                            <a href="#" onclick="selectDeliver(580905708)">修改</a> |
                                            <a href="#" onclick="del(580905708)">删除</a>
                                        </td>
                                    </tr>
                                    <tr class="thead-tbl-address" id="581084421" bgcolor="white">
                                        <td class="cell-align-center"></td>
                                        <td>  </td>
                                        <td></td>
                                        <td class="cell-align-center"></td>
                                        处理单个电话号码，上下居中的问题：add by yundian
                                        这里的座机和手机可能为null或“”或有值
                                        <td></td>
                                        <td class="thead-tbl-status" style="color:blue"></td>
                                        <td class="cell-align-center">
                                            <a href="#" onclick="selectDeliver(581084421)">修改</a> |
                                            <a href="#" onclick="del(581084421)">删除</a>
                                        </td>
                                    </tr>
                
                                </tbody></table>
                        </div>-->

            </div>

            <h3>付款方式</h3>
            <div>
                <p style="font-size:12px;color:#F00;">新增付款方式 (带*的为必填项)</p>
                <ul id="paymentForm">
                    <li>
                        <label class="label-like">信用卡号码:</label>

                        <input type="text" name="creditCardNo"  value="">
                        <span class="spark-indeed">*</span>

                    </li>
                    <li><label class="label-like">过期日期:</label>

                        <input type="text" name="expireMonth"  ><span class="spark-indeed">月</span>
                        <input type="text" name="expireYear"  ><span class="spark-indeed">年</span>
                        <span class="spark-indeed">*</span>

                    </li>

                    <li>
                        <label class="label-like">Security Code:</label>
                        <input type="text" name="securityCode" value="">
                        <span class="spark-indeed">*</span>
                    </li>



                    <li class="container-btn">
                        <div class="skin-gray" id="createD">

                        </div>

                    </li>
                </ul>
            </div>
            <h3>提交订单</h3>
            <div>
                <table cellpadding="6" cellspacing="1" style="width:100%" border="0">

                    <tr>
                        <th>产品信息</th>
                        <th style="text-align:right">数量</th>
                        
                        <th style="text-align:right">价格</th>
                        <th style="text-align:right">小计</th>
                    </tr>

                    <?php $i = 1; ?>

                    <?php foreach ($this->cart->contents() as $items): ?>

                        <?php echo form_hidden($i . 'rowid', $items['rowid']); ?>

                        <tr>
                           
                            <td>
                                <?php echo $items['name']; ?>

                                <?php if ($this->cart->has_options($items['rowid']) == TRUE): ?>

                                    <p>
                                        <?php foreach ($this->cart->product_options($items['rowid']) as $option_name => $option_value): ?>

                                            <strong><?php echo $option_name; ?>:</strong> <?php echo $option_value; ?><br />

                                        <?php endforeach; ?>
                                    </p>

                                <?php endif; ?>

                            </td>
                             <td style="text-align:right"><?php echo $items['qty']; ?></td>
                            <td style="text-align:right"><?php echo $this->cart->format_number($items['price']); ?></td>
                            <td style="text-align:right">$<?php echo $this->cart->format_number($items['subtotal']); ?></td>
                        </tr>

                        <?php $i++; ?>

                    <?php endforeach; ?>

                    <tr>
                        <td colspan="2"> </td>
                        <td class="right"><strong>总计</strong></td>
                        <td class="right">$<?php echo $this->cart->format_number($this->cart->total()); ?></td>
                    </tr>

                </table>
            </div>
            <input type="submit" id="submit" name="orderSubmit" value="提交订单" />
        </form>
    </div>
</div>