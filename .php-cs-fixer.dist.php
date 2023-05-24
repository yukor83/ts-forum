<?php

$finder = (new PhpCsFixer\Finder())
    ->in(__DIR__)
    ->exclude('var')
;

return (new PhpCsFixer\Config())
    ->setRules([
        '@Symfony' => true,
        'global_namespace_import' => false,
        'phpdoc_separation' => ['groups' => [
            ['deprecated', 'link', 'see', 'since', 'phpstan-consistent-constructor', 'internal', 'coversNothing'],
            ['author', 'copyright', 'license'],
            ['category', 'package', 'subpackage'],
            ['property', 'property-read', 'property-write'],
            ['template', 'template-extends', 'template-implements', 'extends', 'implements'],
        ]],
    ])
    ->setFinder($finder)
;
