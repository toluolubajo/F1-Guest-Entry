<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>HillSong London - Guest Entry Form</title>
        <link type="text/css" rel="stylesheet" href="style.css">
        <meta http-equiv="content-type" content="text/html; charset=utf-8">
        <meta name="description" content="">
        <meta name="author" content="Bolaji Olubajo">
        <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
        <link rel="shortcut icon" href="../images/favicon.png" type="image/x-icon">
    </head>
    <body>
        <header>
            <img src="../images/logo-gray.gif" alt="HillSong London" title="HillSong London"/>
        </header>
        <div>
            <div class="custom-form">
                <form id="addPerson" name="addPerson" method="post" enctype="multipart/form-data" action="../create.php">
                    <table class="table" width="700" border="1" cellpadding="2">
                        <tr>
                            <td><label>First Name:</label></td>
                            <td><input type="text" name="firstName" id="firstName" /></td>
                            <td rowspan="8"><img src="../images/gravatar.png" width="240" height="240" alt="placeholder"></td>
                        </tr>
                        <tr>
                            <td><label>Last Name:</label></td>
                            <td><input type="text" name="lastName" id="lastName" /></td>
                        </tr>
                        <tr>
                            <td><label>Household Position:</label></td>
                            <td><select name="householdPosition" id="householdPosition">
                                    <option value="Head" id="1" selected="selected">Head</option>
                                    <option value="Spouse">Spouse</option>
                                    <option value="Child">Child</option>
                                </select></td>
                        </tr>
                        <tr>
                            <td><label>Gender:</label></td>
                            <td><select name="gender" id="gender">
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select></td>
                        </tr>
                        <tr>
                            <td><label>Marital Status:</label></td>
                            <td><select name="maritalStatus" id="maritalStatus">
                                    <option value="Child/Yth">Child/Youth</option>
                                    <option value="Divorced">Divorced</option>
                                    <option value="Married">Married</option>
                                    <option value="Separated">Separated</option>
                                    <option value="Single">Single</option>
                                    <option value="Widow">Widow</option>
                                    <option value="Widower">Widower</option>
                                </select></td>
                        </tr>
                        <tr>
                            <td><label>Date of Birth:</label></td>
                            <td><select name="month" id="month">
                                    <option value="1">Jan</option>
                                    <option value="2">Feb</option>
                                    <option value="3">Mar</option>
                                    <option value="4">Apr</option>
                                    <option value="5">May</option>
                                    <option value="6">June</option>
                                    <option value="7">July</option>
                                    <option value="8">Aug</option>
                                    <option value="9">Sep</option>
                                    <option value="10">Oct</option>
                                    <option value="11">Nov</option>
                                    <option value="12">Dec</option>
                                </select>
                                <select name="day" id="day">
                                    <option>01</option>
                                    <option>02</option>
                                    <option>03</option>
                                    <option>04</option>
                                    <option>05</option>
                                    <option>06</option>
                                    <option>07</option>
                                    <option>08</option>
                                    <option>09</option>
                                    <option>10</option>
                                    <option>11</option>
                                    <option>12</option>
                                    <option>13</option>
                                    <option>14</option>
                                    <option>15</option>
                                    <option>16</option>
                                    <option>17</option>
                                    <option>18</option>
                                    <option>19</option>
                                    <option>20</option>
                                    <option>21</option>
                                    <option>22</option>
                                    <option>23</option>
                                    <option>24</option>
                                    <option>25</option>
                                    <option>26</option>
                                    <option>27</option>
                                    <option>28</option>
                                    <option>29</option>
                                    <option>30</option>
                                    <option>31</option>
                                </select>
                                <select name="year" id="year">
                                    <option>1973</option>
                                    <option>1974</option>
                                    <option>1975</option>
                                    <option>1976</option>
                                    <option>1977</option>
                                    <option>1978</option>
                                    <option>1979</option>
                                    <option>1980</option>
                                    <option>1981</option>
                                    <option>1982</option>
                                    <option>1982</option>
                                    <option>1983</option>
                                    <option>1984</option>
                                    <option>1985</option>
                                    <option>1986</option>
                                    <option>1987</option>
                                    <option>1988</option>
                                    <option>1989</option>
                                    <option>1990</option>
                                    <option>1991</option>
                                    <option>1992</option>
                                    <option>1993</option>
                                    <option>1994</option>
                                    <option>1995</option>
                                    <option>1996</option>
                                    <option>1997</option>
                                    <option>1998</option>
                                    <option>1999</option>
                                    <option>2000</option>
                                    <option>2001</option>
                                    <option>2002</option>
                                    <option>2003</option>
                                    <option>2004</option>
                                    <option>2005</option>
                                    <option>2006</option>
                                    <option>2007</option>
                                    <option>2008</option>
                                    <option>2009</option>
                                    <option>2010</option>
                                </select></td>
                        </tr>
                        <tr>
                            <td>Primary Phone:</td>
                            <td><input type="text" name="primaryPhone" id="primaryPhone" /></td>
                        </tr>
                        <tr>
                            <td><label>Email:</label></td>
                            <td><input type="text" name="email" id="email" /></td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td><input type="file" name="image" id="image" style="margin-left:50px"/></td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td><input type="submit" name="submit"></td>
                            <td>&nbsp;</td>
                        </tr>
                    </table>
                </form> 
            </div>
        </div>
        <?php
        // put your code here
        ?>
    </body>
</html>
