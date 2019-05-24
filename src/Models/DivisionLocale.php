<?php

namespace Enad\World\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Division Locale
 */
class DivisionLocale extends Model
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
    protected $table = 'world_divisions_lang';

    public function division()
    {
        return $this->belongsTo(Division::class);
    }
}
