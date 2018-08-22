<?php
require_once 'business/impl/PatientBOImpl.php';
header("Content-Type: application/json");

$method = $_SERVER["REQUEST_METHOD"];

$patientBO=new PatientBOImpl();

Switch($method){
    case "GET":
        $action = $_GET["action"];

        switch($action){
            case "all":
                echo json_encode($patientBO->getAllPatient());
                break;
        }
     break;


     case "DELETE":
         $queryString = $_SERVER["QUERY_STRING"];
        $queryArray = preg_split("/=/",$queryString);
        if (count($queryArray) === 2){
            $PatientID = $queryArray[1];
            echo json_encode($patientBO->deletePatient($PatientID));
        }
        break;

    case "POST":
        $action=$_POST["action"];
        switch ($action){
            case "save" :
                $PatientID = $_POST["txtpid"];
                $Address = $_POST["txtpaddress"];
                $Name = $_POST["txtpname"];
                echo json_encode($patientBO->savePatient($PatientID, $Address, $Name));
                break;

            case "update" :

                $PatientID = $_POST["txtpid"];
                $Address = $_POST["txtpaddress"];
                $Name = $_POST["txtpname"];
                echo json_encode($patientBO->updatePatient($PatientID, $Address, $Name));
                break;

        }
        break;
}