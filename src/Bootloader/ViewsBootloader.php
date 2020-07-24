<?php

declare(strict_types=1);

namespace Chiron\Views\Bootloader;

use Chiron\Bootload\AbstractBootloader;
use Chiron\Views\Config\ViewsConfig;
use Chiron\Views\TemplateRendererInterface;

final class ViewsBootloader extends AbstractBootloader
{
    public function boot(TemplateRendererInterface $renderer, ViewsConfig $config): void
    {
/*
// TODO : ne pas définir le répertoire views dans le paths.php et ne pas faire de merge dans le DirectoryBootloader, mais l'ajouter ici lors de ce bootloader !!!! Il faudra ensuite nettoyer le paths.php de l'appli en ligne de commande "app-cli" pour retirer la ligne "views" car cela n'a pas de sens de le définir alors qu'on est sur une appli en ligne de commandes.
        if (!$dirs->has('views')) {
            $dirs->set('views', $dirs->get('app') . 'views');
        }
*/

        // Force file extension to use (only if not null).
        if ($extension = $config->getExtension()) {
            $renderer->setExtension($extension);
        }

        // add template paths
        foreach ($config->getPaths() as $namespace => $paths) {
            // TODO : créer une constante EMPTY_NAMESPACE dans la classe TemplateRenderInterface ??? ca serai plus propre que d'utiliser directement "null" dans le code ci dessous !!!
            $namespace = is_int($namespace) ? null : $namespace;

            foreach ((array) $paths as $path) {
                $renderer->addPath($path, $namespace);
            }
        }
    }
}
