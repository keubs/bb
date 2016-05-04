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
    <?php if (!empty($fields['field_image_image']->separator)): ?>
      <?php print $fields['field_image_image']->separator; ?>
    <?php endif; ?>

    <?php print $fields['field_image_image']->wrapper_prefix; ?>
      <?php print $fields['field_image_image']->label_html; ?>
      <?php print $fields['field_image_image']->content; ?>
    <?php print $fields['field_image_image']->wrapper_suffix; ?>

    <?php if (!empty($fields['field_uc_product_promo_image']->separator)): ?>
      <?php print $fields['field_uc_product_promo_image']->separator; ?>
    <?php endif; ?>

    <?php print $fields['field_uc_product_promo_image']->wrapper_prefix; ?>
      <?php print $fields['field_uc_product_promo_image']->label_html; ?>
      <?php print $fields['field_uc_product_promo_image']->content; ?>
    <?php print $fields['field_uc_product_promo_image']->wrapper_suffix; ?>
    <div class="content-wrapper active">
        <a class="close glyphicon glyphicon-remove" href="#"></a>
        <?php foreach ($fields as $id => $field): ?>
            <?php if($id == 'field_uc_product_promo_image' || $id == 'field_image_image'){continue;} ?>
          <?php if (!empty($field->separator)): ?>
            <?php print $field->separator; ?>
          <?php endif; ?>

          <?php print $field->wrapper_prefix; ?>
            <?php print $field->label_html; ?>
            <?php print $field->content; ?>
          <?php print $field->wrapper_suffix; ?>
        <?php endforeach; ?>
      <div class="opaque"></div>
    </div>
</div>