<?php
/**
 * Created by IntelliJ IDEA.
 * User: mcs
 * Date: 7/24/2018
 * Time: 5:37 PM
 */
require_once  __DIR__ .'/../ReceiptRepository.php';
class ReceiptRepositoryImpl implements ReceiptRepository
{
    private  $connection;

    public  function _construct(){
        $this->connection=(new DBConnection())->getConnection();
    }

    public function setConnection(mysqli $connection)
    {
        $this->connection=$connection;
    }

    public function saveReceipt($ReceiptID, $PatientID, $PID, $MID, $Unitprice, $Qty, $Date)
    {
        $result=$this->connection->query("INSERT INTO Receipt VALUES ('{$ReceiptID}','{$PatientID}','{$PID}','{$MID}','{$Unitprice}','{$Qty}','{$Date}')");
        echo $this->connection->error;
        return ($result && ($this->connection->affected_rows > 0));
    }

    public function updateReceipt($ReceiptID, $PatientID, $PID, $MID, $Unitprice, $Qty, $Date)
    {
        $result = $this->connection->query("UPDATE Receipt SET PatientID='{$PatientID}', PID='{$PID}', MID='{$MID}',Unitprice='{$Unitprice}',Qty='{$Qty}','{$Date}' WHERE ReceiptID='{$ReceiptID}'");
        echo $this->connection->error;
        return ($result && ($this->connection->affected_rows > 0));
    }

    public function deleteReceipt($ReceiptID)
    {
        $result = $this->connection->query("DELETE FROM Receipt WHERE ReceiptID='{$ReceiptID}'");
        echo $this->connection->error;
        return ($result && ($this->connection->affected_rows > 0));
    }

    public function findReceipt($ReceiptID)
    {
        $resultset = $this->connection->query("SELECT * FROM Receipt WHERE ReceiptID='{$ReceiptID}'");
        return $resultset->fetch_assoc();
    }

    public function findAllReceipt()
    {
        $resultset = $this->connection->query("SELECT * FROM Receipt");
        return $resultset->fetch_all(MYSQLI_ASSOC);
    }
}