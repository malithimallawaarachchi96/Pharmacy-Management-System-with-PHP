<?php
/**
 * Created by IntelliJ IDEA.
 * User: mcs
 * Date: 7/24/2018
 * Time: 5:54 PM
 */
require_once 'business/impl/PrescriptionBOImpl.php';

header("Content-Type: application/json");

$method = $_SERVER["REQUEST_METHOD"];

$prescriptionBO= new PrescriptionBOImpl();
//$precriptionDetailBO=new PrescriptionDetailBOImpl();


switch ($method) {
    case "GET":
        $action = $_GET["action"];
        switch ($action) {
            case "all":
                echo json_encode($prescriptionBO->getAllPrescription());
                break;

        }
        break;
    case "POST":
        $action=$_POST["action"];
        switch ($action) {
            case "save" :
                $PID = $_POST["txtpresid"];
                $PatientID = $_POST["droppatientid"];
                $Date = $_POST["presdate"];
                echo json_encode($prescriptionBO->savePrescription($PID,$PatientID,$Date));
                break;

            case "update" :

                $MID = $_POST["mid"];
                $Description = $_POST["mdes"];
                $Qty = $_POST["mqty"];
                $Approval = $_POST["txtapprove"];
                echo json_encode($prescriptionBO->updatePrescription($PID,$PatientID,$Date));
                break;
        }
    case "DELETE":
        $queryString = $_SERVER["QUERY_STRING"];
        $queryArray = preg_split("/=/", $queryString);
        if (count($queryArray) === 2) {
            $PID = $queryArray[1];
            echo json_encode($prescriptionBO->deletePrescription($PID));

        }
        break;
}

