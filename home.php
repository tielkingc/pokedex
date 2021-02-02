<!DOCTYPE html>
<html>
    <head>
        <title>
            Pokedex
        </title>
        <link rel="stylesheet" href="reset.css">
        <link rel="stylesheet" href="style.css">
    </head>
    
    <body>
        <div class="nav-bar">
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">List</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </div>
        <div class="main-content">
            <div class="info-box">
                <div class="poke-pic">
                    <img src="images/info-pic.jpg">
                </div>
                <div class="poke-stats">
                    <table class="statdisplay">
                        <tr>
                            <td><p><strong>Name: </strong></p></td>
                            <td><p><strong> Types: </strong></p></td>
                        </tr>
                        <tr>
                            <td><p><strong> Hp:</strong></p></td>
                            <td><p><strong> Speed: </strong></p></td>
                        </tr>
                        <tr>
                            <td><p><strong> Attack: </strong></p></td>
                            <td><p><strong> Defense: </strong></p></td>
                        </tr>
                        <tr>
                            <td><p><strong> Special Attack: </strong></p></td>
                            <td><p><strong> Special Defense: </strong></p></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="search-box">
                <button class="collapsible">Search by Name</button>
                  <div class="content">
                    <p>Here is where you can search a Pokemon by name.</p><br>
                    <form action="dbnamesearch.php" method="post">
                      <label for="pname">Name:</label><br>
                      <br><input type="text" id="pname" name="search"><br>
                      <br><input type="submit" value="Submit"><br>
                    </form>
                  </div>
                <button class="collapsible" style="margin-top: 20px;">Search by Type</button>
                <div class="content">
                  <table class="typesearch">
                      <form class="types" action="" method="POST">
                        <tr>
                            <td>
                                <input type="checkbox" id="type1" name="search" value="Normal">
                                <label for="type1"> Normal</label><br>
                            </td>
                            <td>
                                <input type="checkbox" id="type2" name="search" value="Water">
  <label for="type2"> Water</label><br>
                            </td>
                            <td>
                                <input type="checkbox" id="type3" name="search" value="Electric">
  <label for="type3"> Electric</label><br>
                            </td>
                            <td>
                                <input type="checkbox" id="type4" name="search" value="Fighting">
  <label for="type4"> Fighting</label><br>
                            </td>
                            <td>
                                <input type="checkbox" id="type5" name="search" value="Ground">
  <label for="type5"> Ground</label><br>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="checkbox" id="type6" name="search" value="Psychic">
  <label for="type6"> Psychic</label><br>
                            </td>
                            <td>
                                <input type="checkbox" id="type7" name="search" value="Rock">
  <label for="type7"> Rock</label><br>
                            </td>
                            <td>
                                <input type="checkbox" id="type8" name="search" value="Dark">
  <label for="type8"> Dark</label><br>
                            </td>
                            <td>
                                <input type="checkbox" id="type9" name="search" value="Steel">
  <label for="type9"> Steel</label><br>
                            </td>
                            <td>
                                <input type="checkbox" id="type10" name="search" value="Fire">
  <label for="type10"> Fire</label><br>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="checkbox" id="type11" name="search" value="Grass">
  <label for="type11"> Grass</label><br>
                            </td>
                            <td>
                                <input type="checkbox" id="type12" name="search" value="Ice">
  <label for="type12"> Ice</label><br>
                            </td>
                            <td>
                                <input type="checkbox" id="type13" name="search" value="Poison">
  <label for="type13"> Poison</label><br>
                            </td>
                            <td>
                                <input type="checkbox" id="type14" name="search" value="Flying">
  <label for="type14"> Flying</label><br>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="checkbox" id="type15" name="search" value="Bug">
  <label for="type15"> Bug</label><br>
                            </td>
                            <td>
                                <input type="checkbox" id="type16" name="search" value="Ghost">
  <label for="type16"> Ghost</label><br>
                            </td>
                            <td>
                                <input type="checkbox" id="type17" name="search" value="Dragon">
  <label for="type17"> Dragon</label><br>
                            </td>
                            <td>
                                <input type="checkbox" id="type18" name="search" value="Fairy">
  <label for="type18"> Fairy</label><br>
                            </td>
                            <td>
                                <input type="submit" value="Search">
                            </td>
                        </tr>
                    </form>
                  </table>
                  <div>
                    <?php
                    if(isset($_POST["search"])):

                        $search = $_POST["search"];                    

                        $servername = "localhost";
                        $username = "root";
                        $password = "2wlkj77g";
                        $db = "poke";

                        $conn = new mysqli($servername, $username, $password, $db);

                        if ($conn->connect_error){
                            die("Connection failed: ". $conn->connect_error);
                        }

                        $sql = "select * from pokemon where (type1 = '$search') or (type2 = '$search')";

                        $result = $conn->query($sql);

                        if ($result->num_rows > 0){
                            echo '<ul style="list-style-type:none;">';
                            while($row = $result->fetch_assoc() ){
                                echo '<li style="text-decoration:none;">' . '<a target="_blank" href="' . $row["link"] . '" style="text-decoration=none;">' . $row['Name'] . '</a>' . '</li>';
                        }
                            echo "</ul>";
                        } else {
                            echo " ";
                        }

                        $conn->close();
                    endif;

                    ?>
                  </div>
                </div>
                <button class="collapsible" style="margin-top: 20px;">Search by Picture</button>
                <div class="content">
                    <form action="/action_page.php">
                        <br><label for="myfile">Select a file:</label>
                        <input type="file" id="myfile" name="myfile"><br><br>
                        <input type="submit" value="Submit" name="search"><br>
                      </form>
                </div>
            </div>
        </div>
        <script src="collapse.js"></script>
    </body>
</html>