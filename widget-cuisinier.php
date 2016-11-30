<?php 
// Widget Cuisinier

// Variable 
$term = get_field('acfw_nombre_detoile', $acfw);
$photo = get_field('acfw_afficher_la_photo', $acfw);
$bio = get_field('acfw_afficher_la_bio', $acfw);
$nombre = get_field('acfw_nombre_afficher', $acfw); 
$intro = get_field('acfw_afficher_intro', $acfw);


$boucle_taxo = new WP_Query (
	array(
		'post_type' => 'cuisinier',
		'tax_query' => array(
			array(
				'taxonomy' => 'etoile',
				'field' => 'term_id',
				'terms' => $term 
				),
			), // fin Tax Query
		'orderby' => 'title',
		'posts_per_page' => $nombre
	)
); // fin WP_Query 

?>

<h3><?php the_field('acw_titre_widget', $acfw); ?></h3>	
<?php if ( $intro ) { ?>
	<?php the_field('acw_intro', $acfw); ?>
<?php } ?>		

<?php while( $boucle_taxo->have_posts() ) : $boucle_taxo->the_post(); 
// $acf = get_fields();
// aff_p($acf);
// Variable pour l'image ACF
$image_id = get_field('ap_photo');
$taille_image = 'cuisinier-2';
$img = wp_get_attachment_image($image_id, $taille_image);
// aff_v($image_id);

?>
	<article class="cuisinier">
		<?php if ( $photo ) { ?>
			<a href="<?php the_permalink();?>">
				<?php echo $img; ?>
			</a>
		<?php } ?>
		<h3 class="titre-cuisinier"><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h3>
		<?php if ( $bio ) { ?>
			<div class="bio-cuisinier"><?php the_field('ap_biographie'); ?></div>
		<?php } ?>
	</article>
<?php 
	endwhile; 
	wp_reset_postdata();
?>
