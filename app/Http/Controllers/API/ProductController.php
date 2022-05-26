<?php

namespace App\Http\Controllers\API;

use Exception;

use App\Models\Product;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

/**
 * To handle product data
 *
 * @author  hnineiwailwin
 * @create  25/05/2022
 */
class ProductController extends Controller
{

    /**
     * To create product data
     *
     * @author  hnineiwailwin
     * @create  25/05/2022
     * @param Request $request
     * @return Response $object
     *
     */
    public function store(Request $request)
    {
        $insert = [
            'name' => $request->name,
            'code' => $request->code,
            'description' => $request->description,
            'created_emp' => $request->login_id,
            'updated_emp' => $request->login_id,
            'created_at' => now(),
            'updated_at' => now()
        ];
        // dd($insert);

        DB::beginTransaction();
        try {
            //DB::raw("name= '$request->name' AND code ='$request->code'")
            $o = Product::where("name", $request->name)->orWhere("code", $request->code)->exists();

            #check if the data already exists
            if (!$o) {
                #save into product table
                Product::insert($insert);
                DB::commit();
                return response()->json(['status' => 'OK', 'message' => 'Created Successfully'], 200);
            } else {
                return response()->json(['status' => 'NG', 'message' => 'Creating Product had alredy existed.'], 200);
            }
        } catch (Exception $e) {
            DB::rollback();
            Log::debug($e->getMessage());
            return response()->json(['status' => 'NG', 'message' => 'Fail to save'], 200);
        }
    }

    /**
     * To fetch product data
     * @author  hnineiwailwin
     * @create  25/05/2022
     * @return Response $object
     */
    public function index()
    {
        #get all data from product table
        $products = Product::whereNull('deleted_at')->get()->toArray();
        // Log::info($products);
        // dd($products);

        #check product data is exists or not
        if (!empty($products)) {
            return response()->json(['status' => 'OK', 'data' => $products], 200);
        } else {
            return response()->json(['status' => 'NG', 'message' => 'Data is not found!'], 200);
        }
    }

    /**
     * To show product data
     * @author  hnineiwailwin
     * @create  26/05/2022
     * @param Request request and productId
     * @return Response $object
     */
    public function show($id)
    {
        $o   = Product::where("id", $id)->exists();
        if ($o) {
            return response()->json(['status' => 'OK', 'data' => Product::where("id", $id)->first()], 200);
        } else {
            return response()->json(['status' => 'NG', 'message' => 'Data is not found!'], 200);
        }
    }


    /**
     * To update product data
     * @author  hnineiwailwin
     * @create  26/05/2022
     * @param Request request and productId
     * @return Response $object
     */
    public function update(Request $request, $id)
    {
        $update = [
            "name" => $request->name,
            'code' => $request->code,
            'description' => $request->description,
            'updated_emp' => $request->login_id,
            'updated_at' => now()
        ];
        DB::beginTransaction();
        try {
            #check the data already existed
            $flag = Product::where("id", $id)->exists();
            if ($flag) {
                Product::where('id', $id)->update($update);
                DB::commit();
                return response()->json(['status' => "OK", 'message' => "Update successful!"], 200);
            } else {
                return response()->json(['status' => "NG", 'message' => "Updating data id: $id doesn't exist!"], 200);
            }
        } catch (Exception $e) {
            DB::rollBack();
            Log::debug($e->getMessage());
            return response()->json(['status' => "NG", 'message' => "Update Fail!"], 200);
        }
    }

    /**
     * To destory product data
     * @author  hnineiwailwin
     * @create  26/05/2022
     * @param Request request and productId
     * @return Response $object
     */
    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            #check the data exists
            $flag = Product::where("id", $id)->exists();
            if ($flag) {
                Product::where('id', $id)->delete();
                DB::commit();
                return response()->json(['status' => "OK", "message" => "deleted successfully!"], 200);
            } else {
                return response()->json(['status' => "NG", "message" => "There is no product with id: $id"], 200);
            }
        } catch (Exception $e) {
            DB::rollBack();
            Log::debug($e->getMessage());
            return response()->json(['status' => "NG", "message" => "Could not able to delete $id product!"], 200);
        }
    }
}
