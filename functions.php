<?php

//ENQUEUE CSS/JS
require get_template_directory() . '/inc/enqueue.php';

//STRIP META WP VER. FROM FONT-END
require get_template_directory() . '/inc/cleanup.php';

//THEME SUPPORT FUNCTIONS
require get_template_directory() . '/inc/theme-support.php';

//CUSTOM ADMIN FUNCTIONS
require get_template_directory() . '/inc/function-admin.php';

//WALKER FUNCTIONS
require get_template_directory() . '/inc/walker.php';

//WIDGET FUNCTIONS
require get_template_directory() . '/inc/widgets.php';

//SHORTCODE FUNCTIONS
require get_template_directory() . '/inc/shortcodes.php';

//CUSTOM POST TYPE FUNCTIONS
require get_template_directory() . '/inc/custom-post-type.php';

//CUSTOM AJAX FUNCTIONS
require get_template_directory() . '/inc/ajax.php'; 