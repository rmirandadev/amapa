<?php

function LimitChar($texto, $limite, $quebra = false)
{
    $tamanho = strlen($texto);
    if ($tamanho <= $limite) { //Verifica se o tamanho do texto é menor ou igual ao limite
        $novo_texto = $texto;
    } else { // Se o tamanho do texto for maior que o limite
        if ($quebra == true) { // Verifica a opção de quebrar o texto
            $novo_texto = trim(substr($texto, 0, $limite)) . "...";
        } else { // Se não, corta $texto na última palavra antes do limite
            $ultimo_espaco = strrpos(substr($texto, 0, $limite), " "); // Localiza o útlimo espaço antes de $limite
            $novo_texto = trim(substr($texto, 0, $ultimo_espaco)) . "..."; // Corta o $texto até a posição localizada
        }
    }
    return $novo_texto; // Retorna o valor formatado
}

function GetMonth($month)
{
    if($month == '01'){
        return 'Janeiro';
    }elseif ($month == '02'){
        return 'Fevereiro';
    }elseif ($month == '03'){
        return 'Março';
    }elseif ($month == '04'){
        return 'Abril';
    }elseif ($month == '05'){
        return 'Maio';
    }elseif ($month == '06'){
        return 'Junho';
    }elseif ($month == '07'){
        return 'Julho';
    }elseif ($month == '08'){
        return 'Agosto';
    }elseif ($month == '09'){
        return 'Setembro';
    }elseif ($month == '10'){
        return 'Outubro';
    }elseif ($month == '11'){
        return 'Novembro';
    }elseif ($month == '12'){
        return 'Dezembro';
    }
}


