<?php

namespace App\Http\Controllers;

use App\Models\Participant;
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
        $participant = Participant::with('submissions')->where('email', $request->email)->first();
        if (!$participant) {
            $participant = Participant::create([
                'name' => $request->author,
                'email' => $request->email,
                'affiliate' => $request->affiliate,
            ]);
            session([
                'author_id' => $participant->id,
                'author_name' => $participant->name,
                'author_email' => $participant->email,
                'author_affiliate' => $participant->affiliate,
            ]);
            return redirect()->route('submissions.create')->with('continue_submission', true);
        }

        // Update session info regardless of submission status
        session([
            'author_id' => $participant->id,
            'author_name' => $participant->name,
            'author_email' => $participant->email,
            'author_affiliate' => $participant->affiliate,
        ]);

        // The relationship between Participant and Submission is one-to-one
        // Check if a submission already exists for the participant
        if ($participant->submissions === null) {
            // No submission exists, redirect to the submission form
            return redirect()->route('submissions.create')->with('continue_submission', true);
        } else {
            // Fetch the latest submission details from the database
            $submission = Submission::where('author_id', $participant->id)->latest()->first();

            // Store submission details in the session
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
        // Validate the request data
        $request->validate([
            'title' => 'required',
            'abstract' => 'required',
            // Add validation rules for other fields
        ]);

        // Create the Submission
        $submission = Submission::create([
            'title' => $request->title,
            'abstract' => $request->abstract,
            'keywords' => $request->keywords,
            'author_id' => session('author_id'),
        ]);

        return redirect()->route('submissions.index')->with('continue_submission', true);
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
