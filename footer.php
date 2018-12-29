<?php
    
    /*  
        @package simpletheme
    */
?>

<div class="container-fluid">
       
    <footer class="row simple-footer <?php ( is_active_sidebar( 'simple-footer-sidebar' ) ? print 'footer-sidebar' : print 'no-footer-sidebar' ); ?>">
        <div class="container">
            <?php get_sidebar('simple-footer-sidebar'); ?>
        </div>
    </footer>
    
    <div class="row">
        <div class="col-xs-12 text-center" style="background-color: #EBEBEB">
            <h6>Simple Theme <?php echo date('Y'); ?> </h6>
        </div>
    </div>
    
</div><!-- .container-fluid -->

<?php wp_footer(); ?>

</body>
</html>