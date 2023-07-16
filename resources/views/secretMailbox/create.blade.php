@extends('layout.member')
@section('content')
    <div class="items">
        <h2 class="item-title">New Mail</h2>
        <form class="message-form" id="create-mail" action="{{ route('sm.createPost') }}" method="post" enctype="multipart/form-data">
            @csrf
            <select id="behalf" name="behalf" placeholder="On behalf of*">
                <option value="-1" disabled selected>On behalf of*</option>
                <option value="0">Joel Wong Sing Yue</option>
            </select>
            <input type="text" name="title" id="title" placeholder="Message Title*" />
            <textarea id="message" name="message" placeholder="Message*" cols="50"></textarea>
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