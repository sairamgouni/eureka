<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::dropIfExists('comments');

        Schema::create('comments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('challenge_id')->comment("table => challenges, column => id");
            $table->unsignedBigInteger('user_id')->comment("table => users, column => id")->nullable();
            $table->unsignedBigInteger('parent_id')->nullable()->comment("Self reference");
            $table->nullableMorphs('comment');
            $table->boolean('finalized')->default(0)->comment("0 => No, 1 =>Yes");
            $table->boolean('winner')->default(0)->comment("0 => No, 1 =>Yes");
            $table->text('comment');
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
        Schema::dropIfExists('comments');
    }
}
