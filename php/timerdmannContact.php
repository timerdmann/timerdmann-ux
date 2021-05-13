<?php

	if ($_SERVER["REQUEST_METHOD"] !== "POST") {
		// Return an error unless it's a POST request
		$this->header( 'HTTP/1.1 400: BAD REQUEST' );
		die();
	}

	$field_name = trim($_POST['cf_name']);
	$field_email = trim($_POST['cf_email']);
	$field_message = trim($_POST['cf_message']);

	if (empty($field_name) || empty($field_email) || empty($field_message)) {
?>
		<script language="javascript" type="text/javascript">
			alert('Oops... something went wrong. If it keeps up, please, send an email to tim@timerdmann.com');
			window.location = '../index.html';
		</script>
<?php
		die();
  } else {
		$mail_to = 'tim@timerdmann.com';
		$subject = 'Message from a site visitor ' . $field_name;

		$body_message = 'From: ' . $field_name."\n\n";
		$body_message .= 'E-mail: ' . $field_email."\n\n";
		$body_message .= 'Message: ' . $field_message;

		$headers = 'From: ' . $field_email;

		if (mail($mail_to, $subject, $body_message, $headers)) {
?>
			<script language="javascript" type="text/javascript">
				alert('Thank you for emailing Tim Erdmann UX Consulting. We will contact you as soon as possible.');
				window.location = '../index.html';
			</script>
<?php
		} else {
?>
		<script language="javascript" type="text/javascript">
			alert('Oops... something went wrong. If it keeps up, please, send an email to tim@timerdmann.com');
			window.location = '../index.html';
		</script>
<?php
		}
}
?>

