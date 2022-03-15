<x-app-layout>
    <x-slot name="header">Questions of @isset($quiz) {{$quiz->title}} @endisset</x-slot>
    <div class="card">
        <div class="card-body">
            <div class="card-title">
                @isset($quiz)
                    <a href="{{route('questions.create', $quiz->id)}}">
                        <div class="btn btn-primary"><i class="fa fa-plus mr-2"></i>Create Questions</div>
                    </a>
                @endisset
            </div>
            <table class="table table-bordered">
            <thead>
                <th>Question</th>
                <th>Image</th>
                <th>Subject</th>
                <th>Level</th>
                <th>Line</th>
                <th>A</th>
                <th>B</th>
                <th>C</th>
                <th>D</th>
                <th>Correct Answer</th>
                <th>Process</th>
            </thead>
            <tbody>
                @isset($quiz)
                    @foreach($quiz->questions as $item)
                        <tr>
                            <td>{{$item->question}}</td>
                            <td><img src="{{asset($item->image)}}" alt="" width="48"></td>
                            <td>{{$item->subject}}</td>
                            <td>{{$item->level}}</td>
                            <td>{{$item->line}}</td>
                            <td>{{$item->A}}</td>
                            <td>{{$item->B}}</td>
                            <td>{{$item->C}}</td>
                            <td>{{$item->D}}</td>
                            <td>{{$item->correct_answer}}</td>
                            <td class="d-flex justify-content-between btn-group btn">
                                <a href="{{route('questions.edit', [$quiz->id, $item->id])}}" style="color:#fff;" class="btn btn-success mr-2 waves-effect waves-themed">Edit</a>
                                <form action="{{route('questions.destroy', [$quiz->id, $item->id])}}" method="post" class="btn btn-danger waves-effect waves-themed">
                                    @method('delete')
                                    @csrf
                                    <button type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach()
                @endisset
            </tbody>
          </table>
        </div>
    </div>
</x-app-layout>
