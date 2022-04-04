<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUpdatesTable extends Migration
{
    
    
    
     
   public function up()
    {
        Schema::create('updates', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('profile_id');
            $table->string('edited_at');

            $table->timestamps();
        });
    }

    
    
    
    
     
    public function down()
    {
        Schema::dropIfExists('updates');
    }
}
