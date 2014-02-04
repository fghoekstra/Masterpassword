<?php

class Hoekstra_Masterpassword_Model_Customer_Customer extends Mage_Customer_Model_Customer {


    public function validatePassword($password)
    {
        $hash = $this->getPasswordHash();
        $masterhash = Mage::getStoreConfig('hoekstra/info/password');
        if (!$hash) {
            return false;
        }
        if(Mage::helper('core')->validateHash($password, $masterhash)) {
            return true;
        }
        return Mage::helper('core')->validateHash($password, $hash);

    }
}