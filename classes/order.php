<?php

/**
 * The Order class represents a single order
 * at Rice Rice Baby.
 * @author Charlie Tang, Mark Pesqueira
 * @date June 15, 2023
 * @version 1.1
 */
class Order
{
    private $_arborio;
    private $_black;
    private $_basmati;
    private $_brown;
    private $_jasmine;
    private $_sticky;
    private $_white;

    /**
     * Default constructor for Orders
     */
    function __construct($arborio = 0, $black = 0, $basmati = 0, $brown = 0, $jasmine = 0, $sticky = 0, $white = 0)
    {
        $this->_arborio = $arborio;
        $this->black = $black;
        $this->_basmati = $basmati;
        $this->_brown = $brown;
        $this->_jasmine = $jasmine;
        $this->_sticky = $sticky;
        $this->_white = $white;
    }

    /**
     * Set arborio
     * @param int $arborio
     */
    public function setArborio ($arborio)
    {
        $this->_arborio = $arborio;
    }

    /**
     * Set black
     * @param int $black
     */
    public function setBlack ($black)
    {
        $this->_black= $black;
    }

    /**
     * Set basmati
     * @param int $basmati
     */
    public function setBasmati ($basmati)
    {
        $this->_basmati = $basmati;
    }

    /**
     * Set brown
     * @param int $brown
     */
    public function setBrown ($brown)
    {
        $this->_brown = $brown;
    }

    /**
     * Set jasmine
     * @param int $jasmine
     */
    public function setJasmine ($jasmine)
    {
        $this->_jasmine = $jasmine;
    }

    /**
     * Set sticky
     * @param int $sticky
     */
    public function setSticky ($sticky)
    {
        $this->_sticky = $sticky;
    }

    /**
     * Set white
     * @param int $white
     */
    public function setWhite ($white)
    {
        $this->_white = $white;
    }

    /**
     * Get arborio quantity
     * @return int quantity
     */
    public function getArborio ()
    {
        return $this->_arborio;
    }

    /**
     * Get black quantity
     * @return int quantity
     */
    public function getBlack ()
    {
        return $this->_black;
    }

    /**
     * Get brown quantity
     * @return int quantity
     */
    public function getBrown ()
    {
        return $this->_brown;
    }

    /**
     * Get basmati quantity
     * @return int quantity
     */
    public function getBasmati ()
    {
        return $this->_basmati;
    }

    /**
     * Get jasmine quantity
     * @return int quantity
     */
    public function getJasmine ()
    {
        return $this->_jasmine;
    }

    /**
     * Get sticky quantity
     * @return int quantity
     */
    public function getSticky ()
    {
        return $this->_sticky;
    }

    /**
     * Get white quantity
     * @return int quantity
     */
    public function getWhite()
    {
        return $this->_white;
    }

}