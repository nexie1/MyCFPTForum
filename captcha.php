<?php

/*
 * Auteur       : Fernandes Marco
 * Description  : Forum du CFPT
 * Version      : 1.0.0
 * Date         : 08.05.2019
 * Copyright    : Fernandes Marco
 */
session_start();

function number($n) {

    //str_pad Complète une chaîne jusqu'à une taille donnée
    return str_pad(mt_rand(0, pow(10, $n) - 1), $n, '0', STR_PAD_LEFT);
}

function image($word) {
    $width = strlen($word) * 10; //regle la largeur par rapport à la longueur du mot * 10
    $height = 20; //regle la hauteur de l'image
    $img = imagecreate($width, $height); //creer l'image
    $white = imagecolorallocate($img, 255, 255, 255);  //colore l'image en blanc
    $black = imagecolorallocate($img, 0, 0, 0);  //place un encadrer noir
    $midHeight = ($height / 2) - 8; //regle la hauteur des chiffres dans le captcha
    imagestring($img, 6, strlen($word) / 2, $midHeight, $word, $black);  //imagestring ( resource $image , int $font , int $x , int $y , string $string , int $color )
    imagerectangle($img, 1, 1, $width - 1, $height - 1, $black); // La bordure
    imagepng($img); //affiche ou sauvegarde une image au format PNG en utilisant l'image.
    imagedestroy($img); //libère toute la mémoire associée à l'image en gros sa détruit l'image
}

function captcha() {
    $word = number(5); //regle le nombre de numéros affiché dans le captcha
    $_SESSION['captcha'] = $word; //met en session
    image($word);
}

header("Content-type: image/png");
captcha();


