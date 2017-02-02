<?php
// Variable vide pour l'affichage le HTML à la fin
$output = '';
// Récupérer la valeur du répéteur qui sera un tableau
// Elle me servira pour compter les éléments
$titres = get_field('ap_textes', $acfw);
// aff_v($titres);

// Déclaration du compteur
$i = 1;
// Récupérer le nombre de rang dans le répéteur dans la variable $count
$count = count($titres);

$output .= '<h3 class="rotate">';
	// Début de la boucle
	while ( have_rows('ap_textes', $acfw) ) : the_row();

		// Affichage du texte
		$output .= get_sub_field('ap_texte', $acfw);
		// Si le $i est inférieur au nombre de rang ($count)
		// afficher le caractère "*" qui permet la rotation du texte
		// Voir fichier /wp-content/plugins/acf-texte-rotator/lib/func.wordpress.php
		if ($i < $count ) {
			$output .= '*';
		}
		// Augmenter la valeur de $i à chaque passage dans la boucle
		$i++;
	// fin de la boucle
	endwhile;
$output .= '</h3>';

// Affichage de tout le contenu HTML
echo $output;
