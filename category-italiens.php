<?php
// Modèle pour la catégorie italiens

// pour enlever les info du post, après le titre de l'article
remove_action( 'genesis_entry_header', 'genesis_post_info', 12 );


//ajout du titre de l'article après le contenu
add_action('genesis_entry_footer','ap_titre_apres_contenu',5);
function ap_titre_apres_contenu(){ ?>
<h3>Le titre de mon article est : <?php the_title(); ?> </h3> 

<?php }// function ap_titre_apres_contenu()

// Ajout des infos après le catégories
add_action('genesis_entry_footer','genesis_post_info',12);

genesis();

?>