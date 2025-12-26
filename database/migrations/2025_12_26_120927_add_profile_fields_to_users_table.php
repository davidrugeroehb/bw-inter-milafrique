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
        Schema::table('users', function (Blueprint $table) {
            $table->string('username')->nullable()->after('name');
            $table->date('birthday')->nullable()->after('email');
            $table->string('position')->nullable()->after('birthday');
            $table->integer('jersey_number')->nullable()->after('position');
            $table->string('profile_photo')->nullable()->after('jersey_number');
            $table->text('bio')->nullable()->after('profile_photo');
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['username', 'birthday', 'position', 'jersey_number', 'profile_photo', 'bio']);
        });
    }
};
