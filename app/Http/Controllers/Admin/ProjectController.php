<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Technology;
use App\Models\Type;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $technologies=Technology::all();
        $type=Type::all();
        return view('admin.project.create',compact('technologies','type'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectRequest $request)
    {
        $data=$request->validated();
        $project=new Project();
        dd($data);

        $data=array_merge($data,['slug'=>Str::slug($data['title'])]);
        $project->fill($data);
        if(isset($data['image'])){
            $data['image']=Storage::put('uploads',$data['image']);
        }
        $project->save();

        if(isset($data['technologies'])){ //null?
            $project->technologies()->sync($data['technologies']);
        }
        return redirect()->route('admin.dashboard')->with('message','Project aggiunto con successo');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $data=Project::where('slug',$slug)->first();
        if(!$data) abort(404);
        return view('admin.project.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=Project::findOrFail($id);
        return view('admin.project.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjectRequest $request, $id)
    {
        $data=$request->validated();
        $item=Project::findOrFail($id);
        $data=array_merge($data,['slug'=>Str::slug($data['title'])]);
        $item->update($data);
        return to_route('admin.dashboard')->with('edit','Il Project è stato eliminato con successo');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Project::destroy($id);
        return redirect()->route('admin.dashboard')->with('delete','Project cancellato con successo');
    }
}
