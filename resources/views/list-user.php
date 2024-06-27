<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   
    <table>
        <thead>
            <tr>
                <th>mssv</th>
                <th>name</th>
                <th>class</th>
            </tr>
        </thead>
        <tbody>
            <?php
        foreach($user as $key){
                echo "<tr>
                    <th>".$key['id']."</th>
                    <th>".$key['name']."</th>
                    <th>".$key['status']."</th> 
                
                </tr>";
            }
            ?>
        </tbody>

    </table>
  
</body>
</html>