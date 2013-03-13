<div id="container">
  <div id="content">
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
  <div id="column"><div id="accordion">
      <p>PCR</p>
      <div>
        <ul>
          <li>&nbsp;<a href="http://www.biocompete.com/product/listing/1/12/3463" title="Polymerase, Taq Polymerase Processivity">DNA Polymerases</a></li>
          <li>&nbsp;<a href="http://www.biocompete.com/product/listing/1/12/3464" title="PCR Optimization, PCR Optimization MgCl2, Failsafe PCR">PCR Optimization Kits</a></l>
         
        </ul>
      </div>
      <p>qPCR</p>
      <div>
      <ul>
        	  <li>&nbsp;<a href="http://www.biocompete.com/product/listing/1/12/3461" title="qPCR Mastermixes, qPCR Mastermix Plus">qPCR</a></li>
        	  <li>&nbsp;<a href="http://www.biocompete.com/product/listing/1/22/3919" title="DNase I Footprinting, DNase I Invitrogen, DNase I Roche">DNaseI/RNaseOFF</a></li>
              
          </ul> 
      </div>
      <p>RT-PCR</p>
      <div>
      <ul>
              <li>&nbsp;<a href="http://www.biocompete.com/product/listing/1/12/3462" title="cDNA Synthesis and Reverse Transcriptase, Reverse Transcriptase Inhinbitors">RT-PCR</a></li>
            </ul>
      </div>
      <p>Others</p>
      <div>
      <ul>
                <li>&nbsp;<a href="http://www.biocompete.com/product/listing/1/12/3465" title="DNA Dyes, RNA Stains">SafeView™ DNA Stains</a></li>
                <li>&nbsp;<a href="http://www.biocompete.com/product/listing/1/12/3466" title="dNTP, dNTP PCR">dNTPs</a></li>
                <li>&nbsp;<a href="http://www.biocompete.com/product/listing/1/22/3916" title="DNA Ladders, DNA Marker Standards">Opti-DNA Markers</a></li>

            </ul>
      </div>
    </div>
    <!--        <div class="holder">
            <h2 class="title"><img src="/assets/images/demo/60x60.gif" alt="" />Nullamlacus dui ipsum conseque loborttis</h2>
            <p>Nullamlacus dui ipsum conseque loborttis non euisque morbi penas dapibulum orna. Urnaultrices quis curabitur phasellentesque.</p>
            <p class="readmore"><a href="#">Continue Reading &raquo;</a></p>
        </div>--> 
    <!--        <div id="featured">
            <ul>
                <li>
                    <h2>Indonectetus facilis leonib</h2>
                    <p class="imgholder"><img src="/assets/images/demo/240x90.gif" alt="" /></p>
                    <p>Nullamlacus dui ipsum conseque loborttis non euisque morbi penas dapibulum orna. Urnaultrices quis curabitur phasellentesque congue magnis vestibulum quismodo nulla et feugiat. Adipisciniapellentum leo ut consequam ris felit elit id nibh sociis malesuada.</p>
                    <p class="readmore"><a href="#">Continue Reading &raquo;</a></p>
                </li>
            </ul>
        </div>--> 
    <!--        <div class="holder">
            <h2>Lorem ipsum dolor</h2>
            <p>Nuncsed sed conseque a at quismodo tris mauristibus sed habiturpiscinia sed.</p>
            <ul>
                <li><a href="#">Lorem ipsum dolor sit</a></li>
                <li>Etiam vel sapien et</li>
                <li><a href="#">Etiam vel sapien et</a></li>
            </ul>
            <p>Nuncsed sed conseque a at quismodo tris mauristibus sed habiturpiscinia sed. Condimentumsantincidunt dui mattis magna intesque purus orci augue lor nibh.</p>
            <p class="readmore"><a href="#">Continue Reading &raquo;</a></p>
        </div>--> 
  </div>
  <div class ="clear"></div>
</div>
