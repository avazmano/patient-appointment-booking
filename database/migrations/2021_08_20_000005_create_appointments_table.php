<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('type')->nullable();
            $table->datetime('date')->nullable();
            $table->string('insurance')->nullable();
            $table->boolean('agree')->default(0)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
