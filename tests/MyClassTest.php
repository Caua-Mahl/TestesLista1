<?php 

use PHPUnit\Framework\TestCase;
use src\BancoDeDados;
use src\MyClass;

require_once "src/ClassesMock/BancoDeDados.php";
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

        $this->assertEquals('MinhaClasseMock', get_class($myClass));
    }

    public function testDisableOriginalConstructor()
    {
        $myClass = $this->getMockBuilder(MyClass::class)
                        ->disableOriginalConstructor()
                        ->getMock();

        $this->assertIsObject($myClass);
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
    }

    public function testMethodWillReturnReprovado()
    {
        $myClass = $this->createMock(MyClass::class);

        $myClass->expects($this->any())
                ->method('passarDeAno')
                ->willReturn('Reprovado');

        $this->assertEquals('Reprovado', $myClass->passarDeAno());
    }

    public function testMethodReturnSelf()
    {
        $myClass = $this->createMock(MyClass::class);

        $myClass->expects($this->any())
                ->method('passarDeAno')
                ->willReturnSelf();

        $this->assertEquals($myClass, $myClass->passarDeAno());
    }
}

/*
    DOCUMENTAÇÃO DOS TESTES REALIZADOS:
_________________________________________________________________________________________________________________________________________
    1 - testAddMethods:
        Teste para ver se os métodos são adicionados com assertTrue e method_exists.
        O addMethods não está funcionando na versão do phpunit que estou usando. 
        AssertTrue para ver se o method_exist retorna verdadeiro, usei o disableOriginalConstructor para abstrair a passagem das classes nos parâmetros.
_________________________________________________________________________________________________________________________________________
    2- testSetConstructorArgs:
        Teste para ver se os arguentos do construtor do mock são corretamente setados com setConstructorArgs.
        AssertIsObject para ver se o objeto foi criado.
_________________________________________________________________________________________________________________________________________
    3- testSetMockClassName:
        Teste para ver se o nome do mock é corretamente setado com setMockClassName.
        AssertEquals para verificar se o nome atual é o mesmo que o nome que setei, usei o disableOriginalConstructor para abstrair a passagem das classes nos parâmetros.

_________________________________________________________________________________________________________________________________________
    4- testDisableOriginalConstructor:
        Teste para ver se o construtor do mock é devidamente desativado com disableOriginalConstructor.
        AssertIsObject para ver se o objeto foi criado sem precisar passar parâmetros.

_________________________________________________________________________________________________________________________________________
    5- testDisableOriginalClone:
        Teste para ver se o clone do mock é devidamente desativado disableOriginalClone.
        AssertIsObject para ver se o objeto foi criado, usei o disableOriginalConstructor para abstrair a passagem das classes nos parâmetros.

_________________________________________________________________________________________________________________________________________
    6- testDisableAutoload:
        Teste para ver se o autoload do mock é devidamente desativado com ->disableAutoload(), o autoload atualmente está obsoleto na versão de phpunit que estou usando.
        AssertIsObject para ver se o objeto foi criado, usei o disableOriginalConstructor para abstrair a passagem das classes nos parâmetros.

_________________________________________________________________________________________________________________________________________
    7- testMethodWillReturnAprovado:
        Teste para ver se o método vai retornar o "Aprovado" com willReturn.
        AssertEquals para ver se o retorno é o mesmo que eu declarei no willReturn
_________________________________________________________________________________________________________________________________________
    8- testMethodWillReturnReprovado:
        Teste para ver se o método vai retornar o "Repovado" com willReturn.
        AssertEquals para ver se o retorno é o mesmo que eu declarei no willReturn

_________________________________________________________________________________________________________________________________________
    9- testMethodReturnSelf:
        Teste para ver se o método irá retornar o próprio objeto com willReturnSelf.
        AssertEquals para ver se o retorno é ele mesmo

_________________________________________________________________________________________________________________________________________
*/