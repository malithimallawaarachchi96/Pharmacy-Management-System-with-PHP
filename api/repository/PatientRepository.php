<?php
/**
 * Created by IntelliJ IDEA.
 * User: mcs
 * Date: 7/24/2018
 * Time: 5:34 PM
 */

interface PatientRepository
{
public function setConnection(mysqli $connection);

    public function savePatient($PatientID,$Address,$Name);

    public function updatePatient($PatientID,$Address,$Name);

    public function deletePatient($PatientID);

    public function findPatient($PatientID);

    public function findAllPatients();
}