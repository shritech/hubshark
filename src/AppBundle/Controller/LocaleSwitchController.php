<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * Description of LocaleSwitchController
 *
 * @author Shrinivas
 */
class LocaleSwitchController extends Controller {
 
	/**
	 * @Route("/switchenglish", name="switch_language_english")
	 */
	public function switchLanguageEnglishAction() {
		return $this->switchLanguage('en');
	}
	
	/**
	 * @Route("/switchgerman", name="switch_language_german")
	 */	
	public function switchLanguageGermanAction() {
		return $this->switchLanguage('de');
	}
	
	private function switchLanguage($locale) {
		$this->get('session')->set('_locale', $locale);
		return $this->redirect($this->generateUrl('app_homepage'));
	}
	
}