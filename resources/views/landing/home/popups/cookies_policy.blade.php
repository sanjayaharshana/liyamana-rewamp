<div class="cookie-banner d-none" id="cookieBanner" style="
    background: #6b0505;
    padding: 20px;
    top: 90vh;
    z-index: 10;
    position: fixed;
    left: 0;
    bottom: 0;
    width: 100%;
    color: white;
    text-align: center;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-9">
                <p class="mb-0">
                    We use cookies to ensure you get the best experience on our website.
                    <a href="/cookie-policy" class="text-info text-decoration-underline">Learn more</a>.
                </p>
            </div>
            <div class="col-md-3 text-md-end">
                <button class="btn btn-success btn-sm" id="acceptCookies">Accept</button>
            </div>
        </div>
    </div>
</div>

<script>
    // Show the cookie banner if cookies have not been accepted
    document.addEventListener("DOMContentLoaded", function () {
        if (!localStorage.getItem("cookiesAccepted")) {
            document.getElementById("cookieBanner").classList.remove("d-none");
        }

        // Handle "Accept" button click
        document.getElementById("acceptCookies").addEventListener("click", function () {
            localStorage.setItem("cookiesAccepted", "true");
            document.getElementById("cookieBanner").classList.add("d-none");
        });
    });
</script>
