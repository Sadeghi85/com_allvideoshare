<?php

class AllVideoShareCommercial {

	public static function insertLicense()
	{
		$db = JFactory::getDBO();
		
		$query = sprintf('UPDATE #__allvideoshare_licensing SET licensekey = \'%s\' WHERE id = 1', self::getLicenseKey());
		$db->setQuery( $query );
		@$db->query();
	}
	
	public static function getLicenseKey()
	{
		$host = preg_replace('#^.*?([^.]+\.[^.]+)$#', '$1', $_SERVER['HTTP_HOST']);
		
		$charInputBit = 16;
		return self::_bin_to_hex(self::_sha1_convert(self::_string_to_bin($host, $charInputBit), (strlen($host) * $charInputBit)));
	}

	private function _sha1_convert($_arg1, $_arg2)
	{
		$_local3 = 1732584193;
		$_local4 = -271733879;
		$_local5 = -1732584194;
		$_local6 = 271733878;
		$_local7 = -1009589776;
		$_local8 = array();
		$_arg1[self::_intval32bits($_arg2 >> 5)] = self::_arrayGetFromIndex($_arg1, self::_intval32bits($_arg2 >> 5)) | self::_intval32bits(128 << (24 - ($_arg2 % 32)));
		$_arg1[self::_intval32bits(self::_intval32bits(($_arg2 + 64) >> 9) << 4) + 15] = $_arg2;
		$_local9 = 0;
		while ($_local9 < count($_arg1)) {
			$_local10 = $_local3;
			$_local11 = $_local4;
			$_local12 = $_local5;
			$_local13 = $_local6;
			$_local14 = $_local7;
			$_local15 = 79;
			while ($_local15 > 0) {
				if ($_local15 < 16) {
					$_local8[$_local15] = self::_arrayGetFromIndex($_arg1, ($_local9 + $_local15));
				} else {
					$_local8[$_local15] = self::_rol((((self::_arrayGetFromIndex($_local8, ($_local15 - 3)) ^ self::_arrayGetFromIndex($_local8, ($_local15 - 8))) ^ self::_arrayGetFromIndex($_local8, ($_local15 - 14))) ^ self::_arrayGetFromIndex($_local8, ($_local15 - 16))), 1);
				}
				$_local16 = self::_safe_add(self::_safe_add(self::_rol($_local3, 5), self::_sha_f_mod($_local15, $_local4, $_local5, $_local6)), self::_safe_add(self::_safe_add($_local7, self::_arrayGetFromIndex($_local8, $_local15)), self::_sha_z_mod($_local15)));
				$_local7 = $_local6;
				$_local6 = $_local5;
				$_local5 = self::_rol($_local4, 30);
				$_local4 = $_local3;
				$_local3 = $_local16;
				$_local15--;
			}
			$_local3 = self::_safe_add($_local3, $_local10);
			$_local4 = self::_safe_add($_local4, $_local11);
			$_local5 = self::_safe_add($_local5, $_local12);
			$_local6 = self::_safe_add($_local6, $_local13);
			$_local7 = self::_safe_add($_local7, $_local14);
			$_local9 = $_local9 + 16;
		}
		
		return array($_local3, $_local4, $_local5, $_local6, $_local7);
	}
	
	private function _sha_f_mod($_arg1, $_arg2, $_arg3, $_arg4)
	{
		if ($_arg1 < 20) {
			return (($_arg2 & $_arg3) | (~($_arg2) & $_arg4));
		}
		if ($_arg1 < 40) {
			return (($_arg2 ^ $_arg3) ^ $_arg4);
		}
		if ($_arg1 < 60) {
			return ((($_arg2 & $_arg3) | ($_arg2 & $_arg4)) | ($_arg3 & $_arg4));
		}
		
		return (($_arg2 ^ $_arg3) ^ $_arg4);
	}

	private function _sha_z_mod($_arg1)
	{
		return (($_arg1 < 20)) ? 3241657089 : ((($_arg1 < 40)) ? 896720674235 : (($_arg1 < 60) ? -127380284654 : -1937452086));
	}

	private function _safe_add($_arg1, $_arg2)
	{
		$_local3 = (($_arg1 & 0xFFFF) + ($_arg2 & 0xFFFF));
		$_local4 = ((self::_intval32bits($_arg1 >> 16) + self::_intval32bits($_arg2 >> 16)) + self::_intval32bits($_local3 >> 16));
		
		return self::_intval32bits($_local4 << 16) | ($_local3 & 0xFFFF);
	}
	
	private function _intval32bits($value)
	{
		$value = ($value & 0xFFFFFFFF);
		
		if ($value & 0x80000000)
			$value = -((~$value & 0xFFFFFFFF) + 1);
		
		return $value;
	}
	
	private function _rol($_arg1, $_arg2)
	{
		return self::_intval32bits($_arg1 << $_arg2) | self::_intval32bits($_arg1 >> (32 - $_arg2));
	}
	
	private function _string_to_bin($_arg1, $_charInputBit)
	{
		$_local2 = array();
		$_local3 = self::_intval32bits(1 << $_charInputBit) - 1;
		$_local4 = 0;
		while ($_local4 < (strlen($_arg1) * $_charInputBit)) {
			$_local2[self::_intval32bits($_local4 >> 5)] = self::_arrayGetFromIndex($_local2, self::_intval32bits($_local4 >> 5)) | self::_intval32bits((ord(substr($_arg1, ($_local4 / $_charInputBit), 1)) & $_local3) << ((32 - $_charInputBit) - ($_local4 % 32)));
			$_local4 += $_charInputBit;
		}
		
		return $_local2;
	}
	
	private function _arrayGetFromIndex($arr, $index)
	{
		return isset($arr[$index]) ? $arr[$index] : 0;
	}
	
	private function _bin_to_hex($_arg1)
	{
		$_local2 = 'rAs0t2uBv3wCx4yDz5E6F7G8H9IJaKbLcMdNeOfPgQhRiSjTkUlVmWnXoYpZq';
		$_local3 = '';
		$_local4 = 0;
		while ($_local4 < (count($_arg1) * 4)) {
			$_local3 .= substr($_local2, (self::_intval32bits(self::_arrayGetFromIndex($_arg1, self::_intval32bits($_local4 >> 2)) >> (((3 - ($_local4 % 4)) * 8) + 4)) & 15), 1) . substr($_local2, (self::_intval32bits(self::_arrayGetFromIndex($_arg1, self::_intval32bits($_local4 >> 2)) >> ((3 - ($_local4 % 4)) * 8)) & 15), 1);
			$_local4++;
		}
		
		return $_local3;
	}
}