document.getElementById('loginForm').addEventListener('submit', function (event) {
    event.preventDefault();
    var userID = document.getElementsByName("userID")[0].value;
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'login.php');
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                var response = JSON.parse(xhr.responseText);
                console.log(response);
                if (response.error) {
                    alert(response.error);
                } 
                else if (!response.success) {
                    alert("Error, wrong password!")
                }
                else {
                    alert("LESGOO");
                }
            } else {
                alert("Request failed with status: " + xhr.status);
            }
        }
    };
    xhr.send("userID=" + encodeURIComponent(userID));
});