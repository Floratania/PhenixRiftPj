<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
      /**
     * The database connection that should be used by the migration.
     *
     * @var string
     */
    protected $connection = 'mysql';
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            // $table->increments('id');
            $table->unsignedBigInteger('order_id');
            $table->float('price');
            $table->date('date');
            $table->string('type_of_payment');
            $table->timestamps();

            $table->foreign('order_id')->references('id')->on('orders');
        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};


