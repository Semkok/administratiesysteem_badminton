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
        Schema::create('members', function (Blueprint $table) {

            $columns = array("nickname","name","surname","phonenumber","email","photograph","address","bank","payment_method");
            $table->id();
            $table->unsignedInteger('tournament_id')->nullable();
            foreach($columns as $column){
                $table->string($column);
            }
            $table->date("birthday");
            $table->date("registration_date")->nullable();
            $table->date("expiration_date")->nullable();
            $table->foreign('tournament_id')->references('id')->on('tournaments')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
