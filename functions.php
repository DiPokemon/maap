<?php

// Отключает Гутенберг (новый редактор блоков в WordPress).
if( 'disable_gutenberg' ){
	remove_theme_support( 'core-block-patterns' ); // WP 5.5

	add_filter( 'use_block_editor_for_post_type', '__return_false', 100 );

	// отключим подключение базовых css стилей для блоков
	// ВАЖНО! когда выйдут виджеты на блоках или что-то еще, эту строку нужно будет комментировать
	remove_action( 'wp_enqueue_scripts', 'wp_common_block_scripts_and_styles' );

	// Move the Privacy Policy help notice back under the title field.
	add_action( 'admin_init', function(){
		remove_action( 'admin_notices', [ 'WP_Privacy_Policy_Content', 'notice' ] );
		add_action( 'edit_form_after_title', [ 'WP_Privacy_Policy_Content', 'notice' ] );
	} );
};

if ( !function_exists( 'maap_setup' ) ) {
	// Регистрация новых возможностей:
	add_action( 'after_setup_theme', 'maap_setup' );

	function maap_setup() {
		// Добавляем динамический тег <title>:
		add_theme_support( 'title-tag' );

		// Добавляем миниатюры для постов и страниц:
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 1288, 453, true ); // Размер миниатюры поста по умолчанию
	};
};

// Подключение стилей и скриптов:
add_action( 'wp_enqueue_scripts', 'maap_scripts' );

// Регистрация нескольких областей меню:
add_action( 'init', 'maap_menus' );

// Переименование пункта «Записи» в «Новости»:
add_action( 'admin_menu', 'change_post_menu_label' );
add_action( 'init', 'change_post_object_label' );

// Регистрация нового(ых) типа(ов) записи(ей):
add_action( 'init', 'register_post_types_init' );

// Регистрация областей (сайдбаров) для виджетов:
add_action( 'widgets_init', 'maap_widgets_init' );

// Отключаем создание миниатюр файлов для указанных размеров:
add_filter( 'intermediate_image_sizes', 'delete_intermediate_image_sizes' );

// Удаляет H2 из шаблона пагинации:
add_filter( 'navigation_markup_template', 'maap_navigation_template', 10, 2 );

// Добавляет SVG в список разрешенных для загрузки файлов.
add_filter( 'upload_mimes', 'svg_upload_allow' );

// Исправление MIME типа для SVG файлов:
add_filter( 'wp_check_filetype_and_ext', 'fix_svg_mime_type', 10, 5 );

// Формирует данные для отображения SVG, как изображения в медиабиблиотеке:
add_filter( 'wp_prepare_attachment_for_js', 'show_svg_in_media_library' );



function maap_scripts() {
	// Дополнительные стили:
	wp_enqueue_style( 'main', get_stylesheet_uri() );
	if ( is_front_page() ) wp_enqueue_style( 'swiper', get_template_directory_uri() . '/assets/css/swiper-bundle.min.css', array( 'main' ), '1.0.0' );

	// Свои стили:
	wp_enqueue_style( 'maap', get_template_directory_uri() . '/assets/css/app.min.css', array( 'main' ), '1.0.3' );

	// Дополнительные скрипты:
	if ( is_page( 42 ) ) {
		wp_enqueue_script( 'ya-map', 'https://api-maps.yandex.ru/2.1/?apikey=e356458d-9bcd-426c-8a4c-c9e4eb51e91e&lang=ru_RU', array(), '1.0.0', true );

	} else if ( is_page( 40 ) ) {
		wp_enqueue_script( 're-google', 'https://www.google.com/recaptcha/api.js?render=6LcGzTAgAAAAAB2RMAG6q3__WKmUkdsEbIKRYhVs', array(), '1.0.0', true );
	};

	// Свой скрипт:
	wp_enqueue_script( 'custom', get_template_directory_uri() . '/assets/js/app.min.js', array(), '1.0.3', true );
};

function maap_menus() {
	// Области меню:
	$locations = array(
		'header'  => __( 'В шапке', 'maap' ),	);

	register_nav_menus( $locations );
};

function change_post_menu_label() {
	global $menu, $submenu;

	$menu[5][0] = 'Новости';
	$submenu['edit.php'][5][0] = 'Новости';
	$submenu['edit.php'][10][0] = 'Добавить новость';
	$submenu['edit.php'][16][0] = 'Новостные метки';
	echo '';
};

function change_post_object_label() {
	global $wp_post_types;

	$labels = &$wp_post_types['post']->labels;
	$labels->name = 'Новости';
	$labels->singular_name = 'Новости';
	$labels->add_new = 'Добавить новость';
	$labels->add_new_item = 'Добавить новость';
	$labels->edit_item = 'Редактировать новость';
	$labels->new_item = 'Добавить новость';
	$labels->view_item = 'Посмотреть новость';
	$labels->search_items = 'Найти новость';
	$labels->not_found = 'Не найдено';
	$labels->not_found_in_trash = 'Корзина пуста';
};

function register_post_types_init() {
	register_post_type( 'partners', [
		'labels' => [
			'name'								=> __('Партнёры'), // Основное название для типа записи.
			'singular_name'				=> __('Партнёр'), // Название для одной записи этого типа.
			'add_new'							=> __('Добавить партнёра'), // Для добавления новой записи.
			'add_new_item'				=> __('Добавление партнёра'), // Заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'						=> __('Редактирование партнёра'), // Для редактирования типа записи.
			'new_item'						=> __('Новый партнёр'), // Текст новой записи.
			'view_item'						=> __('Смотреть партнёра'), // Для просмотра записи этого типа.
			'search_items'				=> __('Искать партнёра'), // Для поиска по этим типам записи.
			'not_found'						=> __('Не найдено партнёра(ов)'), // Если в результате поиска ничего не было найдено.
			'not_found_in_trash'	=> __('Не найдено партнёра(ов) в корзине'), // Если не было найдено в корзине.
			'parent_item_colon'		=> '', // Для родителей (у древовидных типов).
			'menu_name'						=> __('Партнёры'), // Название меню.
		],
		'description'						=> 'Добавление логотипов и ссылок на сайт партнёров. Отображается в блоке на главной и на отдельной странице.',
		'public'								=> true,
		'publicly_queryable'		=> false, // Будут работать URL запросы для этого типа записей.
		'exclude_from_search'		=> 1, // Исключить ли этот тип записей из поиска по сайту. 1 (true) - да, 0 (false) - нет.
		'show_in_menu'					=> true, // Показывать ли в меню адмнки.
		'show_in_rest'					=> false, // Включает Gutenberg редактор.
		'menu_position'					=> 4, // Под пунктом «Записи».
		'menu_icon'							=> 'dashicons-groups', // Иконка в админ-меню - https://developer.wordpress.org/resource/dashicons/.
		'capability_type'				=> 'post',
		'hierarchical'					=> false, // Будут ли записи этого типа иметь древовидную структуру (как постоянные страницы).
		'supports'							=> [ 'title', 'thumbnail', 'excerpt' ], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		// 'taxonomies'						=> [],
		'has_archive'						=> false, // Включить поддержку страниц архивов для этого типа записей.
		'rewrite'								=> true, // Использовать ли ЧПУ для этого типа записи.
		'query_var'							=> false, // Зависит от 'publicly_queryable'
	] );

	register_post_type( 'structure', [
		'labels' => [
			'name'								=> __('Структура МААП'),
			'singular_name'				=> __('Сотрудник'),
			'add_new'							=> __('Добавить сотрудника'),
			'add_new_item'				=> __('Добавление сотрудника'),
			'edit_item'						=> __('Редактирование сотрудника'),
			'new_item'						=> __('Новый сотрудник'),
			'view_item'						=> __('Смотреть сотрудника'),
			'search_items'				=> __('Искать сотрудника'),
			'not_found'						=> __('Не найдено сотрудника(ов)'),
			'not_found_in_trash'	=> __('Не найдено сотрудника(ов) в корзине'),
			'parent_item_colon'		=> '',
			'menu_name'						=> __('Структура МААП'),
		],
		'description'						=> 'Добавление сотрудников ассоциации и краткой биографии.',
		'public'								=> true,
		'publicly_queryable'		=> true,
		'exclude_from_search'		=> 1,
		'show_in_menu'					=> true,
		'show_in_rest'					=> false,
		'menu_position'					=> 4,
		'menu_icon'							=> 'dashicons-id-alt',
		'capability_type'				=> 'post',
		'hierarchical'					=> false,
		'supports'							=> [ 'title', 'editor', 'excerpt' ],
		// 'taxonomies'						=> [],
		'has_archive'						=> false,
		'rewrite'								=> true,
		'query_var'							=> true,
	] );

	register_post_type( 'calendar', [
		'labels' => [
			'name'								=> __('Календарь мероприятий'),
			'singular_name'				=> __('Мероприятие'),
			'add_new'							=> __('Добавить мероприятие'),
			'add_new_item'				=> __('Добавление мероприятия'),
			'edit_item'						=> __('Редактирование мероприятия'),
			'new_item'						=> __('Новое мероприятие'),
			'view_item'						=> __('Смотреть мероприятие'),
			'search_items'				=> __('Искать мероприятие'),
			'not_found'						=> __('Не найдено мероприятия(ев)'),
			'not_found_in_trash'	=> __('Не найдено мероприятие(ев) в корзине'),
			'parent_item_colon'		=> '',
			'menu_name'						=> __('Календарь мероприятий'),
		],
		'description'						=> 'Добавление мероприятий ассоциации и вывода картинки о последнем на главную.',
		'public'								=> true,
		'publicly_queryable'		=> true,
		'exclude_from_search'		=> 0,
		'show_in_menu'					=> true,
		'show_in_rest'					=> false,
		'menu_position'					=> 4,
		'menu_icon'							=> 'dashicons-megaphone',
		'capability_type'				=> 'post',
		'hierarchical'					=> false,
		'supports'							=> [ 'title', 'editor', 'thumbnail', 'excerpt' ],
		// 'taxonomies'						=> [],
		'has_archive'						=> false,
		'rewrite'								=> true,
		'query_var'							=> true,
	] );

	register_post_type( 'registry', [
		'labels' => [
			'name'								=> __('Реестр МААП'),
			'singular_name'				=> __('Организация'),
			'add_new'							=> __('Добавить организацию'),
			'add_new_item'				=> __('Добавление организации'),
			'edit_item'						=> __('Редактирование организации'),
			'new_item'						=> __('Новая организация'),
			'view_item'						=> __('Смотреть организацию'),
			'search_items'				=> __('Искать организацию'),
			'not_found'						=> __('Не найдено организации(й)'),
			'not_found_in_trash'	=> __('Не найдено организации(й) в корзине'),
			'parent_item_colon'		=> '',
			'menu_name'						=> __('Реестр МААП'),
		],
		'description'						=> 'Добавление записей об организации (её наименование, кто руководитель и вид деятельности).',
		'public'								=> true,
		'publicly_queryable'		=> false,
		'exclude_from_search'		=> 0,
		'show_in_menu'					=> true,
		'show_in_rest'					=> false,
		'menu_position'					=> 4,
		'menu_icon'							=> 'dashicons-editor-table',
		'capability_type'				=> 'post',
		'hierarchical'					=> false,
		'supports'							=> [ 'title', 'editor', 'excerpt' ],
		// 'taxonomies'						=> [],
		'has_archive'						=> false,
		'rewrite'								=> true,
		'query_var'							=> false,
	] );
};

function maap_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Подвал сайта', 'maap' ),
		'id'            => "social-sidebar",
		'before_widget' => '<div id="%1$s" class="footer__widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="footer__widget-title">',
		'after_title'   => '</h3>'
	) );
};

function delete_intermediate_image_sizes( $sizes ){
	// Размеры которые нужно удалить:
	return array_diff( $sizes, [
		'medium_large',
		'large',
		'1536x1536',
		'2048x2048',
	] );
};

function maap_navigation_template( $template, $class ){
	return '
		<nav class="navigation %1$s" role="navigation">
			%3$s
		</nav>
	';
};

function svg_upload_allow( $mimes ) {
	$mimes['svg'] = 'image/svg+xml';

	return $mimes;
};

function fix_svg_mime_type( $data, $file, $filename, $mimes, $real_mime = '' ){
	if ( version_compare( $GLOBALS['wp_version'], '5.1.0', '>=' ) ) {
		$dosvg = in_array( $real_mime, [ 'image/svg', 'image/svg+xml' ] );

	} else {
		$dosvg = ( '.svg' === strtolower( substr($filename, -4) ) );
	};

	// mime тип был обнулен, поправим его
	// а также проверим право пользователя
	if ( $dosvg ) {
		// разрешим
		if( current_user_can('manage_options') ){

			$data['ext']  = 'svg';
			$data['type'] = 'image/svg+xml';
		}
		// запретим
		else {
			$data['ext'] = $type_and_ext['type'] = false;
		}
	};

	return $data;
};

function show_svg_in_media_library( $response ) {
	if ( $response['mime'] === 'image/svg+xml' ) {
		// С выводом названия файла
		$response['image'] = [
			'src' => $response['url'],
		];
	}

	return $response;
};


add_filter( 'excerpt_length', function(){
	return 20;
} );