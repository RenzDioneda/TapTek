// signup.js
document.getElementById('signupForm').addEventListener('submit', function (e) {
    e.preventDefault(); // Prevent the default form submission

    // Get form data
    const username = document.getElementById('username').value;
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;

    // Create a FormData object
    const formData = new FormData();
    formData.append('username', username);
    formData.append('email', email);
    formData.append('password', password);

    // Send AJAX request
    fetch('register.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text()) // Get the response text
    .then(data => {
        const feedback = document.getElementById('signupFeedback');
        if (data.includes('successful')) {
            feedback.innerHTML = '<span class="text-success">Registration successful!</span>';
            document.getElementById('signupForm').reset(); // Reset form fields
        } else {
            feedback.innerHTML = `<span class="text-danger">${data}</span>`; // Show error message
        }
    })
    .catch(error => {
        console.error('Error:', error);
        document.getElementById('signupFeedback').innerHTML = '<span class="text-danger">An error occurred. Please try again.</span>';
    });
});