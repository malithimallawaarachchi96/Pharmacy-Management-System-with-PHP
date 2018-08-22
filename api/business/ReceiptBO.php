<?php
/**
 * Created by IntelliJ IDEA.
 * User: mcs
 * Date: 7/22/2018
 * Time: 3:44 PM
 */

interface ReceiptBO
{

    public function getAllReceipts();

    public function deleteReceipt($ReceiptID);

    public function saveReceipt( $ReceiptID , $PatientID , $PID , $MID ,$Unitprice ,$Qty , $Date);

    public function updateReceipt($ReceiptID , $PatientID , $PID , $MID ,$Unitprice ,$Qty , $Date);
}