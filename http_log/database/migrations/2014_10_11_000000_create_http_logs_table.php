<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHttpLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('http_logs', function (Blueprint $table) {
            $table->id();
            // row details 
            $table->string('ip')->nullable();
            $table->string('user_id')->nullable();
            $table->string('email')->nullable();
            $table->string('url')->nullable();
            // reqeust details
            $table->longText('request_body')->nullable();
            $table->longText('request_headers')->nullable();
            // response details 
            $table->longText('response_body')->nullable();
            $table->longText('response_headers')->nullable();
            $table->string('response_status')->nullable();
            $table->string('response_time')->nullable();
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
        Schema::dropIfExists('http_logs');
    }
}
