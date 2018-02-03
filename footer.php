</div>
<footer class="nb-footer">
	<div class="row">
		<div class="col-md-4">


			<div class="about">

			</div>
			<div id="MenuFooter" >
				<?php wp_nav_menu( 
					array(
					    'menu' => 'footer', 
						'theme_location' => 'Footer' 
						) 
					);?>
			</div>
		</div>

		<div class="col-xs-12 col-md-4 col-md-offset-4">
			<h5 style="color: #fff"><strong>Para Mayor Informacion Comuniquese a: </strong></h5>
			<h6 style="color: #fff"><strong>Telefonos y Whatapps</strong></h6>


			<h6 style="color: #fff"><strong>Email</strong></h6>

			<br><br>
		</div>


		<div class="span12">
			<p class="muted" style="color: #fff;text-align: center;"><small><strong>Copyright 2018© </strong></small></p>
		</div>
	</div>
</footer><!-- #colophon -->


</div>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
