<?php

namespace App\Console\Commands;

use App\Currency;
use App\Rate;
use Illuminate\Console\Command;
use SimpleXMLElement;
use Exception;

class ImportHistoryRates extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'rates:history {file}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import early currency dates';

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

        if(($xmlDocument = @file_get_contents($this->argument('file'))) === false){
            throw new Exception('Load file error');
        }
        try{
            $xml = @new SimpleXMLElement($xmlDocument);
        }catch (Exception $e){
            throw new Exception("Wrong BNR response");
        }

        $currencies = Currency::get()->pluck('name', 'id')->toArray();

        foreach($xml->Table->Row as $line) {
            $d = (new \Carbon\Carbon($line->Data))->format('Y-m-d');
            foreach ($currencies as $curr_id => $curr_name) {
                $curr_key = 'CURSZ_' . $curr_name;
                $curr_rate = (float)str_replace(',', '.', $line->{$curr_key}->__toString());

                Rate::create([
                    'currency_id' => $curr_id,
                    'rate' => $curr_rate,
                    'created_at' => $d
                ]);
            }
        }

    }
}
