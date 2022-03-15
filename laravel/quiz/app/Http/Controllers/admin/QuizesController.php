<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Quizes;
use App\Http\Requests\QuizesCreateRequest;
use App\Http\Requests\QuizesUpdateRequest;

class QuizesController extends Controller
{
    public function index()
    {
        $quizes = Quizes::withCount('questions');
        if(request()->get('title') !== ''){
            $quizes = Quizes::where('title', 'LIKE', request()->get("title"))->withCount('questions');
        }
        $quizes = $quizes->paginate(5);
        return view('admin.quizes.index', compact('quizes'));
    }

    public function create()
    {
        return view('admin.quizes.create');
    }

    public function store(QuizesCreateRequest $request)
    {
        $checkQuiz = Quizes::where('title',$request->title)->get();
        if(count($checkQuiz) > 0){
            return redirect()->route('quizes.index')->withErrors('This quiz is already exists!');
        } else {
            Quizes::create($request->post());
            return redirect()->route('quizes.index')->withSuccess('Quiz Created Successfully!');
        }
    }

    public function show($id)
    {
        $quiz = Quizes::whereId($id)->with(['questions.userAnswers','userResults'])->withCount('questions')->first();
        return view('admin.quizes.show', compact('quiz'));
    }

    public function edit($id)
    {
        $quizes = Quizes::withCount('questions')->find($id);
        return view('admin.quizes.edit', compact('quizes'));
    }

    public function update(QuizesUpdateRequest $request, $id)
    {
        Quizes::where('id',$id)->update($request->except(['_method','_token']));
        return redirect()->route('quizes.index')->withSuccess('Update Successfully');
    }

    public function destroy($id)
    {
        Quizes::whereId($id)->delete();
        return redirect()->route('quizes.index');
    }
}
