<?php
/**
 * Restricted Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

$position = get_field('osp_image_alignment') ?: 'osp_image_alignment_left';
$align = [
    'osp_image_alignment_left' => 'left',
    'osp_image_alignment_right' => 'right',
    'osp_image_alignment_none' => 'none',
];


if( ! $is_preview ) {
    echo "<div class='image image-{$align[$position]}'><InnerBlocks  /></div>";
    return;
}

?>
<div>Изображение</div>
<div style="min-height: 50px; border: 1px dotted blue" class='image <?php echo esc_attr($class_alignment); ?>'>
    <InnerBlocks  />
</div>

