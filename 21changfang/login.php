<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<meta name="keywords" content=""/>
	<meta name="description" content=""/>
  <!-- {AJ_SKIN} 是爱家的css样式目录 -->
  <link href="{AJ_SKIN}reset.css" rel="stylesheet" type="text/css" />
	<link href="{AJ_SKIN}login.css" rel="stylesheet" type="text/css" />
  <!-- {AJ_STATIC} 是爱家的静态文件夹地址 -->
	<script type="text/javascript" src="{AJ_STATIC}lang/{AJ_LANG}/lang.js"></script>
  <script type="text/javascript" src="{AJ_STATIC}file/script/config.js"></script>
  <script type="text/javascript" src="{AJ_STATIC}file/script/jquery.js"></script>
  <script type="text/javascript" src="{AJ_STATIC}file/script/common.js"></script>
  <script type="text/javascript" src="{AJ_STATIC}file/script/page.js"></script>
  <title>会员登录-{$AJ[sitename]}</title>
  <style type="text/css">
    .logo1 {
      margin-left: -20px;
      padding-bottom: 1970px;
    }
  </style>
</head>
<body>
  <div class="header cf">
    <h1>
      <a href="{$MODULE[1][linkurl]}" title="{$AJ[sitename]}">
        <img class="logo1" src="{if $MODULE[$moduleid][logo]}{AJ_SKIN}image/logo_{$moduleid}.gif{elseif $AJ[logo]}{$AJ[logo]}{else}{AJ_SKIN}images/logo.gif{/if}" alt="{$AJ[sitename]}"/>
        <span style="font-size:12px;">&nbsp;&nbsp;&nbsp;</span> {$AJ[sitename]}
      </a>
    </h1>
    <div class="menu">
      <a href="{$MODULE[1][linkurl]}" title="返回首页">返回首页</a>|
      <a href="{$MODULE[1][linkurl]}extend/shortcut.php" title="将{$AJ[sitename]}放至桌面快捷方式">保存至桌面</a>
    </div>
  </div>
  <div class="boyder">
    <div id="main">
      <div id="loginform" style="margin-top:24px;"><!-- 如果出现验证码把这里style删除 -->
      <!-- 怎么感觉这个写法是用overflow:hidden把验证码给隐藏了一下 -->
      <form method="post" action="login.php"  onsubmit="return Dcheck();">
        <input name="forward" type="hidden" id="forward" value="{$MODULE[1][linkurl]}">

        <!-- {$AJ[sitename]} 这个变量是在哪里定义的呢？ -->
        <!-- 21厂房网 -->
        <h2>使用{$AJ[sitename]}帐号登录</h2>

        <ul class="form">
          <li>
            <span>用户名：</span>
            <!-- input 内需要添加placeholder属性 -->
            <input name="username" id="username" value="" type="text">
            <!-- 这个s标签是什么 -->
            <s></s>
          </li>
          <li class="pt"></li>
          <li>
            <!-- 这个地方会不会添加太多的空格 -->
            <span>密&nbsp;&nbsp;&nbsp;&nbsp;码：</span>
            <input name="password" id="password"  value="" type="password">
            <s></s>
          </li>

          {if $MOD[captcha_login]}
          <li class="pt"></li>
          <span>验证码：</span>{template 'captchal', 'chip'}
          {/if}
          <li class="pt"></li>
          <li class="h">
            <input name="cookietime" class="c" value="2592000" id="cookietime"{if $MOD[login_remember]} checked{/if} type="checkbox">
            <label for="bind1" class="c" hidefocus="true">一个月内自动登录</label>
            <!-- <input type="checkbox" name="goto" value="1" class="c" checked="false" id="goto"{if $MOD[login_goto]} checked{/if}/><label class="c" for="goto">进入会员中心</label>-->
            <input type="checkbox" name="goto" value="1" class="c"  id="goto"/>
            <label class="c" for="goto">进入会员中心</label>
          </li>
          <li class="h">
            <!-- 这个登陆按钮的样式怎么是灰色的？ -->
            <input style="width:70px;" type="submit" name="submit" value="登 录" />
            &nbsp;
            <a href="{$AJ[file_register]}" title="免费注册">免费注册</a>
            |
            <a href="send.php" title="忘记密码">忘记密码</a>
            |
            <a href="https://open.weixin.qq.com/connect/qrconnect?appid=wxe217184e22d1b651&redirect_uri=http://www.21changfang.com/member/wechatlogin.php&response_type=code&scope=snsapi_login&state=1#wechat_redirect">微信登录</a>
          </li>
        </ul>
      </form>

      {if $oa}
      <div class="else">
        使用以下帐号登录：<br>
        {loop $OAUTH $k $v}
        	{if $v[enable]}
          <a href="{AJ_PATH}api/oauth/{$k}/connect.php" title="{$v[name]}">
          <img src="{AJ_PATH}api/oauth/{$k}/ico.png" alt="{$v[name]}"/></a>&nbsp;
          {/if}
        {/loop}</p>
      </div>
      {/if}
      </div>
    </div><!-- end-of-div#mian -->
  </div><!-- end-of-div#boyder -->

  <script type="text/javascript">
  if(Dd('username').value == '') {
  	Dd('username').focus();
  } else {
  	Dd('password').focus();
  }
  function Dcheck() {
  	if(Dd('username').value == '') {
  		confirm('请输入登录名称');
  		Dd('username').focus();
  		return false;
  	}
  	if(Dd('password').value == '') {
  		confirm('请输入密码');
  		Dd('password').focus();
  		return false;
  	}
  {if $MOD[captcha_login]}
  	if(!is_captcha(Dd('captcha').value)) {
  		confirm('请填写验证码');
  		Dd('captcha').focus();
  		return false;
  	}
  {/if}
  }
  </script>

  <script type="text/javascript">
    var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
    document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3F00e8be3af2c52f46e0ef05e1f6c944eb' type='text/javascript'%3E%3C/script%3E"));
  </script>

</body>
</html>
