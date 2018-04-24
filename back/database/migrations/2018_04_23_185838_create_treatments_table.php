<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTreatmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('treatments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('description');
            $table->timestamps();
        });

        Schema::create('medication_treatment', function (Blueprint $table) {
            $table->unsignedInteger('medication_id');
            $table->unsignedInteger('treatment_id');
        });

        Schema::create('symptom_treatment', function (Blueprint $table) {
            $table->unsignedInteger('symptom_id');
            $table->unsignedInteger('treatment_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('treatments');
    }
}
