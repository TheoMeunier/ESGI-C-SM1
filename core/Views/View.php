<?php

namespace Core\Views;
use Core\Config\ConfigAssets;
class View
{
    private string $templateName;
    private string $viewName;
    private array $data = [];

    public function __construct(string $viewName, string $templateName = 'back', array $variables = [])
    {
        $this->setViewName($viewName);
        $this->setTemplateName($templateName);
        $this->setVariables($variables);
    }

    public function setTemplateName(string $templateName): void
    {
        if (!file_exists('../views/templates/'.$templateName.'.tpl.php')) {
            exit('Le template views/templates/'.$templateName.".tpl.php n'existe pas");
        }
        $this->templateName = '../views/templates/'.$templateName.'.tpl.php';
    }

    public function setViewName(string $viewName): void
    {
        if (!file_exists('../views/'.$viewName.'.view.php')) {
            exit('La vue views/'.$viewName.".view.php n'existe pas");
        }
        $this->viewName = '../views/'.$viewName.'.view.php';
    }

    public function assign(string $key, $value): void
    {
        $this->data[$key]=$value;
    }


    public function includeComponent(string $component, array $config, array $variables = []): void
    {
        if (!file_exists('../views/component/'.$component.'.php')) {
            exit('Le composant views/components/'.$component.".php n'existe pas");
        }
        include '../views/component/'.$component.'.php';
    }

    public function setVariables(array $variables): void
    {
        $this->data = $variables;
    }

    public function __destruct()
    {
        extract($this->data);
        include $this->templateName;
    }
}
