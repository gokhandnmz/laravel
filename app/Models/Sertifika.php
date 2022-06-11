<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Sertifika extends Model
{
    use HasFactory;
    protected $table = "sertifika";
    public function list(){
        return DB::table('uploads')->where('table_name', $this->table)->get();
    }
    public function store($request, $id = 0){
        $data = array();
        // file upload
        if( $request->hasFile('files') ){
            // $request->validate([
            //     'files' => 'required|mimes:pdf|max:5000'
            // ]);

            foreach ($request->file('files') as $image) {
                $imageName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
                $imageName = Str::slug($imageName, "-").'.'.$image->extension();
                $image->move(public_path('uploads/files'), $imageName);
                    $data['created_at'] = date('Y-m-d H:i:s');
                    $data['filename'] = $imageName;
                    $data['filetype'] = "pdf";
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
