<?php

require_once 'business/impl/MedicineBOImpl.php';

header("Content-Type: application/json");

$method = $_SERVER["REQUEST_METHOD"];

$medicineBO=new MedicineBOImpl();

switch ($method) {
    case "GET":
        $action = $_GET["action"];

        switch ($action) {
            case "all":
                echo json_encode($medicineBO->getAllMedicine());
                break;
        }

        break;
    case "POST":
        $action = $_POST["action"];
        switch ($action) {
            case "save" :
                $MID = $_POST["mid"];
                $Description = $_POST["mdes"];
                $Qty = $_POST["mqty"];
                $Approval = $_POST["txtapprove"];
                echo json_encode($medicineBO->saveMedicine($MID,$Description,$Qty,$Approval));

                break;

            case "update" :

                $MID = $_POST["mid"];
                $Description = $_POST["mdes"];
                $Qty = $_POST["mqty"];
                $Approval = $_POST["txtapprove"];
                echo json_encode($medicineBO->updateMedicine($MID,$Description,$Qty,$Approval));
                break;
        }
    case "DELETE":
        $queryString = $_SERVER["QUERY_STRING"];
        $queryArray = preg_split("/=/", $queryString);
        if (count($queryArray) === 2) {
            $MID = $queryArray[1];
            echo json_encode($medicineBO->deleteMedicine($MID));
        }
        break;
}
