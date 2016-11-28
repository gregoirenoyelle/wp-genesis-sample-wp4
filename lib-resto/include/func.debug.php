<?php 

// Affichage debug print_r
if (!function_exists('aff_p')) {
 function aff_p($v) {
 echo "<pre style='background:#fff'>";
 print_r($v);
 echo "</pre>";
 }
}
// Affichage debug var_dump
if (!function_exists('aff_v')) {
 function aff_v($v) {
 echo "<pre style='background:#fff'>";
 var_dump($v);
 echo "</pre>";
 }
}