<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Type;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $totalProjects = Project::count();
        $completedProjects = Project::where('status', 'completed')->count();
        $inProgressProjects = Project::where('status', 'in progress')->count();

        // ottengo i tipi dei progetti per nome
        $frontEndType = Type::where('name', 'Front-End')->first();
        $backEndType = Type::where('name', 'Back-End')->first();
        $fullStackType = Type::where('name', 'Full-Stack')->first();

        // ottengo il totale dei progetti che hanno quel type indipendentemente dall'id numerico
        $FrontEndProjects = Project::where('type_id', $frontEndType->id)->count();
        $BackEndProjects = Project::where('type_id', $backEndType->id)->count();
        $FullStackProjects = Project::where('type_id', $fullStackType->id)->count();

        return view('admin.dashboard', compact('totalProjects', 'completedProjects', 'inProgressProjects', 'FrontEndProjects', 'BackEndProjects', 'FullStackProjects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
