<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label>
		<span class="screen-reader-text"><?php _e( 'キーワードで検索:', 'reinoa' ); ?></span>
		<input type="search" class="search-field form-input" placeholder="<?php esc_attr_e( 'キーワードを入力…', 'reinoa' ); ?>"
		       value="<?php echo esc_attr( get_search_query() ); ?>" name="s" required>
	</label>
	<button type="submit" class="search-submit btn btn--primary" style="margin-top:12px;width:100%;justify-content:center;">
		<?php _e( '検索', 'reinoa' ); ?>
	</button>
</form>
