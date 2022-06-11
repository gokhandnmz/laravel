<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Referans;

class ReferansController extends Controller
{
    public function __construct(){
        $this->referans = new Referans;
        $this->url = 'admin/referans';
    }
    public function index(){
        $images = $this->referans->list();
        $url = $this->url;
        return view('admin.theme.referans.list', compact( 'url', 'images' ));
    }
    public function store(Request $request){
        $response = $this->referans->store($request);
        if( $response ){
            return redirect()->back()->with( 'success', ' İşlem Başarılı! ' );
        }
        else{        
            return redirect()->back()->withError('İşlem Başarısız!');
        }
    }
    public function add( ){
        $url = $this->url;
        return view( 'admin.theme.referans.add', compact( 'url' ) );
    }
    public function update( $id ){
        $item = Referans::find( $id );
        $url = $this->url;
        return view( 'admin.theme.referans.update', compact( 'item', 'url' ) );
    }
    public function destroy( $id ){
        $response = $this->referans->del( $id );
        if( $response ){
            return redirect()->back()->with( 'success', ' İşlem Başarılı! ' );
        }
        else{        
            return redirect()->back()->withError('İşlem Başarısız!');
        }
    }
}
