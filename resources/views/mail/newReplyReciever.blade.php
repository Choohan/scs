<html>
    <body>
        <p style="white-space: pre-line">
            Dear {{ $user->name }},

           You had received a reply for mail.

            <b>Check your mail at:</b>
            <a href="{{ route('sm.view', ['id'=>$mail_id]) }}">{{ route('sm.view', ['id'=>$mail_id]) }}</a>

            Email is shown as below:

            @foreach($replies as $reply)
                @if($reply->isAdmin != null)
                    @if($studentView)
                        Author: Peer Helper
                    @else
                        Author: {{ $reply->name }} (Peer Helper)
                    @endif
            @else
                Author: Annonymous Student
            @endif
                <hr />
                {{ $reply->text }}
            @endforeach
            <hr/>

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