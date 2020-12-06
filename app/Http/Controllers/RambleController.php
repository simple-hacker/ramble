<?php

namespace App\Http\Controllers;

use App\Models\Ramble;
use Illuminate\Http\Request;

class RambleController extends Controller
{
    public function index(Ramble $ramble)
    {
        dd($ramble);
    }
}
