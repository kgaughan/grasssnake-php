<?php $this->with_envelope() ?>

<h1>Open Issues Assigned to You</h1>

<?php if (!empty($issues)) { ?>
	<table class="data">
		<thead>
			<tr>
				<th class="numeric" width="5%">#</th>
				<th>Title</th>
				<th width="10%">Priority</th>
				<th width="15%">Last Updated</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($issues as $r) { ?>
			<tr>
				<td class="numeric"><?php echo $r['id'] ?></td>
				<td><a href="projects/<?php echo $r['project_id'] ?>"><?php ee($r['project']) ?></a>: <a href="issues/<?php echo $r['id'] ?>"><?php ee($r['title']) ?></a></td>
				<td><?php ee($r['priority']) ?></td>
				<td><?php ee(date('j-M-Y, H:i', strtotime($r['last_updated']))) ?></td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
<?php } else { ?>
	<p>You have no issues assigned to you.</p>
<?php } ?>

<h1>Your Watches</h1>

<?php if (!empty($watches)) { ?>
	<table class="data">
		<thead>
			<tr>
				<th class="numeric" width="5%">#</th>
				<th>Title</th>
				<th width="10%">Status</th>
				<th width="10%">Priority</th>
				<th width="15%">Last Updated</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($watches as $r) { ?>
			<tr>
				<td class="numeric"><?php echo $r['id'] ?></td>
				<td><a href="projects/<?php echo $r['project_id'] ?>"><?php ee($r['project']) ?></a>: <a href="issues/<?php echo $r['id'] ?>"><?php ee($r['title']) ?></a></td>
				<td><?php ee($r['status']) ?></td>
				<td><?php ee($r['priority']) ?></td>
				<td><?php ee(date('j-M-Y, H:i', strtotime($r['last_updated']))) ?></td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
<?php } else { ?>
	<p>You have no watches.</p>
<?php } ?>

<?php if (Users::current()->can('post')) { ?>
<?php start_slot('sidebar') ?>
<?php $this->render('new-issue') ?>
<?php end_slot() ?>
<?php } ?>
