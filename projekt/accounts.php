<!DOCTYPE html>
<html lang="en">

<?php
include_once 'parts/head.php';
include_once 'parts/nav.php';
?>

<body class="bg03">
    <div class="container">
        <div class="row">
            <div class="col-12">
            </div>
        </div>
        <!-- row -->
        <div class="row tm-content-row tm-mt-big">
            <div class="tm-col tm-col-big">
                <div class="bg-white tm-block">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="tm-block-title d-inline-block">Accounts</h2>
                        </div>
                    </div>
                    <ol class="tm-list-group tm-list-group-alternate-color tm-list-group-pad-big">
                        <li class="tm-list-group-item">
                            Donec eget libero
                        </li>
                        <li class="tm-list-group-item">
                            Nunc luctus suscipit elementum
                        </li>
                        <li class="tm-list-group-item">
                            Maecenas eu justo maximus
                        </li>
                        <li class="tm-list-group-item">
                            Pellentesque auctor urna nunc
                        </li>
                        <li class="tm-list-group-item">
                            Sit amet aliquam lorem efficitur
                        </li>
                        <li class="tm-list-group-item">
                            Pellentesque auctor urna nunc
                        </li>
                        <li class="tm-list-group-item">
                            Sit amet aliquam lorem efficitur
                        </li>
                    </ol>
                </div>
            </div>
            <div class="tm-col tm-col-big">
                <div class="bg-white tm-block">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="tm-block-title">Edit Account</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <form action="" class="tm-signup-form">
                                <div class="form-group">
                                    <label for="name">Account Name</label>
                                    <input placeholder="Vulputate Eleifend Nulla" id="name" name="name" type="text" class="form-control validate">
                                </div>
                                <div class="form-group">
                                    <label for="email">Account Email</label>
                                    <input placeholder="vulputate@eleifend.co" id="email" name="email" type="email" class="form-control validate">
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input placeholder="******" id="password" name="password" type="password" class="form-control validate">
                                </div>
                                <div class="form-group">
                                    <label for="password2">Re-enter Password</label>
                                    <input placeholder="******" id="password2" name="password2" type="password" class="form-control validate">
                                </div>
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input placeholder="010-030-0440" id="phone" name="phone" type="tel" class="form-control validate">
                                </div>
                                <div class="row">
                                    <div class="col-12 col-sm-4">
                                        <button type="submit" class="btn btn-primary">Update
                                        </button>
                                    </div>
                                    <div class="col-12 col-sm-8 tm-btn-right">
                                        <button type="submit" class="btn btn-danger">Delete Account
                                        </button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tm-col tm-col-small">
                <div class="bg-white tm-block">
                    <h2 class="tm-block-title">Profile Image</h2>
                    <img src="img/profile-image.png" alt="Profile Image" class="img-fluid">
                    <div class="custom-file mt-3 mb-3">
                        <input id="fileInput" type="file" style="display:none;" />
                        <input type="button" class="btn btn-primary d-block mx-xl-auto" value="Upload New..." onclick="document.getElementById('fileInput').click();"
                        />
                    </div>
                </div>
            </div>
        </div>
        <?php
        include_once 'parts/footer.php';
        ?>
    </div>

    <script src="js/jquery-3.3.1.min.js"></script>
    <!-- https://jquery.com/download/ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- https://getbootstrap.com/ -->
</body>

</html>