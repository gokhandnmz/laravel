<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Referans extends Model
{
    use HasFactory;
    protected $table = "referans";
    public function list(){
        return DB::table('uploads')->where('table_name', $this->table)->get();
    }
    public function store($request, $id = 0){
        $data = array();
        // image upload
        if( $request->hasFile('images') ){
            $request->validate([
                'images' => 'required',
                'images.*' => '|mimes:jpg,png,jpeg'
            ]);

            foreach ($request->file('images') as $image) {
                $imageName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
                $imageName = Str::slug($imageName, '-').'-'.time().'.'.$image->extension();
                $imageType = $image->extension();
                $image->move(public_path('uploads/gallery'), $imageName);
                    $data['created_at'] = date('Y-m-d H:i:s');
                    $data['filename'] = $imageName;
                    $data['filetype'] = $imageType;
                    $data['table_name'] = $this->table;
                    
                    $save = DB::table('uploads')->insert($data);
                    if(!$save){
                        return 'Resim kayıt edilemedi.';
                    }
            }
        }
        return $save;
    }
    public function del( $id = 0 ){
        $deleted = $this->where('id', $id)->delete();
        return $deleted;
    }
}
