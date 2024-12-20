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
        Schema::create('issues', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('computer_id');
            $table->foreign('computer_id')->references('id')->on('computers')->onDelete('cascade');
            $table->string('reported_by',50)->nullable();//người báo cáo sự cố(tùy chọn)
            $table->dateTime('reported_date');//tgan bao cao
            $table->text('description');
            $table->enum('urgency', ['low', 'Medium', 'high']);//muc do su co
            $table->enum('status', ['Open', 'In Progress', 'Resolved'])->default('Open');//trang thai hien tai
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('issues');
    }
};
