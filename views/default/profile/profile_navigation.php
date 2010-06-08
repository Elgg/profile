<?php

$section = 'activity';
if (isset($vars['section'])) {
	$section = $vars['section'];
}

$profile = $vars['entity'];
$activity = '';
$friends = '';
$extend = '';
$twitter = '';

$url = "{$profile->getURL()}/";

//select section 
switch($section){
	case 'friends':
		$friends = 'class="selected"';
		break;

	case 'details':
		$details = 'class="selected"';
		break;

	case 'twitter':
		$twitter = 'class="selected"';
		break;
		
	case 'commentwall':
		$commentwall = 'class="selected"';
		break;
	case 'activity':
	default:
		$activity = 'class="selected"';
		break;
}
?>
<div class="elgg_horizontal_tabbed_nav profile">
<div class="profile_name"><h2><?php echo $profile->name; ?></h2></div>
<ul>
	<li <?php echo $activity; ?>><a href="<?php echo $url; ?>"><?php echo elgg_echo('activity'); ?></a></li>
	<li <?php echo $details; ?>><a href="<?php echo $url . 'details'; ?>"><?php echo elgg_echo('Details'); ?></a></li>
	<li <?php echo $friends; ?>><a href="<?php echo $url . 'friends'; ?>"><?php echo elgg_echo('friends'); ?></a></li>
	<li <?php echo $commentwall; ?>><a href="<?php echo $url . 'commentwall'; ?>"><?php echo elgg_echo('profile:commentwall'); ?></a></li>
	<?php
		//check to see if the twitter username is set
		if($vars['entity']->twitter){
	?>
			<li <?php echo $twitter; ?>><a href="<?php echo $url . 'twitter'; ?>">Twitter</a></li>
	<?php
		}
		
		//insert a view which others can extend
		echo elgg_view('profilenav/extend', array('profile' => $profile));
	?>
</ul>
</div>