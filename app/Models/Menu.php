<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Menu extends Model
{
    use HasFactory;
    protected $table = "menu";
    public function parent(){
        return $this->where('durum', 1)
        ->where('kategori_id', 0)
        ->orderBy('sira', 'asc')
        ->get();
    }
    public function list(){
        return $this->where('durum', 1)
        ->orderBy('sira', 'asc')
        ->get();
    }
    public function store($request, $id = 0){
        $data = $request->data;
        $slug = $data['slug'];
        if( $id > 0 ){
            $save = $this->where('id', $id)->update( $data );
        }
        else{
            $check = $this->where('slug', $slug)->first();
            // Aynı seo link ile link varsa sonuna güncel saati ekleyerek
            if( $check )
            $data['slug'] = $slug.'-'.time();
            $data['created_at'] = date('Y-m-d H:i:s');
            $save = $this->insertGetId( $data );
        }
        return $save;
    }
    public function del( $id = 0 ){
        $deleted = $this->where('id', $id)->delete();
        return $deleted;
    }
    
    public function childs()
    {
        return $this->hasMany(Menu::class, 'kategori_id', 'id');
    }
    public function modules($table_name = ""){
       return Modul::where('durum', 1)->get();
    }
    public static function get_modules($table_name){
        if( $table_name != null && $table_name != 0)
            return DB::table($table_name)->where('durum', 1)->get();
        else
            return "";
    }
}
