<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use Carbon\Carbon;

class ReportController extends Controller
{
    public function sendReport(Request $request){
        try {

            $array = array(
                'user_id'       => $request->user,
                'reported_id'   => $request->reported,
                'description'   => $request->description,
                'created_at'    => Carbon::now()
            );
            
            $insert = Report::insert($array);

            if($insert){
                return [
                    'message' => 'success',
                    'status' => 200,
                ];
            }else{
                return [
                    'message' => 'failed',
                    'status' => 200,
                ];
            }

        } catch (Exception $e) {
            return [
                'status' => 500,
                'message' => $e->getMessage()
            ];
        }
    }
}
