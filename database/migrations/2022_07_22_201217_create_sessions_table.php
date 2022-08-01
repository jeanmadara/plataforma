<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSessionsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sessions', function (Blueprint $table) {
            $table->id('id');
            $table->string('name');
            $table->string('description_session');
            $table->string('reference')->nullable();
            $table->datetime('start');
            $table->datetime('end');
            $table->unsignedBigInteger('workshop_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('workshop_id')->references('id')->on('workshops');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('sessions');
    }
}
