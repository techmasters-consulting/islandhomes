<?php

namespace App\Http\Controllers;


use App\Property;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return array
     */
    public function index()
    {
        $properties =  Property::all();

        return $properties->toArray();
    }

    public function vendor(){

        $properties =  auth()->user()->properties;

        return $properties->toArray();


    }
    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     * @throws \Exception
     */
    public function store(Request $request)
    {

        $request->merge(['author_id', auth()->id()]);

        DB::beginTransaction();

        try {
            Property::create($request->all());

            DB::commit();

            return response()->json([
                'error' => false,
                'success' => true,
                'message' => 'Created Successfully'
            ], 201);
        } catch (\Exception $exception) {
            report($exception);
            DB::rollBack();

            return response()->json([
                'error' => true,
                'success' => false,
                'message' => $exception->getMessage()
            ], 400);
        }
    }



    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Property $property
     * @return Response
     * @throws \Exception
     */
    public function update(Request $request, Property $property)
    {

        DB::beginTransaction();

        try {
            $property->update($request->all());

            DB::commit();

            return response()->json([
                'error' => false,
                'success' => true,
                'message' => 'Updated Successfully'
            ], 200);
        } catch (\Exception $exception) {
            report($exception);
            DB::rollBack();

            return response()->json([
                'error' => true,
                'success' => false,
                'message' => $exception->getMessage()
            ], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Property $property
     * @return Response
     * @throws \Exception
     */
    public function destroy(Property $property)
    {
        try {
            $property->delete();

            return response()->json([
                'error' => false,
                'success' => true,
                'message' => 'Deleted Successfully'
            ], 200);
        } catch (\Exception $exception) {
            report($exception);
            return response()->json([
                'error' => true,
                'success' => false,
                'message' => $exception->getMessage()
            ], 400);
        }
    }
}
