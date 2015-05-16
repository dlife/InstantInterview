<?php

try
{
    $dbms = 'mysql';

//Replace the below connection parameters to fit your environment
    $host = 'trouw.benoot-cupers.com:3306';
    $db = 'InterviewDB';
    $user = 'CvoProject';
    $pass = '9uPZV)U;z_)+';
    $dsn = "$dbms:host=$host;dbname=$db";
    $cn=new PDO($dsn, $user, $pass);
    echo("Connected to host {$host} to database {$db}.");

    //TEST COMPETENTIE INSERT
    /*
    $competentie = 'Werkend?';
    $preparedStatement = $cn->prepare("call CompetentieInsert(@pId,:name);");
    $preparedStatement->bindParam(':name',$competentie,PDO::PARAM_STR);
    $result = $preparedStatement->execute();
    echo($preparedStatement->rowCount());
   */

}
catch (\PDOException $e)
{
    echo("Connection with host {$this->hostName} for database {$this->databaseName} failed.");
    echo('Fout: ' . $e->getMessage());
    echo($e->getCode());
}


?>
