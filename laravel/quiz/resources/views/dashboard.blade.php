<x-app-layout>
    <x-slot name="header">Dashboard</x-slot>
    <div class="mb-2">
        <div class="card-group gap-2">
            @foreach($quizes as $item)
                <a href="{{route('join.quiz', $item->id)}}" style="color: #444; text-decoration:none;">
                    <div class="card">
                        <img src="/uploads/Subject 1/1.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{$item->title}}</h5>
                            <p>{{$item->description}}</p>
                            <ul>
                                <li><span>Question Count: {{$item->questions_count}}</span></li>
                                <li><span>Joiner Count: {{$item->details['joinerCount']}}</span></li>
                                <li><span>Avarage Score: {{$item->details['avarage']}}</span></li>
                                <li><span>Your Rank: {{$item->rank}}</span></li>
                            </ul>
                            <p class="card-text"><small class="text-muted">{{$item->finished_at->diffForHumans()}}</small></p>
                            <a href="{{route('join.quiz', $item->id)}}" class="btn btn-primary">Join</a>
                        </div>
                    </div>
                </a>
                {{$quizes}}
                @endforeach
        </div>
    </div>
</x-app-layout>
