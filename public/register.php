<?php
require('../lib/FellowshipOne.php');
require('../lib/FellowshipOne/Groups.php');
$config = parse_ini_file('../lib/config.ini');

//instantiate the f1 class
$groupModel = new FellowshipOne_Groups($config);
if (!$config) {
    die("Wrong configuration file or settings");
}
$f1 = new FellowshipOne($config);
if (($r = $f1->login()) === false) {
    die("Failed to login");
}
$groupData = $f1->fetchGetJson($groupModel->getListUrl())
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>HillSong London - Guest Entry Registration</title>
        <link type="text/css" rel="stylesheet" href="../css/style.css">
        <meta http-equiv="content-type" content="text/html; charset=utf-8">
        <meta name="description" content="">
        <meta name="author" content="Bolaji Olubajo">
        <script type="text/javascript" src="../js/prototype.js"></script>
        <script type="text/javascript" src="../js/validation.js"></script>
        <script type="text/javascript" src="../js/form.js"></script>
        <script type="text/javascript" src="../js/effects.js"></script>
        <link rel="shortcut icon" href="../images/favicon.png" type="image/x-icon">
    </head>
    <body>
        <div class="center">
            <div class="main">
                <h2>Registration</h2>
                <div class="custom-form">
                    <form id="addPerson" name="addPerson" method="post" enctype="multipart/form-data" action="create.php">
                        <div id="personInfo1" class="personInfo">
                            <div class="rowElem">
                                <label for="firstName">*First Name:</label>
                                <input class="required-entry validate-alpha" type="text" name="firstName" id="firstName" />
                            </div>
                            <div class="rowElem">
                                <label for="lastName">*Last Name:</label>
                                <input class="required-entry validate-alpha" type="text" name="lastName" id="lastName" />
                            </div>
                            <div class="rowElem">
                                <label for="householdPosition">Household Position:</label>
                                <select class="validate-select" name="householdPosition" id="householdPosition">
                                    <option></option>
                                    <option value="Head" id="1" selected="selected">Head</option>
                                    <option value="Spouse">Spouse</option>
                                    <option value="Child">Child</option>
                                </select>
                            </div>
                            <div class="rowElem">
                                <label for="gender">Last Name:</label>
                                <select class="validate-select" name="gender" id="gender">
                                    <option></option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                            <div class="rowElem">
                                <label for="maritalStatus">Marital Status:</label>
                                <select class="validate-select" name="maritalStatus" id="maritalStatus">
                                    <option></option>
                                    <option value="Child/Yth">Child/Youth</option>
                                    <option value="Divorced">Divorced</option>
                                    <option value="Married">Married</option>
                                    <option value="Separated">Separated</option>
                                    <option value="Single">Single</option>
                                    <option value="Widow">Widow</option>
                                    <option value="Widower">Widower</option>
                                </select>
                            </div>
                            <?php
                            $months = array('Jan', 'Feb', 'Mar', 'Apr', 'May', 'June', 'July',
                                'Aug', 'Sep', 'Oct', 'Nov', 'Dec');
                            $i = 1;
                            ?>
                            <div class="rowElem">
                                <label for="month">Date of Birth</label>
                                <select class="validate-select" name="month" id="month">
                                    <option>Month</option>
                                    <?php foreach ($months as $month): ?>
                                        <option value="<?php echo $i; ?>"><?php echo $month; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <select class="validate-select" name="day" id="day">
                                    <option>Day</option>
                                    <?php for ($j = 1; $j <= 31; $j++) { ?>
                                        <option value="<?php echo $j; ?>"><?php echo $j; ?></option>
                                    <?php } ?>
                                </select>
                                <select class="validate-select" name="year" id="year">
                                    <option>Year</option>
                                    <?php for ($j = 1973; $j <= 2010; $j++) { ?>
                                        <option value="<?php echo $j; ?>"><?php echo $j; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="rowElem">
                                <label for="primaryPhone">Primary Phone:</label>
                                <input class="validate-number" type="text" name="primaryPhone" id="primaryPhone" />
                            </div>
                            <div class="rowElem">
                                <label for="email">Email:</label>
                                <input class="validate-email" type="text" name="email" id="email" />
                            </div>
                            <div class="rowElem">
                                <label for="groups">Group:</label>
                                <?php if ($groupData): ?>
                                    <select class="validate-select" name="groups" id="groups">
                                        <option>Group</option>
                                        <?php
                                        foreach ($groupData['groupTypes']['groupType'] as $group) {
                                            echo "<option value='{$group['@id']}'>{$group['name']}</option>";
                                        }
                                        ?>
                                    </select>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="rowElem" style="padding-left: 118px;">
                            <label style="width: 255px;"><button   class="button white" type="submit">Back</button></label>
                            <button  class="button white" type="submit">Submit</button>
                        </div>
                    </form> 
                </div>
            </div>
        </div>
        <script type="text/javascript">
            var addPerson = new VarienForm('addPerson');
        </script>
    </body>
</html>
