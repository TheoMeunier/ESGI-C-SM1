<? namespace App\Core\Views;

class View
{
    private string $templateName;
    private string $viewName;
    private array $data = [];

    public function __construct(string $viewName, string $templateName = "back")
    {
        $this->setViewName($viewName);
        $this->setTemplateName($templateName);
    }

    public function setTemplateName(string $templateName): void
    {
        if(!file_exists("../Views/templates/".$templateName.".tpl.php"))
        {
            die("Le template Views/templates/".$templateName.".tpl.php n'existe pas");
        }
        $this->templateName = "../Views/templates/".$templateName.".tpl.php";
    }

    public function setViewName(string $viewName): void
    {
        if(!file_exists("../Views/".$viewName.".view.php"))
        {
            die("La vue Views/".$viewName.".view.php n'existe pas");
        }
        $this->viewName = "../Views/".$viewName.".view.php";
    }

    public function setData(array $data): void
    {
        $this->data = $data;
    }

    public function render(): void
    {
        extract($this->data);
        include $this->templateName;
    }
}