<?php

namespace App\Http\Controllers\Board;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Board\Areas\StoreAreaRequest;
use App\Http\Requests\Board\Areas\UpdateAreaRequest;
use Auth;
use App\Models\Area;
class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('list areas');
        return view('board.areas.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create areas');
        return view('board.areas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAreaRequest $request)
    {
        $this->authorize('create areas');
        $area = new Area;
        $area->user_id = Auth::id();
        $area->setTranslation('name' , 'ar' , $request->name );
        $area->is_active = $request->filled('is_active') ? 1 : 0;
        $area->image = basename($request->file('image')->store('areas'));
        $area->save();
        return redirect(route('board.areas.index'))->with('success' , 'Area Added successfully' );
    }

    /**
     * Display the specified resource.
     */
    public function show(Area $area)
    {
        $this->authorize('show areas');
        $area->load('user');
        return view('board.areas.show' , compact('area') );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Area $area)
    {
        $this->authorize('update areas');
        return view('board.areas.edit' , compact('area') );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAreaRequest $request,Area $area)
    {
        $this->authorize('update areas');
        $area->setTranslation('name' , 'ar' , $request->name );
        $area->is_active = $request->filled('is_active') ? 1 : 0;
        if ($request->hasFile('image')) {
            $area->image = basename($request->file('image')->store('areas'));
        }
        $area->save();
        return redirect(route('board.areas.index'))->with('success' , 'Area Updated successfully' );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
