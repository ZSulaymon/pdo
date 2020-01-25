<?php
try {
    $dns = 'mysql:host=localhost:3306; dbname=mysql';
    $opt=array (
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => FALSE,
    );
    $pdo = new PDO($dns, 'root', '', $opt);
    $pdo->query('SET NAMES utf8');

    $sql = "SELECT * FROM `columns_priv`; ";
    $sth=$pdo->prepare($sql);
    $sth->execute();
    if ($sth->rowCount()>0)
    {
        while($r=$sth->fetch())
        {
            echo 'username: '.$r['user-name'].'<br>'; 
        }
    }
}
catch(PDOException $e){
    echo 'ERROR: ' .$e->getMessage();
}

?>