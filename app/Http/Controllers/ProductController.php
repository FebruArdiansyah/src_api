<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = DB::connection('mysql')->table('products')->get();
        return response()->json($product, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|string'
        ]);

        $product = [
            'name' => $request->name,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];

        $id = DB::connection('mysql')->table('products')->insertGetId($product);
        $data = DB::connection('mysql')->table('products')->where('id', $id)->first();
        $response = [
                'success' => True,
                'message' => 'Product Created With Name : ' . $data->name,
                'product' => $data 
          ];

          return response()->json($response, 201);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = DB::connection('mysql')->table('products')->where('id', $id)->first();
        $responsetrue = [
            'success' => True,
            'message' => 'Product Found',
            'product' => $product
      ];

      $responsefalse = [
        'success' => False,
        'message' => 'Product Not Found'
    ];

        if(is_null($product)){
            return response()->json($responsefalse, 404);
        }else {
            return response()->json($responsetrue, 201);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name' => 'required|string'
        ]);
        $product = DB::connection('mysql')->table('products')->where('id', $id)->first();
      $responsefalse = [
        'success' => False,
        'message' => 'Product Not Found'
    ];

        $updateData = [
            'name'=>$request->input(['name']),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ];

        if(is_null($product)){
            return response()->json($responsefalse, 404);
        }else {
            DB::connection('mysql')->table('products')->where('id', $id)->update($updateData);
            $dataUpdate = DB::connection('mysql')->table('products')->where('id', $id)->first();
            $responsetrue = [
                'success' => True,
                'message' => 'Product Updated',
                'data' => $dataUpdate
          ];
            return response()->json($responsetrue, 201);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = DB::connection('mysql')->table('products')->where('id', $id)->first();
        $responsetrue = [
            'success' => True,
            'message' => 'Product Deleted',
      ];

      $responsefalse = [
        'success' => False,
        'message' => 'Product Not Found'
    ];

        if(is_null($product)){
            return response()->json($responsefalse, 404);
        }else {
            DB::connection('mysql')->table('products')->where('id', $id)->delete();
            return response()->json($responsetrue, 201);
        }
    }
}
