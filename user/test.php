<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Enhanced Car Marketplace with Filters</title>
  <!-- Bootstrap 5.3 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
 
  <style>
    .filter-sidebar {
      position: sticky;
      top: 20px;
      height: 100vh;
    }
    .card-container {
      margin-top: 30px;
    }
  </style>
</head>
<body>
 
  <div class="container mt-5">
    <div class="row">
      <!-- Sidebar for Filters -->
      <div class="col-md-3 filter-sidebar">
        <div class="card">
          <div class="card-header">
            <h5>Filter Cars</h5>
          </div>
          <div class="card-body">
            <!-- Price Filter -->
            <h6>Price Range</h6>
            <input type="range" class="form-range" id="priceRange" min="1000" max="50000" step="1000" value="10000">
            <div class="d-flex justify-content-between">
              <span>$1000</span><span>$50000</span>
            </div>
 
            <!-- City Filter -->
            <h6 class="mt-3">City</h6>
            <select class="form-select" id="cityFilter">
              <option value="">All Cities</option>
              <option value="New York">New York</option>
              <option value="Los Angeles">Los Angeles</option>
              <option value="Chicago">Chicago</option>
              <option value="Houston">Houston</option>
            </select>
 
            <!-- Car Model Filter -->
            <h6 class="mt-3">Car Model</h6>
            <select class="form-select" id="modelFilter">
              <option value="">All Models</option>
              <option value="Toyota">Toyota</option>
              <option value="BMW">BMW</option>
              <option value="Audi">Audi</option>
              <option value="Mercedes">Mercedes</option>
            </select>
 
            <!-- Year Filter -->
            <h6 class="mt-3">Year of Manufacture</h6>
            <input type="range" class="form-range" id="yearRange" min="2000" max="2023" value="2010" step="1">
            <div class="d-flex justify-content-between">
              <span>2000</span><span>2023</span>
            </div>
 
            <!-- Car Type Filter -->
            <h6 class="mt-3">Car Type</h6>
            <select class="form-select" id="typeFilter">
              <option value="">All Types</option>
              <option value="Sedan">Sedan</option>
              <option value="SUV">SUV</option>
              <option value="Coupe">Coupe</option>
              <option value="Hatchback">Hatchback</option>
            </select>
 
            <!-- Fuel Type Filter -->
            <h6 class="mt-3">Fuel Type</h6>
            <select class="form-select" id="fuelFilter">
              <option value="">All Fuel Types</option>
              <option value="Gasoline">Gasoline</option>
              <option value="Diesel">Diesel</option>
              <option value="Electric">Electric</option>
            </select>
 
            <!-- Transmission Filter -->
            <h6 class="mt-3">Transmission</h6>
            <select class="form-select" id="transmissionFilter">
              <option value="">All Transmissions</option>
              <option value="Automatic">Automatic</option>
              <option value="Manual">Manual</option>
            </select>
 
            <!-- Mileage Filter -->
            <h6 class="mt-3">Mileage (km)</h6>
            <input type="range" class="form-range" id="mileageRange" min="0" max="200" step="5" value="200">
            <div class="d-flex justify-content-between">
              <span>0 km</span><span>200 km</span>
            </div>
          </div>
        </div>
      </div>
 
      <!-- Card Container for Car Listings -->
      <div class="col-md-9 card-container">
        <div class="row" id="carCardsContainer">
          <!-- Car Card 1 -->
          <div class="col-md-4 mb-4 car-card" data-price="18000" data-city="New York" data-model="Toyota" data-year="2015" data-type="Sedan" data-fuel="Gasoline" data-transmission="Automatic" data-mileage="5">
            <div class="card">
              <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Car 1">
              <div class="card-body">
                <h5 class="card-title">Toyota Corolla</h5>
                <p class="card-text">Price: $18,000</p>
                <p class="card-text">Location: New York</p>
                <p class="card-text">Model: Toyota</p>
                <p class="card-text">Year: 2015</p>
                <p class="card-text">Type: Sedan</p>
                <p class="card-text">Fuel: Gasoline</p>
                <p class="card-text">Transmission: Automatic</p>
                <p class="card-text">Mileage: 5 kmpl</p>
                <a href="#" class="btn btn-primary">View Details</a>
              </div>
            </div>
          </div>
 
          <!-- Car Card 2 -->
          <div class="col-md-4 mb-4 car-card" data-price="35000" data-city="Los Angeles" data-model="BMW" data-year="2020" data-type="SUV" data-fuel="Diesel" data-transmission="Manual" data-mileage="30">
            <div class="card">
              <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Car 2">
              <div class="card-body">
                <h5 class="card-title">BMW 3 Series</h5>
                <p class="card-text">Price: $35,000</p>
                <p class="card-text">Location: Los Angeles</p>
                <p class="card-text">Model: BMW</p>
                <p class="card-text">Year: 2020</p>
                <p class="card-text">Type: SUV</p>
                <p class="card-text">Fuel: Diesel</p>
                <p class="card-text">Transmission: Manual</p>
                <p class="card-text">Mileage: 30,000 km</p>
                <a href="#" class="btn btn-primary">View Details</a>
              </div>
            </div>
          </div>
 
          <!-- Car Card 3 -->
          <div class="col-md-4 mb-4 car-card" data-price="28000" data-city="Chicago" data-model="Audi" data-year="2018" data-type="Coupe" data-fuel="Electric" data-transmission="Automatic" data-mileage="15">
            <div class="card">
              <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Car 3">
              <div class="card-body">
                <h5 class="card-title">Audi A4</h5>
                <p class="card-text">Price: $28,000</p>
                <p class="card-text">Location: Chicago</p>
                <p class="card-text">Model: Audi</p>
                <p class="card-text">Year: 2018</p>
                <p class="card-text">Type: Coupe</p>
                <p class="card-text">Fuel: Electric</p>
                <p class="card-text">Transmission: Automatic</p>
                <p class="card-text">Mileage: 15,000 km</p>
                <a href="#" class="btn btn-primary">View Details</a>
              </div>
            </div>
          </div>
 
          <!-- Car Card 4 -->
          <div class="col-md-4 mb-4 car-card" data-price="24000" data-city="Houston" data-model="Mercedes" data-year="2017" data-type="SUV" data-fuel="Gasoline" data-transmission="Automatic" data-mileage="45000">
            <div class="card">
              <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Car 4">
              <div class="card-body">
                <h5 class="card-title">Mercedes GLC</h5>
                <p class="card-text">Price: $24,000</p>
                <p class="card-text">Location: Houston</p>
                <p class="card-text">Model: Mercedes</p>
                <p class="card-text">Year: 2017</p>
                <p class="card-text">Type: SUV</p>
                <p class="card-text">Fuel: Gasoline</p>
                <p class="card-text">Transmission: Automatic</p>
                <p class="card-text">Mileage: 45,000 km</p>
                <a href="#" class="btn btn-primary">View Details</a>
              </div>
            </div>
          </div>
 
          <!-- Car Card 5 -->
          <div class="col-md-4 mb-4 car-card" data-price="22000" data-city="New York" data-model="Honda" data-year="2019" data-type="Sedan" data-fuel="Diesel" data-transmission="Manual" data-mileage="30">
            <div class="card">
              <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Car 5">
              <div class="card-body">
                <h5 class="card-title">Honda Accord</h5>
                <p class="card-text">Price: $22,000</p>
                <p class="card-text">Location: New York</p>
                <p class="card-text">Model: Honda</p>
                <p class="card-text">Year: 2019</p>
                <p class="card-text">Type: Sedan</p>
                <p class="card-text">Fuel: Diesel</p>
                <p class="card-text">Transmission: Manual</p>
                <p class="card-text">Mileage: 30,000 km</p>
                <a href="#" class="btn btn-primary">View Details</a>
              </div>
            </div>
          </div>
 
          <!-- Car Card 6 -->
          <div class="col-md-4 mb-4 car-card" data-price="50000" data-city="Los Angeles" data-model="Porsche" data-year="2022" data-type="Coupe" data-fuel="Gasoline" data-transmission="Automatic" data-mileage="50">
            <div class="card">
              <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Car 6">
              <div class="card-body">
                <h5 class="card-title">Porsche 911</h5>
                <p class="card-text">Price: $50,000</p>
                <p class="card-text">Location: Los Angeles</p>
                <p class="card-text">Model: Porsche</p>
                <p class="card-text">Year: 2022</p>
                <p class="card-text">Type: Coupe</p>
                <p class="card-text">Fuel: Gasoline</p>
                <p class="card-text">Transmission: Automatic</p>
                <p class="card-text">Mileage: 5,000 km</p>
                <a href="#" class="btn btn-primary">View Details</a>
              </div>
            </div>
          </div>
 
          <!-- Car Card 7 -->
          <div class="col-md-4 mb-4 car-card" data-price="15000" data-city="Chicago" data-model="Ford" data-year="2016" data-type="Hatchback" data-fuel="Gasoline" data-transmission="Manual" data-mileage="60">
            <div class="card">
              <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Car 7">
              <div class="card-body">
                <h5 class="card-title">Ford Fiesta</h5>
                <p class="card-text">Price: $15,000</p>
                <p class="card-text">Location: Chicago</p>
                <p class="card-text">Model: Ford</p>
                <p class="card-text">Year: 2016</p>
                <p class="card-text">Type: Hatchback</p>
                <p class="card-text">Fuel: Gasoline</p>
                <p class="card-text">Transmission: Manual</p>
                <p class="card-text">Mileage: 60,000 km</p>
                <a href="#" class="btn btn-primary">View Details</a>
              </div>
            </div>
          </div>
 
          <!-- Car Card 8 -->
          <div class="col-md-4 mb-4 car-card" data-price="35000" data-city="Houston" data-model="Tesla" data-year="2021" data-type="SUV" data-fuel="Electric" data-transmission="Automatic" data-mileage="10">
            <div class="card">
              <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Car 8">
              <div class="card-body">
                <h5 class="card-title">Tesla Model X</h5>
                <p class="card-text">Price: $35,000</p>
                <p class="card-text">Location: Houston</p>
                <p class="card-text">Model: Tesla</p>
                <p class="card-text">Year: 2021</p>
                <p class="card-text">Type: SUV</p>
                <p class="card-text">Fuel: Electric</p>
                <p class="card-text">Transmission: Automatic</p>
                <p class="card-text">Mileage: 10,000 km</p>
                <a href="#" class="btn btn-primary">View Details</a>
              </div>
            </div>
          </div>
 
        </div>
      </div>
    </div>
  </div>
 
  <!-- Bootstrap 5.3 JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
 
  <script>
    // Function to filter the car listings
    function filterCars() {
      // Get filter values
      const priceRange = document.getElementById('priceRange').value;
      const cityFilter = document.getElementById('cityFilter').value.toLowerCase();
      const modelFilter = document.getElementById('modelFilter').value.toLowerCase();
      const yearRange = document.getElementById('yearRange').value;
      const typeFilter = document.getElementById('typeFilter').value.toLowerCase();
      const fuelFilter = document.getElementById('fuelFilter').value.toLowerCase();
      const transmissionFilter = document.getElementById('transmissionFilter').value.toLowerCase();
      const mileageRange = document.getElementById('mileageRange').value;
 
      // Get all car cards
      const carCards = document.querySelectorAll('.car-card');
      
      // Loop through all the car cards and hide/show based on filters
      carCards.forEach(card => {
        const carPrice = parseInt(card.getAttribute('data-price'));
        const carCity = card.getAttribute('data-city').toLowerCase();
        const carModel = card.getAttribute('data-model').toLowerCase();
        const carYear = parseInt(card.getAttribute('data-year'));
        const carType = card.getAttribute('data-type').toLowerCase();
        const carFuel = card.getAttribute('data-fuel').toLowerCase();
        const carTransmission = card.getAttribute('data-transmission').toLowerCase();
        const carMileage = parseInt(card.getAttribute('data-mileage'));
 
        // Check if the car matches all selected filters
        const matchesPrice = carPrice <= priceRange;
        const matchesCity = cityFilter === '' || carCity.includes(cityFilter);
        const matchesModel = modelFilter === '' || carModel.includes(modelFilter);
        const matchesYear = carYear >= yearRange;
        const matchesType = typeFilter === '' || carType.includes(typeFilter);
        const matchesFuel = fuelFilter === '' || carFuel.includes(fuelFilter);
        const matchesTransmission = transmissionFilter === '' || carTransmission.includes(transmissionFilter);
        const matchesMileage = carMileage <= mileageRange;
 
        // Show or hide the card based on the conditions
        if (matchesPrice && matchesCity && matchesModel && matchesYear && matchesType && matchesFuel && matchesTransmission && matchesMileage) {
          card.style.display = 'block';
        } else {
          card.style.display = 'none';
        }
      });
    }
 
    // Add event listeners to the filter elements
    document.getElementById('priceRange').addEventListener('input', filterCars);
    document.getElementById('cityFilter').addEventListener('change', filterCars);
    document.getElementById('modelFilter').addEventListener('change', filterCars);
    document.getElementById('yearRange').addEventListener('input', filterCars);
    document.getElementById('typeFilter').addEventListener('change', filterCars);
    document.getElementById('fuelFilter').addEventListener('change', filterCars);
    document.getElementById('transmissionFilter').addEventListener('change', filterCars);
    document.getElementById('mileageRange').addEventListener('input', filterCars);
 
    // Initial filter application on page load
    filterCars();
  </script>
</body>
</html>