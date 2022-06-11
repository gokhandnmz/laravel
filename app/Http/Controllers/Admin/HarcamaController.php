<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Harcama;

class HarcamaController extends Controller
{
    
    public function __construct(){
        $this->harcama = new Harcama;
        $this->url = 'admin/harcama';
    }
    public function index(){
        $list = $this->harcama->list();
        $url = $this->url;
        return view('admin.theme.harcama.list', compact( 'url', 'list' ));
    }
    public function store(Request $request, $id = 0){
        if( $id > 0 ) // id sıfırdan büyükse güncelleme işlemi yap
            $response = $this->harcama->store( $request, $id );
        else // id sıfırdan büyük değilse yeni kayıt oluştur
            $response = $this->harcama->store($request);
            
        if( $response ){
            return redirect()->back()->with( 'success', ' İşlem  Başarılı ' );
        }
        else{        
            return redirect()->back()->withError(' İşlem  Başarısız ');
        }
    }
    public function add( ){
        $url = $this->url;
        return view( 'admin.theme.harcama.add', compact( 'url' ) );
    }
    public function update( $id ){
        $item = Harcama::find( $id );
        $url = $this->url;
        return view( 'admin.theme.harcama.update', compact( 'item', 'url' ) );
    }
    public function destroy( $id ){
        $response = $this->harcama->del( $id );
        if( $response ){
            return redirect()->back()->with( 'success', ' İşlem  Başarılı ' );
        }
        else{        
            return redirect()->back()->withError(' İşlem  Başarısız ');
        }
    }
}
