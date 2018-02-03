<?php 
/** Template Name:  Home */
get_header(); ?>
<!-- ******************** Buscador de Clientes ******************** -->
 <!--<div class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12">   
			<h3 style="color: white;">Search Products</h3>
			<form role="search" action="<?php echo site_url('/'); ?>" method="get" id="searchform">
				<input type="text" name="s" placeholder="Search Products"/>
				<input type="hidden" name="post_type" value="cliente" />
				<input type="submit" alt="Search" value="Search" />
			</form>
		</div>
	</div>
</div>

<li id="categories">
	<h2><?php _e( 'Categories:' ); ?></h2>
	<form id="category-select" class="category-select" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get">
		<?php wp_dropdown_categories( 'show_count=1&hierarchical=1' ); ?>
		<input type="submit" name="submit" value="view" />
	</form>
</li> -->


<div class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12">
			<form role="search" method="get" id="searchform" action="<?php echo site_url( '/' ); ?>">
				<?php echo my_dropdown('subsector', 'subsector'); ?>
                <?php echo my_dropdown('localidad', 'localidad'); ?>
				<input type="submit" id="searchsubmit" value="Buscar" />
			</form>
		</div>
	</div>
</div>






<?php get_footer(); ?>