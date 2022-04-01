<x-app-layout>
    <x-slot name="header">Edit Quiz</x-slot>
    <div class="card">
        <div class="card-body">
            @isset($quizes)
                <form action="{{route('quizes.update', $quizes->id)}}" method="post">
                    @method('put')
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Title</label>
                        <input type="text" class="form-control" name="title" required value="{{$quizes->title}}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label><br>
                        <textarea class="form-control" name="description" id="" rows="1" required  style="width: 100%;">{{$quizes->description}}</textarea>
                    </div>
                    <div class="mb-3">
                        <select name="state" id="" class="form-control">
                            <option selected disabled>State</option>
                            <option @if($quizes->state === 'active') selected @endif  @if($quizes->questions_count < 4) disabled @endif value="active">Active</option>
                            <option @if($quizes->state === 'passive') selected @endif value="passive">Passive</option>
                            <option @if($quizes->state === 'draft') selected @endif value="draft">Draft</option>
                        </select>
                    </div>
                    <div class="mb-3 ">
                        <label class="form-label">Finished_At</label><br>
                        <input type="datetime-local" class="form-control" name="finished_at" value="{{date('Y-m-d\TH:i', strtotime($quizes->finished_at))}}" required >
                    </div>
                    <div class="d-flex flex-row-reverse">
                        <button type="submit" id="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            @endisset
        </div>
    </div>
</x-app-layout>

