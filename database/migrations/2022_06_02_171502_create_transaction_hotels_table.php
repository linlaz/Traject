<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionHotelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction_hotels', function (Blueprint $table) {
            $table->id();
            $table->foreignId('hotels_id')->constrained('hotels')->onDelete('cascade');
            $table->foreignId('users_id')->nullable()->index();
            $table->date('start_date');
            $table->date('finish_date');
            $table->integer('transaction_total');
            $table->string('transaction_status');
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
        Schema::dropIfExists('transaction_hotels');
    }
}
