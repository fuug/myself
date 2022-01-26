<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerformerDescriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('performer_descriptions', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('experience')->nullable();
            $table->string('about')->nullable();
            $table->text('gender')->nullable();
            $table->text('activities')->nullable();
            $table->boolean('hasHighestCategory')->default(0);
            $table->unsignedBigInteger('pricePerOnceSession')->nullable();

            $table->unsignedBigInteger('user_id');
            $table->index('user_id', 'user_idx');
            $table->foreign('user_id', 'user_fk')->on('users')->references('id')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('performer_descriptions');
    }
}
