<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div id="homecontent">
    <div class="register">
        <h1>填写账户信息</h1>
        <form id="form1" name="form1" method="post" action="create_account"><p style="font-size:11px;color:#F00;">基本信息 (带*的为必填项)</p>
            <table  border="0" cellpadding="3" cellspacing="0" bgcolor="#F5F5F5">
                <tr align="center">
                    <td height="30" colspan="6" align="left" bgcolor="#D3D6BE"><strong>基本信息</strong></td>
                </tr>
                <tr align="center">
                    <td height="25" align="left">用户名 <span style="color:#F00">*</span></td>
                    <td width="79%" height="30" colspan="5" align="left" bgcolor="#F5F5F5"><input name="uname" type="text" id="uname" value="<?php echo set_value('uname'); ?>" size="45" />
                        &nbsp;&nbsp;2-12个字符，一个汉字为两个字符，推荐使用中文用户名。
                        <?php echo form_error('uname'); ?>
                        
                    </td>
                </tr>
                <tr align="center">
                    <td height="25" align="left">密码 <span style="color:#F00">*</span></td>
                    <td height="30" colspan="5" align="left" bgcolor="#F5F5F5"><input name="pwd" type="password" id="pwd"  size="45" />
                        &nbsp;&nbsp;4-10个字符，推荐使用字母加数字的组合密码。
                        <?php echo form_error('pwd'); ?>
                        
                    </td>
                </tr>
                <tr align="center">
                    <td height="25" align="left">确认密码 <span style="color:#F00">*</span></td>
                    <td height="30" colspan="5" align="left" bgcolor="#F5F5F5"><input name="pwd_confir" type="password" id="pwd_confir" size="45" />
                        &nbsp;&nbsp;请再输一次密码。
                        <?php echo form_error('pwd_confir'); ?>
                    </td>
                </tr>
                <tr align="center">
                    <td height="25" align="left">Email <span style="color:#F00">*</span></td>
                    <td height="30" colspan="5" align="left" bgcolor="#F5F5F5"><input name="email" type="text" id="email" value="<?php echo set_value('u'); ?>" size="45" onblur="validateEmail()"/>
                        &nbsp;&nbsp;请输入您常用的电子邮箱，以方面以后找回密码。
                        <?php echo form_error('email'); ?>
                    </td>
                </tr>


                <tr align="center">
                    <td height="53" colspan="6" align="center" bgcolor="#F5F5F5">
                        <input name="Submit" id="submit" style="width:130px;" type="submit" value="立即注册" />
                </tr>
            </table>
        </form> 
    </div>
</div>