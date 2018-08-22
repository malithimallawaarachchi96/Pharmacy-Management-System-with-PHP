<?php
/**
 * Created by IntelliJ IDEA.
 * User: mcs
 * Date: 7/22/2018
 * Time: 3:42 PM
 */

require_once __DIR__.'/../PatientBO.php';
require_once __DIR__ . '/../../repository/impl/PatientRepositoryImpl.php';
require_once __DIR__.'/../../db/DBConnection.php';

class PatientBOImpl implements PatientBO
{
    private $patientRepository;

    public function __construct()
    {
        $this->patientRepository = new PatientRepositoryImpl();
    }
    public function getAllPatient()
    {
        $connection = (new DBConnection())->getConnection();
        $this->patientRepository->setConnection($connection);

        $patients = $this->patientRepository->findAllPatients();

        mysqli_close($connection);

        return $patients;
    }

    public function deletePatient($PatientID)
    {
        $connection=(new DBConnection())->getConnection();
        $this->patientRepository->setConnection($connection);

        $result=$this->patientRepository->deletePatient($PatientID);
        mysqli_close($connection);
        return $result;
    }

    public function savePatient($PatientID, $Address, $Name)
    {
       $connection=(new DBConnection())->getConnection();
       $this->patientRepository->setConnection($connection);

       $result=$this->patientRepository->savePatient($PatientID,$Address,$Name);
       mysqli_close($connection);
       return $result;
    }

    public function updatePatient($PatientID, $Address, $Name)
    {
        $connection=(new DBConnection())->getConnection();
        $this->patientRepository->setConnection($connection);

        $result=$this->patientRepository->updatePatient($PatientID,$Address,$Name);
        mysqli_close($connection);
        return $result;
    }

}