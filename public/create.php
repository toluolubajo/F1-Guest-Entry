<?php
$groupModel = new FellowshipOne_Groups($f1);
//Get F1 Household json model
try {
    $model = $f1->householdModel;

//Update model with form info

    $model['household']['householdName'] = $_POST['firstName'] . ' ' . $_POST['lastName'];
    $model['household']['householdSortName'] = $_POST['lastName'];
    $model['household']['householdFirstName'] = $_POST['firstName'];

//Create Household in F1
    $results = $f1->createHousehold($model);

//Create a person in the household we just created
//First determine household position

    $householdPosition = $_POST['householdPosition'];

    if ($householdPosition == "Head") {
        $householdMemberType = "1";
    } elseif ($householdPosition == "Spouse") {
        $householdMemberType = "2";
    } else {
        $householdMemberType = "3";
    }

    $today = new DateTime('now');

//Get the F1 Person json model
    $model = $f1->personModel;

//Update the person model with the form info

    $model['person']['@householdID'] = $results['household']['@id'];
    $model['person']['firstName'] = $_POST['firstName'];
    $model['person']['lastName'] = $_POST['lastName'];
    $model['person']['gender'] = $_POST['gender'];
    $model['person']['dateOfBirth'] = date(DATE_ATOM, mktime(0, 0, 0, $_POST['month'], $_POST['day'], $_POST['year']));
    $model['person']['maritalStatus'] = $_POST['maritalStatus'];
    $model['person']['householdMemberType']['@id'] = $householdMemberType;
    $model['person']['householdMemberType']['name'] = $householdPosition;
    $model['person']['status']['@id'] = '110';
    $model['person']['status']['date'] = $today->format(DATE_ATOM);
    $model['person']['defaultTagComment'] = '';


//Write the person in the household into F1
    $r = $f1->createPerson($model);
    $my_settings = $f1->getOAuthConsumer()->getSettings();

//Add Person to New Christian Group
    $r['createdBy'] = $_POST['registeredBy'];
    $r1 = $groupModel->createMember($my_settings->new_christians_group_id, $r);

//Store the personID	
    $personID = $r['person']['@id'];

//get the communications json model from F1
    $model = $f1->getCommunicationModel($personID);

//Update the json model with the email address
    $model['communication']['communicationType']['@id'] = "4";
    $model['communication']['communicationType']['name'] = "email";
    $model['communication']['communicationValue'] = $_POST['email'];

//Write the email communication into F1
    $r = $f1->createCommunication($model, $personID);

//Update the json model with the telephone info
    $model['communication']['communicationType']['@id'] = "1";
    $model['communication']['communicationType']['name'] = "telephone";
    $model['communication']['communicationValue'] = $_POST['primaryPhone'];

//Write the telephone value into F1
    $r = $f1->createCommunication($model, $personID);
} catch (Exception $e) {
    $errorMessage = $e->getMessage();
}
if (empty($errorMessage)) {
    $successMessage = 'Form submitted Successfully!!!';
}
?>