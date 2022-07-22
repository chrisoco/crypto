<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coins', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('symbol');
            $table->string('slug');
            $table->integer('rank');

            $table->double('price', 30, 10);
            $table->double('volume_24h', 30, 10);
            $table->double('volume_change_24h', 16, 10);
            $table->double('percent_change_1h', 16, 10);
            $table->double('percent_change_24h', 16, 10);
            $table->double('percent_change_7d', 16, 10);
            $table->double('percent_change_30d', 16, 10);
            $table->double('percent_change_60d', 16, 10);
            $table->double('percent_change_90d', 16, 10);
            $table->double('market_cap', 30, 10);
            $table->double('fully_diluted_market_cap', 30, 10);
            $table->double('market_cap_dominance', 6, 4);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('coins');
    }
};
