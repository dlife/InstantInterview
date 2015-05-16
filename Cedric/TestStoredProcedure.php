<?php
$dbms = 'mysql';

//Replace the below connection parameters to fit your environment
$host = 'trouw.benoot-cupers.com:3306';
$db = 'InterviewDB';
$user = 'CvoProject';
$pass = '9uPZV)U;z_)+';
$dsn = "$dbms:host=$host;dbname=$db";

$cn=new PDO($dsn, $user, $pass);
$Competentie = 'test1';
$q=$cn->exec("call CompetentieInsert('test1')");

print_r($q);

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

}
catch (\PDOException $e)
{
    echo("Connection with host {$this->hostName} for database {$this->databaseName} failed.");
    echo('Fout: ' . $e->getMessage());
    echo($e->getCode());
}


?>
