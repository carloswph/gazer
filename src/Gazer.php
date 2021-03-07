<?php

namespace Gazer;

abstract class Gazer implements \SplObserver {

	protected $subject;

	/**
     * Listens to the class which implements \SplSubject
     * @param SplSubject $subject
     * @return void
     */
	public function update(\SplSubject $subject)
    {
    	$this->subject = $subject;
    }
}