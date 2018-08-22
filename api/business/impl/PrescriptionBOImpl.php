<?php
/**
 * Created by IntelliJ IDEA.
 * User: mcs
 * Date: 7/22/2018
 * Time: 3:46 PM
 */

require_once __DIR__.'/../PrescriptionBO.php';
require_once __DIR__ . '/../../repository/impl/PrescriptionRepositoryImpl.php';
require_once __DIR__.'/../../repository/impl/PrescriptionDetailRepositoryImpl.php';
require_once __DIR__.'/../../db/DBConnection.php';

class PrescriptionBOImpl implements PrescriptionBO
{
    private $prescriptionRepository;
    private $prescriptionDetailRepository;

    public function __construct()
    {
        $this->prescriptionRepository=new PrescriptionRepositoryImpl();
        $this->prescriptionDetailRepository=new PrescriptionDetailRepositoryImpl();
    }

    public function getAllPrescription()
    {
        $connection = (new DBConnection())->getConnection();
        $this->prescriptionRepository->setConnection($connection);

        $prescription = $this->prescriptionRepository->findAllPrescriptions();


        mysqli_close($connection);

        return $prescription;
    }

    public function deletePrescription($PID)
    {
        $connection=(new DBConnection())->getConnection();
        $this->prescriptionRepository->setConnection($connection);

        $result = $this->prescriptionRepository->deletePrescription($PID);

        mysqli_close($connection);

        return $result;
    }

    public function savePrescription($PID, $PatientID, $Date)
    {
        $connection=(new DBConnection())->getConnection();
        $this->prescriptionRepository->setConnection($connection);

        $result = $this->prescriptionRepository->savePrescription($PID,$PatientID, $Date);

        mysqli_close($connection);

        return $result;
    }

    public function updatePrescription($PID, $PatientID, $Date)
    {
        $connection=(new DBConnection())->getConnection();
        $this->prescriptionRepository->setConnection($connection);

        $result = $this->prescriptionRepository->updatePrescription($PID,$PatientID, $Date);

        mysqli_close($connection);

        return $result;
    }
}