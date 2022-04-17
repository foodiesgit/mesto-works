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
                    {{$quiz}}
                </ul>
            </div>
        </div>
    </div>
</x-app-layout>
