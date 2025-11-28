<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NicheMaster;
use Illuminate\Support\Facades\Validator;

class NicheController extends Controller
{
  //
  public function NicheList()
  {
    return response()->json(NicheMaster::all());
  }

  
}
