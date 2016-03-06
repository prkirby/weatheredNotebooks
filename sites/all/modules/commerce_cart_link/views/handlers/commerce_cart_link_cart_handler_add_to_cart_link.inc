<?php
/**
 * Field handler to present an add to cart link for the product.
 *
 * $line_item->data['context']['product_ids']: an array of product IDs to
 *     include on the form or the string 'entity' if the context array includes
 *     an entity array with information for accessing the product IDs from an
 *     entity's product reference field.
 *   - $line_item->data['context']['entity']: if the product_ids value is the
 *     string 'entity', an associative array with the keys 'entity_type',
 *     'entity_id', and 'product_reference_field_name' that points to the
 *     location of the product IDs used to build the form.
 */

// @todo: Allow a product display to show Add to Cart links for all attached products.
// @todo: What about cart button options? Product attributes? Those may never be supported.
class commerce_cart_link_cart_handler_add_to_cart_link extends views_handler_field_entity {

  function option_definition() {
    $options = parent::option_definition();

    $options['show_quantity'] = array('default' => FALSE);
    $options['default_quantity'] = array('default' => 1);
    $options['combine'] = array('default' => TRUE);
    $options['display_path'] = array('default' => FALSE);
    $options['line_item_type'] = array('product' => t('Product'));

    return $options;
  }

  /**
   * Provide the add to cart display options.
   */
  function options_form(&$form, &$form_state) {
    parent::options_form($form, $form_state);

    $form['show_quantity'] = array(
      '#type' => 'checkbox',
      '#title' => t('Display a textfield quantity widget on the add to cart form.'),
      '#default_value' => $this->options['show_quantity'],
    );

    $form['default_quantity'] = array(
      '#type' => 'textfield',
      '#title' => t('Default quantity'),
      '#default_value' => $this->options['default_quantity'] <= 0 ? 1 : $this->options['default_quantity'],
      '#element_validate' => array('commerce_cart_field_formatter_settings_form_quantity_validate'),
      '#size' => 16,
    );

    $form['combine'] = array(
      '#type' => 'checkbox',
      '#title' => t('Attempt to combine like products on the same line item in the cart.'),
      '#description' => t('The line item type, referenced product, and data from fields exposed on the Add to Cart form must all match to combine.'),
      '#default_value' => $this->options['combine'],
    );

    // Add a conditionally visible line item type element.
    $types = commerce_product_line_item_types();

    if (count($types) > 1) {
      $form['line_item_type'] = array(
        '#type' => 'select',
        '#title' => t('Add to Cart line item type'),
        '#options' => array_intersect_key(commerce_line_item_type_get_name(), drupal_map_assoc($types)),
        '#default_value' => !empty($this->options['line_item_type']) ? $this->options['line_item_type'] : 'product',
      );
    }
    else {
      $form['line_item_type'] = array(
        '#type' => 'hidden',
        '#value' => key($types),
      );
    }

    // @todo: This is not yet supported.
    if ($this->view->display[$this->view->current_display]->display_plugin == 'page') {
      $title = t("Link products added to the cart from this page display to the View's path.");
    }
    else {
      $title = t('Link products added to the cart from this display to the current path the customer is viewing where the View is rendered.');
    }

    $form['display_path'] = array(
      '#type' => 'checkbox',
      '#title' => $title,
      '#default_value' => $this->options['display_path'],
    );
  }

  function render($values) {
    // Attempt to load the specified product.
    $product = $this->get_value($values);

    if (!empty($product)) {

      ctools_include('ajax');

      $token = drupal_get_token('add_to_cart_link:' . $product->product_id);

      $product_wrapper = entity_metadata_wrapper('commerce_product', $product->product_id);
      $in_cart = _commerce_cart_link_product_in_cart($product->product_id);

      if ($in_cart) {
        // @todo: Add nofollow class
        // @todo: Figure out how to drupal_alter
        $label = t('Remove from Cart');
        $link = ctools_ajax_text_button($label, 'cart/remove/nojs/' . $product->product_id .'/' . $token, $label,
          'ajax-remove-cart commerce-remove-cart-link remove-' . $product->product_id);
      }
      else {

        $info = entity_get_info('commerce_product');
        $bundle = $product_wrapper->getBundle();
        $type =  $info['bundles'][$bundle]['label'];
        $price = $product_wrapper->commerce_price->value();
        $price = commerce_currency_format($price['amount'], $price['currency_code']);

        $link = ctools_ajax_text_button(t('@type @price', array('@type' => $type, '@price' => $price)),
          'cart/add/nojs/' . $product->product_id . '/' . $token,
          t('Buy :title', array(':title' => $product_wrapper->title->value())), 'commerce-add-to-cart-link ajax-add-cart add-' . $product->product_id);

        drupal_alter('commerce_cart_link', $item, $in_cart);
      }

      return $link;
    }
  }
}
