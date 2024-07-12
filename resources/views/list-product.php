<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab1</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            /* height: 100vh; */
            background-color: #f4f4f4;
        }
        .container {
            text-align: center;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        h1 {
            margin-bottom: 40px;
            font-size: 24px;
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        th, td {
            padding: 12px 15px;
            border: 1px solid #ddd;
        }
        th {
            background-color: #4CAF50;
            color: #fff;
            text-transform: uppercase;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Lab1</h1>
        <table>
            <thead>
                <tr>
                    <th>id</th>
                    <th>name</th>
                    <th>email</th>
                    <th>phong ban</th>
                    <th>so ngay nghi</th>
                    <th>tuoi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($user as $student): ?>
                    <tr>
                        <td><?php echo $student->id; ?></td>
                        <td><?php echo $student->name; ?></td>
                        <td><?php echo $student->email; ?></td>
                        <td><?php echo $student->phongban_id; ?></td>
                        <td><?php echo $student->tuoi; ?></td>
                        <td><?php echo $student->tuoi; ?></td>
                    </tr>
                <?php endforeach; ?>
               
            </tbody>
        </table>
    </div>
</body>
</html>
