<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property float $price
 * @property float $volume_24h
 * @property float $volume_change_24h
 * @property float $percent_change_1h
 * @property float $percent_change_24h
 * @property float $percent_change_7d
 * @property float $percent_change_30d
 * @property float $percent_change_60d
 * @property float $percent_change_90d
 * @property float $market_cap
 * @property float $fully_diluted_market_cap
 * @property float $market_cap_dominance
 * @property string $created_at
 * @property string $updated_at
 * @property Coin $coin
 * @property History[] $history
 */
class Quote extends Model
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
    protected $fillable = ['price', 'volume_24h', 'volume_change_24h', 'percent_change_1h', 'percent_change_24h', 'percent_change_7d', 'percent_change_30d', 'percent_change_60d', 'percent_change_90d', 'market_cap', 'fully_diluted_market_cap', 'market_cap_dominance', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function coin()
    {
        return $this->hasOne(Coin::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function history()
    {
        return $this->hasMany(History::class);
    }
}
