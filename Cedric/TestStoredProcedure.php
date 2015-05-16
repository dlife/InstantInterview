<?php

try {
    $dbms = 'mysql';

//Replace the below connection parameters to fit your environment
    $host = 'trouw.benoot-cupers.com:3306';
    $db = 'InterviewDB';
    $user = 'CvoProject';
    $pass = '9uPZV)U;z_)+';
    $dsn = "$dbms:host=$host;dbname=$db";
    $cn = new PDO($dsn, $user, $pass);
    echo("Connected to host {$host} to database {$db}.<br>");

    //TEST COMPETENTIE INSERT
    /*
    $competentie = 'Werkend?';
    $preparedStatement = $cn->prepare("call CompetentieInsert(@pId,:name);");
    $preparedStatement->bindParam(':name',$competentie,PDO::PARAM_STR);
    $result = $preparedStatement->execute();
    echo($preparedStatement->rowCount());
   */

    //TEST VRAAG INSERT
    /*
        $competentie = 9;
        $vraag = "Werkt dit echt?";
        $preparedStatement = $cn->prepare("call VraagInsert(@pId,:vraag,:compId);");
        $preparedStatement->bindParam(':vraag',$vraag,PDO::PARAM_STR);
        $preparedStatement->bindParam(':compId',$competentie,PDO::PARAM_INT);
        $result = $preparedStatement->execute();
        print_r("\r\nVraag ingevoegd ".$preparedStatement->rowCount());
    */
    //TEST Functie INSERT
    /*
        $functie = 'Werkend?';
        $preparedStatement = $cn->prepare("call FunctieInsert(@pId,:name);");
        $preparedStatement->bindParam(':name',$functie,PDO::PARAM_STR);
        $result = $preparedStatement->execute();
        echo($preparedStatement->rowCount());
    */

    /*
        //TEST Select alle competenties
            $preparedStatement = $cn->prepare("call CompetentiesSelectAll();");
            $result = $preparedStatement->execute();
            while($data = $preparedStatement->fetch( PDO::FETCH_ASSOC )){
                print $data['Naam'].' '.$data['Id'].'<br>';
    */

//TEST Select specifieke competenties
   /* $preparedStatement = $cn->prepare("call CompetentiesSelectOne(:pId);");
    $competentie = 10;
    $preparedStatement->bindParam(':pId',$competentie,PDO::PARAM_INT);
    $result = $preparedStatement->execute();
    while ($data = $preparedStatement->fetch(PDO::FETCH_ASSOC)) {
        print $data['Naam'] . ' ' . $data['Id'] . '<br>';
    }
*/

// TEST Select questions from specific competence
 /*  $preparedStatement = $cn->prepare("call CompetentiesSelectQuestions(:pId);");
    $competentie = 10;
    $preparedStatement->bindParam(':pId',$competentie,PDO::PARAM_INT);
    $result = $preparedStatement->execute();
    while ($data = $preparedStatement->fetch(PDO::FETCH_ASSOC)) {
        print $data['Vraag'] . ' ' . $data['Naam'] . '<br>';
    } */

  // TEST Update specific competence
   /* $preparedStatement = $cn->prepare("call CompetentieUpdate(:pId, :pName);");
    $competentie = 10;
    $compNaam = "UpdateTest";
    $preparedStatement->bindParam(':pId',$competentie,PDO::PARAM_INT);
    $preparedStatement->bindParam(':pName',$compNaam,PDO::PARAM_INT);
    $result = $preparedStatement->execute();
    echo($preparedStatement->rowCount());
*/
    // TEST Update specific vraag
    $preparedStatement = $cn->prepare("call VraagUpdate(:pId, :pName);");
    $vraagId = 5;
    $vraag = "UpdateTestVraag";
    $preparedStatement->bindParam(':pId',$vraagId,PDO::PARAM_INT);
    $preparedStatement->bindParam(':pName',$vraag,PDO::PARAM_INT);
    $result = $preparedStatement->execute();
    echo($preparedStatement->rowCount());
}
catch (\PDOException $e)
{
    echo("Connection with host {$this->hostName} for database {$this->databaseName} failed.");
    echo('Fout: ' . $e->getMessage());
    echo($e->getCode());
}


?>
