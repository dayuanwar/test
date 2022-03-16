<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use Carbon\Carbon;

class MessageController extends Controller
{
    public function sendMessage(Request $request){
        try {

            $array = array(
                'from'          => $request->from,
                'to'            => $request->to,
                'description'   => $request->description,
                'created_at'    => Carbon::now()
            );
            
            $insert = Message::insert($array);

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

    public function listMessage(Request $request){
        try {

            $data = Message::where('from', $request->id)->get();

            return [
                'data' => $data,
                'status' => 200,
                'message' => 'success'
            ];

        } catch (Exception $e) {
            return [
                'status' => 500,
                'message' => $e->getMessage()
            ];
        }
    }
}
