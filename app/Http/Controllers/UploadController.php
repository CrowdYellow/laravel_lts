<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UploadController extends Controller
{
    protected $allowFileType = [
        'png', 'jpg', 'jpeg', 'gif'
    ];

    public function upload(Request $request)
    {
        //文件夹
        $dirPath  = "uploadFile/".$request->type."/upload-".date('Y-m-d');

        //文件名
        $fileName = md5(Str::random(10).time());

        if (!$request->hasFile('file')) {
            $data = [
                'status' => false,
                'msg'    => '没有文件上传!',
            ];

            return response()->json($data);
        }

        //获取上传的文件
        $file     = $request->file('file');

        if (!$file->isValid()) {
            $data = [
                'status' => false,
                'msg'    => '上传的文件不合法!',
            ];

            return response()->json($data);
        }

        //上传文件的后缀.
        $exe      = $file->getClientOriginalExtension();

        if (!in_array($exe, $this->allowFileType)) {
            $data = [
                'status' => false,
                'msg'    => '不支持该类新的文件!',
            ];

            return response()->json($data);
        }

        //新文件名
        $newFileName = $fileName.'.'.$exe;

        //移动文件到指定位置
        $path        = $file->move($dirPath, $newFileName);

        $data = [
            'status' => true,
            'msg'    => '上传成功!',
            'path'   => $dirPath.'/'.$newFileName,
        ];
        return response()->json($data);
    }
}
