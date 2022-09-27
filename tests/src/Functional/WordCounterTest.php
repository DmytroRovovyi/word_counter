<?php

namespace Drupal\Tests\word_counter\Functional;

use Drupal\Core\Url;
use Drupal\Tests\BrowserTestBase;

/**
 * Tests the caching of the admin menu subtree items.
 *
 * @group admin_toolbar
 */
class WordCounterTest extends BrowserTestBase {

  /**
   * Modules to enable.
   *
   * @var array
   */
  protected static $modules = [
    'word_counter',
  ];

  /**
   * Theme to enable.
   *
   * @var string
   */
  protected $defaultTheme = 'olivero';

  /**
   * Tests that the word counter page works.
   */
  public function testReactionWordCounterPage() {

    // Create and log in user.
    $account = $this->drupalCreateUser([
      'administer site configuration',
    ]);
    $this->drupalLogin($account);

    $this->drupalGet(Url::fromRoute('word_counter.settings'));
  }

}
