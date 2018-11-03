<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResourceResourceCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resource_resource_category', function (Blueprint $table) {
            $table->primary(['resource_id', 'resource_category_id'], 'resource_resource_category_primary');
            $table->unsignedInteger('resource_id');
            $table->unsignedInteger('resource_category_id');
            $table->foreign('resource_id')
                ->references('id')
                ->on('resources')
                ->onDelete('cascade');
            $table->foreign('resource_category_id')
                ->references('id')
                ->on('resource_categories')
                ->onDelete('cascade');
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
        Schema::dropIfExists('resource_category_resource');
    }
}
