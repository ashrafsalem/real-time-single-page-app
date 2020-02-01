<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;
use App\Http\Resources\QuestionResource;
use Symfony\Component\HttpFoundation\Response;

class QuestionController extends Controller
{

    public function index()
    {
        return  QuestionResource::collection(Question::latest()->get());
    }


    public function store(Request $request)
    {
//        auth()->user()->qustions()->create($request->all());
        Question::create($request->all());
        return response("created", Response::HTTP_CREATED);
    }

    public function show(Question $question)
    {
        return new QuestionResource($question);
    }

    public function update(Request $request, Question $question)
    {
        $question->update($request->all());
        return response('updated', Response::HTTP_ACCEPTED);
    }

    public function destroy(Question $question)
    {
        $question->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
