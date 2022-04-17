<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\Quizes;
use App\Http\Requests\QuestionsCreateRequest;
use App\Http\Requests\QuestionsUpdateRequest;
use Illuminate\Http\Request;

class QuestionsController extends Controller
{
    public function index($id)
    {
        $quiz = Quizes::whereId($id)->with('questions')->first() ?? abort('403','Questions Not Found');
        return view('admin.questions.index', compact('quiz'));
        
    }

    public function create($id)
    {
        $quiz = Quizes::find($id);
        return view('admin.questions.create', compact('quiz'));
    }

    public function store(QuestionsCreateRequest $request, $id)
    {
        if($request->hasFile('image')){
            $fileName = 'uploads/'.$request->subject.'/'.$request->line.'.'.$request->image->extension();
            $request->image->move(public_path('uploads/'.$request->subject), $fileName);
            $request->merge(['image' => $fileName]);
        }
        Quizes::find($id)->questions()->create($request->post());
        return redirect()->route('questions.index', $id)->withSuccess('Created Successfully');
    }

    public function show($id)
    {
        //
    }

    public function edit($id, $questionId)
    {
        $questions = Quizes::find($id)->questions()->whereId($questionId)->first();
        return view('admin.questions.edit', compact('questions'));
    }

    public function update(QuestionsUpdateRequest $request, $id, $questionId)
    {
        if($request->hasFile('image')){
            $fileName = 'uploads/'.$request->subject.'/'.$request->line.'.'.$request->image->extension();
            $request->image->move(public_path('uploads/'.$request->subject), $fileName);
            $request->merge(['image' => $fileName]);
        }
        Quizes::find($id)->questions()->whereId($questionId)->first()->update($request->post());
        return redirect()->route('questions.index', [$id, $questionId])->withSuccess('Updated Successfully');
    }

    public function destroy($id, $questionId)
    {
        Quizes::find($id)->questions()->whereId($questionId)->delete();
        return redirect()->route('questions.index', $id)->withSuccess('Deleted Successfully');
    }
}
