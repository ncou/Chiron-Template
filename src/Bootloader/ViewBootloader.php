<?php

declare(strict_types=1);

namespace Chiron\Views\Bootloader;

use Chiron\Bootload\AbstractBootloader;
use Chiron\Views\Config\ViewsConfig;
use Chiron\Views\TemplateRendererInterface;

final class ViewBootloader extends AbstractBootloader
{
    public function boot(TemplateRendererInterface $renderer, ViewsConfig $config): void
    {
        // Force file extension to use (only if not null).
        if ($extension = $config->getExtension()) {
            $renderer->setExtension($extension);
        }

        // add template paths
        foreach ($config->getPaths() as $namespace => $paths) {
            // TODO : créer une constante EMPTY_NAMESPACE dans la classe TemplateRendrerInterface ??? ca serai plus propre que d'utiliser directement "null" dans le code ci dessous !!!
            $namespace = is_int($namespace) ? null : $namespace;

            foreach ((array) $paths as $path) {
                $renderer->addPath($path, $namespace);
            }
        }
    }
}
