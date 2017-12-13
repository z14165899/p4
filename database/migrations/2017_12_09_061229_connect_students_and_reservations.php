<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ConnectStudentsAndReservations extends Migration
{
    public function up()
    {
        Schema::table('reservations', function (Blueprint $table) {

        $table->integer('student_id')->unsigned();

        $table->foreign('student_id')->references('id')->on('students');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('reservations', function (Blueprint $table) {

        # ref: http://laravel.com/docs/migrations#dropping-indexes
        # combine tablename + fk field name + the word "foreign"
        $table->dropForeign('reservations_student_id_foreign');

        $table->dropColumn('student_id');
        });
    }
}
