<?php

require "bootstrap.php";

use Illuminate\Database\Capsule\Manager as Capsule;

Capsule::schema()->create('boards', function ($table) {

    $table->increments('id');

    $table->string('author')->nullable(false);

    $table->string('content')->nullable(false);

    $table->timestamp('create_time');

});

Capsule::schema()->create('msgs', function ($table) {

    $table->increments('id');

    $table->integer('boards_id');

    $table->string('msg_user')->nullable(false);

    $table->string('msg')->nullable(false);

    $table->timestamp('create_time');

});


Capsule::schema()->create('remsgs', function ($table) {

    $table->increments('id');

    $table->integer('boards_id');

    $table->integer('msg_id');

    $table->string('remsg_user')->nullable(false);

    $table->string('remsg')->nullable(false);

    $table->timestamp('create_time');

});


