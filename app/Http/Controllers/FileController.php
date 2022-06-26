<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\AwsS3Img;
use Storage;

class FileController extends Controller
{

    public function myup(Request $request, $id)
    {
        $input = $request->file('filepond');

        if ($input === null) {
            return Response::make(config('filepond.input_name') . ' is required', 422, [
                'Content-Type' => 'text/plain',
            ]);
        }

        $file = is_array($input) ? $input[0] : $input;
        // $path = "s3_uploader";
        $path = Auth::user()->random_string;

        // ここからデータベースにURL格納
        $img_file = new AwsS3Img();
        $img_file->user_id = Auth::user()->id;
        $img_file->post_id = $id;
        $img_file->image_path = 'https://medistu-img.s3-ap-northeast-1.amazonaws.com/' .
                                $path . '/' . date('Y-m-d') . '/' . $id . '/' . $file->getClientOriginalName();
        $img_file->save();
        // ここまで

        if (! ($newFile = $file->storeAs($path . DIRECTORY_SEPARATOR . date('Y-m-d') . DIRECTORY_SEPARATOR . $id , $file->getClientOriginalName(), 's3'))) {
            return Response::make('Could not save file', 500, [
                'Content-Type' => 'text/plain',
            ]);
        }

        return Response::make('All good', 200, [
            'Content-Type' => 'text/plain',
        ]);

    }
}
