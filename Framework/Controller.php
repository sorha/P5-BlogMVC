<?php

namespace Sorha\Framework;

/**
 * Classe abstraite Controleur
 * Fournit des services communs aux classes Controleur dérivées
 */
abstract class Controller 
{
	/** Action à réaliser */
	private $action;

	/** Requête entrante */
	protected $request;

	/** Définit la requête entrante
	 *
	 * @param Request $request Requête entrante
	 */
	public function setRequest(Request $request) 
	{
		$this->request = $request;
	}

	/**
     * Exécute l'action à réaliser.
     * Appelle la méthode portant le même nom que l'action sur l'objet Controleur courant
     * 
     * @throws \Exception Si l'action n'existe pas dans la classe Controleur courante
     */
	public function executeAction($action) 
	{
		if (method_exists($this, $action)) // Verifie si une méthode qui se nomme $action existe dans la classe actuelle.
		{
			$this->action = $action;
			$this->{$this->action}(); // Appel de la méthode dont le nom est $action
		}
		else 
		{
			$classController = get_class($this);
			throw new \Exception("Action '$action' non définie dans la classe $classController");
		}
	}

	/**
     * Méthode abstraite correspondant à l'action par défaut
     * Oblige les classes dérivées à implémenter cette action par défaut
     */
	public abstract function index();

	/**
     * Génère la vue associée au contrôleur courant
     * 
     * @param array $dataView Données nécessaires pour la génération de la vue
     */
	protected function generateView($dataView = array()) 
	{
		// Détermination du nom du fichier vue à partir du nom du contrôleur actuel
		$classController = get_class($this);
		$controller = str_replace("Controller", "", $classController);
		// Instanciation et génération de la vue
		$view = new View($this->action, $controller);
		$view->generate($dataView);
	}
	/**
	 * Effectue une redirection vers un contrôleur et une action spécifiques
	 * 
	 * @param string $controller Controller
	 * @param string $action Action Action
	 */
	protected function redirect($controller, $action = null)
	{
	    $rootWeb = Configuration::get("rootWeb", "/");
	    // Redirection vers l'URL racine_site/controlller/action
	    header("Location:" . $rootWeb . $controller . "/" . $action);
	}
}
