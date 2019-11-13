<?php

namespace App\Http\Controllers;

use App\Jobs\ProductsExportJob;
use Illuminate\Foundation\Bus\DispatchesJobs;

class ExportController extends Controller
{
    use DispatchesJobs;

    /**
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     *
     * http://laravelug.lvh.me/export
     */
    public function index()
    {
        $this->dispatch(new ProductsExportJob());

        return response('done');
    }
}
