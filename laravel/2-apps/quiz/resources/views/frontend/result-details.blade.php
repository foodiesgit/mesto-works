<x-app-layout>
    <x-slot name="header">
        Results of
        @isset($resultDetails)
            @if(auth()->user()) @endif
            {{auth()->user()->name}} for {{$resultDetails->title}}
        @endisset
    </x-slot>
    <div class="container">
        <div class="row services-08-item--wrapper mt-0 d-flex justify-content-center">
            <div class="col-lg-8 col-md-8" style="border: none;">
                <ul class="list-group mt-20">
                    Created Date: {{$resultDetails->created_at}}
                    @isset($resultDetails)
                        @foreach($resultDetails->questions as $item)
                            <div class="questions-con">
                                <strong>{{$loop->iteration}} - </strong>
                                <strong>{{$item->question}}</strong>
                                <img src="/{{$item->image}}" alt="{{$item->image}}" style="margin: 10px;width:48px;">
                                <div class="form-check questions-block">
                                    <label>A) {{$item->A}}</label>
                                </div>
                                <div class="form-check questions-block">
                                    <label>B) {{$item->B}}</label>
                                </div>
                                <div class="form-check questions-block">
                                    <label>C) {{$item->C}}</label>
                                </div>
                                <div class="form-check questions-block">
                                    <label>D) {{$item->D}}</label>
                                </div>
                                <div class="form-check questions-block">
                                    <label class="questions-labels" style="color:green;">Correct Answer: {{$item->correct_answer}}</label>
                                </div>
                                <div class="form-check questions-block">
                                    @if($item->correct_answer === $item->userAnswers->answers)
                                        <label class="questions-labels" style="color:green;">
                                            Your Answer: {{$item->userAnswers->answers}}
                                            <i class="fa fa-thumbs-up ml-2 fa-lg"></i>
                                        </label>
                                    @else
                                        <label class="questions-labels" style="color:red;">
                                            Your Answer: {{$item->userAnswers->answers}}
                                            <i class="fa fa-thumbs-down ml-2 fa-lg"></i>
                                        </label>
                                    @endif
                                </div>
                                <div class="form-check questions-block">
                                    <label for="">Percent of Users-Correct-Answers: {{$item->truePercent}}</label>
                                </div>
                            </div>
                        @endforeach
                    @endisset
                </ul>
                <div class="d-grid gap-2">
                    <a href="{{route('quiz.results',$resultDetails->id)}}" class="btn btn-primary btn-block">Back</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
