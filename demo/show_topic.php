<?php

include('./config.inc.php');
include('../lib/amazonsns.class.php');

$SNS = new AmazonSNS(AMAZON_ACCESS_KEY_ID, AMAZON_SECRET_ACCESS_KEY);

$topicArn = $_GET['topic'];

$topic = $SNS->getTopicAttributes($topicArn);

$subs = $SNS->listSubscriptionsByTopic($topicArn);

?>

<h1>Topic</h1>

<pre>
<?php print_r($topic); ?>
</pre>

<form method="post" action="publish.php">
	<input type="hidden" name="topic" value="<?php echo $topicArn; ?>" />
	<input type="text" name="subject" value="" /><br />
	<textarea name="message">Message</textarea><br />
	<input type="submit" value="Send" />
</form>

<h2>Subscriptions</h2>

<?php
foreach($subs as $sub)
{
	?>
	
	<pre>
	<?php print_r($sub); ?>
	</pre>
	
	<?php
}
?>
