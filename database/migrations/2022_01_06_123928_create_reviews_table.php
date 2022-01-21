<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('content');

            $table->unsignedBigInteger('reviewer_id');
            $table->unsignedBigInteger('customer_id');

            $table->index('reviewer_id', 'reviewer_idx');
            $table->index('customer_id', 'customer_idx');

            $table->foreign('reviewer_id', 'review_user_reviewer_fk')->on('users')->references('id');
            $table->foreign('customer_id', 'review_user_customer_fk')->on('users')->references('id');

            $table->boolean('incognito')->default(0);
            $table->boolean('published')->default(0);
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
        Schema::dropIfExists('reviews');
    }
}
