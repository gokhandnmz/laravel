<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Haber;

class HaberController extends Controller
{
    public function __construct(){
        $this->haber = new Haber;
        $this->url = 'admin/haber';
    }
    public function index(){
        $list = $this->haber->list();
        $url = $this->url;
        return view('admin.theme.haber.list', compact( 'url', 'list' ));
    }
    public function store(Request $request, $id = 0){
        if( $id > 0 ) // id sıfırdan büyükse güncelleme işlemi yap
            $response = $this->haber->store( $request, $id );
        else // id sıfırdan büyük değilse yeni kayıt oluştur
            $response = $this->haber->store($request);
            
        if( $response ){
            return redirect()->back()->with( 'success', ' İşlem Başarılı! ' );
        }
        else{        
            return redirect()->back()->withError('İşlem Başarısız!');
        }
    }
    public function add( ){
        $url = $this->url;
        return view( 'admin.theme.haber.add', compact( 'url' ) );
    }
    public function update( $id ){
        $item = Haber::find( $id );
        $images = $this->haber->images( $id );
        $url = $this->url;
        return view( 'admin.theme.haber.update', compact( 'item', 'url', 'images' ) );
    }
    public function destroy( $id ){
        $response = $this->haber->del( $id );
        if( $response ){
            return redirect()->back()->with( 'success', ' İşlem Başarılı! ' );
        }
        else{        
            return redirect()->back()->withError('İşlem Başarısız!');
        }
    }
}
