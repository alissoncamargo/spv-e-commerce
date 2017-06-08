<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterUserTableFacebook extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function ($table) {
            $table->string('facebook_id',100)->nullable();
            $table->string('avatar',100)->nullable();
            $table->string('github',100)->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function ($table) {
            $table->dropColumn('facebook_id');
            $table->dropColumn('avatar');
            $table->dropColumn('github');
        });
    }
}
