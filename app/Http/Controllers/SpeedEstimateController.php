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
        $inputs['rwf'] = is_null($inputs['rwf']) ? 0 : $inputs['rwf'];
        $inputs['rws'] = is_null($inputs['rws']) ? 0 : $inputs['rws'];
        $inputs['limit'] = is_null($inputs['limit']) ? 0 : $inputs['limit'];
        $file = $inputs['video'];
        $type = $inputs['type'];
        $typeStr = '';
        if (count($type) > 0) {
            for ($i=0; $i < count($type); $i++) { 
                if( $i == count($type) - 1){
                    $typeStr .= $type[$i];
                } else {
                    $typeStr .= $type[$i] . ',';
                }
            }
        } else {
            $typeStr = 'all';
        }
        
        $response = Http::
            attach('video', file_get_contents($file), $file->getClientOriginalName())
            ->post(env('SERVER_URL', NULL) . '/excute', [
                'rwf' => $inputs['rwf'],
                'rws' => $inputs['rws'],
                'limit' => $inputs['limit'],
                'type' => $typeStr
            ]);
        
        if( $response->serverError() == false && 
            $response->clientError() == false && 
            $response->body() !== '' ){
            $rs = explode(',',$response->body());
            $csv = NULL;
            $images = [];
            if(count($rs) > 1) {
                for($i = 0; $i < count($rs) - 2; $i++){
                    $images[$i] = $rs[$i];
                }
                $csv = $rs[count($rs) - 2];
            } else {
                $csv = $rs[0];
            }

            $csvContent = file_get_contents($csv);
            Storage::put('csv/speed.csv', $csvContent);
            $resultCsv = (new ResultEstimatedImport)->toArray(storage_path('app/public/csv/speed.csv'));
            $datas = $resultCsv[0];
            return view('pages.estimations.result', compact('datas', 'images'));
        } else {
            $error = $response->onError(fn () => "error");
            return back()->withInput([$error]);
        }

    }
}
