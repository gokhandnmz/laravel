<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Image;

class Proje extends Model
{
    use HasFactory;
    protected $table = "proje";
    public function list(){
        return $this->orderBy('sira', 'ASC')
        ->get();
    }
    public function images($id){
        return DB::table('uploads')
        ->where('object_id', $id)
        ->where('table_name', 'proje')
        ->get();
    }
    public function store($request, $id = 0){
        $data = $request->data;
        $data['slug'] = Str::slug( $data['baslik'], '-' );
        $slug = $data['slug'];

        // image upload
        $imageResponse = $this->imageUpload( $request, $data['slug'] );
        if( $imageResponse != "" )
            $data['image'] = $imageResponse;
            
        if( $id > 0 ){
            $save = $this->where('id', $id)->update( $data );

            // gallery upload
            if( $request->hasFile('images') )
                $this->storeGallery($request, 'proje', $id);
        }
        else{
            $check = $this->where('slug', $slug)->first();
            // Aynı seo link ile link varsa sonuna güncel saati ekleyerek
            if( $check )
                $data['slug'] = $slug.'-'.time();
                
            $data['created_at'] = date('Y-m-d H:i:s');
            $save = $this->insertGetId( $data );
            $id = $save;

            // gallery upload
            if( $request->hasFile('images') )
                $this->storeGallery($request, 'proje', $id);
        }
        return $save;
    }
    public function del( $id = 0 ){
        $deleted = $this->where('id', $id)->delete();
        return $deleted;
    }

    public function imageUpload( $request, $filename ){

        if( $request->hasFile('image') ){
            $request->validate([
                'image' => 'required|image|mimes:jpg,png,jpeg'
            ]);

            $image = $request->file('image');   
            $imageName = $filename.'.'.$request->image->extension();
            $img = Image::make($image->path());
            $check_settings = DB::table('image_sizes')->where('table_name', 'proje')->get();
            if($check_settings){
                foreach($check_settings as $settings){
                    $img->resize(
                        $settings->width, 
                        $settings->height, function($constraint){
                            $constraint->aspectRatio();
                            $constraint->upsize();
                        })->save(
                        public_path('uploads/'.$settings->type.'/'.$filename.'.'.$image->extension()));
                }
            }
            $request->image->move(public_path('uploads'), $imageName);
            return $imageName;
        } else{
            return '';
        }
    }

    public function storeGallery($request, $table, $id){
        $request->validate([
            'images' => 'required',
            'images.*' => '|mimes:jpg,png,jpeg'
        ]);

        foreach ($request->file('images') as $image) {
            $imageName = Str::slug($image->getClientOriginalName(), '-');
            $imageName = $imageName.'-'.time().'.'.$image->extension();
            $imageType = $image->extension();
            $image->move(public_path('uploads/gallery'), $imageName);
                $data['created_at'] = date('Y-m-d H:i:s');
                $data['filename']   = $imageName;
                $data['filetype']   = $imageType;
                $data['table_name'] = $table;
                $data['object_id']  = $id;
                
                $save = DB::table('uploads')->insert($data);
                if(!$save){
                    return 'Resim kayıt edilemedi.';
                }
        }
}

}
