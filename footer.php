<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package theme-tsarenko
 */

?>

</div><!-- #content -->

<footer id="colophon" class="site-footer" role="contentinfo">
    <div class="site-info">
        <a href="<?php echo esc_url(__('https://wordpress.org/', 'theme-tsarenko')); ?>"><?php printf(esc_html__('Proudly powered by %s', 'theme-tsarenko'), 'WordPress'); ?></a>
        <span class="sep"> | </span>
        <?php printf(esc_html__('Theme: %1$s by %2$s.', 'theme-tsarenko'), 'theme-tsarenko', '<a href="https://automattic.com/" rel="designer">Underscores.me</a>'); ?>
    </div><!-- .site-info -->
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
</body>
</html>
