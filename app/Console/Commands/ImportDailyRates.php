<?php

namespace App\Console\Commands;

use App\Currency;
use App\Rate;
use Illuminate\Console\Command;
use SimpleXMLElement;
use Exception;

class ImportDailyRates extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'rates:daily';
    static $BNR_URL = 'http://www.bnr.ro/nbrfxrates.xml';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import daily rates';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

        $xmlDocument = null;

        if(($xmlDocument = @file_get_contents(self::$BNR_URL)) === false){
            throw new Exception('Load file error');
        }
        try{
            $xml = @new SimpleXMLElement($xmlDocument);
        }catch (Exception $e){
            throw new Exception("Wrong BNR response");
        }

        $currencies = Currency::get()->pluck('name', 'id')->toArray();
        $currency_reversed = array_flip($currencies);

        $d = (new \Carbon\Carbon($xml->Body->Cube->attributes()['date']))->format('Y-m-d');

        if (date('Y-m-d') == $d) {

            foreach($xml->Body->Cube->children() as $rate) {

                $val = (float)$rate->__toString();
                $multiplier = $rate->attributes()['multiplier'] ? (int)$rate->attributes()['multiplier'] : 0 ;
                $currency = $rate->attributes()['currency']->__toString();

                if (array_key_exists($currency, $currency_reversed)) {

                    Rate::create([
                        'currency_id' => $currency_reversed[$currency],
                        'rate' => $val,
                        'created_at' => $d,
                        'multiplier' => $multiplier
                    ]);

                }

            }
        }

    }
}
