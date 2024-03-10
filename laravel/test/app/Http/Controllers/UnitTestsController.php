<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UnitTestsController extends Controller
{
    public function factorial($number){
        if (is_numeric($number)&& !is_double($number)&& $number>=0) {
            if ($number==1 ||$number==0) {
                return 1;
            }
            return $number*$this->factorial($number-1);



        }else {
            return null;
        }
    }
}
