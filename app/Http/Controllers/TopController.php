<?php
namespace App\Http\Controllers;

// use App\User;
use App\Http\Controllers\Controller;



class TopController extends Controller
{
    /**
     * 指定ユーザーのプロフィール表示
     *
     * @param  int  $id
     * @return View
     */
    public function index()
    {
        $client = new \GuzzleHttp\Client([
            'base_uri' => 'http://zipcloud.ibsnet.co.jp/sample/',
        ]);

        $method = 'GET';
        $uri = 'search?zipcode=211-0051';   // スカイツリーの郵便番号
        $options = [];
        $response = $client->request($method, $uri, $options);

        $list = json_decode($response->getBody()->getContents(), true);


        // return view('user.profile', ['user' => User::findOrFail($id)]);
        return view('welcome');
    }
}
