<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div id="homecontent">
<h1>填写账户信息</h1>
<form id="form1" name="form1" method="post" action="NewAccountCreate.php"><p style="font-size:11px;color:#F00;">基本信息 (带*的为必填项)</p>
          <table width="100%"  border="0" cellpadding="3" cellspacing="0" bgcolor="#F5F5F5">
            <tr align="center">
              <td height="30" colspan="6" align="left" bgcolor="#D3D6BE"><strong>Shipping Information:</strong></td>
            </tr>
            <tr align="center">
              <td height="25" align="left">Full Name <span style="color:#F00">*</span></td>
              <td width="79%" height="30" colspan="5" align="left" bgcolor="#F5F5F5"><input name="fname" type="text" id="fname" size="45" /></td>
            </tr>
            <tr align="center">
              <td height="25" align="left">Title</td>
              <td height="30" colspan="5" align="left" bgcolor="#F5F5F5"><input name="title" type="text" id="title2" size="45" /></td>
            </tr>
            <tr align="center">
              <td width="21%" height="25" align="left">Language</td>
              <td height="30" colspan="5" align="left" bgcolor="#F5F5F5"><select name="language" id="language" style="border:1px solid #E0D165">
                <option selected="selected" value="English">English</option>
                <option value="French">French</option>
                <option value="Chinese">Chinese</option>
              </select></td>
            </tr>
            <tr align="center">
              <td height="25" align="left">Company / Institution <span style="color:#F00">*</span> </td>
              <td height="30" colspan="5" align="left" bgcolor="#F5F5F5"><input name="company" type="text" id="company" size="65" /></td>
            </tr>
            <tr align="center">
              <td height="25" align="left">Address <span style="color:#F00">*</span></td>
              <td height="30" colspan="5" align="left" bgcolor="#F5F5F5"><input name="addr" type="text" id="addr" size="65" /></td>
            </tr>
            <tr align="center">
              <td height="25" align="left">City <span style="color:#F00">*</span></td>
              <td height="30" colspan="5" align="left" bgcolor="#F5F5F5"><input name="city" type="text" id="city" size="35" /></td>
            </tr>
            <tr align="center">
              <td height="25" align="left">Province/State <span style="color:#F00">*</span></td>
              <td height="30" colspan="5" align="left" bgcolor="#F5F5F5"><input name="prov" type="text" id="prov" size="35" /></td>
            </tr>
            <tr align="center">
              <td height="25" align="left">Country <span style="color:#F00">*</span></td>
              <td height="30" colspan="5" align="left" bgcolor="#F5F5F5"><select name="country" id="country" style="border:1px solid #E0D165">
                <option value="00" selected="selected">Select </option>
                <option value="AR">Argentina </option>
                <option value="AM">Armenia </option>
                <option value="AU">Australia </option>
                <option value="AT">Austria </option>
                <option value="BH">Bahrain </option>
                <option value="BD">Bangladesh </option>
                <option value="BY">Belarus </option>
                <option value="BE">Belgium </option>
                <option value="BR">Brazil </option>
                <option value="BG">Bulgaria </option>
                <option value="CA">Canada </option>
                <option value="CL">Chile </option>
                <option value="CN">China </option>
                <option value="CO">Colombia </option>
                <option value="CI">Cote d'ivoire </option>
                <option value="HR">Croatia </option>
                <option value="CY">Cyprus </option>
                <option value="CZ">Czech Republic </option>
                <option value="DK">Denmark </option>
                <option value="EG">Egypt </option>
                <option value="EE">Estonia </option>
                <option value="FI">Finland </option>
                <option value="FR">France </option>
                <option value="GF">French guiana </option>
                <option value="DE">Germany </option>
                <option value="GR">Greece </option>
                <option value="GU">Guam </option>
                <option value="HK">Hong Kong </option>
                <option value="HU">Hungary </option>
                <option value="IS">Iceland </option>
                <option value="IN">India </option>
                <option value="ID">Indonesia </option>
                <option value="IE">Ireland </option>
                <option value="IL">Israel </option>
                <option value="IT">Italy </option>
                <option value="JM">Jamaica </option>
                <option value="JP">Japan </option>
                <option value="JO">Jordan </option>
                <option value="KR">Korea, Republic of </option>
                <option value="KW">Kuwait </option>
                <option value="KG">Kyrgystan </option>
                <option value="LV">Latvia </option>
                <option value="LB">Lebanon </option>
                <option value="LT">Lithuania </option>
                <option value="LU">Luxembourg </option>
                <option value="MY">Malaysia </option>
                <option value="MT">Malta </option>
                <option value="MQ">Martinique </option>
                <option value="MX">Mexico </option>
                <option value="MC">Monaco </option>
                <option value="NP">Nepal </option>
                <option value="NL">Netherlands </option>
                <option value="NZ">New Zealand </option>
                <option value="NG">Nigeria </option>
                <option value="NO">Norway </option>
                <option value="PK">Pakistan </option>
                <option value="PA">Panama </option>
                <option value="PG">Papua new guinea </option>
                <option value="PH">Philippines </option>
                <option value="PL">Poland </option>
                <option value="PT">Portugal </option>
                <option value="PR">Puerto Rico </option>
                <option value="RE">Reunion </option>
                <option value="RO">Romania </option>
                <option value="RU">Russian federation </option>
                <option value="SA">Saudi Arabia </option>
                <option value="SN">Senegal </option>
                <option value="SG">Singapore </option>
                <option value="SK">Slovakia </option>
                <option value="SI">Slovenia </option>
                <option value="ZA">South Africa </option>
                <option value="ES">Spain </option>
                <option value="LK">Sri lanka </option>
                <option value="SE">Sweden </option>
                <option value="CH">Switzerland </option>
                <option value="TW">Taiwan </option>
                <option value="TH">Thailand </option>
                <option value="TT">Trinidad &amp; Tob </option>
                <option value="TN">Tunisia </option>
                <option value="TR">Turkey </option>
                <option value="AE">U.A.E </option>
                <option value="UA">Ukraine </option>
                <option value="GB">United Kingdom </option>
                <option value="US">United States </option>
                <option value="UY">Uruguay </option>
                <option value="VE">Venezuela </option>
                <option value="VN">Vietnam </option>
                <option value="YU">Yugoslavia </option>
              </select></td>
            </tr>
            <tr align="center">
              <td height="25" align="left">ZIP/Postal Code<span style="color:#F00">*</span></td>
              <td height="30" colspan="5" align="left" bgcolor="#F5F5F5"><input name="zip" type="text" id="zip" size="25" /></td>
            </tr>
            <tr align="center">
              <td height="25" align="left">Phone <span style="color:#F00">*</span></td>
              <td height="30" colspan="5" align="left" bgcolor="#F5F5F5"><span class="smal">Country Code:
                  <input name="ccode" type="text" id="ccode" size="3" />
                  &nbsp;Area Code:
                  <input name="acode" type="text" id="acode" size="3" />
&nbsp;Phone Number:
<input name="phone" type="text" id="phone" size="10" />
              </span></td>
            </tr>
            <tr align="center">
              <td height="25" align="left">Fax </td>
              <td height="30" colspan="5" align="left" bgcolor="#F5F5F5"><span class="smal">Country Code:
                  <input name="fccode" type="text" id="fccode" size="3" />
&nbsp;&nbsp;&nbsp;Area Code:
<input name="facode" type="text" id="facode" size="3" />
&nbsp;&nbsp;&nbsp;Fax Number:
<input name="fax" type="text" id="fax" size="10" />
              </span></td>
            </tr>
            <tr align="center">
              <td height="25" align="left">Email <span style="color:#F00">*</span></td>
              <td height="30" colspan="5" align="left" bgcolor="#F5F5F5"><input name="email" type="text" id="email" size="65" onblur="validateEmail()"/></td>
            </tr>
            <tr align="center">
              <td height="30" colspan="6" align="left" bgcolor="#D3D6BE"><strong>Billing Information:</strong>
                &nbsp;&nbsp;<input name="bill" type="checkbox" id="bill" value="same" onclick="autofill();"/>
                <span style="font-size:11px; color:#F00;">Please check this box when  your Billing Information is the same as your Shipping Information. </td>
            </tr>
            <tr align="center">
              <td height="25" align="left">Full Name <span style="color:#F00">*</span></td>
              <td height="30" colspan="5" align="left" bgcolor="#F5F5F5"><input name="bfname" type="text" id="bfname" size="45" /></td>
            </tr>
            <tr align="center">
              <td height="25" align="left">Title</td>
              <td height="30" colspan="5" align="left" bgcolor="#F5F5F5"><input name="btitle" type="text" id="btitle" size="45" /></td>
            </tr>
            <tr align="center">
              <td height="25" align="left">Language</td>
              <td height="30" colspan="5" align="left" bgcolor="#F5F5F5"><select name="blanguage" id="blanguage" style="border:1px solid #E0D165">
                <option selected="selected" value="English">English</option>
                <option value="French">French</option>
                <option value="Chinese">Chinese</option>
              </select></td>
            </tr>
            <tr align="center">
              <td height="25" align="left">Company / Institution <span style="color:#F00">*</span></td>
              <td height="30" colspan="5" align="left" bgcolor="#F5F5F5"><input name="bcompany" type="text" id="bcompany" size="65" /></td>
            </tr>
            <tr align="center">
              <td height="25" align="left">Address <span style="color:#F00">*</span></td>
              <td height="30" colspan="5" align="left" bgcolor="#F5F5F5"><input name="baddr" type="text" id="baddr" size="65" /></td>
            </tr>
            <tr align="center">
              <td height="25" align="left">City <span style="color:#F00">*</span></td>
              <td height="30" colspan="5" align="left" bgcolor="#F5F5F5"><input name="bcity" type="text" id="bcity" size="35" /></td>
            </tr>
            <tr align="center">
              <td height="25" align="left">Province/State <span style="color:#F00">*</span></td>
              <td height="30" colspan="5" align="left" bgcolor="#F5F5F5"><input name="bprov" type="text" id="bprov" size="35" /></td>
            </tr>
            <tr align="center">
              <td height="25" align="left">Country <span style="color:#F00">*</span></td>
              <td height="30" colspan="5" align="left" bgcolor="#F5F5F5"><select name="bcountry" id="bcountry" style="border:1px solid #E0D165">
                <option value="00" selected="selected">Select </option>
                <option value="AR">Argentina </option>
                <option value="AM">Armenia </option>
                <option value="AU">Australia </option>
                <option value="AT">Austria </option>
                <option value="BH">Bahrain </option>
                <option value="BD">Bangladesh </option>
                <option value="BY">Belarus </option>
                <option value="BE">Belgium </option>
                <option value="BR">Brazil </option>
                <option value="BG">Bulgaria </option>
                <option value="CA">Canada </option>
                <option value="CL">Chile </option>
                <option value="CN">China </option>
                <option value="CO">Colombia </option>
                <option value="CI">Cote d'ivoire </option>
                <option value="HR">Croatia </option>
                <option value="CY">Cyprus </option>
                <option value="CZ">Czech Republic </option>
                <option value="DK">Denmark </option>
                <option value="EG">Egypt </option>
                <option value="EE">Estonia </option>
                <option value="FI">Finland </option>
                <option value="FR">France </option>
                <option value="GF">French guiana </option>
                <option value="DE">Germany </option>
                <option value="GR">Greece </option>
                <option value="GU">Guam </option>
                <option value="HK">Hong Kong </option>
                <option value="HU">Hungary </option>
                <option value="IS">Iceland </option>
                <option value="IN">India </option>
                <option value="ID">Indonesia </option>
                <option value="IE">Ireland </option>
                <option value="IL">Israel </option>
                <option value="IT">Italy </option>
                <option value="JM">Jamaica </option>
                <option value="JP">Japan </option>
                <option value="JO">Jordan </option>
                <option value="KR">Korea, Republic of </option>
                <option value="KW">Kuwait </option>
                <option value="KG">Kyrgystan </option>
                <option value="LV">Latvia </option>
                <option value="LB">Lebanon </option>
                <option value="LT">Lithuania </option>
                <option value="LU">Luxembourg </option>
                <option value="MY">Malaysia </option>
                <option value="MT">Malta </option>
                <option value="MQ">Martinique </option>
                <option value="MX">Mexico </option>
                <option value="MC">Monaco </option>
                <option value="NP">Nepal </option>
                <option value="NL">Netherlands </option>
                <option value="NZ">New Zealand </option>
                <option value="NG">Nigeria </option>
                <option value="NO">Norway </option>
                <option value="PK">Pakistan </option>
                <option value="PA">Panama </option>
                <option value="PG">Papua new guinea </option>
                <option value="PH">Philippines </option>
                <option value="PL">Poland </option>
                <option value="PT">Portugal </option>
                <option value="PR">Puerto Rico </option>
                <option value="RE">Reunion </option>
                <option value="RO">Romania </option>
                <option value="RU">Russian federation </option>
                <option value="SA">Saudi Arabia </option>
                <option value="SN">Senegal </option>
                <option value="SG">Singapore </option>
                <option value="SK">Slovakia </option>
                <option value="SI">Slovenia </option>
                <option value="ZA">South Africa </option>
                <option value="ES">Spain </option>
                <option value="LK">Sri lanka </option>
                <option value="SE">Sweden </option>
                <option value="CH">Switzerland </option>
                <option value="TW">Taiwan </option>
                <option value="TH">Thailand </option>
                <option value="TT">Trinidad &amp; Tob </option>
                <option value="TN">Tunisia </option>
                <option value="TR">Turkey </option>
                <option value="AE">U.A.E </option>
                <option value="UA">Ukraine </option>
                <option value="GB">United Kingdom </option>
                <option value="US">United States </option>
                <option value="UY">Uruguay </option>
                <option value="VE">Venezuela </option>
                <option value="VN">Vietnam </option>
                <option value="YU">Yugoslavia </option>
              </select></td>
            </tr>
            <tr align="center">
              <td height="25" align="left">ZIP/Postal Code<span style="color:#F00">*</span></td>
              <td height="30" colspan="5" align="left" bgcolor="#F5F5F5"><input name="bzip" type="text" id="bzip" size="25" /></td>
            </tr>
            <tr align="center">
              <td height="25" align="left">Phone <span style="color:#F00">*</span></td>
              <td height="30" colspan="5" align="left" bgcolor="#F5F5F5"><span class="smal">Country Code:
                  <input name="bccode" type="text" id="bccode" size="3" />
                  &nbsp;Area Code:
                  <input name="bacode" type="text" id="bacode" size="3" />
&nbsp;&nbsp;Phone Number:
<input name="bphone" type="text" id="bphone" size="10" />
              </span></td>
            </tr>
            <tr align="center">
              <td height="25" align="left">Fax</td>
              <td height="30" colspan="5" align="left" bgcolor="#F5F5F5"><span class="smal">Country Code:
                  <input name="bfccode" type="text" id="bfccode" size="3" />
&nbsp;&nbsp;&nbsp;Area Code:
<input name="bfacode" type="text" id="bfacode" size="3" />
&nbsp;&nbsp;&nbsp;Fax Number:
<input name="bfax" type="text" id="bfax" size="10" />
              </span></td>
            </tr>
            <tr align="center">
              <td height="25" align="left">Email <span style="color:#F00">*</span></td>
              <td height="30" colspan="5" align="left" bgcolor="#F5F5F5"><input name="bemail" type="text" id="bemail" size="65" /></td>
            </tr>
            <tr align="center">
              <td height="53" colspan="6" align="center" bgcolor="#F5F5F5">
               
             <input name="Submit" id="submit" style="width:130px;" type="submit" value="Create Account" />
              &nbsp;&nbsp;
              <input name="Submit2" id="submit" type="reset" value="Reset" /></td>
            </tr>
          </table>
        </form> 
</div>