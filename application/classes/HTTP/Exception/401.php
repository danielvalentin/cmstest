<?php defined('SYSPATH') OR die('No direct script access.');

class HTTP_Exception_401 extends Kohana_HTTP_Exception_401 {

	/**
	 * @var   integer    HTTP 401 Unauthorized
	 */
	protected $_code = 401;

	/**
	 * Specifies the WWW-Authenticate challenge.
	 *
	 * @param  string  $challenge  WWW-Authenticate challenge (eg `Basic realm="Control Panel"`)
	 */
	public function authenticate($challenge = NULL)
	{
		if ($challenge === NULL)
			return $this->headers('www-authenticate');

		$this->headers('www-authenticate', $challenge);

		return $this;
	}

	/**
	 * Validate this exception contains everything needed to continue.
	 *
	 * @throws Kohana_Exception
	 * @return bool
	 */
	public function check()
	{
		if ($this->headers('www-authenticate') === NULL)
			throw new Kohana_Exception('You are not authorized to view this resource');

		return TRUE;
	}

}
