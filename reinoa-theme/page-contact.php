<?php
/*
 * Template Name: お問い合わせページ
 */
get_header();
?>

<main id="main" class="site-main" role="main">

	<div class="page-hero">
		<div class="container">
			<span class="page-hero__en">Free Consultation</span>
			<h1 class="page-hero__title">無料相談・お問い合わせ</h1>
		</div>
	</div>

	<?php reinoa_breadcrumb(); ?>

	<!-- Contact Info -->
	<section class="section section--light">
		<div class="container">
			<div style="max-width:680px;margin:0 auto;text-align:center;margin-bottom:60px;">
				<p style="font-size:15px;color:var(--color-text-light);line-height:2.2;">
					「どの補助金が使えるか分からない」「申請書類の書き方が分からない」など、補助金に関するご相談はお気軽にどうぞ。まずは無料の採択可能性診断からスタートできます。
				</p>
			</div>

			<div style="display:grid;grid-template-columns:1fr 1fr;gap:2px;background:var(--color-border);max-width:760px;margin:0 auto;">
				<div style="background:#fff;padding:40px 32px;text-align:center;">
					<div style="width:48px;height:48px;margin:0 auto 16px;background:var(--color-primary);display:flex;align-items:center;justify-content:center;">
						<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="1.5"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
					</div>
					<p style="font-size:12px;letter-spacing:0.1em;color:var(--color-text-muted);margin-bottom:10px;">メールでのお問い合わせ</p>
					<a href="mailto:<?php echo esc_attr( reinoa_company( 'company_email' ) ); ?>"
					   style="font-size:15px;color:var(--color-primary);display:block;margin-bottom:6px;word-break:break-all;font-weight:500;">
						<?php echo esc_html( reinoa_company( 'company_email' ) ); ?>
					</a>
					<p style="font-size:12px;color:var(--color-text-muted);margin:0;">24時間受付（返信は翌営業日以内）</p>
				</div>

				<div style="background:#fff;padding:40px 32px;text-align:center;">
					<div style="width:48px;height:48px;margin:0 auto 16px;background:var(--color-primary);display:flex;align-items:center;justify-content:center;">
						<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="1.5"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
					</div>
					<p style="font-size:12px;letter-spacing:0.1em;color:var(--color-text-muted);margin-bottom:10px;">相談所要時間の目安</p>
					<p style="font-size:20px;color:var(--color-primary);font-family:var(--font-en);font-weight:600;margin-bottom:6px;">約30〜60分</p>
					<p style="font-size:12px;color:var(--color-text-muted);margin:0;">オンライン（Zoom等）対応可</p>
				</div>
			</div>
		</div>
	</section>

	<!-- Contact Form -->
	<section class="contact-form-section">
		<div class="container">

			<div class="contact-form-intro">
				<div class="section-header">
					<span class="section-header__en">Inquiry Form</span>
					<h2 class="section-header__title">お問い合わせフォーム</h2>
					<p class="section-header__lead">
						下記フォームにご入力のうえ、送信してください。<br>
						翌営業日以内にご返信いたします。
					</p>
				</div>
			</div>

			<?php
			if ( function_exists( 'wpcf7' ) ) :
				$cf7_forms = get_posts( array(
					'post_type'      => 'wpcf7_contact_form',
					'posts_per_page' => 1,
				) );
				if ( $cf7_forms ) :
					echo do_shortcode( '[contact-form-7 id="' . $cf7_forms[0]->ID . '" title="' . esc_attr( $cf7_forms[0]->post_title ) . '"]' );
				endif;
			else :
			?>
			<form class="reinoa-contact-form" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" method="post" novalidate>
				<?php wp_nonce_field( 'reinoa_contact', 'reinoa_contact_nonce' ); ?>
				<input type="hidden" name="action" value="reinoa_contact">

				<div style="display:grid;grid-template-columns:1fr 1fr;gap:24px;">
					<div class="form-group">
						<label class="form-label" for="contact-name">
							お名前<span class="required">必須</span>
						</label>
						<input type="text" id="contact-name" name="contact_name" class="form-input"
						       placeholder="山田 太郎" required autocomplete="name">
					</div>
					<div class="form-group">
						<label class="form-label" for="contact-company">
							会社名
						</label>
						<input type="text" id="contact-company" name="contact_company" class="form-input"
						       placeholder="株式会社〇〇" autocomplete="organization">
					</div>
				</div>

				<div class="form-group">
					<label class="form-label" for="contact-email">
						メールアドレス<span class="required">必須</span>
					</label>
					<input type="email" id="contact-email" name="contact_email" class="form-input"
					       placeholder="example@company.co.jp" required autocomplete="email">
				</div>

				<div class="form-group">
					<label class="form-label" for="contact-category">
						お問い合わせ種別<span class="required">必須</span>
					</label>
					<select id="contact-category" name="contact_category" class="form-select" required>
						<option value="">選択してください</option>
						<option value="diagnosis">無料相談・採択可能性診断を希望</option>
						<option value="subsidy">活用できる補助金を知りたい</option>
						<option value="plan">事業計画書の作成サポートを希望</option>
						<option value="apply">申請手続きのサポートを希望</option>
						<option value="report">実績報告のサポートを希望</option>
						<option value="other">その他</option>
					</select>
				</div>

				<div class="form-group">
					<label class="form-label" for="contact-subsidy">
						ご関心のある補助金（任意）
					</label>
					<select id="contact-subsidy" name="contact_subsidy" class="form-select">
						<option value="">選択してください（任意）</option>
						<option value="shinjigyo">中小企業新事業進出補助金（最大9,000万円）</option>
						<option value="mono">ものづくり補助金（最大3,500万円）</option>
						<option value="shoiryoku">省力化投資補助金（最大1億円）</option>
						<option value="kasoiku">中小企業成長加速化補助金（最大5億円）</option>
						<option value="jigyo-shokei">事業承継・M&A補助金（最大2,000万円）</option>
						<option value="overseas">海外展開関連 IPO360等（最大2,000万円）</option>
						<option value="unknown">どの補助金が使えるか分からない</option>
					</select>
				</div>

				<div class="form-group">
					<label class="form-label" for="contact-message">
						ご相談内容<span class="required">必須</span>
					</label>
					<textarea id="contact-message" name="contact_message" class="form-textarea"
					          placeholder="ご相談内容・現在の状況・ご要望などをご自由にお書きください。" required></textarea>
				</div>

				<div class="form-group">
					<label style="display:flex;align-items:flex-start;gap:12px;cursor:pointer;font-size:14px;color:var(--color-text-light);">
						<input type="checkbox" name="privacy_agree" value="1" required style="margin-top:3px;">
						<span>
							<a href="<?php echo esc_url( home_url( '/privacy-policy' ) ); ?>" target="_blank" style="color:var(--color-primary);border-bottom:1px solid var(--color-primary);">プライバシーポリシー</a>
							に同意する<span class="required" style="display:inline-block;background:var(--color-accent);color:#fff;font-size:10px;padding:2px 6px;letter-spacing:0.05em;margin-left:8px;vertical-align:middle;">必須</span>
						</span>
					</label>
				</div>

				<div class="form-submit">
					<button type="submit" class="btn btn--primary" style="min-width:280px;justify-content:center;">
						送信する（無料）
						<span class="btn__arrow" aria-hidden="true"></span>
					</button>
				</div>
			</form>
			<?php endif; ?>

		</div>
	</section>

</main>

<?php get_footer(); ?>
