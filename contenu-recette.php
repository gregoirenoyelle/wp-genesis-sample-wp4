<?php

// Code pour afficher tous les réglages des fiches recettes

// pour enlever les info du post, après le titre de l'article
remove_action('genesis_entry_header','genesis_post_info',12 );

// pour afficher la Taxonomie
add_action('genesis_entry_header', 'ap_taxo_facilite', 12 );
function ap_taxo_facilite() {
	global $post;
	echo get_the_term_list( $post->ID, 'facilite', '<p class="entry-meta">', '', '</p>' );
} // FIN de Function ap_taxo_facilite

// Affichage du contenu ACF : Fiche recette
add_action('genesis_entry_content','ap_contenu_fiche_recette');
function ap_contenu_fiche_recette () { 

//variables ACF pour l'image
$image_id = get_field('ap_photo_recette');
$taille_image = 'recette';
$img = wp_get_attachment_image($image_id, $taille_image);
$acf = get_fields();

	?>


<div class="preparation">
	<div class="photo-recette"><?php echo $img ?></div>

<!-- Condition pour ne pas afficher les ingrédients
 --><?php if(is_singular('recette')){ ?>	
	<div class="ingredients"><?php the_field('ap_ingredients')?></div>
	<?php }?>
	
	<div class="nombre-de-personne"><?php the_field('ap_nombre_de_personne')?></div>
	
	<!-- 	Condition pour ne pas afficher la préparation
 --><?php if(is_singular('recette')){ ?>
	<div class="texte-preparation"><?php the_field('ap_preparation')?></div>
	<?php } else { ?>
	<p><a href="<?php the_permalink(); ?>">Voir la recette... </a></p>
		<?php }?>
	
</div>

<?php } //FIN de Function ap_contenu_fiche_recette


?>