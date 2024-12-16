<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Question;
use Illuminate\Http\Request;
use App\Http\Resources\QuestionResource;
use App\Http\Requests\StoreQuestionRequest;
use App\Http\Requests\UpdateQuestionRequest;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filter = $request->query('filter', 'latest');

        $questions = QuestionResource::collection(
            Question::with('user')
                ->when($filter === 'mine', function ($query) {
                    $query->mine();
                })
                // ->when($filter === 'latest', function ($query) {
                //     $query->latest();
                // })
                ->when($filter === 'unanswered', function ($query) {
                    $query->where('answers_count', 0);
                })
                ->when($filter === 'scored', function ($query) {
                    $query->where('votes_count', '!=', 0);
                })
                ->latest()
                ->paginate(15)
        );

        return Inertia::render('Questions/Index', [
            'questions' => $questions,
            'filter' => $filter
        ]);
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
    public function store(StoreQuestionRequest $request)
    {
        $request->user()->questions()->create(
            $request->validated()
        );

        return back()->with('success', 'Your question is submitted successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Question $question)
    {
        return Inertia::render('Questions/Show', [
            'question' => QuestionResource::make($question)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Question $question)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateQuestionRequest $request, Question $question)
    {
        $question->update($request->validated());

        return back()->with('success', 'Your question is updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Question $question)
    {
        $question->delete();

        return back()->with('success', 'Your question is deleted successfully');
    }
}
