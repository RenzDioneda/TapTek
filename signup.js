document.getElementById('signupForm').addEventListener('submit', function (e) {
    e.preventDefault(); // Prevent default form submission

    // Collect form data
    const username = document.getElementById('username').value;
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;

    // Create a FormData object
    const formData = new FormData();
    formData.append('username', username);
    formData.append('email', email);
    formData.append('password', password);

    // Send the form data to the server using fetch
    fetch('register.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        const feedback = document.getElementById('signupFeedback');
        if (data.includes('success')) {
            feedback.innerHTML = '<span class="text-success">Registration successful!</span>';
            document.getElementById('signupForm').reset();
        } else {
            feedback.innerHTML = `<span class="text-danger">${data}</span>`;
        }
    })
    .catch(error => {
        console.error('Error:', error);
        document.getElementById('signupFeedback').innerHTML = '<span class="text-danger">An error occurred. Please try again later.</span>';
    });
});