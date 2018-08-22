<?php
/**
 * Created by IntelliJ IDEA.
 * User: mcs
 * Date: 7/22/2018
 * Time: 3:47 PM
 */
require_once __DIR__.'/../../repository/impl/ReceiptRepositoryImpl.php';
require_once __DIR__.'/../ReceiptBO.php';
require_once __DIR__ . '/../../db/DBConnection.php';

class ReceiptBOImpl implements ReceiptBO
{
    private $receiptRepository;

    public function __construct()
    {
        $this->receiptRepository=new ReceiptRepositoryImpl();
    }

//    public function _construct(){
//        $this->receiptRepository=new ReceiptRepositoryImpl();
//    }

    public function getAllReceipts()
    {

        $connection = (new DBConnection())->getConnection();

        $this->receiptRepository->setConnection($connection);
        $receipt=$this->receiptRepository->findAllReceipt();

        mysqli_close($connection);

        return $receipt;
    }

    public function deleteReceipt($ReceiptID)
    {
        $connection = (new DBConnection())->getConnection();
        $this->receiptRepository->setConnection($connection);

        $result=$this->receiptRepository->deleteReceipt($ReceiptID);

        mysqli_close($connection);

        return $result;

    }

    public function saveReceipt($ReceiptID, $PatientID, $PID, $MID, $Unitprice, $Qty, $Date)
    {
        $connection = (new DBConnection())->getConnection();
        $this->receiptRepository->setConnection($connection);

        $result=$this->receiptRepository->saveReceipt($ReceiptID, $PatientID, $PID, $MID, $Unitprice, $Qty, $Date);

        mysqli_close($connection);

        return $result;
    }

    public function updateReceipt($ReceiptID, $PatientID, $PID, $MID, $Unitprice, $Qty, $Date)
    {
        $connection = (new DBConnection())->getConnection();
        $this->receiptRepository->setConnection($connection);

        $result=$this->receiptRepository->updateReceipt($ReceiptID, $PatientID, $PID, $MID, $Unitprice, $Qty, $Date);

        mysqli_close($connection);

        return $result;
    }
}