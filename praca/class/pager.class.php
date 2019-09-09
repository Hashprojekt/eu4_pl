<?php
/**
 * License
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 **/

/**
 * Klasa do generowania i obsługi pager'a
 * Klasa zapamietuje aktualną stronę dodatkowo w sesji. Dzięki temu moťna skakać po róťnych linkach
 * a gdy się wróci na stronę z pager'em, to będziemy na ostatnio wybranej stronie.
 *
 * Głowna metoda klasy : render()
 * Wszystkie metody set naleťy wywoływać przed wywołaniem metody render().
 * Wszystkie metody get naleťy wywoływać dopiero po wywołaniu metody render().
 *
 * @package MCM
 * @subpackage independent
 * @version 2.02 for PHP4
 * @author Robert (nospor) Nodzewski (email: nospor at interia dot pl)
 * @copyright 2005 - 2006 Robert Nodzewski
 * @license http://opensource.org/licenses/lgpl-license.php GNU Lesser General Public License
 **/
	define('_GOTO_FIRST_','gtf');
	define('_GOTO_PREV_X_','gtpx');
	define('_GOTO_PREV_','gtp');
	define('_GOTO_NEXT_','gtn');
	define('_GOTO_NEXT_X_','gtnx');
	define('_GOTO_LAST_','gtl');
	define('_PAGES_', 'pages');
	define('_LINK_PAGE_','lp');
	define('_LINK_SEP_', 'ls');
	define('_PARAM_PAGE_NUMBER_','ppn');
	define('_PAGES_PER_NAV_','ppern');
	define('_TOTAL_RECORDS_','tr');

class Pager {
	/** Podstawowy adres do kolejnych stron.*/ 
	var $_linkPage = '';

	/** Podstawowy adres do kolejnych stron.*/ 
	var $_userWholeLink = false;
	
	/** Czym połączyć parametr strony z adresem (? lub &) */ 
	var $_linkSep = '&';

	/** Liczba rekordów */
	var $_totalRecords = 0;

	/** Ilość rekordów na stronie */
	var $_recordsPerPage = 15;

	/** Numer aktualnej strony */
	var $_actualPage = 0;

	/** Liczba stron na pasku nawigatora */
	var $_pagesPerNav = 10;

	/** Która to jest x(_pagesOnNav) stron */
	var $_actualNavPages = 1;

	/** Ilość x stron */
	var $_totalNavPages = 1;

	/** Ilość wszystkich stron */
	var $_totalPages = 0;

	/** Index rekordu początkowego (od 0) */
	var $_indexRecordStart = null;

	/** Index rekordu końcowego (od 0) */
	var $_indexRecordEnd = null;

	/** Index strony początkowej */
	var $_indexPageStart;

	/** Index strony końcowej */
	var $_indexPageEnd;

	/** id pagera */
	var $_id;

	/** Nazwa parametru, w której będzie numer aktualnej strony */
	var $_paramPageNumber;

	/** Nazwa parametru ogólnego w url z numerem strony */
	var $generalParamPageNumber = 'pa';

	/** Czy zapamiętywać dane w sesji */
	var $_useSession = true;
	
	/** Tablica reprezentująca pager */
	var $_array = array();

	/** Komunikaty błędów */
	var $_errorMsg = array(
		'wrong_parameter' => 'Nieprawidłowy parametr %s przy wywołaniu metody %s()',
	);

	/**
	 * Konstruktor klasy
	 *  
	 * @param string id - unikalne id pagera.
	 * @param pageLink - adres, jaki będzie generowny do linków w pagerze
	 * Jeśli pageLink zawiera ciąg #PAGE#, oznaczać to będzie, iť link nie będzie modyfikowany przez klase, tylko 
	 * będzie wyglądał jak zapodał uťytkownik. Jedyne co zostanie podmienione to #PAGE# na numer strony. 
	 */
	function Pager($id, $pageLink = '') {
		$this->_id = $id;
		$this->_paramPageNumber = $id;
		$this->_linkPage = $pageLink;
		if (strpos($pageLink, '#PAGE#') !== false)
			$this->_userWholeLink = true;
		if (!$this->_userWholeLink && $pageLink && strpos($pageLink, '?') !== false)
			$this->_linkSep = '&amp;';
    }

	/**
	 * Ustawia uťywanie sesji
	 *  
	 * @param boolean $useSession
	 * @return true
	 */ 
    function SetUseSession($useSession) {
		$this->_useSession = $useSession;
		return true;
	}

	/** 
	 * Ustawiamy liczbę stron w nawigatorze
	 * 
	 * @param int $pon liczba stron w nawigatorze
	 * @return true 
	 */
	function SetPagesPerNav($pon) {
		$this->_pagesPerNav = (int) $pon;
		return true;	
	}
	
	/** 
	 * Ustawiamy liczbę wszystkich rekordów
	 * 
	 * @param int $count liczba wszystkich rekordów
	 * @return true 
	 */
	function SetTotalRecords($count) {
		$this->_totalRecords = (int) $count;
		return true;
	}

	/** 
	 * Ustawiamy liczbę rekordów na stronie
	 * 
	 * @param int $count liczba rekordów na stronie
	 * @return true 
	 */
	function SetRecordsPerPage($count) {
		$this->_recordsPerPage = (int) $count;
	}
	
	/** 
	 * Zwraca index rekordu początkowego (od 0)
	 * 
	 * @return int 	 
	 */
    function GetIndexRecordStart() {
		return $this->_indexRecordStart;
	}

	/** 
	 * Zwraca index rekordu końcowego (od 0)
	 * 
	 * @return int 	 
	 */
    function GetIndexRecordEnd() {
		return $this->_indexRecordEnd;
	}

	/** 
	 * Zwraca tablicę pager'a
	 * 
	 * @return array
	 */
    function GetArray() {
		return $this->_array;
	}
	
	/** 
	 * Ustawia numer aktulnej strony.
	 * Zaleca się nie uťywać tej metody, chyba ťe naprawdę istnieje potrzeba
	 * 
	 * @param int $page numer aktualnej strony
	 * @return true
	 */
	function SetActualPage($page) {
		$this->_actualPage = (int) $page;
		return true;
    }
    
	/** 
	 * Zwraca numer aktulnej stony
	 * 
	 * @return int
	 */
	function GetActualPage() {
		return $this->_actualPage;
	}

	/** 
	 * Zwraca nazwę parametru wygenerowanego dla pagera. 
	 * 
	 * @return string
	 */
	function GetParamPageNumber() {
		return $this->_paramPageNumber;
	}

	 /**
	 * Generuje html odpowiadający pager'owi
	 * Dodatkowo wylicza wszystkie niezbędne dane
	 * 
	 * @param boolean $smartRange czy uťywać zmiennych zasięgów
	 * @param mixed $externFunction zewnętrzna funkcja, która będzie generowala kod pager'a na podstawie podanej tablicy
	 * moťe to być string będący nazwą funkcji, bądź teť tablica dwuelementowa, której pierwszym elementem jest nazwa klasy
	 * a drugim nazwa metody tej klasy. Do zewnętrznej funkcji zostanie zapodana tablica reprezentująca pager.
	 * @param boolean $returnArray jeśli ustawiony na true, to metoda zwróci tablicę reprezentującą pager
	 * @return mixed
	 */ 
	function Render($smartRange = false, $externFunction = null, $returnArray = false) {
		if ($externFunction && !(is_string($externFunction) || 
			(is_array($externFunction) && count($externFunction) == 2) && is_string($externFunction[0]) && is_string($externFunction[1]))){
			trigger_error(sprintf($this->_errorMsg['wrong_parameter'], '$externFunction','Render'), E_USER_WARNING);
		}
		if ($this->_actualPage <= 0) {
			$this->_actualPage = isset($_GET[$this->_paramPageNumber]) 
				? ((int) $_GET[$this->_paramPageNumber]) 
				: (isset($_GET[$this->generalParamPageNumber]) 
					? ((int) $_GET[$this->generalParamPageNumber]) : 0);
			if ($this->_actualPage <= 0 && isset($_SESSION) && $this->_useSession)
				$this->_actualPage = isset($_SESSION[$this->_paramPageNumber]) 
					? ((int) $_SESSION[$this->_paramPageNumber]) : 0;
			if ($this->_actualPage <= 0)
				$this->_actualPage = 1;
		}

		$this->_totalPages = (int) ceil($this->_totalRecords / $this->_recordsPerPage);
		if ($this->_actualPage > $this->_totalPages)
			$this->_actualPage = $this->_totalPages;

		$this->_totalNavPages = (int) ceil($this->_totalPages / $this->_pagesPerNav);
		$this->_actualNavPages = (int) ceil($this->_actualPage / $this->_pagesPerNav);
		$this->_indexRecordStart = ($this->_actualPage - 1) * $this->_recordsPerPage;
		if ($this->_indexRecordStart < 0)
			$this->_indexRecordStart = 0;
		$this->_indexRecordEnd = $this->_indexRecordStart + $this->_recordsPerPage - 1;
		if ($this->_indexRecordEnd + 1  > $this->_totalRecords)
			$this->_indexRecordEnd = $this->_totalRecords - 1;
		if ($this->_indexRecordEnd < 0)
			$this->_indexRecordEnd = 0;

		if (!$smartRange){	
			$this->_indexPageStart = ($this->_actualNavPages - 1) * $this->_pagesPerNav + 1;
			$this->_indexPageEnd = $this->_actualNavPages * $this->_pagesPerNav;
			if ($this->_totalPages < $this->_indexPageEnd)
				$this->_indexPageEnd = $this->_totalPages;
		} else {
			$halfPagesOnNav = (int) ($this->_pagesPerNav / 2);
			$this->_indexPageStart = $this->_actualPage - $halfPagesOnNav;
			$rest = 0;
			if ($this->_indexPageStart < 1) {
				$rest = abs($this->_indexPageStart) + 1;
				$this->_indexPageStart = 1;
			}
			$this->_indexPageEnd = $this->_actualPage + $halfPagesOnNav + $rest;
			if ($this->_indexPageEnd > $this->_totalPages){
				$this->_indexPageStart -= ($this->_indexPageEnd - $this->_totalPages);
				if ($this->_indexPageStart < 1) $this->_indexPageStart = 1;
				$this->_indexPageEnd = $this->_totalPages;
			}
		}

		if (isset($_SESSION) && $this->_useSession)
	        $_SESSION[$this->_paramPageNumber] = $this->_actualPage;
	    $this->_toArray();
	    if ($returnArray)
	    	return $this->_array;
	    if ($externFunction)
	    	return call_user_func($externFunction, $this->_array);
	    else	
        	return $this->_toString();
    }

	/**
	 * Tworzy tablicę reprezentującą pager. Tablica składa się z następujących indexów reprezentowanych przez stałe:
	 * - _GOTO_FIRST_ - idź do pierwszej strony
	 * - _GOTO_PREV_X_ - idź do x kolejnej strony
	 * - _GOTO_PREV_ - idź do poprzedniej strony
	 * - _GOTO_NEXT_ - idź do następnej strony
	 * - _GOTO_NEXT_X_ - idź do x następnej strony
	 * - _GOTO_LAST_ - idź do ostaniej strony
	 * wartością dla powyťszych indexów jest numer strony, do której one prowadzą
	 * - _PAGES_ zawiera tablicę, której indexami są numery stron wyświetlanych w pagerze, 
	 * a wartością jest false (strona ma być linkiem) lub true (jest to aktualna strona - bez linku)
	 * - _LINK_PAGE_ - link do strony
	 * - _LINK_SEP_ - separator
	 * - _PARAM_PAGE_NUMBER_ - nazwa parametru, w której będzie numer aktualnej strony
	 * - _PAGES_PER_NAV_ - liczba stron na pasku nawigatora
	 * - _TOTAL_RECORDS_ - Ogólna liczba rekordów 
	 * @return true
	 */
	function _toArray() {
		if ($this->_indexPageStart > 1)
			$this->_array[_GOTO_FIRST_] = 1;
		if ($this->_actualPage - $this->_pagesPerNav > 0)	
			$this->_array[_GOTO_PREV_X_] = $this->_actualPage - $this->_pagesPerNav;	
		if ($this->_actualPage > 1)
			$this->_array[_GOTO_PREV_] = $this->_actualPage - 1;

		//strony
		$this->_array[_PAGES_] = array();
		for ($i = $this->_indexPageStart; $i <= $this->_indexPageEnd; $i++) {
			if ($i == $this->_actualPage)
				$this->_array[_PAGES_][$i] = true;
			else
				$this->_array[_PAGES_][$i] = false;
		}

		if ($this->_actualPage < $this->_totalPages)
			$this->_array[_GOTO_NEXT_] = $this->_actualPage + 1;	
		if ($this->_indexPageEnd < $this->_totalPages)
			$this->_array[_GOTO_LAST_] = $this->_totalPages;
		if ($this->_actualPage + $this->_pagesPerNav <= $this->_totalPages)
			$this->_array[_GOTO_NEXT_X_] = $this->_actualPage + $this->_pagesPerNav;

		
		$this->_array[_LINK_PAGE_] = $this->_linkPage;
		$this->_array[_LINK_SEP_] = $this->_linkSep;
		$this->_array[_PARAM_PAGE_NUMBER_] = $this->_paramPageNumber;
		$this->_array[_PAGES_PER_NAV_] = $this->_pagesPerNav;
		$this->_array[_TOTAL_RECORDS_] = $this->_totalRecords;
	}

	/**
	 * Zwraca string reprezentujący kod html pager'a
	 * 
	 * @return string
	 */
	function _toString() {
		
		if ($this->_totalRecords <= $this->_recordsPerPage)
			return '';
		$_str = '';
		$sep = '&#160;&#160;';
		if (isset($this->_array[_GOTO_FIRST_]))
			$_str .= $this->_createLink('Pierwsza strona', $this->_array[_GOTO_FIRST_], '|<').$sep;
		if (isset($this->_array[_GOTO_PREV_X_]))
			$_str .= $this->_createLink($this->_array[_PAGES_PER_NAV_].' stron(y) do ty�u', $this->_array[_GOTO_PREV_X_], '<<').$sep;
		if (isset($this->_array[_GOTO_PREV_]))
			$_str .= $this->_createLink('Poprzednia strona', $this->_array[_GOTO_PREV_], '<').$sep;
			
		foreach ($this->_array[_PAGES_] as $_page => $_isActual){
			if ($_isActual)
				$_str .= '<span>'.$_page.'</span>';
			else
				$_str .= $this->_createLink("Strona ".$_page, $_page, $_page);
			$_str .= $sep;
		}	
		
		if (isset($this->_array[_GOTO_NEXT_]))
			$_str .= $sep.$this->_createLink('Nast�pna strona', $this->_array[_GOTO_NEXT_], '>');
		if (isset($this->_array[_GOTO_NEXT_X_]))
			$_str .= $sep.$this->_createLink($this->_array[_PAGES_PER_NAV_].' stron(y) do przodu', $this->_array[_GOTO_NEXT_X_], '>>');
		if (isset($this->_array[_GOTO_LAST_]))
			$_str .= $sep.$this->_createLink('Ostatnia strona', $this->_array[_GOTO_LAST_], '>|');
			
		return $_str;
	}
	
	/**
	 * Generuje podany link
	 * 
	 * @param string $title tytuł linku
	 * @param int $page numer strony
	 * @param string $text text linku
	 * return string
	 */
	function _createLink($title, $page, $text) {
		return '<a title="'.$title.'" href="'.
		($this->_userWholeLink ? str_replace('#PAGE#', $page, $this->_linkPage) : ($this->_linkPage.$this->_linkSep.$this->_paramPageNumber.'='.$page)).(($_GET['szukaj']!='') ? '&szukaj='.$_GET['szukaj'] : ''). '">'
		.$text.'</a>';
	}
}
?>
