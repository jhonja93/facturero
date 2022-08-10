<?php

namespace App\Http\Controllers;

use App\Models\Factura;
use Illuminate\Http\Request;
use Inertia\Inertia;

class FacturaController extends Controller
{
    public function index()
    {
        $facturas = Factura::all();

        return Inertia::render('Dashboard', [
            'facturas' => $facturas,
            'iva' => config('app.iva'),
        ]);
    }

    public function create()
    {
        return Inertia::render('Factura/Create', [
            'iva' => config('app.iva')
        ]);
    }

    public function store(Request $request)
    {
        dd($request->all());
    }
}
