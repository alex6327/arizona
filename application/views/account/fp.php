<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div id="homecontent">
    <div class="update">
    <h1>忘记密码</h1>
    <form id="email_pwd" name="email_pwd" method="post" action="forgot_password">
          <table  border="0" cellpadding="3" cellspacing="0" bgcolor="#F5F5F5">
            
            <tr align="center">
              <td height="25" align="left">邮箱地址 </td>
              <td width="79%" height="30" colspan="5" align="left" bgcolor="#F5F5F5"><input name="fpEmail" type="text" id="fpEmail" size="45" />
              <?php echo form_error('fpEmail'); ?>
              </td>
            </tr>
            
            
            <tr align="center">
              <td height="53" colspan="6" align="center" bgcolor="#F5F5F5">
             <input name="Submit" id="submit" style="width:130px;" type="submit" value="找回密码" />
            </tr>
          </table>
        </form> 
    </div>
</div>