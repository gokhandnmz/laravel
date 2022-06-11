<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Modul extends Model
{
    use HasFactory;
    protected $table = "modul";
    public function list(){
        return $this->get();
    }
    public function store($request, $id = 0){
        $data = $request->data;
        if( $id > 0 ){
            $save = $this->where('id', $id)->update( $data );
        }
        else{                
            $data['created_at'] = date('Y-m-d H:i:s');
            $save = $this->insertGetId( $data );
            $id = $save;
        }
        return $save;
    }
    public function del( $id = 0 ){
        $deleted = $this->where('id', $id)->delete();
        return $deleted;
    }
    public function table_list(){
        return DB::select('SHOW TABLES');
    }
}
