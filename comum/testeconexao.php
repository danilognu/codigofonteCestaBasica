<?php 

Class Conexao{
    
    public function IniciaConexao(){   

        try {
            $hostname = "192.168.1.50";
            $dbname = "ezipbx";
            $username = "cdr";
            $pw = "redbox";
            $pdo = new PDO ("mysql:host=".$hostname.";dbname=".$dbname."", $username, $pw); 
        } catch (PDOException $e) {
            echo "Erro de Conexão " . $e->getMessage() . "\n";
            exit;
        }
        return $pdo;
    }    
}

$loConexao = new Conexao();
$pdo = $loConexao->IniciaConexao();

$loSql = "SELECT 
            uniqueid 
            FROM PBX_QUEUEMON 
            WHERE member = 1010 
            ORDER BY calldate DESC LIMIT 1";

$query= $pdo->prepare($loSql);
$query->execute();

foreach ($query as $row) {

    echo $row["uniqueid"];

}




?>