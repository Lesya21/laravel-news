<?php

namespace App\Http\Controllers;

use App\Http\Requests\Feedback;
use App\Http\Requests\GetData;
use App\Models\FeedbackForm;
use App\Models\GetDataForm;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function saveCallback(Feedback $request)
    {
        $fields = $request->only('name', 'comment');
        $cortege = FeedbackForm::create($fields);

        if ($cortege) {
            return response()->json(['success' => true]);
        }
    }

    public function saveGetData(GetData $request)
    {
        $fields = $request->only('name', 'phone', 'email', 'comment');
        $cortege = GetDataForm::create($fields);

        if ($cortege) {
            return response()->json(['success' => true]);
        }
    }
}
