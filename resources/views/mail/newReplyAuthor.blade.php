<html>
    <body>
        <p style="white-space: pre-line">
            Dear {{ $user->name }},

           We had received received your replies and will definitely notify you once you gotten a new message through this email!

            <b>Check your mail at:</b>
            <a href="{{ route('sm.view', ['id'=>$mail->id]) }}">{{ route('sm.view', ['id'=>$mail->id]) }}</a>


            Regards,

            Technical Support
            Peer Support Society
            TAR UMT Penang Branch
        </p>
    </body>
</html>