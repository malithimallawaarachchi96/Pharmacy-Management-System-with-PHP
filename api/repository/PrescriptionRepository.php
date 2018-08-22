<?php
/**
 * Created by IntelliJ IDEA.
 * User: mcs
 * Date: 7/24/2018
 * Time: 5:35 PM
 */

interface PrescriptionRepository
{
    public function setConnection(mysqli $connection);

    public function savePrescription($PID,$PatientID,$Date);

    public function updatePrescription($PID,$PatientID,$Date);

    public function deletePrescription($PID);

    public function findPrescription($PID);

    public function findAllPrescriptions();
}