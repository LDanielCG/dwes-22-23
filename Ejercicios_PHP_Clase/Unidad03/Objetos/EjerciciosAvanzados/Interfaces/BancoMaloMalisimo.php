<?php
    class BancoMaloMalisimo implements PlataformaPago{
        function estableceConexion(): bool{
            echo "conexión BancoMaloMalisimo<br/>";
            return true;
        }
        function compruebaSeguridad(): bool{
            echo "conexion segura BancoMaloMalisimo<br/>";
            return true;
        }
        function pagar(string $cuenta,int $cantidad){
            echo "Pago realizado BancoMaloMalisimo<br/><br/>";
        }
    }
?>