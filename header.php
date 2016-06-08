<?php

@define('ISOFT_HEADER', 'isoft-header');

$redis = new Redis();
if (!$redis->connect('localhost', 6379)) {
    die('Could not connect to redis server');
}
$redis->setOption(Redis::OPT_SERIALIZER, Redis::SERIALIZER_PHP);
$redis->setOption(Redis::OPT_PREFIX, ISOFT_HEADER);

$po = array(
    'zh' => array(
        'Home' => '首页',
        'Bug Report' => '问题跟踪',
        'Forum' => '论坛',
    ),
);

$html = '
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>普华开源社区</title>
  <style>
    body { margin: 0; background-color: #ffffff; }

    img#logo { z-index: 101; position: absolute; top: 10px; }

    div#isoft-navbar { position: absolute; top: 85px; width: 100%; background: url("./images/navbar-bg.png") repeat-x; }
    div#isoft-navbar ul.topnav { margin: 0; padding: 0; text-align: center; }
    div#isoft-navbar ul.topnav li { display: inline; list-style: none; background: url("./images/navbar-token.png") no-repeat; }
    div#isoft-navbar ul.topnav li a:link,a:visited { display: inline-block; margin-right: -4px; width: 132px; font-size: 12px; font-weight: bold; color: #ffffff; background-color: url("./images/navbar-bg.png") repeat-x; text-align:center; padding: 11px; text-decoration: none; text-transform: uppercase; }
    div#isoft-navbar ul.topnav li a:hover,a:active { background: url("./images/navbar-bg-hover.png") repeat-x; }

    @media screen and (max-width:680px) {
      div#isoft-navbar ul.topnav { margin-left: 80px; text-align: left; }
      div#isoft-navbar ul.topnav li:first-child { display: none; }
      div#isoft-navbar ul.topnav li a:link,a:visited { width: 80px; }
    }
  </style>
  <script>
    function inIframe()
    {
        try {
            return window.self !== window.top;
        } catch (e) {
            return true;
        }
    }

    function resizeCb() 
    {
        var logo = document.getElementById("logo");
        if (document.body.clientWidth < 680) {
            logo.style.left = 10;
        } else {
            logo.style.left = (document.body.clientWidth - 3 * 132) / 2 - logo.clientWidth * 2 - 20;
        }

        if (!inIframe()) {
            window.location.href = "https://isoft-linux.org";
        }
    }
  </script>
</head>

<body onload="resizeCb()" onresize="resizeCb()">
  <a href="https://isoft-linux.org"><img id="logo" src="./images/logo.png" alt="logo"></a>
  <div id="isoft-navbar">
    <ul class="topnav">
      <li><a href="https://isoft-linux.org" ' . current_page_cb(isset($_GET['p']) ? $_GET['p'] == 'index' : true) . '>' . i18n('Home', $po) . '</a></li>
      <li><a href="https://bugs.isoft-linux.org" ' . current_page_cb(isset($_GET['p']) ? $_GET['p'] == 'bug' : false) . '>' . i18n('Bug Report', $po) . '</a></li>
      <li><a href="https://forum.isoft-linux.org" ' . current_page_cb(isset($_GET['p']) ? $_GET['p'] == 'forum' : false) . '>' . i18n('Forum', $po) . '</a></li>
      <!--<li><a href="#">维基百科</a></li>-->
      <!--<li><a href="https://isoft-linux.org/index.php/projects/">项目列表</a></li>-->
      <!--<li><a href="https://isoft-linux.org/index.php/aboutus/">关于我们</a></li>-->
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

function i18n($msgid, $po)
{
    $l = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
    if (array_key_exists($l, $po)) {
        return $po[$l][$msgid];
    }
    return $msgid;
}

if (empty($redis->get(ISOFT_HEADER))) {
    $redis->setex(ISOFT_HEADER, 2592000, $html);
}
echo $redis->get(ISOFT_HEADER);
$redis->flushDB();
$redis->close();

?>
