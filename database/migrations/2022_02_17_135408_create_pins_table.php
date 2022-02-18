<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreatePinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pins', function (Blueprint $table) {
            $table->integer('pin');
            $table->unique(['pin']);
        });

        $procedure = "
        CREATE PROCEDURE getPin()
        BEGIN
        DECLARE random INT DEFAULT 0;
        DECLARE myloop BOOL;
        SET myloop = 1;
        WHILE myloop = 1 DO
            SET random = LPAD(FLOOR(RAND() * 999999.99), 4, '0');
            if (SELECT count('pin') FROM `pins`) = 10000 THEN
                SELECT `pin` AS random FROM `pins` ORDER BY RAND() LIMIT 1;
                SET myloop = 0;
            END IF;
            IF (SELECT count('pin') FROM `pins` WHERE `pin` = random) = 0 AND LENGTH(random) = 4 THEN
                INSERT INTO `pins`(`pin`) VALUES(random);
                SELECT random;
                SET myloop = 0;
            END IF;
        END WHILE;
        END";
        DB::statement($procedure);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pins');
        DB::statement('DROP PROCEDURE getPin;');
    }
}
