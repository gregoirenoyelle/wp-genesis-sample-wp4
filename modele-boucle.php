<?php // Template Name: Page avec boucle

//* Nouvelle boucle apres le oontenu principal
add_action('genesis_entry_content','ap_nouvelle_boucle',15);
function ap_nouvelle_boucle() {

// article du codex: http://codex.wordpress.org/Class_Reference/WP_Query
$ma_boucle = new WP_Query (
	array(
		'cat' => 4,
		'orderby' => 'title',
		'order' => 'ASC',
		'posts_per_page' => 3
	)
); // fin WP_Query 
?>
<ul>
<?php	
// début loop $ma_boucle
while ( $ma_boucle->have_posts() ) : $ma_boucle->the_post(); ?>
	
	<!-- les éléments de la boucle se trouvent ici -->
	<li><a href="<?php the_permalink();?>"><?php the_title(); ?></a> (article par <?php the_author(); ?>)</li>
<?php endwhile;
wp_reset_postdata();
// fin loop $ma_boucle	
?>
</ul>

<?php }  // Fin de la fonction Nouvelle boucle

//* Nouvelle boucle cuisinier
add_action('genesis_entry_content','ap_boucle_cuisinier',20);
function ap_boucle_cuisinier() {

// article du codex: http://codex.wordpress.org/Class_Reference/WP_Query
$boucle_cuisinier = new WP_Query (
	array(
		'post_type' => 'cuisinier',
		'orderby' => 'menu_order',
		'order' => 'ASC',
		'posts_per_page' => 2
	)
); // fin WP_Query 

// début loop $boucle_cuisinier
while($boucle_cuisinier->have_posts() ) : $boucle_cuisinier->the_post();
?>
	<article <?php post_class(); ?>>
		<h2><?php the_title(); ?>Titre</h2>
		<div class="texte-cuisinier"><?php the_field('ap_biographie'); ?></div>
		<a href="<?php the_permalink();?>">Lire la suite</a>
	</article>
<?php 
endwhile; wp_reset_postdata();

} // Fin de la fonction Boucle cuisinier

genesis();
?>