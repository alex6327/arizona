<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div id="container">
    <div id="content">
        <div class="product">
            <?php echo form_open('cart/add'); ?>
            <div class="name"><h1><?php echo $product['Product Name']; ?></h1></div>
            <div class="img">
                <img class="imgl" src="/assets/images/demo/imgl.gif" alt="" width="125" height="125" />
            </div>
            <div>
                <table class="product">
                    <tbody><tr>
                            <td width="80" >产 品：</td>
                            <td><strong><?php echo $product['Product Name']; ?></strong>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>货 号：</td>
                            <td><?php echo $product['Cat.No.']; ?>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>规 格：</td>
                            <td><?php echo $product['Quantity']; ?>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>供应商：</td>
                            <td><?php echo $product['supplier']; ?>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>单 价：</td>
                            <td><?php echo $product['Price']; ?>&nbsp;</td>
                        </tr>


                        <tr>
                            <td colspan="2">
                                <?php echo form_hidden('id', $product['sn']); ?>
                                <?php echo form_hidden('name', $product['Product Name']); ?>
                                <?php echo form_hidden('price', $product['Price']); ?>
                                <?php echo form_hidden('table', $product['table']); ?>
                                <?php echo form_hidden('quantity', $product['Quantity']); ?>
                                <?php echo form_input(array('name' => 'qty', 'value' => '1', 'maxlength' => '3', 'size' => '5')); ?>
                                <?php echo form_submit('action', 'Add to Cart'); ?>
                                <?php echo form_close(); ?>
                            </td>
                        </tr>
                        <!--end-->
                    </tbody></table>
            </div>


        </div>
        <!--      <h1>详细信息</h1>-->
        <table class="product_information">
            <thead>
                <tr>
                    <th colspan='4'>产品信息</th>

                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                foreach ($product_column as $column) {
                    if ($product[$column] != '') {
                        if ($i % 2 == 1) {
                            echo "<tr class='light'>";
                        } else {
                            echo "<tr class='dark'>";
                        }

                        echo "<td class='left'>$column</td>";
                        echo "<td>$product[$column]</td>";
                        echo "</tr>";
                        $i++;
                    }
                }
                ?>
            </tbody>
        </table>
        <div id="comments">
            <h2>Comments</h2>
            <ul class="commentlist">
                <li class="comment_odd">
                    <div class="author"><img class="avatar" src="/assets/images/demo/avatar.gif" width="32" height="32" alt="" /><span class="name"><a href="#">A Name</a></span> <span class="wrote">wrote:</span></div>
                    <div class="submitdate"><a href="#">August 4, 2009 at 8:35 am</a></div>
                    <p>This is an example of a comment made on a post. You can either edit the comment, delete the comment or reply to the comment. Use this as a place to respond to the post or to share what you are thinking.</p>
                </li>
                <li class="comment_even">
                    <div class="author"><img class="avatar" src="/assets/images/demo/avatar.gif" width="32" height="32" alt="" /><span class="name"><a href="#">A Name</a></span> <span class="wrote">wrote:</span></div>
                    <div class="submitdate"><a href="#">August 4, 2009 at 8:35 am</a></div>
                    <p>This is an example of a comment made on a post. You can either edit the comment, delete the comment or reply to the comment. Use this as a place to respond to the post or to share what you are thinking.</p>
                </li>
                <li class="comment_odd">
                    <div class="author"><img class="avatar" src="/assets/images/demo/avatar.gif" width="32" height="32" alt="" /><span class="name"><a href="#">A Name</a></span> <span class="wrote">wrote:</span></div>
                    <div class="submitdate"><a href="#">August 4, 2009 at 8:35 am</a></div>
                    <p>This is an example of a comment made on a post. You can either edit the comment, delete the comment or reply to the comment. Use this as a place to respond to the post or to share what you are thinking.</p>
                </li>
            </ul>
        </div>
        <h2>Write A Comment</h2>
        <div id="respond">
            <form action="#" method="post">
                <p>
                    <input type="text" name="name" id="name" value="" size="22" />
                    <label for="name"><small>Name (required)</small></label>
                </p>
                <p>
                    <input type="text" name="email" id="email" value="" size="22" />
                    <label for="email"><small>Mail (required)</small></label>
                </p>
                <p>
                    <textarea name="comment" id="comment" cols="100%" rows="10"></textarea>
                    <label for="comment" style="display:none;"><small>Comment (required)</small></label>
                </p>
                <p>
                    <input name="submit" type="submit" id="submit" value="Submit Form" />
                    &nbsp;
                    <input name="reset" type="reset" id="reset" tabindex="5" value="Reset Form" />
                </p>
            </form>
        </div>
    </div>
    <div id="column">
        <div id="accordion">
            <p>Secondary Navigation</p>
            <div><p>asdjfhajksh hwejshaflkjshfdjashfdhsaldfjhhsdlahfuiwryoqwjlbcas,ngbhasfglsdhajjhfasjdfljas
                asdfjasdkfjwierqdcnsakjfdhasd
                fasdfjhasjdfhajlskdhflkasdhfldjskahflkjdsahfljkashdfuiwehrwqblkhdaslbflkjhcvlbnlfjsadljbelwuisdlaf
                asdjkfhasjdhflkjashdfljhasldk
                sadjfhasjdf
                asdjfhasjkhdflkj
                
                </p>
            </div>
            <p>Secondary Navigation</p>
            <div>
                asdfsadfasf
            </div>
            <p>Secondary Navigation</p>
            <div>
                sdfasfas
            </div>
        </div>
        <div class="holder">
            <h2 class="title"><img src="/assets/images/demo/60x60.gif" alt="" />Nullamlacus dui ipsum conseque loborttis</h2>
            <p>Nullamlacus dui ipsum conseque loborttis non euisque morbi penas dapibulum orna. Urnaultrices quis curabitur phasellentesque.</p>
            <p class="readmore"><a href="#">Continue Reading &raquo;</a></p>
        </div>
        <div id="featured">
            <ul>
                <li>
                    <h2>Indonectetus facilis leonib</h2>
                    <p class="imgholder"><img src="/assets/images/demo/240x90.gif" alt="" /></p>
                    <p>Nullamlacus dui ipsum conseque loborttis non euisque morbi penas dapibulum orna. Urnaultrices quis curabitur phasellentesque congue magnis vestibulum quismodo nulla et feugiat. Adipisciniapellentum leo ut consequam ris felit elit id nibh sociis malesuada.</p>
                    <p class="readmore"><a href="#">Continue Reading &raquo;</a></p>
                </li>
            </ul>
        </div>
        <div class="holder">
            <h2>Lorem ipsum dolor</h2>
            <p>Nuncsed sed conseque a at quismodo tris mauristibus sed habiturpiscinia sed.</p>
            <ul>
                <li><a href="#">Lorem ipsum dolor sit</a></li>
                <li>Etiam vel sapien et</li>
                <li><a href="#">Etiam vel sapien et</a></li>
            </ul>
            <p>Nuncsed sed conseque a at quismodo tris mauristibus sed habiturpiscinia sed. Condimentumsantincidunt dui mattis magna intesque purus orci augue lor nibh.</p>
            <p class="readmore"><a href="#">Continue Reading &raquo;</a></p>
        </div>
    </div>
    <div class="clear"></div>
</div>
