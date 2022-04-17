<x-app-layout>
    <x-slot name="header">Quizes</x-slot>
    <div class="card">
        <div class="card-body">
            <div class="card-title">
                <a href="{{route('quizes.create')}}">
                    <div class="btn btn-primary"><i class="fa fa-plus mr-2"></i>Create Quiz</div>
                </a>
            </div>
            <div class="d-gap mb-2">
                <form method="get">
                    <input type="text" class="form-control" name="title" id=""  placeholder="&#128269;">
                </form>
            </div>
            <table class="table table-bordered">
            <thead>
                <th>Title</th>
                <th class="col col-3">Description</th>
                <th>Questions Count</th>
                <th>State</th>
                <th>Created_At</th>
                <th>Finished_At</th>
                <th>Process</th>
            </thead>
            <tbody>
                @isset($quizes)
                    @foreach($quizes as $item)
                        <tr>
                            <td>{{$item->title}}</td>
                            <td class="col col-3"><textarea class="form-control" disabled style="width:100%;" rows="1">{{$item->description}}</textarea></td>
                            <td>{{$item->questions_count}}</td>
                            @switch($item->state)
                                @case('active')
                                    <td><span class="badge bg-success">{{$item->state}}</span></td>
                                    @break
                                @case('passive')
                                    <td><span class="badge bg-danger">{{$item->state}}</span></td>
                                    @break
                                @case('draft')
                                    <td><span class="badge bg-warning">{{$item->state}}</span></td>
                                    @break
                                @default
                            @endswitch

                            <td>{{$item->created_at->diffForHumans()}}</td>
                            <td>{{$item->finished_at->diffForHumans()}}</td>
                            <td class="d-flex justify-content-between btn-group btn">
                                <a href="{{route('quizes.show', $item->id)}}" style="color:#fff;" class="btn btn-info mr-2 waves-effect waves-themed">Details</a>
                                <a href="{{route('questions.index', $item->id)}}" style="color:#fff;" class="btn btn-primary mr-2 waves-effect waves-themed">Questions</a>
                                <a href="{{route('quizes.edit', $item->id)}}" style="color:#fff;" class="btn btn-success mr-2 waves-effect waves-themed">Edit</a>
                                <form action="{{route('quizes.destroy', $item->id)}}" method="post" class="btn btn-danger waves-effect waves-themed">
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
          {{$quizes->links()}}
        </div>
    </div>
</x-app-layout>
