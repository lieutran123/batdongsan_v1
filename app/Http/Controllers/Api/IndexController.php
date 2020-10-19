<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Type_product;
use App\Category;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::select('id','name_categorys','slug')->get();
        $type_product = Type_product::select('id','name_type','slug')->get();
        return response()->json([
            'danhmuc'=>$category,
            'loaisanpham'=>$type_product,  
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        
    }

    public function getdanhmuc($id){
        $product = Product::select('products.id','products.name_product','products.summary','products.price','products.image','products.dientich','products.like','products.id_tp','products.id_h','type_products.name_type')
                    ->join('type_products','type_products.id','=','products.id_type')
                    ->where('type_products.id',$id)->get();

         return response()->json([
            'sanphamtheodanhmuc'=>$product,
        ],200);
    }
    

    
}
