<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

/**
 * To handle category data
 *
 * @author  hnineiwailwin
 * @create  25/05/2022
 */
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *  @author  hnineiwailwin
     * @create  26/05/2022
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::whereNull("deleted_at")->get();

        #check if showing categories had already existed

        if ($categories->isNotEmpty())
            return response()->json(['status' => "OK", "data" => $categories], 200);
        else  return response()->json(['status' => "NG", "message" => "no category data is found!"], 200);
    }

    /**
     * Store a newly created resource in storage.
     * @author  hnineiwailwin
     * @create  26/05/2022
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $insert = [
            "category_name" => $request->name,
            "created_emp" => $request->login_id,
            "updated_emp" => $request->login_id,
            "created_at" => now(),
            "updated_at" => now()
        ];
        DB::beginTransaction();
        try {

            $c = Category::where("category_name", $request->name)->exists();  //DB::raw("LOWER `category_name`")

            #check if new inserting category already existed

            if ($c) {
                return response()->json(['status' => "NG", "message" => "category already existed!"], 200);
            } else {
                Category::insert($insert);
                DB::commit();
                return response()->json(['status' => "OK", "message" => "created category success!"], 200);
            }
        } catch (Exception $e) {
            DB::rollBack();
            Log::debug($e->getMessage());
            return response()->json(['status' => "NG", "message" => "created category fail!"], 200);
        }
    }

    /**
     * Display the specified resource.
     * @author  hnineiwailwin
     * @create  26/05/2022
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::where("id", $id)->first(); //->andWhere("age",'>',18)

        #check if showing category already existed

        if (!empty($category))
            return response()->json(['status' => "OK", "data" => $category], 200);
        else  return response()->json(['status' => "NG", "message" => "no category data is found!"], 200);
    }

    /**
     * Update the specified resource in storage.
     * @author  hnineiwailwin
     * @create  26/05/2022
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $update = [
            "category_name" => $request->name,
            "updated_emp" => $request->login_id,
            "updated_at" => now()
        ];
        DB::beginTransaction();
        try {
            $obj = Category::where("id", $id)->first();

            #check if updating category already existed

            if (isset($obj)) {
                Category::where("id", $id)->update($update);
                DB::commit();
                return response()->json(['status' => "OK", "message" => "update success!"], 200);
            } else {
                return response()->json(['status' => "NG", "message" => "updating category doesn't exist!"], 200);
            }
        } catch (Exception $th) {
            DB::rollBack();
            Log::debug($th->getMessage());
            return response()->json(['status' => "NG", "message" => "category update fail!"], 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     * @author  hnineiwailwin
     * @create  26/05/2022
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $c = Category::where("id", $id)->first();

            #check if new inserting category already existed

            if (!empty($c)) {
                //forceDelete();
                Category::where("id", $id)->delete();
                DB::commit();
                return response()->json(['status' => "OK", "message" => "deleted successfully!"], 200);
            } else {
                return response()->json(['status' => "NG", "message" => "deleting productid $id doesn't exist!"], 200);
            }
        } catch (Exception $th) {
            DB::rollBack();
            Log::debug($th->getMessage());
            return response()->json(['status' => "NG", "message" => "Could not able to delete $id product!"], 200);
        }
    }
}
