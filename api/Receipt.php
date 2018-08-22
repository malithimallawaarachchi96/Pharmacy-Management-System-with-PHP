<?php
/**
 * Created by IntelliJ IDEA.
 * User: mcs
 * Date: 7/24/2018
 * Time: 5:55 PM
 */

require_once 'business/impl/ReceiptBOImpl.php';
header("Content-Type: application/json");

$method = $_SERVER["REQUEST_METHOD"];

$receiptBO=new ReceiptBOImpl();

Switch($method){
    case "GET":
        $action = $_GET["action"];

        switch($action){
            case "all":
                echo json_encode($receiptBO->getAllReceipts());
                break;
        }
        break;


    case "DELETE":
        $queryString = $_SERVER["QUERY_STRING"];
        $queryArray = preg_split("/=/",$queryString);
        if (count($queryArray) === 2){
            $ReceiptID = $queryArray[1];
            echo json_encode($receiptBO->deleteReceipt($ReceiptID));
        }
        break;

    case "POST":
        $action=$_POST["action"];
        switch ($action){
            case "save" :
              //  echo "njkldsvnj";
                $ReceiptID=$_POST["rid"];
                $PatientID=$_POST["droppaid"];
                $PID=$_POST["droppid"];
                $MID=$_POST["dropmid"];
                $UnitPrice=$_POST["txtUnitprice"];
                $Qty=$_POST["rqty"];
                $Date=$_POST["txtdate"];

                echo json_encode($receiptBO->saveReceipt($ReceiptID,$PatientID,$PID,$MID,$UnitPrice,$Qty,$Date));
                break;

            case "update" :

                $ReceiptID=$_POST["rid"];
                $PatientID=$_POST["droppaid"];
                $PID=$_POST["droppid"];
                $MID=$_POST["dropmid"];
                $UnitPrice=$_POST["txtUnitprice"];
                $Qty=$_POST["rqty"];
                $Date=$_POST["txtdate"];

                echo json_encode($receiptBO->updateReceipt($ReceiptID,$PatientID,$PID,$MID,$UnitPrice,$Qty,$Date));
                break;

        }
        break;
}