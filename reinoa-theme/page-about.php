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
				<span class="section-header__en" style="display:block;font-family:var(--font-en);font-size:13px;letter-spacing:0.3em;text-transform:uppercase;color:var(--color-accent);margin-bottom:16px;">Our Mission</span>
				<h2 style="font-size:clamp(22px,3.5vw,38px);font-family:var(--font-heading);font-weight:400;color:var(--color-primary);margin-bottom:32px;line-height:1.5;letter-spacing:0.05em;">
					補助金を、中小企業の<br>「攻めの武器」にする。
				</h2>
				<p style="font-size:15px;color:var(--color-text-light);line-height:2.2;">
					株式会社レイノアは、補助金申請支援に特化したプロフェッショナル集団です。設備投資・新規事業・業務省力化を目指す企業が、補助金という公的資本を最大限に活用して事業を加速できるよう、採択可能性診断から実績報告まで一気通貫でサポートします。
				</p>
			</div>
		</div>
	</section>

	<!-- Representative Profile -->
	<section class="section section--light" aria-labelledby="ceo-heading">
		<div class="container">
			<div class="section-header fade-in">
				<span class="section-header__en">Representative</span>
				<h2 id="ceo-heading" class="section-header__title">代表者プロフィール</h2>
			</div>

			<div style="display:grid;grid-template-columns:280px 1fr;gap:60px;align-items:start;max-width:900px;margin:0 auto;">
				<div class="fade-in" style="text-align:center;">
					<div style="width:100%;aspect-ratio:3/4;background:linear-gradient(135deg,#1a2f5a 0%,#2a4a8a 100%);display:flex;align-items:center;justify-content:center;margin-bottom:20px;">
						<span style="font-family:var(--font-en);font-size:80px;color:rgba(200,169,110,0.3);font-weight:700;">T</span>
					</div>
					<p style="font-size:20px;font-family:var(--font-heading);color:var(--color-primary);font-weight:500;margin-bottom:4px;">高尾 郷介</p>
					<p style="font-size:12px;letter-spacing:0.1em;color:var(--color-text-muted);">代表取締役</p>
				</div>
				<div class="fade-in">
					<h3 style="font-size:18px;font-family:var(--font-heading);color:var(--color-primary);margin-bottom:20px;font-weight:500;">代表取締役　高尾 郷介</h3>
					<div style="font-size:14px;color:var(--color-text-light);line-height:2.2;margin-bottom:32px;">
						<p>
							京都大学大学院バイオテクノロジー専攻修了後、ダウ・ケミカル日本に入社。製造業・素材業界での事業開発を経験した後、株式会社インダストリアにて中小企業向けの補助金活用支援に従事。
						</p>
						<p>
							その後、株式会社ライトアップにて補助金支援事業の立上げと全国展開を牽引し、多数の中小企業・スタートアップの採択を実現。2024年、補助金申請支援に特化した株式会社レイノアを設立。
						</p>
						<p>
							「科学的思考×ビジネス戦略×補助金専門知識」を組み合わせた独自のアプローチで、単なる書類作成代行を超えた戦略的な申請支援を提供する。
						</p>
					</div>
					<div style="display:flex;flex-direction:column;gap:8px;">
						<?php
						$career = array(
							'京都大学大学院 バイオテクノロジー専攻 修了',
							'ダウ・ケミカル日本 入社',
							'株式会社インダストリア 補助金支援部門',
							'株式会社ライトアップ 補助金支援体制の立上げ・事業拡大を牽引',
							'2024年 株式会社レイノア 設立・代表取締役就任',
						);
						foreach ( $career as $item ) : ?>
							<div style="display:flex;align-items:flex-start;gap:12px;font-size:13px;color:var(--color-text-light);">
								<span style="width:6px;height:6px;border-radius:50%;background:var(--color-accent);margin-top:7px;flex-shrink:0;"></span>
								<?php echo esc_html( $item ); ?>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Company Overview -->
	<section class="company section" aria-labelledby="company-heading">
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
						<td>高尾 郷介</td>
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

	<!-- Values -->
	<section class="section section--light" aria-labelledby="values-heading">
		<div class="container">
			<div class="section-header fade-in">
				<span class="section-header__en">Our Strengths</span>
				<h2 id="values-heading" class="section-header__title">レイノアが選ばれる理由</h2>
			</div>
			<div style="display:grid;grid-template-columns:repeat(3,1fr);gap:32px;">
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
						'text' => '採択可能性診断・制度選定から事業計画作成・電子申請・実績報告まで、全ステップを一社で完結。複数社に依頼する手間がありません。',
					),
					array(
						'en'   => 'Performance Fee',
						'ja'   => '成果報酬型',
						'text' => '採択されなければ成功報酬は発生しません。申請サポート費用110,000円（税込）のみで着手でき、初期リスクを最小化できます。',
					),
				);
				foreach ( $strengths as $s ) : ?>
					<div class="fade-in" style="background:#fff;padding:40px 32px;border-bottom:3px solid var(--color-accent);">
						<p style="font-family:var(--font-en);font-size:11px;letter-spacing:0.3em;text-transform:uppercase;color:var(--color-accent);margin-bottom:8px;"><?php echo esc_html( $s['en'] ); ?></p>
						<h3 style="font-size:22px;font-family:var(--font-heading);color:var(--color-primary);margin-bottom:16px;"><?php echo esc_html( $s['ja'] ); ?></h3>
						<p style="font-size:14px;color:var(--color-text-light);line-height:2;margin:0;"><?php echo esc_html( $s['text'] ); ?></p>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

</main>

<?php get_footer(); ?>
