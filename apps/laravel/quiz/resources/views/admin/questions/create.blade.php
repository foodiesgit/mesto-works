<x-app-layout>
    <x-slot name="header">Questions of @isset($quiz) {{$quiz->title}} @endisset</x-slot>
    <div class="card">
        <div class="card-body">
            <div class="card-title">
                @isset($quiz)
                    <form class="needs-validation" action="{{route('questions.store', $quiz->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="panel-content">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="validationTooltip01">Subject<span class="text-danger">*</span> </label>
                                    <input type="text"  class="form-control" name="subject"  id="validationTooltip01" placeholder="Subject" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="validationTooltip01">Level<span class="text-danger">*</span> </label>
                                    <input type="text"  class="form-control" name="level" id="validationTooltip01" placeholder="Level" required value="{{old('level')}}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="validationTooltip01">Line<span class="text-danger">*</span> </label>
                                    <input type="text"  class="form-control" name="line" id="validationTooltip01" placeholder="Line" required value="{{old('line')}}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="validationTooltip01">Image<span class="text-danger">*</span> </label><br>
                                    <input type="file" name="image" id="" required>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label class="form-label" for="validationTooltip01">Question <span class="text-danger">*</span> </label>
                                    <textarea class="form-control" name="question" id="" cols="30" rows="2" style="width: 100%;" required placeholder="Question">{{old('question')}}</textarea>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="validationTooltip01">A <span class="text-danger">*</span> </label>
                                    <input type="text"  class="form-control" name="A" id="validationTooltip01" placeholder="A" required value="{{old('A')}}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="validationTooltip01">B <span class="text-danger">*</span> </label>
                                    <input type="text"  class="form-control" name="B" id="validationTooltip01" placeholder="B" required value="{{old('B')}}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="validationTooltip01">C <span class="text-danger">*</span> </label>
                                    <input type="text"  class="form-control" name="C" id="validationTooltip01" placeholder="C" value="{{old('C')}}" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="validationTooltip01">D <span class="text-danger">*</span> </label>
                                    <input type="text"  class="form-control" name="D" id="validationTooltip01" placeholder="D" value="{{old('D')}}" required>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label class="form-label">Correct Answer <span class="text-danger">*</span> </label>
                                    <select name="correct_answer" id="" class="form-control">
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                        <option value="C">C</option>
                                        <option value="D">D</option>
                                    </select>
                                </div>

                            </div>

                        </div>
                        <div class="d-flex flex-row-reverse">
                            <button type="submit" id="submit" class="btn btn-primary">Add</button>
                        </div>
                    </form>
                @endisset
            </div>
      </div>
  </div>
</x-app-layout>
