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
        Schema::create('asset', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('RptDt');
            $table->date('date');
            $table->string('TckrSymb');
            $table->string('ISIN');
            $table->string('Asst');
            $table->string('BalQty');
            $table->string('TradAvrgPric');
            $table->string('PricFctr');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('asset');
    }
};
