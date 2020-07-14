<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportStructure extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('report', function (Blueprint $table) {
            $table->id();

            $table->timestamps();
        });

        Schema::create('report_meta', function (Blueprint $table) {
            $table->id();
            $table->integer('report_id');
            $table->integer('meta_id');

            $table->timestamps();

            $table->foreign('report_id')
                ->on('report')
                ->references('id');
            $table->foreign('meta_id')
                ->on('meta')
                ->references('id');
        });

        Schema::create('operator', function (Blueprint $table) {
            $table->id();
            $table->string("type");
            $table->string('name');

            $table->timestamps();
        });

        Schema::create('value', function (Blueprint $table) {
            $table->id();
            $table->string('value');

            $table->timestamps();
        });


        Schema::create('report_filter_group', function (Blueprint $table) {
            $table->id();
            $table->integer('report_id');

            $table->timestamps();

            $table->foreign('report_id')
                ->on('report')
                ->references('id');
        });

        Schema::create('report_filter', function (Blueprint $table) {
            $table->id();
            $table->integer('report_filter_group_id');
            $table->integer('meta_id');
            $table->integer('value_id');
            $table->integer('operator_id');

            $table->timestamps();


            $table->foreign('report_filter_group_id')
                ->on('report_filter_group')
                ->references('id');
            $table->foreign('meta_id')
                ->on('meta')
                ->references('id');
            $table->foreign('value_id')
                ->on('value')
                ->references('id');
            $table->foreign('operator_id')
                ->on('operator')
                ->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('report_filter');
        Schema::dropIfExists('report_filter_group');
        Schema::dropIfExists('operator');
        Schema::dropIfExists('value');
        Schema::dropIfExists('report_meta');
        Schema::dropIfExists('report');
    }
}
