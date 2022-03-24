<x-app-layout>
    <x-slot name="header">Edit of @isset($questions) {{$questions->question}} @endisset</x-slot>
    <div class="card">
        <div class="card-body">
            <div class="card-title">
                @isset($questions)
                    <form class="needs-validation" action="{{route('questions.update', [$questions->quizes_id, $questions->id])}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="panel-content">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label" for="validationTooltip01">Subject<span class="text-danger">*</span> </label>
                                        <input type="text"  class="form-control" name="subject" value="{{$questions->subject}}"  id="validationTooltip01" placeholder="Subject" required>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label" for="validationTooltip01">Level<span class="text-danger">*</span> </label>
                                        <input type="text"  class="form-control" name="level" value="{{$questions->level}}" id="validationTooltip01" placeholder="Level" required>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label" for="validationTooltip01">Line<span class="text-danger">*</span> </label>
                                        <input type="text"  class="form-control" name="line" value="{{$questions->line}}" id="validationTooltip01" placeholder="Line" required>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label" for="validationTooltip01">Image<span class="text-danger">*</span> </label>
                                    <img src="{{asset($questions->image)}}" alt=""  style="width: 100%;max-height:170px;margin-bottom:10px;">
                                    <input type="file" name="image" id="" required>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label class="form-label" for="validationTooltip01">Question <span class="text-danger">*</span> </label>
                                    <textarea class="form-control" name="question" id="" cols="30" rows="2" style="width: 100%;" required placeholder="Question">{{$questions->question}}</textarea>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="validationTooltip01">A <span class="text-danger">*</span> </label>
                                    <input type="text"  class="form-control" name="A" value="{{$questions->A}}" id="validationTooltip01" placeholder="A" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="validationTooltip01">B <span class="text-danger">*</span> </label>
                                    <input type="text"  class="form-control" name="B" value="{{$questions->B}}" id="validationTooltip01" placeholder="B" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="validationTooltip01">C <span class="text-danger">*</span> </label>
                                    <input type="text"  class="form-control" name="C" value="{{$questions->C}}" id="validationTooltip01" placeholder="C" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="validationTooltip01">D <span class="text-danger">*</span> </label>
                                    <input type="text"  class="form-control" name="D" value="{{$questions->D}}" id="validationTooltip01" placeholder="D" required>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label class="form-label">Correct Answer <span class="text-danger">*</span> </label>
                                    <select name="correct_answer" id="" class="form-control">
                                        <option value="A">{{$questions->A}}</option>
                                        <option value="B">{{$questions->B}}</option>
                                        <option value="C">{{$questions->C}}</option>
                                        <option value="D">{{$questions->D}}</option>
                                    </select>
                                </div>

                            </div>

                        </div>
                        <div class="d-flex flex-row-reverse">
                            <button type="submit" id="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                @endisset
            </div>
      </div>
  </div>
</x-app-layout>
