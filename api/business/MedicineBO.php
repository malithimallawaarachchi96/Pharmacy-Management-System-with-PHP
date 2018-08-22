<?php
/**
 * Created by IntelliJ IDEA.
 * User: mcs
 * Date: 7/22/2018
 * Time: 1:58 PM
 */

interface MedicineBO
{
public function getAllMedicine();

public function deleteMedicine($MID);

public function saveMedicine($MID,$Description,$Qty,$Approval);

public function updateMedicine($MID,$Description,$Qty,$Approval);
}