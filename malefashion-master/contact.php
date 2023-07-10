<?php
include_once('./include/conn.php');
include_once('./include/header.php'); 
?>
    <!-- Map Begin -->
    <div class="map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d111551.9926412813!2d-90.27317134641879!3d38.606612219170856!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x54eab584e432360b%3A0x1c3bb99243deb742!2sUnited%20States!5e0!3m2!1sen!2sbd!4v1597926938024!5m2!1sen!2sbd" height="500" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
    </div>
    <!-- Map End -->

    <!-- Contact Section Begin -->
    <section class="contact spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="contact__text">
                        <div class="section-title">
                            <span>Information</span>
                            <h2>Contact Us</h2>
                            <p>As you might expect of a company that began as a high-end interiors contractor, we pay
                                strict attention.</p>

                        </div>
                        <ul>
                            <li>
                                <h4>Pakistan</h4>
                                <p>Fortress, Lahore <br />+92-314-1234567</p>
                                <p>LayalPur Galleria, Faisalabad <br />+92-314-1234567</p>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="contact__form">
                        <form action="">
                            <div class="row">
                                <div class="col-lg-6">
                                    <input type="text" name="name" placeholder="Name">
                                </div>
                                <div class="col-lg-6">
                                    <input type="text" name="email" placeholder="Email">
                                </div>
                                <div class="col-lg-12">
                                    <textarea name="message" placeholder="Message"></textarea>
                                    <button type="button" name="button" id="button" class="site-btn">Send Message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"
        integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> 
<script>
    $(document).ready(function(){           
    $("#button").on("click", (e) => {
    e.preventDefault();
    var formData = new FormData(oform);
    $.ajax({
    url: "./ajax/contactajax.php",
        method: "POST",
        contentType: false,
        processData: false,
        data: formData,
        success: function (res) 
        });
    });
})
</script>

<?php
include_once('./include/footer.php');
?>