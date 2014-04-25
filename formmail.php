<!DOCTYPE HTML> 
 <html> 
 <head> 
 <meta http-equiv="content-type" content="text/html;charset=utf-8"> 
 <title>FormMail</title> 
 <script type="text/javascript"> 
 function hgsubmit() 
 { 
 if (/\S+/.test(document.hgmailer.name.value) == false) alert ("Please provide your name."); 
 else if (/^\S+@[a-z0-9_.-]+\.[a-z]{2,6}$/i.test(document.hgmailer.email.value) == false) alert ("A valid email address is required."); 
  else if (/\S+/.test(document.hgmailer.comment.value) == false) alert ("Your email content is needed."); 
   else { 
        document.hgmailer.submit(); 
        alert ('Thank you!\nYour email is sent.'); 
        } 
 } 
 </script> 
 </head> 
 <body> 
 <form action="http://www.mydomain.com/cgi-sys/formmail.pl" method="post" name="hgmailer"> 
 <input type="hidden" name="recipient" value="myemail@mydomain.com"> 
 <input type="hidden" name="subject" value="FormMail E-Mail"> 
Whatever you want to say here<br><br> 
Visitor Name: <input type="text" name="name" size="30" value=""><br> 
Visitor E-Mail: <input type="text" name="email" size="30" value=""><br> 
E-Mail Content: <textarea name="comment" cols="50" rows="5"></textarea><br><br>
 <input type="button" value="E-Mail Me!" onclick="hgsubmit();"> 
 <input type="hidden" name="redirect" value="http://www.mydomain.com/redirect-path"> 
 </form> 
 </body> 
 </html> 