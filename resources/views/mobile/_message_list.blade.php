<ul class="chat_info">
    @foreach($messages as $message)
        @if($message->user->id == $user_id)
            <li class="right">
                <img src="{{ $message->user->avatar }}" alt="{{ $message->user->name }}">
                <b>{{ $message->user->name }}</b>
                <i>{{ $message->created_at }}</i>
                <div>{{ $message->msg }}</div>
            </li>
        @else
            <li class="left">
                <img src="{{ $message->user->avatar }}" alt="{{ $message->user->name }}">
                <b>{{ $message->user->name }}</b>
                <i>{{ $message->created_at }}</i>
                <div>{{ $message->msg }}</div>
            </li>
        @endif
    @endforeach
</ul>