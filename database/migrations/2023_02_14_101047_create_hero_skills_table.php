<?php

use App\Models\Skills;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hero_skill', function (Blueprint $table) {
            $table->bigInteger('heroes_id')->unsigned()->nullable();
            $table->foreign('heroes_id')
                    ->references('id')
                    ->on('heroes');
            $table->bigInteger('skills_id')->unsigned()->nullable();
            $table->foreign('Skills_id')
                    ->references('id')
                    ->on('skills');
            $table->id();
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
        Schema::dropIfExists('hero_skills');
    }
};
