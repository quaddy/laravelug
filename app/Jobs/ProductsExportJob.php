<?php

namespace App\Jobs;

use App\Products;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Collection;
use LaravelFlatfiles\FlatfileExport;
use LaravelFlatfiles\FlatfileFields;

class ProductsExportJob implements ShouldQueue, FlatfileFields
{
    public function handle(FlatfileExport $export)
    {
        $export->to('products.csv', 'local');
        $export->addHeader();

        $export->beforeEachRow(function (Products $product) {
            $product->testAttribute = '-Test-';
        });

        Products::with('manufacturer')->chunk(100, function (Collection $chunk) use ($export) {
            $export->addRows($chunk);
        });

        $export->moveToTarget();
    }

    public function fields(): array
    {
        return [
            'id' => 'id',
            'product_name' => 'Name',
            [
                'label' => 'Preis',
                'callback' => function ($null, Products $product) {
                    return round($product->product_price);
                },
            ],
            'manufacturer.manufacturer_name' => 'Hersteller',
            'testAttribute' => 'Test Attribut',
        ];
    }
}
