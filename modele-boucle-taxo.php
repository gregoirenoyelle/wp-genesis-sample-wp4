<?php
// Template Name: Boucle Tax Query

//* Boucle après le contenu
add_action( 'genesis_entry_content', 'ap_boucle_tax_query', 15 );
function ap_boucle_tax_query() { 
$boucle_taxo = new WP_Query (
	array(
		'post_type' => 'cuisinier',
		'tax_query' => array(
			'relation' => 'OR',
			array(
				'taxonomy' => 'etoile',
				'field' => 'slug',
				'terms' => array( '1-etoile', '2-etoiles' ) 
				),
			array(
				'taxonomy' => 'style',
				'field' => 'slug',
				'terms' => 'academique' 
				)			
			), // fin Tax Query
		'orderby' => 'title',
		'posts_per_page' => 40
	)
); // fin WP_Query 
?>	
	<?php if( $boucle_taxo->have_posts() ) :  ?>

	<div class="tous-cuisiniers">
		<?php while( $boucle_taxo->have_posts() ) : $boucle_taxo->the_post(); ?>
			<article class="cuisinier">
				<h3 class="titre-cuisinier"><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h3>
				<div class="bio-cuisinier"><?php the_field('ap_biographie'); ?></div>
			</article>
		<?php 
			endwhile; 
			wp_reset_postdata();
		?>
	</div>

	<?php else : ?>

		<p>Pas d'article avec cette requête !</p>

	<?php endif; ?>

<?php } // FIN function ap_boucle_tax_query()

genesis();