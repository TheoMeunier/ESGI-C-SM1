<?php

namespace Core\Views;

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
    public function includeComponent(string $component, array $config, array $data = []): void
    {
        if(!file_exists("Views/Components/".$component.".php"))
        {
            die("Le composant Views/Components/".$component.".php n'existe pas");
        }
        include "Views/Components/".$component.".php";
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
