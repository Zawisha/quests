<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();

            $table->string('name')->comment('Имя');
            $table->string('phone', 11)->comment('Телефон');
            $table->string('email')->nullable()->unique()->comment('Email');

            $table->foreignId('quest_id')->comment('Id квеста')
                ->constrained()->onDelete('cascade');

            $table->timestamp('booked_at')->nullable()->comment('Дата и время брони');

            $table->foreignId('status_id')->default(1)->comment('Id статуса')
                ->constrained();

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
        Schema::dropIfExists('bookings');
    }
}
