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
        Schema::create('adresses', function (Blueprint $table) {
            $table->id();
            $table->string('tag');
            $table->string('city');
            $table->string('street');
            $table->string('building');
            $table->unsignedInteger('floor');
            $table->unsignedInteger('apartment number');
            $table->string('intercom code');
            $table->unsignedBigInteger('boyer_id');
            $table->index('boyer_id', 'adress_boyer_idx');
            $table->timestamps();

            $table->foreign('boyer_id', 'adress_boyer_fk')->on('boyers')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('adresses');
    }
};
