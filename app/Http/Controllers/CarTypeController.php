<?php

namespace App\Http\Controllers;

use App\Models\CarType;
use Illuminate\Http\Request;
use App\Http\Resources\CarTypeResource;
use App\Http\Requests\CreateCarTypeRequest;
use App\Http\Requests\UpdateCarTypeRequest;
use App\Http\Resources\CarTypeResourceCollection;

class CarTypeController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth:sanctum');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new CarTypeResourceCollection(CarType::orderBy('name')->get());
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
    public function store(CreateCarTypeRequest $request)
    {
        return response()->json([
            'success'       =>  CarType::create($request->all())
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CarType  $carType
     * @return \Illuminate\Http\Response
     */
    public function show(CarType $carType)
    {
        return new CarTypeResource($carType);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CarType  $carType
     * @return \Illuminate\Http\Response
     */
    public function edit(CarType $carType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CarType  $carType
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCarTypeRequest $request, CarType $carType)
    {
        $carType->fill($request->all());

        $carType->save();

        return new CarTypeResource($carType);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CarType  $carType
     * @return \Illuminate\Http\Response
     */
    public function destroy(CarType $carType)
    {
        return response()->json([
            'success'   =>  $carType->delete()
        ]);
    }
}
