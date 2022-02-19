<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Joiners;
use App\Models\Quizes;
use App\Models\Answers;
use App\Models\Results;
use App\Models\JoinedQuiz;
use Results as GlobalResults;
class FrontendMainController extends Controller
{
    public function index()
    {
        $quizes = Quizes::where('state','aktif')->with(['allResults'])->get();
        return view('frontend.quiz', compact('quizes'));
    }

    public function questions(Request $request,$id)
    {
        if(session()->exists('joinerid')){
            $checkResult = Results::where('joiner_id', session('joinerid'))->first();
            if(!$checkResult){
                  $source =  Quizes::whereId($id)->with('questions')->first();
                  $quizInfo =  Quizes::whereId($id)->get();

                  $quiz11 = $source->questions()->where('subject', 'Konu1')->where('level', 1)->inRandomOrder()->limit(1)->get();
                  $quiz12 = $source->questions()->where('subject', 'Konu1')->where('level', 2)->inRandomOrder()->limit(2)->get();
                  $quiz13 = $source->questions()->where('subject', 'Konu1')->where('level', 3)->inRandomOrder()->limit(2)->get();

                  $quiz21 = $source->questions()->where('subject', 'Konu2')->where('level', 1)->inRandomOrder()->limit(1)->get();
                  $quiz22 = $source->questions()->where('subject', 'Konu2')->where('level', 2)->inRandomOrder()->limit(2)->get();
                  $quiz23 = $source->questions()->where('subject', 'Konu2')->where('level', 3)->inRandomOrder()->limit(2)->get();

                  $quiz31 = $source->questions()->where('subject', 'Konu3')->where('level', 1)->inRandomOrder()->limit(2)->get();
                  $quiz32 = $source->questions()->where('subject', 'Konu3')->where('level', 2)->inRandomOrder()->limit(2)->get();
                  $quiz33 = $source->questions()->where('subject', 'Konu3')->where('level', 3)->inRandomOrder()->limit(2)->get();

                  $questions = array_reduce([$quiz11,$quiz12,$quiz13,$quiz21,$quiz22,$quiz23,$quiz31,$quiz32,$quiz33], function($arr, $item) {
                    if (empty($item) || $item->isEmpty())
                        return $arr;
                    return $arr->merge($item);
                }, $quiz11);

                $request->session()->put('questions', $questions);

                return view('frontend.questions', compact('questions','quizInfo'));
            } else {
                return redirect()->route('get-results', [$id,session('joinerid')]);
            }
        } else {
            return redirect()->route('joiner.signin.form');
        }
    }

    public function setResults(Request $request)
    {
        $questions = session('questions');
        $correct = 0;
        $joinerId = session('joinerid');
        $level1 = 0;
        $level2 = 0;
        $subject1_level3 = 0;
        $subject2_level3 = 0;
        $subject3_level3 = 0;
        foreach($questions as $item){
            Answers::create([
                'joiner_id'=> $joinerId,
                'question_id' => $item->id,
                'answers' => $request->post($item->id)
            ]);
            if($item->correct_answer === $request->post($item->id)){
                $correct+=1;
                if($item->level === '1'){
                    $level1+=1;
                } else if($item->level === '2'){
                    $level2+=1;
                } else if($item->subject === 'Konu1' && $item->level === '3'){
                    $subject1_level3+=1;
                } else if($item->subject === 'Konu2' && $item->level === '3'){
                    $subject2_level3+=1;
                } else {
                    $subject3_level3+=1;
                }
            }
        }

        return $score = (($level1 * 5) + ($level2 * 6) + ($subject1_level3 * 7) + ($subject2_level3 * 7) + ($subject3_level3 * 8));
        $wrong = count($questions) - $correct;

        Results::create([
            'joiner_id' => $joinerId,
            'quizes_id' => $item->quizes_id,
            'score' => $score,
            'correct_count' => $correct,
            'wrong_count' => $wrong
        ]);

        foreach($questions as $item){
            JoinedQuiz::create([
                'joiner_id'=> $joinerId,
                'quizes_id' => $item->quizes_id,
                'question' => $item->question,
                'subject' => $item->subject,
                'level' => $item->level,
                'line' => $item->line,
                'A' => $item->A,
                'B' => $item->B,
                'C' => $item->C,
                'D' => $item->D,
                'correct_answer' => $item->correct_answer,
                'answers' => $request->post($item->id)
            ]);
        }

        return redirect()->route('get-results', [$joinerId, $item->quizes_id])->withSuccess('Testi Başarıyla Bitirdiniz');
    }

    public function getResults(Request $request, $quizId){
        if(session()->exists('joinerid')){
            $myResult = Joiners::with('results')->where('id', session('joinerid'))->first();
            return view('frontend.results', compact('myResult'));
        } else {
            return redirect()->route('quiz');
        }
    }

    public function joinerLogout(Request $request){
        if(session()->exists('joinerid')){
           session()->forget('joinerid');
           session()->forget('name');
           return redirect()->route('index');
        }
    }
}
