	</div><!-- #content -->

	<!-- Site Footer -->
	<footer id="colophon" class="site-footer" role="contentinfo">

		<div class="footer-main">
			<div class="container">
				<div class="footer-inner">

					<!-- Brand Column -->
					<div class="footer-brand">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="footer-logo" rel="home">
							<div class="footer-logo__mark" aria-hidden="true">
								<span>R</span>
							</div>
							<span class="footer-logo__name">RAYNOA</span>
						</a>

						<p class="footer-address" style="font-size:13px;color:rgba(255,255,255,0.55);line-height:2;margin-bottom:16px;">
							補助金申請支援サービス<br>
							設備投資・新規事業・業務省力化を<br>
							ワンストップでサポートします。
						</p>

						<a href="mailto:<?php echo esc_attr( reinoa_company( 'company_email' ) ); ?>" class="footer-tel" style="font-size:14px;word-break:break-all;">
							<?php echo esc_html( reinoa_company( 'company_email' ) ); ?>
						</a>

						<!-- SNS Links -->
						<?php
						$sns_links = array(
							'sns_twitter'   => array( 'label' => 'Twitter / X', 'icon' => 'X' ),
							'sns_facebook'  => array( 'label' => 'Facebook', 'icon' => 'f' ),
							'sns_instagram' => array( 'label' => 'Instagram', 'icon' => 'ig' ),
							'sns_linkedin'  => array( 'label' => 'LinkedIn', 'icon' => 'in' ),
						);
						$has_sns = false;
						foreach ( $sns_links as $key => $data ) {
							if ( get_theme_mod( $key ) ) { $has_sns = true; break; }
						}
						if ( $has_sns ) : ?>
						<div class="footer-sns" style="display:flex;gap:12px;margin-top:24px;">
							<?php foreach ( $sns_links as $key => $data ) :
								$url = get_theme_mod( $key );
								if ( ! $url ) continue; ?>
								<a href="<?php echo esc_url( $url ); ?>" target="_blank" rel="noopener noreferrer"
								   aria-label="<?php echo esc_attr( $data['label'] ); ?>"
								   style="width:36px;height:36px;border:1px solid rgba(255,255,255,0.2);display:flex;align-items:center;justify-content:center;color:rgba(255,255,255,0.6);font-size:11px;font-weight:700;transition:all 0.3s;text-decoration:none;"
								   onmouseover="this.style.borderColor='#c8a96e';this.style.color='#c8a96e';"
								   onmouseout="this.style.borderColor='rgba(255,255,255,0.2)';this.style.color='rgba(255,255,255,0.6)';">
									<?php echo esc_html( $data['icon'] ); ?>
								</a>
							<?php endforeach; ?>
						</div>
						<?php endif; ?>
					</div><!-- .footer-brand -->

					<!-- Navigation Columns -->
					<div class="footer-nav">
						<div class="footer-nav__col">
							<h3 class="footer-nav__heading"><?php _e( 'サービス', 'reinoa' ); ?></h3>
							<?php
							wp_nav_menu( array(
								'theme_location' => 'footer',
								'menu_class'     => 'footer-nav__list',
								'container'      => false,
								'fallback_cb'    => 'reinoa_footer_nav_1_fallback',
								'depth'          => 1,
							) );
							?>
						</div>
						<div class="footer-nav__col">
							<h3 class="footer-nav__heading"><?php _e( '会社情報', 'reinoa' ); ?></h3>
							<?php
							wp_nav_menu( array(
								'theme_location' => 'footer-2',
								'menu_class'     => 'footer-nav__list',
								'container'      => false,
								'fallback_cb'    => 'reinoa_footer_nav_2_fallback',
								'depth'          => 1,
							) );
							?>
						</div>
						<div class="footer-nav__col">
							<h3 class="footer-nav__heading"><?php _e( 'ポリシー', 'reinoa' ); ?></h3>
							<?php
							wp_nav_menu( array(
								'theme_location' => 'footer-3',
								'menu_class'     => 'footer-nav__list',
								'container'      => false,
								'fallback_cb'    => 'reinoa_footer_nav_3_fallback',
								'depth'          => 1,
							) );
							?>
						</div>
					</div><!-- .footer-nav -->

				</div><!-- .footer-inner -->
			</div><!-- .container -->
		</div><!-- .footer-main -->

		<!-- Footer Bottom -->
		<div class="footer-bottom">
			<div class="container">
				<div class="footer-bottom-inner">
					<p class="footer-copy">
						<small>&copy; <?php echo date( 'Y' ); ?> <?php echo esc_html( reinoa_company( 'company_name' ) ); ?>. All Rights Reserved.</small>
					</p>
					<nav class="footer-policy" aria-label="ポリシーナビゲーション">
						<a href="<?php echo esc_url( home_url( '/privacy-policy' ) ); ?>"><?php _e( 'プライバシーポリシー', 'reinoa' ); ?></a>
						<a href="<?php echo esc_url( home_url( '/sitemap' ) ); ?>"><?php _e( 'サイトマップ', 'reinoa' ); ?></a>
					</nav>
				</div>
			</div>
		</div><!-- .footer-bottom -->

	</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>

<?php
function reinoa_footer_nav_1_fallback() {
	$items = array(
		'service' => 'サービス',
		'subsidy' => '補助金メニュー',
		'results' => '支援実績',
		'pricing' => '料金',
	);
	echo '<ul class="footer-nav__list">';
	foreach ( $items as $slug => $label ) {
		printf( '<li><a href="%s">%s</a></li>', esc_url( home_url( '/' . $slug ) ), esc_html( $label ) );
	}
	echo '</ul>';
}

function reinoa_footer_nav_2_fallback() {
	$items = array(
		'about'   => '会社概要',
		'profile' => '代表プロフィール',
		'contact' => 'お問い合わせ',
	);
	echo '<ul class="footer-nav__list">';
	foreach ( $items as $slug => $label ) {
		printf( '<li><a href="%s">%s</a></li>', esc_url( home_url( '/' . $slug ) ), esc_html( $label ) );
	}
	echo '</ul>';
}

function reinoa_footer_nav_3_fallback() {
	$items = array(
		'privacy-policy' => 'プライバシーポリシー',
	);
	echo '<ul class="footer-nav__list">';
	foreach ( $items as $slug => $label ) {
		printf( '<li><a href="%s">%s</a></li>', esc_url( home_url( '/' . $slug ) ), esc_html( $label ) );
	}
	echo '</ul>';
}
