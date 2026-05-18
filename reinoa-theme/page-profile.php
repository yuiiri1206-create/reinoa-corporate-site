<?php
/*
 * Template Name: 代表プロフィールページ
 */
get_header();
?>

<main id="main" class="site-main" role="main">

	<div class="page-hero">
		<div class="container">
			<span class="page-hero__en">Representative</span>
			<h1 class="page-hero__title">代表プロフィール</h1>
		</div>
	</div>

	<?php reinoa_breadcrumb(); ?>

	<!-- Profile Main -->
	<section class="section" aria-labelledby="profile-heading">
		<div class="container">

			<div class="profile-grid" style="display:grid;grid-template-columns:300px 1fr;gap:72px;align-items:start;max-width:960px;margin:0 auto;">

				<!-- Photo & Name -->
				<div class="fade-in" style="text-align:center;">
					<div style="width:100%;aspect-ratio:3/4;background:var(--color-bg-dark);display:flex;align-items:center;justify-content:center;margin-bottom:24px;border-radius:var(--radius);">
						<span style="font-family:var(--font-en);font-size:96px;color:var(--color-accent);opacity:0.3;font-weight:300;">T</span>
					</div>
					<p style="font-size:24px;font-family:var(--font-heading);color:var(--color-primary);font-weight:300;margin-bottom:6px;letter-spacing:0.05em;">高尾 郷介</p>
					<p style="font-size:12px;letter-spacing:0.1em;color:var(--color-text-muted);margin-bottom:20px;">Kosuke Takao</p>
					<p style="display:inline-block;font-size:11px;letter-spacing:0.1em;color:var(--color-primary);border:1px solid var(--color-border);padding:6px 20px;">代表取締役</p>
				</div>

				<!-- Bio -->
				<div class="fade-in">
					<h2 id="profile-heading" style="font-size:clamp(18px,2.5vw,26px);font-family:var(--font-heading);color:var(--color-primary);font-weight:300;margin-bottom:28px;padding-bottom:20px;border-bottom:1px solid var(--color-border);">
						補助金の「戦略家」として、<br>企業の挑戦を後押しする。
					</h2>

					<div style="font-size:15px;color:var(--color-text-light);line-height:2.2;margin-bottom:40px;">
						<p style="margin-bottom:1.5em;">
							京都大学大学院バイオテクノロジー専攻修了後、ダウ・ケミカル日本に入社。製造業・素材業界での事業開発を経験した後、株式会社インダストリアにて中小企業向けの補助金活用支援に従事。
						</p>
						<p style="margin-bottom:1.5em;">
							その後、株式会社ライトアップにて補助金支援事業の立上げと全国展開を牽引し、多数の中小企業・スタートアップの採択を実現。2024年、補助金申請支援に特化した株式会社レイノアを設立。
						</p>
						<p>
							「科学的思考×ビジネス戦略×補助金専門知識」を組み合わせた独自のアプローチで、単なる書類作成代行を超えた戦略的な申請支援を提供する。
						</p>
					</div>

					<!-- Career Timeline -->
					<h3 style="font-size:13px;letter-spacing:0.15em;text-transform:uppercase;font-family:var(--font-en);color:var(--color-accent);margin-bottom:20px;">Career</h3>
					<div style="display:flex;flex-direction:column;gap:0;border-left:1px solid var(--color-border);padding-left:24px;">
						<?php
						$career = array(
							array( 'period' => '—', 'text' => '京都大学大学院 バイオテクノロジー専攻 修了' ),
							array( 'period' => '—', 'text' => 'ダウ・ケミカル日本 入社　製造業・素材業界の事業開発に従事' ),
							array( 'period' => '—', 'text' => '株式会社インダストリア　中小企業向け補助金活用支援' ),
							array( 'period' => '—', 'text' => '株式会社ライトアップ　補助金支援事業の立上げ・全国展開を牽引' ),
							array( 'period' => '2024年', 'text' => '株式会社レイノア 設立・代表取締役就任' ),
						);
						foreach ( $career as $item ) : ?>
							<div style="position:relative;padding:0 0 24px 0;">
								<span style="position:absolute;left:-28px;top:6px;width:7px;height:7px;border-radius:50%;background:var(--color-accent);"></span>
								<?php if ( $item['period'] !== '—' ) : ?>
									<p style="font-size:11px;font-family:var(--font-en);color:var(--color-accent);letter-spacing:0.1em;margin-bottom:4px;"><?php echo esc_html( $item['period'] ); ?></p>
								<?php endif; ?>
								<p style="font-size:14px;color:var(--color-text-light);line-height:1.7;"><?php echo esc_html( $item['text'] ); ?></p>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>

		</div>
	</section>

	<!-- Message -->
	<section class="section section--light" aria-labelledby="message-heading">
		<div class="container">
			<div class="section-header fade-in">
				<span class="section-header__en">Message</span>
				<h2 id="message-heading" class="section-header__title">代表メッセージ</h2>
			</div>

			<div style="max-width:780px;margin:0 auto;" class="fade-in">
				<blockquote style="border-left:3px solid var(--color-accent);padding:0 0 0 32px;margin:0 0 40px;">
					<p style="font-size:clamp(16px,2vw,22px);font-family:var(--font-heading);color:var(--color-primary);font-weight:300;line-height:1.8;letter-spacing:0.03em;">
						「補助金は、使い方次第で企業の成長を一気に加速させる強力なツールです。正しく活用すれば、設備投資・新規事業・海外展開のどの局面でも大きな後押しになります。」
					</p>
				</blockquote>

				<div style="font-size:15px;color:var(--color-text-light);line-height:2.4;">
					<p style="margin-bottom:1.5em;">
						私がレイノアを立ち上げた動機は、「補助金の可能性を、もっと多くの中小企業に届けたい」という思いです。補助金制度は年々複雑化しており、情報収集から申請書作成・採択後の実績報告まで、自社だけで対応するのは容易ではありません。
					</p>
					<p style="margin-bottom:1.5em;">
						レイノアでは、採択可能性の診断から始めて、事業の強みを最大限に引き出した計画書の作成、申請書類の整備、そして採択後の補助事業推進まで、一気通貫でサポートします。
					</p>
					<p>
						まずはお気軽にご相談ください。「どの補助金が使えるか分からない」という段階からでも、丁寧にご案内します。
					</p>
				</div>

				<div style="margin-top:48px;padding-top:32px;border-top:1px solid var(--color-border);display:flex;align-items:center;gap:16px;">
					<div>
						<p style="font-size:18px;font-family:var(--font-heading);color:var(--color-primary);font-weight:300;">高尾 郷介</p>
						<p style="font-size:12px;color:var(--color-text-muted);letter-spacing:0.05em;">株式会社レイノア　代表取締役</p>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- CTA -->
	<section class="contact-banner" aria-labelledby="profile-cta">
		<div class="contact-banner__deco"></div>
		<div class="contact-banner__deco"></div>
		<div class="container" style="position:relative;z-index:1;">
			<span class="contact-banner__en">Free Consultation</span>
			<h2 id="profile-cta" class="contact-banner__title">まずは無料相談から</h2>
			<p class="contact-banner__text">採択可能性の診断は無料です。お気軽にご相談ください。</p>
			<div class="contact-banner__actions">
				<a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="btn btn--accent">
					無料相談はこちら
					<span class="btn__arrow" aria-hidden="true"></span>
				</a>
				<a href="<?php echo esc_url( home_url( '/about' ) ); ?>" class="btn btn--outline">
					会社概要を見る
					<span class="btn__arrow" aria-hidden="true"></span>
				</a>
			</div>
		</div>
	</section>

</main>

<?php get_footer(); ?>
