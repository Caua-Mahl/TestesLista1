<?php

use PHPUnit\Framework\TestCase;
use src\ListaNumerica;

require_once "src/ListaNumerica.php";

class ListaNumericaTest extends TestCase
{
    public function testListaNumerica()
    {
        $this->assertEquals(10, ListaNumerica::SomarElementos([1, 4, 5]),    'Somando errado');
        $this->assertEquals(10, ListaNumerica::SomarElementos([1, 4, 0, 5]), 'Somando errado com 0 dentro da array');
        $this->assertEquals(0, ListaNumerica::SomarElementos([0, 0, 0]),    'Somando errado array de zeros');

    }
}
