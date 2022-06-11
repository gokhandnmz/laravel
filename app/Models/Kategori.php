<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Kategori extends Model
{
    use HasFactory;
    protected $table = "kategori";
    public function parent(){
        return $this->where('durum', 1)
        ->where('parent_id', 0)
        ->orderByDesc('sira')
        ->get();
    }
    public function list(){
        return $this->where('durum', 1)
        ->orderByDesc('sira')
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
        }
        return $save;
    }
    public function del( $id = 0 ){
        $deleted = $this->where('id', $id)->delete();
        if( $deleted )
            redirect()->back()->with( 'success', ' Deleted successfully! ' );
        else
            redirect()->back()->withError('Could not delete!');
        }

    
    public function childs()
    {
        return $this->hasMany(Kategori::class, 'parent_id', 'id');
    }
}
