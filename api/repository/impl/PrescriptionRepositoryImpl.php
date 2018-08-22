<?php
/**
 * Created by IntelliJ IDEA.
 * User: mcs
 * Date: 7/24/2018
 * Time: 5:36 PM
 */

require_once __DIR__.'/../PrescriptionRepository.php';
class PrescriptionRepositoryImpl implements PrescriptionRepository
{
   private $connection;
    public function __construct()
    {
        $this->connection = (new DBConnection())->getConnection();
    }

    public function setConnection(mysqli $connection)
    {
        $this->connection=$connection;
    }

    public function savePrescription($PID, $PatientID, $Date)
    {
       $result=$this->connection->query("INSERT INTO Prescription VALUES ('{$PID}','{$PatientID}','{$Date}')");
        echo $this->connection->error;
        return ($result && ($this->connection->affected_rows > 0));
    }

    public function updatePrescription($PID, $PatientID, $Date)
    {
        $result=$this->connection->query("UPDATE Prescription SET PatientID='{$PatientID}',Date='{$Date}' WHERE PID='{$PID}'");
        echo $this->connection->error;
        return ($result && ($this->connection->affected_rows)>0);
    }

    public function deletePrescription($PID)
    {

        $result = $this->connection->query("DELETE FROM Prescription WHERE PID='{$PID}'");
        return ($result && ($this->connection->affected_rows > 0));
    }

    public function findPrescription($PID)
    {
        $resultset = $this->connection->query("SELECT * FROM Prescription WHERE PID='{$PID}'");
        return $resultset->fetch_assoc();
    }

    public function findAllPrescriptions()
    {
        $resultset = $this->connection->query("SELECT * FROM Prescription");
        return $resultset->fetch_all(MYSQLI_ASSOC);
    }
}