﻿<!DOCTYPE html>
<html dir="<?php echo $direction; ?>" lang="<?php echo $lang; ?>">
<head>
	<meta charset="UTF-8" />
	<title><?php echo $title; ?></title>
	<base href="<?php echo $base; ?>" />
	<?php if ($description) { ?>
	<meta name="description" content="<?php echo $description; ?>" />
	<?php } ?>
	<?php if ($keywords) { ?>
	<meta name="keywords" content="<?php echo $keywords; ?>" />
	<?php } ?>
	<?php if ($icon) { ?>
	<link href="<?php echo $icon; ?>" rel="icon" />
	<?php } ?>
	<?php foreach ($links as $link) { ?>
	<link href="<?php echo $link['href']; ?>" rel="<?php echo $link['rel']; ?>" />
	<?php } ?>
	<link rel="stylesheet" type="text/css" href="catalog/view/theme/nature/stylesheet/stylesheet.css" />
	<?php foreach ($styles as $style) { ?>
	<link rel="<?php echo $style['rel']; ?>" type="text/css" href="<?php echo $style['href']; ?>" media="<?php echo $style['media']; ?>" />
	<div>
	<?php } ?>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600&subset=cyrillic,latin' rel='stylesheet' type='text/css'>
	<script type="text/javascript" src="catalog/view/javascript/jquery/jquery-1.7.1.min.js"></script>
	<script type="text/javascript" src="catalog/view/javascript/jquery/ui/jquery-ui-1.8.16.custom.min.js"></script>
	<link rel="stylesheet" type="text/css" href="catalog/view/javascript/jquery/ui/themes/ui-lightness/jquery-ui-1.8.16.custom.css" />
	<script type="text/javascript" src="catalog/view/javascript/jquery/ui/external/jquery.cookie.js"></script>
	<script type="text/javascript" src="catalog/view/javascript/jquery/colorbox/jquery.colorbox.js"></script>
	<link rel="stylesheet" type="text/css" href="catalog/view/javascript/jquery/colorbox/colorbox.css" media="screen" />
	<script type="text/javascript" src="catalog/view/javascript/jquery/tabs.js"></script>
	<script type="text/javascript" src="catalog/view/javascript/common.js"></script>
	<?php foreach ($scripts as $script) { ?>
	<script type="text/javascript" src="<?php echo $script; ?>"></script>
	<?php } ?>
	<?php echo $google_analytics; ?>
</head>

<body>
	<div id="header">
	  <?php if ($logo) { ?>
	  <div id="logo"><a href="<?php echo $home; ?>"><img src="<?php echo $logo; ?>" title="<?php echo $name; ?>" alt="<?php echo $name; ?>" /></a></div>
	  <?php } ?>
	  <?php echo $language; ?>
	  <?php echo $currency; ?>
	  <?php echo $cart; ?>
	  <div id="welcome">
	    <?php if (!$logged) { ?>
	    <?php echo $text_welcome; ?>
	    <?php } else { ?>
	    <?php echo $text_logged; ?>
	    <?php } ?>
	  </div>
	  
	  <!--<div class="links"><a href="<?php echo $home; ?>"><?php echo $text_home; ?></a><a href="<?php echo $wishlist; ?>" id="wishlist-total"><?php echo $text_wishlist; ?></a><a href="<?php echo $account; ?>"><?php echo $text_account; ?></a><a href="<?php echo $shopping_cart; ?>"><?php echo $text_shopping_cart; ?></a><a href="<?php echo $checkout; ?>"><?php echo $text_checkout; ?></a></div>-->
	</div>
	
	<div id="menu">
		<div class="menu">
			<ul>
				<li><a href="/">Главная</a></li>
				<?php if ($categories) { ?>
					<?php foreach ($categories as $category) { ?>
					<li><a href="<?php echo $category['href']; ?>"><?php echo $category['name']; ?></a>
					<?php if ($category['children']) { ?>
					<div>
						<?php for ($i = 0; $i < count($category['children']);) { ?>
						<ul>
						<?php $j = $i + ceil(count($category['children']) / $category['column']); ?>
						<?php for (; $i < $j; $i++) { ?>
						<?php if (isset($category['children'][$i])) { ?>
						<li><a href="<?php echo $category['children'][$i]['href']; ?>"><?php echo $category['children'][$i]['name']; ?></a></li>
						<?php } ?>
						<?php } ?>
						</ul>
						<?php } ?>
					</div>
					<?php } ?>
					</li>
					<?php } ?>
				<?php } ?>
			</ul>
			<div id="search">
			  <input type="text" name="search" placeholder="<?php echo $text_search; ?>" value="<?php echo $search; ?>" />
			  <div class="button-search"></div>
			</div>
		</div>
	</div>
	
	<div id="container">
	
	<div id="notification"></div>
	<div id="mainsite">