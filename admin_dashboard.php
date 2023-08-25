<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .header {
            background-color: #007bff;
            color: #fff;
            padding: 10px 0;
            text-align: center;
        }

        .logout {
            text-decoration: none;
            color: #f4f4f4;
            font-weight: bold;
        }
        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .section {
            margin-bottom: 30px;
        }
        .section-title {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .link-list {
            list-style-type: none;
            padding-left: 0;
        }
        .link-list-item {
            margin-bottom: 10px;
        }
        .section ul li a{
            
            text-decoration: none;
            color: #007bff;
            font-weight: bold;
        }

        .link-list {
            display: inline-block;
            margin-right: 20px;
            /*display: inline-flex; */
            flex-wrap: wrap;
            justify-content: space-between; /* Distribute items evenly */
            align-items: flex-start; /* Align items to the top of each row */
            margin: -10px; /* Adjust as needed for spacing */
        }

        .link-list-item { 
            flex:auto; /* Adjust the width based on your design */
            margin: 10px; /* Adjust as needed for spacing */
            /*flex: 0 0 calc(25% - 20px); /* Four options per line */
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Admin Dashboard</h1>
        <a class="logout" href="logout.php">Logout</a>
    </div>
    <div class="container">
        <div class="section">
            <div class="section-title">System Statistics</div>
            <!-- Display system statistics here -->
        </div>

        
        <div class="section">
            <div class="section-title">Management Pages</div>
            <ul class="link-list inline">
                <li class="link-list-item"><a href="election_list.php">Manage Elections</a></li>
                <li class="link-list-item"><a href="position_list.php">Manage Positions</a></li>
                <li class="link-list-item"><a href="candidate_list.php">Manage Candidates</a></li>
                <li class="link-list-item"><a href="voter_list.php">Manage Voters</a></li>
                <!-- Add more management links as needed -->
            </ul>
        </div>
        <div class="section">
            <div class="section-title">Voting and Results</div>
            <ul class="link-list inline">
                <li class="link-list-item"><a href="start_voting.php">Start Voting</a></li>
                <li class="link-list-item"><a href="view_results.php">View Election Results</a></li>
                <li class="link-list-item"><a href="print_results.php">Print Results</a></li>
            </ul>
        </div>
        <div class="section">
            <div class="section-title">Help and Support</div>
            <ul class="link-list inline">
                <li class="link-list-item"><a href="faq.php">FAQ</a></li>
                <li class="link-list-item"><a href="contact_support.php">Contact Support</a></li>
            </ul>
        </div>
    </div>
</body>
</html>