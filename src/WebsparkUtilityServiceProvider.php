<?php

namespace Drupal\webspark_utility;

use Drupal\Core\DependencyInjection\ContainerBuilder;
use Drupal\Core\DependencyInjection\ServiceProviderBase;

/**
 * Modifies the language manager service.
 */
class WebsparkUtilityServiceProvider extends ServiceProviderBase {

  /**
   * {@inheritdoc}
   */
  public function alter(ContainerBuilder $container) {
    // Overrides language_manager class to test domain language negotiation.
    // Adds entity_type.manager service as an additional argument.

    // Note: it's safest to use hasDefinition() first, because getDefinition() will 
    // throw an exception if the given service doesn't exist.
    if ($container->hasDefinition('config_readonly_form_subscriber')) {
      $definition = $container->getDefinition('config_readonly_form_subscriber');
      $definition->setClass('Drupal\webspark_utility\EventSubscriber\ReadOnlyFormSubscriber');
    }
  }
}