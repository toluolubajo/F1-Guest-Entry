<?php
require_once('../lib/config.php');
//instantiate the f1 class
$groupModel = new FellowshipOne_Groups($f1);
$leadersData = $groupModel->getMembers($config['new_christians_leader_group_id']);
?>
<?php if (isset($_POST['formSubmitted'])): ?>
    <?php include_once 'create.php'; ?>
<?php endif; ?>

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
                    <div> 
                        <p id="successMessage"><?php echo $successMessage ?></p>
                        <p id="ErrorMessage"><?php echo $errorMessage ?></p> 
                    </div>
                    <form id="addPerson" name="addPerson" method="post" enctype="multipart/form-data">
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
                                    <option value="Visitor">Visitor</option>
                                    <option value="Other">Other (extended family)</option>
                                </select>
                            </div>
                            <div class="rowElem">
                                <label for="gender">Gender:</label>
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
                                <label for="registeredBy">Registered by:</label>
                                <?php if ($leadersData): ?>
                                    <select class="validate-select" name="registeredBy" id="registeredBy">
                                        <option></option>
                                        <?php
                                        foreach ($leadersData as $id => $name) {
                                            echo "<option value='{$id}'>{$name}</option>";
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
                        <input type="hidden" name="formSubmitted" value="1"/>
                    </form> 
                </div>
            </div>
        </div>
        <script type="text/javascript">
            var addPerson = new VarienForm('addPerson');
        </script>
    </body>
</html>
