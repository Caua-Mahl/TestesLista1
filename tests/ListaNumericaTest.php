<?php

use PHPUnit\Framework\TestCase;
use src\ListaNumerica;

require_once "src/ListaNumerica.php";

class ListaNumericaTest extends TestCase
{
    public function testSomarElementos()
    {
        $this->assertSame(10,         ListaNumerica::somarElementos([1, 4, 5]),          'Somando errado positivos');
        $this->assertSame(10,         ListaNumerica::somarElementos([1, 4, 0, 5]),       'Somando errado com 0 dentro da array');
        $this->assertSame(-10,        ListaNumerica::somarElementos([-1, -4, -5]),       'Somando errado negativos');
        $this->assertSame(0,          ListaNumerica::somarElementos([5, 0, -5]),         'Somando errado negativos com positivos');
        $this->assertSame(0,          ListaNumerica::somarElementos([0, 0, 0]),          'Somando errado array de zeros');
        $this->assertSame(0,          ListaNumerica::somarElementos([]),                 'Somando errado com lista vazia');
        $this->assertSame(0,          ListaNumerica::somarElementos([1.1, -1.1]),        'Somando errado para números float'); 
    }

    public function testEncontrarMaiorElemento()
    {
        $this->assertEquals(5,        ListaNumerica::encontrarMaiorElemento([3,4,5]),    'Não retorna maior valor');
        $this->assertGreaterThan(1,   ListaNumerica::encontrarMaiorElemento([-1,0,2]),   'Não retorna maior valor ao misturar negativo com positivo e zero');
        $this->assertFalse(           ListaNumerica::encontrarMaiorElemento([]),         'Não retorna falso ao receber array vazia');
        $this->assertIsInt(           ListaNumerica::encontrarMaiorElemento([-1,0,2]),   'Não devolve inteiro em array com números');
    }

    public function testEncontrarMenorElemento()
    {
        $this->assertEquals(3,        ListaNumerica::encontrarMenorElemento([3,4,5]),    'Não retorna menor valor');
        $this->assertLessThan(0,      ListaNumerica::encontrarMenorElemento([-1,0,2]),   'Não retorna menor valor ao misturar negativo com positivo e zero');
        $this->assertFalse(           ListaNumerica::encontrarMenorElemento([]),         'Não retorna falso ao receber array vazia');
        $this->assertIsInt(           ListaNumerica::encontrarMenorElemento([-1,0,2]),   'Não devolve inteiro em array com números');
    }

    public function testOrdenarLista()
    {
        $this->assertIsArray(         ListaNumerica::ordenarLista([4, -1, 0]),           'Não retorna array');
        $this->assertEmpty(           ListaNumerica::ordenarLista([]),                   'Não retorna array vazia ao receber array vazia');
        $this->assertSame([-1, 0, 4], ListaNumerica::ordenarLista([4, -1, 0]),           'Não ordena em ordem crescente');
        $this->assertCount(3,         ListaNumerica::ordenarLista([4, -1, 0]),           'Não retorna array com mesmo tamanho');
    }

    public function testFiltrarNumerosPares()
    {
        $this->assertIsArray(         ListaNumerica::filtrarNumerosPares([1, -2, 0]),    'Não retorna array');
        $this->assertEmpty(           ListaNumerica::filtrarNumerosPares([]),            'Não retorna array vazia ao receber array vazia');
        $this->assertEmpty(           ListaNumerica::filtrarNumerosPares([-1,1]),        'Não retorna array vazia ao receber apenas impares');
        $this->assertSame([-2, 0],    ListaNumerica::filtrarNumerosPares([1, -2, 0]),    'Não retorna apenas pares ou altera a ordem');
        $this->assertCount(2,         ListaNumerica::filtrarNumerosPares([1, -2, 0]),    'Não retorna array com tamanho correto');
    }


}
