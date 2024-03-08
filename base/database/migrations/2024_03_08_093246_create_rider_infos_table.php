<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('rider_infos', function (Blueprint $table) {
            $table->id();
            $table->integer('rider_id');
            $table->string('service_name');
            $table->double('lat');
            $table->double('long');
            $table->timestamp('capture_time');
            $table->integer('service_start')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rider_infos');
    }
};
