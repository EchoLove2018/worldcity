<?php

namespace Enad\World\Models;

use Illuminate\Database\Eloquent\Model;
use Enad\World\WorldTrait;

/**
 * Continent
 */
class Continent extends Model
{
    use WorldTrait;
	
	/**
     * The connection name for the model.
     *
     * @var string
     */
    protected $connection = 'mysql';
	
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'world_continents';

    /**
     * append names
     *
     * @var array
     */
    protected $appends = ['local_name','local_full_name','local_alias', 'local_abbr', 'status'];

    /**
     * return Countries
     *
     * @return void
     */
    public function countries()
    {
        return $this->hasMany(Country::class);
    }

    public function children()
    {
        return $this->countries;
    }

    public function parent()
    {
        return null;
    }

    /**
     * return Continent locales
     *
     * @return void
     */
    public function locales()
    {
        return $this->hasMany(ContinentLocale::class);
    }

    /**
     * Get Continent by name
     *
     * @param string $name
     * @return collection
     */
    public static function getByName($name)
    {
        $localized = ContinentLocale::where('name', $name)->first();
        if (is_null($localized)) {
            return $localized;
        }
        return $localized->Continent;
    }

    /**
     * Search Continent by name
     *
     * @param string $names
     * @param mixed $name
     * @return collection
     */
    public static function searchByName($name)
    {
        return ContinentLocale::where('name', 'like', "%" . $name . "%")
            ->get()->map(function ($item) {
                return $item->Continent;
            });
    }
}
