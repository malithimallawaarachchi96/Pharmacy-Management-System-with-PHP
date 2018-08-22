<?php
/**
 * Created by IntelliJ IDEA.
 * User: mcs
 * Date: 7/24/2018
 * Time: 5:34 PM
 */
require_once __DIR__.'/../MedicineRepository.php';

class MedicineRepositoryImpl implements MedicineRepository
{
    private $connection;

    public function __construct()
    {
        $this->connection = (new DBConnection())->getConnection();
    }

    public function setConnection(mysqli $connection)
    {
       $this->connection = $connection;
    }

    public function saveMedicine($MID, $Description, $Qty, $Approval)
    {
        $result = $this->connection->query("INSERT INTO Medicine VALUES ('{$MID}','{$Description}','{$Qty}','{$Approval}')");
        echo $this->connection->error;
        return ($result && ($this->connection->affected_rows > 0));
    }

    public function updateMedicine($MID, $Description, $Qty, $Approval)
    {
        $result = $this->connection->query("UPDATE Medicine SET Description='{$Description}', Qty='{$Qty}',Approval='{$Approval}' WHERE MID='{$MID}'");
        echo $this->connection->error;
        return ($result && ($this->connection->affected_rows > 0));
    }

    public function deleteMedicine($MID)
    {
        $result = $this->connection->query("DELETE FROM Medicine WHERE MID='{$MID}'");
        return ($result && ($this->connection->affected_rows > 0));
    }

    public function findMedicine($MID)
    {
        $resultset = $this->connection->query("SELECT * FROM  Medicine WHERE MID='{$MID}'");
        return $resultset->fetch_assoc();
    }

    public function findAllMedicine()
    {
        $resultset = $this->connection->query("SELECT * FROM  Medicine");
        return $resultset->fetch_all(MYSQLI_ASSOC);
    }
}