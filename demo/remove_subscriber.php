<?php

include('./config.inc.php');
include('../lib/amazonsns.class.php');

$SNS = new AmazonSNS(AMAZON_ACCESS_KEY_ID, AMAZON_SECRET_ACCESS_KEY);

$subscriptionArn = $_GET['subscription'];
$topicArn = $_GET['topic'];

$SNS->unsubscribe($subscriptionArn);

?>

<h2>Unsubscribed from topic</h2>
<a href="show_topic.php?topic=<?php echo $topicArn; ?>" />Return to topic</a>
