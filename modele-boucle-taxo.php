<?php

// Template Name: Boucle Taxo 

// Boucle de cuisinier après le contenu principal
add_action( 'genesis_entry_content', 'resto_boucle_taxo', 15 );
function resto_boucle_taxo() {
$args = array(
	'post_type' => 'cuisinier',
	'tax_query' => array(
		array(
			'taxonomy' => 'etoile',
			'field'    => 'slug',
			'terms'    => '2-etoiles',
		),
	)
);
$ma_boucle = new WP_Query( $args );
?>
<ul>
<?php	
// début loop $ma_boucle
while ( $ma_boucle->have_posts() ) : $ma_boucle->the_post(); ?>
	
	<!-- les éléments de la boucle se trouvent ici -->
	<li><?php the_title(); ?></li>
	
<?php endwhile;
wp_reset_postdata();
// fin loop $ma_boucle	
?>
</ul>

<?php }

genesis();