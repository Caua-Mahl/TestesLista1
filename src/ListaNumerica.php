<?php

namespace src;

use function PHPUnit\Framework\isEmpty;

class ListaNumerica
{
    public static function somarElementos(array $array): int
    {
        return array_sum($array);
    }

    public static function encontrarMaiorElemento(array $array): int|bool
    {
        if (empty($array)) {
            return False;
        }

        return max($array);
    }

    public static function encontrarMenorElemento(array $array): int|bool
    {
        if (empty($array)) {
            return False;
        }

        return min($array);
    }

    public static function ordenarLista(array $array): array
    {
        if (empty($array)) {
            return [];
        }

        sort($array);
        return $array;
    }

    public static function filtrarNumerosPares(array $array): array
    {
        if (empty($array)) 
        {
            return [];
        }

        $pares= [];

        for($i=0; $i<count($array); $i++)
        {
            if($array[$i] % 2 == 0)
            {
                $pares[] = $array[$i];
            }
        }

        return $pares;
    }
}
