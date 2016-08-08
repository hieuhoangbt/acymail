<?php namespace Mail\MailDemo\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateMailsTable extends Migration
{
    public function up()
    {
        Schema::create('mail_maildemo_mails', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('alias')->default('');
            $table->string('subject')->default('');
            $table->text('body')->default('');
            $table->string('from_name')->default('');
            $table->string('from_email')->default('');
            $table->string('replay_name')->default('');
            $table->string('replay_email')->default('');
            $table->enum('type', ['notification','newsletter', 'welcome','unsub']);
            $table->integer('state')->default(1);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('mail_maildemo_mails');
    }
}
