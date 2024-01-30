<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup using XMLS</title>
</head>

<body>
    <!-- Section: Design Block -->
    <section class="">
        <!-- Jumbotron -->
        <div class="px-4 py-5 px-md-5 text-center text-lg-start" style="background-color: hsl(0, 0%, 96%)">
            <div class="container">
                <div class="row gx-lg-5 align-items-center">
                    <div class="col-lg-6 mb-5 mb-lg-0">
                        <h1 class="my-5 display-3 fw-bold ls-tight">
                            The best offer <br />
                            <span class="text-primary">for your business</span>
                        </h1>
                        <p style="color: hsl(217, 10%, 50.8%)">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            Eveniet, itaque accusantium odio, soluta, corrupti aliquam
                            quibusdam tempora at cupiditate quis eum maiores libero
                            veritatis? Dicta facilis sint aliquid ipsum atque?
                        </p>
                    </div>

                    <div class="col-lg-6 mb-5 mb-lg-0">
                        <div class="card">
                            <div class="card-body py-5 px-md-5">
                                
                                    <!-- 2 column grid layout with text inputs for the first and last names -->
                                    <div class="row">
                                        <div class="col-md-6 mb-4">
                                            <div class="form-outline">
                                                <input type="text" id="form3Example1" class="form-control" />
                                                <label class="form-label" for="form3Example1">First name</label>
                                            </div>
                                        </div>
                                        
                                    </div>

                                    <!-- Password input -->
                                    <div class="form-outline mb-4">
                                        <input name="password" type="password" id="form3Example4" class="form-control" />
                                        <label class="form-label" for="form3Example4">Password</label>
                                    </div>

                                    <!-- Checkbox -->
                                    <div class="form-check d-flex justify-content-center mb-4">
                                        <input class="form-check-input me-2" type="checkbox" value="" id="form2Example33" checked />
                                        <label class="form-check-label" for="form2Example33">
                                            Subscribe to our newsletter
                                        </label>
                                    </div>

                                    <!-- Submit button -->
                                    <a href="login.php"><button id="signup" type="submit" class="btn btn-primary btn-block mb-4">
                                        Sign up
                                    </button></a>

                                    </div>
                                    <div id="response"></div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </section>


    <script>
        document.addEventListener('DOMContentLoaded', function () {
    const submitButton = document.getElementById('signup');
    const usernameInput = document.getElementById('form3Example1');
    const passwordInput = document.getElementById('form3Example4');
    const responseDiv = document.getElementById('response');

    submitButton.addEventListener('click', function () {
        const xhr = new XMLHttpRequest();

        xhr.open('POST', 'add.php');
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        const data = `username=${encodeURIComponent(usernameInput.value)}&password=${encodeURIComponent(passwordInput.value)}`;
        xhr.send(data);
        
    });
});

    </script>
</body>

</html>