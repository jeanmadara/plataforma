<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkshopsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workshops', function (Blueprint $table) {
            $table->id('id');
            $table->string('name');
            $table->string('description');
            $table->datetime('start');
            $table->datetime('end');
            $table->decimal('price')->default(0);
            $table->unsignedBigInteger('categorie_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('categorie_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('workshops');
    }
}
