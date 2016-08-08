<?php namespace Mail\MailDemo\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateListsTable extends Migration
{
    public function up()
    {
        Schema::create('mail_maildemo_lists', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name')->default('');
            $table->string('alias')->default('');
            $table->string('description')->default('');
            $table->string('color')->default('#0066cc');
            $table->enum('type', ['list', 'campaign']);
            $table->integer('startrule')->default(0);
            $table->integer('enable')->default(1);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('mail_maildemo_lists');
    }
}
