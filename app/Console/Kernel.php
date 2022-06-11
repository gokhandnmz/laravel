<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\DB;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
        // $schedule->call(function(){
        //     DB::table('bakim')->insert([
        //         'musteri_id' => 1,
        //         'yapilan_is' => "Tamirat",
        //         'fiyat' => 500
        //         ]);
        // })->everyMinute();

        $schedule->call( function(){
            $musteriler = DB::table('musteri')
            ->get();
            if( $musteriler ){
                foreach( $musteriler as $musteri ){
                    $data = [
                        'musteri_id' => $musteri->id,
                        'fiyat' => $musteri->bakim_tutari,
                        'yapilan_is' => 'Bakım Tutarı',
                        'tarih' => date('d-m-Y'),
                        'created_at' => date('Y-m-d H:i:s')
                    ];

                    $save = DB::table('bakim')->insert($data);
                    if( $save ){
                        info('saved!');
                    } else{
                        info('notSaved!');
                    }
                }
            }
        })->monthly();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
