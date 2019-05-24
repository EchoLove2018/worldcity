<?php
namespace Enad\World\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Country Locale
 */
class CountryLocale extends Model
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
    protected $table = 'world_countries_lang';

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
