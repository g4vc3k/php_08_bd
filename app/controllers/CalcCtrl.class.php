<?php
namespace app\controllers;

use app\forms\CalcForm;
use PDOException;


class CalcCtrl {
    private $form;
    private $resultRaz;
	private $resultTydzien;
	private $resultMiesiac;
	private $resultRok;
	private $records;

public function __construct(){
		$this->form = new CalcForm();
    }

	public function getParams(){
        $this->form->moc = getFromRequest('moc');
        $this->form->czas = getFromRequest('czas');
		$this->form->cena = getFromRequest('cena');
    }


public function validate(){

	if ( ! (isset($this->form->moc) && isset($this->form->czas) && isset($this->form->cena))) {

		return false;
    }

// sprawdzenie, czy potrzebne wartości zostały przekazane
if ( $this->form->moc == "") {
	getMessages()->addError('Nie podano mocy');
}
if ( $this->form->czas == "") {
	getMessages()->addError('Nie podano czasu');
}
if ( $this->form->cena == "") {
    getMessages()->addError('Nie podano ceny');
}


if (! getMessages()->isError()) {
			
	// sprawdzenie, czy $x i $y są liczbami całkowitymi
	if (! is_numeric ( $this->form->moc )) {
		getMessages()->addError('Pierwsza wartość nie jest liczbą całkowitą');
	}
	
	if (! is_numeric ( $this->form->czas )) {
		getMessages()->addError('Druga wartość nie jest liczbą całkowitą');
	}

	if (! is_numeric ( $this->form->cena )) {
		getMessages()->addError('Druga wartość nie jest liczbą całkowitą');
	}
}

return ! getMessages()->isError();
}

public function validateEdit() {
	//pobierz parametry na potrzeby wyswietlenia danych do edycji
	//z widoku listy osób (parametr jest wymagany)
	$this->form->id = getFromRequest('id',true,'Błędne wywołanie aplikacji');
	return ! getMessages()->isError();
}


public function action_calcCompute(){

	$this->getparams();
 
	if ($this->validate()) {
		$this->form->moc = floatval($this->form->moc);
            $this->form->czas = floatval($this->form->czas);
            $this->form->cena = floatval($this->form->cena);
            getMessages()->addInfo('Parametry poprawne.');



			if (inRole('raz')){
				$this->resultRaz = round((($this->form->moc/1000) * $this->form->czas * $this->form->cena),2);
                getMessages()->addWyniki('<h3>Korzystanie z tego urządzenia jednorazowo wyniesie: '.$this->resultRaz.' zł.</h3>');
			} else {
				getMessages()->addInfo('Tylko uzytkownik RAZ może sprawdzić jednorazowe zużycie !');}
                
                if (inRole('tydzien')){
				$this->resultTydzien = round((($this->form->moc/1000) * $this->form->czas * $this->form->cena * 7),2);
				getMessages()->addWyniki('<h3>Korzystanie z tego urządzenia przez tydzień wyniesie: '.$this->resultTydzien.' zł.</h3>');
			} else {
				getMessages()->addInfo('Tylko uzytkownik TYDZIEN może sprawdzić tygodniowe zużycie !');}
                    
                    if (inRole('miesiac')){
				$this->resultMiesiac = round((($this->form->moc/1000) * $this->form->czas * $this->form->cena * 30),2);
				getMessages()->addWyniki('<h3>Korzystanie z tego urządzenia przez miesiąc wyniesie: '.$this->resultMiesiac.' zł.</h3>');
			} else {
				getMessages()->addInfo('Tylko uzytkownik MIESIAC może sprawdzić miesieczne zużycie !');}
                        
					if (inRole('rok')){
				$this->resultRok = round((($this->form->moc/1000) * $this->form->czas * $this->form->cena * 365),2);
				getMessages()->addWyniki('<h3>Korzystanie z tego urządzenia przez rok wyniesie: '.$this->resultRok.' zł.</h3>');
			} else {
				getMessages()->addInfo('Tylko uzytkownik ROK może sprawdzić roczne zużycie !');
                        }

						

			
						
					}
					
					$this->action_wynikiSave();
	}

	public function action_wynikiSave(){
				// 1. Walidacja danych formularza (z pobraniem)
		if (!getMessages()->isError()) {
			// 2. Zapis danych w bazie
			

				
				//2.1 Nowy rekord
				if(inRole('raz'))
						getDB()->insert("wyniki", [
							"moc" => $this->form->moc,
							"czas" => $this->form->czas,
							"cena" => $this->form->cena,
							"wynik" => $this->resultRaz,
							"rola" => "raz"
						]);
				if(inRole('tydzien'))
						getDB()->insert("wyniki", [
							"moc" => $this->form->moc,
							"czas" => $this->form->czas,
							"cena" => $this->form->cena,
							"wynik" => $this->resultTydzien,
							"rola" => "tydzien"
						]);
				if(inRole('miesiac'))
						getDB()->insert("wyniki", [
							"moc" => $this->form->moc,
							"czas" => $this->form->czas,
							"cena" => $this->form->cena,
							"wynik" => $this->resultMiesiac,
							"rola" => "miesiac"
						]);	
				if(inRole('rok'))
						getDB()->insert("wyniki", [
							"moc" => $this->form->moc,
							"czas" => $this->form->czas,
							"cena" => $this->form->cena,
							"wynik" => $this->resultRok,
							"rola" => "rok"
						]);					
					 
				
				getMessages()->addInfo('Pomyślnie zapisano rekord');		
			
			
			// 3b. Po zapisie przejdź na stronę listy osób (w ramach tego samego żądania http)
			

		} 
		$this->action_wynikiList();
	}

	public function action_wynikiDelete(){		
		// 1. walidacja id osoby do usuniecia
		if ( $this->validateEdit() ){
			
			try{
				// 2. usunięcie rekordu
				getDB()->delete("wyniki",[
					"id" => $this->form->id
				]);
				getMessages()->addInfo('Pomyślnie usunięto rekord');
			} catch (PDOException $e){
				getMessages()->addError('Wystąpił błąd podczas usuwania rekordu');
				if (getConf()->debug) getMessages()->addError($e->getMessage());			
			}	
		}
		
		// 3. Przekierowanie na stronę listy osób
		forwardTo('calcShow');		
	}

	public function action_wynikiList(){
		try{
			$this->records = getDB()->select("wyniki", [
					"id",
					"moc",
					"czas",
					"cena",
					"wynik",
					"rola"
				] );
		} catch (PDOException $e){
			getMessages()->addError('Wystąpił błąd podczas pobierania rekordów');
			if (getConf()->debug) getMessages()->addError($e->getMessage());			
		}
		$this->generateView();	


	}
	public function log($data) {
		$output = $data;
		if (is_array($output))
		$output = implode(',', $output);

		echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
	}

	public function action_calcShow(){
		getMessages()->addInfo('Witaj w kalkulatorze');
		$this->action_wynikiList();
	}

	public function generateView(){

		getSmarty()->assign('user',unserialize($_SESSION['user']));
		getSmarty()->assign('page_title','Kalkulator zużycia prądu');
		getSmarty()->assign('form',$this->form);
		getSmarty()->assign('resultRaz',$this->resultRaz);
		getSmarty()->assign('resultTydzien',$this->resultTydzien);
		getSmarty()->assign('resultMiesiac',$this->resultMiesiac);
		getSmarty()->assign('resultRok',$this->resultRok);
		getSmarty()->assign('records',$this->records);
		getSmarty()->display('CalcView.html');
	}
	public function action_chroniona(){

		getSmarty()->assign('user',unserialize($_SESSION['user']));
		getSmarty()->assign('page_title','Kalkulator zużycia prądu');
		getSmarty()->display('chroniona.html');
	}
}



		