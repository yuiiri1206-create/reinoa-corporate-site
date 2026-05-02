<?php
/*
 * Template Name: お問い合わせページ
 */
get_header();
?>

<main id="main" class="site-main" role="main">

	<div class="page-hero">
		<div class="container">
			<span class="page-hero__en">Contact Us</span>
			<h1 class="page-hero__title"><?php _e( 'お問い合わせ', 'reinoa' ); ?></h1>
		</div>
	</div>

	<?php reinoa_breadcrumb(); ?>

	<!-- Contact Info -->
	<section class="section section--light">
		<div class="container">
			<div style="display:grid;grid-template-columns:repeat(3,1fr);gap:2px;background:var(--color-border);text-align:center;">
				<div style="background:#fff;padding:40px 24px;">
					<div style="width:48px;height:48px;margin:0 auto 16px;background:var(--color-primary);display:flex;align-items:center;justify-content:center;">
						<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="1.5"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 013.5 9.72a19.79 19.79 0 01-3.07-8.67A2 2 0 012.4 1h3a2 2 0 012 1.72 12.8 12.8 0 00.7 2.81 2 2 0 01-.45 2.11L6.75 8.09A16 16 0 0015 16.29l.91-.91a2 2 0 012.11-.45 12.8 12.8 0 002.81.7A2 2 0 0122 16.92z"/></svg>
					</div>
					<p style="font-size:12px;letter-spacing:0.1em;color:var(--color-text-muted);margin-bottom:8px;">電話でのお問い合わせ</p>
					<a href="tel:<?php echo esc_attr( preg_replace( '/[^0-9]/', '', reinoa_company( 'company_tel' ) ) ); ?>"
					   style="font-family:var(--font-en);font-size:22px;color:var(--color-primary);font-weight:600;display:block;margin-bottom:6px;">
						<?php echo esc_html( reinoa_company( 'company_tel' ) ); ?>
					</a>
					<p style="font-size:12px;color:var(--color-text-muted);margin:0;"><?php echo esc_html( reinoa_company( 'company_hours' ) ); ?></p>
				</div>

				<div style="background:#fff;padding:40px 24px;">
					<div style="width:48px;height:48px;margin:0 auto 16px;background:var(--color-primary);display:flex;align-items:center;justify-content:center;">
						<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="1.5"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
					</div>
					<p style="font-size:12px;letter-spacing:0.1em;color:var(--color-text-muted);margin-bottom:8px;">メールでのお問い合わせ</p>
					<a href="mailto:<?php echo esc_attr( reinoa_company( 'company_email' ) ); ?>"
					   style="font-size:15px;color:var(--color-primary);display:block;margin-bottom:6px;">
						<?php echo esc_html( reinoa_company( 'company_email' ) ); ?>
					</a>
					<p style="font-size:12px;color:var(--color-text-muted);margin:0;">24時間受付（返信は営業日内）</p>
				</div>

				<div style="background:#fff;padding:40px 24px;">
					<div style="width:48px;height:48px;margin:0 auto 16px;background:var(--color-primary);display:flex;align-items:center;justify-content:center;">
						<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="1.5"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg>
					</div>
					<p style="font-size:12px;letter-spacing:0.1em;color:var(--color-text-muted);margin-bottom:8px;">本社所在地</p>
					<address style="font-style:normal;font-size:14px;color:var(--color-primary);display:block;margin-bottom:6px;">
						<?php echo esc_html( reinoa_company( 'company_address' ) ); ?>
					</address>
					<p style="font-size:12px;color:var(--color-text-muted);margin:0;"><?php echo esc_html( reinoa_company( 'company_zip' ) ); ?></p>
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
						下記フォームにご記入の上、送信してください。<br>
						担当者より2営業日以内にご連絡いたします。
					</p>
				</div>
			</div>

			<?php
			// Contact Form 7 がインストールされている場合はショートコードを使用
			if ( function_exists( 'wpcf7' ) ) :
				// CF7 の最初のフォームを自動取得
				$cf7_forms = get_posts( array(
					'post_type'      => 'wpcf7_contact_form',
					'posts_per_page' => 1,
				) );
				if ( $cf7_forms ) :
					echo do_shortcode( '[contact-form-7 id="' . $cf7_forms[0]->ID . '" title="' . esc_attr( $cf7_forms[0]->post_title ) . '"]' );
				endif;
			else :
			?>
			<!-- Default HTML Form (before CF7 setup) -->
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

				<div style="display:grid;grid-template-columns:1fr 1fr;gap:24px;">
					<div class="form-group">
						<label class="form-label" for="contact-email">
							メールアドレス<span class="required">必須</span>
						</label>
						<input type="email" id="contact-email" name="contact_email" class="form-input"
						       placeholder="example@reinoa.co.jp" required autocomplete="email">
					</div>
					<div class="form-group">
						<label class="form-label" for="contact-tel">
							電話番号
						</label>
						<input type="tel" id="contact-tel" name="contact_tel" class="form-input"
						       placeholder="03-0000-0000" autocomplete="tel">
					</div>
				</div>

				<div class="form-group">
					<label class="form-label" for="contact-category">
						お問い合わせ種別<span class="required">必須</span>
					</label>
					<select id="contact-category" name="contact_category" class="form-select" required>
						<option value="">選択してください</option>
						<option value="service">サービスについて</option>
						<option value="price">料金・見積もりについて</option>
						<option value="support">サポートについて</option>
						<option value="partnership">パートナーシップについて</option>
						<option value="recruit">採用について</option>
						<option value="other">その他</option>
					</select>
				</div>

				<div class="form-group">
					<label class="form-label" for="contact-message">
						お問い合わせ内容<span class="required">必須</span>
					</label>
					<textarea id="contact-message" name="contact_message" class="form-textarea"
					          placeholder="お問い合わせ内容をご記入ください。" required></textarea>
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
					<button type="submit" class="btn btn--primary" style="min-width:240px;justify-content:center;">
						<?php _e( '送信する', 'reinoa' ); ?>
						<span class="btn__arrow" aria-hidden="true"></span>
					</button>
				</div>
			</form>
			<?php endif; ?>

		</div>
	</section>

</main>

<?php get_footer(); ?>
