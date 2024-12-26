<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use function Illuminate\Events\queueable;

class ProductController extends Controller
{

    public function index()
    {
        return 'show all products';
    }
    public function create()
    {
        return 'Show form for create product';
    }

    public function store()
    {
        return 'Store product';
    }
    public function show($product)
    {
    return 'Show product: '.$product;
    }

    public function edit($product)
    {
        return 'Show form for edit product: '.$product;
    }
    public function update($product)
    {
        return 'Update product: '.$product;
    }
    public function destroy($product)
    {
        return 'Delete product: '.$product;
    }
}
