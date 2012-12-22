<a href="#dashboard-menu" class="nav-header" data-toggle="collapse"><i class="icon-dashboard"></i>Dashboard</a>
<ul id="dashboard-menu" class="nav nav-list collapse in">
    <?php if($active == 'index'): ?>
    <li class="active"><a href="/backend/index">Home</a></li>
    <?php else: ?>
    <li><a href="/backend/index">Home</a></li>
    <?php endif; ?>
    <?php if($active == 'product_list'): ?>
    <li class ="active"><a href="/backend/product_list">产品列表</a></li>
    <?php else: ?>
    <li ><a href="/backend/product_list">产品列表</a></li>
    <?php endif; ?>
    <?php if($active == 'product'): ?>
    <li class ="active"><a href="/backend/product">增加新产品</a></li>
    <?php else: ?>
    <li ><a href="/backend/product">增加新产品</a></li>
    <?php endif; ?>
    <?php if($active == 'media'): ?>
    <li class ="active"><a href="/backend/media">相册</a></li>
    <?php else: ?>
    <li ><a href="/backend/media">相册</a></li>
    <?php endif; ?>
    
    
</ul>

<a href="#accounts-menu" class="nav-header" data-toggle="collapse"><i class="icon-briefcase"></i>Account<span class="label label-info">+3</span></a>
<ul id="accounts-menu" class="nav nav-list collapse">
    <li ><a href="">收货地址管理</a></li>
    <li ><a href="">账户设置</a></li>
    <li ><a href="">付款方式</a></li>
    <li><a href ="">订单管理</a></li>
</ul>



<!--<a href="#legal-menu" class="nav-header" data-toggle="collapse"><i class="icon-legal"></i>Legal</a>
<ul id="legal-menu" class="nav nav-list collapse">
    <li ><a href="privacy-policy.html">Privacy Policy</a></li>
    <li ><a href="terms-and-conditions.html">Terms and Conditions</a></li>
</ul>-->

<a href="/backend/help" class="nav-header" ><i class="icon-question-sign"></i>帮助</a>
<a href="/backend/faq" class="nav-header" ><i class="icon-comment"></i>Faq</a>