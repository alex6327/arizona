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
        <h1>修改密码</h1>
        <form id="updt_pwd" name="updt_pwd" method="post" action="change_password">
            <table  border="0" cellpadding="3" cellspacing="0" bgcolor="#F5F5F5">

                <tr align="center">
                    <td height="25" align="left">旧密码 </td>
                    <td width="79%" height="30" colspan="5" align="left" bgcolor="#F5F5F5"><input name="oldpwd" type="password" id="oldpwd" size="45" />
<?php echo form_error('oldpwd'); ?>
                    </td>
                </tr>
                <tr align="center">
                    <td height="25" align="left">新密码</td>
                    <td height="30" colspan="5" align="left" bgcolor="#F5F5F5"><input name="newpwd" type="password" id="newpwd"  size="45" />
<?php echo form_error('newpwd'); ?>
                    </td>
                </tr>
                <tr align="center">
                    <td height="25" align="left">确认新密码</td>
                    <td height="30" colspan="5" align="left" bgcolor="#F5F5F5"><input name="newpwd_confir" type="password" id="newpwd_confir" size="45" />
<?php echo form_error('newpwd_confir'); ?>
                    </td>
                </tr>
                <tr align="center">
                    <td height="53" colspan="6" align="center" bgcolor="#F5F5F5">
                        <input name="Submit" id="submit" style="width:130px;" type="submit" value="保存设置" />
                </tr>
            </table>
        </form> 
    </div>
</div>