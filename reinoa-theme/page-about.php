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
			<h1 class="page-hero__title"><?php _e( '会社概要', 'reinoa' ); ?></h1>
		</div>
	</div>

	<?php reinoa_breadcrumb(); ?>

	<!-- Mission Section -->
	<section class="section">
		<div class="container">
			<div style="max-width:800px;margin:0 auto;text-align:center;">
				<span class="section-header__en" style="display:block;font-family:var(--font-en);font-size:13px;letter-spacing:0.3em;text-transform:uppercase;color:var(--color-accent);margin-bottom:16px;">Our Mission</span>
				<h2 style="font-size:clamp(24px,3.5vw,40px);font-family:var(--font-heading);font-weight:400;color:var(--color-primary);margin-bottom:32px;line-height:1.5;letter-spacing:0.05em;">
					テクノロジーで、<br>日本のビジネスを前進させる。
				</h2>
				<p style="font-size:16px;color:var(--color-text-light);line-height:2.2;">
					株式会社レイノアは「テクノロジーと人をつなぎ、新たな価値を創造する」というミッションのもと、2010年に設立されました。私たちは、最先端のデジタル技術とビジネスの深い理解を組み合わせ、お客様の課題解決と持続的な成長を支援します。
				</p>
			</div>
		</div>
	</section>

	<!-- Values Section -->
	<section class="section section--light">
		<div class="container">
			<div class="section-header fade-in">
				<span class="section-header__en">Our Values</span>
				<h2 class="section-header__title">大切にしていること</h2>
			</div>
			<div style="display:grid;grid-template-columns:repeat(3,1fr);gap:32px;">
				<?php
				$values = array(
					array(
						'en'    => 'Innovation',
						'ja'    => '革新',
						'text'  => '変化を恐れず、常に新しいアイデアと技術で課題に挑みます。革新的な思考が、次の時代を切り拓く力になると信じています。',
					),
					array(
						'en'    => 'Integrity',
						'ja'    => '誠実',
						'text'  => '言葉と行動の一致を大切にし、すべてのステークホルダーに誠実であり続けます。信頼は、長期的な関係の基盤です。',
					),
					array(
						'en'    => 'Partnership',
						'ja'    => '共創',
						'text'  => 'お客様と対等なパートナーとして、共に考え、共に成長します。一方的な提供ではなく、相互理解から生まれる価値を大切にします。',
					),
					array(
						'en'    => 'Excellence',
						'ja'    => '卓越',
						'text'  => '妥協のない品質とプロフェッショナリズムで、期待を超える成果を届けます。常に最高水準を目指す姿勢が私たちの誇りです。',
					),
					array(
						'en'    => 'Diversity',
						'ja'    => '多様性',
						'text'  => '異なる背景・経験・視点を持つ人材が集い、互いを尊重することで、より豊かな発想と強固な組織が生まれると考えます。',
					),
					array(
						'en'    => 'Sustainability',
						'ja'    => '持続可能性',
						'text'  => '短期的な利益だけでなく、社会・環境への責任を果たしながら、長期的に価値を生み出し続ける企業であり続けます。',
					),
				);
				foreach ( $values as $value ) : ?>
					<div class="fade-in" style="background:#fff;padding:40px 32px;border-bottom:3px solid var(--color-accent);">
						<p style="font-family:var(--font-en);font-size:11px;letter-spacing:0.3em;text-transform:uppercase;color:var(--color-accent);margin-bottom:8px;"><?php echo esc_html( $value['en'] ); ?></p>
						<h3 style="font-size:22px;font-family:var(--font-heading);color:var(--color-primary);margin-bottom:16px;"><?php echo esc_html( $value['ja'] ); ?></h3>
						<p style="font-size:14px;color:var(--color-text-light);line-height:2;margin:0;"><?php echo esc_html( $value['text'] ); ?></p>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<!-- Company Overview Section -->
	<section class="company section" aria-labelledby="company-heading">
		<div class="container">
			<div class="section-header fade-in">
				<span class="section-header__en">Company Profile</span>
				<h2 id="company-heading" class="section-header__title">会社情報</h2>
			</div>

			<table class="company__table">
				<tbody>
					<tr>
						<th scope="row"><?php _e( '会社名', 'reinoa' ); ?></th>
						<td><?php echo esc_html( reinoa_company( 'company_name' ) ); ?>（<?php echo esc_html( reinoa_company( 'company_name_en' ) ); ?>）</td>
					</tr>
					<tr>
						<th scope="row"><?php _e( '設立', 'reinoa' ); ?></th>
						<td>2010年4月1日</td>
					</tr>
					<tr>
						<th scope="row"><?php _e( '資本金', 'reinoa' ); ?></th>
						<td>5,000万円</td>
					</tr>
					<tr>
						<th scope="row"><?php _e( '代表取締役', 'reinoa' ); ?></th>
						<td>山田 太郎</td>
					</tr>
					<tr>
						<th scope="row"><?php _e( '従業員数', 'reinoa' ); ?></th>
						<td>200名（2026年1月現在）</td>
					</tr>
					<tr>
						<th scope="row"><?php _e( '所在地', 'reinoa' ); ?></th>
						<td>
							<?php echo esc_html( reinoa_company( 'company_zip' ) ); ?><br>
							<?php echo esc_html( reinoa_company( 'company_address' ) ); ?>
						</td>
					</tr>
					<tr>
						<th scope="row"><?php _e( '電話番号', 'reinoa' ); ?></th>
						<td><?php echo esc_html( reinoa_company( 'company_tel' ) ); ?></td>
					</tr>
					<tr>
						<th scope="row"><?php _e( 'FAX番号', 'reinoa' ); ?></th>
						<td><?php echo esc_html( reinoa_company( 'company_fax' ) ); ?></td>
					</tr>
					<tr>
						<th scope="row"><?php _e( '営業時間', 'reinoa' ); ?></th>
						<td><?php echo esc_html( reinoa_company( 'company_hours' ) ); ?></td>
					</tr>
					<tr>
						<th scope="row"><?php _e( '事業内容', 'reinoa' ); ?></th>
						<td>
							ITコンサルティング事業<br>
							システム開発・運用事業<br>
							デジタルマーケティング事業<br>
							クラウドソリューション事業<br>
							人材育成・研修事業
						</td>
					</tr>
					<tr>
						<th scope="row"><?php _e( '取引銀行', 'reinoa' ); ?></th>
						<td>みずほ銀行 丸の内支店、三菱UFJ銀行 大手町支店</td>
					</tr>
				</tbody>
			</table>
		</div>
	</section>

	<!-- History Section -->
	<section class="section section--light" aria-labelledby="history-heading">
		<div class="container">
			<div class="section-header fade-in">
				<span class="section-header__en">History</span>
				<h2 id="history-heading" class="section-header__title">沿革</h2>
			</div>

			<div style="max-width:720px;margin:0 auto;">
				<?php
				$history = array(
					array( 'year' => '2010', 'month' => '4月', 'text' => '東京都千代田区にて株式会社レイノア設立。ITコンサルティング事業を開始。' ),
					array( 'year' => '2012', 'month' => '6月', 'text' => 'システム開発部門を設立。エンタープライズ向けシステム開発事業を開始。' ),
					array( 'year' => '2014', 'month' => '3月', 'text' => '資本金を5,000万円に増資。従業員数50名に達する。' ),
					array( 'year' => '2016', 'month' => '9月', 'text' => 'クラウドソリューション事業部を新設。AWS・Azureパートナー認定を取得。' ),
					array( 'year' => '2018', 'month' => '1月', 'text' => 'デジタルマーケティング事業を開始。デジタル変革支援サービスを拡充。' ),
					array( 'year' => '2020', 'month' => '4月', 'text' => '設立10周年。従業員数150名、売上高20億円を達成。' ),
					array( 'year' => '2022', 'month' => '7月', 'text' => '大阪オフィスを開設。関西エリアへのサービス提供を強化。' ),
					array( 'year' => '2024', 'month' => '4月', 'text' => 'AI・データサイエンス事業部を新設。DX推進支援サービスをさらに拡充。' ),
					array( 'year' => '2026', 'month' => '1月', 'text' => '従業員数200名。グローバル展開に向けた準備を開始。' ),
				);
				foreach ( $history as $item ) : ?>
					<div class="fade-in" style="display:grid;grid-template-columns:80px 1fr;gap:24px;padding:24px 0;border-bottom:1px solid var(--color-border);align-items:start;">
						<div style="text-align:center;">
							<p style="font-family:var(--font-en);font-size:18px;font-weight:600;color:var(--color-primary);line-height:1;"><?php echo esc_html( $item['year'] ); ?></p>
							<p style="font-size:12px;color:var(--color-accent);margin:2px 0 0;"><?php echo esc_html( $item['month'] ); ?></p>
						</div>
						<p style="font-size:14px;color:var(--color-text-light);line-height:1.8;margin:0;padding-top:4px;"><?php echo esc_html( $item['text'] ); ?></p>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<!-- Access Map Section -->
	<section class="section" aria-labelledby="access-heading">
		<div class="container">
			<div class="section-header fade-in">
				<span class="section-header__en">Access</span>
				<h2 id="access-heading" class="section-header__title">アクセス</h2>
			</div>

			<div style="display:grid;grid-template-columns:1fr 1fr;gap:60px;align-items:start;">
				<div class="fade-in">
					<h3 style="font-size:18px;font-family:var(--font-heading);color:var(--color-primary);margin-bottom:20px;">本社</h3>
					<address style="font-style:normal;font-size:14px;color:var(--color-text-light);line-height:2.2;">
						<strong style="display:block;color:var(--color-text);margin-bottom:8px;"><?php echo esc_html( reinoa_company( 'company_name' ) ); ?></strong>
						<?php echo esc_html( reinoa_company( 'company_zip' ) ); ?><br>
						<?php echo esc_html( reinoa_company( 'company_address' ) ); ?><br>
						TEL: <?php echo esc_html( reinoa_company( 'company_tel' ) ); ?><br>
						FAX: <?php echo esc_html( reinoa_company( 'company_fax' ) ); ?>
					</address>
					<div style="margin-top:24px;padding:20px;background:var(--color-bg-light);border-left:3px solid var(--color-accent);">
						<p style="font-size:13px;color:var(--color-text-light);line-height:2;margin:0;">
							<strong style="color:var(--color-primary);display:block;margin-bottom:4px;">アクセス方法</strong>
							東京メトロ丸ノ内線「東京駅」より徒歩3分<br>
							JR各線「東京駅」丸の内北口より徒歩5分
						</p>
					</div>
				</div>
				<div class="fade-in">
					<!-- Google Maps Embed placeholder -->
					<div style="width:100%;aspect-ratio:4/3;background:var(--color-bg-light);display:flex;align-items:center;justify-content:center;border:1px solid var(--color-border);">
						<p style="color:var(--color-text-muted);font-size:14px;text-align:center;">
							Google マップを<br>ここに埋め込んでください<br>
							<a href="https://maps.google.com/" target="_blank" rel="noopener" style="color:var(--color-primary);font-size:12px;margin-top:8px;display:inline-block;">地図を開く →</a>
						</p>
					</div>
				</div>
			</div>
		</div>
	</section>

</main>

<?php get_footer(); ?>
