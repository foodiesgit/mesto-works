<x-app-layout>
    <x-slot name="header">Questions of @isset($quiz) {{$quiz->title}}@endisset</x-slot>
    <div class="mb-2">
        <div class="col-lg-12 col-md-12" style="border: none;">
            <form action="{{route('quiz.answers', $quiz->id)}}" method="post">
                @csrf
                <div class="card" style="background-color:#f1f8fe;padding:10px;">
                    @isset($quiz)
                        @foreach($quiz->questions as $item)
                            <div class="questions-con">
                                <strong>{{$loop->iteration}} - </strong>
                                <strong>{{$item->question}}</strong>
                                <img src="/{{$item->image}}" alt="{{$item->image}}" style="margin: 10px;width:48px;">
                                <div class="form-check questions-block">
                                    <label>A)</label>
                                    <label class="questions-labels" for="{{$item->id}}1">
                                    <input type="radio" name="{{$item->id}}" id="{{$item->id}}1" value="A" required>
                                    {{$item->A}}
                                    </label>
                                </div>
                                <div class="form-check questions-block">
                                    <label>B)</label>
                                    <label class="questions-labels" for="{{$item->id}}2">
                                    <input type="radio" name="{{$item->id}}" id="{{$item->id}}2" value="B" required>
                                        {{$item->B}}
                                    </label>
                                </div>
                                <div class="form-check questions-block">
                                    <label>C)</label>
                                    <label class="questions-labels" for="{{$item->id}}3">
                                    <input type="radio" name="{{$item->id}}" id="{{$item->id}}3" value="C" required>
                                        {{$item->C}}
                                    </label>
                                </div>
                                <div class="form-check questions-block">
                                    <label>D)</label>
                                    <label class="questions-labels" for="{{$item->id}}4">
                                    <input type="radio" name="{{$item->id}}" id="{{$item->id}}4" value="D" required>
                                        {{$item->D}}
                                    </label>
                                </div>
                            </div>
                            <hr>
                        @endforeach
                    @endisset
                    <button type="submit" class="btn btn-primary btn-sm rounded-pill btn-block" style="display:flex;justify-content:center;align-items:center;max-height:34px;">
                        <span>Finish</span>
                    </button>

                </div>
            </form>
        </div>
    </div>
</x-app-layout>
