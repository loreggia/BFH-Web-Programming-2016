<?php
class Form {
	
	private $prefix;
	private $elements;
	private $information;
	private $countryStore;
	private $method;
	private $action;
	private $hidden;
	
	function __construct($method, $action, $prefix, $hidden = array(), $elements = array(), $information = array(), $countryStore){
		$this->prefix = $prefix;
		$this->elements = $elements;
		$this->information = $information;
		$this->countryStore = $countryStore;
		$this->method = $method;
		$this->action = $action;
		$this->hidden = $hidden;
	}
	
	public function generateForm(){
		$form = ("<form method=\"".$this->method."\" action=\"".$this->action."\">");
		$form .= $this->getHidden();
		$form .= "<ul>";
		
		foreach($this->elements as $element){
			$form .= $this->getElement($element);
		}
		$form .= "</ul><p class='formInfo'>". getLangText("formInfo")."</p></form>";
		return $form;
	}
	
	private function getElement($element){
		if($element == "salutation"){
			$isMale = ($this->information['salutation'] == 'mr') ? "selected" : "";
			$isFemale = ($this->information['salutation'] == 'ms') ? "selected" : "";
			return("
			<li>
				<label for=\"".$this->prefix."-salutation\">".getLangText("salutation")."*</label>
				<select name=\"salutation\" id=\"".$this->prefix."-salutation\">
					<option value=\"mr\" ".$isMale.">". getLangText("mr")."</option>
					<option value=\"ms\" ".$isFemale.">". getLangText("ms")."</option>
				</select>
			</li>");
		}
		
		elseif($element == "company"){
			return("<li>
				<label for=\"".$this->prefix."-company\">". getLangText("company")."</label>
				<input type=\"text\" name=\"company\" id=\"".$this->prefix."-company\" value=\"".$this->information["company"]."\" />
			</li>");
		}
		elseif($element == "department"){
			return("<li>
				<label for=\"".$this->prefix."-department\">".getLangText("department")."</label>
				<input type=\"text\" name=\"department\" id=\"".$this->prefix."-department\" value=\"".$this->information["department"]."\" />
			</li>");
		}
		elseif($element == "firstname"){
			return("<li id=\"".$this->prefix."-name\">
				<label for=\"".$this->prefix."-name\">".getLangText("firstname")."*</label>
				<input type=\"text\" name=\"name\" id=\"".$this->prefix."-name\" value=\"".$this->information["firstname"]."\" />
				<mark>".pleaseEnter("firstname")."</mark>
			</li>");
		}
		elseif($element == "lastname"){
			return("<li id=\"".$this->prefix."-lastname\">
				<label for=\"".$this->prefix."-lastname\">".getLangText("lastname")."*</label>
				<input type=\"text\" name=\"lastname\" id=\"".$this->prefix."-lastname\" value=\"".$this->information["lastname"]."\" />
				<mark>".pleaseEnter("lastname")."</mark>
			</li>");
		}
		elseif($element == "street"){
		return("<li id=\"".$this->prefix."-street\">
				<label for=\"".$this->prefix."-street\">".getLangText("street")."*</label>
				<input type=\"text\" name=\"street\" id=\"".$this->prefix."-street\" value=\"".$this->information["street"]."\" />
				<mark>".pleaseEnter("street")."</mark>
			</li>");
		}
		elseif($element == "zip"){
			return("<li id=\"".$this->prefix."-zip\">
				<label for=\"".$this->prefix."-zip\">".getLangText("zip")."*</label>
				<input type=\"text\" name=\"zip\" id=\"".$this->prefix."-zip\" value=\"".$this->information["zipcode"]."\" />
				<mark>".pleaseEnter("zip")."</mark>
			</li>");
		}
		elseif($element == "city"){
			return("<li id=\"".$this->prefix."-city\">
				<label for=\"".$this->prefix."-city\">".getLangText("city")."*</label>
				<input type=\"text\" name=\"city\" id=\"".$this->prefix."-city\" value=\"".$this->information["city"]."\" />
				<mark>".pleaseEnter("city")."</mark>
			</li>");
		}
		elseif($element == "country"){
			$countries = $this->countryStore->getCountries();
			$returner = ("<li id=\"".$this->prefix."-country\">
				<label for=\"".$this->prefix."-country\">".getLangText("country")."*</label>
				<select name=\"country\" id=\"".$this->prefix."-country\">");
			foreach($countries as $country){
				$selected = ($this->information['country_id'] == $country['country_id']) ? "selected" : "";
				$returner .= ('<option value="'.$this->information['country_id'].'" '.$selected.'>'.getRowText($country, "name").'</option>');
			}
			$returner .= ("
					</select>
				</li>");
			return $returner;
		}
		elseif($element == "additional1"){
			return("<li>
				<label for=\"".$this->prefix."-additional1\">".getLangText("additional1")."</label>
				<input type=\"text\" name=\"additional1\" id=\"".$this->prefix."-additional1\" value=\"".$this->information["additional_address_line1"]."\" />
			</li>");
		}
		elseif($element == "additional2"){
			return("<li>
				<label for=\"".$this->prefix."-additional2\">".getLangText("additional2")."</label>
				<input type=\"text\" name=\"additional2\" id=\"".$this->prefix."-additional2\" value=\"".$this->information["additional_address_line2"]."\" />
			</li>");
		}
		elseif($element == "email"){
			return("<li id=\"".$this->prefix."-email\">
				<label for=\"".$this->prefix."-email\">".getLangText("email")."*</label>
				<input type=\"text\" name=\"email\" id=\"".$this->prefix."-email\" value=\"".$this->information["email"]."\" />
				<mark>".pleaseEnter("email")."</mark>
			</li>");
		}
		elseif($element == "password"){
			return("<li id=\"".$this->prefix."-password\">
				<label for=\"".$this->prefix."-password\">".getLangText("password")."*</label>
				<input type=\"password\" name=\"password\" id=\"".$this->prefix."-password\" value=\"\" />
				<mark>".pleaseEnter("password")."</mark>
			</li>");
		}
		elseif($element == "passwordOld"){
			return("<li id=\"".$this->prefix."-passwordOld\">
				<label for=\"".$this->prefix."-password-old\">".getLangText("password_old")."*</label>
				<input type=\"password\" name=\"password\" id=\"".$this->prefix."-password-old\" value=\"\" />
				<mark>".pleaseEnter("password")."</mark>
			</li>");
		}
		elseif($element == "passwordNew"){
			return("<li id=\"".$this->prefix."-passwordNew\">
				<label for=\"".$this->prefix."-password-new\">".getLangText("password_new")."*</label>
				<input type=\"password\" name=\"password-new\" id=\"".$this->prefix."-password-new\" value=\"\" />
				<mark>".pleaseEnter("password")."</mark>
			</li>");
		}
		elseif($element == "newsletter"){
			$isNewsletter = ($this->information['newsletter'] == 1) ? "checked" : "";
			return("<li>
				<label>".getLangText("newsletter1")."</label>
				<input type=\"checkbox\" name=\"newsletter\" id=\"".$this->prefix."-newsletter\" value=\"1\" ".$isNewsletter." /><label for=\"".$this->prefix."-newsletter\">".getLangText("newsletter2")."</label>
			</li>");
		}
		elseif($element == "submit"){
			return("<li id=\"".$this->prefix."-submit\">
				<input type=\"submit\" value=\"".getLangText("send")."\" />
			</li>");
		}
		else{
			return $element." was not found";
		}
	}
	
	private function getHidden(){
		$returner = "";
		foreach ($this->hidden as $hiddens){
			$returner .= ("<input type=\"hidden\" name=\"".$hiddens[0]."\" value=\"".$hiddens[1]."\"/>");
		}
		return $returner;
	}
}