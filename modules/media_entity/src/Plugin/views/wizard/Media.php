<?php

namespace Drupal\media_entity\Plugin\views\wizard;

use Drupal\views\Plugin\views\wizard\WizardPluginBase;

/**
 * Tests creating media views with the wizard.
 *
 * @ViewsWizard(
 *   id = "media",
 *   base_table = "media_field_data",
 *   title = @Translation("Media")
 * )
 */
class Media extends WizardPluginBase {

  /**
   * Set the created column.
   */
  protected $createdColumn = 'media_field_data-created';

  /**
   * Set default values for the filters.
   */
  protected $filters = [
    'status' => [
      'value' => TRUE,
      'table' => 'media_field_data',
      'field' => 'status',
      'plugin_id' => 'boolean',
      'entity_type' => 'media',
      'entity_field' => 'status',
    ],
  ];

  /**
   * {@inheritdoc}
   */
  public function getAvailableSorts() {
    return [
      'media_field_data-name:DESC' => t('Media name'),
    ];
  }

  /**
   * {@inheritdoc}
   */
  protected function defaultDisplayOptions() {
    $display_options = parent::defaultDisplayOptions();

    // Add permission-based access control.
    $display_options['access']['type'] = 'perm';
    $display_options['access']['options']['perm'] = 'access content';

    // Remove the default fields, since we are customizing them here.
    unset($display_options['fields']);

    // Add the name field, so that the display has content if the user switches
    // to a row style that uses fields.
    /* Field: Media: Name */
    $display_options['fields']['name']['id'] = 'name';
    $display_options['fields']['name']['table'] = 'media_field_data';
    $display_options['fields']['name']['field'] = 'name';
    $display_options['fields']['name']['entity_type'] = 'media';
    $display_options['fields']['name']['entity_field'] = 'media';
    $display_options['fields']['name']['label'] = '';
    $display_options['fields']['name']['alter']['alter_text'] = 0;
    $display_options['fields']['name']['alter']['make_link'] = 0;
    $display_options['fields']['name']['alter']['absolute'] = 0;
    $display_options['fields']['name']['alter']['trim'] = 0;
    $display_options['fields']['name']['alter']['word_boundary'] = 0;
    $display_options['fields']['name']['alter']['ellipsis'] = 0;
    $display_options['fields']['name']['alter']['strip_tags'] = 0;
    $display_options['fields']['name']['alter']['html'] = 0;
    $display_options['fields']['name']['hide_empty'] = 0;
    $display_options['fields']['name']['empty_zero'] = 0;
    $display_options['fields']['name']['settings']['link_to_entity'] = 1;
    $display_options['fields']['name']['plugin_id'] = 'field';

    return $display_options;
  }

}
