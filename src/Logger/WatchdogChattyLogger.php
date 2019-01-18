<?php

namespace Drupal\bronius_watchdog_chatty\Logger;

use Drupal\Core\Logger\RfcLoggerTrait;
use Drupal\Core\Logger\LogMessageParser;
use Psr\Log\LoggerInterface;

class WatchdogChattyLogger implements LoggerInterface {
  use RfcLoggerTrait;

  /**
   * {@inheritdoc}
   */
  public function log($level, $message, array $context = array()) {

    // 0-3: error
    // 4: warning
    // 5-7: status
    $messageType = 'error';
    $messageType = $level > 3 ? 'warning' : $messageType;
    $messageType = $level > 4 ? 'status' : $messageType;

    $parser = new LogMessageParser();
    $messagePlaceholders = $parser->parseMessagePlaceholders($message, $context);
    $builtMessage = $context['channel'] . ': ' . t($message, $messagePlaceholders);

    drupal_set_message($builtMessage, $messageType);

  }
}
