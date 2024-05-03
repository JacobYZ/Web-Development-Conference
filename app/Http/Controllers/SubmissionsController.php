<?php

namespace App\Http\Controllers;

use App\Models\Submission;
use Illuminate\Http\Request;

class SubmissionsController extends Controller
{
    public function index()
    {
        $submissions = Submission::all();
        return view('submissions.index', ['submissions' => $submissions]);
    }
    public function show(Submission $submission)
    {
        return view('submissions.show', ['submission' => $submission]);
    }
    public function create()
    {
        return view('submissions.create');
    }
    public function store(Request $request)
    {
        Submission::create($request->all());
        return redirect()->route('submissions.index');
    }
    public function edit(Submission $submission)
    {
        return view('submissions.edit', ['submission' => $submission]);
    }
    public function update(Request $request, Submission $submission)
    {
        $submission->update($request->all());
        return redirect()->route('submissions.index');
    }
    public function destroy(Submission $submission)
    {
        $submission->delete();
        return redirect()->route('submissions.index');
    }
}
