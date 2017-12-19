<?php

namespace App\Http\Controllers;

use App\Currency;
use App\Rate;
use Carbon\Carbon;
use Faker\Provider\ka_GE\DateTime;
use Laravel\Lumen\Routing\Controller as BaseController;

class RateController extends BaseController
{
    /**
     * Get currency rate
     *
     * @TODO - add indexes to rates (created_at)
     *
     * @param $currency Currency
     * @param null $date Current date
     * @return \Illuminate\Http\JsonResponse
     */
    public function rate($currency, $date = null)
    {
        $currency = Currency::where('name', strtoupper($currency))->first();
        if (!$currency) return response()->json(['Unkown currency'], 403);

        $rate = Rate::where(['currency_id' => $currency->id])
                    ->orderBy('created_at', 'DESC')->first();
        if ($date) {
            $formatted_date = null;
            try {
                $formatted_date = new Carbon($date);
            } catch (\Exception $e) {
                return response()->json([$e->getMessage()], 403);
            }

            $rate = Rate::where(['currency_id' => $currency->id])
                        ->whereDate('created_at', '=', $formatted_date->format('Y-m-d'))
                        ->orderBy('created_at', 'DESC')->first();

            if (!$rate) {
                $rate = $this->get_latest_rate($date, $currency);
            }

        }
        if (!$rate) return response()->json(['No rate'], 403);


        return response()->json(['rate' => $rate->rate, 'date' => $rate->created_at], 200);

    }

    /**
     * Get latest valid date before current date
     *
     * @param $date Current date
     * @param $currency Currency
     * @return mixed
     */
    private function get_latest_rate($date, $currency)
    {

        $start = (new \Carbon\Carbon($date))->subDays(10)->format('Y-m-d');

        $first = Rate::where([
            'currency_id' => $currency->id
        ])->whereBetween('created_at', [$start, $date])
            ->orderBy('created_at', 'DESC')
            ->get()
            ->first();

        return $first;

    }


}
