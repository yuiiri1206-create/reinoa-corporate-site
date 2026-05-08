<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site-wrapper">

	<!-- Site Header -->
	<header id="masthead" class="site-header <?php echo is_front_page() ? 'is-transparent' : 'is-white'; ?>" role="banner">
		<div class="header-inner">

			<!-- Logo -->
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="site-logo" rel="home" aria-label="<?php bloginfo( 'name' ); ?> ホーム">
				<div class="site-logo__mark" aria-hidden="true">
					<span>R</span>
				</div>
				<div class="site-logo__text">
					<span class="site-logo__name">REINOA</span>
					<span class="site-logo__sub"><?php echo esc_html( reinoa_company( 'company_name' ) ); ?></span>
				</div>
			</a>

			<!-- Primary Navigation -->
			<nav id="site-navigation" class="site-nav" role="navigation" aria-label="<?php _e( 'メインナビゲーション', 'reinoa' ); ?>">
				<?php
				wp_nav_menu( array(
					'theme_location' => 'primary',
					'menu_class'     => 'site-nav__list',
					'container'      => false,
					'items_wrap'     => '<ul id="%1$s" class="%2$s" role="list">%3$s</ul>',
					'fallback_cb'    => 'reinoa_default_nav',
				) );
				?>
			</nav>

			<!-- Header CTA -->
			<div class="header-cta">
				<div class="header-tel">
					<span class="header-tel__label">お問い合わせ電話番号</span>
					<a href="tel:<?php echo esc_attr( preg_replace( '/[^0-9]/', '', reinoa_company( 'company_tel' ) ) ); ?>" class="header-tel__number">
						<?php echo esc_html( reinoa_company( 'company_tel' ) ); ?>
					</a>
				</div>
				<a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="btn btn--accent">
					<?php _e( 'お問い合わせ', 'reinoa' ); ?>
				</a>
			</div>

			<!-- Hamburger -->
			<button class="hamburger" id="hamburger-btn" aria-expanded="false" aria-controls="mobile-menu" aria-label="メニューを開く">
				<span class="hamburger__line"></span>
				<span class="hamburger__line"></span>
				<span class="hamburger__line"></span>
			</button>

		</div><!-- .header-inner -->
	</header><!-- #masthead -->

	<!-- Mobile Menu -->
	<div id="mobile-menu" class="mobile-menu" role="dialog" aria-modal="true" aria-label="モバイルメニュー" hidden>
		<button class="mobile-menu__close" id="mobile-menu-close" aria-label="メニューを閉じる"></button>
		<nav class="mobile-menu__nav" aria-label="モバイルナビゲーション">
			<?php
			wp_nav_menu( array(
				'theme_location' => 'primary',
				'menu_class'     => 'mobile-menu__list',
				'container'      => false,
				'items_wrap'     => '<ul class="%2$s" role="list">%3$s</ul>',
				'add_li_class'   => 'mobile-menu__item',
				'fallback_cb'    => 'reinoa_mobile_default_nav',
			) );
			?>
		</nav>
		<div class="mobile-menu__cta">
			<a href="tel:<?php echo esc_attr( preg_replace( '/[^0-9]/', '', reinoa_company( 'company_tel' ) ) ); ?>" style="display:block;color:#fff;font-size:22px;font-family:var(--font-en);margin-bottom:16px;">
				<?php echo esc_html( reinoa_company( 'company_tel' ) ); ?>
			</a>
			<a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="btn btn--accent" style="width:100%;justify-content:center;">
				<?php _e( 'お問い合わせ', 'reinoa' ); ?>
			</a>
		</div>
	</div><!-- #mobile-menu -->

	<div id="content" class="site-content">
<?php

function reinoa_default_nav() {
	$pages = array(
		'about'   => '会社概要',
		'service' => 'サービス',
		'news'    => 'ニュース',
		'contact' => 'お問い合わせ',
	);
	echo '<ul class="site-nav__list" role="list">';
	foreach ( $pages as $slug => $label ) {
		$url     = home_url( '/' . $slug );
		$current = trailingslashit( get_permalink() ) === trailingslashit( $url ) ? ' current-menu-item' : '';
		printf(
			'<li class="site-nav__item%s"><a href="%s">%s</a></li>',
			esc_attr( $current ),
			esc_url( $url ),
			esc_html( $label )
		);
	}
	echo '</ul>';
}

function reinoa_mobile_default_nav() {
	$pages = array(
		'/'       => 'ホーム',
		'about'   => '会社概要',
		'service' => 'サービス',
		'news'    => 'ニュース',
		'contact' => 'お問い合わせ',
	);
	echo '<ul class="mobile-menu__list" role="list">';
	foreach ( $pages as $slug => $label ) {
		$url = $slug === '/' ? home_url( '/' ) : home_url( '/' . $slug );
		printf(
			'<li class="mobile-menu__item"><a href="%s">%s</a></li>',
			esc_url( $url ),
			esc_html( $label )
		);
	}
	echo '</ul>';
}
