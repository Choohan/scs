<html>
    <body>
        <p>
            Dear {{ $user->name }},<br/><br/>

            We had received your mail and will reply you within 3 days!<br/><br/>

            You will receive a notification in your student email whenever there is any update in the mail!<br/><br/>

            <b>Check the email at:</b> <br/><br/>
            <a href="{{ route('sm.view', ['id'=>$mail->id]) }}">{{ route('sm.view', ['id'=>$mail->id]) }}</a><br/><br/>

            Regards,<br/><br/>

            Peer Helper<br/>
            Peer Support Society<br/>
            TAR UMT Penang Branch<br/>
        </p>
    </body>
</html>