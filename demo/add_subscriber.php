<?php

include('./config.inc.php');
include('../lib/amazonsns.class.php');

$SNS = new AmazonSNS(AMAZON_ACCESS_KEY_ID, AMAZON_SECRET_ACCESS_KEY);

$topicArn = $_POST['topic'];
$protocol = $_POST['protocol'];
$endpoint = $_POST['endpoint'];

try
{
	$SNS->subscribe($topicArn, $protocol, $endpoint);
	?>
	<h2>Subscribed</h2>
	<a href="show_topic.php?topic=<?php echo $topicArn; ?>">Return to topic</a>
	<?php
}
catch(SNSException $e)
{
	echo $e->getMessage() . '<br />';
	?>
	<a href="show_topic.php?topic=<?php echo $topicArn; ?>">Return to topic</a>
	<?php

}
