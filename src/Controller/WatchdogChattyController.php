<?php

namespace Drupal\bronius_watchdog_chatty\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Defines WatchdogChattyController class.
 */
class WatchdogChattyController extends ControllerBase {

  /**
   * Issue test watchdog messages varied by level.
   *
   * @return array
   *   Return markup array.
   */
  public function content() {

    $channel = 'bronius';

    \Drupal::logger($channel)->emergency('This is an emergency (according to watchdog)');
    \Drupal::logger($channel)->alert('Alert. Fire. Fire. Alert.');
    \Drupal::logger($channel)->critical('This one is critical');
    \Drupal::logger($channel)->error('Hmm.. not familiar with "error?"');
    \Drupal::logger($channel)->warning('A watchdog warning...');
    \Drupal::logger($channel)->notice('<== Watchdog notice');
    \Drupal::logger($channel)->info('Just FRI (Foy Rour Info)');
    \Drupal::logger($channel)->debug('Debug level');

    return [
      '#type' => 'markup',
      '#markup' => $this->t('Called one of each level of watchdog message.  Be sure to test a 404 page, too.'),
    ];
  }
}
