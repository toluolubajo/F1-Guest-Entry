<?php

class FellowshipOne_Groups
{

    protected $_settings;
    protected $_paths;

    const ENTITY_NAME = 'groups';

    public function __construct($settings)
    {
        $this->_settings            = (object) $settings;
        $this->_settings->base_url .= '/' . self::ENTITY_NAME;
        $this->_paths = array(
            'groups' => array(
                'grouptypes'    => '/v1/grouptypes',
                'groups'        => '/v1/grouptypes/{id}/groups',
                'members'       => '/v1/groups/{group_id}/members'
        ));
    }

    public function getGroupTypesUrl()
    {
        return $this->_settings->base_url . $this->_paths['groups']['grouptypes'] . ".json";
    }

    public function getGroupsUrl()
    {
        return $this->_settings->base_url . $this->_paths['groups']['groups'] . ".json";
    }

    public function getGroupMembersUrl()
    {
        return $this->_settings->base_url . $this->_paths['groups']['members'] . ".json";
    }

}