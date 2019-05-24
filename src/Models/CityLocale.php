<?php
namespace Enad\World\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * City
 */
class CityLocale extends Model
{
	/**
     * The connection name for the model.
     *
     * @var string
     */
    protected $connection = 'mysql_nad_lang';
	
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'world_cities_lang';

    /**
     * return belonged City
     *
     * @return void
     */
    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
