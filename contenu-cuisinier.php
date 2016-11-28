<?php
// Code pour afficher tous les réglages des fiches cuisinier


// pour enlever les info du post, après le titre de l'article
remove_action( 'genesis_entry_header', 'genesis_post_info', 12 );
add_action('genesis_entry_header', 'ap_taxo_etoile', 12 );
function ap_taxo_etoile() {
	// pour récupérer l'identifiant d'un post
	global $post;
	// aff_p($post);

	echo get_the_term_list( $post->ID, 'etoile', '<p class="entry-meta">Nombre d\'étoiles&nbsp;: ', ', ', '</p>' );
}

// Affichage du contenu ACF : Fiche cuisinier
add_action('genesis_entry_content','ap_contenu_fiche_cuisinier');
function ap_contenu_fiche_cuisinier () { 

//variables ACF pour l'image
$image_id = get_field('ap_photo');
$taille_image = 'cuisinier-2';
$img = wp_get_attachment_image($image_id, $taille_image);
$img2 = wp_get_attachment_image( $image_id, $taille_image);

// Pour afficher tous les champs ACF disponibles
// $acf = get_fields();
// aff_p($acf);

	?>
	<div class="biographie">
		<h3>Biographie</h3>

		<!--  Condition pour cliquer sur l'image quand on est pas sur la single-cuisinier et accéder à la biographie -->
		<div class="photo">
			<?php if( !is_singular('cuisinier')) { ?>
			<a href="<?php the_permalink(); ?>">
				<?php echo $img ?>	
			</a>

			<?php } else { 
				 	echo $img;
			 	  } 
			 ?>
		</div>		

		<!--  Condition pour afficher ou pas la biographie -->
		<?php if(is_singular('cuisinier' )){ ?>
			<div class="texte-biographie">
				<?php the_field('ap_biographie');?>
			</div>
		<?php } else { ?>
			<p><a href="<?php the_permalink(); ?>">Voir la biographie complète</a></p>
		<?php }?>


	<div class="info-pratique">
		<h3>Informations pratiques</h3>
			<ul class="liste-info-pratique">
				<li>Restaurant&nbsp;: <?php the_field('ap_restaurant');?></li>
				<li>Âge&nbsp;:<?php the_field('ap_age');?>&nbsp;ans </li>
				<li><a href="<?php the_field('ap_site_web');?>" target="_blank">Site internet</a></li>
				<li><a href="mailto:<?php the_field('ap_email');?>">Envoyer un email</a></li>
				<li><a href="<?php the_field('ap_cv_en_pdf');?>">Télécharger le fichier</a></li>
			</ul>
	</div>




<?php } //FIN de Function ap_contenu_fiche_cuisinier