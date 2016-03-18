<?php

/**
 * @file
 * Default simple view template to all the fields as a row.
 *
 * - $view: The view in use.
 * - $fields: an array of $field objects. Each one contains:
 *   - $field->content: The output of the field.
 *   - $field->raw: The raw data for the field, if it exists. This is NOT output safe.
 *   - $field->class: The safe class id to use.
 *   - $field->handler: The Views field handler object controlling this field. Do not use
 *     var_export to dump this object, as it can't handle the recursion.
 *   - $field->inline: Whether or not the field should be inline.
 *   - $field->inline_html: either div or span based on the above flag.
 *   - $field->wrapper_prefix: A complete wrapper containing the inline_html to use.
 *   - $field->wrapper_suffix: The closing tag for the wrapper.
 *   - $field->separator: an optional separator that may appear before a field.
 *   - $field->label: The wrap label text to use.
 *   - $field->label_html: The full HTML of the label to use including
 *     configured element type.
 * - $row: The raw result object from the query, with all data it fetched.
 *
 * @ingroup views_templates
 */
?>
<div style="position: relative">
    <?php $row->field_field_page_list_layout[0]['rendered']['#markup'] ?>
    <?php $style = 'node_list'; $field_value = $row->field_field_page_list_layout[0]['rendered']['#markup']?>
    <?php $style .= strtolower($field_value) == 'default' ? '' : '_' . strtolower($field_value); ?>
    <a href="<?php print drupal_get_path_alias("node/".$row->nid) ?>"><?php print theme('image_style', array('style_name' => $style, 'path' => $row->field_field_page_images[0]['raw']['uri'])); ?></a>

    <div class="content-wrapper" style="position: absolute; bottom: 0; color: #1e1e1e; padding: 5px 10px; z-index: 1; display:none;">
        <?php foreach ($fields as $id => $field): ?>
          <?php if (!empty($field->separator)): ?>
            <?php print $field->separator; ?>
          <?php endif; ?>

          <?php print $field->wrapper_prefix; ?>
            <?php print $field->label_html; ?>
            <?php print $field->content; ?>
          <?php print $field->wrapper_suffix; ?>
        <?php endforeach; ?>
      <div class="opaque" style="width: 100%; height: 100%; background: #fff; opacity: .73; position: absolute; bottom: 0; left: 0; z-index:-1;"></div>
    </div>
</div>