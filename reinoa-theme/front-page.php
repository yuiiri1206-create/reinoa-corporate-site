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
			<span class="hero__en-title">Subsidy Application Support Service</span>
			<h1 class="hero__title">
				<?php echo esc_html( get_theme_mod( 'hero_title_line1', '補助金で' ) ); ?><br>
				<span><?php echo esc_html( get_theme_mod( 'hero_title_line2', '「攻めの投資」を加速' ) ); ?></span>
			</h1>
			<p class="hero__lead">
				<?php echo esc_html( get_theme_mod( 'hero_lead', '設備投資・新規事業・業務省力化をワンストップサポート。採択可能性診断から実績報告まで、補助金申請を一気通貫で伴走します。' ) ); ?>
			</p>
			<div class="hero__actions">
				<a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="btn btn--accent">
					無料相談・採択可能性診断
					<span class="btn__arrow" aria-hidden="true"></span>
				</a>
				<a href="<?php echo esc_url( home_url( '/service' ) ); ?>" class="btn btn--outline" style="border-color:rgba(255,255,255,0.5);color:#fff;">
					サービス詳細
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
	     Services Section
	     ============================================ -->
	<section id="services" class="services section" aria-labelledby="services-heading">
		<div class="container">
			<div class="section-header fade-in">
				<span class="section-header__en">Our Services</span>
				<h2 id="services-heading" class="section-header__title">サービス</h2>
				<p class="section-header__lead">
					採択可能性診断から実績報告まで、補助金申請のすべてのステップをワンストップでサポートします。
				</p>
			</div>

			<div class="services__grid">
				<?php
				$default_services = array(
					array(
						'num'   => '01',
						'title' => '採択可能性診断・制度選定',
						'text'  => '貴社の状況を分析し、最適な補助金の選定と要件整理、加点戦略を立案。申請前の段階で採択率を最大化するための土台を構築します。',
						'href'  => home_url( '/service' ),
					),
					array(
						'num'   => '02',
						'title' => '高精度な事業計画設計',
						'text'  => '市場・競合分析からKPI・CF設計まで、客観的な根拠データに基づく計画書を作成。審査員を納得させる説得力のある書類を仕上げます。',
						'href'  => home_url( '/service' ),
					),
					array(
						'num'   => '03',
						'title' => '申請〜実績報告までの一気通貫伴走',
						'text'  => '電子申請サポート、証憑テンプレート提供により、交付申請から効果報告まで完全サポート。採択後も安心して事業を進められます。',
						'href'  => home_url( '/service' ),
					),
				);
				$services_query = reinoa_get_service_posts();
				if ( $services_query->have_posts() ) :
					$count = 1;
					while ( $services_query->have_posts() ) : $services_query->the_post(); ?>
						<article class="service-card fade-in">
							<span class="service-card__number" aria-hidden="true"><?php printf( '%02d', $count ); ?></span>
							<h3 class="service-card__title"><?php the_title(); ?></h3>
							<p class="service-card__text"><?php echo esc_html( get_the_excerpt() ); ?></p>
							<a href="<?php the_permalink(); ?>" class="service-card__link">詳しく見る</a>
						</article>
					<?php $count++; endwhile; wp_reset_postdata();
				else :
					foreach ( $default_services as $svc ) : ?>
						<div class="service-card fade-in">
							<span class="service-card__number" aria-hidden="true"><?php echo esc_html( $svc['num'] ); ?></span>
							<h3 class="service-card__title"><?php echo esc_html( $svc['title'] ); ?></h3>
							<p class="service-card__text"><?php echo esc_html( $svc['text'] ); ?></p>
							<a href="<?php echo esc_url( $svc['href'] ); ?>" class="service-card__link">詳しく見る</a>
						</div>
					<?php endforeach;
				endif; ?>
			</div>
		</div>
	</section><!-- .services -->


	<!-- ============================================
	     Subsidy Menu Section
	     ============================================ -->
	<section id="subsidy-menu" class="section section--light" aria-labelledby="subsidy-heading">
		<div class="container">
			<div class="section-header fade-in">
				<span class="section-header__en">Subsidy Menu</span>
				<h2 id="subsidy-heading" class="section-header__title">対応補助金メニュー</h2>
				<p class="section-header__lead">幅広い補助金制度に対応。貴社の目的・規模に合った最適な制度を選定します。</p>
			</div>

			<div class="subsidy-grid fade-in">
				<?php
				$subsidies = array(
					array(
						'name'  => '中小企業新事業進出補助金',
						'max'   => '最大 9,000万円',
						'rate'  => '補助率 1/2〜2/3',
						'note'  => '新規事業・市場開拓',
					),
					array(
						'name'  => 'ものづくり補助金',
						'max'   => '最大 3,500万円',
						'rate'  => '補助率 1/2〜2/3',
						'note'  => '設備投資・生産性向上',
					),
					array(
						'name'  => '省力化投資補助金',
						'max'   => '最大 1億円',
						'rate'  => '補助率 1/2〜2/3',
						'note'  => '人手不足解消・省力化',
					),
					array(
						'name'  => '中小企業成長加速化補助金',
						'max'   => '最大 5億円',
						'rate'  => '補助率 1/2',
						'note'  => '大規模成長投資',
					),
					array(
						'name'  => '事業承継・M&A補助金',
						'max'   => '最大 2,000万円',
						'rate'  => '補助率 1/2〜2/3',
						'note'  => '事業承継・M&A費用',
					),
					array(
						'name'  => '海外展開関連（IPO360等）',
						'max'   => '最大 2,000万円',
						'rate'  => '補助率 1/2',
						'note'  => '海外販路・越境EC',
					),
				);
				foreach ( $subsidies as $sub ) : ?>
					<div style="background:#fff;padding:32px 28px;transition:box-shadow 0.3s;"
					     onmouseover="this.style.boxShadow='var(--shadow-hover)';"
					     onmouseout="this.style.boxShadow='';">
						<p style="font-size:11px;letter-spacing:0.1em;color:var(--color-accent);margin-bottom:8px;font-weight:600;"><?php echo esc_html( $sub['note'] ); ?></p>
						<h3 style="font-size:15px;color:var(--color-primary);font-family:var(--font-heading);font-weight:500;margin-bottom:16px;line-height:1.5;"><?php echo esc_html( $sub['name'] ); ?></h3>
						<p style="font-family:var(--font-en);font-size:22px;font-weight:600;color:var(--color-primary);line-height:1;margin-bottom:4px;"><?php echo esc_html( $sub['max'] ); ?></p>
						<p style="font-size:12px;color:var(--color-text-muted);margin:0;"><?php echo esc_html( $sub['rate'] ); ?></p>
					</div>
				<?php endforeach; ?>
			</div>

			<p style="text-align:center;font-size:12px;color:var(--color-text-muted);margin-top:20px;">
				※補助金の内容・要件は公募ごとに変更される場合があります。最新情報はお問い合わせください。
			</p>
		</div>
	</section>


	<!-- ============================================
	     Results Section
	     ============================================ -->
	<section id="results" class="section section--dark" aria-labelledby="results-heading">
		<div class="container">
			<div class="section-header fade-in">
				<span class="section-header__en">Case Studies</span>
				<h2 id="results-heading" class="section-header__title">支援実績（抜粋）</h2>
			</div>

		<div class="results-grid">
				<?php
				$cases = array(
					array(
						'industry' => 'ドローン計測・地質調査業',
						'program'  => '省力化投資補助金',
						'amount'   => '7,500,000円',
						'label'    => '交付決定額',
					),
					array(
						'industry' => '廃棄物処理業（AI×ロボティクス）',
						'program'  => '省力化投資補助金',
						'amount'   => '80,000,000円',
						'label'    => '交付決定額',
					),
					array(
						'industry' => 'アパレルブランド海外展開',
						'program'  => 'J-LOX+',
						'amount'   => '15,000,000円',
						'label'    => '交付決定額',
					),
				);
				foreach ( $cases as $case ) : ?>
					<div class="fade-in" style="border:1px solid var(--color-border);padding:36px 28px;background:#fff;border-radius:var(--radius);transition:box-shadow 0.3s;"
					     onmouseover="this.style.boxShadow='var(--shadow-hover)';"
					     onmouseout="this.style.boxShadow='';">
						<p style="font-size:11px;letter-spacing:0.1em;color:var(--color-accent);margin-bottom:12px;font-weight:600;text-transform:uppercase;">Adopted</p>
						<p style="font-size:14px;color:var(--color-text-light);margin-bottom:8px;line-height:1.6;"><?php echo esc_html( $case['industry'] ); ?></p>
						<p style="font-size:13px;color:var(--color-text-muted);margin-bottom:20px;padding-bottom:20px;border-bottom:1px solid var(--color-border);">
							<?php echo esc_html( $case['program'] ); ?>
						</p>
						<p style="font-size:11px;color:var(--color-text-muted);margin-bottom:4px;"><?php echo esc_html( $case['label'] ); ?></p>
						<p style="font-family:var(--font-en);font-size:28px;font-weight:600;color:var(--color-primary);line-height:1;margin:0;">
							<?php echo esc_html( $case['amount'] ); ?>
						</p>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>


	<!-- ============================================
	     Pricing Section
	     ============================================ -->
	<section id="pricing" class="section" aria-labelledby="pricing-heading">
		<div class="container">
			<div class="section-header fade-in">
				<span class="section-header__en">Pricing</span>
				<h2 id="pricing-heading" class="section-header__title">料金体系</h2>
				<p class="section-header__lead">成果報酬型を採用。採択されるまで初期費用を最小限に抑えられます。</p>
			</div>

			<div class="pricing-grid fade-in">
				<?php
				$steps = array(
					array(
						'step'  => 'STEP 1',
						'name'  => '相談・採択可能性診断',
						'price' => '0円',
						'note'  => '無料',
						'items' => array( '現状ヒアリング', '最適補助金の選定', '採択可能性の分析', '申請スケジュール策定' ),
					),
					array(
						'step'  => 'STEP 2',
						'name'  => '申請サポート費用',
						'price' => '110,000円',
						'note'  => '税込',
						'items' => array( '事業計画書作成', '申請書類一式作成', '電子申請サポート', '修正・追加対応' ),
					),
					array(
						'step'  => 'STEP 3',
						'name'  => '成功報酬',
						'price' => '交付決定額の10%',
						'note'  => '最低330,000円（税込）のいずれか高い方',
						'items' => array( '採択通知受領後', '交付申請サポート', '証憑テンプレート提供', '実績報告サポート' ),
						'highlight' => true,
					),
				);
				foreach ( $steps as $step ) : ?>
					<div style="background:<?php echo ( $step['highlight'] ?? false ) ? 'var(--color-primary)' : '#fff'; ?>;padding:40px 32px;position:relative;">
						<?php if ( $step['highlight'] ?? false ) : ?>
							<span style="position:absolute;top:-1px;left:50%;transform:translateX(-50%);background:var(--color-accent);color:#fff;font-size:11px;letter-spacing:0.1em;padding:4px 16px;white-space:nowrap;">採択後のみ発生</span>
						<?php endif; ?>
						<p style="font-family:var(--font-en);font-size:12px;letter-spacing:0.2em;color:<?php echo ( $step['highlight'] ?? false ) ? 'var(--color-accent)' : 'var(--color-accent)'; ?>;margin-bottom:10px;"><?php echo esc_html( $step['step'] ); ?></p>
						<h3 style="font-size:16px;color:<?php echo ( $step['highlight'] ?? false ) ? '#fff' : 'var(--color-primary)'; ?>;font-family:var(--font-heading);font-weight:500;margin-bottom:20px;line-height:1.5;"><?php echo esc_html( $step['name'] ); ?></h3>
						<p style="font-family:var(--font-en);font-size:26px;font-weight:700;color:<?php echo ( $step['highlight'] ?? false ) ? 'var(--color-accent)' : 'var(--color-primary)'; ?>;line-height:1.2;margin-bottom:4px;"><?php echo esc_html( $step['price'] ); ?></p>
						<p style="font-size:11px;color:<?php echo ( $step['highlight'] ?? false ) ? 'rgba(255,255,255,0.5)' : 'var(--color-text-muted)'; ?>;margin-bottom:24px;"><?php echo esc_html( $step['note'] ); ?></p>
						<ul style="list-style:none;padding:0;margin:0;border-top:1px solid <?php echo ( $step['highlight'] ?? false ) ? 'rgba(255,255,255,0.1)' : 'var(--color-border)'; ?>;padding-top:20px;display:flex;flex-direction:column;gap:10px;">
							<?php foreach ( $step['items'] as $item ) : ?>
								<li style="display:flex;align-items:center;gap:8px;font-size:13px;color:<?php echo ( $step['highlight'] ?? false ) ? 'rgba(255,255,255,0.75)' : 'var(--color-text-light)'; ?>;">
									<span style="width:16px;height:16px;border-radius:50%;background:<?php echo ( $step['highlight'] ?? false ) ? 'var(--color-accent)' : 'var(--color-primary)'; ?>;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
										<svg width="8" height="8" viewBox="0 0 10 8" fill="none"><path d="M1 4l3 3 5-6" stroke="#fff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
									</span>
									<?php echo esc_html( $item ); ?>
								</li>
							<?php endforeach; ?>
						</ul>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>


	<!-- ============================================
	     About Section
	     ============================================ -->
	<section id="about" class="about section section--light" aria-labelledby="about-heading">
		<div class="container">
			<div class="about__inner">
				<div class="about__image fade-in">
					<?php
					$about_img = get_theme_mod( 'about_image' );
					if ( $about_img ) :
						echo wp_get_attachment_image( $about_img, 'reinoa-featured', false, array( 'class' => 'about__image-main', 'alt' => '代表取締役 高尾郷介' ) );
					else : ?>
						<div class="about__image-main" style="background:linear-gradient(135deg,#1a2f5a 0%,#2a4a8a 100%);display:flex;align-items:center;justify-content:center;aspect-ratio:4/3;">
							<span style="font-family:var(--font-en);font-size:80px;color:rgba(200,169,110,0.3);font-weight:700;">R</span>
						</div>
					<?php endif; ?>
					<div class="about__image-deco" aria-hidden="true"></div>
					<div class="about__image-label">
						<span>設立</span>
						<strong>2024</strong>
					</div>
				</div>

				<div class="about__content fade-in">
					<span class="about__tag">About Us</span>
					<h2 id="about-heading" class="about__title">
						補助金支援の専門家が、<br>
						採択まで伴走します
					</h2>
					<p class="about__text">
						株式会社レイノアは、補助金申請支援に特化したプロフェッショナル集団です。代表の高尾郷介は京都大学大学院（バイオテクノロジー）修了後、ダウ・ケミカル日本、株式会社インダストリア、株式会社ライトアップにて補助金支援体制の立上げと事業拡大を牽引してきました。
					</p>
					<p class="about__text">
						2024年の設立以来、設備投資・新規事業・業務省力化を目指す中小企業・スタートアップの採択を多数支援。単なる書類作成代行ではなく、事業の成功に向けた「戦略的な申請支援」を提供します。
					</p>

					<div class="about__values">
						<div class="about__value-item fade-in">
							<p class="about__value-title">採択率向上</p>
							<p class="about__value-text">加点戦略の立案と根拠ある計画書で採択可能性を最大化します。</p>
						</div>
						<div class="about__value-item fade-in">
							<p class="about__value-title">ワンストップ</p>
							<p class="about__value-text">診断から実績報告まで、全ステップを一貫して支援します。</p>
						</div>
						<div class="about__value-item fade-in">
							<p class="about__value-title">成果報酬型</p>
							<p class="about__value-text">採択されなければ成功報酬は発生しません。リスクを最小化。</p>
						</div>
						<div class="about__value-item fade-in">
							<p class="about__value-title">専門知識</p>
							<p class="about__value-text">理系・ビジネス・補助金の三領域を横断する深い専門性。</p>
						</div>
					</div>

					<div style="margin-top:40px;display:flex;gap:16px;flex-wrap:wrap;">
						<a href="<?php echo esc_url( home_url( '/about' ) ); ?>" class="btn btn--primary">
							会社概要
							<span class="btn__arrow" aria-hidden="true"></span>
						</a>
						<a href="<?php echo esc_url( home_url( '/profile' ) ); ?>" class="btn btn--outline">
							代表プロフィール
							<span class="btn__arrow" aria-hidden="true"></span>
						</a>
					</div>
				</div>
			</div>
		</div>
	</section><!-- .about -->


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
						すべて見る →
					</a>
				</div>

				<div class="news__content fade-in">
					<?php
					$news_query = reinoa_get_news_posts( 5 );
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
						<div class="news__list">
							<?php
							$sample_news = array(
								array( 'date' => '2026.04.15', 'cat' => 'お知らせ', 'title' => '省力化投資補助金の2026年度公募開始のご案内' ),
								array( 'date' => '2026.03.10', 'cat' => '採択実績', 'title' => '廃棄物処理業（AI×ロボティクス）で省力化投資補助金 8,000万円採択' ),
								array( 'date' => '2026.02.20', 'cat' => 'お知らせ', 'title' => 'ものづくり補助金 第20次公募の採択結果について' ),
								array( 'date' => '2026.01.30', 'cat' => 'メディア掲載', 'title' => '補助金活用セミナー登壇のご報告（東京商工会議所）' ),
								array( 'date' => '2024.09.01', 'cat' => 'お知らせ', 'title' => '株式会社レイノア設立のお知らせ' ),
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
	     Contact CTA Section
	     ============================================ -->
	<section id="contact" class="contact-banner" aria-labelledby="contact-cta-heading">
		<div class="contact-banner__deco" aria-hidden="true"></div>
		<div class="contact-banner__deco" aria-hidden="true"></div>
		<div class="container" style="position:relative;z-index:1;">
			<span class="contact-banner__en">Free Consultation</span>
			<h2 id="contact-cta-heading" class="contact-banner__title">
				まずは無料相談・<br>採択可能性診断から
			</h2>
			<p class="contact-banner__text">
				「どの補助金が使えるか分からない」「申請書類の書き方が分からない」など、<br>
				補助金に関するお悩みはお気軽にご相談ください。
			</p>
			<div class="contact-banner__actions">
				<a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="btn btn--accent">
					無料相談・採択可能性診断
					<span class="btn__arrow" aria-hidden="true"></span>
				</a>
				<a href="mailto:<?php echo esc_attr( reinoa_company( 'company_email' ) ); ?>" class="btn btn--white">
					<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
					<?php echo esc_html( reinoa_company( 'company_email' ) ); ?>
				</a>
			</div>
		</div>
	</section><!-- .contact-banner -->

</main><!-- #main -->

<?php get_footer(); ?>
