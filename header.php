<?php

echo '
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>普华开源社区</title>
  <style>
    body { margin: 0; background-color: #ffffff; }

    div#isoft-header { width: 900px; margin: 0 auto; }
    div#isoft-header div#contact { float: right; color: #9a9a9a; font-size: 9px; padding: 48px 15px 0 0; }
    div#isoft-header div#contact img { vertical-align: text-top; padding: 0 5px 0 53px; }

    div#isoft-navbar { width: 100%; background: url("./images/navbar-bg.png") repeat-x; }
    div#isoft-navbar ul.topnav { margin: 0; padding: 0; text-align: center; }
    div#isoft-navbar ul.topnav li { display: inline; list-style: none; background: url("./images/navbar-token.png") no-repeat; }
    div#isoft-navbar ul.topnav li a:link,a:visited { display: inline-block; margin-right: -4px; width: 132px; font-size: 12px; font-weight: bold; color: #ffffff; background-color: url("./images/navbar-bg.png") repeat-x; text-align:center; padding: 11px; text-decoration: none; text-transform: uppercase; }
    div#isoft-navbar ul.topnav li a:hover,a:active { background: url("./images/navbar-bg-hover.png") repeat-x; }

    div#isoft-navbar ul.topnav li.icon { display: none; }
    @media screen and (max-width:680px) {
      div#isoft-navbar ul.topnav li { background: none; }
      div#isoft-navbar ul.topnav li:not(:first-child) { display: none; }
      div#isoft-navbar ul.topnav li.icon { float: right; display: inline-block; }
    }
    @media screen and (max-width:680px) {
      div#isoft-navbar ul.topnav.responsive { position: relative; }
      div#isoft-navbar ul.topnav.responsive li.icon { position: absolute; right: 0; top: 0; }
      div#isoft-navbar ul.topnav.responsive li { float: none; display: inline; }
      div#isoft-navbar ul.topnav.responsive li a:link,a:visited { display: block; background: url("./images/navbar-bg.png") repeat-x; }
      div#isoft-navbar ul.topnav.responsive li a:hover,a:active { background: url("./images/navbar-bg-hover.png") repeat-x; }
    }
  </style>
  <script>
    function toggle() {
      document.getElementsByClassName("topnav")[0].classList.toggle("responsive");
    }
  </script>
</head>

<body>
  <div id="isoft-header">
    <img src="./images/isoft-logo.svg" alt="logo">
    <div id="contact">
      <img src="./images/tel.png" alt="Tel.">(010)-8406-5566
      <img src="./images/mail.png" alt="email">xiang.zhai@i-soft.com.cn
    </div>
  </div>
  <div id="isoft-navbar">
    <ul class="topnav">
      <li><a href="https://isoft-linux.org" ' . current_page_cb(isset($_GET['p']) ? $_GET['p'] == 'index' : true) . '>首页</a></li>
      <li><a href="https://bugs.isoft-linux.org" ' . current_page_cb(isset($_GET['p']) ? $_GET['p'] == 'bug' : false) . '>缺陷管理</a></li>
      <li><a href="https://forum.isoft-linux.org" ' . current_page_cb(isset($_GET['p']) ? $_GET['p'] == 'forum' : false) . '>论坛</a></li>
      <li class="icon">
        <a href="javascript:void(0);" onclick="toggle()">&#9776;</a>
      </li>
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
