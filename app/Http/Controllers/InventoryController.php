<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventory;
use Cviebrock\EloquentSluggable\Services\SlugService;

class InventoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
        return view('inventory.index')
            ->with('inventories', Inventory::orderBy('updated_at', 'ASC')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('inventory.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'line_no' => 'required',
        ]);

        // $newImageName = uniqid() . '-' . $request->title . '.' . $request->image->extension();

        // $request->image->move(public_path('images'), $newImageName);

        Inventory::create([
            'line_no' => $request->input('line_no'),
            'description' => $request->input('description'),
            'line_no' => $request->input('line_no'),
            'location' => $request->input('location'),
            'device_a_rack_type' => $request->input('device_a_rack_type'),
            'device_a_rack' => $request->input('device_a_rack'),
            'device_a_ru' => $request->input('device_a_ru'),
            'device_a_model' => $request->input('device_a_model'),
            'device_a_description' => $request->input('device_a_description'),
            'device_a_host_name' => $request->input('device_a_host_name'),
            'device_a_port' => $request->input('device_a_port'),
            'detailed_cable_info' => $request->input('detailed_cable_info'),
            'device_b_port' => $request->input('device_b_port'),
            'device_b_host_name' => $request->input('device_b_host_name'),
            'device_b_description' => $request->input('device_b_description'),
            'device_b_model' => $request->input('device_b_model'),
            'device_b_ru' => $request->input('device_b_ru'),
            'device_b_rack' => $request->input('device_b_rack'),
            'device_b_rack_type' => $request->input('device_b_rack_type'),
            'note' => $request->input('note'),
            'slug' => SlugService::createSlug(Inventory::class, 'slug', $request->line_no),
            'user_id' => auth()->user()->id
        ]);

        return redirect('/inventory')
            ->with('message', 'Your inventory has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        return view('inventory.show')
            ->with('inventory', Inventory::where('slug', $slug)->first());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        return view('inventory.edit')
            ->with('inventory', Inventory::where('slug', $slug)->first());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $request->validate([
            'line_no' => 'required',
        ]);

        Inventory::where('slug', $slug)
            ->update([
                'title' => $request->input('line_no'),
                'description' => $request->input('description'),
                'line_no' => $request->input('line_no'),
                'location' => $request->input('location'),
                'device_a_rack_type' => $request->input('device_a_rack_type'),
                'device_a_rack' => $request->input('device_a_rack'),
                'device_a_ru' => $request->input('device_a_ru'),
                'device_a_model' => $request->input('device_a_model'),
                'device_a_description' => $request->input('device_a_description'),
                'device_a_host_name' => $request->input('device_a_host_name'),
                'device_a_port' => $request->input('device_a_port'),
                'detailed_cable_info' => $request->input('detailed_cable_info'),
                'device_b_port' => $request->input('device_b_port'),
                'device_b_host_name' => $request->input('device_b_host_name'),
                'device_b_description' => $request->input('device_b_description'),
                'device_b_model' => $request->input('device_b_model'),
                'device_b_ru' => $request->input('device_b_ru'),
                'device_b_rack' => $request->input('device_b_rack'),
                'device_b_rack_type' => $request->input('device_b_rack_type'),
                'note' => $request->input('note'),
                'slug' => SlugService::createSlug(Inventory::class, 'slug', $request->title),
                'user_id' => auth()->user()->id
            ]);

        return redirect('/inventory')
            ->with('message', 'Your inventory has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $inventory = Inventory::where('slug', $slug);
        $inventory->delete();

        return redirect('/inventory')
            ->with('message', 'Your inventory has been deleted!');
    }
    /**
     * Search in the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        // Get the search value from the request
        $search = $request->input('search');

        // Search in the title and body columns from the posts table
        $inventories = Inventory::query()
            ->where('line_no', 'LIKE', "%{$search}%")
            ->orWhere('location', 'LIKE', "%{$search}%")
            ->orWhere('device_a_rack', 'LIKE', "%{$search}%")
            ->orWhere('device_a_rack_type', 'LIKE', "%{$search}%")
            ->orWhere('device_a_ru', 'LIKE', "%{$search}%")
            ->orWhere('device_a_model', 'LIKE', "%{$search}%")
            ->orWhere('device_a_ru', 'LIKE', "%{$search}%")
            ->orWhere('device_a_description', 'LIKE', "%{$search}%")
            ->orWhere('device_a_host_name', 'LIKE', "%{$search}%")
            ->orWhere('device_a_port', 'LIKE', "%{$search}%")
            ->orWhere('detailed_cable_info', 'LIKE', "%{$search}%")
            ->orWhere('device_b_rack', 'LIKE', "%{$search}%")
            ->orWhere('device_b_rack_type', 'LIKE', "%{$search}%")
            ->orWhere('device_b_ru', 'LIKE', "%{$search}%")
            ->orWhere('device_b_model', 'LIKE', "%{$search}%")
            ->orWhere('device_b_ru', 'LIKE', "%{$search}%")
            ->orWhere('device_b_description', 'LIKE', "%{$search}%")
            ->orWhere('device_b_host_name', 'LIKE', "%{$search}%")
            ->orWhere('device_b_port', 'LIKE', "%{$search}%")
            ->orWhere('note', 'LIKE', "%{$search}%")
            ->get();

        // Return the search view with the resluts compacted
        return view('search', compact('inventories'));
    }
}
