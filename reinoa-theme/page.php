<?php get_header(); ?>

<main id="main" class="site-main" role="main">

	<?php while ( have_posts() ) : the_post(); ?>

		<?php
		$hide_hero = get_post_meta( get_the_ID(), '_hide_page_hero', true );
		$hero_en   = get_post_meta( get_the_ID(), '_hero_en_title', true );
		?>

		<?php if ( ! $hide_hero ) : ?>
		<div class="page-hero">
			<div class="container">
				<?php if ( $hero_en ) : ?>
					<span class="page-hero__en"><?php echo esc_html( $hero_en ); ?></span>
				<?php endif; ?>
				<h1 class="page-hero__title"><?php the_title(); ?></h1>
			</div>
		</div>
		<?php endif; ?>

		<?php reinoa_breadcrumb(); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class( 'post-content' ); ?>>
			<div class="container">
				<div class="post-body">
					<?php the_content(); ?>
				</div>
			</div>
		</article>

	<?php endwhile; ?>

</main>

<?php get_footer(); ?>
