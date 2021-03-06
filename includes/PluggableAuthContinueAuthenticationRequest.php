<?php

use \MediaWiki\Auth\AuthenticationRequest;
use \MediaWiki\Auth\AuthManager;

class PluggableAuthContinueAuthenticationRequest extends AuthenticationRequest {

	public function getFieldInfo() {
		return [];
	}

	public function loadFromSubmission( array $data ) {
		$authManager = AuthManager::singleton();
		$error = $authManager->getAuthenticationSessionData(
			PluggableAuthLogin::ERROR_SESSION_KEY );
		if ( is_null( $error ) ) {
			$this->username = $authManager->getAuthenticationSessionData(
				PluggableAuthLogin::USERNAME_SESSION_KEY );
			$authManager->removeAuthenticationSessionData(
				PluggableAuthLogin::USERNAME_SESSION_KEY );
		}
		return true;
	}
}
