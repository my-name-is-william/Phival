<!-- Programmer: Junjie Zhao -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rating The Photo</title>
    <style>
        
        body {
            display: flex;
            flex-direction: column; 
            align-items: center;
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            padding: 20px;
            height: 100vh;
            overflow-y: auto;
        }
        .form-super-container{
            display: flex;
            flex-direction: column; 
            align-items: center;
        }
        
        .form-title-container{
            display: flex;
            flex-direction: column; 
            align-items: center;
            padding-top: 10px;
            padding-bottom: 10px;
            padding-left: 50px;
            padding-right: 50px;
            background: #fff;
            border-radius: 50px;
            margin-bottom: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .form-container {
            display: flex;
            flex-direction: row; 
            align-items: center;
            max-height: 1000px;
            padding: 20px;
            background: #fff;
            border-radius: 50px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #333;
            margin-top: 0px;
            margin-bottom: 0px;
        }

        h4 {
            margin-top: 5px;
            margin-bottom: 5px;
        }

        h5 {
            margin-top: 0px;
            margin-bottom: 0px;
        }

        .radio-group {
            display: flex;
            flex-direction: row; 
            align-items: center;
            margin-top: 0px;
            margin-bottom: 15px;
        }

        .radio-groups {
            display: flex;
            flex-direction: column; 
            align-items: center;
        }
        .block {
            display: flex;
            flex-direction: column; 
            align-items: center;
        }
        .form {
            display: flex;
            flex-direction: row; 
            align-items: center;
        }

        .form-block {
            display: flex;
            flex-direction: column; 
            align-items: top;
        }

        .sub-form {
            display: flex;
            flex-direction: column; 
            align-items: center;
            padding: 20px;
            margin-bottom: 20px;
            margin-left: 10px;
            margin-right: 10px;
            border-radius: 50px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
 
        input[type="radio"] {
            display: none;
        }

        .custom-radio {
            position: relative;
            display: inline-block;
            padding-left: 6px;
            padding-right: 6px;
            cursor: pointer;
            font-size: 16px;
            line-height: 20px;
            color: #333;
        }

        .custom-radio::before {
            content: attr(data-label);
            position: relative;
            left: 0;
            top: 0;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            border: 2px solid black;
            background: white;
            display: flex;
            align-items: center;
            justify-content: center;
            color: black;
            font-weight: bold;
        }

        input[type="radio"]:checked + .custom-radio::before {
            content: attr(data-label);
            background: black;
            border-color: black;
            color: white;
        }

        .submit-btn {
            background-color: #3498db;
            color: white;
            padding: 10px 20px;
            margin-left: 10px;
            margin-right: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            font-size: 18px;
        }

        .submit-btn:hover {
            background-color: #2980b9;
        }

        .form-image {
            max-height: 800px;
            max-width: 400px;
            margin-bottom: 20px;
            border-radius: 8px;
            margin: 20px;
        }
        .fixed-textarea {
            width: 300px;
            height: 100px;
            font-size: 16px;
            overflow: auto; 
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="form-super-container">
        <div class="form-title-container">
            <h2>Rate This Photo</h2>
            <h5>(*) means required</h5>
        </div>
        <div class="form-container">

            <?php
                $db = new SQLite3('photo.db');
                $result = $db->query("SELECT * FROM photos");
                $ID;
                while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
                    if($row['Count'] == 0){
                        $ID = $row['ID'];
                        break;
                    }
                }
                $path = "photo/" . $ID . ".jpeg";
                $db->close();
            ?>

            <img src="<?php echo $path; ?>" class="form-image">
            
            <form action="submit_rating.php" method="post">
                <div class="block">
                    <div class="form">
                        <div class="sub-form">
                            <div class="radio-groups">
                                <h4>How is your first impression about this photo?(*)</h4>
                                <div class="radio-group">
                                    <label>
                                        <input type="radio" name="rating1" value="0" required>
                                        <span class="custom-radio" data-label="0"></span>
                                    </label>
                                    <label>
                                        <input type="radio" name="rating1" value="1" required>
                                        <span class="custom-radio" data-label="1"></span>
                                    </label>
                                    <label>
                                        <input type="radio" name="rating1" value="2">
                                        <span class="custom-radio" data-label="2"></span>
                                    </label>
                                    <label>
                                        <input type="radio" name="rating1" value="3">
                                        <span class="custom-radio" data-label="3"></span>
                                    </label>
                                    <label>
                                        <input type="radio" name="rating1" value="4">
                                        <span class="custom-radio" data-label="4"></span>
                                    </label>
                                    <label>
                                        <input type="radio" name="rating1" value="5">
                                        <span class="custom-radio" data-label="5"></span>
                                    </label>
                                    <label>
                                        <input type="radio" name="rating1" value="6">
                                        <span class="custom-radio" data-label="6"></span>
                                    </label>
                                    <label>
                                        <input type="radio" name="rating1" value="7">
                                        <span class="custom-radio" data-label="7"></span>
                                    </label>
                                    <label>
                                        <input type="radio" name="rating1" value="8">
                                        <span class="custom-radio" data-label="8"></span>
                                    </label>
                                    <label>
                                        <input type="radio" name="rating1" value="9">
                                        <span class="custom-radio" data-label="9"></span>
                                    </label>
                                    <label>
                                        <input type="radio" name="rating1" value="10">
                                        <span class="custom-radio" data-label="10"></span>
                                    </label>
                                </div>
                            </div>

                            <div class="radio-groups">
                                <h4>Does this photo have an appropriate hue?(*)</h4>
                                <div class="radio-group">
                                    <label>
                                        <input type="radio" name="rating2" value="0" required>
                                        <span class="custom-radio" data-label="0"></span>
                                    </label>
                                    <label>
                                        <input type="radio" name="rating2" value="1" required>
                                        <span class="custom-radio" data-label="1"></span>
                                    </label>
                                    <label>
                                        <input type="radio" name="rating2" value="2">
                                        <span class="custom-radio" data-label="2"></span>
                                    </label>
                                    <label>
                                        <input type="radio" name="rating2" value="3">
                                        <span class="custom-radio" data-label="3"></span>
                                    </label>
                                    <label>
                                        <input type="radio" name="rating2" value="4">
                                        <span class="custom-radio" data-label="4"></span>
                                    </label>
                                    <label>
                                        <input type="radio" name="rating2" value="5">
                                        <span class="custom-radio" data-label="5"></span>
                                    </label>
                                    <label>
                                        <input type="radio" name="rating2" value="6">
                                        <span class="custom-radio" data-label="6"></span>
                                    </label>
                                    <label>
                                        <input type="radio" name="rating2" value="7">
                                        <span class="custom-radio" data-label="7"></span>
                                    </label>
                                    <label>
                                        <input type="radio" name="rating2" value="8">
                                        <span class="custom-radio" data-label="8"></span>
                                    </label>
                                    <label>
                                        <input type="radio" name="rating2" value="9">
                                        <span class="custom-radio" data-label="9"></span>
                                    </label>
                                    <label>
                                        <input type="radio" name="rating2" value="10">
                                        <span class="custom-radio" data-label="10"></span>
                                    </label>
                                </div>
                            </div>

                            <div class="radio-groups">
                                <h4>Does this photo have an appropriate color saturation?(*)</h4>
                                <div class="radio-group">
                                    <label>
                                        <input type="radio" name="rating3" value="0" required>
                                        <span class="custom-radio" data-label="0"></span>
                                    </label>
                                    <label>
                                        <input type="radio" name="rating3" value="1" required>
                                        <span class="custom-radio" data-label="1"></span>
                                    </label>
                                    <label>
                                        <input type="radio" name="rating3" value="2">
                                        <span class="custom-radio" data-label="2"></span>
                                    </label>
                                    <label>
                                        <input type="radio" name="rating3" value="3">
                                        <span class="custom-radio" data-label="3"></span>
                                    </label>
                                    <label>
                                        <input type="radio" name="rating3" value="4">
                                        <span class="custom-radio" data-label="4"></span>
                                    </label>
                                    <label>
                                        <input type="radio" name="rating3" value="5">
                                        <span class="custom-radio" data-label="5"></span>
                                    </label>
                                    <label>
                                        <input type="radio" name="rating3" value="6">
                                        <span class="custom-radio" data-label="6"></span>
                                    </label>
                                    <label>
                                        <input type="radio" name="rating3" value="7">
                                        <span class="custom-radio" data-label="7"></span>
                                    </label>
                                    <label>
                                        <input type="radio" name="rating3" value="8">
                                        <span class="custom-radio" data-label="8"></span>
                                    </label>
                                    <label>
                                        <input type="radio" name="rating3" value="9">
                                        <span class="custom-radio" data-label="9"></span>
                                    </label>
                                    <label>
                                        <input type="radio" name="rating3" value="10">
                                        <span class="custom-radio" data-label="10"></span>
                                    </label>
                                </div>
                            </div>

                            <div class="radio-groups">
                                <h4>Does this photo have a good color matching?(*)</h4>
                                <div class="radio-group">
                                    <label>
                                        <input type="radio" name="rating4" value="0" required>
                                        <span class="custom-radio" data-label="0"></span>
                                    </label>
                                    <label>
                                        <input type="radio" name="rating4" value="1" required>
                                        <span class="custom-radio" data-label="1"></span>
                                    </label>
                                    <label>
                                        <input type="radio" name="rating4" value="2">
                                        <span class="custom-radio" data-label="2"></span>
                                    </label>
                                    <label>
                                        <input type="radio" name="rating4" value="3">
                                        <span class="custom-radio" data-label="3"></span>
                                    </label>
                                    <label>
                                        <input type="radio" name="rating4" value="4">
                                        <span class="custom-radio" data-label="4"></span>
                                    </label>
                                    <label>
                                        <input type="radio" name="rating4" value="5">
                                        <span class="custom-radio" data-label="5"></span>
                                    </label>
                                    <label>
                                        <input type="radio" name="rating4" value="6">
                                        <span class="custom-radio" data-label="6"></span>
                                    </label>
                                    <label>
                                        <input type="radio" name="rating4" value="7">
                                        <span class="custom-radio" data-label="7"></span>
                                    </label>
                                    <label>
                                        <input type="radio" name="rating4" value="8">
                                        <span class="custom-radio" data-label="8"></span>
                                    </label>
                                    <label>
                                        <input type="radio" name="rating4" value="9">
                                        <span class="custom-radio" data-label="9"></span>
                                    </label>
                                    <label>
                                        <input type="radio" name="rating4" value="10">
                                        <span class="custom-radio" data-label="10"></span>
                                    </label>
                                </div>
                            </div>

                        <div class="radio-groups">
                            <h4>Does this photo have a composition?(*)</h4>
                            <div class="radio-group">
                                <label>
                                        <input type="radio" name="rating5" value="0" required>
                                        <span class="custom-radio" data-label="0"></span>
                                </label>
                                <label>
                                    <input type="radio" name="rating5" value="1" required>
                                    <span class="custom-radio" data-label="1"></span>
                                </label>
                                <label>
                                    <input type="radio" name="rating5" value="2">
                                    <span class="custom-radio" data-label="2"></span>
                                </label>
                                <label>
                                    <input type="radio" name="rating5" value="3">
                                    <span class="custom-radio" data-label="3"></span>
                                </label>
                                <label>
                                    <input type="radio" name="rating5" value="4">
                                    <span class="custom-radio" data-label="4"></span>
                                </label>
                                <label>
                                    <input type="radio" name="rating5" value="5">
                                    <span class="custom-radio" data-label="5"></span>
                                </label>
                                <label>
                                    <input type="radio" name="rating5" value="6">
                                    <span class="custom-radio" data-label="6"></span>
                                </label>
                                <label>
                                    <input type="radio" name="rating5" value="7">
                                    <span class="custom-radio" data-label="7"></span>
                                </label>
                                <label>
                                    <input type="radio" name="rating5" value="8">
                                    <span class="custom-radio" data-label="8"></span>
                                </label>
                                <label>
                                    <input type="radio" name="rating5" value="9">
                                    <span class="custom-radio" data-label="9"></span>
                                </label>
                                <label>
                                    <input type="radio" name="rating5" value="10">
                                    <span class="custom-radio" data-label="10"></span>
                                </label>
                            </div>
                        </div>

                            <div class="radio-groups">
                                <h4>Is the composition of this photo appropriate?(*)</h4>
                                <div class="radio-group">
                                    <label>
                                        <input type="radio" name="rating6" value="0" required>
                                        <span class="custom-radio" data-label="0"></span>
                                    </label>
                                    <label>
                                        <input type="radio" name="rating6" value="1" required>
                                        <span class="custom-radio" data-label="1"></span>
                                    </label>
                                    <label>
                                        <input type="radio" name="rating6" value="2">
                                        <span class="custom-radio" data-label="2"></span>
                                    </label>
                                    <label>
                                        <input type="radio" name="rating6" value="3">
                                        <span class="custom-radio" data-label="3"></span>
                                    </label>
                                    <label>
                                        <input type="radio" name="rating6" value="4">
                                        <span class="custom-radio" data-label="4"></span>
                                    </label>
                                    <label>
                                        <input type="radio" name="rating6" value="5">
                                        <span class="custom-radio" data-label="5"></span>
                                    </label>
                                    <label>
                                        <input type="radio" name="rating6" value="6">
                                        <span class="custom-radio" data-label="6"></span>
                                    </label>
                                    <label>
                                        <input type="radio" name="rating6" value="7">
                                        <span class="custom-radio" data-label="7"></span>
                                    </label>
                                    <label>
                                        <input type="radio" name="rating6" value="8">
                                        <span class="custom-radio" data-label="8"></span>
                                    </label>
                                    <label>
                                        <input type="radio" name="rating6" value="9">
                                        <span class="custom-radio" data-label="9"></span>
                                    </label>
                                    <label>
                                        <input type="radio" name="rating6" value="10">
                                        <span class="custom-radio" data-label="10"></span>
                                    </label>
                                </div>   
                            </div>

                            <div class="radio-groups">
                                <h4>Can you find the subject(s) in this photo?(*)</h4>
                                <div class="radio-group">
                                    <label>
                                        <input type="radio" name="rating7" value="0" required>
                                        <span class="custom-radio" data-label="0"></span>
                                    </label>
                                    <label>
                                        <input type="radio" name="rating7" value="1" required>
                                        <span class="custom-radio" data-label="1"></span>
                                    </label>
                                    <label>
                                        <input type="radio" name="rating7" value="2">
                                        <span class="custom-radio" data-label="2"></span>
                                    </label>
                                    <label>
                                        <input type="radio" name="rating7" value="3">
                                        <span class="custom-radio" data-label="3"></span>
                                    </label>
                                    <label>
                                        <input type="radio" name="rating7" value="4">
                                        <span class="custom-radio" data-label="4"></span>
                                    </label>
                                    <label>
                                        <input type="radio" name="rating7" value="5">
                                        <span class="custom-radio" data-label="5"></span>
                                    </label>
                                    <label>
                                        <input type="radio" name="rating7" value="6">
                                        <span class="custom-radio" data-label="6"></span>
                                    </label>
                                    <label>
                                        <input type="radio" name="rating7" value="7">
                                        <span class="custom-radio" data-label="7"></span>
                                    </label>
                                    <label>
                                        <input type="radio" name="rating7" value="8">
                                        <span class="custom-radio" data-label="8"></span>
                                    </label>
                                    <label>
                                        <input type="radio" name="rating7" value="9">
                                        <span class="custom-radio" data-label="9"></span>
                                    </label>
                                    <label>
                                        <input type="radio" name="rating7" value="10">
                                        <span class="custom-radio" data-label="10"></span>
                                    </label>
                                </div>
                            </div>

                            <div class="radio-groups">
                                <h4>Does this photo have an appropriate brightness?(*)</h4>
                                <div class="radio-group">
                                    <label>
                                        <input type="radio" name="rating8" value="0" required>
                                        <span class="custom-radio" data-label="0"></span>
                                    </label>
                                    <label>
                                        <input type="radio" name="rating8" value="1" required>
                                        <span class="custom-radio" data-label="1"></span>
                                    </label>
                                    <label>
                                        <input type="radio" name="rating8" value="2">
                                        <span class="custom-radio" data-label="2"></span>
                                    </label>
                                    <label>
                                        <input type="radio" name="rating8" value="3">
                                        <span class="custom-radio" data-label="3"></span>
                                    </label>
                                    <label>
                                        <input type="radio" name="rating8" value="4">
                                        <span class="custom-radio" data-label="4"></span>
                                    </label>
                                    <label>
                                        <input type="radio" name="rating8" value="5">
                                        <span class="custom-radio" data-label="5"></span>
                                    </label>
                                    <label>
                                        <input type="radio" name="rating8" value="6">
                                        <span class="custom-radio" data-label="6"></span>
                                    </label>
                                    <label>
                                        <input type="radio" name="rating8" value="7">
                                        <span class="custom-radio" data-label="7"></span>
                                    </label>
                                    <label>
                                        <input type="radio" name="rating8" value="8">
                                        <span class="custom-radio" data-label="8"></span>
                                    </label>
                                    <label>
                                        <input type="radio" name="rating8" value="9">
                                        <span class="custom-radio" data-label="9"></span>
                                    </label>
                                    <label>
                                        <input type="radio" name="rating8" value="10">
                                        <span class="custom-radio" data-label="10"></span>
                                    </label>
                                </div>
                            </div>

                            <div class="radio-groups">
                                <h4>Does this photo have a good purity?(*)</h4>
                                <div class="radio-group">
                                    <label>
                                        <input type="radio" name="rating9" value="0" required>
                                        <span class="custom-radio" data-label="0"></span>
                                    </label>
                                    <label>
                                        <input type="radio" name="rating9" value="1" required>
                                        <span class="custom-radio" data-label="1"></span>
                                    </label>
                                    <label>
                                        <input type="radio" name="rating9" value="2">
                                        <span class="custom-radio" data-label="2"></span>
                                    </label>
                                    <label>
                                        <input type="radio" name="rating9" value="3">
                                        <span class="custom-radio" data-label="3"></span>
                                    </label>
                                    <label>
                                        <input type="radio" name="rating9" value="4">
                                        <span class="custom-radio" data-label="4"></span>
                                    </label>
                                    <label>
                                        <input type="radio" name="rating9" value="5">
                                        <span class="custom-radio" data-label="5"></span>
                                    </label>
                                    <label>
                                        <input type="radio" name="rating9" value="6">
                                        <span class="custom-radio" data-label="6"></span>
                                    </label>
                                    <label>
                                        <input type="radio" name="rating9" value="7">
                                        <span class="custom-radio" data-label="7"></span>
                                    </label>
                                    <label>
                                        <input type="radio" name="rating9" value="8">
                                        <span class="custom-radio" data-label="8"></span>
                                    </label>
                                    <label>
                                        <input type="radio" name="rating9" value="9">
                                        <span class="custom-radio" data-label="9"></span>
                                    </label>
                                    <label>
                                        <input type="radio" name="rating9" value="10">
                                        <span class="custom-radio" data-label="10"></span>
                                    </label>
                                </div>
                            </div>

                            <div class="radio-groups">
                                <h4>Is this photo sharp?(*)</h4>
                                <div class="radio-group">
                                    <label>
                                        <input type="radio" name="rating10" value="0" required>
                                        <span class="custom-radio" data-label="0"></span>
                                    </label>
                                    <label>
                                        <input type="radio" name="rating10" value="1" required>
                                        <span class="custom-radio" data-label="1"></span>
                                    </label>
                                    <label>
                                        <input type="radio" name="rating10" value="2">
                                        <span class="custom-radio" data-label="2"></span>
                                    </label>
                                    <label>
                                        <input type="radio" name="rating10" value="3">
                                        <span class="custom-radio" data-label="3"></span>
                                    </label>
                                    <label>
                                        <input type="radio" name="rating10" value="4">
                                        <span class="custom-radio" data-label="4"></span>
                                    </label>
                                    <label>
                                        <input type="radio" name="rating10" value="5">
                                        <span class="custom-radio" data-label="5"></span>
                                    </label>
                                    <label>
                                        <input type="radio" name="rating10" value="6">
                                        <span class="custom-radio" data-label="6"></span>
                                    </label>
                                    <label>
                                        <input type="radio" name="rating10" value="7">
                                        <span class="custom-radio" data-label="7"></span>
                                    </label>
                                    <label>
                                        <input type="radio" name="rating10" value="8">
                                        <span class="custom-radio" data-label="8"></span>
                                    </label>
                                    <label>
                                        <input type="radio" name="rating10" value="9">
                                        <span class="custom-radio" data-label="9"></span>
                                    </label>
                                    <label>
                                        <input type="radio" name="rating10" value="10">
                                        <span class="custom-radio" data-label="10"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-block">
                            <div class="sub-form">
                                <h4>Please describe this photo:(*)</h4>
                                <textarea id="comments" name="description" class="fixed-textarea" required></textarea>
                                <h4>Please give some suggestons for this photo:(*)</h4>
                                <textarea id="comments" name="suggestion" class="fixed-textarea" required></textarea>
                            </div>

                            <div class="sub-form">
                                <h4>Name / Nick Name(*)</h4>
                                <input type="text" name="name" rows="1" cols="50" required></textarea>
                                <h4>Email Address</h4>
                                <input type="email" name="email"></textarea>
                            </div>
                            <div class="radio-group">
                                    <button type="submit" class="submit-btn">Submit Rating</button>
                            </div>
                        </div>
                        <input type="hidden" name="ID" value="<?php echo $ID; ?>">
                        
                    </div>
                </div>
            </form>
        </div>
    </div>            
</body>
</html>