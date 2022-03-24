<x-app-layout>
    <x-slot name="header">Create Quiz</x-slot>
    <div class="card">
        <div class="card-body">
            <form action="{{route('quizes.store')}}" method="post">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Title</label>
                    <input type="text" class="form-control" name="title" required value="{{old('title')}}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Description</label><br>
                    <textarea class="form-control" name="description" id="" rows="1" required  style="width: 100%;">{{old('description')}}</textarea>
                </div>
                <div class="mb-3">
                    <select name="state" id="" class="form-control">
                        <option selected disabled>State</option>
                        <option @if(old('state') === 'passive') selected @endif value="passive">Passive</option>
                        <option @if(old('state') === 'draft') selected @endif value="draft">Draft</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Finished_At</label><br>
                    <input type="datetime-local" class="form-control" name="finished_at" value="{{old('finished_at')}}" required >
                </div>
                <div class="d-flex flex-row-reverse">
                    <button type="submit" id="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
    <x-slot name="js">
        <script>
            alert('Test Javascript in x-slot')
        </script>
    </x-slot>
</x-app-layout>
