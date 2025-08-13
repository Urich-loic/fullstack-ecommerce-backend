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
        Schema::create('site_infos', function (Blueprint $table) {
            $table->id();
            $table->text('about',50000);
            $table->text('refund', 50000);
            $table->text('purchase', 50000);
            $table->text('address',50000);
            $table->string('app_link');
            $table->string('facebook_link');
            $table->string('copy_right');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('site_infos');
    }
};
