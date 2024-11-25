<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilot Application</title>
    <link href="main.css" rel="stylesheet">
    <script src="validate.js"></script>
</head>
<body>
    <header>
        <nav> 
            <a href="index.php">Mars Tours Home</a> &nbsp; | &nbsp;
            <a href="app.php">Pilot Application Form</a>
        </nav>
        <h1>Apply to Be a Mars Tour Pilot</h1>
    </header>

    <main>
        <p>We are excited to see your interest in becoming a Mars Tours Pilot! Please fill out the form below with accurate information.</p>
        <form id="frmApp" name="frmApp" method="post" action="submit.php" onsubmit="return validateForm();">
            <!-- Full Name -->
            <label for="txtName">Full Name:</label>
            <input type="text" id="txtName" name="txtName" maxlength="100" required>
            <br><br>

            <!-- Age -->
            <label for="txtAge">Age:</label>
            <input type="number" id="txtAge" name="txtAge" min="18" max="65" required>
            <br><br>

            <!-- Email -->
            <label for="txtEmail">Email Address:</label>
            <input type="email" id="txtEmail" name="txtEmail" maxlength="100" required>
            <br><br>

            <!-- Flight Experience -->
            <label for="txtExperience">Flight Experience (in years):</label>
            <input type="number" id="txtExperience" name="txtExperience" min="0" max="50" required>
            <br><br>

            <!-- Reason for Applying -->
            <label for="txtReason">Why do you want to be a pilot for Mars Tours?</label>
            <textarea id="txtReason" name="txtReason" maxlength="500" rows="4" cols="50" required></textarea>
            <br><br>

            <!-- Submit Button -->
            <input type="submit" value="Submit Application">
        </form>
    </main>

    <footer>
        <p>&copy; 2024 Mars Tours. All rights reserved.</p>
    </footer>
</body>
</html>
