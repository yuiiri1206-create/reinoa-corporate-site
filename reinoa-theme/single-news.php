<?php get_header(); ?>

<main id="main" class="site-main" role="main">

	<?php while ( have_posts() ) : the_post(); ?>

		<div class="page-hero">
			<div class="container">
				<span class="page-hero__en">News &amp; Information</span>
				<h1 class="page-hero__title" style="font-size:clamp(16px,2.2vw,24px);max-width:800px;margin:0 auto;line-height:1.6;">
					<?php the_title(); ?>
				</h1>
			</div>
		</div>

		<?php reinoa_breadcrumb(); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class( 'post-content' ); ?>>
			<div class="container">

				<header class="post-header">
					<div class="post-header__meta">
						<time class="post-header__date" datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>">
							<?php echo get_the_date( 'Y.m.d' ); ?>
						</time>
						<?php
						$terms = get_the_terms( get_the_ID(), 'news_category' );
						if ( $terms && ! is_wp_error( $terms ) ) :
							foreach ( $terms as $term ) :
						?>
							<a href="<?php echo esc_url( get_term_link( $term ) ); ?>" class="post-header__category">
								<?php echo esc_html( $term->name ); ?>
							</a>
						<?php endforeach; endif; ?>
					</div>
					<h2 class="post-header__title"><?php the_title(); ?></h2>
				</header>

				<?php if ( has_post_thumbnail() ) : ?>
					<div style="margin-bottom:40px;">
						<?php the_post_thumbnail( 'reinoa-featured', array( 'style' => 'width:100%;height:auto;' ) ); ?>
					</div>
				<?php endif; ?>

				<div class="post-body">
					<?php the_content(); ?>
				</div>

				<nav class="post-navigation" style="display:flex;justify-content:space-between;gap:24px;padding:48px 0;border-top:1px solid var(--color-border);margin-top:48px;">
					<?php
					$prev_post = get_previous_post();
					$next_post = get_next_post();
					if ( $prev_post ) :
					?>
						<a href="<?php echo esc_url( get_permalink( $prev_post->ID ) ); ?>"
						   style="flex:1;color:var(--color-text-light);font-size:13px;line-height:1.6;">
							<span style="display:block;font-family:var(--font-en);font-size:11px;letter-spacing:0.2em;color:var(--color-text-muted);margin-bottom:6px;">← Prev</span>
							<?php echo esc_html( get_the_title( $prev_post->ID ) ); ?>
						</a>
					<?php else : ?>
						<div style="flex:1;"></div>
					<?php endif; ?>

					<a href="<?php echo esc_url( get_post_type_archive_link( 'news' ) ); ?>"
					   class="btn btn--outline" style="flex-shrink:0;font-size:12px;padding:12px 24px;">
						<?php _e( 'お知らせ一覧へ', 'reinoa' ); ?>
					</a>

					<?php if ( $next_post ) : ?>
						<a href="<?php echo esc_url( get_permalink( $next_post->ID ) ); ?>"
						   style="flex:1;text-align:right;color:var(--color-text-light);font-size:13px;line-height:1.6;">
							<span style="display:block;font-family:var(--font-en);font-size:11px;letter-spacing:0.2em;color:var(--color-text-muted);margin-bottom:6px;">Next →</span>
							<?php echo esc_html( get_the_title( $next_post->ID ) ); ?>
						</a>
					<?php else : ?>
						<div style="flex:1;"></div>
					<?php endif; ?>
				</nav>

			</div>
		</article>

	<?php endwhile; ?>

</main>

<?php get_footer(); ?>
