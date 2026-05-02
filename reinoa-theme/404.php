<?php get_header(); ?>

<main id="main" class="site-main" role="main">
	<div class="container">
		<div class="error-404">
			<p class="error-404__code" aria-hidden="true">404</p>
			<h1 class="error-404__title"><?php _e( 'ページが見つかりません', 'reinoa' ); ?></h1>
			<p class="error-404__text">
				<?php _e( 'お探しのページは存在しないか、移動または削除された可能性があります。', 'reinoa' ); ?><br>
				<?php _e( 'URLをご確認のうえ、もう一度お試しください。', 'reinoa' ); ?>
			</p>
			<div style="display:flex;justify-content:center;gap:16px;flex-wrap:wrap;">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn--primary">
					<?php _e( 'ホームへ戻る', 'reinoa' ); ?>
					<span class="btn__arrow" aria-hidden="true"></span>
				</a>
				<a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="btn btn--outline">
					<?php _e( 'お問い合わせ', 'reinoa' ); ?>
				</a>
			</div>
		</div>
	</div>
</main>

<?php get_footer(); ?>
