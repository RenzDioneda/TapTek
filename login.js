// Handle the login form submission
document.getElementById('loginForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent default form submission

    var username = document.getElementById('username').value;
    var password = document.getElementById('password').value;

    var formData = new FormData();
    formData.append('username', username);
    formData.append('password', password);

    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'login.php', true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var response = JSON.parse(xhr.responseText);

            if (response.success) {
                // Successful login
                document.getElementById('loginStatus').innerHTML = 'Welcome, ' + response.username + '! You are logged in.';
                document.getElementById('loginForm').style.display = 'none'; // Optionally hide the login form
            } else {
                // Display error message
                alert(response.message);
            }
        }
    };
    xhr.send(formData);
});