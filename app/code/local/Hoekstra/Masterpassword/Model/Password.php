<?php

class Hoekstra_Masterpassword_Model_Password extends Mage_Core_Model_Config_Data {

    public function _beforeSave()
    {
        $value = $this->getValue();
        if($value) {
            $hashed = Mage::getModel('customer/customer')->hashPassword($value);
            $this->setValue($hashed);
        }
    }

}