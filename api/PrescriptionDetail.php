<?php
/**
 * Created by IntelliJ IDEA.
 * User: mcs
 * Date: 7/24/2018
 * Time: 5:54 PM
 */

require_once 'business/impl/PrescriptionDetailBOImpl.php';

header("Content-Type: application/json");

$method = $_SERVER["REQUEST_METHOD"];

$prescriptionDetailBO=new PrescriptionDetailBOImpl();


switch ($method) {
    case "GET":
        $action = $_GET["action"];

        switch ($action) {
            case "all":
                echo json_encode($prescriptionDetailBO->getAllPrescription_details());
                break;

        }
        break;
    case "POST":
        $action=$_POST["action"];
        switch ($action) {
            case "save" :
                $DoctorName=$_POST["txtdocname"];
                $PID=$_POST["droppatientid"];
                $MID=$_POST["dropmid"];
                echo json_encode($prescriptionDetailBO->savePrescription_detail($DoctorName,$PID,$MID));
                break;

            case "update" :

                $DoctorName=$_POST["txtdocname"];
                $PID=$_POST["droppatientid"];
                $MID=$_POST["dropmid"];
                echo json_encode($prescriptionDetailBO->updatePrescription_detail($DoctorName,$PID,$MID));
                break;;
        }
    case "DELETE":
        $queryString = $_SERVER["QUERY_STRING"];
        $queryArray = preg_split("/&/", $queryString);
        if (count($queryArray) === 2)
        {
            $PID=preg_split("/=/",$queryArray[0]);
            $Pid=$PID[1];
            $MID = preg_split("/=/",$queryArray[1]);
            $mid=$MID[1];
            echo json_encode($prescriptiionDetailBO->deletePrescription_detail($Pid,$mid));
        }
        break;
}

