<?php 

namespace src;

class MyClass
{
    public object $bancoDeDados;
    public object $aluno;

   public function __construct(BancoDeDados $bancoDeDados, Aluno $aluno)
   {
        $this->bancoDeDados = $bancoDeDados;
        $this->aluno = $aluno;
   }

   public function passarDeAno()
    {
        $notas = $this->bancoDeDados->puxarNotas($this->aluno->getId());

        if (array_sum($notas) / count($notas) < 7)
        {
            return "Reprovado";
        }
    
        return "Aprovado";
    } 

} 