<?php
/**
 * Created by IntelliJ IDEA.
 * User: mcs
 * Date: 7/24/2018
 * Time: 5:36 PM
 */
require_once __DIR__ . '/../PatientRepository.php';

class PatientRepositoryImpl implements PatientRepository
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

    public function savePatient($PatientID, $Address, $Name)
    {
        $result = $this->connection->query("INSERT INTO Patient VALUES ('{$PatientID}','{$Address}','{$Name}')");
        echo $this->connection->error;
        return ($result && ($this->connection->affected_rows > 0));
    }

    public function updatePatient($PatientID, $Address, $Name)
    {
        $result = $this->connection->query("UPDATE Patient SET Address='{$Address}', Name='{$Name}' WHERE PatientID='{$PatientID}'");
        echo $this->connection->error;
        return ($result && ($this->connection->affected_rows > 0));
    }

    public function deletePatient($PatientID)
    {
        $result = $this->connection->query("DELETE FROM Patient WHERE PatientID='{$PatientID}'");
        return ($result && ($this->connection->affected_rows > 0));
    }

    public function findPatient($PatientID)
    {
        $resultset = $this->connection->query("SELECT * FROM Patient WHERE PatientID='{$PatientID}'");
        return $resultset->fetch_assoc();
    }

    public function findAllPatients()
    {
        $resultset = $this->connection->query("SELECT * FROM Patient");
        return $resultset->fetch_all(MYSQLI_ASSOC);
    }
}