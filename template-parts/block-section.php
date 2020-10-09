<?php
/**
 * Restricted Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Load values and assign defaults.
$color = get_field('osp_section_bg_color') ?: 'osp_section_color_white';
$has_container = get_field('osp_section_grid') == 'osp_section_grid_container';

$class = [
    'osp_section_color_white'  => 'bg-light',
    'osp_section_color_blue'   => 'bg-dark',
    'osp_section_color_grey'   => 'bg-grey',
    'osp_section_color_orange' => 'bg-orange',
];

if( !$is_preview ) {
    $cl   =  esc_attr($class[$color]);

    $html = "<section class='$cl'>";
    if ( $has_container ) {
        $html .= "<div class='container'>";
    }

    $html .= "<InnerBlocks  />";

    if ( $has_container ) {
        $html .= "</div>";
    }
    $html .= "</section>";

    echo $html;
    return;
}

?>
<div>Раздел</div>
<div style="min-height: 50px; border: 2px dotted red" class="">
    <InnerBlocks  />
</div>
