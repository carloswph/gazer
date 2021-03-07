<?php

namespace Gazer;

abstract class Subject implements \SplSubject {

	protected $observers = [];

	/**
     * Add an observer to $this->observers so we can cycle through them later
     * @param SplObserver $observer
     * @return self
     */
    public function attach(\SplObserver $observer)
    {
        $key = spl_object_hash($observer);
        $this->observers[$key] = $observer;
        return $this;
    }
    /**
     * Remove an observer from $this->observers
     * @param SplObserver $observer
     */
    public function detach(\SplObserver $observer)
    {
        $key = spl_object_hash($observer);
        unset($this->observers[$key]);
    }

    /**
     * Go through all of the $this->observers and fire the ->update() method.
     *
     * @return mixed
     */
    public function notify()
    {
        /** @var SplObserver $observer */
        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }

}