<?php
/**
 * Created by IntelliJ IDEA.
 * User: mcs
 * Date: 7/22/2018
 * Time: 3:43 PM
 */

interface PrescriptionDetailBO
{
    public function getAllPrescription_details();

    public function deletePrescription_detail($PID,$MID);

    public function savePrescription_detail( $DoctorName ,$PID ,$MID);

    public function updatePrescription_detail($DoctorName ,$PID ,$MID);
}