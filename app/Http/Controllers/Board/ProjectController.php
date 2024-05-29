<?php

namespace App\Http\Controllers\Board;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Board\Projects\StoreProjectRequest;
use App\Http\Requests\Board\Projects\UpdateProjectRequest;
use Auth;
use App\Models\Project;
use App\Models\ProjectImage;
use App\Models\Category;
use App\Models\Area;
class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('board.projects.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $areas = Area::all();
        return view('board.projects.create' , compact('areas' , 'categories') );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        $project = new Project;
        $project->setTranslation('name' , 'ar' , $request->name_ar );
        $project->user_id = Auth::id();
        $project->image = basename($request->file('image')->store('projects'));
        $project->is_active = $request->filled('is_active') ? 1 : 0;
        $project->category_id = $request->category_id;
        $project->area_id = $request->area_id;
        $project->address = $request->address;
        $project->rooms = $request->rooms;
        $project->bathrooms = $request->bathrooms;
        $project->total_area = $request->total_area;
        $project->price = $request->price;
        $project->garage = $request->garage;
        $project->basement = $request->basement;
        $project->swimming_pool = $request->swimming_pool;
        $project->type = $request->type;
        $project->youtube_link = $request->youtube_link;
        $project->content = $request->content;
        $project->save();
        if ($request->hasFile('images')) {
            $project_images = [];
            for ($i=0; $i <count($request->file('images')) ; $i++) { 
                $project_images[] = new ProjectImage([
                    'user_id' => Auth::id() , 
                    'image' => basename($request->file('images.'.$i)->store('projects')) ,
                    'type' => 'image'
                ]);
            }

            $project->images()->saveMany($project_images);
        }

        if ($request->hasFile('slides')) {
            $project_images = [];
            for ($i=0; $i <count($request->file('slides')) ; $i++) { 
                $project_images[] = new ProjectImage([
                    'user_id' => Auth::id() , 
                    'image' => basename($request->file('slides.'.$i)->store('projects')) ,
                    'type' => 'slide'
                ]);
            }

            $project->images()->saveMany($project_images);
        }

        return redirect(route('board.projects.index'))->with('success' , 'تم إضافه المشروع بنجاح');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        $project->load(['user' , 'area' , 'category' , 'images' ]);
        return view('board.projects.show' , compact('project') );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $categories = Category::all();
        $areas = Area::all();
        return view('board.projects.edit' , compact('project' , 'areas' , 'categories' ) );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {

        $project->setTranslation('name' , 'ar' , $request->name_ar );
        if ($request->hasFile('image')) {
            $project->image = basename($request->file('image')->store('projects'));
        }
        $project->is_active = $request->filled('is_active') ? 1 : 0;
        $project->category_id = $request->category_id;
        $project->area_id = $request->area_id;
        $project->address = $request->address;
        $project->rooms = $request->rooms;
        $project->bathrooms = $request->bathrooms;
        $project->total_area = $request->total_area;
        $project->price = $request->price;
        $project->garage = $request->garage;
        $project->basement = $request->basement;
        $project->swimming_pool = $request->swimming_pool;
        $project->type = $request->type;
        $project->youtube_link = $request->youtube_link;
        $project->content = $request->content;
        $project->save();
        if ($request->hasFile('images')) {
            $project_images = [];
            for ($i=0; $i <count($request->file('images')) ; $i++) { 
                $project_images[] = new ProjectImage([
                    'user_id' => Auth::id() , 
                    'image' => basename($request->file('images.'.$i)->store('projects')) ,
                ]);
            }

            $project->images()->saveMany($project_images);
        }

        if ($request->hasFile('slides')) {
            $project_images = [];
            for ($i=0; $i <count($request->file('slides')) ; $i++) { 
                $project_images[] = new ProjectImage([
                    'user_id' => Auth::id() , 
                    'image' => basename($request->file('slides.'.$i)->store('projects')) ,
                    'type' => 'slide'
                ]);
            }

            $project->images()->saveMany($project_images);
        }
        return redirect(route('board.projects.index'))->with('success' , 'تم تعديل المشروع بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
