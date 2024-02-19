<?php

namespace src;

use Exception;

class BancoDeDados
{
    private static $conn;

    public function puxarNotas(int $id): array
    {
        try 
        {
            $comando_sql = "SELECT notas FROM ids WHERE id = $1";
            $resultado   = pg_query_params(self::$conn, $comando_sql, (array) $id);

            return pg_fetch_assoc($resultado);

        } 
        catch (Exception $e) 
        {
            echo "Não foi possível retornar as notas desse id do banco: " . $e->getMessage();
        }        

    }
}