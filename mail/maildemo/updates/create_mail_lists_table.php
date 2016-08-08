<?php namespace Mail\MailDemo\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateMailListsTable extends Migration
{
    public function up()
    {
        Schema::create('mail_maildemo_mail_lists', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->integer('list_id')->default(0);
            $table->integer('mail_id')->default(0);
        });
    }

    public function down()
    {
        Schema::dropIfExists('mail_maildemo_mail_lists');
    }
}
