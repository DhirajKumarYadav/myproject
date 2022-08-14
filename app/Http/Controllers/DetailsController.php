<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Detail;
class DetailsController extends Controller
{
    public function details($id)
    {
            $data = Product::find($id);
        // return view('product', ['products'=>$data]);
    }
}
