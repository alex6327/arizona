<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
  <div id="topbar">
    <div id="slidepanel">
      <div class="topbox">
        <h2>BioCompete</h2>
        <p>应用生物材料（ABM）公司是一家加拿大公司，是不断在寻找对生命科学的研究和药物开发的最新创新。 ABM公司开发和销售新产品和服务，要在最有竞争力的价格，最优质的研究人员。我们众多的产品线，全面覆盖众多尖端技术，如RT-PCR，抗体，RNA干扰，细胞永生化，与腺病毒和慢病毒表达系统。我们还提供各种定制服务，创造新的解决方案，以实验的挑战，并帮助您最大限度地提高您的时间，最大限度地减少您的研究工作量。</p>
        <p class="register"><a href="/account/register">新用户注册 &raquo;</a></p>
      </div>
      <div class="topbox">
        <h2>用户登录</h2>
        <form action="account/login" method="post">
          <fieldset>
            <legend>Login Form</legend>
            <label for="loginEmail">电子邮箱:
              <input type="text" name="loginEmail" id="loginEmail" value="" />
            </label>
            <label for="loginPwd">密码:
              <input type="password" name="loginPwd" id="loginPwd" value="" />
            </label>
            <label for="userremember">
              <input class="checkbox" type="checkbox" name="userremember" id="userremember" checked="checked" />
              请记住我</label>
            <p>
              <input type="submit" name="userlogin" id="userlogin" value="登录" />
              &nbsp;
              <a  id="forgetpass"  href="#" taget="_blank" />忘记密码？</a>
            </p>
          </fieldset>
        </form>
      </div>
      <br class="clear" />
    </div>
    <div id="topnav">
      <ul>
        <li class="active"><a href="/welcome">主页</a></li>
        <li><a href="#">产品</a></li>
        <li><a href="#">企业</a></li>
        <li><a href="#">客服中心</a></li>
        <li class="last"><a href="#">网站导航</a></li>
      </ul>
    </div>
    <div id="loginpanel">
      <ul>
        <li class="left">请点击这里 &raquo;</li>
        <li class="right" id="toggle"><a id="slideit" href="#">登录</a><a id="closeit" style="display: none;" href="#">关闭</a></li>
      </ul>
    </div>
    <br class="clear" />
  </div>