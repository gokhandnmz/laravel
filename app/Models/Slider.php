<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class Slider extends Model
{
    use HasFactory;
    protected $table = "slider";
    public function list(){
        return $this->orderBy('sira', 'ASC')
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

    public function imageUpload( $request, $filename ){

        if( $request->hasFile('image') ){
            $request->validate([
                'image' => 'required|image|mimes:jpg,png,jpeg'
            ]);
            $imageName = $filename.'-'.time().'.'.$request->image->extension();
            $request->image->move(public_path('uploads'), $imageName);
            return $imageName;
        } else{
            return '';
        }
    }

    public function sliderPages(){
        return Hizmet::where('durum', 1)->get();
    }
}
