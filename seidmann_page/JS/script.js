document.getElementById('loginForm').addEventListener('submit', function(event) {
    var username = document.getElementById('username').value;
    var password = document.getElementById('password').value;

    if (!username || !password) {
        event.preventDefault(); // Prevent form submission
        document.getElementById('error').textContent = "Please enter username and password.";
    }
});


