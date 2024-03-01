<?php
// Template name: Flexible content
get_header();


get_template_part('inc/sections/hero');

$flexible_content = get_field('flexible_content');


if (!empty($flexible_content)) {
	foreach ($flexible_content as $item) {

		get_template_part('inc/flexible-content/' . $item['acf_fc_layout'], '', $item);
	}
}

get_footer();