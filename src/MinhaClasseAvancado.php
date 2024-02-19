<?php 

namespace src;

class MinhaClasseAvancado{
    
    public static function somar(array $numeros) : int|float|string
    {
      try 
      {
        if (empty($numeros)) {
          throw new \Exception('Array não deve ser vazia');
        }

        if (in_array(false, array_map('is_numeric', $numeros))) {
          throw new \Exception('Array deve conter apenas números');
        }
        
        if (in_array(true, array_map('is_string', $numeros))) {
          throw new \Exception('Array deve conter apenas números');
        }

        if (in_array(true, array_map('is_float', $numeros))) {
          return floatval(number_format(array_sum($numeros), 2));
        }

        return array_sum($numeros);
      } 
      catch (\Exception $e) 
      {
        return $e->getMessage();
      }
    }

    public static function subtrair($a, $b = 0) : int|float|string
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
}