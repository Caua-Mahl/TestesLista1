<?php 

namespace src;

class MyClass
{
    public int $a;
    public int $b;

    public function __construct(int $a=0, int $b=0)
    {
        $this->a = $a;
        $this->b = $b;
    }

    public function somar(int $a, int $b): int|float|string
    {
        try 
        {
            if (!is_numeric($a) || !is_numeric($b))
            {
               throw new \Exception('Apenas números são permitidos');
           }
   
           if (is_string($a) || is_string($b)) {
               throw new \Exception('Apenas números são permitidos');
           }
   
           if (is_float($a) || is_float($b)) {
               return floatval(number_format($a + $b, 2));
           }
   
           return $a + $b;
        } 
        catch (\Exception $e) 
        {
            return $e->getMessage();
        }
    }

    public function subtrair($a, $b) : int|float|string
    {
        try
        {
            if (!is_numeric($a) || !is_numeric($b))
            {
               throw new \Exception('Apenas números são permitidos');
           }
   
           if (is_string($a) || is_string($b)) {
               throw new \Exception('Apenas números são permitidos');
           }
   
           if (is_float($a) || is_float($b)) {
               return floatval(number_format($a - $b, 2));
           }
   
           return $a - $b;
        }
        catch (\Exception $e)
        {
            return $e->getMessage();
        }
    }

    public function retornaEleMesmo()
    {
        return $this;
    }

    public function getA(): int
    {
        return $this->a;
    }

    public function getB(): int
    {
        return $this->b;
    }

      /* private object $bancoDeDados;
    private object $aluno;

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
    } */
} 