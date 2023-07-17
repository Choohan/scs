<html>
    <body>
        <p style="white-space: pre-line">
            Dear {{ $user->name }},

            We had received an email that need your kind attention! Please find the details as follow:

            <b>Please share with us the problem(s) that you are facing? What is your concern(s)?</b>
            {{ $mail->problem }}

            <b>How do you feel??</b>
            {{ $mail->feeling }}
            
            <b>What is in your mind? Your thoughts towards the problems / concerns.</b>
            {{ $mail->thoughts }}

            <b>Reply at:</b>
            <a href="{{ route('sm.view', ['id'=>$mail_id]) }}">{{ route('sm.view', ['id'=>$mail_id]) }}</a>


            Regards,

            Technical Support
            Peer Support Society
            TAR UMT Penang Branch
        </p>
    </body>
</html>