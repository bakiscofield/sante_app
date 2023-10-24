<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsultationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consultations', function (Blueprint $table) {
            $table->bigIncrements('consultation_id');
            $table->bigInteger('consultant_id');
            $table->bigInteger('patient_id');
            $table->dateTime('wanted_date');
            $table->integer('wanted_duration');
            $table->enum('state', [-1, 0, 1])->default(0); // si le consulant accepte ou pas (en attente = 0, accepté = 1 ou refusé = -1)
            $table->boolean('cancel_by_patient'); // Si la consultation à été annulé ou pas par le patient.
            $table->enum('do',[-1,0,1]); // Si la consultation à été faite ou pas.
            $table->enum('type', [0, 1])->default(0);
            $table->string('link')->nullable();
            $table->string("country")->nullable();
            $table->string("town")->nullable();
            $table->string("address")->nullable();
            $table->string('location')->nullable();
            $table->timestamps();
            $table->foreign('consultant_id')->references('id_consultant')->on('consultants')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('patient_id')->references('id_patient')->on('patients')->onDelete('cascade')->onUpdate('cascade');
            $table->index('consultant_id');
            $table->index('patient_id');
        });
    }

    // Maintenant recréer moi 10 instance de consulation.
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('consultations');
    }
}
