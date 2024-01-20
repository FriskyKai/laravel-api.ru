<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductCreateRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index() {
        $products = Product::all();
        return response()->json($products)->setStatusCode(200, 'Успешно');
    }

    public function create(ProductCreateRequest $request) {
        $product = new Product($request->all());
        $product->save();

        return response()->json($product)->setStatusCode(200, 'Успешно');
    }

    public function show($id) {
        $product = Product::find($id);

        if ($product) {
            return response()->json($product)->setStatusCode(200, 'Успешно');
        } else {
            return response()->json('Продукт не найден')->setStatusCode(404, 'Не найдено');
        }
    }

    public function update(ProductUpdateRequest $request, $id) {
        $product = Product::find($id);

        if ($product) {
            $product->update($request->all());
            return response()->json($product)->setStatusCode(200, 'Успешно');
        } else {
            return response()->json('Продукт не найден')->setStatusCode(404, 'Не найдено');
        }
    }

    public function destroy($id) {
        $product = Product::find($id);

        if ($product) {
            Product::destroy($id);
            return response()->json('Продукт удален')->setStatusCode(200, 'Успешно');
        } else {
            return response()->json('Продукт не найден')->setStatusCode(404, 'Не найдено');
        }
    }
}
