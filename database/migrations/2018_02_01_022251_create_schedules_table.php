<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('doctor_id')->unsigned();
            $table->integer('patient_id')->unsigned();
            $table->datetime('appointment_date');
            $table->enum('status', [
                'Analysing',
                'Approved',
                'Canceled',
            ]);
            $table->enum('canceled_by', [
                'Patient',
                'Doctor',
            ]);
            $table->text('cancel_reason')->nullable()->default(null);
            $table->timestamps();
            $table->softDeletes();

            $table->index('appointment_date');
            $table->index('status');

            $table->foreign('doctor_id')->references('id')->on('users')
                ->onDelete('cascade');

            $table->foreign('patient_id')->references('id')->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schedules', function (Blueprint $table) {
            $table->dropForeign(['doctor_id', 'patient_id']);
        });
    }
}
