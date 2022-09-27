<?php

namespace Drupal\word_counter\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class FormLogin
 * @package Drupal\word_counter\Form
 */
class WordCounterForm extends FormBase {

  /**
   * @return string
   */
  public function getFormId() {
    return 'word counter';
  }

  /**
   * @param array $form
   * @param FormStateInterface $form_state
   * @return array
   */
  public function buildForm(array $form, FormStateInterface $form_state) {

    $form['word_count'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Enable or disable word count'),
    ];

    $form['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('submit'),
    ];

    return $form;
  }

  /**
   * @param array $form
   * @param FormStateInterface $form_state
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $word_count = $form_state->getValue('word_count');
    $view_display = \Drupal::service('entity_display.repository')
      ->getViewDisplay('node', 'article', 'default');

    // Word counter check.
    if (!empty($word_count)) {
      $view_display->setComponent('field_word_counter', [
        'region' => 'content',
        "weight" => 2,
      ])->save();
    }
    else {
      $view_display->removeComponent('field_word_counter')->save();
    }
  }
}