<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Dealer Subscription Plans</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/images/favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .card {
            transition: transform 0.2s;
        }

        .card:hover {
            transform: scale(1.05);
        }

        .price {
            font-size: 1.5rem;
            font-weight: bold;
        }
    </style>
</head>

<body class="bg-light">
    <div class="container my-5">
        <div class="text-center mb-5">
            <h1 class="display-4">Dealer Subscription Plans</h1>
            <p class="lead">Choose a subscription plan that best fits your needs.</p>
        </div>

        <div class="text-center mb-4">
            <h2>Select Subscription Duration</h2>
            <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                <input type="radio" class="btn-check" name="options" id="monthly" autocomplete="off" checked>
                <label class="btn btn-outline-primary" for="monthly">Monthly</label>

                <input type="radio" class="btn-check" name="options" id="yearly" autocomplete="off">
                <label class="btn btn-outline-primary" for="yearly">Yearly</label>
            </div>
        </div>

        <div class="row d-flex justify-content-center ">
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card shadow-lg border border-0 rounded-4">
                    <div class="card-body">
                        <h3 class="text-center">Professional Plan</h3>
                        <h4 class="price text-center" data-monthly="1000" data-yearly="12000">₹1,000/mo</h4>
                        <ul class="list-unstyled">
                            <li class="gap-2 m-2">✔️ Unlimited product uploads</li>
                            <li class="gap-2 m-2">✔️ Advanced inventory tracking</li>
                            <li class="gap-2 m-2">✔️ Customizable dealer website</li>
                            <li class="gap-2 m-2">✔️ Monthly performance reports</li>
                            <li class="gap-2 m-2">✔️ Priority email support</li>
                            <li class="gap-2 m-2">✔️ Access to marketing tools</li>
                            <li class="gap-2 m-2">❌ Basic CRM features</li>
                            <li class="gap-2 m-2">❌ Integration with popular payment gateways</li>
                            <li class="gap-2 m-2">❌ Mobile-friendly interface</li>
                            <li class="gap-2 m-2">❌ Basic analytics dashboard</li>
                            <li class="gap-2 m-2">✔️ Access to one product category</li>
                        </ul>
                        <div class="d-grid gap-2 col-6 mx-auto">
                            <button class="btn btn-primary" onclick="alert('Selected Professional Plan')">Select</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card shadow-lg border border-0 rounded-4">
                    <div class="card-body">
                        <h3 class="text-center">Enterprise Plan</h3>
                        <h4 class="price text-center" data-monthly="1500" data-yearly="18000">₹1,500/mo</h4>
                        <ul class="list-unstyled">
                            <li class="gap-2 m-2">✔️ Unlimited product uploads</li>
                            <li class="gap-2 m-2">✔️ Advanced inventory tracking</li>
                            <li class="gap-2 m-2">✔️ Customizable dealer website</li>
                            <li class="gap-2 m-2">✔️ Monthly performance reports</li>
                            <li class="gap-2 m-2">✔️ Priority email support</li>
                            <li class="gap-2 m-2">✔️ Access to marketing tools</li>
                            <li class="gap-2 m-2">✔️ Basic CRM features</li>
                            <li class="gap-2 m-2">✔️ Integration with popular payment gateways</li>
                            <li class="gap-2 m-2">✔️ Mobile-friendly interface</li>
                            <li class="gap-2 m-2">✔️ Advanced analytics dashboard</li>
                            <li class="gap-2 m-2">✔️ Access to multiple product categories (cars, bikes, houses, apartments, medicines)</li>
                            <li class="gap-2 m-2">✔️ Dedicated account manager</li>
                            <li class="gap-2 m-2">✔️ Enhanced security features</li>
                            <li class="gap-2 m-2">✔️ Custom API integrations</li>
                            <li class="gap-2 m-2">✔️ 24/7 priority phone support</li>
                            <li class="gap-2 m-2">✔️ Free training sessions for staff</li>
                            <li class="gap-2 m-2">✔️ Advanced marketing automation tools</li>
                        </ul>
                        <div class="d-grid gap-2 col-6 mx-auto">
                            <button class="btn btn-success" onclick="alert('Selected Enterprise Plan')">Select</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script>
        const monthlyRadio = document.getElementById('monthly');
        const yearlyRadio = document.getElementById('yearly');

        function updatePricing() {
            const prices = document.querySelectorAll('.price');
            prices.forEach(price => {
                const monthlyPrice = price.getAttribute('data-monthly');
                const yearlyPrice = price.getAttribute('data-yearly');
                price.textContent = (monthlyRadio.checked ? `₹${monthlyPrice}/mo` : `₹${yearlyPrice}/yr`);
            });
        }

        monthlyRadio.addEventListener('change', updatePricing);
        yearlyRadio.addEventListener('change', updatePricing);

        // Initial pricing update
        updatePricing();
    </script>
</body>

</html>