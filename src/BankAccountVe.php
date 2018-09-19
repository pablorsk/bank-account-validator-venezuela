<?php
/**
 * Permite validar los Numeros de cuentas bancarias, Venezuela.
 *
 * @author Pablo Gabriel Reyes
 * @link https://pabloreyes.com.ar/ Blog
 * @link https://github.com/pablorsk/bank-account-validator-venezuela
 * @version 1.0.0
 * 
 * Basado http://omarrodrigueztech.blogspot.com.ar/2010/05/validaciones-modulo-11-permite-validar.html
 */

class BankAccountVe
{
	/**
	 * Devuelve true si el número de cuenta es válido.
	 * Controla longitud, caracteres y número verificador de acuerdo a lo 
	 * expuesto por Banco Central Venezolano
	 * 
	 * @param string $account_number
	 * @return boolean 
	 */
	public static function isValid($account_number)
	{
	    if (!preg_match('/^[0-9]{20}$/', $account_number)) {
	        return false;
        }

		$entidad = substr($account_number, 0, 4);
		$sucursal = substr($account_number, 4, 4);
		$dc = substr($account_number, 8, 2);
		$cuenta = substr($account_number, 10);
		
		$dccalculado = self::getDigitoVerificador($entidad, $sucursal, $cuenta);
        if ($dccalculado == $dc)
            return true;
		
		return false;
	}
	
	private static function getDigitoVerificador($entidad, $sucursal, $cuenta)
	{
		$d = self::dc($entidad.$sucursal, false);
		$d .= self::dc($sucursal.$cuenta, true);
		return $d;
	}
	
	private static function dc($numero, $escuenta)
	{
		if ($escuenta)
			$pesos = array(3, 2, 7, 6, 5, 4, 3, 2, 7, 6, 5, 4, 3, 2);
		else
			$pesos = array(3, 2, 7, 6, 5, 4, 3, 2, 5, 4, 3, 2);
			
		$s = 0;
		for ($i = 0; $i < strlen($numero); $i++)
		{
			$d = $numero[$i];
			$s += $d * $pesos[$i];
		}
		$resultado = (int)(11-($s % 11));
		if ($resultado == 10)
			$resultado = 0;
		else if ($resultado == 11)
			$resultado = 1;
		
		return $resultado;
	}
	
	/**
	 * @param string $account_number
	 * @return string
	 */
	public static function getBankId($account_number)
	{
		return substr($account_number, 0, 4);
	}
	
	/**
	 * @param string $account_number_or_id
	 * @return string
	 */
	public static function getBankName($account_number_or_id)
	{
		include 'banksarray.inc.php';
		$id = self::getBankId($account_number_or_id);
		if (!isset($banksarray[$id]))
			return '';
		return $banksarray[$id];
	}
}