<?php

include('./config.inc.php');
include('../lib/amazonsns.class.php');

$SNS = new AmazonSNS(AMAZON_ACCESS_KEY_ID, AMAZON_SECRET_ACCESS_KEY);

$topicArn = $_POST['topic'];
$message = $_POST['message'];
$subject = $_POST['subject'];

$publish = $SNS->publish($topicArn, $message, $subject);

?>

<h1>Publish</h1>
Published message <?php echo $publish; ?><br />
<a href="show_topic.php?topic=<?php echo $topicArn; ?>" />Return to topic</a>
