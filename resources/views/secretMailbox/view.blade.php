@extends('layout.member')
@section('content')
    <div class="items"><h2>{{$mail->title}}</h2>
        <p class="author">Author: Annonymous Student</p>
        <p class="item-content" style="white-space: pre-line">
            <b>Please share with us the problem(s) that you are facing? What is your concern(s)?</b>
            {{ $mail->problem }}

            <b>How do you feel??</b>
            {{ $mail->feeling }}
            
            <b>What is in your mind? Your thoughts towards the problems / concerns.</b>
            {{ $mail->thoughts }}
        </p>
    </div>
    @foreach($replies as $reply)
    <div class="items">
        <p class="author">
            @if($reply->isAdmin != null)
                @if($studentView)
                    Author: Peer Helper
                @else
                    Author: {{ $reply->name }} (Peer Helper)
                @endif
            @else
            Author: Annonymous Student
            @endif
        </p>
        <p class="item-content" style="white-space: pre-line">
            {{ $reply->text }}
        </p>
    </div>
    @endforeach
    <div class="items">
        <h2 class="item-title">New Reply</h1>
        <form class="message-form" id="create-mail" action="{{ route('sm.replyPost') }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="parent" id="parent" value="{{$mail->id}}" />
            <textarea id="message" name="message" placeholder="Message*" cols="50"></textarea>
            <input type="submit" id="submit" value="Submit" />
            <a id="back" onclick="window.location.href='{{ route('sm.list') }}'">Back</a>
        </form>
    </div>
    @if(!$studentView && !$isPeerHelper)
    <div class="items">
        <h2 class="item-title">Assign Peer Helper to this mail</h1>
        <form class="message-form" id="assign-peer" action="{{ route('sm.assignPeerHelper') }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="parent" id="parent" value="{{$mail->id}}" />
            <select id="peer" name="peer" placeholder="Assign a Peer Helper">
                @foreach($peerHelpers as $peerHelper)
                    <option value="{{ $peerHelper->id}}">{{ $peerHelper->name }} ( {{$peerHelper->email}} )</option>
                @endforeach
            </select>
            <input type="submit" id="submit" value="Submit" />
            <a id="back" onclick="window.location.href='{{ route('sm.list') }}'">Back</a>
        </form>
    </div>
    @endif
@endsection

@section('js')
<script>
    jQuery(document).ready(function(){
        new DataTable('#table-data');
    });
</script>
@endsection