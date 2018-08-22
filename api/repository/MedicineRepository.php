<?php
/**
 * Created by IntelliJ IDEA.
 * User: mcs
 * Date: 7/24/2018
 * Time: 5:33 PM
 */

interface MedicineRepository
{
    public function setConnection(mysqli $connection);

    public function saveMedicine($MID,$Description,$Qty,$Approval);

    public function updateMedicine($MID,$Description,$Qty,$Approval);

    public function deleteMedicine($MID);

    public function findMedicine($MID);

    public function findAllMedicine();
}