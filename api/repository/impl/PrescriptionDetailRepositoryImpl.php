<?php
/**
 * Created by IntelliJ IDEA.
 * User: mcs
 * Date: 7/24/2018
 * Time: 5:42 PM
 */

require_once  __DIR__.'/../PrescriptionDetailRepository.php';
class PrescriptionDetailRepositoryImpl implements PrescriptionDetailRepository
{
    private  $connection;

    public function _construct(){
        $this->connection=(new DBConnection())->getConnection();
    }

    public function setConnection(mysqli $connection)
    {
          $this->connection=$connection;
    }

    public function savePrescription_detail($DoctorName, $PID, $MID)
    {
        $result = $this->connection->query("INSERT INTO Prescription_detail VALUES ('{$DoctorName}','{$PID}','{$MID}')");
        echo $this->connection->error;
        return ($result && ($this->connection->affected_rows > 0));
    }

    public function updatePrescription_detail($DoctorName, $PID, $MID)
    {
        $result = $this->connection->query("UPDATE Prescription_detail SET DoctorName='{$DoctorName}',WHERE PID='{$PID}' && MID='{$MID}'");
        echo $this->connection->error;
        return ($result && ($this->connection->affected_rows > 0));
    }

    public function deletePrescription_detail($PID, $MID)
    {
        $result = $this->connection->query("DELETE FROM  Prescription_detail WHERE PID='{$PID}' && MID='{$MID}'");
        return ($result && ($this->connection->affected_rows > 0));
    }


    public function findAllPrescription_detail()
    {
        $resultset = $this->connection->query("SELECT * FROM Prescription_detail");
        return $resultset->fetch_all(MYSQLI_ASSOC);
    }


    public function findPrescription_detaill($PID, $MID)
    {
        $resultset = $this->connection->query("SELECT * FROM Prescription_detail WHERE PID='{$PID}' && MID='{$MID}'");
        return $resultset->fetch_assoc();
    }
}