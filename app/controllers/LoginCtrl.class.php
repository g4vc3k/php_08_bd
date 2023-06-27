<?php

namespace app\controllers;

use app\forms\LoginForm;
use app\transfer\User;

class LoginCtrl{
	private $form;
	
	public function __construct(){
		//stworzenie potrzebnych obiektów
		$this->form = new LoginForm();
	}
		
	public function getParams(){
		// 1. pobranie parametrów
		$this->form->login = getFromRequest('login');
		$this->form->pass = getFromRequest('pass');
	}
	public function validate() {
		$this->form->login = getFromRequest('login');
		$this->form->pass = getFromRequest('pass');

		//nie ma sensu walidować dalej, gdy brak parametrów
		if (!isset($this->form->login)) return false;
		
		// sprawdzenie, czy potrzebne wartości zostały przekazane
		if (empty($this->form->login)) {
			getMessages()->addError('Nie podano loginu');
		}
		if (empty($this->form->pass)) {
			getMessages()->addError('Nie podano hasła');
		}

		//nie ma sensu walidować dalej, gdy brak wartości
		if ( !getMessages()->isError() ) {
		
			// sprawdzenie, czy dane logowania poprawne
			// (takie informacje najczęściej przechowuje się w bazie danych)
			if ($this->form->login == "raz" && $this->form->pass == "raz") {

				//sesja już rozpoczęta w init.php, więc działamy ...
				$user = new User($this->form->login, 'raz');
				// zaipsz obiekt użytkownika w sesji
				$_SESSION['user'] = serialize($user);
				// dodaj rolę użytkownikowi (jak wiemy, zapisane też w sesji)
				addRole($user->role);

			} else if ($this->form->login == "tydzien" && $this->form->pass == "tydzien") {

				//sesja już rozpoczęta w init.php, więc działamy ...
				$user = new User($this->form->login, 'tydzien');
				// zaipsz obiekt użytkownika w sesji
				$_SESSION['user'] = serialize($user);
				// dodaj rolę użytkownikowi (jak wiemy, zapisane też w sesji)
				addRole($user->role);

			} else if ($this->form->login == "miesiac" && $this->form->pass == "miesiac") {

				//sesja już rozpoczęta w init.php, więc działamy ...
				$user = new User($this->form->login, 'miesiac');
				// zaipsz obiekt użytkownika w sesji
				$_SESSION['user'] = serialize($user);
				// dodaj rolę użytkownikowi (jak wiemy, zapisane też w sesji)
				addRole($user->role); 
			} else if ($this->form->login == "rok" && $this->form->pass == "rok") {

				//sesja już rozpoczęta w init.php, więc działamy ...
				$user = new User($this->form->login, 'rok');
				// zaipsz obiekt użytkownika w sesji
				$_SESSION['user'] = serialize($user);
				// dodaj rolę użytkownikowi (jak wiemy, zapisane też w sesji)
				addRole($user->role); 
			}
			else {
				getMessages()->addError('Niepoprawny login lub hasło');
			}
		}
		
		return ! getMessages()->isError();
	}
	
	public function action_login(){
		$this->getParams();
		if ($this->validate()){
			//zalogowany => przekieruj na główną akcję (z przekazaniem messages przez sesję)
			getMessages()->addError('Poprawnie zalogowano do systemu');
			redirectTo("calcShow");
		} else {
			//niezalogowany => pozostań na stronie logowania
			$this->generateView(); 
		}		
	}
	
	public function action_logout(){
		// 1. zakończenie sesji
		session_destroy();
		// 2. idź na stronę główną - system automatycznie przekieruje do strony logowania
		$this->generateView();
	}	
	
	public function generateView(){
		getSmarty()->assign('form',$this->form); // dane formularza do widoku
		getSmarty()->display('LoginView.html');		
	}
}