<?php get_header(); ?>

<section class="listado-articulos">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>    
		<div id="post-<?php the_ID(); ?>" class="posts">        
			<article>        
				<h4><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h4>        
				<p><?php the_excerpt(); ?></p>        
				<p align="right"><a href="<?php the_permalink(); ?>">Read     More</a></p>    
			</article><!-- #post -->    
			<?php endwhile; ?>
		</div>

	<?php else : ?>
		<section class="error">
			<article> <!-- class="<?php post_class();?>" -->
				<header>
					<h1>Sin Resultados</h1>
				</header>
			</article>
		</section>
<?php endif; ?> 
		<?php wp_reset_postdata(); ?>

</section>
<?php get_footer(); ?>
