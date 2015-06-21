<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package themesco
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <?php if ( is_active_sidebar( 'sidebar-3' ) ) : ?>
	
		<?php dynamic_sidebar( 'sidebar-3' ); ?>

<?php endif; ?>   
                    
<!--
                    <div class="col-md-4 centered">
                        <h4>THEMESCO</h4>
                        <ul class="footer-links">
                            <li><a href="#">Home</a>
                            </li>
                            <li><a href="#">Themes</a>
                            </li>
                            <li><a href="#">Support</a>
                            </li>
                            <li><a href="#">Login</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-4 centered">
                        <h4>Our Themes</h4>
                        <ul class="footer-links">
                            <li><a href="#">Blogging Themes</a>
                            </li>
                            <li><a href="#">Wedding Themes</a>
                            </li>
                            <li><a href="#">Business Themes</a>
                            </li>
                            <li><a href="#">All Themes</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-4 centered">
                        <h4>Resources</h4>
                        <ul class="footer-links">
                            <li><a href="#">Contact</a>
                            </li>
                            <li><a href="#">WordPress Services</a>
                            </li>
                            <li><a href="#">WordPress Hosting</a>
                            </li>
                            <li><a href="#">F.A.Q.</a>
                            </li>
                        </ul>
                    </div>
-->
                </div>
                <div class="col-md-6 centered social-col ">


                    <h4>Stay in Touch</h4>
                    <ul class="list-inline center-block ">
                        <li><i class="fa fa-facebook fa-3x"></i>
                        </li>
                        <li><i class="fa fa-google-plus fa-3x"></i>
                        </li>
                        <li><i class="fa fa-twitter fa-3x"></i>
                        </li>
                        <li><i class="fa fa-linkedin fa-3x"></i>
                        </li>
                    </ul>

                    <p>Subscribe to our Newsletter and we'll send you the latest themes!</p>

                    <form action="" method="post">

                        <input class="newsletter" type="text" id="" name="" placeholder="Enter your email address">

                        <input type="submit" value="Subscribe" class="btn btn-large btn-subscribe" />
                    </form>
                </div>
            </div>
        </div>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
