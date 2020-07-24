<!-- Footer -->
<footer class="page-footer font-small indigo custom-footer footer-bottom">
    <!-- Footer Elements -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 text-center">
                <a>
                    <img class="social-img" src="static/footer/img/facebook.png" width="50">
                </a>
                <a>
                    <img class="social-img" src="static/footer/img/twitter.png" width="50">
                </a>
                <!-- instagram-->
                <a>
                    <img class="social-img" src="static/footer/img/instagram.png" width="50">
                </a>
            </div>
        </div>
        <!-- Grid column -->

    </div>
    <!-- Grid row-->

    </div>
    <!-- Footer Elements -->

    <!-- Footer Links -->
    <div class="container text-center text-md-left">

        <!-- Grid row -->
        <div class="row">

            <!-- Grid column -->
            <div class="col-md-3 mx-auto">

                <!-- Links -->
                <h5 class="font-weight-bold mt-3 mb-4">የደንበኞች አገልግሎት</h5>

                <ul class="list-unstyled">
                    <li>
                        <?php
                        if (isset($_SESSION['user_id'])) {
                            echo "<a class='white-text' href='questions.php'>ጥያቄ ካለዎት</a>";
                        } else {
                            echo "<a class='white-text' href='login.php'>ጥያቄ ካለዎት</a>";
                        }
                        ?>


                    </li>
                    <li>
                        <?php
                        if (isset($_SESSION['user_id'])) {
                            echo "<a class='white-text' href='comments.php'>አስተያየት ለመስጠት</a>";
                        } else {
                            echo "<a class='white-text' href='login.php'>አስተያየት ለመስጠት</a>";
                        }
                        ?>
                    </li>
                    <li>
                        <?php
                        if (isset($_SESSION['user_id'])) {
                            echo "<a class='white-text' href='claims.php'>ቅሬታ ለማቅረብ</a>";
                        } else {
                            echo "<a class='white-text' href='login.php'>ቅሬታ ለማቅረብ</a>";
                        }
                        ?>
                    </li>
                </ul>

            </div>
            <!-- Grid column -->

            <hr class="clearfix w-100 d-md-none">

            <!-- Grid column -->
            <div class="col-md-3 mx-auto">

                <!-- Links -->
                <h5 class="font-weight-bold text-uppercase mt-3 mb-4">ከኛ ጋር ለመስራት</h5>

                <ul class="list-unstyled">
                    <li>
                        <a class="white-text" href="/business/advertisement/">ማስተዋወቅያ ለመልቀቅ</a>
                    </li>
                    <li>
                        <a class="white-text" href="{% url 'accounts:login' %}">እቃዎችን ለመሸጥ</a>

                    </li>
                    <li>
                        <a class="white-text" href="/business/membership_registration/">የአባልነት ምዝገባ</a>
                    </li>
                </ul>

            </div>
            <!-- Grid column -->

            <hr class="clearfix w-100 d-md-none">

            <!-- Grid column -->
            <div class="col-md-3 mx-auto">

                <!-- Links -->
                <h5 class="font-weight-bold text-uppercase mt-3 mb-4">ለንግድ ድርጅቶች</h5>

                <ul class="list-unstyled">
                    <li>
                        <a class="white-text" href="{% url 'business:factory' %}">ፋብሪካዎች</a>
                    </li>
                    <li>
                        <a class="white-text" href="{% url 'business:distributer' %}">አከፋፋዮች</a>
                    </li>
                    <li>
                        <a class="white-text" href="{% url 'business:shop' %}">ሱቆች</a>
                    </li>
                </ul>

            </div>
            <!-- Grid column -->

            <hr class="clearfix w-100 d-md-none">

            <!-- Grid column -->
            <div class="col-md-3 mx-auto">

                <!-- Links -->
                <h5 class="font-weight-bold text-uppercase mt-3 mb-4">ስለ አዴተራ</h5>

                <ul class="list-unstyled">
                    <li>
                        <a class="white-text" href="{% url 'homepage:adetera' %}">መግለጫ</a>
                    </li>
                    <li>
                        <a class="white-text" href="{% url 'homepage:matrix' %}">MatrixSoft Ethiopia</a>
                    </li>

                </ul>

            </div>
            <!-- Grid column -->

        </div>
        <!-- Grid row -->

    </div>
    <!-- Footer Links -->

    <!-- Copyright -->
    <div class="footer-copyright text-center py-3 custom-footer2">© 2020 Copyright:
        <a class="white-text" href="https://mdbootstrap.com/"> MatrixSoft Ethiopia</a>
    </div>
    <!-- Copyright -->

</footer>
<!-- Footer -->