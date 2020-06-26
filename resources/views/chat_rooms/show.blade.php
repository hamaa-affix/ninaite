@section('content')
 chatroom.showです
        @foreach($messages as $message)
          {{ $message->content  }}
          <hr>
        @endforeach
@endsection