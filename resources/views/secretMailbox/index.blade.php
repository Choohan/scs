@extends('layout.member')
@section('content')
    <div class="items">
        <h2 class="item-title">Mails</h1>
        <p><a href="{{ route('sm.create') }}" class="create-button">Create</a></p>
        <table id="table-data" class="dt-responsive">
            <thead>
                <tr>
                    <td data-priority="1" class="desktop"><p>ID.</p></td>
                    <td data-priority="-1"><p>Title</p></td>
                    <td data-priority="1" class="desktop"><p>Status</p></td>
                    <td data-priority="1" class="desktop"><p>Action</p></td>
                </tr>
            </thead>
            <tbody>
                @foreach($mails as $mail)
                    <?php $mail_id = $mail->id;
                        if(isset($mail->mail_id)){
                            $mail_id = $mail->mail_id;
                        }
                    ?>
                <tr>
                    <td><p>#{{$mail_id}}</p></td>
                    <td><p>{{ $mail->title }}</p></td>
                    <td><p>{{ $mail->status == 0 ? 'Pending Reply' : ($mail->status == 1 ? 'Replied' : 'Closed') }}</p></td>
                    <td><p><a href="{{ route('sm.view', ['id'=>$mail_id]) }}" class="view-button">View</a></p></td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td><p>ID.</p></td>
                    <td><p>Title</p></td>
                    <td><p>Status</p></td>
                    <td><p>Action</p></td>
                </tr>
            </tfoot>
        </table>
    </div>
@endsection

@section('js')
<script>
    jQuery(document).ready(function(){
        new DataTable('#table-data');
    });
</script>
@endsection