<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Urun;

class UrunController extends Controller
{
    public function __construct(){
        $this->urun = new Urun;
        $this->url = 'admin/urun';
    }
    public function index(){
        $list = $this->urun->list();
        $url = $this->url;
        return view('admin.theme.urun.list', compact( 'url', 'list' ));
    }
    public function store(Request $request, $id = 0){
        if( $id > 0 ) // id sıfırdan büyükse güncelleme işlemi yap
            $response = $this->urun->store( $request, $id );
        else // id sıfırdan büyük değilse yeni kayıt oluştur
            $response = $this->urun->store($request);
            
        if( $response ){
            return redirect()->back()->with( 'success', ' İşlem Başarılı! ' );
        }
        else{        
            return redirect()->back()->withError('İşlem Başarısız!');
        }
    }
    public function add( ){
        $url = $this->url;
        $categories = $this->urun->categories();
        return view( 'admin.theme.urun.add', compact( 'url', 'categories' ) );
    }
    public function update( $id ){
        $item = Urun::find( $id );
        $images = $this->urun->images( $id );
        $url = $this->url;
        return view( 'admin.theme.urun.update', compact( 'item', 'url', 'images' ) );
    }
    public function destroy( $id ){
        $response = $this->urun->del( $id );
        if( $response ){
            return redirect()->back()->with( 'success', ' İşlem Başarılı! ' );
        }
        else{        
            return redirect()->back()->withError('İşlem Başarısız!');
        }
    }
}
