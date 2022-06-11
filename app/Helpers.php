<?php

    use App\Models\Menu;
    use App\Models\Slider;
    use App\Models\Hizmet;
    use App\Models\Proje;
    use App\Models\Haber;
    use App\Models\Sayfa;
    use Illuminate\Support\Facades\DB;

    function convert_to_date( $date ){
        return date('d-m-Y', strtotime( $date ));
    }
    function JsonToArray($json){
        return json_decode($json, true); 
    }
    function menu(){
        return Menu::where('durum', 1)->where('kategori_id', 0)->orderBy('sira', 'asc')->get();
    }
    function footerMenu(){
        return Menu::where('durum', 1)->where('kategori_id', 0)->orderBy('sira', 'asc')->get();
    }
    function slider(){
        return Slider::where('durum', 1)->orderBy('sira', 'asc')->get();
    }
    function hizmetler($limit = 999){
        return Hizmet::where('durum', 1)->limit($limit)->orderBy('sira', 'asc')->get();
    }
    function referanslar(){
        return DB::table('uploads')->where('table_name', 'referans')->get();
    }
    function projeler($limit = 999){
        return Proje::where('durum', 1)->limit($limit)->orderBy('sira', 'asc')->get();
    }
    function haberler($limit = 999){
        return Haber::where('durum', 1)->limit($limit)->orderBy('sira', 'asc')->get();
    }
    function settings(){
        return DB::table('settings')->first();
    }
    function sabit_sayfalar(){
        return Sayfa::where('durum', 1)->get();
    }
?>