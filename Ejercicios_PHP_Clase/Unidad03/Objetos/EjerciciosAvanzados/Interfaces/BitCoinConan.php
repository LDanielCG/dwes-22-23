<?php
    class BitCoinConan implements PlataformaPago{
        function estableceConexion(): bool{
            echo "conexión BitCoinConan<br/>";
            return true;
        }
        function compruebaSeguridad(): bool{
            echo "conexion segura BitCoinConan<br/>";
            return true;
        }
        function pagar(string $cuenta,int $cantidad){
            echo "Pago realizado BitCoinConan<br/><br/>";
        }
    }
?>