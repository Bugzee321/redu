<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Pin extends Model
{
    public static function generate()
    {
        $record = DB::select('CALL getPin;');
        $random = '';
        if ($record && isset($record[0]))
            $random = $record[0]->random;
        return $random;
    }
}
