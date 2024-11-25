/**
 * Function to validate the Pilot Application Form
 * @returns {boolean} - Whether the form is valid
 */
function validateForm() {
    // Validate Full Name
    var name = document.getElementById("txtName").value.trim();
    if (name === "" || name.length > 100) {
        alert("Please enter a valid full name (maximum 100 characters).");
        return false;
    }

    // Validate Age
    var age = parseInt(document.getElementById("txtAge").value, 10);
    if (isNaN(age) || age < 18 || age > 65) {
        alert("Age must be a number between 18 and 65.");
        return false;
    }

    // Validate Email
    var email = document.getElementById("txtEmail").value.trim();
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; // Basic email format validation
    if (email === "" || !emailRegex.test(email)) {
        alert("Please enter a valid email address.");
        return false;
    }

    // Validate Flight Experience
    var experience = parseInt(document.getElementById("txtExperience").value, 10);
    if (isNaN(experience) || experience < 0 || experience > 50) {
        alert("Flight experience must be a number between 0 and 50 years.");
        return false;
    }

    // Validate Reason for Applying
    var reason = document.getElementById("txtReason").value.trim();
    if (reason === "" || reason.length > 500) {
        alert("Please provide a valid reason (maximum 500 characters).");
        return false;
    }

    // All validations passed
    return true;
}
