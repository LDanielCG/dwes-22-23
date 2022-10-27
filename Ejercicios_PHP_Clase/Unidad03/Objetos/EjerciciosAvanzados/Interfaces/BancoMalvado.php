<?php
    class BancoMalvado implements PlataformaPago{

        function estableceConexion(): bool{
            echo "conexión BancoMalvado<br/>";
            return true;
        }
        function compruebaSeguridad(): bool{
            echo "conexion segura BancoMalvado<br/>";
            return true;
        }
        function pagar(string $cuenta,int $cantidad){
            echo "Pago realizado BancoMalvado<br/><br/>";
        }

    }

    $ob1 = new BancoMalvado();
    $ob1->estableceConexion();
    $ob1->compruebaSeguridad();
    $ob1->pagar("123A",20);
?>