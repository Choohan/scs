<html>
    <body>
        <p style="white-space: pre-line">
            Dear {{ $user->name }},

           You had received a reply for mail.

            <b>Check your mail at:</b>
            <a href="{{ route('sm.view', ['id'=>$mail->id]) }}">{{ route('sm.view', ['id'=>$mail->id]) }}</a>

            Email is shown as below:
        </p>
            @foreach($replies as $reply)
                <hr />
                <p>
                @if($reply->isAdmin != null)
                    <b>Author: Peer Helper</b>
                @else
                    <b>Author: Annonymous Student</b>
                @endif
                </p>
                <p style="white-space: pre-line">
                {{ $reply->text }}
                </p>
            @endforeach
            <hr/>
        <p style="white-space: pre-line">
            <b>Please share with us the problem(s) that you are facing? What is your concern(s)?</b>
            {{ $mail->problem }}

            <b>How do you feel??</b>
            {{ $mail->feeling }}
            
            <b>What is in your mind? Your thoughts towards the problems / concerns.</b>
            {{ $mail->thoughts }}


            Regards,

            Technical Support
            Peer Support Society
            TAR UMT Penang Branch
        </p>
    </body>
</html>