<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- 	<meta name="description" content="Московская ассоциация азербайджанских предпринимателей"> -->
	<meta name="keywords" content="">

	<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/assets/favicon.svg">
	<meta name="theme-color" content="#fff">

	<?php wp_head(); ?>
</head>
<body>

	<header class="wrapper header">
		<div class="wrapper__content header__wrap">
			<?php if (is_front_page()) { echo '<span class="header__logo">'; } else { echo '<a href="/" class="header__logo" title="На главную">'; }; ?>
				<svg class="el-decor header__logo-icon" aria-hidden="true" viewBox="0 0 531 165" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path fill="url(#header-a)" d="M94.72 73.889V0l94.72 164.058h-42.661L94.72 73.889Z"></path>
					<path fill="url(#header-b)" d="M42.661 164.058H0L94.72 0v73.889l-52.059 90.169Z"></path>
					<path fill="url(#header-c)" d="m94.72 129.5-19.943 34.558h39.886L94.72 129.5Z"></path>
					<path fill="url(#header-d)" d="M161.431 115.514a78.753 78.753 0 0 1-27.38 26.455l12.728 22.089h42.661l-28.009-48.544Z"></path>
					<path fill="url(#header-e)" d="M28.009 115.514 0 164.058h42.661l12.728-22.089c-11.137-6.438-20.535-15.54-27.38-26.455Z"></path>
					<path fill="url(#header-f)" d="m82.029 151.478-7.252 12.58h39.886l-7.252-12.58a79.736 79.736 0 0 1-12.691 1.036c-4.329 0-8.547-.37-12.691-1.036Z"></path>
					<path fill="#00588C" d="m148.675 161.414-50.95-88.651-.675.388 50.949 88.651.676-.388ZM185.195 161.544 97.709 9.318l-.676.388 87.486 152.227.676-.389ZM92.392 9.703l-.676-.389L4.23 161.541l.676.388L92.392 9.703ZM92.394 73.151l-.676-.388-50.949 88.651.676.388 50.949-88.65Z"></path>
					<path class="header__logo-name" fill="#0F3057" d="m253.768 129.439-14.599-51.416h-.44c.13 1.335.261 3.141.391 5.42.163 2.279.309 4.736.439 7.373.131 2.637.196 5.176.196 7.617v31.006h-17.09V58.052h25.683l14.893 50.684h.391l14.599-50.684h25.733v71.387h-17.725V98.14c0-2.246.033-4.655.098-7.226.097-2.605.195-5.046.293-7.325.13-2.31.244-4.134.341-5.468h-.439l-14.404 51.318h-18.36Zm109.375 0-3.515-13.379h-23.194l-3.613 13.379H311.63l23.291-71.68h25.732l23.584 71.68h-21.094Zm-7.519-29.199-3.076-11.719c-.326-1.27-.798-3.076-1.416-5.42a594.909 594.909 0 0 1-1.856-7.324 223.814 223.814 0 0 1-1.367-6.25c-.293 1.627-.716 3.646-1.27 6.055a245.871 245.871 0 0 1-1.66 7.08 187.118 187.118 0 0 1-1.465 5.859l-3.076 11.719h15.186Zm80.176 29.199-3.516-13.379h-23.193l-3.614 13.379h-21.191l23.291-71.68h25.732l23.584 71.68H435.8Zm-7.52-29.199-3.076-11.719c-.326-1.27-.798-3.076-1.416-5.42a594.909 594.909 0 0 1-1.856-7.324 227.506 227.506 0 0 1-1.367-6.25c-.293 1.627-.716 3.646-1.269 6.055a249.263 249.263 0 0 1-1.661 7.08 190.345 190.345 0 0 1-1.464 5.859l-3.077 11.719h15.186Zm36.377 29.199V58.052h58.496v71.387h-19.434V73.824h-19.677v55.615h-19.385Z"></path>

					<defs>
						<linearGradient id="header-a" x1="94.72" y1="82.029" x2="189.44" y2="82.029" gradientUnits="userSpaceOnUse">
							<stop stop-color="#1C5D7E"></stop>
							<stop offset=".623" stop-color="#09264F"></stop>
							<stop offset="1" stop-color="#000F37"></stop>
						</linearGradient>
						<linearGradient id="header-b" x1="0" y1="82.029" x2="94.72" y2="82.029" gradientUnits="userSpaceOnUse">
							<stop stop-color="#1C5D7E"></stop>
							<stop offset=".623" stop-color="#09264F"></stop>
							<stop offset="1" stop-color="#000F37"></stop>
						</linearGradient>
						<linearGradient id="header-c" x1="94.72" y1="164.059" x2="94.72" y2="105.342" gradientUnits="userSpaceOnUse">
							<stop stop-color="#1C5D7E"></stop>
							<stop offset=".623" stop-color="#09264F"></stop>
							<stop offset="1" stop-color="#000F37"></stop>
						</linearGradient>
						<linearGradient id="header-d" x1="140.004" y1="131.654" x2="191.113" y2="161.162" gradientUnits="userSpaceOnUse">
							<stop stop-color="#000F37"></stop>
							<stop offset=".377" stop-color="#09264F"></stop>
							<stop offset="1" stop-color="#1C5D7E"></stop>
						</linearGradient>
						<linearGradient id="header-e" x1="16.452" y1="172.507" x2="46.011" y2="121.308" gradientUnits="userSpaceOnUse">
							<stop stop-color="#1C5D7E"></stop>
							<stop offset=".623" stop-color="#09264F"></stop>
							<stop offset="1" stop-color="#000F37"></stop>
						</linearGradient>
						<linearGradient id="header-f" x1="94.72" y1="151.486" x2="94.72" y2="164.059" gradientUnits="userSpaceOnUse">
							<stop stop-color="#000F37"></stop>
							<stop offset=".377" stop-color="#09264F"></stop>
							<stop offset="1" stop-color="#1C5D7E"></stop>
						</linearGradient>
					</defs>
				</svg>
				<?php if (is_front_page()) { echo '</span>'; } else { echo '</a>'; }; ?>

			<?php get_search_form(); ?>

			<div class="header__contact">
				<a class="header__contact-item header__contact-item--call" href="tel:<?php echo get_post_meta( 2, 'maap-phone', true ); ?>">
					<svg class="el-decor header__contact-icon" aria-hidden="true"><use xlink:href="#call" x="0" y="0"></use></svg>
					<?php echo get_post_meta( 2, 'maap-phone', true ); ?>
				</a>

				<a class="header__contact-item header__contact-item--sms" href="mailto:<?php echo get_post_meta( 2, 'maap-email', true ); ?>">
					<svg class="el-decor header__contact-icon" aria-hidden="true"><use xlink:href="#sms" x="0" y="0"></use></svg>
					<?php echo get_post_meta( 2, 'maap-email', true ); ?>
				</a>
			</div>

			<button class="header__burger" type="button"><span class="header__burger-line">Кнопка меню</span></button>

			
			<?php
				wp_nav_menu( array(
					'theme_location'	=> 'header',
					'container'				=> 'nav',
					'container_class'	=> 'header__navbar',
					'menu_class'			=> 'header__navbar-list',
					'echo'						=> true,
					'items_wrap'			=> '<ul id="%1$s" class="%2$s">%3$s</ul>',
					'depth'						=> 2,
				) );
			?>
		</div>
	</header>