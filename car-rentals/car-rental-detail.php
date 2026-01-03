    <?php include '../includes/header.php'; ?>
    <?php include('car-rental-fetch.php');
        include_once __DIR__ . '/../travel-panel/includes/connection.php';
    ?>

    <style>
        .booking-summary {
            background-color: #f8f9fa;
            border-left: 4px solid #3554d1;
        }

        .alert {
            padding: 12px 20px;
            border-radius: 4px;
            font-size: 14px;
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }


        /* ==========================================
            LIBRARY CSS (Include this in your style.css)
            ========================================== */
        :root {
            --modal-bg: rgba(0, 0, 0, 0.6);
            --modal-content-bg: #fff;
            --transition-speed: 0.3s;
        }

        /* The Backdrop (Overlay) */
        .my-modal {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: var(--modal-bg);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 1000;

            /* Hidden by default */
            opacity: 0;
            visibility: hidden;
            transition: all var(--transition-speed) ease-in-out;
        }

        /* When the modal is active */
        .my-modal.active {
            opacity: 1;
            visibility: visible;
        }

        /* The Modal Box */
        .my-modal-content {
            background: var(--modal-content-bg);
            padding: 2rem;
            border-radius: 8px;
            width: 90%;
            max-width: 500px;
            position: relative;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);

            /* Animation: Start slightly above */
            transform: translateY(-30px);
            transition: transform var(--transition-speed) ease-in-out;
        }

        .my-modal.active .my-modal-content {
            transform: translateY(0);
        }

        /* Close Button styling */
        .btn-close-modal {
            position: absolute;
            top: 10px;
            right: 15px;
            font-size: 1.5rem;
            cursor: pointer;
            border: none;
            background: none;
            line-height: 1;
        }
    </style>
    <section class="py-10 d-flex items-center bg-light-2">
        <div class="container">
            <div class="row y-gap-10 items-center justify-between">
                <div class="col-auto">
                    <div class="row x-gap-10 y-gap-5 items-center text-14 text-light-1">
                        <div class="col-auto">
                            <div class="">Home</div>
                        </div>
                        <div class="col-auto">
                            <div class="">></div>
                        </div>
                        <div class="col-auto">
                            <div class="">London Hotels</div>
                        </div>
                        <div class="col-auto">
                            <div class="">></div>
                        </div>
                        <div class="col-auto">
                            <div class="text-dark-1">Great Northern Hotel, a Tribute Portfolio Hotel, London</div>
                        </div>
                    </div>
                </div>

                <div class="col-auto">
                    <a href="#" class="text-14 text-blue-1 underline">All Hotel in London</a>
                </div>
            </div>
        </div>
    </section>

    <section class="pt-40">
        <div class="container">
            <div class="row y-gap-30">
                <div class="col-lg-8">
                    <div class="row y-gap-20 justify-between items-end">
                        <div class="col-auto">
                            <h1 class="text-30 sm:text-24 fw-600"><?= htmlspecialchars($carRentals['car_rental_title']) ?></h1>

                            <div class="row x-gap-10 items-center pt-10">
                                <div class="col-auto">
                                    <div class="d-flex x-gap-5 items-center">
                                        <i class="icon-location text-16 text-light-1"></i>
                                        <div class="text-15 text-light-1">Greater London, United Kingdom</div>
                                    </div>
                                </div>

                                <div class="col-auto">
                                    <button data-x-click="mapFilter" class="text-blue-1 text-15 underline">Show on map</button>
                                </div>
                            </div>
                        </div>

                        <div class="col-auto">
                            <div class="row x-gap-10 y-gap-10">
                                <div class="col-auto">
                                    <button class="button px-15 py-10 -blue-1">
                                        <i class="icon-share mr-10"></i>
                                        Share
                                    </button>
                                </div>

                                <div class="col-auto">
                                    <button class="button px-15 py-10 -blue-1 bg-light-2">
                                        <i class="icon-heart mr-10"></i>
                                        Save
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="carsSlider mt-40">

                        <div class="carsSlider-slides js-cars-slides">
                            <?php foreach ($CarImages as $index => $img): ?>
                                <div class="carsSlider-slides__item rounded-4 <?= $index === 0 ? '-is-active' : '' ?>">
                                    <img src="/travel-panel/assets/uploads/car-rentals/<?= $img ?>" alt="image">
                                </div>
                            <?php endforeach; ?>
                        </div>


                        <div class="carsSlider-slider">
                            <div class="js-cars-slider">
                                <div class="swiper-wrapper">
                                    <?php foreach ($CarImages as $index => $img): ?>
                                        <div class="swiper-slide">
                                            <img src="/travel-panel/assets/uploads/car-rentals/<?= $img ?>" alt="image" class="rounded-4">
                                        </div>
                                    <?php endforeach; ?>

                                </div>
                            </div>
                        </div>



                    </div>


                </div>

                <div class="col-lg-4">
                    <div class="d-flex justify-end">
                        <div class="px-30 py-30 rounded-4 border-light shadow-4 bg-white w-360 lg:w-full">
                            <div class="row y-gap-15 items-center justify-between">
                                <div class="col-auto">
                                    <div class="text-14 text-light-1">
                                        From
                                        <span class="text-20 fw-500 text-dark-1 ml-5">US $<?= htmlspecialchars($carRentals['car_rental_price']) ?></span>
                                    </div>
                                </div>
                            </div>

                            <div class="row y-gap-20 pt-20">
                                <div class="col-12">

                                    <div class="searchMenu-loc px-20 py-10 border-light rounded-4 js-form-dd js-liverSearch">

                                        <div data-x-dd-click="searchMenu-loc">
                                            <h4 class="text-15 fw-500 ls-2 lh-16">Pick up location</h4>

                                            <div class="text-15 text-light-1 ls-2 lh-16">
                                                <p><?= htmlspecialchars($carRentals['pickup_location'] ?? '', ENT_QUOTES) ?></p>
                                            </div>
                                        </div>



                                    </div>

                                </div>

                                <div class="col-12">

                                    <div class="searchMenu-loc px-20 py-10 border-light rounded-4 js-form-dd js-liverSearch">

                                        <div data-x-dd-click="searchMenu-loc">
                                            <h4 class="text-15 fw-500 ls-2 lh-16">Drop off location</h4>

                                            <div class="text-15 text-light-1 ls-2 lh-16">
                                                <p><?= htmlspecialchars($carRentals['dropoff_location'] ?? '', ENT_QUOTES) ?></p>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <!-- PICKUP DATE & TIME -->
                                <div class="col-12">
                                    <div class="searchMenu-date px-20 py-10 border-light rounded-4 -right js-form-dd js-calendar js-calendar-el">
                                        <div>
                                            <h4 class="text-15 fw-500 ls-2 lh-16">Pick up</h4>
                                            <div class="capitalize text-15 text-light-1 ls-2 lh-16">
                                                <input type="text" id="pickupDateTime" placeholder="Select pickup date & time" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- DROPOFF DATE & TIME -->
                                <div class="col-12">
                                    <div class="searchMenu-date px-20 py-10 border-light rounded-4 -right js-form-dd js-calendar js-calendar-el">
                                        <div>
                                            <h4 class="text-15 fw-500 ls-2 lh-16">Drop off</h4>
                                            <div class="capitalize text-15 text-light-1 ls-2 lh-16">
                                                <input type="text" id="dropoffDateTime" placeholder="Select dropoff date & time" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- CAR QUANTITY -->
                                <div class="col-12">
                                    <div class="searchMenu-guests px-20 py-10 border-light rounded-4 js-form-dd">
                                        <div class="row y-gap-10 justify-between items-center">
                                            <div class="col-auto">
                                                <div class="text-15 fw-500">Quantity</div>
                                            </div>
                                            <div class="col-auto">
                                                <div class="d-flex items-center">
                                                    <button type="button" class="button -outline-blue-1 text-blue-1 size-38 rounded-4" id="decreaseCar">
                                                        <i class="icon-minus text-12"></i>
                                                    </button>
                                                    <div class="flex-center size-20 ml-15 mr-15">
                                                        <div class="text-15" id="CarCount">1</div>
                                                    </div>
                                                    <button type="button" class="button -outline-blue-1 text-blue-1 size-38 rounded-4" id="increaseCar">
                                                        <i class="icon-plus text-12"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <button data-modal-target="#modal-car" class="button -dark-1 py-15 px-35 h-60 col-12 rounded-4 bg-yellow-1 text-dark-1 mt-20">
                                    Book Now
                                </button>
                            </div>




                            <div id="modal-car" class="my-modal">
  <div class="my-modal-content">
    <button class="btn-close-modal" data-close-modal>&times;</button>
    <div class="modal-header">
      <h5 class="modal-title">Complete Your Car Rental Booking</h5>
    </div>
    <div class="modal-body">
      <form id="booking-form-car" class="booking-form-car">
        <div class="row">
          <div class="col-lg-12">
            <!-- Booking Summary -->
            <div class="booking-summary p-3 bg-light rounded mb-3">
              <h6 class="fw-bold">Booking Summary:</h6>
              <p class="mb-1"><strong>Car:</strong> <?= htmlspecialchars($carRentals['car_rental_title']) ?></p>
              <p class="mb-1"><strong>Capacity:</strong> <?= htmlspecialchars($carRentals['car_capacity']) ?> persons</p>
              <p class="mb-1"><strong>Route:</strong> <span class="selected-route"><?= htmlspecialchars($carRentals['pickup_location']) ?> → <?= htmlspecialchars($carRentals['dropoff_location']) ?></span></p>
              <p class="mb-1"><strong>Pickup:</strong> <span class="selected-pickup-date">Not selected</span></p>
              <p class="mb-1"><strong>Dropoff:</strong> <span class="selected-dropoff-date">Not selected</span></p>
              <p class="mb-1"><strong>Duration:</strong> <span class="selected-duration">-</span></p>
              <p class="mb-1"><strong>Cars:</strong> <span class="selected-cars">Not selected</span></p>
              <p class="mb-0"><strong>Total Price:</strong> <span class="display-total-price-car">$0</span></p>
            </div>

            <!-- Hidden Fields (auto-filled) -->
            <input type="hidden" name="car_rental_id" value="<?= $carRentals['id'] ?>">
            <input type="hidden" name="pickup_location" value="<?= htmlspecialchars($carRentals['pickup_location']) ?>">
            <input type="hidden" name="dropoff_location" value="<?= htmlspecialchars($carRentals['dropoff_location']) ?>">
            <input type="hidden" name="pickup_datetime" class="hidden-pickup-datetime">
            <input type="hidden" name="dropoff_datetime" class="hidden-dropoff-datetime">
            <input type="hidden" name="total_price" class="hidden-total-price-car" value="0">
            <input type="hidden" name="number_of_cars" class="hidden-car-count" value="0">

            <!-- Name Field -->
            <div class="form-input">
              <input type="text" name="booking_name" required>
              <label class="lh-1 text-16 text-light-1">Full Name *</label>
            </div>

            <!-- Email -->
            <div class="form-input mt-20">
              <input type="email" name="booking_email" required>
              <label class="col-form-label">Email *</label>
            </div>

            <!-- Phone -->
            <div class="form-input mt-20">
              <input type="tel" name="booking_phone" required>
              <label class="col-form-label">Phone *</label>
            </div>
          </div>

          <!-- Adults -->
          <div class="col-lg-6">
            <div class="form-input mt-20">
              <input type="number" name="booking_adults" min="1" value="1" required>
              <label class="col-form-label">Number of Adults *</label>
            </div>
          </div>

          <!-- Children -->
          <div class="col-lg-6">
            <div class="form-input mt-20">
              <input type="number" name="booking_children" min="0" value="0">
              <label class="col-form-label">Number of Children</label>
            </div>
          </div>
        </div>

        <!-- Error/Success Messages -->
        <div class="alert-message mt-20" style="display:none;"></div>
      </form>
    </div>
    <div class="modal-footer d-flex justify-center">
      <button type="button" class="btn-book-car-now button -md -dark-1 bg-yellow-1 text-dark-1 mt-20">
        Book Now
      </button>
    </div>
  </div>
</div>


                        </div>
                    </div>
                </div>
            </div>

        </div>


        </div>
    </section>

    <section class="pt-40">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div>
                        <h3 class="text-22 fw-500">
                            Property highlights
                        </h3>

                        <div class="row y-gap-30 justify-between pt-20">

                            <div class="col-md-auto col-6">
                                <div class="d-flex">
                                    <i class="icon-user-2 text-22 text-dark-1 mr-10"></i>
                                    <div class="text-15 lh-15">
                                        User<br> 4
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-auto col-6">
                                <div class="d-flex">
                                    <i class="icon-luggage text-22 text-dark-1 mr-10"></i>
                                    <div class="text-15 lh-15">
                                        Luggage<br> 2
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-auto col-6">
                                <div class="d-flex">
                                    <i class="icon-transmission text-22 text-dark-1 mr-10"></i>
                                    <div class="text-15 lh-15">
                                        Transmission<br> Automatic
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-auto col-6">
                                <div class="d-flex">
                                    <i class="icon-speedometer text-22 text-dark-1 mr-10"></i>
                                    <div class="text-15 lh-15">
                                        Mileage<br> Unlimited
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="border-top-light mt-40 mb-40"></div>

                    <div>
                        <h3 class="text-22 fw-500">Overview</h3>
                        <p class="text-dark-1 text-15 mt-20">
                            Unless you hire a car, visiting Stonehenge, Bath, and Windsor Castle in one day is next to impossible. Designed specifically for travelers with limited time in London, this tour allows you to check off a range of southern England's historical attractions in just one day by eliminating the hassle of traveling between each one independently. Travel by comfortable coach and witness your guide bring each UNESCO World Heritage Site to life with commentary. Plus, all admission tickets are included in the tour price.
                        </p>
                        <a href="#" class="d-block text-14 text-blue-1 fw-500 underline mt-10">Show More</a>

                        <div class="mt-60 lg:mt-40 md:mt-30">
                            <h5 class="text-16 fw-500">Highlights</h5>
                            <ul class="list-disc text-15 mt-10">
                                <li>Travel between the UNESCO World Heritage sites aboard a comfortable coach</li>
                                <li>Explore with a guide to delve deeper into the history</li>
                                <li>Great for history buffs and travelers with limited time</li>
                            </ul>
                        </div>
                    </div>

                    <div class="border-top-light mt-40 mb-40"></div>

                    <div>
                        <h3 class="text-22 fw-500">Specifications</h3>

                        <div class="col-xl-9">
                            <div class="row y-gap-30 pt-15">

                                <div class="col-sm-4">
                                    <div class="fw-500">Make</div>
                                    <div class="text-15">Honda</div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="fw-500">Model</div>
                                    <div class="text-15">Honda</div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="fw-500">Made Year</div>
                                    <div class="text-15">2022</div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="fw-500">Mileage</div>
                                    <div class="text-15">120,556</div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="fw-500">Mileage</div>
                                    <div class="text-15">120,556</div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="fw-500">Version</div>
                                    <div class="text-15">2.0 Turbo</div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="fw-500">Horsepower (hp)</div>
                                    <div class="text-15">200</div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="fw-500">Transmission</div>
                                    <div class="text-15">Auto</div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="fw-500">Condition</div>
                                    <div class="text-15">New</div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="border-top-light mt-40 mb-40"></div>

                    <div>
                        <h3 class="text-22 fw-500">Amenities</h3>

                        <div class="row y-gap-10 pt-15">

                            <div class="col-sm-5">
                                <div class="d-flex items-center">
                                    <i class="icon-check text-10 mr-15"></i>
                                    <div class="text-15">Airbag</div>
                                </div>
                            </div>

                            <div class="col-sm-5">
                                <div class="d-flex items-center">
                                    <i class="icon-check text-10 mr-15"></i>
                                    <div class="text-15">FM Radio</div>
                                </div>
                            </div>

                            <div class="col-sm-5">
                                <div class="d-flex items-center">
                                    <i class="icon-check text-10 mr-15"></i>
                                    <div class="text-15">Power Windows</div>
                                </div>
                            </div>

                            <div class="col-sm-5">
                                <div class="d-flex items-center">
                                    <i class="icon-check text-10 mr-15"></i>
                                    <div class="text-15">Sensor</div>
                                </div>
                            </div>

                            <div class="col-sm-5">
                                <div class="d-flex items-center">
                                    <i class="icon-check text-10 mr-15"></i>
                                    <div class="text-15">Speed Km</div>
                                </div>
                            </div>

                            <div class="col-sm-5">
                                <div class="d-flex items-center">
                                    <i class="icon-check text-10 mr-15"></i>
                                    <div class="text-15">Steering Wheel</div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="border-top-light mt-40"></div>
                </div>
            </div>
        </div>
    </section>



    <div class="mt-40"></div>

    <section>
        <div class="container">
            <div class="row y-gap-20">
                <div class="col-lg-4">
                    <h2 class="text-22 fw-500">FAQs about<br> The Crown Hotel</h2>
                </div>

                <div class="col-lg-8">
                    <div class="accordion -simple row y-gap-20 js-accordion">

                        <div class="col-12">
                            <div class="accordion__item px-20 py-20 border-light rounded-4">
                                <div class="accordion__button d-flex items-center">
                                    <div class="accordion__icon size-40 flex-center bg-light-2 rounded-full mr-20">
                                        <i class="icon-plus"></i>
                                        <i class="icon-minus"></i>
                                    </div>

                                    <div class="button text-dark-1">What do I need to hire a car?</div>
                                </div>

                                <div class="accordion__content">
                                    <div class="pt-20 pl-60">
                                        <p class="text-15">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="accordion__item px-20 py-20 border-light rounded-4">
                                <div class="accordion__button d-flex items-center">
                                    <div class="accordion__icon size-40 flex-center bg-light-2 rounded-full mr-20">
                                        <i class="icon-plus"></i>
                                        <i class="icon-minus"></i>
                                    </div>

                                    <div class="button text-dark-1">How old do I have to be to rent a car?</div>
                                </div>

                                <div class="accordion__content">
                                    <div class="pt-20 pl-60">
                                        <p class="text-15">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="accordion__item px-20 py-20 border-light rounded-4">
                                <div class="accordion__button d-flex items-center">
                                    <div class="accordion__icon size-40 flex-center bg-light-2 rounded-full mr-20">
                                        <i class="icon-plus"></i>
                                        <i class="icon-minus"></i>
                                    </div>

                                    <div class="button text-dark-1">Can I book a hire car for someone else?</div>
                                </div>

                                <div class="accordion__content">
                                    <div class="pt-20 pl-60">
                                        <p class="text-15">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="accordion__item px-20 py-20 border-light rounded-4">
                                <div class="accordion__button d-flex items-center">
                                    <div class="accordion__icon size-40 flex-center bg-light-2 rounded-full mr-20">
                                        <i class="icon-plus"></i>
                                        <i class="icon-minus"></i>
                                    </div>

                                    <div class="button text-dark-1">How do I find the cheapest car hire deal?</div>
                                </div>

                                <div class="accordion__content">
                                    <div class="pt-20 pl-60">
                                        <p class="text-15">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="accordion__item px-20 py-20 border-light rounded-4">
                                <div class="accordion__button d-flex items-center">
                                    <div class="accordion__icon size-40 flex-center bg-light-2 rounded-full mr-20">
                                        <i class="icon-plus"></i>
                                        <i class="icon-minus"></i>
                                    </div>

                                    <div class="button text-dark-1">What should I look for when I&#39;m choosing a car?</div>
                                </div>

                                <div class="accordion__content">
                                    <div class="pt-20 pl-60">
                                        <p class="text-15">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container mt-40 mb-40">
        <div class="border-top-light"></div>
    </div>

    <section>
        <div class="container">
            <div class="row y-gap-40 justify-between">
                <div class="col-xl-3">
                    <h3 class="text-22 fw-500">Guest reviews</h3>

                    <div class="d-flex items-center mt-20">
                        <div class="flex-center bg-yellow-1 rounded-4 size-70 text-22 fw-600 text-dark-1">4.8</div>
                        <div class="ml-20">
                            <div class="text-16 text-dark-1 fw-500 lh-14">Exceptional</div>
                            <div class="text-15 text-light-1 lh-14 mt-4">3,014 reviews</div>
                        </div>
                    </div>

                    <div class="row y-gap-20 pt-20">

                        <div class="col-12">
                            <div class="">
                                <div class="d-flex items-center justify-between">
                                    <div class="text-15 fw-500">Excellent</div>
                                    <div class="text-15 text-light-1">1,050</div>
                                </div>

                                <div class="progressBar mt-10">
                                    <div class="progressBar__bg bg-blue-2"></div>
                                    <div class="progressBar__bar bg-yellow-1" style="width: 80%"></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="">
                                <div class="d-flex items-center justify-between">
                                    <div class="text-15 fw-500">Very good</div>
                                    <div class="text-15 text-light-1">341</div>
                                </div>

                                <div class="progressBar mt-10">
                                    <div class="progressBar__bg bg-blue-2"></div>
                                    <div class="progressBar__bar bg-yellow-1" style="width: 70%"></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="">
                                <div class="d-flex items-center justify-between">
                                    <div class="text-15 fw-500">Average</div>
                                    <div class="text-15 text-light-1">100</div>
                                </div>

                                <div class="progressBar mt-10">
                                    <div class="progressBar__bg bg-blue-2"></div>
                                    <div class="progressBar__bar bg-yellow-1" style="width: 60%"></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="">
                                <div class="d-flex items-center justify-between">
                                    <div class="text-15 fw-500">Poor</div>
                                    <div class="text-15 text-light-1">20</div>
                                </div>

                                <div class="progressBar mt-10">
                                    <div class="progressBar__bg bg-blue-2"></div>
                                    <div class="progressBar__bar bg-yellow-1" style="width: 50%"></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="">
                                <div class="d-flex items-center justify-between">
                                    <div class="text-15 fw-500">Terrible</div>
                                    <div class="text-15 text-light-1">40</div>
                                </div>

                                <div class="progressBar mt-10">
                                    <div class="progressBar__bg bg-blue-2"></div>
                                    <div class="progressBar__bar bg-yellow-1" style="width: 40%"></div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-xl-8">
                    <div class="row y-gap-40">


                        <div class="col-12">
                            <div class="row x-gap-20 y-gap-20 items-center">
                                <div class="col-auto">
                                    <img src="img/avatars/2.png" alt="image">
                                </div>
                                <div class="col-auto">
                                    <div class="fw-500 lh-15">Tonko</div>
                                    <div class="text-14 text-light-1 lh-15">March 2022</div>
                                </div>
                            </div>

                            <h5 class="fw-500 text-blue-1 mt-20">9.2 Superb</h5>
                            <p class="text-15 text-dark-1 mt-10">Nice two level apartment in great London location. Located in quiet small street, but just 50 meters from main street and bus stop. Tube station is short walk, just like two grocery stores. </p>


                            <div class="row x-gap-30 y-gap-30 pt-20">

                                <div class="col-auto">
                                    <img src="img/testimonials/1/1.png" alt="image" class="rounded-4">
                                </div>

                                <div class="col-auto">
                                    <img src="img/testimonials/1/2.png" alt="image" class="rounded-4">
                                </div>

                                <div class="col-auto">
                                    <img src="img/testimonials/1/3.png" alt="image" class="rounded-4">
                                </div>

                                <div class="col-auto">
                                    <img src="img/testimonials/1/4.png" alt="image" class="rounded-4">
                                </div>

                            </div>


                            <div class="d-flex x-gap-30 items-center pt-20">
                                <button class="d-flex items-center text-blue-1">
                                    <i class="icon-like text-16 mr-10"></i>
                                    Helpful
                                </button>

                                <button class="d-flex items-center text-light-1">
                                    <i class="icon-dislike text-16 mr-10"></i>
                                    Not helpful
                                </button>
                            </div>
                        </div>


                        <div class="col-12">
                            <div class="row x-gap-20 y-gap-20 items-center">
                                <div class="col-auto">
                                    <img src="img/avatars/2.png" alt="image">
                                </div>
                                <div class="col-auto">
                                    <div class="fw-500 lh-15">Tonko</div>
                                    <div class="text-14 text-light-1 lh-15">March 2022</div>
                                </div>
                            </div>

                            <h5 class="fw-500 text-blue-1 mt-20">9.2 Superb</h5>
                            <p class="text-15 text-dark-1 mt-10">Nice two level apartment in great London location. Located in quiet small street, but just 50 meters from main street and bus stop. Tube station is short walk, just like two grocery stores. </p>


                            <div class="row x-gap-30 y-gap-30 pt-20">

                                <div class="col-auto">
                                    <img src="img/testimonials/1/1.png" alt="image" class="rounded-4">
                                </div>

                                <div class="col-auto">
                                    <img src="img/testimonials/1/2.png" alt="image" class="rounded-4">
                                </div>

                                <div class="col-auto">
                                    <img src="img/testimonials/1/3.png" alt="image" class="rounded-4">
                                </div>

                                <div class="col-auto">
                                    <img src="img/testimonials/1/4.png" alt="image" class="rounded-4">
                                </div>

                            </div>


                            <div class="d-flex x-gap-30 items-center pt-20">
                                <button class="d-flex items-center text-blue-1">
                                    <i class="icon-like text-16 mr-10"></i>
                                    Helpful
                                </button>

                                <button class="d-flex items-center text-light-1">
                                    <i class="icon-dislike text-16 mr-10"></i>
                                    Not helpful
                                </button>
                            </div>
                        </div>


                        <div class="col-12">
                            <div class="row x-gap-20 y-gap-20 items-center">
                                <div class="col-auto">
                                    <img src="img/avatars/2.png" alt="image">
                                </div>
                                <div class="col-auto">
                                    <div class="fw-500 lh-15">Tonko</div>
                                    <div class="text-14 text-light-1 lh-15">March 2022</div>
                                </div>
                            </div>

                            <h5 class="fw-500 text-blue-1 mt-20">9.2 Superb</h5>
                            <p class="text-15 text-dark-1 mt-10">Nice two level apartment in great London location. Located in quiet small street, but just 50 meters from main street and bus stop. Tube station is short walk, just like two grocery stores. </p>


                            <div class="d-flex x-gap-30 items-center pt-20">
                                <button class="d-flex items-center text-blue-1">
                                    <i class="icon-like text-16 mr-10"></i>
                                    Helpful
                                </button>

                                <button class="d-flex items-center text-light-1">
                                    <i class="icon-dislike text-16 mr-10"></i>
                                    Not helpful
                                </button>
                            </div>
                        </div>


                        <div class="col-12">
                            <div class="row x-gap-20 y-gap-20 items-center">
                                <div class="col-auto">
                                    <img src="img/avatars/2.png" alt="image">
                                </div>
                                <div class="col-auto">
                                    <div class="fw-500 lh-15">Tonko</div>
                                    <div class="text-14 text-light-1 lh-15">March 2022</div>
                                </div>
                            </div>

                            <h5 class="fw-500 text-blue-1 mt-20">9.2 Superb</h5>
                            <p class="text-15 text-dark-1 mt-10">Nice two level apartment in great London location. Located in quiet small street, but just 50 meters from main street and bus stop. Tube station is short walk, just like two grocery stores. </p>


                            <div class="d-flex x-gap-30 items-center pt-20">
                                <button class="d-flex items-center text-blue-1">
                                    <i class="icon-like text-16 mr-10"></i>
                                    Helpful
                                </button>

                                <button class="d-flex items-center text-light-1">
                                    <i class="icon-dislike text-16 mr-10"></i>
                                    Not helpful
                                </button>
                            </div>
                        </div>


                        <div class="col-auto">

                            <a href="#" class="button -md -outline-blue-1 text-blue-1">
                                Show all 116 reviews <div class="icon-arrow-top-right ml-15"></div>
                            </a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container mt-40 mb-40">
        <div class="border-top-light"></div>
    </div>

    <section>
        <div class="container">
            <div class="row y-gap-30 justify-between">
                <div class="col-xl-3">
                    <div class="row">
                        <div class="col-auto">
                            <h3 class="text-22 fw-500">Leave a Reply</h3>
                            <p class="text-15 text-dark-1 mt-5">Your email address will not be published.</p>
                        </div>
                    </div>

                    <div class="row y-gap-30 pt-30">

                        <div class="col-sm-6">
                            <div class="text-15 lh-1 fw-500">Location</div>
                            <div class="d-flex x-gap-5 items-center pt-10">

                                <div class="icon-star text-10 text-yellow-1"></div>

                                <div class="icon-star text-10 text-yellow-1"></div>

                                <div class="icon-star text-10 text-yellow-1"></div>

                                <div class="icon-star text-10 text-yellow-1"></div>

                                <div class="icon-star text-10 text-yellow-1"></div>

                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="text-15 lh-1 fw-500">Staff</div>
                            <div class="d-flex x-gap-5 items-center pt-10">

                                <div class="icon-star text-10 text-yellow-1"></div>

                                <div class="icon-star text-10 text-yellow-1"></div>

                                <div class="icon-star text-10 text-yellow-1"></div>

                                <div class="icon-star text-10 text-yellow-1"></div>

                                <div class="icon-star text-10 text-yellow-1"></div>

                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="text-15 lh-1 fw-500">Cleanliness</div>
                            <div class="d-flex x-gap-5 items-center pt-10">

                                <div class="icon-star text-10 text-yellow-1"></div>

                                <div class="icon-star text-10 text-yellow-1"></div>

                                <div class="icon-star text-10 text-yellow-1"></div>

                                <div class="icon-star text-10 text-yellow-1"></div>

                                <div class="icon-star text-10 text-yellow-1"></div>

                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="text-15 lh-1 fw-500">Value for money</div>
                            <div class="d-flex x-gap-5 items-center pt-10">

                                <div class="icon-star text-10 text-yellow-1"></div>

                                <div class="icon-star text-10 text-yellow-1"></div>

                                <div class="icon-star text-10 text-yellow-1"></div>

                                <div class="icon-star text-10 text-yellow-1"></div>

                                <div class="icon-star text-10 text-yellow-1"></div>

                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="text-15 lh-1 fw-500">Comfort</div>
                            <div class="d-flex x-gap-5 items-center pt-10">

                                <div class="icon-star text-10 text-yellow-1"></div>

                                <div class="icon-star text-10 text-yellow-1"></div>

                                <div class="icon-star text-10 text-yellow-1"></div>

                                <div class="icon-star text-10 text-yellow-1"></div>

                                <div class="icon-star text-10 text-yellow-1"></div>

                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="text-15 lh-1 fw-500">Facilities</div>
                            <div class="d-flex x-gap-5 items-center pt-10">

                                <div class="icon-star text-10 text-yellow-1"></div>

                                <div class="icon-star text-10 text-yellow-1"></div>

                                <div class="icon-star text-10 text-yellow-1"></div>

                                <div class="icon-star text-10 text-yellow-1"></div>

                                <div class="icon-star text-10 text-yellow-1"></div>

                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="text-15 lh-1 fw-500">Free WiFi</div>
                            <div class="d-flex x-gap-5 items-center pt-10">

                                <div class="icon-star text-10 text-yellow-1"></div>

                                <div class="icon-star text-10 text-yellow-1"></div>

                                <div class="icon-star text-10 text-yellow-1"></div>

                                <div class="icon-star text-10 text-yellow-1"></div>

                                <div class="icon-star text-10 text-yellow-1"></div>

                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-xl-8">
                    <div class="row y-gap-30">
                        <div class="col-xl-6">

                            <div class="form-input ">
                                <input type="text" required>
                                <label class="lh-1 text-16 text-light-1">Text</label>
                            </div>

                        </div>
                        <div class="col-xl-6">

                            <div class="form-input ">
                                <input type="text" required>
                                <label class="lh-1 text-16 text-light-1">Email</label>
                            </div>

                        </div>
                        <div class="col-12">

                            <div class="form-input ">
                                <textarea required rows="6"></textarea>
                                <label class="lh-1 text-16 text-light-1">Write Your Comment</label>
                            </div>

                        </div>
                        <div class="col-auto">

                            <a href="#" class="button -md -dark-1 bg-blue-1 text-white">
                                Post Comment <div class="icon-arrow-top-right ml-15"></div>
                            </a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="layout-pt-lg"></div>



    <div class="mapFilter" data-x="mapFilter" data-x-toggle="-is-active">
        <div class="mapFilter__overlay"></div>

        <div class="mapFilter__close">
            <button class="button -blue-1 size-40 bg-white shadow-2" data-x-click="mapFilter">
                <i class="icon-close text-15"></i>
            </button>
        </div>

        <div class="mapFilter__grid" data-x="mapFilter__grid" data-x-toggle="-filters-hidden">
            <div class="mapFilter-filter scroll-bar-1">
                <div class="px-20 py-20 md:px-15 md:py-15">
                    <div class="d-flex items-center justify-between">
                        <div class="text-18 fw-500">Filters</div>

                        <button class="size-40 flex-center rounded-full bg-blue-1" data-x-click="mapFilter__grid">
                            <i class="icon-chevron-left text-12 text-white"></i>
                        </button>
                    </div>

                    <div class="mapFilter-filter__item">
                        <h5 class="text-18 fw-500 mb-10">Popular Filters</h5>
                        <div class="sidebar-checkbox">

                            <div class="row y-gap-10 items-center justify-between">
                                <div class="col-auto">
                                    <div class="d-flex items-center">
                                        <div class="form-checkbox">
                                            <input type="checkbox">
                                            <div class="form-checkbox__mark">
                                                <div class="form-checkbox__icon icon-check"></div>
                                            </div>
                                        </div>
                                        <div class="text-15 ml-10">Breakfast Included</div>
                                    </div>
                                </div>

                                <div class="col-auto">
                                    <div class="text-15 text-light-1">92</div>
                                </div>
                            </div>

                            <div class="row y-gap-10 items-center justify-between">
                                <div class="col-auto">
                                    <div class="d-flex items-center">
                                        <div class="form-checkbox">
                                            <input type="checkbox">
                                            <div class="form-checkbox__mark">
                                                <div class="form-checkbox__icon icon-check"></div>
                                            </div>
                                        </div>
                                        <div class="text-15 ml-10">Romantic</div>
                                    </div>
                                </div>

                                <div class="col-auto">
                                    <div class="text-15 text-light-1">45</div>
                                </div>
                            </div>

                            <div class="row y-gap-10 items-center justify-between">
                                <div class="col-auto">
                                    <div class="d-flex items-center">
                                        <div class="form-checkbox">
                                            <input type="checkbox">
                                            <div class="form-checkbox__mark">
                                                <div class="form-checkbox__icon icon-check"></div>
                                            </div>
                                        </div>
                                        <div class="text-15 ml-10">Airport Transfer</div>
                                    </div>
                                </div>

                                <div class="col-auto">
                                    <div class="text-15 text-light-1">21</div>
                                </div>
                            </div>

                            <div class="row y-gap-10 items-center justify-between">
                                <div class="col-auto">
                                    <div class="d-flex items-center">
                                        <div class="form-checkbox">
                                            <input type="checkbox">
                                            <div class="form-checkbox__mark">
                                                <div class="form-checkbox__icon icon-check"></div>
                                            </div>
                                        </div>
                                        <div class="text-15 ml-10">WiFi Included </div>
                                    </div>
                                </div>

                                <div class="col-auto">
                                    <div class="text-15 text-light-1">78</div>
                                </div>
                            </div>

                            <div class="row y-gap-10 items-center justify-between">
                                <div class="col-auto">
                                    <div class="d-flex items-center">
                                        <div class="form-checkbox">
                                            <input type="checkbox">
                                            <div class="form-checkbox__mark">
                                                <div class="form-checkbox__icon icon-check"></div>
                                            </div>
                                        </div>
                                        <div class="text-15 ml-10">5 Star</div>
                                    </div>
                                </div>

                                <div class="col-auto">
                                    <div class="text-15 text-light-1">679</div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="mapFilter-filter__item">
                        <h5 class="text-18 fw-500 mb-10">Nightly Price</h5>
                        <div class="row x-gap-10 y-gap-30">
                            <div class="col-12">
                                <div class="js-price-rangeSlider">
                                    <div class="text-14 fw-500"></div>

                                    <div class="d-flex justify-between mb-20">
                                        <div class="text-15 text-dark-1">
                                            <span class="js-lower"></span>
                                            -
                                            <span class="js-upper"></span>
                                        </div>
                                    </div>

                                    <div class="px-5">
                                        <div class="js-slider"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mapFilter-filter__item">
                        <h5 class="text-18 fw-500 mb-10">Amenities</h5>
                        <div class="sidebar-checkbox">

                            <div class="row y-gap-10 items-center justify-between">
                                <div class="col-auto">

                                    <div class="d-flex items-center">
                                        <div class="form-checkbox ">
                                            <input type="checkbox" name="name">
                                            <div class="form-checkbox__mark">
                                                <div class="form-checkbox__icon icon-check"></div>
                                            </div>
                                        </div>

                                        <div class="text-15 ml-10">Breakfast Included</div>

                                    </div>

                                </div>

                                <div class="col-auto">
                                    <div class="text-15 text-light-1">92</div>
                                </div>
                            </div>

                            <div class="row y-gap-10 items-center justify-between">
                                <div class="col-auto">

                                    <div class="d-flex items-center">
                                        <div class="form-checkbox ">
                                            <input type="checkbox" name="name">
                                            <div class="form-checkbox__mark">
                                                <div class="form-checkbox__icon icon-check"></div>
                                            </div>
                                        </div>

                                        <div class="text-15 ml-10">WiFi Included </div>

                                    </div>

                                </div>

                                <div class="col-auto">
                                    <div class="text-15 text-light-1">45</div>
                                </div>
                            </div>

                            <div class="row y-gap-10 items-center justify-between">
                                <div class="col-auto">

                                    <div class="d-flex items-center">
                                        <div class="form-checkbox ">
                                            <input type="checkbox" name="name">
                                            <div class="form-checkbox__mark">
                                                <div class="form-checkbox__icon icon-check"></div>
                                            </div>
                                        </div>

                                        <div class="text-15 ml-10">Pool</div>

                                    </div>

                                </div>

                                <div class="col-auto">
                                    <div class="text-15 text-light-1">21</div>
                                </div>
                            </div>

                            <div class="row y-gap-10 items-center justify-between">
                                <div class="col-auto">

                                    <div class="d-flex items-center">
                                        <div class="form-checkbox ">
                                            <input type="checkbox" name="name">
                                            <div class="form-checkbox__mark">
                                                <div class="form-checkbox__icon icon-check"></div>
                                            </div>
                                        </div>

                                        <div class="text-15 ml-10">Restaurant </div>

                                    </div>

                                </div>

                                <div class="col-auto">
                                    <div class="text-15 text-light-1">78</div>
                                </div>
                            </div>

                            <div class="row y-gap-10 items-center justify-between">
                                <div class="col-auto">

                                    <div class="d-flex items-center">
                                        <div class="form-checkbox ">
                                            <input type="checkbox" name="name">
                                            <div class="form-checkbox__mark">
                                                <div class="form-checkbox__icon icon-check"></div>
                                            </div>
                                        </div>

                                        <div class="text-15 ml-10">Air conditioning </div>

                                    </div>

                                </div>

                                <div class="col-auto">
                                    <div class="text-15 text-light-1">679</div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="mapFilter-filter__item">
                        <h5 class="text-18 fw-500 mb-10">Star Rating</h5>
                        <div class="row x-gap-10 y-gap-10 pt-10">

                            <div class="col-auto">
                                <a href="#" class="button -blue-1 bg-blue-1-05 text-blue-1 py-5 px-20 rounded-100">1</a>
                            </div>

                            <div class="col-auto">
                                <a href="#" class="button -blue-1 bg-blue-1-05 text-blue-1 py-5 px-20 rounded-100">2</a>
                            </div>

                            <div class="col-auto">
                                <a href="#" class="button -blue-1 bg-blue-1-05 text-blue-1 py-5 px-20 rounded-100">3</a>
                            </div>

                            <div class="col-auto">
                                <a href="#" class="button -blue-1 bg-blue-1-05 text-blue-1 py-5 px-20 rounded-100">4</a>
                            </div>

                            <div class="col-auto">
                                <a href="#" class="button -blue-1 bg-blue-1-05 text-blue-1 py-5 px-20 rounded-100">5</a>
                            </div>

                        </div>
                    </div>

                    <div class="mapFilter-filter__item">
                        <h5 class="text-18 fw-500 mb-10">Guest Rating</h5>
                        <div class="sidebar-checkbox">

                            <div class="row y-gap-10 items-center justify-between">
                                <div class="col-auto">

                                    <div class="form-radio d-flex items-center ">
                                        <div class="radio">
                                            <input type="radio" name="name">
                                            <div class="radio__mark">
                                                <div class="radio__icon"></div>
                                            </div>
                                        </div>
                                        <div class="ml-10">Any</div>
                                    </div>

                                </div>

                                <div class="col-auto">
                                    <div class="text-15 text-light-1">92</div>
                                </div>
                            </div>

                            <div class="row y-gap-10 items-center justify-between">
                                <div class="col-auto">

                                    <div class="form-radio d-flex items-center ">
                                        <div class="radio">
                                            <input type="radio" name="name">
                                            <div class="radio__mark">
                                                <div class="radio__icon"></div>
                                            </div>
                                        </div>
                                        <div class="ml-10">Wonderful 4.5+</div>
                                    </div>

                                </div>

                                <div class="col-auto">
                                    <div class="text-15 text-light-1">45</div>
                                </div>
                            </div>

                            <div class="row y-gap-10 items-center justify-between">
                                <div class="col-auto">

                                    <div class="form-radio d-flex items-center ">
                                        <div class="radio">
                                            <input type="radio" name="name">
                                            <div class="radio__mark">
                                                <div class="radio__icon"></div>
                                            </div>
                                        </div>
                                        <div class="ml-10">Very good 4+</div>
                                    </div>

                                </div>

                                <div class="col-auto">
                                    <div class="text-15 text-light-1">21</div>
                                </div>
                            </div>

                            <div class="row y-gap-10 items-center justify-between">
                                <div class="col-auto">

                                    <div class="form-radio d-flex items-center ">
                                        <div class="radio">
                                            <input type="radio" name="name">
                                            <div class="radio__mark">
                                                <div class="radio__icon"></div>
                                            </div>
                                        </div>
                                        <div class="ml-10">Good 3.5+ </div>
                                    </div>

                                </div>

                                <div class="col-auto">
                                    <div class="text-15 text-light-1">78</div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="mapFilter-filter__item">
                        <h5 class="text-18 fw-500 mb-10">Style</h5>
                        <div class="sidebar-checkbox">

                            <div class="row y-gap-10 items-center justify-between">
                                <div class="col-auto">

                                    <div class="d-flex items-center">
                                        <div class="form-checkbox ">
                                            <input type="checkbox" name="name">
                                            <div class="form-checkbox__mark">
                                                <div class="form-checkbox__icon icon-check"></div>
                                            </div>
                                        </div>

                                        <div class="text-15 ml-10">Budget</div>

                                    </div>

                                </div>

                                <div class="col-auto">
                                    <div class="text-15 text-light-1">92</div>
                                </div>
                            </div>

                            <div class="row y-gap-10 items-center justify-between">
                                <div class="col-auto">

                                    <div class="d-flex items-center">
                                        <div class="form-checkbox ">
                                            <input type="checkbox" name="name">
                                            <div class="form-checkbox__mark">
                                                <div class="form-checkbox__icon icon-check"></div>
                                            </div>
                                        </div>

                                        <div class="text-15 ml-10">Mid-range </div>

                                    </div>

                                </div>

                                <div class="col-auto">
                                    <div class="text-15 text-light-1">45</div>
                                </div>
                            </div>

                            <div class="row y-gap-10 items-center justify-between">
                                <div class="col-auto">

                                    <div class="d-flex items-center">
                                        <div class="form-checkbox ">
                                            <input type="checkbox" name="name">
                                            <div class="form-checkbox__mark">
                                                <div class="form-checkbox__icon icon-check"></div>
                                            </div>
                                        </div>

                                        <div class="text-15 ml-10">Luxury</div>

                                    </div>

                                </div>

                                <div class="col-auto">
                                    <div class="text-15 text-light-1">21</div>
                                </div>
                            </div>

                            <div class="row y-gap-10 items-center justify-between">
                                <div class="col-auto">

                                    <div class="d-flex items-center">
                                        <div class="form-checkbox ">
                                            <input type="checkbox" name="name">
                                            <div class="form-checkbox__mark">
                                                <div class="form-checkbox__icon icon-check"></div>
                                            </div>
                                        </div>

                                        <div class="text-15 ml-10">Family-friendly </div>

                                    </div>

                                </div>

                                <div class="col-auto">
                                    <div class="text-15 text-light-1">78</div>
                                </div>
                            </div>

                            <div class="row y-gap-10 items-center justify-between">
                                <div class="col-auto">

                                    <div class="d-flex items-center">
                                        <div class="form-checkbox ">
                                            <input type="checkbox" name="name">
                                            <div class="form-checkbox__mark">
                                                <div class="form-checkbox__icon icon-check"></div>
                                            </div>
                                        </div>

                                        <div class="text-15 ml-10">Business </div>

                                    </div>

                                </div>

                                <div class="col-auto">
                                    <div class="text-15 text-light-1">679</div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="mapFilter-filter__item">
                        <h5 class="text-18 fw-500 mb-10">Neighborhood</h5>
                        <div class="sidebar-checkbox">

                            <div class="row y-gap-10 items-center justify-between">
                                <div class="col-auto">

                                    <div class="d-flex items-center">
                                        <div class="form-checkbox ">
                                            <input type="checkbox" name="name">
                                            <div class="form-checkbox__mark">
                                                <div class="form-checkbox__icon icon-check"></div>
                                            </div>
                                        </div>

                                        <div class="text-15 ml-10">Central London</div>

                                    </div>

                                </div>

                                <div class="col-auto">
                                    <div class="text-15 text-light-1">92</div>
                                </div>
                            </div>

                            <div class="row y-gap-10 items-center justify-between">
                                <div class="col-auto">

                                    <div class="d-flex items-center">
                                        <div class="form-checkbox ">
                                            <input type="checkbox" name="name">
                                            <div class="form-checkbox__mark">
                                                <div class="form-checkbox__icon icon-check"></div>
                                            </div>
                                        </div>

                                        <div class="text-15 ml-10">Guests&#39; favourite area </div>

                                    </div>

                                </div>

                                <div class="col-auto">
                                    <div class="text-15 text-light-1">45</div>
                                </div>
                            </div>

                            <div class="row y-gap-10 items-center justify-between">
                                <div class="col-auto">

                                    <div class="d-flex items-center">
                                        <div class="form-checkbox ">
                                            <input type="checkbox" name="name">
                                            <div class="form-checkbox__mark">
                                                <div class="form-checkbox__icon icon-check"></div>
                                            </div>
                                        </div>

                                        <div class="text-15 ml-10">Westminster Borough</div>

                                    </div>

                                </div>

                                <div class="col-auto">
                                    <div class="text-15 text-light-1">21</div>
                                </div>
                            </div>

                            <div class="row y-gap-10 items-center justify-between">
                                <div class="col-auto">

                                    <div class="d-flex items-center">
                                        <div class="form-checkbox ">
                                            <input type="checkbox" name="name">
                                            <div class="form-checkbox__mark">
                                                <div class="form-checkbox__icon icon-check"></div>
                                            </div>
                                        </div>

                                        <div class="text-15 ml-10">Kensington and Chelsea </div>

                                    </div>

                                </div>

                                <div class="col-auto">
                                    <div class="text-15 text-light-1">78</div>
                                </div>
                            </div>

                            <div class="row y-gap-10 items-center justify-between">
                                <div class="col-auto">

                                    <div class="d-flex items-center">
                                        <div class="form-checkbox ">
                                            <input type="checkbox" name="name">
                                            <div class="form-checkbox__mark">
                                                <div class="form-checkbox__icon icon-check"></div>
                                            </div>
                                        </div>

                                        <div class="text-15 ml-10">Oxford Street </div>

                                    </div>

                                </div>

                                <div class="col-auto">
                                    <div class="text-15 text-light-1">679</div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="mapFilter-results scroll-bar-1">
                <div class="px-20 py-20 md:px-15 md:py-15">
                    <div class="row y-gap-10 justify-between">
                        <div class="col-auto">
                            <div class="text-14 text-light-1">
                                <span class="text-dark-1 text-15 fw-500">3,269 properties</span>
                                in Europe
                            </div>
                        </div>

                        <div class="col-auto">
                            <button class="button -blue-1 h-40 px-20 md:px-5 text-blue-1 bg-blue-1-05 rounded-100">
                                <i class="icon-up-down mr-10"></i>
                                Top picks for your search
                            </button>
                        </div>
                    </div>


                    <div class="mapFilter-results__item">
                        <div class="row x-gap-20 y-gap-20">
                            <div class="col-md-auto">
                                <div class="ratio ratio-1:1 size-120">
                                    <img src="img/hotels/1.png" alt="image" class="img-ratio rounded-4">
                                </div>
                            </div>

                            <div class="col-md">
                                <div class="row x-gap-20 y-gap-10 justify-between">
                                    <div class="col-lg">
                                        <h4 class="text-16 lh-17 fw-500">
                                            Great Northern Hotel, a Tribute Portfolio Hotel, London
                                            <span class="text-10 text-yellow-2">
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                            </span>
                                        </h4>
                                    </div>

                                    <div class="col-auto">
                                        <button class="button -blue-1 size-30 flex-center bg-light-2 rounded-full">
                                            <i class="icon-heart text-12"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="row y-gap-10 justify-between items-end pt-24 lg:pt-15">
                                    <div class="col-auto">
                                        <div class="d-flex items-center">
                                            <div class="size-38 rounded-4 flex-center bg-blue-1">
                                                <span class="text-14 fw-600 text-white">4.8</span>
                                            </div>

                                            <div class="ml-10">
                                                <div class="text-13 lh-14 fw-500">Exceptional</div>
                                                <div class="text-12 lh-14 text-light-1">3,014 reviews</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-auto">
                                        <div class="d-flex items-center">
                                            <div class="text-14 text-light-1 mr-10">8 nights</div>
                                            <div class="fw-500">US$72</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mapFilter-results__item">
                        <div class="row x-gap-20 y-gap-20">
                            <div class="col-md-auto">
                                <div class="ratio ratio-1:1 size-120">
                                    <img src="img/hotels/1.png" alt="image" class="img-ratio rounded-4">
                                </div>
                            </div>

                            <div class="col-md">
                                <div class="row x-gap-20 y-gap-10 justify-between">
                                    <div class="col-lg">
                                        <h4 class="text-16 lh-17 fw-500">
                                            Great Northern Hotel, a Tribute Portfolio Hotel, London
                                            <span class="text-10 text-yellow-2">
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                            </span>
                                        </h4>
                                    </div>

                                    <div class="col-auto">
                                        <button class="button -blue-1 size-30 flex-center bg-light-2 rounded-full">
                                            <i class="icon-heart text-12"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="row y-gap-10 justify-between items-end pt-24 lg:pt-15">
                                    <div class="col-auto">
                                        <div class="d-flex items-center">
                                            <div class="size-38 rounded-4 flex-center bg-blue-1">
                                                <span class="text-14 fw-600 text-white">4.8</span>
                                            </div>

                                            <div class="ml-10">
                                                <div class="text-13 lh-14 fw-500">Exceptional</div>
                                                <div class="text-12 lh-14 text-light-1">3,014 reviews</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-auto">
                                        <div class="d-flex items-center">
                                            <div class="text-14 text-light-1 mr-10">8 nights</div>
                                            <div class="fw-500">US$72</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mapFilter-results__item">
                        <div class="row x-gap-20 y-gap-20">
                            <div class="col-md-auto">
                                <div class="ratio ratio-1:1 size-120">
                                    <img src="img/hotels/1.png" alt="image" class="img-ratio rounded-4">
                                </div>
                            </div>

                            <div class="col-md">
                                <div class="row x-gap-20 y-gap-10 justify-between">
                                    <div class="col-lg">
                                        <h4 class="text-16 lh-17 fw-500">
                                            Great Northern Hotel, a Tribute Portfolio Hotel, London
                                            <span class="text-10 text-yellow-2">
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                            </span>
                                        </h4>
                                    </div>

                                    <div class="col-auto">
                                        <button class="button -blue-1 size-30 flex-center bg-light-2 rounded-full">
                                            <i class="icon-heart text-12"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="row y-gap-10 justify-between items-end pt-24 lg:pt-15">
                                    <div class="col-auto">
                                        <div class="d-flex items-center">
                                            <div class="size-38 rounded-4 flex-center bg-blue-1">
                                                <span class="text-14 fw-600 text-white">4.8</span>
                                            </div>

                                            <div class="ml-10">
                                                <div class="text-13 lh-14 fw-500">Exceptional</div>
                                                <div class="text-12 lh-14 text-light-1">3,014 reviews</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-auto">
                                        <div class="d-flex items-center">
                                            <div class="text-14 text-light-1 mr-10">8 nights</div>
                                            <div class="fw-500">US$72</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mapFilter-results__item">
                        <div class="row x-gap-20 y-gap-20">
                            <div class="col-md-auto">
                                <div class="ratio ratio-1:1 size-120">
                                    <img src="img/hotels/1.png" alt="image" class="img-ratio rounded-4">
                                </div>
                            </div>

                            <div class="col-md">
                                <div class="row x-gap-20 y-gap-10 justify-between">
                                    <div class="col-lg">
                                        <h4 class="text-16 lh-17 fw-500">
                                            Great Northern Hotel, a Tribute Portfolio Hotel, London
                                            <span class="text-10 text-yellow-2">
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                            </span>
                                        </h4>
                                    </div>

                                    <div class="col-auto">
                                        <button class="button -blue-1 size-30 flex-center bg-light-2 rounded-full">
                                            <i class="icon-heart text-12"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="row y-gap-10 justify-between items-end pt-24 lg:pt-15">
                                    <div class="col-auto">
                                        <div class="d-flex items-center">
                                            <div class="size-38 rounded-4 flex-center bg-blue-1">
                                                <span class="text-14 fw-600 text-white">4.8</span>
                                            </div>

                                            <div class="ml-10">
                                                <div class="text-13 lh-14 fw-500">Exceptional</div>
                                                <div class="text-12 lh-14 text-light-1">3,014 reviews</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-auto">
                                        <div class="d-flex items-center">
                                            <div class="text-14 text-light-1 mr-10">8 nights</div>
                                            <div class="fw-500">US$72</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mapFilter-results__item">
                        <div class="row x-gap-20 y-gap-20">
                            <div class="col-md-auto">
                                <div class="ratio ratio-1:1 size-120">
                                    <img src="img/hotels/1.png" alt="image" class="img-ratio rounded-4">
                                </div>
                            </div>

                            <div class="col-md">
                                <div class="row x-gap-20 y-gap-10 justify-between">
                                    <div class="col-lg">
                                        <h4 class="text-16 lh-17 fw-500">
                                            Great Northern Hotel, a Tribute Portfolio Hotel, London
                                            <span class="text-10 text-yellow-2">
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                            </span>
                                        </h4>
                                    </div>

                                    <div class="col-auto">
                                        <button class="button -blue-1 size-30 flex-center bg-light-2 rounded-full">
                                            <i class="icon-heart text-12"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="row y-gap-10 justify-between items-end pt-24 lg:pt-15">
                                    <div class="col-auto">
                                        <div class="d-flex items-center">
                                            <div class="size-38 rounded-4 flex-center bg-blue-1">
                                                <span class="text-14 fw-600 text-white">4.8</span>
                                            </div>

                                            <div class="ml-10">
                                                <div class="text-13 lh-14 fw-500">Exceptional</div>
                                                <div class="text-12 lh-14 text-light-1">3,014 reviews</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-auto">
                                        <div class="d-flex items-center">
                                            <div class="text-14 text-light-1 mr-10">8 nights</div>
                                            <div class="fw-500">US$72</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mapFilter-results__item">
                        <div class="row x-gap-20 y-gap-20">
                            <div class="col-md-auto">
                                <div class="ratio ratio-1:1 size-120">
                                    <img src="img/hotels/1.png" alt="image" class="img-ratio rounded-4">
                                </div>
                            </div>

                            <div class="col-md">
                                <div class="row x-gap-20 y-gap-10 justify-between">
                                    <div class="col-lg">
                                        <h4 class="text-16 lh-17 fw-500">
                                            Great Northern Hotel, a Tribute Portfolio Hotel, London
                                            <span class="text-10 text-yellow-2">
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                            </span>
                                        </h4>
                                    </div>

                                    <div class="col-auto">
                                        <button class="button -blue-1 size-30 flex-center bg-light-2 rounded-full">
                                            <i class="icon-heart text-12"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="row y-gap-10 justify-between items-end pt-24 lg:pt-15">
                                    <div class="col-auto">
                                        <div class="d-flex items-center">
                                            <div class="size-38 rounded-4 flex-center bg-blue-1">
                                                <span class="text-14 fw-600 text-white">4.8</span>
                                            </div>

                                            <div class="ml-10">
                                                <div class="text-13 lh-14 fw-500">Exceptional</div>
                                                <div class="text-12 lh-14 text-light-1">3,014 reviews</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-auto">
                                        <div class="d-flex items-center">
                                            <div class="text-14 text-light-1 mr-10">8 nights</div>
                                            <div class="fw-500">US$72</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mapFilter-results__item">
                        <div class="row x-gap-20 y-gap-20">
                            <div class="col-md-auto">
                                <div class="ratio ratio-1:1 size-120">
                                    <img src="img/hotels/1.png" alt="image" class="img-ratio rounded-4">
                                </div>
                            </div>

                            <div class="col-md">
                                <div class="row x-gap-20 y-gap-10 justify-between">
                                    <div class="col-lg">
                                        <h4 class="text-16 lh-17 fw-500">
                                            Great Northern Hotel, a Tribute Portfolio Hotel, London
                                            <span class="text-10 text-yellow-2">
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                            </span>
                                        </h4>
                                    </div>

                                    <div class="col-auto">
                                        <button class="button -blue-1 size-30 flex-center bg-light-2 rounded-full">
                                            <i class="icon-heart text-12"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="row y-gap-10 justify-between items-end pt-24 lg:pt-15">
                                    <div class="col-auto">
                                        <div class="d-flex items-center">
                                            <div class="size-38 rounded-4 flex-center bg-blue-1">
                                                <span class="text-14 fw-600 text-white">4.8</span>
                                            </div>

                                            <div class="ml-10">
                                                <div class="text-13 lh-14 fw-500">Exceptional</div>
                                                <div class="text-12 lh-14 text-light-1">3,014 reviews</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-auto">
                                        <div class="d-flex items-center">
                                            <div class="text-14 text-light-1 mr-10">8 nights</div>
                                            <div class="fw-500">US$72</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="mapFilter-map">
                <div class="map js-map"></div>
            </div>
        </div>
    </div>





    <!-- Mirrored from creativelayers.net/themes/gotrip-html/car-single.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 24 Oct 2025 13:36:09 GMT -->

    </html>

    <?php include '../includes/footer.php'; ?>

    <!-- JavaScript -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAAz77U5XQuEME6TpftaMdX0bBelQxXRlM"></script>
    <script src="../../../unpkg.com/%40googlemaps/markerclusterer%402.6.2/dist/index.min.js"></script>

  <script>
document.addEventListener("DOMContentLoaded", function() {
  
  // Store car rental booking data
  let selectedPickupDateTime = '';
  let selectedDropoffDateTime = '';
  let selectedCarCount = 1;
  let carBasePrice = <?= json_encode(floatval($carRentals['car_rental_price'])) ?>;
  let selectedDays = 0;

  // --- Initialize flatpickr for PICKUP date & time ---
  const pickupPicker = flatpickr("#pickupDateTime", {
    enableTime: true,
    dateFormat: "Y-m-d H:i",
    minDate: "today",
    time_24hr: true,
    onChange: function(selectedDates, dateStr) {
      if (selectedDates.length > 0) {
        selectedPickupDateTime = dateStr;
        
        // Update dropoff picker minimum date to be after pickup
        if (dropoffPicker) {
          dropoffPicker.set('minDate', selectedDates[0]);
        }
        
        // Calculate days if both dates are selected
        calculateDuration();
      }
    }
  });

  // --- Initialize flatpickr for DROPOFF date & time ---
  const dropoffPicker = flatpickr("#dropoffDateTime", {
    enableTime: true,
    dateFormat: "Y-m-d H:i",
    minDate: "today",
    time_24hr: true,
    onChange: function(selectedDates, dateStr) {
      if (selectedDates.length > 0) {
        selectedDropoffDateTime = dateStr;
        
        // Calculate days if both dates are selected
        calculateDuration();
      }
    }
  });

  // --- Calculate Duration Between Pickup and Dropoff ---
  function calculateDuration() {
    if (selectedPickupDateTime && selectedDropoffDateTime) {
      const pickupTime = new Date(selectedPickupDateTime);
      const dropoffTime = new Date(selectedDropoffDateTime);
      
      if (dropoffTime > pickupTime) {
        const timeDiff = Math.abs(dropoffTime - pickupTime);
        const days = Math.ceil(timeDiff / (1000 * 60 * 60 * 24));
        selectedDays = days;
        
        console.log(`Duration: ${days} day(s)`);
      } else {
        selectedDays = 0;
        alert("Dropoff date/time must be after pickup date/time!");
      }
    }
  }

  // --- Handle Car Quantity Increase/Decrease ---
  const incCar = document.getElementById('increaseCar');
  const decCar = document.getElementById('decreaseCar');
  const carDisplay = document.getElementById('CarCount');

  if (incCar) {
    incCar.addEventListener('click', function(e) {
      e.preventDefault();
      let currentCount = parseInt(carDisplay.textContent);
      if (currentCount < 10) {
        currentCount++;
        carDisplay.textContent = currentCount;
        selectedCarCount = currentCount;
      }
    });
  }

  if (decCar) {
    decCar.addEventListener('click', function(e) {
      e.preventDefault();
      let currentCount = parseInt(carDisplay.textContent);
      if (currentCount > 1) {
        currentCount--;
        carDisplay.textContent = currentCount;
        selectedCarCount = currentCount;
      }
    });
  }

  // --- When Book Now Button is Clicked (Open Modal) ---
  document.addEventListener('click', function(e) {
    const bookBtn = e.target.closest('[data-modal-target="#modal-car"]');
    if (bookBtn) {
      
      // Validate that dates are selected
      if (!selectedPickupDateTime) {
        alert("Please select pickup date and time first.");
        e.preventDefault();
        e.stopPropagation();
        return;
      }
      
      if (!selectedDropoffDateTime) {
        alert("Please select dropoff date and time first.");
        e.preventDefault();
        e.stopPropagation();
        return;
      }
      
      if (selectedDays === 0) {
        alert("Dropoff date/time must be after pickup date/time.");
        e.preventDefault();
        e.stopPropagation();
        return;
      }

      // Validate car count
      if (selectedCarCount < 1) {
        alert("Please select at least 1 car.");
        e.preventDefault();
        e.stopPropagation();
        return;
      }

      // Calculate total price (price per day × days × number of cars)
      const totalPrice = (carBasePrice * selectedDays * selectedCarCount).toFixed(2);

      // Open modal
      const modal = document.getElementById('modal-car');
      if (modal) {
        const form = modal.querySelector('.booking-form-car');
        
        if (form) {
          // Fill hidden fields
          form.querySelector('.hidden-pickup-datetime').value = selectedPickupDateTime;
          form.querySelector('.hidden-dropoff-datetime').value = selectedDropoffDateTime;
          form.querySelector('.hidden-car-count').value = selectedCarCount;
          form.querySelector('.hidden-total-price-car').value = totalPrice;

          // Update booking summary display
          form.querySelector('.selected-pickup-date').textContent = selectedPickupDateTime;
          form.querySelector('.selected-dropoff-date').textContent = selectedDropoffDateTime;
          form.querySelector('.selected-duration').textContent = `${selectedDays} day${selectedDays > 1 ? 's' : ''}`;
          form.querySelector('.selected-cars').textContent = selectedCarCount + ' car(s)';
          form.querySelector('.display-total-price-car').textContent = `US$${totalPrice}`;
        }

        // Open modal
        modal.classList.add('active');
        document.body.style.overflow = 'hidden';
      }
    }
  });

  // --- Handle Car Booking Submission ---
  document.addEventListener('click', function(e) {
    if (e.target.classList.contains('btn-book-car-now')) {
      const form = document.getElementById('booking-form-car');
      
      if (!form) return;

      // Validate form
      if (!form.checkValidity()) {
        form.reportValidity();
        return;
      }

      // Check if dates are selected
      const pickupDateTime = form.querySelector('.hidden-pickup-datetime').value;
      const dropoffDateTime = form.querySelector('.hidden-dropoff-datetime').value;
      
      if (!pickupDateTime || !dropoffDateTime) {
        alert("Please select pickup and dropoff dates first.");
        return;
      }

      // Check if cars are selected
      const carCount = form.querySelector('.hidden-car-count').value;
      if (!carCount || carCount === '0') {
        alert("Please select number of cars.");
        return;
      }

      // Disable button and show loading
      e.target.disabled = true;
      e.target.textContent = "Processing...";

      // Get form data
      const formData = new FormData(form);

      // Send AJAX request
      fetch("/car-rentals/process_car_booking.php", {
        method: "POST",
        body: formData
      })
      .then(response => response.json())
      .then(data => {
        const alertDiv = form.querySelector('.alert-message');
        
        if (data.success) {
          // Success
          alertDiv.className = 'alert-message mt-20 alert alert-success';
          alertDiv.style.display = 'block';
          alertDiv.textContent = data.message || 'Car rental booking confirmed! Booking ID: ' + data.booking_id;
          
          // Reset form
          form.reset();
          document.getElementById('CarCount').textContent = '1';
          pickupPicker.clear();
          dropoffPicker.clear();
          
          // Close modal after 2 seconds
          setTimeout(() => {
            const modal = form.closest('.my-modal');
            if (modal) {
              modal.classList.remove('active');
              document.body.style.overflow = '';
            }
            
          }, 2000);
          
        } else {
          // Error
          alertDiv.className = 'alert-message mt-20 alert alert-danger';
          alertDiv.style.display = 'block';
          alertDiv.textContent = data.message || 'Booking failed. Please try again.';
        }
        
        // Re-enable button
        e.target.disabled = false;
        e.target.textContent = "Book Now";
      })
      .catch(err => {
        console.error("Booking error:", err);
        
        const alertDiv = form.querySelector('.alert-message');
        alertDiv.className = 'alert-message mt-20 alert alert-danger';
        alertDiv.style.display = 'block';
        alertDiv.textContent = 'An error occurred. Please try again.';
        
        // Re-enable button
        e.target.disabled = false;
        e.target.textContent = "Book Now";
      });
    }
  });

  // --- Modal Close Logic (Keep your existing modal library code) ---
});
</script>