<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="format-detection" content="telephone=no">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <!-- meta情報 -->
   <title></title>
  <meta name="description" content="" />
  <meta name="keywords" content="" />
  <!-- ogp -->
  <meta property="og:title" content="" />
  <meta property="og:type" content="" />
  <meta property="og:url" content="" />
  <meta property="og:image" content="" />
  <meta property="og:site_name" content="" />
  <meta property="og:description" content="" />
  <!-- ファビコン -->
  <link rel="”icon”" href="" />
  <!-- css -->
  <link rel="stylesheet" href="<?php echo get_stylesheet_uri();?>">
  <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.4.1/css/swiper.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;500;700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+JP&display=swap" rel="stylesheet">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>
  <header class="l-header p-header">
      <div class="p-header__inner">
        <div class="p-header__items">
          <div class="header-logo">
            <a href="http://xs020843.xsrv.jp/codeupsdemo/" class="c-logo">
              <p class="c-top_title">CodeUps</p>
            </a>
          </div>
          <div class="p-header__drawer c-hamburger u-mobile js-hamburger">
            <span></span>
            <span></span>
            <span></span>
          </div>
        </div>
        <div class="p-header__overlay js-overlay">
          <div class="p-header__menu p-drawer-menu js-drawer-menu">
          <ul class="p-drawer-menu__items">
            <li class="p-drawer-menu__item">
              <a class="p-drawer-menu__top" href="">トップ</a>
            </li>
            <li class="p-drawer-menu__item">
              <a href="http://xs020843.xsrv.jp/codeupsdemo/news/">お知らせ</a>
            </li>
            <li class="p-drawer-menu__item">
              <a href="http://xs020843.xsrv.jp/codeupsdemo/content/">事業内容</a>
            </li>
            <li class="p-drawer-menu__item">
              <a href="http://xs020843.xsrv.jp/codeupsdemo/work/">制作実績</a>
            </li>
            <li class="p-drawer-menu__item">
              <a href="http://xs020843.xsrv.jp/codeupsdemo/overview/">企業概要</a>
            </li>
            <li class="p-drawer-menu__item">
              <a href="http://xs020843.xsrv.jp/codeupsdemo/blogs/">ブログ</a>
            </li>
            <li class="p-drawer-menu__item">
              <a class="p-drawer-menu__contact" href="http://xs020843.xsrv.jp/codeupsdemo/contact/">お問い合わせ</a>
            </li>
          </ul>
            </div>
        </div>
      </div>
    </header>