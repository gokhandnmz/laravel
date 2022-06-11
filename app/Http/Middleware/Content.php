<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class Content
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // $lang = app()->getlocale();
        $baseDirectory = dirname(__FILE__, 4);
        $jsonLangPath = $baseDirectory.'/lang/tr.json';
        $json = file_get_contents($jsonLangPath);
        $arr = [
            "key" => "content",
            "value" => $json,
            "lang" => "tr"
        ];

        $checkContent = DB::table("content")
        ->where("lang", "tr")
        ->first();

        if( !$checkContent ){
            DB::table("content")
            ->insert($arr);
        }
        
        return $next($request);
    }
}
