<?php if ($current_row == 1) { ?>
	<h2>Changes</h2>
<?php } ?>
<div class="message<?php if ($current_row == 0) { ?> first<?php } elseif ($current_row % 2 == 0) { ?> even<?php } ?>">
	<div class="metadata">
	<strong><?php ee(Users::get($user_id)->get_username()) ?></strong><br>
	<?php if ($current_row > 0) { ?>
	<a id="c<?php echo $id ?>" href="#c<?php echo $id ?>">#<?php echo $current_row ?></a> on
	<?php } ?>
	<?php ee(date('F jS, Y', strtotime($posted))) ?><br>
	</div>
	<div class="content"><?php echo format_message($message, $current_row == 0) ?></div>
</div>
