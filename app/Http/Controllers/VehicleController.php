<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;
use App\Models\Maker;
use App\Models\Model;
use App\Models\Fuel;
use App\Models\Body;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $makers = Maker::all();
        $models = Model::all();
        $fuels = Fuel::all();
        $bodies = Body::all();
        $vehicles = Vehicle::all();
        return view('vehicles.index', compact('vehicles','makers','models','fuels','bodies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $makers = Maker::all();
        $models = Model::all();
        $fuels = Fuel::all();
        $bodies = Body::all();
        return view('vehicles.create',compact('makers','models','fuels','bodies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $vehicle  = new Vehicle();
        $vehicle->VIN = $request->input('VIN');
        $vehicle->license_plate = $request->input('license_plate');
        $vehicle->maker_id = $request->input('maker_id');
        $vehicle->model_id = $request->input('model_id');
        $vehicle->body_id = $request->input('body_id');
        $vehicle->fuel_id = $request->input('fuel_id');
        $vehicle->save();

        return redirect()->route('vehicles.index')->with('success', "{$vehicle->license_plate} sikeresen létrehozva");
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $makers = Maker::all();
        $models = Model::all();
        $fuels = Fuel::all();
        $bodies = Body::all();
        $vehicle = Vehicle::find($id);
        return view('vehicles.edit', compact('vehicle','makers','models','fuels','bodies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $vehicle  = Vehicle::find($id);
        $vehicle->VIN = $request->input('VIN');
        $vehicle->license_plate = $request->input('license_plate');
        $vehicle->maker_id = $request->input('maker_id');
        $vehicle->model_id = $request->input('model_id');
        $vehicle->body_id = $request->input('body_id');
        $vehicle->fuel_id = $request->input('fuel_id');
        $vehicle->save();

        return redirect()->route('vehicles.index')->with('success', "{$vehicle->license_plate} sikeresen módosítva");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vehicle  = Vehicle::find($id);
        $vehicle->delete();

        return redirect()->route('vehicles.index')->with('success', "{$vehicle->name} sikeresen törölve");
    }
}
