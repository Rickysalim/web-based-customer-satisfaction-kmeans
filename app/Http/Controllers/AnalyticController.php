<?php

namespace App\Http\Controllers;

use App\Helpers\Classification\KMeans;
use App\Models\UserCorrespondent;
use Illuminate\Http\Request;




class AnalyticController extends Controller
{
    private static $title = 'Analytic';
    public function index()
    {
        $title = self::$title;
        $userCorrespondent = UserCorrespondent::all();

        $target = [];
        $sample = [];
        foreach ($userCorrespondent as $user) {
            // $target[] = $user->name.' '.$user->age.' '.$user->gender.' '.$user->purchase_frequency;
            $sample[] = json_decode($user->correspondents);
        }
        // $prediction = array_combine($target, $sample);
        // dd($target,$sample,$prediction);
        // $data = [
        //     [1.2, 2.3, 1.0, 4],
        //     [2.5, 4.6, 3.0, 4],
        //     [4, 1, 2, 5],
        //     [5.6, 1.2, 1.3, 1.2],
        //     [6, 3.5, 4.5, 5.6],
        //     [7.5, 1.2, 1.3, 1.4],
        //     [5.5, 1, 2, 4],
        //     [6.1, 1, 2, 5],
        //     [7.5, 1, 3, 6],
        //     [9.5, 5, 4, 7],
        //     [10, 9, 5, 8],
        //     [1, 8, 6, 9],
        // ];
        $kmeans = new KMeans($k=3,null,$samples=$sample);
        $data = $kmeans->KmeansDistances();
        // dd($data);
        return view('analysis.index', compact('title','data','userCorrespondent'));
    }
}
