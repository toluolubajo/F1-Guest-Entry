<?php

/**
 * FellowshipOne PHPUnit TestCase
 *
 * @package     HillSongUK_PHPUnit
 * @copyright   Copyright (c) 2011 Bolubajo. 
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
    protected $_configFile = '../lib/config.ini';
    protected $_f1;
    protected $_group;

    /**
     * 
     */
    public function testGroupTypes()
    {
        $data = $this->_f1->getGroupsTypesData();
        $this->assertNotEmpty($data);
    }

    public function testGroups()
    {
        $this->assertNotEmpty($this->_f1->getGroupsData());
    }

    public function testGroupsMemberData()
    {
        $this->assertNotEmpty($this->_f1->getGroupsMemberData());
    }

    public function testGroupMembersJson()
    {
        $this->assertNotEmpty($this->_f1->getGroupMembersJson());
    }

    public function testConfig()
    {
        $this->assertNotEmpty($this->_settings);
        $this->assertNotEmpty($this->_settings['base_url']);
        $this->assertNotEmpty($this->_settings['key']);
    }

    public function setUp()
    {
        set_include_path(".." . DIRECTORY_SEPARATOR . 'lib');
        include_once ".." . DIRECTORY_SEPARATOR . "lib" . DIRECTORY_SEPARATOR . "Autoloader.php";
        Autoloader::register();
        $this->_settings = parse_ini_file($this->_configFile);
        $this->_f1 = new FellowshipOne($this->_settings);
        $this->_f1->login();
        $this->_group = new FellowshipOne_Groups($this->_settings);
        parent::setUp();
    }

}