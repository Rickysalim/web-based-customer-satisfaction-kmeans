<?php

namespace App\Http\Controllers;

use App\Models\ListRespondent;
use App\Models\UserCorrespondent;
use Illuminate\Http\Request;



class RespondentController extends Controller
{
    private static $title = 'Respondent';

    public function index()
    {
        $title = self::$title;
        $listRespondent = ListRespondent::with(['answer'])->get();
        return view('respondent.index', compact('title','listRespondent'));
    }

    public function get_list_respondent()
    {
        $title = self::$title;
        $listRespondent = ListRespondent::all();
        return view('respondent.crud', compact('title','listRespondent'));
    }


    public function saveRespondent(Request $request)
    {
        $listRespondent = [];
        $standardQuestion = [];
        $getListRespondent = ListRespondent::all()->toArray();

        foreach($getListRespondent as $key => $item) {
           $standardQuestion[] = str_replace(" ","_",$item['question']);
           $listRespondent[] = $request->input($standardQuestion[$key]);
        }

        $listRespondentIntegers =  array_map('intval', $listRespondent );

        UserCorrespondent::insert([
            'name'=>$request->input('name'),
            'age'=>$request->input('age'),
            'gender'=>$request->input('gender'),
            'purchase_frequency'=>$request->input('purchase_frequency'),
            'correspondents'=>json_encode($listRespondentIntegers)
        ]);


    }
}
