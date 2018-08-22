<?php
/**
 * Created by IntelliJ IDEA.
 * User: mcs
 * Date: 7/22/2018
 * Time: 3:46 PM
 */

require_once __DIR__.'/../PrescriptionDetailBO.php';
require_once  __DIR__.'/../../db/DBConnection.php';
require_once __DIR__.'/../../repository/impl/PrescriptionDetailRepositoryImpl.php';
class PrescriptionDetailBOImpl implements PrescriptionDetailBO
{
    private $PrescriptionDetailRepository;

    public  function __construct(){
        $this->PrescriptionDetailRepository= new PrescriptionDetailRepositoryImpl();
    }


    public function getAllPrescription_details()
    {
        $connection = (new DBConnection())->getConnection();
        $this->PrescriptionDetailRepository->setConnection($connection);

        $precriptiondetail=$this->PrescriptionDetailRepository->findAllPrescription_detail();

        mysqli_close($connection);

        return $precriptiondetail;
    }

    public function deletePrescription_detail($PID, $MID)
    {
        $connection = (new DBConnection())->getConnection();
        $this->PrescriptionDetailRepository->setConnection($connection);

        $result=$this->PrescriptionDetailRepository->deletePrescription_detail($PID,$MID);

        mysqli_close($connection);

        return $result;
    }

    public function savePrescription_detail($DoctorName, $PID, $MID)
    {
        $connection = (new DBConnection())->getConnection();
        $this->PrescriptionDetailRepository->setConnection($connection);

        $result=$this->PrescriptionDetailRepository->savePrescription_detail($DoctorName,$PID,$MID);

        mysqli_close($connection);

        return $result;
    }

    public function updatePrescription_detail($DoctorName, $PID, $MID)
    {
        $connection = (new DBConnection())->getConnection();
        $this->PrescriptionDetailRepository->setConnection($connection);

        $result=$this->PrescriptionDetailRepository->updatePrescription_detail($DoctorName,$PID,$MID);

        mysqli_close($connection);

        return $result;
    }
}