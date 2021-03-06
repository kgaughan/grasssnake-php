<?php
function echo_username($id=null) {
	if ($id == '') {
		echo '&mdash;';
	} else {
		$user = Users::get($id);
		$profile = $user->get_profile();
		if (!is_null($profile)) {
			echo '<a href="', e($profile), '">';
		}
		ee($user->get_username());
		if (!is_null($profile)) {
			echo '</a>';
		}
	}
}

function format_message($message, $is_report) {
	return nl2br($is_report ? format_report($message) : e($message));
}

function format_report($message) {
	$to_highlight = array(
		'What steps will reproduce the problem?',
		'What is the expected output? What do you see instead?',
		'What version of the product are you using? On what operating system?',
		'Please provide any additional information below.');
	$to_highlight = array_map('e', $to_highlight);
	$to_highlight = array_map('preg_quote', $to_highlight);
	$regex = '/^(\s*)(' . implode('|', $to_highlight) . ')\s*$/m';
	return preg_replace($regex, "$1<strong>$2</strong>", e($message));
}
