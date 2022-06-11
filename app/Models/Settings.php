<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    use HasFactory;
    protected $table = "settings";

    public function list(){
        return $this->get();
    }
    public function store($request){
        $data = $request->data;
        
        // image upload
        $imageResponse = $this->imageUpload( $request );
        if( $imageResponse != "" )
            $data['logo'] = $imageResponse;
            
        $check = $this->first();
        if( $check ){
            $save = $this->where('id', $check->id)->update( $data );
        }
        else{
            $save = $this->insertGetId( $data );
        }
        return $save;
    }
    public function imageUpload( $request ){

        if( $request->hasFile('image') ){
            $request->validate([
                'image' => 'required|image|mimes:jpg,png,jpeg'
            ]);
            $imageName = 'logo-'.time().'.'.$request->image->extension();
            $request->image->move(public_path('uploads'), $imageName);
            return $imageName;
        } else{
            return '';
        }
    }
}
