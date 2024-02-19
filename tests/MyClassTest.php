<?php 

use PHPUnit\Framework\TestCase;
use src\MyClass;
use BancoDeDados\BancoDeDados;

require_once "BancoDeDados/BancoDeDados.php";
require_once "src/MyClass.php";

class MyClassTest extends TestCase
{public function testAddMethods()
    {
        $myClass = $this->getMockBuilder(MyClass::class)
                        ->disableOriginalConstructor()
                        ->onlyMethods(['passarDeAno'])
                    //  ->addMethods(['passarDeAno'])
                        ->getMock();
    
        $this->assertTrue(method_exists($myClass, 'passarDeAno'));
    }

    public function testSetConstructorArgs() 
    {
        $bancoDeDados = $this->createMock(BancoDeDados::class);
        $myClass      = $this->getMockBuilder(MyClass::class)
                             ->setConstructorArgs([$bancoDeDados, 1])
                             ->getMock();
        
        $this->assertIsObject($myClass);
        $this->assertEquals(1, $myClass->id);
        $this->assertInstanceOf(BancoDeDados::class, $myClass->bancoDeDados);
    }


    public function testSetMockClassName()
    {
        $myClass = $this->getMockBuilder(MyClass::class)
                        ->setMockClassName('MinhaClasseMock')
                        ->disableOriginalConstructor()
                        ->getMock();

        $this->assertSame('MinhaClasseMock', get_class($myClass));
    }

    public function testDisableOriginalConstructor()
    {
        $myClass = $this->getMockBuilder(MyClass::class)
                        ->disableOriginalConstructor()
                        ->getMock();

        $this->assertIsObject($myClass);
        $this->assertFalse(isset($myClass->bancoDeDados));
        $this->assertFalse(isset($myClass->id));
    }

    public function testDisableOriginalClone()
    {
        $bancoDeDados = $this->createMock(BancoDeDados::class);
        $myClass      = $this->getMockBuilder(MyClass::class)
                             ->setConstructorArgs([$bancoDeDados, 1])
                             ->disableOriginalClone()
                             ->getMock();

        $myClassClone = clone $myClass;

        $this->assertIsObject($myClassClone);
        $this->assertEquals(1, $myClassClone->id);
    }    

    public function testDisableAutoload()
    {
        $myClass= $this->getMockBuilder(MyClass::class)
                    // ->disableAutoload()
                       ->disableOriginalConstructor()
                       ->getMock();
            
        $this->assertIsObject($myClass);

    }

    public function testMethodWillReturnAprovado()
    {
        $myClass = $this->createMock(MyClass::class);

        $myClass->expects($this->any())
                ->method('passarDeAno')
                ->willReturn('Aprovado');

        $this->assertEquals('Aprovado', $myClass->passarDeAno());
        $this->assertIsString($myClass->passarDeAno());
    }

    public function testMethodWillReturnReprovado()
    {
        $myClass = $this->createMock(MyClass::class);

        $myClass->expects($this->any())
                ->method('passarDeAno')
                ->willReturn('Reprovado');

        $this->assertEquals('Reprovado', $myClass->passarDeAno());
        $this->assertIsString($myClass->passarDeAno());
    }

    public function testMethodReturnSelf()
    {
        $myClass = $this->createMock(MyClass::class);

        $myClass->expects($this->any())
                ->method('passarDeAno')
                ->willReturnSelf();

        $this->assertIsObject($myClass->passarDeAno());
        $this->assertEquals($myClass, $myClass->passarDeAno());
    }
}

/* 
    DOCUMENTAÇÃO DOS TESTES REALIZADOS:
_________________________________________________________________________________________________________________________________________
    1 - testAddMethods:
        Teste para ver se os métodos são adicionados com assertTrue e method_exists.
        O addMethods não está funcionando na versão do phpunit que estou usando. 
        ->onlyMethods para passar o apenas o metodo 'passarDeAno' para o mock.
        AssertTrue para ver se o method_exist retorna verdadeiro, usei o disableOriginalConstructor para abstrair a passagem das classes nos parâmetros.
_________________________________________________________________________________________________________________________________________
    2- testSetConstructorArgs:
        Teste para ver se os arguentos do construtor do mock são corretamente setados com setConstructorArgs.
        AssertIsObject para ver se o objeto foi criado.
        AssertEquals pra ver se o id foi setado no setConstructorArgs.
        AssertInstanceOf pra ver se a instancia da classe mock de BancoDeDados foi setado no setConstructorArgs

_________________________________________________________________________________________________________________________________________
    3- testSetMockClassName:
        Teste para ver se o nome do mock é corretamente setado com setMockClassName.
        AssertSame para verificar se o nome atual é o mesmo que o nome que setei, usei o disableOriginalConstructor para abstrair a passagem das classes nos parâmetros.

_________________________________________________________________________________________________________________________________________
    4- testDisableOriginalConstructor:
        Teste para ver se o construtor do mock é devidamente desativado com disableOriginalConstructor.
        AssertIsObject para ver se o objeto foi criado sem precisar passar parâmetros.
        Dois assertFalse para ver se as propriedades foram setadas.

_________________________________________________________________________________________________________________________________________
    5- testDisableOriginalClone:
        Teste para ver se o clone do mock é devidamente desativado disableOriginalClone.
        AssertIsObject para ver se o objeto foi criado.
        AssertEquals para confirmar se o id permaneceu o mesmo passado no setConstructorArgs, 
        já que sem desabilitar o __clone o id se tornaria 2.

_________________________________________________________________________________________________________________________________________
    6- testDisableAutoload:
        Teste para ver se o autoload do mock é devidamente desativado com ->disableAutoload(), o autoload atualmente está obsoleto na versão de phpunit que estou usando.
        AssertIsObject para ver se o objeto foi criado, usei o disableOriginalConstructor para abstrair a passagem das classes nos parâmetros.

_________________________________________________________________________________________________________________________________________
    7- testMethodWillReturnAprovado:
        Teste para ver se o método vai retornar "Aprovado" com willReturn.
        AssertEquals para ver se o retorno é o mesmo que eu declarei no willReturn
        AssertIsString para ver se retornou como string a resposta.

_________________________________________________________________________________________________________________________________________
    8- testMethodWillReturnReprovado:
        Teste para ver se o método vai retornar "Repovado" com willReturn.
        AssertEquals para ver se o retorno é o mesmo que eu declarei no willReturn
        AssertIsString para ver se retornou como string a resposta

_________________________________________________________________________________________________________________________________________
    9- testMethodReturnSelf:
        Teste para ver se o método irá retornar o próprio objeto com willReturnSelf.
        AssertIsObject para ver se é um objeto o retorno.
        AssertEquals para ver se o retorno é ele mesmo

_________________________________________________________________________________________________________________________________________
*/