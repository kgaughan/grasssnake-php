<?php $this->with_envelope() ?>

<?php start_slot("breadcrumbs") ?>
<a href="../projects/">Projects</a> &raquo;
<a href="../projects/<?php echo $project_id ?>">Issues for <?php ee($project) ?></a> &raquo;
<?php ee($title) ?>
<?php end_slot() ?>

<h1>
	<div id="watcher">
		<?php $this->render('big-star', array('id' => $iid)) ?>
	</div>
	<span>Issue #<?php echo $iid ?> (<?php ee($project) ?>):</span>
	<?php ee($title) ?>
</h1>

<?php $this->render_each('message', $messages) ?>

<?php start_slot('sidebar') ?>
<table class="data">
	<thead>
		<tr>
			<th>Priority</th>
			<th>Status</th>
			<th>Last Updated</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td><?php ee($priority) ?></td>
			<td><?php ee($status) ?></td>
			<td><?php ee(date('j-M-Y, H:i', strtotime($last_updated))) ?></td>
		</tr>
	</tbody>
</table>

<?php if (Users::current()->can('post')) { ?>
<?php $devs = Users::get_developers() ?>
<form method="post" action="">
<fieldset>
<legend>New Message</legend>
<table>
	<tr>
		<th><label for="priority_id">Priority</label></th>
		<td><?php select_box('priority_id', Issues::get_priorities()) ?></td>
	</tr>
	<tr>
		<th><label for="status_id">Status</label></th>
		<td><?php select_box('status_id', Issues::get_statuses()) ?></td>
	</tr>
	<tr>
		<th><label for="user_id">Owned by</label></th>
		<td><?php $this->render('developer-select', compact('devs', 'assigned_user_id')) ?></td>
	</tr>
	<tr>
		<td colspan="2"><textarea name="message" rows="15"></textarea></td>
	</tr>
</table>
<input type="submit" value="Submit Message">
</fieldset>
</form>
<?php } ?>
<?php end_slot() ?>
