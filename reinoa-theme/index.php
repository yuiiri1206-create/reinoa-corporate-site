<?php get_header(); ?>

<main id="main" class="site-main" role="main">

	<!-- Archive / Blog list fallback -->
	<?php reinoa_breadcrumb(); ?>

	<section class="section">
		<div class="container">
			<?php if ( have_posts() ) : ?>

				<div class="section-header">
					<span class="section-header__en">News &amp; Information</span>
					<h1 class="section-header__title"><?php _e( 'ニュース', 'reinoa' ); ?></h1>
				</div>

				<div class="news-archive">
					<div class="news__list">
						<?php while ( have_posts() ) : the_post(); ?>
							<article id="post-<?php the_ID(); ?>" <?php post_class( 'news-item' ); ?>>
								<time class="news-item__date" datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>">
									<?php echo get_the_date( 'Y.m.d' ); ?>
								</time>
								<span class="news-item__category">
									<?php echo esc_html( reinoa_get_news_category( get_the_ID() ) ); ?>
								</span>
								<h2 class="news-item__title">
									<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
								</h2>
							</article>
						<?php endwhile; ?>
					</div>
				</div>

				<div class="pagination">
					<?php
					the_posts_pagination( array(
						'mid_size'  => 2,
						'prev_text' => '&laquo;',
						'next_text' => '&raquo;',
					) );
					?>
				</div>

			<?php else : ?>

				<div class="content-none" style="text-align:center;padding:80px 0;">
					<h1 class="section-header__title"><?php _e( '記事が見つかりません', 'reinoa' ); ?></h1>
					<p style="color:var(--color-text-light);margin-top:24px;"><?php _e( 'お探しのコンテンツは見つかりませんでした。', 'reinoa' ); ?></p>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn--primary" style="margin-top:32px;display:inline-flex;">
						<?php _e( 'ホームへ戻る', 'reinoa' ); ?>
						<span class="btn__arrow" aria-hidden="true"></span>
					</a>
				</div>

			<?php endif; ?>
		</div>
	</section>

</main>

<?php get_footer(); ?>
