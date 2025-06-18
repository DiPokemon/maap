<form class="header__search form" action="<?php echo home_url( '/' ) ?>" method="get" role="search">
	<input type="hidden" value="post" name="post_type">

	<input class="form__input header__search-input" name="s" placeholder="Поиск" value="<?php echo get_search_query(); ?>">
	<label class="el-decor form__label">Поиск</label>

	<svg class="el-decor form__icon form__icon--fill" aria-hidden="true"><use xlink:href="#search" x="0" y="0"></use></svg>

	<button class="header__search-clear" type="button" tabindex="-1" title="Очистить поле">
		Очистить поле
		<svg class="el-decor header__search-clear-icon" aria-hidden="true"><use xlink:href="#close" x="0" y="0"></use></svg>
	</button>
</form>