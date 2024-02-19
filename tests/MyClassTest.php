<?php 

use PHPUnit\Framework\TestCase;
use src\MyClass;

require_once "src/MyClass.php";

class MyClassTest extends TestCase
{

    public function testAddMethods()
    {
         //      ->addMethods(['somar', 'subtrair'])
        $myClass = $this->createMock(MyClass::class);
        $myClass->expects($this->any())
                ->method('somar');
        $myClass->expects($this->any())
                ->method('subtrair');
        $this->assertTrue(method_exists($myClass, 'subtrair'));
        $this->assertTrue(method_exists($myClass, 'somar'));

    }

    public function testSetConstructorArgs() 
    {
        $myClass = $this->getMockBuilder(MyClass::class)
                        ->setConstructorArgs([2, 3])
                        ->getMock();
        $this->assertEquals(2, $myClass->a);
        $this->assertEquals(3, $myClass->b);
    }

    public function testSetMockClassName()
    {
        $myClass = $this->getMockBuilder(MyClass::class)
                        ->setMockClassName('MinhaClasseMock')
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
        $myClass = $this->getMockBuilder(MyClass::class)
                        ->disableOriginalClone()
                        ->getMock();
        $this->assertIsObject($myClass);
    }

    public function testDisableAutoload()
    {
        $myClass = $this->getMockBuilder(MyClass::class)
                    //  ->disableAutoload()
                        ->getMock();
        $this->assertIsObject($myClass);
    }

    public function testMethodWillReturn()
    {
        $myClass = $this->createMock(MyClass::class);
        $myClass->expects($this->any())
                ->method('somar')
                ->willReturn(1);
        $myClass->expects($this->any())
                ->method('subtrair')
                ->willReturn(1);
        $this->assertEquals(1, $myClass->somar(1, 1));
        $this->assertEquals(1, $myClass->subtrair(1, 1));
    }

    public function testMethodReturnSelf()
    {
        $myClass = $this->createMock(MyClass::class);
        $myClass->expects($this->any())
                ->method('retornaEleMesmo')
                ->willReturnSelf();

        $this->assertEquals($myClass, $myClass->retornaEleMesmo());
    }
}

/*

    testAddMethods = Teste para ver se os métodos são adicionados com assertTrue e method_exists. O addMethods não está funcionando na versão do phpunit que estou usando.

    testSetConstructorArgs = Teste para ver se os arguentos do construtor do mock são corretamente setados

    testSetMockClassName = Teste para ver se o nome do mock é corretamente setado

    testDisableOriginalConstructor = Teste para ver se o construtor do mock é devidamente desativado

    testDisableOriginalClone = Teste para ver se o clone do mock é devidamente desativado

    testDisableAutoload = Teste para ver se o autoload do mock é devidamente desativado, o autoload atualmente está obsoleto na versão de phpunit que estou usando

    testMethodWillReturn = Teste para ver se os método irão retornar o valor esperado

    testMethodReturnSelf = Teste para ver se o método irá retornar o próprio objeto

*/