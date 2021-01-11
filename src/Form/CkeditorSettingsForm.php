<?php

namespace Drupal\alternative_editors\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Implements a CKEditor settings form.
 */
class CkeditorSettingsForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'alternative_editors_ckeditor_settings_form';
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return ['alternative_editors.settings'];
  }

  /**
   * Chosen configuration form.
   *
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->configFactory->getEditable('alternative_editors.settings');

    $form['ckeditor_self_hosted'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Is CKEditor library self hosted ?'),
      '#default_value' => $config->get('ckeditor_self_hosted'),
      '#description' => $this->t('Check this if the CKEditor library is installed locally.'),
    ];

    $form['ckeditor_javascript_path'] = [
      '#type' => 'textfield',
      '#title' => $this->t('ckeditor.min.js full path'),
      '#default_value' => $config->get('ckeditor_javascript_path'),
      '#description' => $this->t('The full path to ckeditor.min.js<br>Example:<ul><li>Self hosted: /libraries/ckeditor/ckeditor.min.js</li><li>CDN hosted: https://cdn.ckeditor.com/ckeditor5/24.0.0/classic/ckeditor.js</li></ul>'),
    ];

    $form['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Submit'),
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $config = $this->configFactory->getEditable('alternative_editors.settings');
    $config->set('ckeditor_self_hosted', $form_state->getValue('ckeditor_self_hosted'));
    $config->set('ckeditor_javascript_path', $form_state->getValue('ckeditor_javascript_path'));
    $config->save();

    parent::submitForm($form, $form_state);

    /** @var \Drupal\Core\Cache\CacheTagsInvalidatorInterface $tagInvalidator */
    $tagInvalidator = \Drupal::service('cache_tags.invalidator');
    $tagInvalidator->invalidateTags(['library_info']);
  }

}
