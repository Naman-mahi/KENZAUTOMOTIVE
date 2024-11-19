<?php include_once('../includes/userheader.php'); ?>
<link rel="stylesheet" href="../assets/css/usedcars.css">
<style>
    @media (max-width: 768px) {
        #filterPanel {
            max-height: 400px;
            /* Adjust as needed */
            overflow-y: auto;
            /* Enables vertical scrolling */
        }
    }
</style>

<body>
    <div class="container used-car-search-results my-5">
        <input type="hidden" name="dfp_city" id="dfp_city" />
        <input type="hidden" name="dfp_make" id="dfp_make" />
        <input type="hidden" name="dfp_model" id="dfp_model" />

        <h2 class="p-2 fw-bold" style="line-height: 20px">Used Cars For Sale In India</h2>
        <div class="search-count d-flex justify-content-between d-none d-md-flex">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="<?= BASE_URL ?>/user/index">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="<?= BASE_URL ?>/user/usedcars">Used Cars</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Used Cars For Sale In India</li>
                </ol>
            </nav>
            <div class="search-pagi-info">
                <strong>1&nbsp;-&nbsp;25</strong> of <strong>59,365</strong> Results
            </div>
        </div>

        <div class="container search-page-new">
            <div class="row">
                <div class="col-lg-3 col-md-4">
                    <!-- Button to show filters on small screens -->
                    <button class="btn btn-primary d-md-none mb-3" type="button" data-bs-toggle="collapse" data-bs-target="#filterPanel" aria-expanded="false" aria-controls="filterPanel">
                        <i class="fa fa-filter me-2"></i> Filters
                    </button>


                    <!-- Sidebar Filters - Accordion -->
                    <div class="collapse d-md-block" id="filterPanel">
                        <div class="accordion" id="filterAccordion">

                            <!-- Filter: Show Results By -->
                            <div class="accordion-item">
                                <h2 class="accordion-header iconhide" id="headingResultsBy">
                                    <button class="accordion-button no-arrow" type="button" aria-expanded="true" aria-controls="collapseResultsBy">
                                        Show Results By
                                    </button>
                                </h2>
                            </div>

                            <!-- Filter: Search by Keyword -->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingSearchByKeyword">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSearchByKeyword" aria-expanded="true" aria-controls="collapseSearchByKeyword">
                                        Search by Keyword
                                    </button>
                                </h2>
                                <div id="collapseSearchByKeyword" class="accordion-collapse collapse show" aria-labelledby="headingSearchByKeyword">
                                    <div class="accordion-body">
                                        <form id="search_key_form" action="/used-cars/search/-" method="get">
                                            <div class="input-group mb-3">
                                                <input type="text" name="search" placeholder="e.g. Honda in Mumbai" class="form-control rounded-pill" id="search-input" />
                                                <!-- <button type="submit" class="btn btn-primary">Go</button> -->
                                            </div>
                                            <input type="hidden" name="query_params" id="query_params" value="" />
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!-- Filter: City -->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingCity">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseCity" aria-expanded="true" aria-controls="collapseCity">
                                        City
                                    </button>
                                </h2>
                                <div id="collapseCity" class="accordion-collapse collapse show" aria-labelledby="headingCity">
                                    <div class="accordion-body">
                                        <ul class="list-unstyled">
                                            <li class="p-md-1">
                                                <label class="filter-check d-flex justify-content-between">
                                                    <div>
                                                        <input type="checkbox" /> Mumbai
                                                    </div>
                                                    <div>
                                                        <span class="bg-theme rounded-pill">15,324</span>
                                                    </div>
                                                </label>
                                            </li>
                                            <li class="p-md-1">
                                                <label class="filter-check d-flex justify-content-between">
                                                    <div>
                                                        <input type="checkbox" /> Delhi
                                                    </div>
                                                    <div>
                                                        <span class="bg-theme rounded-pill">12,876</span>
                                                    </div>
                                                </label>
                                            </li>
                                            <li class="p-md-1">
                                                <label class="filter-check d-flex justify-content-between">
                                                    <div>
                                                        <input type="checkbox" /> Bengaluru
                                                    </div>
                                                    <div>
                                                        <span class="bg-theme rounded-pill">9,652</span>
                                                    </div>
                                                </label>
                                            </li>
                                            <li class="p-md-1">
                                                <label class="filter-check d-flex justify-content-between">
                                                    <div>
                                                        <input type="checkbox" /> Hyderabad
                                                    </div>
                                                    <div>
                                                        <span class="bg-theme rounded-pill">8,112</span>
                                                    </div>
                                                </label>
                                            </li>
                                            <li class="p-md-1">
                                                <label class="filter-check d-flex justify-content-between">
                                                    <div>
                                                        <input type="checkbox" /> Chennai
                                                    </div>
                                                    <div>
                                                        <span class="bg-theme rounded-pill">7,345</span>
                                                    </div>
                                                </label>
                                            </li>
                                        </ul>
                                        <a href="#" id="toggleCityChoices" class="link-style btnchoice" data-bs-toggle="collapse" data-bs-target="#collapseMoreCities" aria-expanded="false" aria-controls="collapseMoreCities">Show More</a>
                                        <div id="collapseMoreCities" class="collapse mt-2">
                                            <ul class="list-unstyled">
                                                <li class="p-md-1">
                                                    <label class="filter-check d-flex justify-content-between">
                                                        <div>
                                                            <input type="checkbox" /> Ahmedabad
                                                        </div>
                                                        <div>
                                                            <span class="bg-theme rounded-pill">7,345</span>
                                                        </div>
                                                    </label>
                                                </li>
                                                <li class="p-md-1">
                                                    <label class="filter-check d-flex justify-content-between">
                                                        <div>
                                                            <input type="checkbox" /> Kolkata
                                                        </div>
                                                        <div>
                                                            <span class="bg-theme rounded-pill">7,345</span>
                                                        </div>
                                                    </label>
                                                </li>
                                                <li class="p-md-1">
                                                    <label class="filter-check d-flex justify-content-between">
                                                        <div>
                                                            <input type="checkbox" /> Pune
                                                        </div>
                                                        <div>
                                                            <span class="bg-theme rounded-pill">7,345</span>
                                                        </div>
                                                    </label>
                                                </li>
                                                <li class="p-md-1">
                                                    <label class="filter-check d-flex justify-content-between">
                                                        <div>
                                                            <input type="checkbox" /> Jaipur
                                                        </div>
                                                        <div>
                                                            <span class="bg-theme rounded-pill">7,345</span>
                                                        </div>
                                                    </label>
                                                </li>
                                                <li class="p-md-1">
                                                    <label class="filter-check d-flex justify-content-between">
                                                        <div>
                                                            <input type="checkbox" /> Surat
                                                        </div>
                                                        <div>
                                                            <span class="bg-theme rounded-pill">7,345</span>
                                                        </div>
                                                    </label>
                                                </li>
                                                <li class="p-md-1">
                                                    <label class="filter-check d-flex justify-content-between">
                                                        <div>
                                                            <input type="checkbox" /> Kanpur
                                                        </div>
                                                        <div>
                                                            <span class="bg-theme rounded-pill">7,345</span>
                                                        </div>
                                                    </label>
                                                </li>
                                                <li class="p-md-1">
                                                    <label class="filter-check d-flex justify-content-between">
                                                        <div>
                                                            <input type="checkbox" /> Nagpur
                                                        </div>
                                                        <div>
                                                            <span class="bg-theme rounded-pill">7,345</span>
                                                        </div>
                                                    </label>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Filter: Brand -->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingMake">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseMake" aria-expanded="true" aria-controls="collapseMake">
                                        Make
                                    </button>
                                </h2>
                                <div id="collapseMake" class="accordion-collapse collapse show" aria-labelledby="headingMake">
                                    <div class="accordion-body">
                                        <ul class="list-unstyled">
                                            <li class="p-md-1" title="Toyota Cars for Sale in India">
                                                <label class="filter-check d-flex justify-content-between">
                                                    <div>
                                                        <input type="checkbox" /> Toyota
                                                    </div>
                                                    <div>
                                                        <span class="count bg-theme rounded-pill">18,472</span>
                                                    </div>
                                                </label>
                                            </li>
                                            <li class="p-md-1" title="Suzuki Cars for Sale in India">
                                                <label class="filter-check d-flex justify-content-between">
                                                    <div>
                                                        <input type="checkbox" /> Suzuki
                                                    </div>
                                                    <span class="count bg-theme rounded-pill">16,666</span>
                                                </label>
                                            </li>
                                            <li class="p-md-1" title="Honda Cars for Sale in India p-md-1">
                                                <label class="filter-check d-flex justify-content-between">
                                                    <div>
                                                        <input type="checkbox" /> Honda
                                                    </div>
                                                    <span class="count bg-theme rounded-pill">11,931</span>
                                                </label>
                                            </li>
                                            <li class="p-md-1" title="Daihatsu Cars for Sale in India p-md-1">
                                                <label class="filter-check d-flex justify-content-between">
                                                    <div>
                                                        <input type="checkbox" /> Daihatsu
                                                    </div>
                                                    <div>
                                                        <span class="count bg-theme rounded-pill">3,078</span>
                                                    </div>
                                                </label>
                                            </li>
                                            <li class="p-md-1" title="Nissan Cars for Sale in India p-md-1">
                                                <label class="filter-check d-flex justify-content-between">
                                                    <div>
                                                        <input type="checkbox" /> Nissan
                                                    </div>
                                                    <span class="count bg-theme rounded-pill">1,735</span>
                                                </label>
                                            </li>
                                        </ul>
                                        <a href="#" id="toggleChoices" class="link-style btnchoice" data-bs-toggle="collapse" data-bs-target="#collapseMoreMakes" aria-expanded="false" aria-controls="collapseMoreMakes">Show More</a>
                                        <div id="collapseMoreMakes" class="collapse mt-2">
                                            <ul class="list-unstyled">
                                                <li class="p-md-1" title="Mazda Cars for Sale in India p-md-1">
                                                    <label class="filter-check d-flex justify-content-between">
                                                        <div>
                                                            <input type="checkbox" /> Mazda
                                                        </div>
                                                        <span class="count bg-theme rounded-pill">2,450</span>
                                                    </label>
                                                </li>
                                                <li class="p-md-1" title="Kia Cars for Sale in India p-md-1">
                                                    <label class="filter-check d-flex justify-content-between">
                                                        <div>
                                                            <input type="checkbox" /> Kia
                                                        </div>
                                                        <span class="count bg-theme rounded-pill">3,112</span>
                                                    </label>
                                                </li>
                                                <li class="p-md-1" title="Ford Cars for Sale in India p-md-1">
                                                    <label class="filter-check d-flex justify-content-between">
                                                        <div>
                                                            <input type="checkbox" /> Ford
                                                        </div>
                                                        <span class="count bg-theme rounded-pill">1,888</span>
                                                    </label>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Price Range Accordion Item -->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingPriceRange">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapsePriceRange" aria-expanded="true" aria-controls="collapsePriceRange">
                                        Price Range
                                    </button>
                                </h2>
                                <div id="collapsePriceRange" class="accordion-collapse collapse show" aria-labelledby="headingPriceRange">
                                    <div class="accordion-body">
                                        <div class="d-flex align-items-center">
                                            <div class="input-group flex-grow-1">
                                                <input type="text" name="pr_from" id="pr_from" maxlength="10" placeholder="From" class="form-control" />
                                                <span class="input-group-text">to</span>
                                                <input type="text" name="pr_to" id="pr_to" maxlength="10" placeholder="To" class="form-control" />
                                                <button type="submit" name="commit" id="pr-go" class="btn btn-primary" data-alias="pr" data-name="price range" data-min-text="Less" data-max-text="More">
                                                    Go
                                                </button>
                                            </div>
                                        </div>
                                        <div id="pr_hint" class="mt-2"></div>
                                    </div>
                                </div>
                            </div>
                            <!-- End of Price Range Accordion Item -->

                            <!-- Year Accordion Item -->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingYear">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseYear" aria-expanded="true" aria-controls="collapseYear">
                                        Year
                                    </button>
                                </h2>
                                <div id="collapseYear" class="accordion-collapse collapse show" aria-labelledby="headingYear">
                                    <div class="accordion-body">
                                        <div class="d-flex align-items-center">
                                            <div class="input-group flex-grow-1">
                                                <input type="text" name="yr_from" id="yr_from" maxlength="10" placeholder="From" class="form-control" />
                                                <span class="input-group-text">to</span>
                                                <input type="text" name="yr_to" id="yr_to" maxlength="10" placeholder="To" class="form-control" />
                                                <button type="submit" name="commit" id="yr-go" class="btn btn-primary" data-alias="yr" data-name="year" data-min-text="Earlier" data-max-text="Later">
                                                    Go
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End of Year Accordion Item -->


                            <!-- Mileage Accordion Item -->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingMileage">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseMileage" aria-expanded="true" aria-controls="collapseMileage">
                                        Mileage (Km)
                                    </button>
                                </h2>
                                <div id="collapseMileage" class="accordion-collapse collapse show" aria-labelledby="headingMileage">
                                    <div class="accordion-body">
                                        <div class="d-flex align-items-center">
                                            <div class="input-group mb-3 me-2 flex-grow-1">
                                                <input type="text" name="ml_from" id="ml_from" maxlength="10" placeholder="From" class="form-control" data-hintify='{"min":0,"max":1000000,"step":10000}' />
                                                <span class="input-group-text">to</span>
                                                <input type="text" name="ml_to" id="ml_to" maxlength="10" placeholder="To" class="form-control" data-hintify='{"min":0,"max":1000000,"step":10000}' />
                                                <button type="submit" name="commit" id="ml-go" class="btn btn-primary" data-alias="ml" data-name="mileage (km)" data-min-text="Less" data-max-text="More">
                                                    Go
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End of Mileage Accordion Item -->

                            <!-- Trusted Cars Accordion Item -->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingTrustedCars">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTrustedCars" aria-expanded="true" aria-controls="collapseTrustedCars">
                                        Trusted Cars
                                    </button>
                                </h2>
                                <div id="collapseTrustedCars" class="accordion-collapse collapse show" aria-labelledby="headingTrustedCars">
                                    <div class="accordion-body">
                                        <ul class="list-unstyled">
                                            <li title="Cars for Sale in India">
                                                <label class="filter-check d-flex justify-content-between">
                                                    <div>
                                                        <input type="checkbox" /> KenzWheels Inspected
                                                    </div>
                                                    <div>
                                                        <span class="count bg-theme rounded-pill">1,437</span>
                                                    </div>
                                                </label>
                                            </li>
                                            <li title="Cars for Sale in India">
                                                <label class="filter-check d-flex justify-content-between align-items-center">
                                                    <div>
                                                        <input type="checkbox" /> KenzWheels Certified
                                                    </div>
                                                    <div>
                                                        <span class="count bg-theme rounded-pill">488</span>
                                                    </div>
                                                </label>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- End of Trusted Cars Accordion Item -->

                            <!-- Transmission Accordion Item -->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingTransmission">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTransmission" aria-expanded="true" aria-controls="collapseTransmission">
                                        Transmission
                                    </button>
                                </h2>
                                <div id="collapseTransmission" class="accordion-collapse collapse show" aria-labelledby="headingTransmission">
                                    <div class="accordion-body">
                                        <ul class="list-unstyled">
                                            <li title="Cars for Sale in Pakistan">
                                                <label class="filter-check d-flex justify-content-between">
                                                    <div>
                                                        <input type="checkbox" /> Automatic
                                                    </div>
                                                    <div>
                                                        <span class="count bg-theme rounded-pill">34,041</span>
                                                    </div>
                                                </label>
                                            </li>
                                            <li title="Cars for Sale in Pakistan">
                                                <label class="filter-check d-flex justify-content-between">
                                                    <div>
                                                        <input type="checkbox" /> Manual
                                                    </div>
                                                    <div>
                                                        <span class="count bg-theme rounded-pill">25,324</span>
                                                    </div>
                                                </label>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- End of Transmission Accordion Item -->
                            <!-- Filter: Color -->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingColor">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseColor" aria-expanded="false" aria-controls="collapseColor">
                                        Color
                                    </button>
                                </h2>
                                <div id="collapseColor" class="accordion-collapse collapse" aria-labelledby="headingColor">
                                    <div class="accordion-body">
                                        <ul class="list-unstyled">
                                            <li class="p-md-1">
                                                <label class="filter-check d-flex justify-content-between">
                                                    <div>
                                                        <input type="checkbox" /> Black
                                                    </div>
                                                    <div>
                                                        <span class="bg-theme rounded-pill">2,123</span>
                                                    </div>
                                                </label>
                                            </li>
                                            <li class="p-md-1">
                                                <label class="filter-check d-flex justify-content-between">
                                                    <div>
                                                        <input type="checkbox" /> White
                                                    </div>
                                                    <div>
                                                        <span class="bg-theme rounded-pill">3,567</span>
                                                    </div>
                                                </label>
                                            </li>
                                            <li class="p-md-1">
                                                <label class="filter-check d-flex justify-content-between">
                                                    <div>
                                                        <input type="checkbox" /> Silver
                                                    </div>
                                                    <div>
                                                        <span class="bg-theme rounded-pill">1,478</span>
                                                    </div>
                                                </label>
                                            </li>
                                            <li class="p-md-1">
                                                <label class="filter-check d-flex justify-content-between">
                                                    <div>
                                                        <input type="checkbox" /> Red
                                                    </div>
                                                    <div>
                                                        <span class="bg-theme rounded-pill">982</span>
                                                    </div>
                                                </label>
                                            </li>
                                            <li class="p-md-1">
                                                <label class="filter-check d-flex justify-content-between">
                                                    <div>
                                                        <input type="checkbox" /> Blue
                                                    </div>
                                                    <div>
                                                        <span class="bg-theme rounded-pill">1,234</span>
                                                    </div>
                                                </label>
                                            </li>
                                        </ul>
                                        <a href="#" id="toggleColorChoices" class="link-style btnchoice" data-bs-toggle="collapse" data-bs-target="#collapseMoreColors" aria-expanded="false" aria-controls="collapseMoreColors">Show More</a>
                                        <div id="collapseMoreColors" class="collapse mt-2">
                                            <ul class="list-unstyled">
                                                <li class="p-md-1">
                                                    <label class="filter-check d-flex justify-content-between">
                                                        <div>
                                                            <input type="checkbox" /> Green
                                                        </div>
                                                        <div>
                                                            <span class="bg-theme rounded-pill">756</span>
                                                        </div>
                                                    </label>
                                                </li>
                                                <li class="p-md-1">
                                                    <label class="filter-check d-flex justify-content-between">
                                                        <div>
                                                            <input type="checkbox" /> Yellow
                                                        </div>
                                                        <div>
                                                            <span class="bg-theme rounded-pill">342</span>
                                                        </div>
                                                    </label>
                                                </li>
                                                <li class="p-md-1">
                                                    <label class="filter-check d-flex justify-content-between">
                                                        <div>
                                                            <input type="checkbox" /> Grey
                                                        </div>
                                                        <div>
                                                            <span class="bg-theme rounded-pill">965</span>
                                                        </div>
                                                    </label>
                                                </li>
                                                <li class="p-md-1">
                                                    <label class="filter-check d-flex justify-content-between">
                                                        <div>
                                                            <input type="checkbox" /> Brown
                                                        </div>
                                                        <div>
                                                            <span class="bg-theme rounded-pill">412</span>
                                                        </div>
                                                    </label>
                                                </li>
                                                <li class="p-md-1">
                                                    <label class="filter-check d-flex justify-content-between">
                                                        <div>
                                                            <input type="checkbox" /> Orange
                                                        </div>
                                                        <div>
                                                            <span class="bg-theme rounded-pill">195</span>
                                                        </div>
                                                    </label>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Filter: Engine Type -->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingEngineType">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEngineType" aria-expanded="false" aria-controls="collapseEngineType">
                                        Engine Type
                                    </button>
                                </h2>
                                <div id="collapseEngineType" class="accordion-collapse collapse" aria-labelledby="headingEngineType">
                                    <div class="accordion-body">
                                        <ul class="list-unstyled">
                                            <li class="p-md-1">
                                                <label class="filter-check d-flex justify-content-between">
                                                    <div>
                                                        <input type="checkbox" /> CNG
                                                    </div>
                                                    <div>
                                                        <span class="bg-theme rounded-pill">657</span>
                                                    </div>
                                                </label>
                                            </li>
                                            <li class="p-md-1">
                                                <label class="filter-check d-flex justify-content-between">
                                                    <div>
                                                        <input type="checkbox" /> Diesel
                                                    </div>
                                                    <div>
                                                        <span class="bg-theme rounded-pill">2,019</span>
                                                    </div>
                                                </label>
                                            </li>
                                            <li class="p-md-1">
                                                <label class="filter-check d-flex justify-content-between">
                                                    <div>
                                                        <input type="checkbox" /> Electric
                                                    </div>
                                                    <div>
                                                        <span class="bg-theme rounded-pill">431</span>
                                                    </div>
                                                </label>
                                            </li>
                                            <li class="p-md-1">
                                                <label class="filter-check d-flex justify-content-between">
                                                    <div>
                                                        <input type="checkbox" /> Hybrid
                                                    </div>
                                                    <div>
                                                        <span class="bg-theme rounded-pill">5,219</span>
                                                    </div>
                                                </label>
                                            </li>
                                            <li class="p-md-1">
                                                <label class="filter-check d-flex justify-content-between">
                                                    <div>
                                                        <input type="checkbox" /> Petrol
                                                    </div>
                                                    <div>
                                                        <span class="bg-theme rounded-pill">51,529</span>
                                                    </div>
                                                </label>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!--Ended Filter: Engine Type -->
                            <!-- Filter: Body Type -->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingBodyType">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseBodyType" aria-expanded="false" aria-controls="collapseBodyType">
                                        Body Type
                                    </button>
                                </h2>
                                <div id="collapseBodyType" class="accordion-collapse collapse" aria-labelledby="headingBodyType">
                                    <div class="accordion-body">
                                        <ul class="list-unstyled">
                                            <li class="p-md-1">
                                                <label class="filter-check d-flex justify-content-between">
                                                    <div>
                                                        <input type="checkbox" /> Hatchback
                                                    </div>
                                                    <div>
                                                        <span class="bg-theme rounded-pill">1,234</span> <!-- Example count -->
                                                    </div>
                                                </label>
                                            </li>
                                            <li class="p-md-1">
                                                <label class="filter-check d-flex justify-content-between">
                                                    <div>
                                                        <input type="checkbox" /> Sedan
                                                    </div>
                                                    <div>
                                                        <span class="bg-theme rounded-pill">2,456</span> <!-- Example count -->
                                                    </div>
                                                </label>
                                            </li>
                                            <li class="p-md-1">
                                                <label class="filter-check d-flex justify-content-between">
                                                    <div>
                                                        <input type="checkbox" /> SUV
                                                    </div>
                                                    <div>
                                                        <span class="bg-theme rounded-pill">3,678</span> <!-- Example count -->
                                                    </div>
                                                </label>
                                            </li>
                                            <li class="p-md-1">
                                                <label class="filter-check d-flex justify-content-between">
                                                    <div>
                                                        <input type="checkbox" /> MUV
                                                    </div>
                                                    <div>
                                                        <span class="bg-theme rounded-pill">789</span> <!-- Example count -->
                                                    </div>
                                                </label>
                                            </li>
                                            <li class="p-md-1">
                                                <label class="filter-check d-flex justify-content-between">
                                                    <div>
                                                        <input type="checkbox" /> Minivan
                                                    </div>
                                                    <div>
                                                        <span class="bg-theme rounded-pill">567</span> <!-- Example count -->
                                                    </div>
                                                </label>
                                            </li>
                                            <li class="p-md-1">
                                                <label class="filter-check d-flex justify-content-between">
                                                    <div>
                                                        <input type="checkbox" /> Hybrid
                                                    </div>
                                                    <div>
                                                        <span class="bg-theme rounded-pill">345</span> <!-- Example count -->
                                                    </div>
                                                </label>
                                            </li>
                                            <li class="p-md-1">
                                                <label class="filter-check d-flex justify-content-between">
                                                    <div>
                                                        <input type="checkbox" /> Pickup Truck
                                                    </div>
                                                    <div>
                                                        <span class="bg-theme rounded-pill">890</span> <!-- Example count -->
                                                    </div>
                                                </label>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- Ended Filter: Body Type -->
                            <!-- Filter: Seats -->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingSeats">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeats" aria-expanded="false" aria-controls="collapseSeats">
                                        Seats
                                    </button>
                                </h2>
                                <div id="collapseSeats" class="accordion-collapse collapse" aria-labelledby="headingSeats">
                                    <div class="accordion-body">
                                        <ul class="list-unstyled">
                                            <li class="p-md-1">
                                                <label class="filter-check d-flex justify-content-between">
                                                    <div>
                                                        <input type="checkbox" /> 2 Seater
                                                    </div>
                                                    <div>
                                                        <span class="bg-theme rounded-pill">123</span> <!-- Example count -->
                                                    </div>
                                                </label>
                                            </li>
                                            <li class="p-md-1">
                                                <label class="filter-check d-flex justify-content-between">
                                                    <div>
                                                        <input type="checkbox" /> 4 Seater
                                                    </div>
                                                    <div>
                                                        <span class="bg-theme rounded-pill">456</span> <!-- Example count -->
                                                    </div>
                                                </label>
                                            </li>
                                            <li class="p-md-1">
                                                <label class="filter-check d-flex justify-content-between">
                                                    <div>
                                                        <input type="checkbox" /> 5 Seater
                                                    </div>
                                                    <div>
                                                        <span class="bg-theme rounded-pill">789</span> <!-- Example count -->
                                                    </div>
                                                </label>
                                            </li>
                                            <li class="p-md-1">
                                                <label class="filter-check d-flex justify-content-between">
                                                    <div>
                                                        <input type="checkbox" /> 6 Seater
                                                    </div>
                                                    <div>
                                                        <span class="bg-theme rounded-pill">101</span> <!-- Example count -->
                                                    </div>
                                                </label>
                                            </li>
                                            <li class="p-md-1">
                                                <label class="filter-check d-flex justify-content-between">
                                                    <div>
                                                        <input type="checkbox" /> 7 Seater
                                                    </div>
                                                    <div>
                                                        <span class="bg-theme rounded-pill">202</span> <!-- Example count -->
                                                    </div>
                                                </label>
                                            </li>
                                            <li class="p-md-1">
                                                <label class="filter-check d-flex justify-content-between">
                                                    <div>
                                                        <input type="checkbox" /> 8 Seater
                                                    </div>
                                                    <div>
                                                        <span class="bg-theme rounded-pill">303</span> <!-- Example count -->
                                                    </div>
                                                </label>
                                            </li>
                                            <li class="p-md-1">
                                                <label class="filter-check d-flex justify-content-between">
                                                    <div>
                                                        <input type="checkbox" /> 9 Seater
                                                    </div>
                                                    <div>
                                                        <span class="bg-theme rounded-pill">404</span> <!-- Example count -->
                                                    </div>
                                                </label>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- Ended Filter: Seats -->
                            <!-- Filter: RTO -->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingRTO">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseRTO" aria-expanded="false" aria-controls="collapseRTO">
                                        RTO
                                    </button>
                                </h2>
                                <div id="collapseRTO" class="accordion-collapse collapse" aria-labelledby="headingRTO">
                                    <div class="accordion-body">
                                        <ul class="list-unstyled">
                                            <li class="p-md-1">
                                                <label class="filter-check d-flex justify-content-between">
                                                    <div>
                                                        <input type="checkbox" /> Telangana
                                                    </div>
                                                    <div>
                                                        <span class="bg-theme rounded-pill">123</span> <!-- Example count -->
                                                    </div>
                                                </label>
                                            </li>
                                            <li class="p-md-1">
                                                <label class="filter-check d-flex justify-content-between">
                                                    <div>
                                                        <input type="checkbox" /> Andhra Pradesh
                                                    </div>
                                                    <div>
                                                        <span class="bg-theme rounded-pill">456</span> <!-- Example count -->
                                                    </div>
                                                </label>
                                            </li>
                                            <li class="p-md-1">
                                                <label class="filter-check d-flex justify-content-between">
                                                    <div>
                                                        <input type="checkbox" /> Assam
                                                    </div>
                                                    <div>
                                                        <span class="bg-theme rounded-pill">789</span> <!-- Example count -->
                                                    </div>
                                                </label>
                                            </li>
                                            <li class="p-md-1">
                                                <label class="filter-check d-flex justify-content-between">
                                                    <div>
                                                        <input type="checkbox" /> Karnataka
                                                    </div>
                                                    <div>
                                                        <span class="bg-theme rounded-pill">101</span> <!-- Example count -->
                                                    </div>
                                                </label>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- Ended Filter: RTO -->
                            <!-- Seller Type Accordion Item -->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingSellerType">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSellerType" aria-expanded="false" aria-controls="collapseSellerType">
                                        Seller Type
                                    </button>
                                </h2>
                                <div id="collapseSellerType" class="accordion-collapse collapse" aria-labelledby="headingSellerType">
                                    <div class="accordion-body">
                                        <ul class="list-unstyled">
                                            <li title="Individuals">
                                                <label class="filter-check d-flex justify-content-between">
                                                    <div>
                                                        <input type="checkbox" /> Individuals
                                                    </div>
                                                    <span class="count bg-theme rounded-pill">913</span>
                                                </label>
                                            </li>
                                            <li title="Dealers">
                                                <label class="filter-check d-flex justify-content-between">
                                                    <div>
                                                        <input type="checkbox" /> Dealers
                                                    </div>
                                                    <span class="count bg-theme rounded-pill">8,452</span>
                                                </label>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- End of Seller Type Accordion Item -->


                        </div>
                    </div>
                </div>
                <!-- Search Results Area -->
                <div class="col-lg-9 col-md-8">
                    <!-- Add search results content here -->
                    <div class="search-heading mb-3 bg-white p-2">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="flex-grow-1 me-2" data-pjax-enable>
                                <span class="form-horizontal sort-by">
                                    <span class="sort-by-text">Sort By: </span>
                                    <select name="sortby" id="sortby" class="form-select d-inline-block w-auto">
                                        <option selected value="bumped_at-desc">Updated Date: Recent First</option>
                                        <option value="bumped_at-asc">Updated Date: Oldest First</option>
                                        <option value="price-asc">Price: Low to High</option>
                                        <option value="price-desc">Price: High to Low</option>
                                        <option value="model_year-desc">Model Year: Latest First</option>
                                        <option value="model_year-asc">Model Year: Oldest First</option>
                                        <option value="mileage-asc">Mileage: Low to High</option>
                                        <option value="mileage-desc">Mileage: High to Low</option>
                                    </select>
                                </span>
                            </div>
                            <!-- <div>
                            <div class="btn-group" role="group">
                                <button type="button" id="list" class="btn btn-sm btn-outline-secondary active">
                                    <i class="fa fa-th-list"></i> LIST
                                </button>
                                <button type="button" id="grid" class="btn btn-sm btn-outline-secondary">
                                    <i class="fa fa-th-large"></i> GRID
                                </button>
                            </div>
                        </div> -->
                        </div>
                    </div>

                    <div class="row charity d-flex justify-content-center align-items-center">

                    </div>

                </div>
            </div>
        </div>
    </div>
</body>

<?php require_once '../includes/userfooter.php' ?>

<script>
    document.getElementById('toggleCityChoices').addEventListener('click', function() {
        const expanded = this.getAttribute('aria-expanded') === 'true';
        this.textContent = expanded ? 'Show Less' : 'Show More';
    });
</script>

<script>
    document.getElementById('toggleChoices').addEventListener('click', function() {
        const expanded = this.getAttribute('aria-expanded') === 'true';
        this.textContent = expanded ? 'Show Less' : 'Show More';
    });
</script>
<script>
    document.getElementById('toggleColorChoices').addEventListener('click', function() {
        const expanded = this.getAttribute('aria-expanded') === 'true';
        this.textContent = expanded ? 'Show Less' : 'Show More';
    });


    const API_BASE_URL = '<?php echo API_BASE_URL; ?>';
    const ProductThumbnail = '<?php echo ProductThumbnail; ?>';
    const ProductImages = '<?php echo ProductImages; ?>';
    const BrandLogo = '<?php echo BrandLogo; ?>';
</script>


<script>
    $(document).ready(function() {
        // Fetch and display the products when the document is ready
        fetchProducts();
    });

    function fetchProducts() {
        $.ajax({
            url: `${API_BASE_URL}/oldcars`, // Use API_BASE_URL variable for the base URL
            type: 'GET',
            success: function(data) {
                if (data && data.status === 200 && Array.isArray(data.data)) {
                    // Display all the fetched products without any filtering
                    displayProducts(data.data);
                } else {
                    console.error('Invalid data format:', data);
                }
            },
            error: function(xhr, status, error) {
                console.error('Error fetching products:', error);
            }
        });
    }

    function fetchCity(dealerId) {
        return $.ajax({
            url: `${API_BASE_URL}/profile/${dealerId}`, // Use API_BASE_URL variable
            type: 'GET',
        }).then(response => {
            if (response && response.statuscode === 200 && response.user) {
                return response.user.city; // Access city from the user object
            } else {
                console.error('Invalid city data format:', response);
                return '';
            }
        }).catch(error => {
            console.error('Error fetching city:', error);
            return '';
        });
    }

    async function displayProducts(products) {
        // Create a single row for all items
        const row = $('<div class="row"></div>');

        for (let i = 0; i < products.length; i++) {
            const product = products[i];
            const city = await fetchCity(product.dealer_id); // Fetch city using dealer_id
            const mileage = product.combined_attributes.find(attr => attr.pf_name === "Mileage (MPG)")?.value || 'N/A';
            const fuelType = product.combined_attributes.find(attr => attr.pf_name === "Fuel Type")?.value || 'N/A';
            const transmissionType = product.combined_attributes.find(attr => attr.pf_name === "Transmission Type")?.value || 'N/A';

            // Check if the product image is available, otherwise use a placeholder image
            const imageUrl = product.product_image ? `${ProductThumbnail}${product.product_image}` : 'https://placehold.co/600x400?text=KenzWheels'; // Replace with actual placeholder image URL

            const item = `
            <div class="col-12 col-md-6 col-lg-4 item pb-3 search">
                <a href="viewproduct.php?product_id=${product.product_id}" class="text-decoration-none">
                    <div class="car-card">
                        <div class="car-img">
                            <img src="${imageUrl}" alt="${product.product_name}" class="img-fluid">
                        </div>
                        <div class="car-content">
                            <div class="car-content-inner">
                                <h5 class="car-title">${product.product_name}</h5>
                                <span class="small fw-bold" style="font-size: 0.8rem;">
                                    ${mileage} kms - ${fuelType} - ${transmissionType}
                                </span><br>
                                <div class="d-flex justify-content-between align-items-center">
                                   <p class="car-price mb-0">
    INR ${new Intl.NumberFormat('en-IN', { minimumFractionDigits: 2, maximumFractionDigits: 2 }).format(product.price)}
</p>

                                    <button class="btn p-0" title="Add to Wishlist">
                                        <i class="far fa-heart" style="font-size: 1.2rem;" aria-hidden="true"></i>
                                    </button>
                                </div>
                                <p class="car-city pb-0">
                                    <i class="fas fa-map-marker-alt" aria-hidden="true"></i> ${city}
                                </p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        `;

            row.append(item); // Append the item to the single row
        }

        $('.charity').append(row); // Append the row to the charity class
    }
</script>



<script>
    $(document).ready(function() {
        $("#search-input").on("keyup", function() {
            var searchText = $(this).val().toLowerCase();
            $(".search").each(function() {
                var cardContent = $(this).text().toLowerCase();
                if (cardContent.indexOf(searchText) == -1) {
                    $(this).hide();
                } else {
                    $(this).show();
                }
            });
        });
    });
</script>