<?php

class Validation
{
    //Validation de string
    public static function val_str(string $str, array $dVueErreur): string
    {
        if (!isset($str) || $str == "") {
            $dVueErreur[] = "ce paramètre est vide ou non existant.";
            $str = "";
        }

        return $str;
    }

    //Validation de int
    public static function val_int(int $val, array $dVueErreur): int
    {
        if (!isset($val) || $val == "") {
            $dVueErreur[] = "ce paramètre est vide ou non existant.";
            $val = 0;
        }
        if($val != filter_var($val, FILTER_VALIDATE_INT)){
            $dVueErreur[] = "tentative d'injection de code.";
            $val = 0;
        }

        return $val;
    }

    //Validation de url
    public static function val_url(string $val, array $dVueErreur): string
    {
        if (!isset($val) || $val == "") {
            $dVueErreur[] = "ce paramètre est vide ou non existant.";
            $val = 0;
        }
        if($val != filter_var($val, FILTER_VALIDATE_URL)){
            $dVueErreur[] = "tentative d'injection de code.";
            $val = 0;
        }

        return $val;
    }

}
?>

        