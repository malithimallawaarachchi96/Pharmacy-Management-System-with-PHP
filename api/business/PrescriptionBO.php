<?php
/**
 * Created by IntelliJ IDEA.
 * User: mcs
 * Date: 7/22/2018
 * Time: 3:43 PM
 */

interface PrescriptionBO
{

    public function getAllPrescription();

    public function deletePrescription($PID);

    public function savePrescription($PID,$PatientID,$Date);

    public function updatePrescription($PID,$PatientID,$Date);
}