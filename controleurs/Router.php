<?php
class Router
{
	public function dispatch()
	{
		try
		{
			$this->loadControleur($_GET['controleur']);
		}
		catch(Exception $e)
		{
			$erreur = $e->getMessage();
			$controleur_erreur = new ErreurControleur();
			$controleur_erreur->indexAction($erreur);
		}
	}
	private function loadControleur($controleur)
	{
		if(!isset($controleur))
		{
			//chargement de l'accueil
			$controleur_accueil = new AccueilControleur();
			$controleur_accueil->indexAction();
		}
		else 
		{
			$controleur = ucfirst($controleur).'Controleur';
			$file_name = 'Controleurs/'.$controleur.'.php';
			if(file_exists($file_name))
			{
				$controleur = new $controleur();
				$this->loadAction($controleur);
			}
			else
			{
				//cas d'erreur : exception
				throw new Exception('Le controleur demandé n\'existe pas !');
			}
		}
	}
	private function loadAction($controleur)
	{
		if(!isset($_GET['action']))
		{
			$controleur->indexAction();
		}
		else
		{
			$method_name = $_GET['action'] . 'Action';
			if(method_exists($controleur,$method_name))
			{
				$controleur->$method_name();
			}
			else
			{
				throw new Exception("L'action demandée n'existe pas !");
			}
		}
	}
}
?>