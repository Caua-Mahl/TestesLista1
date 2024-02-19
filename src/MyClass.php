<?php 

namespace src;

use BancoDeDados\BancoDeDados;

require_once "BancoDeDados/BancoDeDados.php";

class MyClass
{
    public object $bancoDeDados;
    public int    $id;

   public function __construct(BancoDeDados $bancoDeDados, int $id)
   {
        $this->bancoDeDados = $bancoDeDados;
        $this->id           = $id;
   }

   public function passarDeAno()
    {
        $notas = $this->bancoDeDados->puxarNotas($this->id);

        if (array_sum($notas) / count($notas) < 7)
        {
            return "Reprovado";
        }
    
        return "Aprovado";
    } 

    public function __clone()
    {
        $this->id = 2;
    }

    public function __autoload()
    {
        return "Autoload";
    }
} 