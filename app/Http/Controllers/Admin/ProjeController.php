<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Proje;

class ProjeController extends Controller
{
    public function __construct(){
        $this->proje = new Proje;
        $this->url = 'admin/proje';
    }
    public function index(){
        $list = $this->proje->list();
        $url = $this->url;
        return view('admin.theme.proje.list', compact( 'url', 'list' ));
    }
    public function store(Request $request, $id = 0){
        if( $id > 0 ) // id sıfırdan büyükse güncelleme işlemi yap
            $response = $this->proje->store( $request, $id );
        else // id sıfırdan büyük değilse yeni kayıt oluştur
            $response = $this->proje->store($request);
            
        if( $response ){
            return redirect()->back()->with( 'success', ' İşlem Başarılı! ' );
        }
        else{        
            return redirect()->back()->withError('İşlem Başarısız!');
        }
    }
    public function add( ){
        $url = $this->url;
        return view( 'admin.theme.proje.add', compact( 'url' ) );
    }
    public function update( $id ){
        $item = Proje::find( $id );
        $images = $this->proje->images( $id );
        $url = $this->url;
        return view( 'admin.theme.proje.update', compact( 'item', 'url', 'images' ) );
    }
    public function destroy( $id ){
        $response = $this->proje->del( $id );
        if( $response ){
            return redirect()->back()->with( 'success', ' İşlem Başarılı! ' );
        }
        else{        
            return redirect()->back()->withError('İşlem Başarısız!');
        }
    }
}
