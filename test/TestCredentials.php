<?php

/**
 * FellowshipOne PHPUnit TestCase
 *
 * @package     HillSongUK_PHPUnit
 * @copyright   Copyright (c) 2011 Ibuildings. (http://www.ibuildings.com)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * @author      Bolaji Olubajo <toluolubajo@gmail.com
 * @version     $Id$
 */

/**
 * PHPUnit_Framework_FellowshipOne_TestCase
 *
 * @package     HillSongUK_PHPUnit
 * @subpackage  HillSongUK_PHPUnit_TestCase
 * @uses        PHPUnit_Framework_TestCase
 */
class HillSongUK_PHPUnit_TestCase extends PHPUnit_Framework_TestCase
{

    protected $_settings;
    protected $_configFile = '../libs/config.ini';

    public function testLogin()
    {
        $f1 = new FellowshipOne($this->_settings);
        $this->assertTrue($f1->login());
    }

    public function testConfig()
    {
        $this->assertNotEmpty($this->_settings);
        $this->assertNotEmpty($this->_settings['base_url']);
        $this->assertNotEmpty($this->_settings['key']);
    }

    public function setUp()
    {
        include_once '../libs/OAuth.php';
        include_once('../libs/FellowshipOne.php');
        $this->_settings = parse_ini_file($this->_configFile);
        parent::setUp();
    }

}