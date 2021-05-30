<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    public function saveCallback(Request $request)
    {
        $this->validate($request, [
           'name' => 'required',
           'comment' => 'required'
        ]);

        $str = date('Y-m-d H:i:s'). "\n";
        $str .= 'Имя: ';
        $str .= $request->input('name') . "\n";
        $str .= 'Комментарий: ';
        $str .= $request->input('comment') . "\n\r";

        $handle = fopen(public_path("/docs/result-callback.txt"), "a+");
        fwrite($handle, $str);

        return response()->json(['success' => true]);
    }

    public function saveGetData(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'comment' => 'required'
        ]);

        $str = date('Y-m-d H:i:s'). "\n";
        $str .= 'Имя: ';
        $str .= $request->input('name') . "\n";
        $str .= 'Телефон: ';
        $str .= $request->input('phone') . "\n";
        $str .= 'Email: ';
        $str .= $request->input('email') . "\n";
        $str .= 'Комментарий: ';
        $str .= $request->input('comment') . "\n\r";

        $handle = fopen(public_path("/docs/result-order.txt"), "a+");
        fwrite($handle, $str);

        return response()->json(['success' => true]);
    }
}
