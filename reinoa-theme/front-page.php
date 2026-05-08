<?php get_header(); ?>

<main id="main" class="site-main" role="main">

	<!-- ============================================
	     Hero Section
	     ============================================ -->
	<section class="hero" aria-label="メインビジュアル">
		<div class="hero__bg">
			<?php
			$hero_image_id = get_theme_mod( 'hero_image' );
			if ( $hero_image_id ) :
				$hero_url = wp_get_attachment_image_url( $hero_image_id, 'reinoa-hero' );
			?>
				<div class="hero__bg-image" style="background-image:url('<?php echo esc_url( $hero_url ); ?>');" role="img" aria-hidden="true"></div>
			<?php endif; ?>
			<div class="hero__overlay" aria-hidden="true"></div>
		</div>
		<div class="hero__deco" aria-hidden="true">
			<div class="hero__deco-line"></div>
			<div class="hero__deco-line"></div>
			<div class="hero__deco-line"></div>
		</div>

		<div class="hero__content">
			<span class="hero__en-title">Shaping the Future, Together</span>
			<h1 class="hero__title">
				<?php echo esc_html( get_theme_mod( 'hero_title_line1', '未来を創る、' ) ); ?><br>
				<span><?php echo esc_html( get_theme_mod( 'hero_title_line2', 'ともに歩む。' ) ); ?></span>
			</h1>
			<p class="hero__lead">
				<?php echo esc_html( get_theme_mod( 'hero_lead', '株式会社レイノアは、革新的なソリューションと真摯なパートナーシップで、お客様のビジネスの成長と発展に貢献します。' ) ); ?>
			</p>
			<div class="hero__actions">
				<a href="<?php echo esc_url( home_url( '/about' ) ); ?>" class="btn btn--white">
					<?php _e( '会社について', 'reinoa' ); ?>
					<span class="btn__arrow" aria-hidden="true"></span>
				</a>
				<a href="<?php echo esc_url( home_url( '/service' ) ); ?>" class="btn btn--outline" style="border-color:rgba(255,255,255,0.5);color:#fff;">
					<?php _e( 'サービス一覧', 'reinoa' ); ?>
					<span class="btn__arrow" aria-hidden="true"></span>
				</a>
			</div>
		</div>

		<div class="hero__scroll" aria-hidden="true">
			<div class="hero__scroll-line"></div>
			<span>Scroll</span>
		</div>
	</section><!-- .hero -->


	<!-- ============================================
	     About Section
	     ============================================ -->
	<section class="about section" aria-labelledby="about-heading">
		<div class="container">
			<div class="about__inner">
				<div class="about__image fade-in">
					<?php
					$about_img = get_theme_mod( 'about_image' );
					if ( $about_img ) :
						echo wp_get_attachment_image( $about_img, 'reinoa-featured', false, array( 'class' => 'about__image-main', 'alt' => '会社について' ) );
					else : ?>
						<div class="about__image-main" style="background:linear-gradient(135deg,#1a2f5a 0%,#2a4a8a 100%);display:flex;align-items:center;justify-content:center;">
							<span style="font-family:var(--font-en);font-size:80px;color:rgba(200,169,110,0.3);font-weight:700;">R</span>
						</div>
					<?php endif; ?>
					<div class="about__image-deco" aria-hidden="true"></div>
					<div class="about__image-label">
						<span><?php _e( '設立', 'reinoa' ); ?></span>
						<strong>2010</strong>
					</div>
				</div>

				<div class="about__content fade-in">
					<span class="about__tag">About Us</span>
					<h2 id="about-heading" class="about__title">
						お客様とともに、<br>
						最高の価値を創造する
					</h2>
					<p class="about__text">
						株式会社レイノアは、2010年の創業以来、お客様のビジネス課題を深く理解し、最適なソリューションを提供し続けてきました。テクノロジーと人間の力を融合させ、持続可能な成長を支援します。
					</p>
					<p class="about__text">
						私たちは単なるサービス提供者ではなく、お客様の真のビジネスパートナーとして、長期的な信頼関係の構築を大切にしています。
					</p>

					<div class="about__values">
						<div class="about__value-item fade-in">
							<p class="about__value-title">Innovation</p>
							<p class="about__value-text">常に革新を追求し、時代を先取りするソリューションを提供します。</p>
						</div>
						<div class="about__value-item fade-in">
							<p class="about__value-title">Integrity</p>
							<p class="about__value-text">誠実さと透明性を持ってすべての取引に臨みます。</p>
						</div>
						<div class="about__value-item fade-in">
							<p class="about__value-title">Partnership</p>
							<p class="about__value-text">お客様と真のパートナーとして共に歩みます。</p>
						</div>
						<div class="about__value-item fade-in">
							<p class="about__value-title">Excellence</p>
							<p class="about__value-text">卓越した品質と成果を追い続けます。</p>
						</div>
					</div>

					<div style="margin-top:40px;">
						<a href="<?php echo esc_url( home_url( '/about' ) ); ?>" class="btn btn--primary">
							<?php _e( '詳しく見る', 'reinoa' ); ?>
							<span class="btn__arrow" aria-hidden="true"></span>
						</a>
					</div>
				</div>
			</div>
		</div>
	</section><!-- .about -->


	<!-- ============================================
	     Services Section
	     ============================================ -->
	<section class="services section section--light" aria-labelledby="services-heading">
		<div class="container">
			<div class="section-header fade-in">
				<span class="section-header__en">Our Services</span>
				<h2 id="services-heading" class="section-header__title">サービス</h2>
				<p class="section-header__lead">
					レイノアは、お客様のビジネス課題に合わせた多様なサービスを提供しています。
				</p>
			</div>

			<?php
			$services_query = reinoa_get_service_posts();
			if ( $services_query->have_posts() ) :
			?>
				<div class="services__grid">
					<?php
					$count = 1;
					while ( $services_query->have_posts() ) : $services_query->the_post();
					?>
					<article class="service-card fade-in" style="--delay:<?php echo ( $count * 0.1 ); ?>s;">
						<span class="service-card__number" aria-hidden="true"><?php printf( '%02d', $count ); ?></span>
						<h3 class="service-card__title"><?php the_title(); ?></h3>
						<p class="service-card__text"><?php echo esc_html( get_the_excerpt() ); ?></p>
						<a href="<?php the_permalink(); ?>" class="service-card__link">
							<?php _e( '詳しく見る', 'reinoa' ); ?>
						</a>
					</article>
					<?php $count++; endwhile; wp_reset_postdata(); ?>
				</div>
			<?php else : ?>
				<!-- Default services if none registered -->
				<div class="services__grid">
					<?php
					$default_services = array(
						array(
							'title' => 'コンサルティング',
							'text'  => 'お客様のビジネス課題を多角的に分析し、最適な戦略立案から実行支援まで一貫してサポートします。',
						),
						array(
							'title' => 'システム開発',
							'text'  => '最新技術を活用したスケーラブルなシステムの設計・開発・運用を行います。お客様の業務効率化を実現します。',
						),
						array(
							'title' => 'デジタルマーケティング',
							'text'  => 'データドリブンなアプローチで、効果的なデジタルマーケティング戦略を策定・実行します。',
						),
						array(
							'title' => 'クラウドソリューション',
							'text'  => 'AWS・Azure・GCPを活用したクラウド移行、最適化、運用管理を包括的にサポートします。',
						),
						array(
							'title' => 'セキュリティ対策',
							'text'  => '最新の脅威に対応したセキュリティ診断、対策立案、インシデント対応支援を提供します。',
						),
						array(
							'title' => '人材育成・研修',
							'text'  => 'ITリテラシー向上から専門スキル習得まで、ビジネスに必要な人材育成プログラムを提供します。',
						),
					);
					foreach ( $default_services as $i => $service ) : ?>
					<div class="service-card fade-in">
						<span class="service-card__number" aria-hidden="true"><?php printf( '%02d', $i + 1 ); ?></span>
						<h3 class="service-card__title"><?php echo esc_html( $service['title'] ); ?></h3>
						<p class="service-card__text"><?php echo esc_html( $service['text'] ); ?></p>
						<a href="<?php echo esc_url( home_url( '/service' ) ); ?>" class="service-card__link">
							<?php _e( '詳しく見る', 'reinoa' ); ?>
						</a>
					</div>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>

			<div class="text-center mt-60 fade-in">
				<a href="<?php echo esc_url( home_url( '/service' ) ); ?>" class="btn btn--primary">
					<?php _e( 'すべてのサービスを見る', 'reinoa' ); ?>
					<span class="btn__arrow" aria-hidden="true"></span>
				</a>
			</div>
		</div>
	</section><!-- .services -->


	<!-- ============================================
	     News Section
	     ============================================ -->
	<section class="news section" aria-labelledby="news-heading">
		<div class="container">
			<div class="news__inner">
				<div class="news__header section-header fade-in">
					<span class="section-header__en">News &amp; Topics</span>
					<h2 id="news-heading" class="section-header__title">ニュース</h2>
					<a href="<?php echo esc_url( home_url( '/news' ) ); ?>" class="news__all-link">
						<?php _e( 'すべて見る', 'reinoa' ); ?> →
					</a>
				</div>

				<div class="news__content fade-in">
					<?php
					$news_query = reinoa_get_news_posts( 6 );
					if ( $news_query->have_posts() ) :
					?>
						<div class="news__list">
							<?php while ( $news_query->have_posts() ) : $news_query->the_post(); ?>
								<article class="news-item">
									<time class="news-item__date" datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>">
										<?php echo get_the_date( 'Y.m.d' ); ?>
									</time>
									<span class="news-item__category">
										<?php echo esc_html( reinoa_get_news_category( get_the_ID() ) ); ?>
									</span>
									<h3 class="news-item__title">
										<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
									</h3>
								</article>
							<?php endwhile; wp_reset_postdata(); ?>
						</div>
					<?php else : ?>
						<!-- Placeholder news items -->
						<div class="news__list">
							<?php
							$sample_news = array(
								array( 'date' => '2026.04.15', 'cat' => 'お知らせ', 'title' => '新サービス「クラウドDX支援パッケージ」の提供開始について' ),
								array( 'date' => '2026.03.28', 'cat' => 'プレスリリース', 'title' => '株式会社○○との業務提携に関するお知らせ' ),
								array( 'date' => '2026.03.10', 'cat' => '採用情報', 'title' => '2027年度新卒採用エントリー受付開始のご案内' ),
								array( 'date' => '2026.02.22', 'cat' => 'お知らせ', 'title' => '春季休業のご案内（2026年3月20日〜3月22日）' ),
								array( 'date' => '2026.01.15', 'cat' => 'メディア掲載', 'title' => '日経ビジネスオンラインに代表インタビュー記事が掲載されました' ),
							);
							foreach ( $sample_news as $item ) : ?>
								<article class="news-item">
									<time class="news-item__date"><?php echo esc_html( $item['date'] ); ?></time>
									<span class="news-item__category"><?php echo esc_html( $item['cat'] ); ?></span>
									<h3 class="news-item__title">
										<a href="<?php echo esc_url( home_url( '/news' ) ); ?>"><?php echo esc_html( $item['title'] ); ?></a>
									</h3>
								</article>
							<?php endforeach; ?>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</section><!-- .news -->


	<!-- ============================================
	     Stats Section
	     ============================================ -->
	<section class="section section--dark" aria-label="実績数字">
		<div class="container">
			<div style="display:grid;grid-template-columns:repeat(4,1fr);gap:2px;background:rgba(255,255,255,0.05);">
				<?php
				$stats = array(
					array( 'number' => '500+', 'label' => '導入企業数', 'en' => 'Clients' ),
					array( 'number' => '15',   'label' => '年間の実績', 'en' => 'Years' ),
					array( 'number' => '98%',  'label' => '顧客満足度', 'en' => 'Satisfaction' ),
					array( 'number' => '200+', 'label' => '専門スタッフ', 'en' => 'Staff' ),
				);
				foreach ( $stats as $stat ) : ?>
				<div class="fade-in" style="text-align:center;padding:60px 24px;background:rgba(255,255,255,0.02);">
					<p style="font-family:var(--font-en);font-size:clamp(40px,5vw,64px);font-weight:600;color:var(--color-accent);line-height:1;margin-bottom:8px;">
						<?php echo esc_html( $stat['number'] ); ?>
					</p>
					<p style="font-size:14px;color:#fff;margin-bottom:4px;letter-spacing:0.1em;"><?php echo esc_html( $stat['label'] ); ?></p>
					<p style="font-family:var(--font-en);font-size:11px;color:rgba(255,255,255,0.4);letter-spacing:0.2em;text-transform:uppercase;margin:0;"><?php echo esc_html( $stat['en'] ); ?></p>
				</div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>


	<!-- ============================================
	     Contact CTA Section
	     ============================================ -->
	<section class="contact-banner" aria-labelledby="contact-heading">
		<div class="contact-banner__deco" aria-hidden="true"></div>
		<div class="contact-banner__deco" aria-hidden="true"></div>
		<div class="container" style="position:relative;z-index:1;">
			<span class="contact-banner__en">Contact Us</span>
			<h2 id="contact-heading" class="contact-banner__title">
				お気軽にご相談ください
			</h2>
			<p class="contact-banner__text">
				ビジネスに関するご質問・ご相談は、お電話またはメールフォームからお気軽にお問い合わせください。<br>
				担当者より迅速にご連絡いたします。
			</p>
			<div class="contact-banner__actions">
				<a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="btn btn--accent">
					<?php _e( 'メールでお問い合わせ', 'reinoa' ); ?>
					<span class="btn__arrow" aria-hidden="true"></span>
				</a>
				<a href="tel:<?php echo esc_attr( preg_replace( '/[^0-9]/', '', reinoa_company( 'company_tel' ) ) ); ?>" class="btn btn--white">
					<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 013.5 9.72a19.79 19.79 0 01-3.07-8.67A2 2 0 012.4 1h3a2 2 0 012 1.72 12.8 12.8 0 00.7 2.81 2 2 0 01-.45 2.11L6.75 8.09A16 16 0 0015 16.29l.91-.91a2 2 0 012.11-.45 12.8 12.8 0 002.81.7A2 2 0 0122 16.92z"/></svg>
					<?php echo esc_html( reinoa_company( 'company_tel' ) ); ?>
				</a>
			</div>
		</div>
	</section><!-- .contact-banner -->

</main><!-- #main -->

<?php get_footer(); ?>
