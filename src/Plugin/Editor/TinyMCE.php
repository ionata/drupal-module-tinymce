<?php

namespace Drupal\tinymce\Plugin\Editor;

use Drupal\Component\Serialization\Json;
use Drupal\Core\Config\ConfigFactoryInterface;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Drupal\editor\Plugin\EditorBase;
use Drupal\editor\Entity\Editor;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Defines a TinyMCE-based text editor for Drupal.
 *
 * @Editor(
 *   id = "tinymce",
 *   label = @Translation("TinyMCE"),
 *   supports_content_filtering = TRUE,
 *   supports_inline_editing = TRUE,
 *   is_xss_safe = FALSE,
 *   supported_element_types = {
 *     "textarea"
 *   }
 * )
 */
class TinyMCE extends EditorBase implements ContainerFactoryPluginInterface {

  /**
   * The configuration factory.
   *
   * @var \Drupal\Core\Config\ConfigFactoryInterface
   */
  protected $configFactory;


  /**
   * Constructs a \Drupal\tinymce\Plugin\Editor\TinyMCE object.
   *
   * @param array $configuration
   *   A configuration array containing information about the plugin instance.
   * @param string $plugin_id
   *   The plugin_id for the plugin instance.
   * @param mixed $plugin_definition
   *   The plugin implementation definition.
   * @param \Drupal\Core\Config\ConfigFactoryInterface $config_factory
   *   The configuration factory.
   */
  public function __construct(array $configuration, $plugin_id, $plugin_definition, ConfigFactoryInterface $config_factory) {
    parent::__construct($configuration, $plugin_id, $plugin_definition);
    $this->configFactory = $config_factory;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static(
      $configuration,
      $plugin_id,
      $plugin_definition,
      $container->get('config.factory')
    );
  }

  /**
   * {@inheritdoc}
   */
  public function getJSSettings(Editor $editor) {
    $customSettings = ($settings = $editor->getSettings())
      && !empty($settings['tinymce_editor_settings'])
      ? $settings['tinymce_editor_settings']
      : '{}';

    return [
      'json' => Json::decode($customSettings),
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function getLibraries(Editor $editor) {
    return [
      'alternative_editors/tinymce',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function buildConfigurationForm(array $form, FormStateInterface $form_state) {
    $editor = $form_state->get('editor');
    $settings = $editor->getSettings();

    $form['tinymce_editor_settings'] = [
      '#type' => 'textarea',
      '#title' => $this->t('Editor settings'),
      '#default_value' => $settings['tinymce_editor_settings'],
      '#description' => $this->t('Custom settings for the editor'),
      '#rows' => 20,
    ];

    return $form;
  }

}
