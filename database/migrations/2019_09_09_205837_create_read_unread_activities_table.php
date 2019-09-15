<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReadUnreadActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('read_unread_activities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('seen_user_id')->comment("Table => users, Column => id");
            $table->unsignedBigInteger('activity_log_id')->comment("Table => activity_log, Column => id");
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
        Schema::dropIfExists('read_unread_activities');
    }
}
