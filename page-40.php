<?php
/*
 * Template name: Заявка на вступление
*/
?>

<!-- Страница: Заявка на вступление (page-form.php) -->
<?php get_header(); ?>

	<main class="wrapper wrapper--main">
		<div class="wrapper__content">
			<h2><?php the_title(); ?></h2>

			<form class="form" data-form-active>
				<div class="form__block">
					<div class="form__part form__part--name">
						<input class="form__input" name="maap-name" placeholder="Имя" required>
						<label class="el-decor form__label">Имя Фамилия</label>
						<svg class="el-decor form__icon form__icon--stroke" aria-hidden="true"><use xlink:href="#user" x="0" y="0"></use></svg>
					</div>
	
					<div class="form__part form__part--email">
						<input class="form__input" name="maap-email" type="email" placeholder="E-mail">
						<label class="el-decor form__label">E-mail</label>
						<svg class="el-decor form__icon form__icon--fill" aria-hidden="true"><use xlink:href="#sms" x="0" y="0"></use></svg>
					</div>
	
					<div class="form__part form__part--phone">
						<input class="form__input" name="maap-phone" type="tel" placeholder="Телефон" required>
						<label class="el-decor form__label">Телефон</label>
						<svg class="el-decor form__icon form__icon--stroke" aria-hidden="true"><use xlink:href="#call" x="0" y="0"></use></svg>
					</div>
	
					<div class="form__part form__part--text">
						<textarea class="form__input form__input--textarea" name="maap-text" placeholder="Сообщение"></textarea>
						<label class="el-decor form__label">Сообщение</label>
						<svg class="el-decor form__icon form__icon--fill" aria-hidden="true"><use xlink:href="#textarea" x="0" y="0"></use></svg>
					</div>
	
					<div class="form__part form__part--control">
						<input id="token" type="hidden" name="token">
						<button class="btn btn--border form__btn form__btn--clear" type="reset">Очистить</button>
						<button class="btn form__btn form__btn--send" type="submit">Отправить</button>
					</div>
				</div>

				<div class="form__result">
					<button class="form__result-close" type="button" title="Закрыть уведомление">
						Закрыть уведомление
						<svg class="el-decor form__result-close-icon" aria-hidden="true"><use xlink:href="#close" x="0" y="0"></use></svg>
					</button>

					<div class="form__result-item form__time"></div>

					<div class="form__result-item form__success">
						<svg class="el-decor form__result-icon" aria-hidden="true" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
							<path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"></path>
							<path d="M4.285 9.567a.5.5 0 0 1 .683.183A3.498 3.498 0 0 0 8 11.5a3.498 3.498 0 0 0 3.032-1.75.5.5 0 1 1 .866.5A4.498 4.498 0 0 1 8 12.5a4.498 4.498 0 0 1-3.898-2.25.5.5 0 0 1 .183-.683zM7 6.5C7 7.328 6.552 8 6 8s-1-.672-1-1.5S5.448 5 6 5s1 .672 1 1.5zm4 0c0 .828-.448 1.5-1 1.5s-1-.672-1-1.5S9.448 5 10 5s1 .672 1 1.5z"></path>
						</svg>

						<div class="form__content">
							<h2>Спасибо!</h2>
							<p>
								Ваша заявка принята! <br>
								Мы с&nbsp;Вами свяжемся в&nbsp;ближашее время!
							</p>
						</div>
					</div>

					<div class="form__result-item form__error">
						<svg class="el-decor form__result-icon" aria-hidden="true" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
							<path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"></path>
							<path d="M4.285 12.433a.5.5 0 0 0 .683-.183A3.498 3.498 0 0 1 8 10.5c1.295 0 2.426.703 3.032 1.75a.5.5 0 0 0 .866-.5A4.498 4.498 0 0 0 8 9.5a4.5 4.5 0 0 0-3.898 2.25.5.5 0 0 0 .183.683zM7 6.5C7 7.328 6.552 8 6 8s-1-.672-1-1.5S5.448 5 6 5s1 .672 1 1.5zm4 0c0 .828-.448 1.5-1 1.5s-1-.672-1-1.5S9.448 5 10 5s1 .672 1 1.5z"></path>
						</svg>

						<div class="form__content">
							<h2>Ошибка!</h2>
							<p>
								Что-то пошло не&nbsp;так! <br>
								Пожалуйста, повторите попытку ещё раз!
							</p>
						</div>
					</div>
				</div>
			</form>
		</div>
	</main>

<?php get_footer(); ?>