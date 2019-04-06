<?php

namespace App\Http\Controllers;

use App\Models\HistoryRecord;
use Illuminate\Http\Request;

class MessagesController extends Controller
{

    public function store(Request $request)
    {
        try{
            $historyRecord = new HistoryRecord();

            $historyRecord->room_id    = $request->room_id;
            $historyRecord->user_id    = $request->user_id;
            $historyRecord->to_user_id = $request->to_user_id;
            $historyRecord->msg        = $request->msg;

            $historyRecord->save();
        }
        catch (\Exception $e)
        {
            echo $e;
        }

        $data = [
            'code' => 200,
            'msg'  => 'success',
            'data' => [],
        ];

        return response()->json($data);
    }
}
