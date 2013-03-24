<?php

class FellowshipOne_Groups
{

    protected $_settings;
    protected $_paths;
    protected $_groups;
    protected $_groupMembers;
    protected $_groupTypes;
    protected $_f1;
    protected $_trueResourcePath = array();

    const ENTITY_NAME = 'groups';

    public function __construct($fellowshipOne)
    {
        $this->_f1 = $fellowshipOne;
        $settings = $fellowshipOne->getOAuthConsumer()->getSettings();
        $this->_settings = $settings;
        $this->_f1->addPaths(self::ENTITY_NAME, array(
            'grouptypes' => '/v1/grouptypes.json',
            'groups' => "/v1/grouptypes/{id}/groups.json",
            'members' => '/v1/groups/{group_id}/members.json',
            'new_member' => '/v1/groups/{id}/members/new.json',
        ));
        $this->_setTrueResourcePaths();
    }

    public function getPaths()
    {
        return $this->_f1->getPaths();
    }

    protected function _setTrueResourcePaths()
    {
        $paths = $this->getPaths();
        foreach ($paths[self::ENTITY_NAME] as $key => $path) {
            $this->_trueResourcePath[$key] = $this->_settings->base_url . '/' . self::ENTITY_NAME . $path;
        }
        return $this->_trueResourcePath;
    }

    public function getGroups($groupTypeId)
    {
        return $this->_f1->fetchGetJson(str_replace('{id}', $groupTypeId, $this->_trueResourcePath['groups']));
    }

    public function getMembers($groupId)
    {
        $rawData = $this->_f1->fetchGetJson(str_replace('{group_id}', $groupId, $this->_trueResourcePath['members']));
        $filteredData = array();
        if (!empty($rawData) && isset($rawData['members']['member'])) {
            foreach ($rawData['members']['member'] as $member) {
                $filteredData[$member['person']['@id']] = $member['person']['name'];
            }
        }
        if (!empty($filteredData)) {
            return $filteredData;
        }
        return $rawData;
    }
    public function createMember($groupId, $personData)
    {
        $memberDummy = $this->_f1->fetchGetJson(str_replace('{id}', $groupId, $this->_trueResourcePath['new_member']));
        $memberDummy['member']['group']['@id'] = $groupId;
        $memberDummy['member']['person']['@id'] = $personData['person']['@id'];
        $memberDummy['member']['createdByPerson']['@id'] = $personData['createdBy'];
        $memberDummy['member']['memberType']['@id'] = 2;
        $model = json_encode($memberDummy);
        return $this->_f1->fetchPostJson(str_replace('{group_id}', $groupId, $this->_trueResourcePath['members']), $model);
    }

    protected function _initGroupTypes()
    {
        $this->_f1->login();
        if (!$this->_groupMembers) {
            $groupTypesData = $this->_f1->fetchGetJson($this->_trueResourcePath['grouptypes']);
            $groups = array();
            $groupTypes = array();
            if ($groupTypesData) {
                foreach ($groupTypesData['groupTypes']['groupType'] as $groupTypeData) {
                    $groupTypes[$groupTypeData['@id']] = $this->getGroups($groupTypeData['@id']);
                }
                if (isset($groupTypes)) {
                    $this->_groupTypes = $groupTypes;
                }
                if (isset($groupTypes) && is_array($groupTypes)) {
                    foreach ($groupTypes as $key => $groupData) {
                        foreach ($groupData['groups']['group'] as $group) {
                            $groups[$group['@id']] = $group;
                            $groups['@id']['groupTypeId'] = $key;
                            $this->_groups = $groups;
                        }
                        if (isset($groups)) {
                            foreach ($groups as $id => $data) {
                                $groups[$id] = $this->getMembers($id);
                            }
                        }
                        if (isset($groups)) {
                            $this->_groupMembers = $groups;
                        }
                    }
                }
            }
        }
    }

    public function getGroupsData()
    {
        $this->_initGroupTypes();
        return $this->_groups;
    }

    public function getGroupsTypesData()
    {
        $this->_initGroupTypes();
        return $this->_groupTypes;
    }

    public function getGroupsMemberData()
    {
        $this->_initGroupTypes();
        return $this->_groupMembers;
    }

    public function getGroupMembersJson()
    {
        $data = $this->getGroupsMemberData();
        $newData = array();
        if ($data) {
            foreach ($data as $key => $value) {
                if (!empty($value)) {
                    foreach ($value['members']['member'] as $member) {
                        $newData[$key][] = $member['person']['@id'];
                        $newData[$key][] = $member['person']['name'];
                    }
                }
            }
        }
        if (isset($newData)) {
            return json_encode($newData);
        }
    }

}