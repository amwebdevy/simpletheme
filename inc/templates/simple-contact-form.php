<h1>Simple Contact Form</h1>

<?php settings_errors(); ?>

<p>Use this <strong>shortcode</strong> to activate the Contact Form inside a Page or a Post</p>

<p><code>[contact_form]</code></p>

<form method="post" action="options.php" class="simple-general-form activate-contact">
    <?php  settings_fields( 'simple-contact-options' );  ?>
    <?php  do_settings_sections('simple_theme_contact');  ?>
    <?php  submit_button(); ?>
</form>