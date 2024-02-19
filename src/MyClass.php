<?php 

namespace src;

class MyClass
{
    public int $api;
    public int $api2;

    public function __construct(int $api=0, int $api2=0)
    {
        $this->api = $api;
        $this->api2 = $api2;
    }

    public function somar(int $api, int $api2): int|float|string
    {
        try 
        {
            if (!is_numeric($api) || !is_numeric($api2))
            {
               throw new \Exception('Apenas números são permitidos');
           }
   
           if (is_string($api) || is_string($api2)) {
               throw new \Exception('Apenas números são permitidos');
           }
   
           if (is_float($api) || is_float($api2)) {
               return floatval(number_format($api + $api2, 2));
           }
   
           return $api + $api2;
        } 
        catch (\Exception $e) 
        {
            return $e->getMessage();
        }
    }

    public function subtrair($api, $api2) : int|float|string
    {
        try
        {
            if (!is_numeric($api) || !is_numeric($api2))
            {
               throw new \Exception('Apenas números são permitidos');
           }
   
           if (is_string($api) || is_string($api2)) {
               throw new \Exception('Apenas números são permitidos');
           }
   
           if (is_float($api) || is_float($api2)) {
               return floatval(number_format($api - $api2, 2));
           }
   
           return $api - $api2;
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

    public function getApi(): int
    {
        return $this->api;
    }

    public function getApi2(): int
    {
        return $this->api2;
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