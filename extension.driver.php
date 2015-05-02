<?php

class extension_timeparams extends Extension {
	public function about() {
		return array(
			'name' => 'TimeParams',
			'version' => '0.1',
			'release-date' => '2013-08-13',
			'author' => array(
				'name' => 'Kyle McGuire',
				'website' => 'http://kymcism.com/',
				'email' => 'kyle@kymcism.com'
			)
		);
	}

	public function getSubscribedDelegates() {
		return array(
			array(
				'page' => '/frontend/',
				'delegate' => 'FrontendParamsResolve',
				'callback' => 'addParam'
			),
		);
	}

	public function addParam(&$context) {
		$context['params']['next-year'] = date('Y')+1;
		$context['params']['unix-now'] = time();
		$context['params']['last-year'] = date('Y')-1;
		$context['params']['tomorrow'] = substr(date('c', time()+24*60*60), 0, 10);
		$context['params']['today-plus-3'] = substr(date('c', time()+3*24*60*60), 0, 10);
		$context['params']['today-minus-3'] = substr(date('c', time()-3*24*60*60), 0, 10);
	}

}
