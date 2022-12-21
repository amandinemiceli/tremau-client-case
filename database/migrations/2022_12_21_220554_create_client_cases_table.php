<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientCasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_cases', function (Blueprint $table) {
            $table->increments('id');
            $table->string('reporter_email')->unique();
            $table->string('reporter_name');
            $table->unsignedTinyInteger('reporter_age');
            $table->string('reported_url');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('client_cases');
    }
}
