<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $name
 * @property string $img
 * @property Coin[] $coins
 */
class Exchange extends Model
{
    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['name', 'img'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function coins()
    {
        return $this->hasMany(Portfolio::class);
    }
}
