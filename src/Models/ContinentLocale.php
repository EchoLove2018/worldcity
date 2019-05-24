<?php

namespace Enad\World\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Continent Locale
 */
class ContinentLocale extends Model
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
    protected $table = 'world_continents_lang';

    /**
     * return belonged Continent
     *
     * @return void
     */
    public function continent()
    {
        return $this->belongsTo(Continent::class);
    }
}
