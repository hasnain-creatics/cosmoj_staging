<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;
class CurrencyConvert extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'currency:convert';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        \Log::info("Cron is working fine!");
        // Log::info("Cron is working fine!");
        // return 'currency is converting please wait......';
        return DB::table('cities')->insert([

            'title'=>'abcd',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
            
        ]);

    }
}
