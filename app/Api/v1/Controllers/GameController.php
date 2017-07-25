<?php
/**
 * Created by PhpStorm.
 * User: emil
 * Date: 2017/7/20
 * Time: 16:31
 */

namespace app\Api\v1\Controllers;
use App\Game;
use App\User;
use App\Api\v1\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class GameController extends Controller
{
    public function index(Request $request)
    {
        return $request;
    }
    public function store(Request $request)
    {
        if ($request->isMethod('POST')) {
//
            // 验证请求
            $this->validate($request, [
                'name' => 'required',
                'email' => 'required|unique:users',
                'company' => 'required',
                'gameTitle' => 'required',
                'gameBio' => 'required',

            ]);
            $user = new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt('123456');
            $user->save();
            $user_id = $user->id;
            $game = new Game;
            $game->user_id = $user_id;
            $game->user_name = $request->name;
            $game->company = $request->company;
            $game->game_title = $request->gameTitle;
            $game->game_bio = $request->gameBio;
            $game->images_id = '';
            $game->videos_id = '';
            $game->save();
            $game_id = $game->id;
            return ['status'=>'success', 'code'=>':code', 'user_id'=>$user_id, 'game_id'=>$game_id];
        }else {
            exit();
//            return $res;
            /*$game = new Game;
            $game->user_name = $request->name;
            $game->user_name = $request->name;*/
        }


    }

    public function update($id, Request $request)
    {
        $game = new Game;
        $data['videos_id'] = $request->videoUrl;
        $game->where('id',$id )->update($data);
        return ['status'=>'success', 'state_code'=>'0', 'message'=>'Successful operation!!!'];

    }
}