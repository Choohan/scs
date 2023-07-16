@extends('layout.member')
@section('content')
    <div class="items">
        <h2 class="item-title">Being bullied by Tan Hooi Ying</h2>
        <p class="author">Author: Annonymous Student</p>
        <p class="item-content">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. In cursus fringilla maximus. Fusce vel massa posuere, ultrices sem et, consequat neque. Aenean sed cursus est. Cras vel metus nec sem congue porta. Nullam vel mauris ac massa malesuada iaculis scelerisque auctor elit. Vivamus efficitur efficitur egestas. Pellentesque sit amet ex odio. Fusce turpis diam, iaculis quis est vitae, ornare tempus lacus. Nullam vel quam dapibus, scelerisque massa in, rhoncus lorem. Aliquam erat volutpat. <br/><br/>

            Duis ultricies vitae nisl ut ullamcorper. Nunc non massa libero. Phasellus at augue dolor. Curabitur vehicula elementum ante, ac finibus augue porttitor et. Etiam ultricies nec lorem a blandit. Nam vitae enim justo. Aenean ac mi mauris. Vivamus dignissim ac odio at aliquet. <br/><br/>

            Vivamus a velit interdum, vulputate leo nec, tempus diam. Phasellus volutpat tellus et lacus interdum faucibus id et diam. Pellentesque congue pretium faucibus. Nam id cursus eros. Praesent eget leo pretium dolor ultricies dictum sit amet non diam. Praesent interdum pharetra ex, malesuada maximus sapien egestas in. Suspendisse dui purus, bibendum blandit faucibus commodo, porta ut turpis. Aenean at risus euismod, iaculis odio vel, accumsan erat. Quisque bibendum dui at imperdiet pretium. Sed placerat, libero eu feugiat dignissim, felis nisl consectetur risus, a tempor tellus leo fermentum libero. Maecenas ac ex odio. <br/><br/>
        </p>
    </div>
    <div class="items">
        <p class="author">Author: Peer Helper</p>
        <p class="item-content">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. In cursus fringilla maximus. Fusce vel massa posuere, ultrices sem et, consequat neque. Aenean sed cursus est. Cras vel metus nec sem congue porta. Nullam vel mauris ac massa malesuada iaculis scelerisque auctor elit. Vivamus efficitur efficitur egestas. Pellentesque sit amet ex odio. Fusce turpis diam, iaculis quis est vitae, ornare tempus lacus. Nullam vel quam dapibus, scelerisque massa in, rhoncus lorem. Aliquam erat volutpat.
        </p>
    </div>
    <div class="items">
        <h2 class="item-title">New Reply</h1>
        <form class="message-form" id="create-mail" action="{{ route('sm.replyPost') }}" method="post" enctype="multipart/form-data">
            @csrf
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