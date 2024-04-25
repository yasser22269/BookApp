<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\SliderImages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public $data = [];
    public function __construct()
    {
        //  $this->middleware('auth');

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $SliderImages = SliderImages::translatedIn(app()->getLocale())->limit(5)->get();

        //Start BestSeles;
        $BestSeles = Product::Join('order_products', 'product_id', '=', 'products.id')->select('products.id', 'products.slug', 'products.viewed', 'products.price', DB::raw('count("order_products.id") as sales_count'))
            ->groupBy('products.id')->orderBy('sales_count', 'desc')->limit(9)->get();
        //End BestSeles;

        //start FEATURED ITEMS;
        $FeaturedItems = Category::where('parent_id', Null)->select('id', 'slug')->with(['product' => function ($q) {
            $q->inRandomOrder()->take(6);
        }])->limit(10)->get();
        //End FEATURED ITEMS;

        // return $FeaturedItems;

        return view('home', compact('SliderImages', 'BestSeles', 'FeaturedItems'));
    }
}
