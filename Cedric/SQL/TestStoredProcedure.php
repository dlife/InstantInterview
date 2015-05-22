<?php

try {


//Replace the below connection parameters to fit your environment
    $host = 'trouw.benoot-cupers.com:3306';
    $db = 'InterviewDB';
    $user = 'CvoProject';
    $pass = '9uPZV)U;z_)+';
$dbms = 'mysql';
$dsn = "$dbms:host=$host;dbname=$db";
    $cn = new PDO($dsn, $user, $pass);
    echo("Connected to host {$host} to database {$db}.<br>");

//    //TEST COMPETENTIE INSERT //OK
//
//    $competentie = 'Werkend?';
//    $preparedStatement = $cn->prepare("call CompetentieInsert(@pId,:name);");
//    $preparedStatement->bindParam(':name',$competentie,PDO::PARAM_STR);
//    $result = $preparedStatement->execute();
//    echo($preparedStatement->rowCount());
//
//
//    //TEST VRAAG INSERT // OK
//
//        $competentie = 9;
//        $vraag = "Werkt dit echt?";
//        $preparedStatement = $cn->prepare("call VraagInsert(@pId,:vraag,:compId);");
//        $preparedStatement->bindParam(':vraag',$vraag,PDO::PARAM_STR);
//        $preparedStatement->bindParam(':compId',$competentie,PDO::PARAM_INT);
//        $result = $preparedStatement->execute();
//        print_r("\r\nVraag ingevoegd ".$preparedStatement->rowCount());
//
//    //TEST Functie INSERT // OK
//
//        $functie = 'Werkend?';
//        $preparedStatement = $cn->prepare("call FunctieInsert(@pId,:name);");
//        $preparedStatement->bindParam(':name',$functie,PDO::PARAM_STR);
//        $result = $preparedStatement->execute();
//        echo($preparedStatement->rowCount());
//
//
//
//        //TEST Select alle competenties //OK
//            $preparedStatement = $cn->prepare("call CompetentiesSelectAll();");
//            $result = $preparedStatement->execute();
//            while($data = $preparedStatement->fetch( PDO::FETCH_ASSOC )){
//                print $data['Naam'].' '.$data['Id'].'<br>';
//
//
////TEST Select specifieke competenties //OK
//   $preparedStatement = $cn->prepare("call CompetentiesSelectOne(:pId);");
//    $competentie = 10;
//    $preparedStatement->bindParam(':pId',$competentie,PDO::PARAM_INT);
//    $result = $preparedStatement->execute();
//    while ($data = $preparedStatement->fetch(PDO::FETCH_ASSOC)) {
//        print $data['Naam'] . ' ' . $data['Id'] . '<br>';
//    }


//// TEST Select questions from specific competence //OK
//   $preparedStatement = $cn->prepare("call CompetentiesSelectQuestions(:pId);");
//    $competentie = 10;
//    $preparedStatement->bindParam(':pId',$competentie,PDO::PARAM_INT);
//    $result = $preparedStatement->execute();
//    while ($data = $preparedStatement->fetch(PDO::FETCH_ASSOC)) {
//        print $data['Vraag'] . ' ' . $data['Naam'] . '<br>';
//    }

  // TEST Update specific  //OK
   $preparedStatement = $cn->prepare("call CompetentieUpdate(:pId, :pName);");
    $competentie = 10;
    $compNaam = "UpdateTest";
    $preparedStatement->bindParam(':pId',$competentie,PDO::PARAM_INT);
    $preparedStatement->bindParam(':pName',$compNaam,PDO::PARAM_INT);
    $result = $preparedStatement->execute();
    echo($preparedStatement->rowCount());

    // TEST Update specific vraag  //OK
    $preparedStatement = $cn->prepare("call VraagUpdate(:pId, :pName);");
    $vraagId = 5;
    $vraag = "UpdateTestVraag";
    $preparedStatement->bindParam(':pId',$vraagId,PDO::PARAM_INT);
    $preparedStatement->bindParam(':pName',$vraag,PDO::PARAM_INT);
    $result = $preparedStatement->execute();
    echo($preparedStatement->rowCount());

    // TEST Update specific functie //OK
   $preparedStatement = $cn->prepare("call FunctieUpdate(:pId, :pName);");
    $FId = 1;
    $naam = "UpdateTestFunctie";
    $preparedStatement->bindParam(':pId',$FId,PDO::PARAM_INT);
    $preparedStatement->bindParam(':pName',$naam,PDO::PARAM_INT);
    $result = $preparedStatement->execute();
    echo($preparedStatement->rowCount());

    // TEST delete specific functie, compententie, vraag //OK
        $preparedStatement = $cn->prepare("call VraagDelete(:pId);");
        $PId = 2;
        $preparedStatement->bindParam(':pId',$PId,PDO::PARAM_INT);
        $result = $preparedStatement->execute();
        echo($preparedStatement->rowCount());

    $preparedStatement = $cn->prepare("call FunctieDelete(:pId);");
    $PId = 2;
    $preparedStatement->bindParam(':pId',$PId,PDO::PARAM_INT);
    $result = $preparedStatement->execute();
    echo($preparedStatement->rowCount());

    $preparedStatement = $cn->prepare("call CompetentieDelete(:pId);");
    $PId = 11;
    $preparedStatement->bindParam(':pId',$PId,PDO::PARAM_INT);
    $result = $preparedStatement->execute();
    echo($preparedStatement->rowCount());

    // TEST Select questions from specific competence with function //OK
      $preparedStatement = $cn->prepare("call SelectQuestionsFunctionCompetencesOrderByCompetence(:pId);");
       $competentie = 9;
       $preparedStatement->bindParam(':pId',$competentie,PDO::PARAM_INT);
       $result = $preparedStatement->execute();
       while ($data = $preparedStatement->fetch(PDO::FETCH_ASSOC)) {
           print $data['FuncNaam'] . ' ' . $data['CompNaam'] . ' ' . $data['Vraag'] . '<br>';
       }

    // TEST Select questions from specific function with competence //OK
    $preparedStatement = $cn->prepare("call SelectQuestionsFunctionCompetencesOnFunction(:pId);");
    $competentie = 3;
    $preparedStatement->bindParam(':pId',$competentie,PDO::PARAM_INT);
    $result = $preparedStatement->execute();
    while ($data = $preparedStatement->fetch(PDO::FETCH_ASSOC)) {
        print $data['FuncNaam'] . ' ' . $data['CompNaam'] . ' ' . $data['Vraag'] . '<br>';
    }
}
catch (\PDOException $e)
{
    echo("Connection with host {$this->hostName} for database {$this->databaseName} failed.");
    echo('Fout: ' . $e->getMessage());
    echo($e->getCode());
}


?>
