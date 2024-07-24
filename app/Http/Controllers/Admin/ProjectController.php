<?php

namespace App\Http\Controllers\Admin;

use App\Models\Type;
use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types =  Type::all();
        $programmingLanguages = ['PHP', 'JavaScript', 'Vite', 'Vue', 'HTML', 'CSS', 'Laravel'];
        $statuses = ['Completed', 'In Progress'];

        return view('admin.projects.create', compact('programmingLanguages', 'statuses', 'types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        $data = $request->validated();
        $data['slug'] = Str::of($data['title'])->slug();

        // Handle file upload
        if ($request->hasFile('preview')) {
            $file = $request->file('preview');
            $fileName = $file->getClientOriginalName();
            $imagePath = $file->storeAs('images', $fileName, 'public');
            $data['preview_path'] = 'storage/' . $imagePath;
        } else {
            $data['preview_path'] = null;
        }

        $project = Project::create($data);

        return redirect()->route('admin.projects.index')->with('message', 'Project ' . $project->title . ' successfully created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $types =  Type::all();
        $programmingLanguages = ['PHP', 'JavaScript', 'Vite', 'Vue', 'HTML', 'CSS', 'Laravel'];
        $statuses = ['Completed', 'In Progress'];

        return view('admin.projects.edit', compact('project', 'programmingLanguages', 'statuses', 'types'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $data = $request->validated();
        $data['slug'] = Str::of($data['title'])->slug();

        // Handle file upload
        if ($request->hasFile('preview')) {

            // cancella la vecchia immagine, se esiste, prima di caricare quella nuova
            if ($project->preview_path) {
                $oldFilePath = str_replace('storage/', '', $project->preview_path);
                Storage::disk('public')->delete($oldFilePath);
            }

            $file = $request->file('preview');
            $fileName = $file->getClientOriginalName();
            $imagePath = $file->storeAs('images', $fileName, 'public');
            $data['preview_path'] = 'storage/' . $imagePath;
        } else {
            $data['preview_path'] = $project->preview_path;
        }

        $project->update($data);

        return redirect()->route('admin.projects.show', $project)->with('message', $project->title . ' successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        // Check if the project has a linked image and delete it
        if ($project->preview_path) {
            $filePath = str_replace('storage/', '', $project->preview_path);
            Storage::disk('public')->delete($filePath);
        }

        $project_title = $project->title;
        $project->delete();

        return redirect()->route('admin.projects.index')->with('message', $project_title . ' successfully deleted');
    }
}
