<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('people', function (Blueprint $table) {

            $table->increments('id');

            $table->string('name');
            $table->string('patronymic')->nullable();
            $table->string('surname')->nullable();


            $table->integer('id_boss')->nullable();
            $table->string('name_boss')->nullable();

            $table->string('position');

            $table->float('salary');

            $table->string('name_img')->nullable();

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
        Schema::dropIfExists('people');
    }
}
