<?php 

use PHPUnit\Framework\TestCase;
use src\MinhaClasseAvancado;

require_once "src/MinhaClasseAvancado.php";

class MinhaClasseAvancadoTest extends TestCase
{
    
    public function testSomaCorreta()
    {
        $this->assertSame(0,                                  MinhaClasseAvancado::somar([0, 0, 0]),            'Não somando corretamente array de zeros');
        $this->assertSame(1,                                  MinhaClasseAvancado::somar([6, 0, -5]),           'Não somando corretamente');
        $this->assertSame(2,                                  MinhaClasseAvancado::somar([2]),                  'Não devolve o próprio argumento se receber apenas ele');
    }

    public function testSomaCorretaDecimais()
    {
        $this->assertSame(1.1,                                MinhaClasseAvancado::somar([0.1, 1]),             'Não somando corretamente decimais');
        $this->assertSame(2.1,                                MinhaClasseAvancado::somar([0.1000, 2]),          'Não somando corretamente numeros com casas decimais diferentes');
        $this->assertSame(3.1,                                MinhaClasseAvancado::somar([3.1]),                'Não devolve o próprio argumento se receber apenas ele');
    }

    public function testSomaComArgumentosInvalidos()
    { 
        $this->assertSame("Array não deve ser vazia",         MinhaClasseAvancado::somar([]),                   'Não traz erro com lista vazia');
        $this->assertSame("Array deve conter apenas números", MinhaClasseAvancado::somar([1, false]),           'Não traz erro com lista contendo boolean');
        $this->assertSame("Array deve conter apenas números", MinhaClasseAvancado::somar([1, null]),            'Não traz erro com lista contendo null');
        $this->assertSame("Array deve conter apenas números", MinhaClasseAvancado::somar([1, []]),              'Não traz erro com lista contendo array');
        $this->assertSame("Array deve conter apenas números", MinhaClasseAvancado::somar([1, new stdClass()]),  'Não traz erro com lista contendo objeto');
        $this->assertSame("Array deve conter apenas números", MinhaClasseAvancado::somar([1, "1"]),             'Não traz erro com lista contendo string numérica');
    }

    public function testSubtracaoCorreta()
    {
        $this->assertSame(0,                                  MinhaClasseAvancado::subtrair(5, 5),              'Não subtraindo corretamente');
        $this->assertSame(0,                                  MinhaClasseAvancado::subtrair(0, 0),              'Não subtraindo corretamente com zeros');
        $this->assertSame(0,                                  MinhaClasseAvancado::subtrair(-5, -5),            'Não subtraindo corretamente com negativos');
        $this->assertSame(10,                                 MinhaClasseAvancado::subtrair(5, -5),             'Não subtraindo corretamente com positivo e negativo');
        $this->assertSame(2,                                  MinhaClasseAvancado::subtrair(2),                 'Não devolve o próprio argumento se receber apenas ele');
    }

    public function testSubtracaoCorretaDecimais()
    {
        $this->assertSame(1.1,                                MinhaClasseAvancado::subtrair(2.2, 1.1),          'Não subtraindo corretamente decimais');
        $this->assertSame(2.1,                                MinhaClasseAvancado::subtrair(3.2, 1.100),        'Não subtraindo corretamente floats com casas decimais diferentes');
        $this->assertSame(3.1,                                MinhaClasseAvancado::subtrair(3.1),               'Não devolve o próprio argumento se receber apenas ele');

    }

    public function testSubtracaoComArgumentosInvalidos()
    {
        $this->assertSame("Apenas números são permitidos",    MinhaClasseAvancado::subtrair([]),                'Não traz erro com lista vazia');
        $this->assertSame("Apenas números são permitidos",    MinhaClasseAvancado::subtrair(1, false),          'Não traz erro com boolean');
        $this->assertSame("Apenas números são permitidos",    MinhaClasseAvancado::subtrair(1, null),           'Não traz erro com null');
        $this->assertSame("Apenas números são permitidos",    MinhaClasseAvancado::subtrair(1, []),             'Não traz erro com array');
        $this->assertSame("Apenas números são permitidos",    MinhaClasseAvancado::subtrair(1, new stdClass()), 'Não traz erro com objeto');
        $this->assertSame("Apenas números são permitidos",    MinhaClasseAvancado::subtrair(1, "1"),            'Não traz erro com string numérica');
    }
}