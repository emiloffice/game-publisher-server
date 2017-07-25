<?php
/**
 * Created by PhpStorm.
 * User: emil
 * Date: 2017/7/18
 * Time: 14:08
 */

namespace app\Api\v1\Controllers;

use App\Api\v1\Controllers\Controller;
use App\Game;
use App\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    public function index()
    {
        return 'upload-index';
    }

    public function img(Request $request)
    {
       if ($request -> isMethod('POST')){
           $file = $request -> file('uploadImg');// 接收文件
           if ($file -> isValid()){ //判断文件是否上传成功
               $type = $file->getClientMimeType();// 文件类型
               if (starts_with($type, 'image/')) {
                   $originalName = $file -> getClientOriginalName();// 源文件名
                   $ext = $file -> getClientOriginalExtension();// 文件扩展名
                   $realPath = $file->getRealPath();// 临时文件的绝对路径
                   $fileName = date('Y-m-d-H-i-s').'-'.uniqid().'.'.$ext;// 新文件名
                   $bool = Storage::disk('upload')->put($fileName, file_get_contents($realPath)); //传成功返回bool值
                   $img = new Image;
                   $game_id = $request->game_id;
                   $img->game_id = $game_id;
                   $game = Game::findOrFail($game_id);
                   $img->name = $fileName;
                   $img->alt = $game->game_title;
                   $img->save();
                   return ['id'=>$img->id, 'name'=>$originalName, 'alt'=>$img->alt, 'game_id'=> $img->game_id, 'url'=>getenv('UPLOADS_URL_PREFIX').$img->name];

               } else {
                   return ['status' => 'error', 'message'=> '不允许的文件类型'];
               }

           } else {
               return ['status' => 'error', 'message'=> '未能成功上传文件'];
           }
       } else {
           return ['status' => 'error', 'message'=> '未能成功上传文件'];
       }
    }
}