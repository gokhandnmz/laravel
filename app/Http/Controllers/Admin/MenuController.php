<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;

class MenuController extends Controller
{
    public function __construct(){
        $this->menu = new Menu;
        $this->url = 'admin/menu';
    }
    public function index(){
        $list = $this->menu->parent();
        $url = $this->url;
        return view('admin.theme.menu.list', compact( 'url', 'list' ));
    }
    public function store(Request $request, $id = 0){
        if( $id > 0 ) // id sıfırdan büyükse güncelleme işlemi yap
            $response = $this->menu->store( $request, $id );
        else // id sıfırdan büyük değilse yeni kayıt oluştur
            $response = $this->menu->store($request);
            
        if( $response ){
            return redirect()->back()->with( 'success', ' İşlem Başarılı! ' );
        }
        else{        
            return redirect()->back()->withError('İşlem Başarısız!');
        }
    }
    public function add( ){
        $url = $this->url;
        $list = $this->menu->parent();
        $moduller = $this->menu->modules();
        return view( 'admin.theme.menu.add', compact( 'url', 'list', 'moduller' ) );
    }
    public function update( $id ){
        $item = Menu::find( $id );
        $url = $this->url;
        $list = $this->menu->parent();
        $moduller = $this->menu->modules();
        return view( 'admin.theme.menu.update', compact( 'item', 'url', 'list', 'moduller' ) );
    }
    public function destroy( $id ){
        $response = $this->menu->del( $id );
        if( $response ){
            return redirect()->back()->with( 'success', ' İşlem Başarılı! ' );
        }
        else{        
            return redirect()->back()->withError('İşlem Başarısız!');
        }
    }
}
