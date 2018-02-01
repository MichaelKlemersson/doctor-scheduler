<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->nullable()->unsigned()->default(null);
            $table->string('document');
            $table->string('zipcode');
            $table->string('address');
            $table->string('city');
            $table->string('state');
            $table->string('country');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('set null');

            $table->index('document', 'patient_search_by_document');
            $table->index([
                'zipcode',
                'address',
                'city',
                'state',
            ], 'users_search_by_location');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_profiles', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });
    }
}
