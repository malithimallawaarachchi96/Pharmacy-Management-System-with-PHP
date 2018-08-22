<?php
/**
 * Created by IntelliJ IDEA.
 * User: mcs
 * Date: 7/24/2018
 * Time: 5:41 PM
 */

interface PrescriptionDetailRepository
{
    public function setConnection(mysqli $connection);

    public function savePrescription_detail($DoctorName,$PID,$MID);

    public function updatePrescription_detail($DoctorName,$PID,$MID);

    public function deletePrescription_detail($PID,$MID);

    public function findPrescription_detaill($PID,$MID);

    public function findAllPrescription_detail();
}