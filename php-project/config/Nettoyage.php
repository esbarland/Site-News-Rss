<?php

class Nettoyage
{
    //Nettoyage de string
    public static function net_str(string $str, array $dVueErreur): string
    {
        if (!isset($str) || $str == "") {
            $dVueErreur[] = "ce paramètre est vide ou non existant.";
            $str = "";
        }
        if($str != filter_var($str, FILTER_SANITIZE_STRING)){
            $dVueErreur[] = "tentative d'injection de code.";
            $str = "";
        }

        return $str;
    }

    //Nettoyage de int
    public static function net_int(int $val, array $dVueErreur): int
    {
        if (!isset($val) || $val == "") {
            $dVueErreur[] = "ce paramètre est vide ou non existant.";
            $val = 0;
        }
        if($val != filter_var($val, FILTER_SANITIZE_NUMBER_INT)){
            $dVueErreur[] = "tentative d'injection de code.";
            $val = 0;
        }

        return $val;
    }

    //Nettoyage de url
    public static function net_url(string $val, array $dVueErreur): string
    {
        if (!isset($val) || $val == "") {
            $dVueErreur[] = "ce paramètre est vide ou non existant.";
            $val = 0;
        }
        if($val != filter_var($val, FILTER_SANITIZE_URL)){
            $dVueErreur[] = "tentative d'injection de code.";
            $val = 0;
        }

        return $val;
    }

}
?>

        