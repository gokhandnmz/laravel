<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Bakim;

class Musteri extends Model
{
    use HasFactory;
    protected $table = "musteri";

    public function bakim(){
        return $this->hasMany(Bakim::class, 'musteri_id');
    }
    public function list(){
        return $this->where('durum', 1)
        ->get();
    }
    public function store($request, $id = 0){
        $data = $request->data;
        if( $id > 0 ){
            $save = $this->where('id', $id)->update( $data );
        }
        else{
                $data['created_at'] = date('Y-m-d H:i:s');
                $save = $this->insert( $data );
        }
        return $save;
    }
    public function del( $id = 0 ){
        $delete = $this->where('id', $id)->delete();
        return $delete;
    }
    public function findBakimByCustomerId( $id ){
        return Bakim::where('musteri_id', $id)->get();
    }
    public static function totalEarnings( $id ){
        $response = Bakim::where('musteri_id', $id)
        ->where('odeme_durumu', 1)
        ->sum('fiyat');

        if( $response )
            return convert_to_money( $response );
        else
            return 0;
    }
    public static function totalDebt( $id ){
        $response = Bakim::where('musteri_id', $id)
        ->where('odeme_durumu', 0)
        ->sum('fiyat');

        if( $response )
            return convert_to_money( $response );
        else
            return 0;
    }
    public static function findCustomersWithDebt(){
        $data = Musteri::where('durum', 1)->get();
        $list = [];
        if( $data ){
            foreach( $data as $musteri ){
                $list[$musteri->id] = [
                    "id" => $musteri->id,
                    "bina_adi" => $musteri->bina_adi,
                    "adsoyad" => $musteri->adsoyad,
                    "fiyat" => Bakim::where('musteri_id', $musteri->id)->where('odeme_durumu', 0)->sum("fiyat")
                ];
            }
        }
        return $list;
    }
}
