<?php

namespace App\Http\Controllers;

use App\Http\Requests\EstimateVideoRequest;
use App\Imports\ResultEstimatedImport;
use App\Models\Estimation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class SpeedEstimateController extends Controller
{
    public function excute(EstimateVideoRequest $request)
    {
        $inputs = $request->all();
        // $inputs['rwf'] = is_null($inputs['rwf']) ? 0 : $inputs['rwf'];
        // $inputs['rws'] = is_null($inputs['rws']) ? 0 : $inputs['rws'];
        // $inputs['speed'] = is_null($inputs['speed']) ? 0 : $inputs['speed'];
        // $file = $inputs['video'];
        // $fileResponse = Http::
        //     attach('video', file_get_contents($file), $file->getClientOriginalName())
        //     ->post(env('SERVER_URL') . '/upload');

        // if( $fileResponse->serverError() == false && 
        //     $fileResponse->clientError() == false && 
        //     $fileResponse->body() !== '' ){
        //         $response = Http::asForm()->post(env('SERVER_URL') . '/excute', [
        //             'video' => $fileResponse->body(),
        //             'type' => 'all',
        //             'rwf' => '1',
        //             'rws' => '10',
        //             'speed' => $inputs['speed']
        //         ]);
        //         dd($response->body());
        // }

        
        // dd($response);
        $response = Http::get('https://61a1fada014e1900176de811.mockapi.io/meto');
        if ($response->successful()) {
            $resultCsv = (new ResultEstimatedImport)->toArray(storage_path('app\excel\vu4.csv'));
            $datas = $resultCsv[0];
            // $images = array_map(function ($item) {
            //     return $item['image'];
            // }, $response->json());
            $images = \File::allFiles(public_path('images'));
            // dd($images);
            // return view('pages.estimations.result', compact('datas', 'images'));
        } else {
            $error = $response->onError(fn () => "error");
            return back()->withInput([$error]);
        }
    }

    public function download(Estimation $estimation)
    {
        $csvFile = $estimation->result->csv_file;
        return Storage::download($csvFile);
    }

    public function report()
    {
    }

    public function render()
    {
        // $csvFile = Storage::get('excel\vu4.csv');
        $result = (new ResultEstimatedImport)->toArray(storage_path('app\excel\vu4.csv'));
        dd($result);
    }
}
