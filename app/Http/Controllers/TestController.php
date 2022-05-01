<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test;
use App\Models\User;

class TestController extends Controller
{
    function test()
    {
        $test = User::findOrFail(1)->max('id');
        return $test;
       
    }
}
