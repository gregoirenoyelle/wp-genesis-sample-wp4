<?php
// Template Name: Boucle Tax Query

//* Boucle après le contenu avec Tax Query
add_action( 'genesis_entry_content', 'ap_boucle_tax_query', 15 );
function ap_boucle_tax_query() {
$boucle_taxo = new WP_Query (
	array(
		'post_type' => array('cuisinier', 'post'),
		'tax_query' => array(
			'relation' => 'OR',
			array(
				'taxonomy' => 'etoile',
				'field' => 'slug',
				'terms' => array( '1-etoile', '2-etoiles' )
				),
			array(
				'taxonomy' => 'category',
				'field' => 'slug',
				'terms' => 'brasseries'
				)
			), // fin Tax Query
		'orderby' => 'title',
		'posts_per_page' => 40
	)
); // fin WP_Query
?>
	<?php if( $boucle_taxo->have_posts() ) :  ?>

	<div class="boucle-variee">
	<h3>Boucle sur contenu mixte</h3>
		<ul>
		<?php while( $boucle_taxo->have_posts() ) : $boucle_taxo->the_post(); ?>
			<li><a href="<?php the_permalink();?>"><?php the_title(); ?></a></li>

		<?php
			endwhile;
			wp_reset_postdata();
		?>
		</ul>
	</div>

	<?php else : ?>

		<p>Pas d'article avec cette requête !</p>

	<?php endif; ?>

<?php } // FIN function ap_boucle_tax_query()



//* Boucle après le contenu avec Meta Query
add_action( 'genesis_entry_content', 'ap_boucle_meta_query', 20 );
function ap_boucle_meta_query() {
$boucle_meta = new WP_Query (
	array(
		'post_type' => 'cuisinier',
		'meta_query' => array(
			array(
				'key' => 'gob_age', // Champ ACF
				'value'   => 60, // Valeur du champ
				'type'    => 'numeric', // C'est un nombre
				'compare' => '>=', // Valeur supérieure ou égale à 60 (voir value)
			)
		),
		'posts_per_page' => 40
	)
); // fin WP_Query
?>
	<?php if( $boucle_meta->have_posts() ) :  ?>

	<h3>Cuisiniers de plus de 60 ans</h3>

	<ul>
		<?php while( $boucle_meta->have_posts() ) : $boucle_meta->the_post(); ?>
			<li><a href="<?php the_permalink();?>"><?php the_title(); ?></a></li>
		<?php
			endwhile;
			wp_reset_postdata();
		?>
	</ul>

	<?php else : ?>

		<p>Pas d'article avec cette requête !</p>

	<?php endif; ?>

<?php } // FIN function ap_boucle_meta_query()

genesis();