<?php

namespace Enad\World;

use Enad\World\Models\Continent;
use Enad\World\Models\Country;
use Enad\World\Models\Division;
use Enad\World\Models\City;

/**
 * World
 */
class World
{
    public static function Continents()
    {
        return Continent::get();
    }

    public static function Countries()
    {
        return Country::get();
    }

    public static function getContinentByCode($code)
    {
        return Continent::getByCode($code);
    }

    public static function getCountryByCode($code)
    {
        return Country::getByCode($code);
    }

    public static function getByCode($code)
    {
        $code = strtolower($code);
        if (strpos($code, '-')) {
            list($country_code, $code) = explode('-', $code);
            $country = self::getCountryByCode($country_code);
        } else {
            return self::getCountryByCode($code);
        }
        if ($country->has_division) {
            return Division::where([
                ['country_id', $country->id],
                ['code', $code],
            ])->first();
        }
        return City::where([
                ['country_id', $country->id],
                ['code', $code],
            ]);

        throw new \Khsing\World\Exceptions\InvalidCodeException("Code is invalid");
    }
	
	public static function search($name)
    {
        $name = trim($name);
		
		$data = [];
		
		$City = City::searchByName($name);
		if((array)$City)
			$data['city'] = $City;
		
		$Division = Division::searchByName($name);
		if((array)$Division)
			$data['division'] = $Division;

		$Country = Country::searchByName($name);
		if((array)$Country){
			/* foreach($Country as &$v){
				$parent = Country::getByCode($v->code)->parent();
				$v->name = $parent->name .' '. $v->name;
				$v->local_name = $parent->local_name .' '. $v->local_name;
			} */
			$data['country'] = $Country;
		}
		

		$Continent = Continent::searchByName($name);
		if((array)$Continent)
			$data['continent'] = $Continent;
		
		return $data;
    }
	
	
	
	
	
}
