<?php get_header(); ?>

<main id="main" class="site-main" role="main">

	<div class="page-hero">
		<div class="container">
			<span class="page-hero__en">Search Results</span>
			<h1 class="page-hero__title">
				<?php
				printf(
					__( '「%s」の検索結果', 'reinoa' ),
					'<em>' . esc_html( get_search_query() ) . '</em>'
				);
				?>
			</h1>
		</div>
	</div>

	<?php reinoa_breadcrumb(); ?>

	<section class="section">
		<div class="container">

			<?php if ( have_posts() ) : ?>

				<p style="color:var(--color-text-muted);font-size:14px;margin-bottom:32px;">
					<?php printf( __( '%d件の検索結果', 'reinoa' ), $wp_query->found_posts ); ?>
				</p>

				<div class="news__list">
					<?php while ( have_posts() ) : the_post(); ?>
						<article id="post-<?php the_ID(); ?>" <?php post_class( 'news-item' ); ?>>
							<time class="news-item__date" datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>">
								<?php echo get_the_date( 'Y.m.d' ); ?>
							</time>
							<span class="news-item__category">
								<?php echo esc_html( get_post_type_object( get_post_type() )->labels->singular_name ?? '' ); ?>
							</span>
							<div style="flex:1;">
								<h2 class="news-item__title" style="margin-bottom:6px;">
									<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
								</h2>
								<p style="font-size:13px;color:var(--color-text-muted);margin:0;line-height:1.6;">
									<?php echo esc_html( wp_trim_words( get_the_excerpt(), 30, '…' ) ); ?>
								</p>
							</div>
						</article>
					<?php endwhile; ?>
				</div>

				<div class="pagination">
					<?php
					the_posts_pagination( array(
						'mid_size'  => 2,
						'prev_text' => '&laquo; 前へ',
						'next_text' => '次へ &raquo;',
					) );
					?>
				</div>

			<?php else : ?>

				<div style="text-align:center;padding:80px 0;">
					<p style="color:var(--color-text-light);margin-bottom:32px;">
						<?php printf( __( '「%s」に一致する記事が見つかりませんでした。', 'reinoa' ), esc_html( get_search_query() ) ); ?>
					</p>
					<?php get_search_form(); ?>
				</div>

			<?php endif; ?>

		</div>
	</section>

</main>

<?php get_footer(); ?>
