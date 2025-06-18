<?php
/*
 * Template name: Реестр МААП
*/
?>
<!-- Страница: Реестр МААП (page-registry.php) -->
<?php get_header(); ?>

	<main class="wrapper wrapper--main">
		<div class="wrapper__content">
			<h2><?php the_title(); ?></h2>

			<section class="registry">
				<div class="registry__wrap">
					<table class="registry__table">
						<thead>
							<tr>
								<th scope="col">#</th>
								<th scope="col">Наименование</th>
								<th scope="col">Руководитель</th>
								<th scope="col">Деятельность</th>
							</tr>
						</thead>
						<tbody>
						<?php
							$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
							$args = array(
								'posts_per_page'	=> 50,
								'order'						=> 'DESC',
								'post_type'				=> 'registry',
								'paged'						=> $paged
							);

							$MY_QUERY = new WP_Query( $args );

							if ( $MY_QUERY->have_posts() ) {
								while ( $MY_QUERY->have_posts() ) {
									$MY_QUERY->the_post(); ?>

									<tr>
										<th scope="row"><!-- Порядковый номер --></th>
										<td><?php the_title(); ?></td>
										<td><?php echo get_the_excerpt(); ?></td>
										<td><?php the_content(); ?></td>
									</tr>

								<?php };
							} else { ?>
								<p class="wrapper__empty-post">Организаций не&nbsp;найдено</p>
							<?php };

							wp_reset_postdata(); // Сбрасываем $post
						?>
						</tbody>
					</table>
				</div>

				<?php
					$GLOBALS['wp_query']->max_num_pages = $MY_QUERY->max_num_pages;

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
						'screen_reader_text'	=> __('Навигация по реестру'),
						'class'								=> 'page-pagination', // CSS класс, добавлено в 5.5.0.
					) );
				?>
			</section>
		</div>
	</main>

<?php get_footer(); ?>