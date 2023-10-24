<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsultantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consultants', function (Blueprint $table) {
            $table->bigIncrements('id_consultant');
            $table->string('license_number');
            $table->string('medical_degree_file_path')->nullable(); // diplôme
            $table->string('competences_attestation_file_path')->nullable();
            $table->string('competences_certificate_file_path')->nullable();
            $table->enum('status_request', [-1,0,1])->default(0); // Status de la demande -1 0 1
            $table->boolean('enable')->default(false);
            $table->bigInteger('user_id');
            $table->bigInteger('tarif_id')->nullable();
            $table->bigInteger('speciality_id')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('user_id')->references('user_id')->on('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('tarif_id')->references('tarif_id')->on('tarifs')->nullOnDelete();
            $table->foreign('speciality_id')->references('speciality_id')->on('specialitys')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('consultants');
    }
}
