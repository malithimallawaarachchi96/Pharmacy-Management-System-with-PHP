<?php
/**
 * Created by IntelliJ IDEA.
 * User: mcs
 * Date: 7/24/2018
 * Time: 5:35 PM
 */

interface ReceiptRepository
{
    public function setConnection(mysqli $connection);

    public function saveReceipt( $ReceiptID , $PatientID , $PID , $MID ,$Unitprice ,$Qty , $Date);

    public function updateReceipt($ReceiptID , $PatientID , $PID , $MID ,$Unitprice ,$Qty , $Date);

    public function deleteReceipt($ReceiptID);

    public function findReceipt($ReceiptID);

    public function findAllReceipt();
}