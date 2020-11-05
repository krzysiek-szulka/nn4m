<?php declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stores', function (Blueprint $table) {
            $table->id();
            $table->integer('store_number')->unsigned()->nullable(false);
            $table->string('store_name')->nullable(false);
            $table->json('address');
            $table->string('site_id', 2); // TODO: not null?
            $table->float('latitude');
            $table->float('longitude');
            $table->string('phone_number', 36);
            $table->boolean('cfs_flag');
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
        Schema::dropIfExists('stores');
    }
}
