<?php
if ( ! function_exists( 'getCurrencyList' ) ) {
	function getCurrencyList(){
		return array(
			'USD:$' 	=> 'United States dollar($)',
			'GBP:£' 	=> 'British pound(£)',
			'RUB:₽' 	=> 'Russian Ruble(₽)',
			'BRL:R$' 	=> 'Brazilian Real(R$)',
			'CAD:$' 	=> 'Canadian Dollar($)',
			'CZK:Kč' 	=> 'Czech Koruna(Kč)',
			'DKK:kr.' 	=> 'Danish Krone(kr.)',
			'EUR:€' 	=> 'Euro(€)',
			'HKD:HK$' 	=> 'Hong Kong Dollar(HK$)',
			'HUF:Ft' 	=> 'Hungarian Forint(Ft)',
			'ILS:₪' 	=> 'Israeli New Sheqel(₪)',
			'JPY:¥' 	=> 'Japanese Yen(¥)',
			'MYR:RM' 	=> 'Malaysian Ringgit(RM)',
			'MXN:Mex$' 	=> 'Mexican Peso(Mex$)',
			'NOK:kr' 	=> 'Norwegian Krone(kr)',
			'NZD:$' 	=> 'New Zealand Dollar($)',
			'CHF:CHF' 	=> 'Swiss Franc(CHF)',
			'TWD:角' 	=> 'Taiwan New Dollar(角)',
			'THB:฿' 	=> 'Thai Baht(฿)',
			'SEK:kr' 	=> 'Swedish Krona(kr)',
			'PHP:₱' 	=> 'Philippine Peso(₱)',
			'PLN:zł' 	=> 'Polish Zloty(zł)',
			'SGD:$'	  	=> 'Singapore Dollar($)',
			'TRY:TRY' 	=> 'Turkish Lira(TRY)',
		);
	}
}