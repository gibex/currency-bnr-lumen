<?php

use Illuminate\Database\Seeder;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Currency::create([
            'name' => 'AED',
            'description' => 'dirhamul Emiratelor Arabe Unite',
        ]);

        \App\Currency::create([
            'name' => 'AUD',
            'description' => 'dolar australian',
        ]);

        \App\Currency::create([
            'name' => 'BGN',
            'description' => 'levă bulgarească',
        ]);

        \App\Currency::create([
            'name' => 'BRL',
            'description' => 'real brazilian',
        ]);

        \App\Currency::create([
            'name' => 'CAD',
            'description' => 'dolar canadian',
        ]);

        \App\Currency::create([
            'name' => 'CHF',
            'description' => 'franc elveţian',
        ]);

        \App\Currency::create([
            'name' => 'CNY',
            'description' => 'renminbi chinezesc',
        ]);

        \App\Currency::create([
            'name' => 'CZK',
            'description' => 'coroană cehească',
        ]);

        \App\Currency::create([
            'name' => 'DKK',
            'description' => 'coroană daneză',
        ]);

        \App\Currency::create([
            'name' => 'EGP',
            'description' => 'liră egipteană',
        ]);

        \App\Currency::create([
            'name' => 'EUR',
            'description' => 'euro',
        ]);

        \App\Currency::create([
            'name' => 'GBP',
            'description' => 'liră sterlină',
        ]);

        \App\Currency::create([
            'name' => 'HRK',
            'description' => 'kuna croată',
        ]);

        \App\Currency::create([
            'name' => 'HUF',
            'description' => 'forint unguresc',
        ]);

        \App\Currency::create([
            'name' => 'INR',
            'description' => 'rupia indiană',
        ]);

        \App\Currency::create([
            'name' => 'JPY',
            'description' => 'yen japonez',
        ]);

        \App\Currency::create([
            'name' => 'KRW',
            'description' => 'won sud-coreean',
        ]);

        \App\Currency::create([
            'name' => 'MDL',
            'description' => 'leu moldovenesc',
        ]);

        \App\Currency::create([
            'name' => 'MXN',
            'description' => 'peso mexican',
        ]);

        \App\Currency::create([
            'name' => 'NOK',
            'description' => 'coroană norvegiană',
        ]);

        \App\Currency::create([
            'name' => 'NZD',
            'description' => 'dolar neo-zeelandez',
        ]);

        \App\Currency::create([
            'name' => 'PLN',
            'description' => 'zlot polonez',
        ]);

        \App\Currency::create([
            'name' => 'RSD',
            'description' => 'dinar sârbesc',
        ]);

        \App\Currency::create([
            'name' => 'RUB',
            'description' => 'rublă rusească',
        ]);

        \App\Currency::create([
            'name' => 'SEK',
            'description' => 'coroană suedeză',
        ]);

        \App\Currency::create([
            'name' => 'THB',
            'description' => 'bahtul thailandez',
        ]);

        \App\Currency::create([
            'name' => 'TRY',
            'description' => 'liră turcească',
        ]);

        \App\Currency::create([
            'name' => 'UAH',
            'description' => 'hryvna ucraineană',
        ]);

        \App\Currency::create([
            'name' => 'USD',
            'description' => 'dolar SUA',
        ]);

        \App\Currency::create([
            'name' => 'XAU',
            'description' => 'gram de aur',
        ]);

        \App\Currency::create([
            'name' => 'XDR',
            'description' => 'DST',
        ]);

        \App\Currency::create([
            'name' => 'ZAR',
            'description' => 'rand sud-african',
        ]);


    }
}
