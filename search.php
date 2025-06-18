<?php get_header(); ?>

	<main class="wrapper wrapper--main">
		<div class="wrapper__content search">
			<h2 class="search__title">
				<?php printf( esc_html__( 'Результаты поиска: %s', 'band-digital' ), '<span>' . get_search_query() . '</span>' ); ?>
			</h2>

			<?php
				if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					<article class="news__item">
						<a class="news__item-title" href="<?php echo get_the_permalink(); ?>"><?php the_title(); ?></a>
						<time class="news__item-date"><?php the_time( 'j F Y' ); ?></time>

						<figure class="news__figure"><?php if ( has_post_thumbnail() ) the_post_thumbnail( 'post-thumbnail', array( 'class' => 'news__figure-image' ) ); ?></figure>

						<?php the_excerpt(); ?>

						<a href="<?php echo get_the_permalink(); ?>" class="btn news__btn">Читать дальше</a>
					</article>

			<?php endwhile; else: ?>
				<p class="wrapper__empty-post">Поиск результатов не&nbsp;дал</p>
			<?php endif;

				the_posts_pagination( array(
					'show_all'						=> false, // показаны все страницы участвующие в пагинации
					'end_size'						=> 1, // количество страниц на концах
					'mid_size'						=> 1, // количество страниц вокруг текущей
					'prev_next'						=> true, // выводить ли боковые ссылки "предыдущая/следующая страница".
					'prev_text'						=> __('
																			<span class="btn-arrow page-pagination__arrow page-pagination__arrow--left">
																				Предыдущая страница
																				<svg class="el-decor btn-arrow__icon page-pagination__icon" aria-hidden="true"><use xlink:href="#arrow-circle" x="0" y="0"></use></svg>
																			</span>
																		'),
					'next_text'						=> __('
																		<span class="btn-arrow page-pagination__arrow page-pagination__arrow--right">
																			Следющая страница
																			<svg class="el-decor btn-arrow__icon page-pagination__icon" aria-hidden="true"><use xlink:href="#arrow-circle" x="0" y="0"></use></svg>
																		</span>
																	'),
					'add_args'						=> false, // Массив аргументов (переменных запроса), которые нужно добавить к ссылкам.
					'add_fragment'				=> '', // Текст который добавиться ко всем ссылкам.
					'screen_reader_text'	=> __('Навигация по результатам поиска'),
					'class'								=> 'page-pagination', // CSS класс, добавлено в 5.5.0.
				) );
			?>
		</div>
	</main>

<?php get_footer(); ?>