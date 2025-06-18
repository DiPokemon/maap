<?php
/**
* Template name: Contacts
*/
?>
<!-- Страница: Контакты (page-contacts.php) -->
<?php get_header(); ?>

	<main class="wrapper wrapper--main">
		<div class="wrapper__content">
			<h2><?php the_title(); ?></h2>

			<section class="contacts">
				<div class="contacts__map" data-pos-x="<?php echo get_post_meta( 2, 'maap-pos-x', true ); ?>" data-pos-y="<?php echo get_post_meta( 2, 'maap-pos-y', true ); ?>"></div>

				<div class="contacts__wrap">
					<div class="contacts__item">
						<h3 class="contacts__title">Адрес</h3>

						<address class="contacts__text contacts__address">
							<svg class="el-decor contacts__text-icon" aria-hidden="true"><use xlink:href="#location" x="0" y="0"></use></svg>
							<?php echo get_post_meta( 2, 'maap-address', true ); ?>
						</address>
					</div>

					<div class="contacts__item">
						<h3 class="contacts__title">Телефон</h3>

						<a class="contacts__text contacts__call" href="tel:<?php echo get_post_meta( 2, 'maap-phone', true ); ?>">
							<svg class="el-decor contacts__text-icon" aria-hidden="true"><use xlink:href="#call" x="0" y="0"></use></svg>
							<?php echo get_post_meta( 2, 'maap-phone', true ); ?>
						</a>
					</div>

					<div class="contacts__item">
						<h3 class="contacts__title">E-mail</h3>

						<a class="contacts__text contacts__sms" href="mailto:<?php echo get_post_meta( 2, 'maap-email', true ); ?>">
							<svg class="el-decor contacts__text-icon" aria-hidden="true"><use xlink:href="#sms" x="0" y="0"></use></svg>
							<?php echo get_post_meta( 2, 'maap-email', true ); ?>
						</a>
					</div>
				</div>
			</section>
		</div>
	</main>

<?php get_footer(); ?>