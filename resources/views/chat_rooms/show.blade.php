@extends('layouts.app')

@section('content')
 @if($message->user_id = Auth::id())
        <span>{{Auth::user()->name}}</span>
      @else
        <span>{{$chat_room_user_name}}</span>
      @endif
      
      <div class="commonMessage">
        <div>
        {{$message->message}}
        </div>
      </div>
    </div>
  @endforeach
@endsection