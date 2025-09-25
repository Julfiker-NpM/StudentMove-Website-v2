<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('profile_image')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('department')->nullable();
            $table->string('year_of_study')->nullable();
            $table->text('current_address')->nullable();
            $table->text('home_address')->nullable();
            $table->string('preferred_language')->default('en');
            $table->boolean('bus_delay_notifications')->default(true);
            $table->boolean('route_change_alerts')->default(true);
            $table->boolean('promotional_offers')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'profile_image',
                'date_of_birth',
                'department',
                'year_of_study',
                'current_address',
                'home_address',
                'preferred_language',
                'bus_delay_notifications',
                'route_change_alerts',
                'promotional_offers',
            ]);
        });
    }
};