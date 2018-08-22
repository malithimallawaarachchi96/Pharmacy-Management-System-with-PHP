<?php
/**
 * Created by IntelliJ IDEA.
 * User: mcs
 * Date: 7/22/2018
 * Time: 3:42 PM
 */

interface PatientBO
{
  public function getAllPatient();

  public function deletePatient($PatientID);

  public function savePatient($PatientID,$Address,$Name);

  public function updatePatient($PatientID,$Address,$Name);

}