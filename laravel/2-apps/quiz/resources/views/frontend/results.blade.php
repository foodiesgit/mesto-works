<x-app-layout>
    <x-slot name="header">
        Results of
        @isset($quiz)
            @if(auth()->user()) @endif
            {{auth()->user()->name}} for {{$quiz->title}}
        @endisset
    </x-slot>
    <div class="container">
        <div class="row services-08-item--wrapper mt-0 d-flex justify-content-center">
            <div class="col-lg-8 col-md-8" style="border: none;">
                <ul class="list-group mt-20">
                    @isset($quiz)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Questions Count  <span class="badge bg-info" style="min-width: 100px;font-size:14px;">{{$quiz->questions_count}}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Correct Count  <span class="badge bg-success" style="min-width: 100px;font-size:14px;">{{$quiz->userResults->correct_count}}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Wrong Count  <span class="badge bg-danger" style="min-width: 100px;font-size:14px;">{{$quiz->userResults->wrong_count}}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Score  <span class="badge bg-secondary" style="min-width: 100px;font-size:14px;">{{$quiz->userResults->score}}</span>
                        </li>
                    @endisset
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <a href="{{route('quiz.result.details',$quiz->id)}}" class="btn btn-primary btn-block">Details</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</x-app-layout>
