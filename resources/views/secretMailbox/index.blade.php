@extends('layout.member')
@section('content')
    <div class="items">
        <h2 class="item-title">Mails</h1>
        <p><a href="{{ route('sm.create') }}" class="create-button">Create</a></p>
        <table id="table-data" class="dt-responsive">
            <thead>
                <tr>
                    <td data-priority="1" class="desktop"><p>No.</p></td>
                    <td data-priority="-1"><p>Title</p></td>
                    <td data-priority="1" class="desktop"><p>Status</p></td>
                    <td data-priority="1" class="desktop"><p>Action</p></td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><p>1.</p></td>
                    <td><p>Being bullied by Tan Hooi Ying</p></td>
                    <td><p>Pending Reply</p></td>
                    <td><p><a href="{{ route('sm.view') }}" class="view-button">View</a></p></td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td><p>No.</p></td>
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