@extends('layout.member')
@section('content')
    <div class="items">
        <h2 class="item-title">New Mail</h2>
        <form class="message-form" id="create-mail" action="{{ route('sm.createPost') }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="text" name="title" id="title" placeholder="Message Title*" required />
            <textarea id="problem" name="problem" placeholder="Please share with us the problem(s) that you are facing? What is your concern(s)?*" cols="50" required maxlength="2000"></textarea>
            <textarea id="feeling" name="feeling" placeholder="How do you feel?*" cols="50" required maxlength="2000"></textarea>
            <textarea id="thoughts" name="thoughts" placeholder="What is in your mind? Your thoughts towards the problems / concerns*" cols="50" required maxlength="2000"></textarea>
            <input type="submit" id="submit" value="Submit" />
            <a id="back" onclick="window.location.href='{{ route('sm.list') }}'">Back</a>
        </form>
    </div>
@endsection

@section('js')
<script>
    jQuery(document).ready(function(){
        new DataTable('#table-data');
    });
</script>
@endsection