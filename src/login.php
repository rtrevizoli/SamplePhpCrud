    <?php
    if (isset($_SESSION['validate']) && $_SESSION['validate'] = 'false') {
    ?>
        <script>
            $(document).ready(function() {
                $('.alert').alert();
                var count = 3;
                var counter = setInterval(timer, 1000);

                function timer() {
                    count = count - 1;
                    if (count == 0) {
                        $('.alert').alert('close');
                        return;
                    }
                }
            });
        </script>
        <div class="alert alert-danger" role="alert" style="position: absolute; top: 3%; right: 3%;">
            E-mail or password is incorrect.
        </div>
    <?php
    }
    ?>
    <div class="container py-4" style="width: 30%;">
        <div class="p-5 my-5 bg-light rounded-3">
            <div class="container-fluid">
                <form action="src/validate-login.php" method="post">
                    <div class="mb-3">
                        <label for="inputEmail" class="form-label">Email address</label>
                        <input type="email" class="form-control" name="inputEmail" aria-describedby="emailHelp">
                        <div name="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="inputPassword" class="form-label">Password</label>
                        <input type="password" class="form-control" name="inputPassword">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>