<?php


if(isset($_GET['inputCNPJ']) && $_GET['inputCNPJ'] != ""){

    $cnpj = $_GET['inputCNPJ'];
        
    if(validaCNPJ($cnpj))
        echo '<h2>Válido!</h2>';
    else
        echo '<h2>Inválido!</h2>';

}

function validaCNPJ($cnpj)
{
    $cnpj = preg_replace("/[^0-9]/","",$cnpj);
    
    $cnpjTemp = substr($cnpj,0,12);    
    $primDigito = calculaDigito($cnpjTemp);
    $cnpjTemp .= $primDigito;
    $secDigito = calculaDigito($cnpjTemp);

    $cnpjTemp .= $secDigito;

    if($cnpj == $cnpjTemp)
        return true;
    else
        return false;    
        
}


function calculaDigito($cnpj){

    $digitoVerificador = 0;
    $somatorio = 0;

    $arrayCNPJ = str_split($cnpj);

    $arrayPesos = [5,4,3,2,9,8,7,6,5,4,3,2];    
    if(count($arrayCNPJ)==13)
        array_unshift($arrayPesos,6);

    for($i = 0; $i < count($arrayPesos); $i++){
        $somatorio += $arrayCNPJ[$i] * $arrayPesos[$i];
    }
    
    $mod = $somatorio % 11;
    
    if($mod >= 2)
        $digitoVerificador = 11 - $mod;

    return $digitoVerificador;
}
