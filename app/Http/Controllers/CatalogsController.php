<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Product;
use App\Category;

class CatalogsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $q = $request->get('q');
        if ($request->has('cat')) {
            $selected_category = Category::find($request->get('cat'));

            // can't use this to get selected category > child's > product
            // $products = $selected_category->products()->where('name', 'LIKE', '%'.$q.'%')->paginate(4);

            // we use this to get product from current category and its child
            $products = Product::whereIn('id', $selected_category->related_products_id)
                ->where('name', 'LIKE', '%'.$q.'%')->paginate(4);
        } else {
            $products = Product::where('name', 'LIKE', '%'.$q.'%')->paginate(4);
        }

        return view('catalogs.index', compact('products', 'q', 'cat', 'selected_category'));
    }
}
