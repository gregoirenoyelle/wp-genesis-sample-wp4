<?php

// Template Name: Boucle meta

add_action('genesis_entry_content', 'resto_boucle_meta', 15);
function resto_boucle_meta() {

// Ici je sélectionne
// product où color=orange OU color=red et size=small cela donnera:
$args = array(
	'post_type'  => 'cuisinier',
	'meta_query' => array(
		'relation'    => 'OR',
		array(
			'key'     => 'gob_age', // Nom du champ ACF
			'value'   => 60, // Valeur du champ dans chaque contenu
			'type'    => 'numeric',
			'compare' => '>=', // Pour age supérieur ou égal à 60
		),
		array(
			'key'     => 'gob_email', // Nom du champ ACF
			'value'   => 'anne-sophie@pic.com', // Valeur du champ dans chaque contenu
			'compare' => '=', 
		),

	),
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

<?php } // FIN function resto_boucle_meta() 

genesis();