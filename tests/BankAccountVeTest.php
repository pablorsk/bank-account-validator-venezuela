<?php

/**
 * This class doesn't do much yet..
 *
 * @author Pablo Gabriel Reyes
 * @link https://pabloreyes.com.ar/ Blog
 * @link https://github.com/pablorsk/cbu-validator-php CBU validator on GitHub
 * @version 1.0.0
 */
class BankAccountVeTest extends PHPUnit_Framework_TestCase
{
    public function	testIsValid()
	{
        $this->assertEquals(false, BankAccountVe::isValid('111111111'));
        $this->assertEquals(false, BankAccountVe::isValid('AAAAA0000'));
        $this->assertEquals(false, BankAccountVe::isValid('01340946340001361695'));
        $this->assertEquals(true,  BankAccountVe::isValid('01050194651194079423'));
	}
	
    public function	testBankName()
	{
		$this->assertEquals('MERCANTIL', BankAccountVe::getBankName('01050194697194012294'));
        $this->assertEquals('', BankAccountVe::getBankName('00050194697194012294'));
	}	
}