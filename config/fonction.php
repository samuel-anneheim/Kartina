<?php


// Remplace tous les accents par leur équivalent sans accent.
function accents($prenom, $nom) {

    $search  = array('À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'Ù', 'Ú', 'Û', 'Ü', 'Ý', 'à', 'á', 'â', 'ã', 'ä', 'å', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ð', 'ò', 'ó', 'ô', 'õ', 'ö', 'ù', 'ú', 'û', 'ü', 'ý', 'ÿ', " ");

    $replace = array('A', 'A', 'A', 'A', 'A', 'A', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'O', 'O', 'O', 'O', 'O', 'U', 'U', 'U', 'U', 'Y', 'a', 'a', 'a', 'a', 'a', 'a', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'o', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u', 'y', 'y', "");

    $name = str_replace($search, $replace, $prenom);
    $name .= str_replace($search, $replace, $nom);


    return $name;
};

function email_space($email){

    $email = str_replace(" ", "", $email);

    return $email;

}

function reduction($chaine, $max) {

    if (strlen($chaine) >= $max) {
        $chaine = substr($chaine, 0, $max);
        $espace = strrpos($chaine, " ");
        if ($espace)
            $chaine = substr($chaine, 0, $espace);
        $chaine .= '...';
    }
    return $chaine;
}
