<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Hizmet;

class HizmetController extends Controller
{
    public function __construct(){
        $this->hizmet = new Hizmet;
        $this->url = 'admin/hizmet';
    }
    public function index(){
        $list = $this->hizmet->list();
        $url = $this->url;
        return view('admin.theme.hizmet.list', compact( 'url', 'list' ));
    }
    public function store(Request $request, $id = 0){
        if( $id > 0 ) // id sıfırdan büyükse güncelleme işlemi yap
            $response = $this->hizmet->store( $request, $id );
        else // id sıfırdan büyük değilse yeni kayıt oluştur
            $response = $this->hizmet->store($request);
            
        if( $response ){
            return redirect()->back()->with( 'success', ' İşlem Başarılı! ' );
        }
        else{        
            return redirect()->back()->withError('İşlem Başarısız!');
        }
    }
    public function add( ){
        $url = $this->url;
        return view( 'admin.theme.hizmet.add', compact( 'url' ) );
    }
    public function update( $id ){
        $item = Hizmet::find( $id );
        $images = $this->hizmet->images( $id );
        $url = $this->url;
        return view( 'admin.theme.hizmet.update', compact( 'item', 'url', 'images' ) );
    }
    public function destroy( $id ){
        $response = $this->hizmet->del( $id );
        if( $response ){
            return redirect()->back()->with( 'success', ' İşlem Başarılı! ' );
        }
        else{        
            return redirect()->back()->withError('İşlem Başarısız!');
        }
    }
}
