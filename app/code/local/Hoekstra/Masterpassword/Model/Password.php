<?php

class Hoekstra_Masterpassword_Model_Password extends Mage_Core_Model_Config_Data {

    public function _beforeSave()
    {
        $value = $this->getValue();
        $savedvalue = Mage::getStoreConfig('hoekstra/info/password');
        if($value) {
            if($value == $savedvalue) {
                $hashed = $value;
            } else {
                $hashed = Mage::getModel('customer/customer')->hashPassword($value);
            }
            $this->setValue($hashed);
        }

    }

}