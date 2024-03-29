<?php

namespace Core\Views;

use App\Models\Page;
use Core\Session\CsrfTokenService;

class View extends HelperView
{
    protected string $csrfToken;
    private string $templateName;
    private string $viewName;
    private array $params = [];

    public function __construct(string $viewName, string $templateName = 'back', array $params = [])
    {
        $this->csrfToken = $this->setCsrf();
        $this->setViewName($viewName);
        $this->setTemplateName($templateName);
        $this->setVariables($params);
    }

    public function setCsrf(): string
    {
        $csrfTokenService = new CsrfTokenService();

        return $csrfTokenService->generateToken();
    }

    public function setViewName(string $viewName): void
    {
        if (!file_exists('../views/'.$viewName.'.view.php')) {
            exit('La vue views/'.$viewName.".view.php n'existe pas");
        }
        $this->viewName = '../views/'.$viewName.'.view.php';
    }

    public function setTemplateName(string $templateName): void
    {
        if (!file_exists('../views/templates/'.$templateName.'.tpl.php')) {
            exit('Le template views/templates/'.$templateName.".tpl.php n'existe pas");
        }
        $this->templateName = '../views/templates/'.$templateName.'.tpl.php';
    }

    public function setVariables(array $params): void
    {
        $this->params = $params;
    }

    public function component(string $component, $config, array|object|string $data = null): void
    {
        if (!file_exists('../views/components/'.$component.'.php')) {
            exit('Le composant views/components/'.$component.".php n'existe pas");
        }
        include '../views/components/'.$component.'.php';
    }

    public function __destruct()
    {
        extract($this->params);
        include $this->templateName;
    }

    public function menu(): array
    {
        $menu = new Page();

        return $menu::query()
            ->where('is_hidden', '=', 0)
            ->get();
    }
}
