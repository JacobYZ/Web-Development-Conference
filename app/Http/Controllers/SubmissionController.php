<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Submission;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Log;

class SubmissionController extends Controller
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
        if (auth()->user()->email !== $request->email) {
            $this->storeAuthorDetailsInSession();
            return redirect()->route('submissions.create')->with('error', 'You are not authorized to submit a paper on behalf of another author.');
        }

        $this->storeAuthorDetailsInSession();

        if (auth()->user()->submissions === null) {
            return redirect()->route('submissions.create')->with('continue_submission', true);
        } else {
            $submission = Submission::where('author_id', auth()->id())->latest()->first();

            session([
                'submission_type' => $submission->type,
                'submission_title' => $submission->title,
                'submission_abstract' => $submission->abstract,
            ]);

            return redirect()->route('submissions.create')->with('has_submission', true);
        }
    }

    public function storeSubmission(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'abstract' => 'required',
        ]);

        Submission::create([
            'title' => $request->title,
            'abstract' => $request->abstract,
            'keywords' => $request->keywords,
            'author_id' => session('author_id'),
        ]);

        return redirect()->route('submissions.index')->with('continue_submission', true);
    }

    private function storeAuthorDetailsInSession()
    {
        session([
            'author_id' => auth()->id(),
            'author_name' => auth()->user()->name,
            'author_email' => auth()->user()->email,
            'author_affiliate' => auth()->user()->affiliate,
        ]);
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
