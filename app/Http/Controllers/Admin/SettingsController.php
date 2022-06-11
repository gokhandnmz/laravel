<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Settings;

class SettingsController extends Controller
{
    public function __construct(){
        $this->settings = new Settings;
        $this->url = 'admin/ayarlar';
    }
    public function index( ){
        $url = $this->url;
        $item = $this->settings->first();
        return view( 'admin.theme.settings.islem', compact( 'url', 'item' ) );
    }
    public function store(Request $request){
        $response = $this->settings->store( $request );
        if( $response ){
            return redirect()->back()->with( 'success', ' İşlem Başarılı! ' );
        }
        else{        
            return redirect()->back()->withError('İşlem Başarısız!');
        }
    }
}
