<?php
/*
 * Template Name: 会社概要ページ
 */
get_header();
?>

<main id="main" class="site-main" role="main">

	<div class="page-hero">
		<div class="container">
			<span class="page-hero__en">About Us</span>
			<h1 class="page-hero__title">会社概要</h1>
		</div>
	</div>

	<?php reinoa_breadcrumb(); ?>

	<!-- Mission -->
	<section class="section">
		<div class="container">
			<div style="max-width:800px;margin:0 auto;text-align:center;">
				<span style="display:block;font-family:var(--font-en);font-size:13px;letter-spacing:0.15em;text-transform:uppercase;color:var(--color-accent);margin-bottom:16px;">Our Mission</span>
				<h2 style="font-size:clamp(22px,3.5vw,36px);font-family:var(--font-heading);font-weight:300;color:var(--color-primary);margin-bottom:32px;line-height:1.6;letter-spacing:0.02em;">
					補助金を、中小企業の<br>「攻めの武器」にする。
				</h2>
				<p style="font-size:15px;color:var(--color-text-light);line-height:2.2;max-width:640px;margin:0 auto;">
					株式会社レイノアは、補助金申請支援に特化したプロフェッショナル集団です。設備投資・新規事業・業務省力化を目指す企業が、補助金という公的資本を最大限に活用して事業を加速できるよう、採択可能性診断から実績報告まで一気通貫でサポートします。
				</p>
			</div>
		</div>
	</section>

	<!-- Company Overview Table -->
	<section class="company section section--light" aria-labelledby="company-heading">
		<div class="container">
			<div class="section-header fade-in">
				<span class="section-header__en">Company Profile</span>
				<h2 id="company-heading" class="section-header__title">会社情報</h2>
			</div>

			<table class="company__table">
				<tbody>
					<tr>
						<th scope="row">会社名</th>
						<td><?php echo esc_html( reinoa_company( 'company_name' ) ); ?>（<?php echo esc_html( reinoa_company( 'company_name_en' ) ); ?>）</td>
					</tr>
					<tr>
						<th scope="row">設立</th>
						<td>2024年</td>
					</tr>
					<tr>
						<th scope="row">代表取締役</th>
						<td>
							高尾 郷介
							<a href="<?php echo esc_url( home_url( '/profile' ) ); ?>" style="margin-left:16px;font-size:12px;color:var(--color-accent);border-bottom:1px solid var(--color-accent);">代表プロフィール →</a>
						</td>
					</tr>
					<tr>
						<th scope="row">所在地</th>
						<td>（所在地はお問い合わせください）</td>
					</tr>
					<tr>
						<th scope="row">事業内容</th>
						<td>補助金申請支援サービス（設備投資・新規事業・業務省力化のワンストップサポート）</td>
					</tr>
					<tr>
						<th scope="row">対応補助金</th>
						<td>
							中小企業新事業進出補助金 / ものづくり補助金 / 省力化投資補助金<br>
							中小企業成長加速化補助金 / 事業承継・M&A補助金 / 海外展開関連（IPO360等）
						</td>
					</tr>
					<tr>
						<th scope="row">メールアドレス</th>
						<td>
							<a href="mailto:<?php echo esc_attr( reinoa_company( 'company_email' ) ); ?>" style="color:var(--color-primary);">
								<?php echo esc_html( reinoa_company( 'company_email' ) ); ?>
							</a>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</section>

	<!-- Strengths -->
	<section class="section" aria-labelledby="strengths-heading">
		<div class="container">
			<div class="section-header fade-in">
				<span class="section-header__en">Our Strengths</span>
				<h2 id="strengths-heading" class="section-header__title">レイノアが選ばれる理由</h2>
			</div>
			<div style="display:grid;grid-template-columns:repeat(3,1fr);gap:2px;background:var(--color-border);">
				<?php
				$strengths = array(
					array(
						'en'   => 'Expert Knowledge',
						'ja'   => '深い専門性',
						'text' => '理系大学院出身×製造業経験×補助金専門キャリアを持つ代表が直接支援。科学的根拠に基づく事業計画で審査員を納得させます。',
					),
					array(
						'en'   => 'End-to-End Support',
						'ja'   => '一気通貫サポート',
						'text' => '採択可能性診断・制度選定から事業計画作成・電子申請・実績報告まで、全ステップを一社で完結。',
					),
					array(
						'en'   => 'Performance Fee',
						'ja'   => '成果報酬型',
						'text' => '採択されなければ成功報酬は発生しません。申請サポート費用110,000円（税込）のみで着手でき、初期リスクを最小化できます。',
					),
				);
				foreach ( $strengths as $s ) : ?>
					<div class="fade-in" style="background:#fff;padding:40px 32px;border-bottom:3px solid var(--color-accent);">
						<p style="font-family:var(--font-en);font-size:11px;letter-spacing:0.15em;text-transform:uppercase;color:var(--color-accent);margin-bottom:8px;"><?php echo esc_html( $s['en'] ); ?></p>
						<h3 style="font-size:20px;font-family:var(--font-heading);color:var(--color-primary);margin-bottom:16px;font-weight:300;"><?php echo esc_html( $s['ja'] ); ?></h3>
						<p style="font-size:14px;color:var(--color-text-light);line-height:2;margin:0;"><?php echo esc_html( $s['text'] ); ?></p>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<!-- CTA -->
	<section class="contact-banner" aria-labelledby="about-cta">
		<div class="contact-banner__deco"></div>
		<div class="contact-banner__deco"></div>
		<div class="container" style="position:relative;z-index:1;">
			<span class="contact-banner__en">Free Consultation</span>
			<h2 id="about-cta" class="contact-banner__title">まずは無料相談から</h2>
			<p class="contact-banner__text">採択可能性の診断は無料です。お気軽にご相談ください。</p>
			<div class="contact-banner__actions">
				<a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="btn btn--accent">
					無料相談はこちら
					<span class="btn__arrow" aria-hidden="true"></span>
				</a>
			</div>
		</div>
	</section>

</main>

<?php get_footer(); ?>
