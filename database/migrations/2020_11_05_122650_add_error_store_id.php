<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddErrorStoreId extends Migration
{
    public function up(): void
    {
        Schema::table('errors', function(Blueprint $table) {
            $table->integer('store_id')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('errors', function(Blueprint $table) {
            $table->dropColumn('store_id');
        });
    }
}
