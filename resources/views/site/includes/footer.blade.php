<footer class="bg-primary text-white py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 mb-4">
                <h5>Follow us on social media:</h5>
                <!-- Big Social Icons -->
                <div class="social-icons mt-3">
                    <a href="#" class="text-light fs-3 ms-2"><i class="bi bi-facebook"></i></a>
                    <a href="#" class="text-light fs-3 ms-2"><i class="bi bi-twitter"></i></a>
                    <a href="#" class="text-light fs-3 ms-2"><i class="bi bi-linkedin-in"></i></a>
                    <a href="#" class="text-light fs-3 me-2"><i class="bi bi-instagram"></i></a>
                    <a href="#" class="text-light fs-3 me-2"><i class="bi bi-github"></i></a>
                    <!-- Add more social icons as needed -->
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <h5>Subscribe to our newsletter</h5>
                <p>Get the latest blog posts delivered to your inbox.</p>
{{-- Subscription Form --}}
                <form action="/subscribe" method="post" class="mb-3">
                    @csrf <!-- Add CSRF token for Laravel -->
                    <div class="input-group text-white">
                        <input type="email" class="form-control" placeholder="Your email" name="subscribeEmail" required>
                        <button type="submit" class="btn btn-dark">Subscribe</button>
                    </div>
                    <div id="emailHelp" class="form-text text-white">We'll never share your email with anyone else.</div>
                </form>

            </div>
            <div class="col-lg-4">
                <h5>Contact Us</h5>
                <p>Email: talhamanzoor68911@gmail.com</p>
            </div>
        </div>
    </div>
</footer>
