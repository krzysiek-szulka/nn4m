<?php declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddErrorOperationId extends Migration
{
    public function up(): void
    {
        Schema::table('errors', function($table) {
            $table->string('operation_id', 36);
        });
    }

    public function down(): void
    {
        Schema::table('errors', function($table) {
            $table->dropColumn('operation_id');
        });
    }
}
