<?php

include('./config.inc.php');
include('../lib/amazonsns.class.php');

$SNS = new AmazonSNS(AMAZON_ACCESS_KEY_ID, AMAZON_SECRET_ACCESS_KEY);

$topicArn = $_GET['topic'];

$topic = $SNS->getTopicAttributes($topicArn);

$subs = $SNS->listSubscriptionsByTopic($topicArn);

?>

<a href="list_topics.php">Return to topics list</a>
<h1>Topic</h1>

<pre>
<?php print_r($topic); ?>
</pre>

<h2>Publish</h2>
<form method="post" action="publish.php">
	<input type="hidden" name="topic" value="<?php echo $topicArn; ?>" />
	<input type="text" name="subject" value="" /><br />
	<textarea name="message">Message</textarea><br />
	<input type="submit" value="Send" />
</form>

<h2>Subscriptions</h2>

<?php
if(count($subs) == 0)
{
	echo 'No subscriptions';
}
else
{
	?>
	<table border="1">
	<tr><th>Protocol</th><th>Endpoint</th><th>SubscriptionArn</th><th></th></tr>
	<?php
	foreach($subs as $sub)
	{
		?>
		<tr>
			<td><?php echo $sub['Protocol']; ?></td>
			<td><?php echo $sub['Endpoint']; ?></td>
			<td><?php echo $sub['SubscriptionArn']; ?></td>
			<td><a href="remove_subscriber.php?topic=<?php echo $topicArn; ?>&subscription=<?php echo $sub['SubscriptionArn']; ?>">Unsubscribe</a></td>
		</tr>
		<?php
	}
	?>
	</table>
	<?php
}
?>

<h3>New</h3>
<form action="add_subscriber.php" method="post">
	<input type="hidden" name="topic" value="<?php echo $topicArn; ?>" />
	<select name="protocol">
		<option value="email">email</option>
		<option value="email-json">email-json</option>
		<option value="http">http</option>
		<option value="https">https</option>
		<option value="sqs">sqs</option>
		<option value="sms">sms</option>
	</select>
	<input type="text" name="endpoint" value="endpoint" /><br />
	<input type="submit" value="Subscribe" />
</form>
