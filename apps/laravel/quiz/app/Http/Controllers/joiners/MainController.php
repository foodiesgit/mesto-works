<?php

namespace App\Http\Controllers\joiners;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Quizes;
use App\Models\Answers;
use App\Models\Results;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function index(){
       $quizes = Quizes::where('state','active')->with('topScore.user')->withCount('questions')->paginate(5);
       return view('dashboard', compact('quizes'));
   }

    public function joinQuiz($id){
        $quiz = Quizes::whereId($id)->with(['questions','userResults'])->first();
        if($quiz->userResults){
            return redirect()->route('quiz.results', $id);
        }
        return view('frontend.questions', compact('quiz'));
   }

    public function quizAnswers(Request $request, $id){
        $quiz = Quizes::with('questions')->whereId($id)->first();
        $correct = 0;
        $score = 0;
        foreach($quiz->questions as $item){
            Answers::create([
                'user_id'=> auth()->user()->id,
                'question_id' => $item->id,
                'answers' => $request->post($item->id)
            ]);
            if($item->correct_answer === $request->post($item->id)){
                $correct+=1;
            }
        }
        $score = $correct * 25;
        $wrong = count($quiz->questions) - $correct;

        Results::create([
            'user_id' => auth()->user()->id,
            'quizes_id' => $quiz->id,
            'score' => $score,
            'correct_count' => $correct,
            'wrong_count' => $wrong
        ]);
        return redirect()->route('quiz.results', $quiz->id);
   }

    public function quizResults($id){
        $quiz = Quizes::whereId($id)->with(['questions','userResults'])->withCount('questions')->first();
        return view('frontend.results', compact('quiz'));
    }

    public function quizResultDetails($id){
        $resultDetails = Quizes::whereId($id)->with(['questions.userAnswers','userResults'])->withCount('questions')->first();
        return view('frontend.result-details', compact('resultDetails'));
    }
}
