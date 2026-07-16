<?php get_header(); ?>

<main id="main" class="site-main" role="main">

	<div class="page-hero">
		<div class="container">
			<span class="page-hero__en">News &amp; Information</span>
			<h1 class="page-hero__title"><?php _e( 'お知らせ', 'reinoa' ); ?></h1>
		</div>
	</div>

	<?php reinoa_breadcrumb(); ?>

	<section class="section">
		<div class="container">

			<!-- Category Filter -->
			<?php
			$terms = get_terms( array( 'taxonomy' => 'news_category', 'hide_empty' => false ) );
			if ( ! is_wp_error( $terms ) && $terms ) :
				$current_term = get_queried_object();
			?>
				<nav aria-label="カテゴリーフィルター" style="display:flex;flex-wrap:wrap;gap:8px;margin-bottom:48px;padding-bottom:32px;border-bottom:1px solid var(--color-border);">
					<a href="<?php echo esc_url( get_post_type_archive_link( 'news' ) ); ?>"
					   class="news-filter-btn <?php echo ( ! is_tax() ) ? 'is-active' : ''; ?>"
					   style="display:inline-block;padding:8px 20px;border:1px solid var(--color-primary);font-size:12px;color:<?php echo ( ! is_tax() ) ? '#fff' : 'var(--color-primary)'; ?>;background:<?php echo ( ! is_tax() ) ? 'var(--color-primary)' : 'transparent'; ?>;letter-spacing:0.1em;transition:all 0.3s;text-decoration:none;">
						<?php _e( 'すべて', 'reinoa' ); ?>
					</a>
					<?php foreach ( $terms as $term ) :
						$is_current = ( is_tax() && $current_term instanceof WP_Term && $current_term->term_id === $term->term_id );
					?>
						<a href="<?php echo esc_url( get_term_link( $term ) ); ?>"
						   style="display:inline-block;padding:8px 20px;border:1px solid <?php echo $is_current ? 'var(--color-primary)' : 'var(--color-border)'; ?>;font-size:12px;color:<?php echo $is_current ? '#fff' : 'var(--color-text-light)'; ?>;background:<?php echo $is_current ? 'var(--color-primary)' : 'transparent'; ?>;letter-spacing:0.1em;transition:all 0.3s;text-decoration:none;">
							<?php echo esc_html( $term->name ); ?>
							<span style="font-family:var(--font-en);font-size:11px;opacity:0.6;">(<?php echo intval( $term->count ); ?>)</span>
						</a>
					<?php endforeach; ?>
				</nav>
			<?php endif; ?>

			<?php if ( have_posts() ) : ?>

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
					<p style="color:var(--color-text-light);"><?php _e( 'お知らせが見つかりませんでした。', 'reinoa' ); ?></p>
				</div>

			<?php endif; ?>

		</div>
	</section>

</main>

<?php get_footer(); ?>
