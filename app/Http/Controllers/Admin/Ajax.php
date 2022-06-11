<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
class Ajax extends Controller
{
    public function deleteGallery( $id ){
        $image = DB::table('uploads')->where('id', $id)->first();
        $response = DB::table('uploads')->where('id', $id)->delete();
        if( $response ){
            $imagePath = public_path('uploads/gallery/'.$image->filename);
            $filePath = public_path('uploads/files/'.$image->filename);
            if( file_exists($imagePath) ){
                File::delete($imagePath);
                return 'success';
            }
            else if( file_exists($filePath) ){
                File::delete($filePath);
                return 'success';
            }
            else{
                return 'Dosya bulunamadı!';
            }
        }
        else{
            return 'error';
        }
    }
    public function sortable(Request $request){
        $list = $request->list;
        $table = $request->table;
        if($list){
            foreach($list as $key => $item){
                $key = $key + 1;
                $update = DB::table($table)->where('id', $item)->update(['sira' => $key]);
            }
            if($update){
                return 'success';
            }
        } else{
            return 'liste bulunamadı';
        }
    }
    public function saveContent(Request $request){
        $key = $request->data["key"];
        $text = $request->data["text"];

        $data = [
            "key" => $key,
            "value" => $text,
            "lang" => "tr"
        ];

        $check = DB::table("content_session")
        ->where("key", $key)
        ->first();

        if( $check ){
            $save = DB::table("content_session")
            ->where("key", $key)
            ->update($data);
        } else{
            $save = DB::table("content_session")
            ->insert($data);
        }
        
    }

    public function yayimla(){
        $data = DB::table("content_session")->get();
        $baseDirectory = dirname(__FILE__, 5);
        $jsonLangPath = $baseDirectory.'/lang/tr.json';
        $json = file_get_contents($jsonLangPath);
        $arr = json_decode($json, true);
        if($data){
            foreach($data as $key => $item){
                $arr[$item->key] = $item->value;
            }
        }
        $json = json_encode($arr, true);
        $json = mb_convert_encoding($json, 'UTF-8', 'Windows-1252');
        if( file_put_contents($jsonLangPath, $json) ){
            DB::table("content_session")->delete();
            return 'success';
        }
        exit();
    }
}
