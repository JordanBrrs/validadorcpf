<?php


if(isset($_POST['inputCPF']) && $_POST['inputCPF'] != ""){

    if(validarCPF($_POST['inputCPF']))
        echo '<h2>Válido!</h2>';
    else
        echo '<h2>Inválido!</h2>';
}

function validarCPF($cpf)
{
    $retorno = false;
    if(!empty($cpf))
    {         
        if($cpf == '11111111111' ||
            $cpf == '22222222222' ||
            $cpf == '33333333333' ||
            $cpf == '44444444444' ||
            $cpf == '55555555555' ||
            $cpf == '66666666666' ||
            $cpf == '77777777777' ||
            $cpf == '88888888888' ||
            $cpf == '99999999999'
         ) 
         {
             return false;
         }   

        //Essa sintaxe é do php 7
        $cpf = preg_replace("/[^0-9]/","",$cpf);
        $cpfTemp = substr($cpf,0,9);

        $primDigito = calculaDigito($cpfTemp);
        $cpfTemp .= $primDigito;

        $secDigito = calculaDigito($cpfTemp);
        $cpfTemp .= $secDigito;
                
        if($cpf == $cpfTemp)
           $retorno = true;
    }

    return $retorno;   
}

function calculaDigito($cpf)
{
    $arrayCPF = str_split($cpf);    

    if(count($arrayCPF) == 9)
        $pesos = 10;
    else
        $pesos = 11;

   $somatorio = 0;
   $digitoVerificador = 0;   

   for($i = 0; $i < count($arrayCPF); $i++){
       $somatorio +=  $arrayCPF[$i]  * ($pesos-$i);
   }

    $mod = $somatorio % 11;
    if($mod >= 2){
        $digitoVerificador = 11 - $mod;
    }

    return $digitoVerificador;
}