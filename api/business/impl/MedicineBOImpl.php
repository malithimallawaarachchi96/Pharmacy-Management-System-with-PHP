<?php
/**
 * Created by IntelliJ IDEA.
 * User: mcs
 * Date: 7/22/2018
 * Time: 1:58 PM
 */
require_once __DIR__ . '/../MedicineBO.php';
require_once __DIR__ . '/../../repository/impl/MedicineRepositoryImpl.php';
require_once __DIR__ . '/../../db/DBConnection.php';

class MedicineBOImpl implements MedicineBO
{
    private $MedicineRepository;

    public function __construct()
    {
        $this->MedicineRepository = new MedicineRepositoryImpl();
    }

    public function getAllMedicine()
    {
        $connection = (new DBConnection())->getConnection();
        $this->MedicineRepository->setConnection($connection);

        $Medicine = $this->MedicineRepository->findAllMedicine();

        mysqli_close($connection);

        return $Medicine;
    }

    public function deleteMedicine($MID)
    {
        $connection = (new DBConnection())->getConnection();
        $this->MedicineRepository->setConnection($connection);

        $result = $this->MedicineRepository->deleteMedicine($MID);

        mysqli_close($connection);

        return $result;
    }

    public function saveMedicine($MID, $Description, $Qty, $Approval)
    {
        $connection=(new DBConnection())->getConnection();
        $this->MedicineRepository->setConnection($connection);

        $result=$this->MedicineRepository->saveMedicine($MID,$Description,$Qty,$Approval);
        return $result;
    }

    public function updateMedicine($MID, $Description, $Qty, $Approval)
    {
        $connection=(new DBConnection())->getConnection();
        $this->MedicineRepository->setConnection($connection);

        $result=$this->MedicineRepository->updateMedicine($MID,$Description,$Qty,$Approval);
        return $result;
    }
}