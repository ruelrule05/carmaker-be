<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use App\Http\Resources\CarResource;
use App\Http\Requests\CreateCarRequest;
use App\Http\Requests\UpdateCarRequest;
use App\Http\Resources\CarResourceCollection;

class CarController extends Controller
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
    public function index(Request $request)
    {
        $cars = Car::query();

        if ($request->has('manufacturer'))
        {
            $cars->where('manufacturer_id', $request->manufacturer);
        }

        if ($request->has('type'))
        {
            $cars->where('car_type_id', $request->type);
        }

        if ($request->has('color'))
        {
            $cars->where('color_id', $request->color);
        }

        if ($request->has('s'))
        {
            $cars->where('name', 'like', '%' . $request->s . '%');
        }

        return new CarResourceCollection($cars->get());
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
    public function store(CreateCarRequest $request)
    {
        $car = new Car();

        $car->fill($request->all());

        $saved = $car->save();

        if ($saved)
        {
            return response()->json([
                'success'   =>  $saved,
                'car'       =>  new CarResource($car)
            ]);
        } else {
            return response()->json([
                'success'   =>  false
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function show(Car $car)
    {
        return new CarResource($car);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function edit(Car $car)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCarRequest $request, Car $car)
    {
        $car->fill($request->all());

        $car->save();

        return new CarResource($car);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function destroy(Car $car)
    {
        return response()->json([
            'success'   =>  $car->delete()
        ]);
    }
}
