<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleXLS;

class ExcelController extends Controller
{
    public function parse_rows($file)
    {
        return new SimpleXLS($file);
    }
}
