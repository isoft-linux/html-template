<?php

echo '
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>普华开源社区</title>
  <style>
    body { margin: 0; background-color: #ffffff; }

    div#isoft-header { width: 900px; margin: 0 auto; }
    div#isoft-header a { color: #9a9a9a; text-decoration: none; }
    div#isoft-header img#logo { padding: 20px 0 20px 0; }
    div#isoft-header div#contact { float: right; color: #9a9a9a; font-size: 9px; padding: 48px 15px 0 0; }
    div#isoft-header div#contact img { vertical-align: text-top; padding: 0 5px 0 53px; }

    div#isoft-navbar { width: 100%; background: url("./images/navbar-bg.png") repeat-x; }
    div#isoft-navbar ul.topnav { margin: 0; padding: 0; text-align: center; }
    div#isoft-navbar ul.topnav li { display: inline; list-style: none; background: url("./images/navbar-token.png") no-repeat; }
    div#isoft-navbar ul.topnav li a:link,a:visited { display: inline-block; margin-right: -4px; width: 132px; font-size: 12px; font-weight: bold; color: #ffffff; background-color: url("./images/navbar-bg.png") repeat-x; text-align:center; padding: 11px; text-decoration: none; text-transform: uppercase; }
    div#isoft-navbar ul.topnav li a:hover,a:active { background: url("./images/navbar-bg-hover.png") repeat-x; }

    @media screen and (max-width:680px) {
      div#isoft-header img { margin-left: 20px; }  
      div#isoft-navbar ul.topnav { text-align: left; }
      div#isoft-navbar ul.topnav li a:link,a:visited { width: 80px; }
    }
  </style>
</head>

<body>
  <div id="isoft-header">
    <img id="logo" src="./images/logo.png" height="87" alt="logo">
    <div id="contact">
      <img src="./images/tel.png" alt="Tel.">(010)-8406-5566
      <a href="mailto:xiang.zhai@i-soft.com.cn?Subject=Hello%20world" target="_top"><img src="./images/mail.png" alt="email">xiang.zhai@i-soft.com.cn</a>
    </div>
  </div>
  <div id="isoft-navbar">
    <ul class="topnav">
      <li><a href="https://isoft-linux.org" ' . current_page_cb(isset($_GET['p']) ? $_GET['p'] == 'index' : true) . '>首页</a></li>
      <li><a href="https://bugs.isoft-linux.org" ' . current_page_cb(isset($_GET['p']) ? $_GET['p'] == 'bug' : false) . '>缺陷管理</a></li>
      <li><a href="https://forum.isoft-linux.org" ' . current_page_cb(isset($_GET['p']) ? $_GET['p'] == 'forum' : false) . '>论坛</a></li>
      <li>&nbsp</li>
    </ul>
  </div>
  <base target="_parent" />
</body>
</html>
';

function current_page_cb($is_current_page) 
{
    if ($is_current_page) {
        return 'style="background-color: #f2472d;"';
    } else {
        return '';
    }
}

?>
