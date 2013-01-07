<?php

 require_once "library/ses.class.php";

  function sendMail($email_from, $email_to, $email_subject, $email_body)
  {
	$AMAZON_ACCESS_KEY = "<AMAZON_ACCESS_KEY>";
	$AMAZON_SECRET_KEY = "<AMAZON_SECRET_KEY>";
	
	$ses = new SimpleEmailService($AMAZON_ACCESS_KEY, $AMAZON_SECRET_KEY);
	$subject = $email_subject;
	$body = $email_body;

	if($subject && $body)
	  {
	    #now send email
	    $m_ses = new SimpleEmailServiceMessage();
	    $m_ses->setSubjectCharset('UTF-8');
	    $m_ses->setMessageCharset('UTF-8');
		foreach($email_to as $to)
		{
			$m_ses->addTo(trim($to));
			//echo $to;
		}

	    $m_ses->setFrom($email_from);
	    $m_ses->setSubject($subject);


	    $m_ses->setMessageFromString(strip_tags($body), $body); //first is for text, and second is for html
	    $m_ses->addReplyTo($email_from);
	    $response = $ses->sendEmail($m_ses);
		//print_r($response);
	  }
	
  }

?>
