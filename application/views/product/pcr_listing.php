<div id="container">
    <div id="prod-detail-PCR">
        <div id="order">
            <div id='exp-list'>
                <table id='exp-table' width='100%' border='0' cellspacing='0' cellpadding='0' >
                    <?php
                    foreach ($products[$ssn] as $catName => $catProd) {
                        echo " <tr><th colspan='5' style='border-bottom:none; color:#F60; font-size:16px; text-align:left;'>";
                        echo "$catName</th></tr><tr style='line-height:20px;'><th colspan='5'></th></tr><tr><th width='235px' align='left'>Product Name</th>";
                        if ($ssn == 3461 or array_key_exists('G471-R', $catProd)) {
                            echo"<th width='120px' align='left'>Machine</th>";
                        } else {
                            echo"<th width='120px' align='left'>Size</th>";
                        }
                        echo"<th width='70px' align='left'>Cat. No.</th>
                                                <th width='40px' align='right'>Price</th>
								</tr>";
                        foreach ($catProd as $prod) {
                            echo "<tr>
                                            <td ><a href='" . $prod['anchor'] . "' title = '" . $prod['title'] . "'>" . $prod['Product Name'] . "</a></td>
                                            <td align='left'>" . $prod['Quantity'] . "</td>
                                            <td align='left'>" . $prod['Cat.No.'] . "</td>
                                            <td class='price' align='right'>" . $prod['Price'] . "</td>
                                            </tr>";
                        }
                        echo "<tr><th colspan='5' align='left' style='border-bottom:none;'>&nbsp;</th></tr>";
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
</div>