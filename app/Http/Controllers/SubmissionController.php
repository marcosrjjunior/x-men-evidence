<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Submission\SubmissionRequest;
use App\Http\Requests\Submission\CheckSubmissionRequest;
use App\Submission;
use App\User;
use Storage;

class SubmissionController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('guest');
    }

    /**
     * Submit submission
     *
     * @return \Illuminate\Http\Response
     */
    public function send(SubmissionRequest $request)
    {
        $picturePath = $this->uploadPicture($request);

        $submission = Submission::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'picture' => $picturePath,
            'short_description' => $request->input('short_description'),
        ]);

        $request->session()->flash('status', 'Submission received!');

        return back();
    }

    /**
     * Check the status of the submission using email
     *
     * @return \Illuminate\Http\Response
     */
    public function check(CheckSubmissionRequest $request)
    {
        $submission = Submission::where('email', $request->input('email_check'))->first();

        if (empty($submission->exists)) {
            $request->session()->flash('error', "There's no submission using this e-email");

            return back();
        }

        return view('submission_status', [
            'submission' => $submission
        ]);
    }

    /**
     * Update Submission infos
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $picturePath = $this->uploadPicture($request);

        Submission::where('id', $request->input('id'))
            ->update(['picture' => $picturePath]);

        $request->session()->flash('status', 'Profile updated!');

        return redirect()->route('submission.check');
    }

    public function uploadPicture($request)
    {
        $picturePath = NULL;

        if ($request->file('picture')) {
            $picturePath = Storage::put('pictures', $request->file('picture'));
        }

        return $picturePath;
    }

    /**
     * Approve a submission and register x-men user
     */
    public function approve(Request $request)
    {
        $submission = Submission::where('id', $request->get('id'))->first();

        if (!$submission) {
            return;
        }

        $user = User::create([
            'name' => $submission->name,
            'email' => $submission->email,
            'password' => bcrypt('abc123'),
            'picture' => $submission->picture,
            'short_description' => $submission->short_description,
            'approved_by' => auth()->user()->id,
        ]);

        $submission->delete();

        $request->session()->flash('status', 'Submission Approved!');

        return redirect()->route('admin');
    }
}
