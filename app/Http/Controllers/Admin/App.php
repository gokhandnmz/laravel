<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use ElasticScoutDriverPlus\Support\Query;
use Illuminate\Support\Facades\Redis;

class App extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.theme.dashboard');
    }

    public function hesap(){
        $user = User::find(Auth::id());
        return view('admin.theme.hesap', compact('user'));
    }
    public function store(Request $request){
        $data = $request->data;
        $save = User::where('id', Auth::id())->update($data);
        if( $save )
            return redirect()->back()->with('success', 'İşlem başarılı');
        else
            return redirect()->back()->withError('İşlem başarısız');
    }
    public function image_size($table_name){
        $data = DB::table('image_sizes')->where('table_name', $table_name)->get();
        return view('admin.theme.image_sizes', compact( 'data', 'table_name' ));
    }
    public function image_size_store(Request $request){
        try {
            $data = $request->data;
            $table_name = $request->table_name;
            $array = [];

            $check = DB::table('image_sizes')->where('table_name', $table_name)->first();
            if($data){
                foreach($data as $key => $item){
                    $array['table_name']    = $table_name;
                    $array['type']          = $key;
                    $array['width']         = $data[$key]['width'];
                    $array['height']        = $data[$key]['height'];

                    if( $check ){
                        $response = DB::table('image_sizes')
                        ->where('table_name', $table_name)
                        ->where('type', $key)
                        ->update($array);
                    } else{
                        $response = DB::table('image_sizes')->insert($array);
                        if( !$response ){
                            return redirect()->back()->withErrors('İşlem Başarısız!');
                        }
                    }
                }
                return redirect()->back()->with('success', 'İşlem Başarılı!');
            }
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors('Hata! Lütfen site yöneticisi ile iletişime geçiniz!');
        }
    }
}
