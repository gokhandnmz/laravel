<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class Sayfa extends Model
{
    use HasFactory;
    protected $table = "sayfa";
    public function list(){
        return $this->orderBy('sira', 'ASC')
        ->get();
    }
    public function store($request, $id = 0){
        $data = $request->data;
        $data['slug'] = Str::slug( $data['baslik'], '-' );
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
            $id = $save;
        }
        return $save;
    }
    public function del( $id = 0 ){
        $deleted = $this->where('id', $id)->delete();
        return $deleted;
    }    

}
