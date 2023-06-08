<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;

class FetchCoinsCommand extends Command
{
    protected $signature = 'coins:fetch';
    protected $description = 'Fetches data from the Coingecko API and stores it in the database';

  
    public function handle()
    {
        $url = 'https://api.coingecko.com/api/v3/coins/list?include_platform=true';
        $response = Http::get($url);
        //   dd($response);

        if ($response->ok()) {
            $coins = $response->json();
             dd($coins);

            foreach ($coins as $coin) {
                // dd($coin);
                $this->storeCoin($coin); //new method 
            }

            $this->info('Coins fetched successfully!');
        } else {
            $this->error('Failed to fetch coins. API request failed.');
        }
    }
    private function storeCoin(array $coin)
    {
        // dd($coin);
        DB::table('coins')->updateOrInsert(
            ['id' => $coin['id']],
            [
                'symbol' => $coin['symbol'],
                'name' => $coin['name'],
                'ethereum_platform' => $coin['platforms']['ethereum'] ?? null,
                'polygon_platform' => $coin['platforms']['polygon-pos'] ?? null,
            ]
        );
    }
}
