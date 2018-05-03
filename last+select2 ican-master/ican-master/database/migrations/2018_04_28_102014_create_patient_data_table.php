<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_data', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->string('gender');
            $table->string('type');
            $table->string('contact_relation');
            $table->string('contact_name');
            $table->string('contact_phone');
            $table->string('contact_email');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        Schema::table('users', function (Blueprint $table) {
            $table->string('identification_number')->after('id');
            $table->string('first_name')->after('identification_number');
            $table->string('last_name')->after('first_name');
            $table->string('phone')->after('email');

            $table->dropColumn('name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patient_data');

        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['identification_number', 'first_name', 'last_name', 'phone']);

            $table->string('name')->after('id');
        });
    }
}
