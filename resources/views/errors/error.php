<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Error</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }
        h1 {
            color: #dc3545;
        }
        table {
            width: 100%;
            max-width: 600px;
            border-collapse: collapse;
            background: white;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        th, td {
            padding: 10px;
            border: 1px solid #dee2e6;
            text-align: left;
        }
        th {
            background-color: #f1f1f1;
        }
    </style>
</head>
<body>
<h1><?php echo htmlspecialchars($error_info['title']); ?></h1>
<table>
    <tr>
        <th>Error Message</th>
        <td><?php echo htmlspecialchars($error_info['msg']); ?></td>
    </tr>
    <tr>
        <th>File</th>
        <td><?php echo htmlspecialchars($error_info['file']); ?></td>
    </tr>
    <tr>
        <th>Line</th>
        <td><?php echo htmlspecialchars($error_info['line']); ?></td>
    </tr>
</table>
</body>
</html>
