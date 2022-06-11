<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Musteri;

class MusteriController extends Controller
{
    
    public function __construct(){
        $this->musteri = new Musteri;
        $this->url = 'admin/musteri';
    }
    public function index(){
        $list = $this->musteri->list();
        $url = $this->url;
        return view('admin.theme.musteri.list', compact( 'url', 'list' ));
    }
    public function detail( $id ){
        $musteri = Musteri::find( $id );
        $bakimlar = $this->musteri->findBakimByCustomerId( $id );

        $url = $this->url;
        return view('admin.theme.musteri.detail', compact( 'url', 'musteri', 'bakimlar' ));
    }
    public function store(Request $request, $id = 0){
        if( $id > 0 ) // id sıfırdan büyükse güncelleme işlemi yap
            $response = $this->musteri->store( $request, $id );
        else // id sıfırdan büyük değilse yeni kayıt oluştur
            $response = $this->musteri->store($request);
            
        if( $response ){
            return redirect()->back()->with( 'success', ' İşlem  Başarılı ' );
        }
        else{        
            return redirect()->back()->withError(' İşlem  Başarısız ');
        }
    }
    public function add( ){
        $url = $this->url;
        return view( 'admin.theme.musteri.add', compact( 'url' ) );
    }
    public function update( $id ){
        $item = Musteri::find( $id );
        $url = $this->url;
        return view( 'admin.theme.musteri.update', compact( 'item', 'url' ) );
    }
    public function destroy( $id ){
        $response = $this->musteri->del( $id );
        if( $response ){
            return redirect()->back()->with( 'success', ' İşlem  Başarılı ' );
        }
        else{        
            return redirect()->back()->withError(' İşlem  Başarısız ');
        }
    }
}
