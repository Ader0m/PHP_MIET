<?php

namespace App\Http\Controllers;

use App\Function\ToolBar;


use App\Http\Filters\BoyerFilter;
use App\Http\Requests\FilterRequest;
use App\Models\Boyer;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Boolean;

class BoyerController extends Controller
{
    public function data(Request $request)
    {
        $validatedRequest = $request->validate([
            'locked' => ['nullable', 'boolean'],
            'phone' => ['nullable'],
            'email' => ['nullable'],
            'name' => ['nullable'],
        ]);

        $boyers = Boyer::query();
        if (isset($validatedRequest['locked']) && $validatedRequest['locked']) {
            $boyers->where('locked', $validatedRequest['locked']);
        }
        if (isset($validatedRequest['email']) && $validatedRequest['email']) {
            $boyers->where('email', 'LIKE', '%' . $validatedRequest['email'] . '%');
        }
        if (isset($validatedRequest['phone']) && $validatedRequest['phone']) {
            $boyers->where('phone', 'LIKE', '%' . $validatedRequest['phone'] . '%');
        }
        if (isset($validatedRequest['name']) && $validatedRequest['name']) {
            $boyers->where('name', 'LIKE', '%' . $validatedRequest['name'] . '%')->
                orWhere('secondName', 'LIKE', '%' . $validatedRequest['name'] . '%');
        }


        return view('customers', ['boyers'=>$boyers->paginate(10)->withQueryString()]);
    }

    public function dataCustomer(int $id)
    {
        $boyers = Boyer::with(['adresses' => function ($query) {
            $query->orderBy('created_at', 'desc');
        }])->find($id);

        return view('dataCustomer', ['boyers' => $boyers]);
    }
}
