<?php include('../includes/header.php'); ?>

<section data-anim-wrap class="masthead -type-3 relative z-5">
  <div data-anim-child="fade delay-1" class="masthead__bg bg-dark-3">
    <img src="./assets/img/masthead/3/bg.png" alt="image">
  </div>

  <div class="container">
    <div class="row justify-center">
      <div class="col-xl-10">
        <div class="text-center">
          <h1 data-anim-child="slide-up delay-4" class="text-60 lg:text-40 md:text-30 text-white">Discover Your World</h1>
          <p data-anim-child="slide-up delay-5" class="text-white mt-5">Discover amzaing places at exclusive deals</p>
        </div>

        <div data-anim-child="slide-up delay-6" class="masthead__tabs">
          <div class="tabs -bookmark js-tabs">
            <div class="tabs__controls d-flex items-center js-tabs-controls">

              <div class="">
                <button class="tabs__button px-30 py-20 rounded-4 fw-600 text-white js-tabs-button is-tab-el-active" data-tab-target=".-tab-item-1">
                  <i class="icon-bed text-20 mr-10"></i>
                  Hotel
                </button>
              </div>

              <div class="">
                <button class="tabs__button px-30 py-20 rounded-4 fw-600 text-white js-tabs-button " data-tab-target=".-tab-item-2">
                  <i class="icon-destination text-20 mr-10"></i>
                  Tour
                </button>
              </div>



              <div class="">
                <button class="tabs__button px-30 py-20 rounded-4 fw-600 text-white js-tabs-button " data-tab-target=".-tab-item-5">
                  <i class="icon-car text-20 mr-10"></i>
                  Car
                </button>
              </div>



              <div class="">
                <button class="tabs__button px-30 py-20 rounded-4 fw-600 text-white js-tabs-button " data-tab-target=".-tab-item-7">
                  <i class="icon-tickets text-20 mr-10"></i>
                  Flights
                </button>
              </div>

            </div>

            <div class="tabs__content js-tabs-content">

              <div class="tabs__pane -tab-item-1">
                <div class="mainSearch -col-3 bg-white px-20 py-20 lg:px-30 lg:py-30 rounded-4 shadow-1">
                  <form id="home-umrah-search-form" action="/umrah-packages/" method="GET">
                    <div class="button-grid items-center">

                      <!-- Package Type -->
                      <div class="searchMenu-loc px-30 lg:py-20 lg:px-0 js-form-dd">
                        <h4 class="text-15 fw-500 ls-2 lh-16">Package Type</h4>
                        <select name="package_type" id="home-package-type" class="form-control mt-10" style="border: none; padding: 0; font-size: 15px;">
                          <option value="">All Types</option>
                          <!-- Will be populated by JS -->
                        </select>
                      </div>

                      <!-- Days of Visit -->
                      <div class="searchMenu-loc px-30 lg:py-20 lg:px-0 js-form-dd">
                        <h4 class="text-15 fw-500 ls-2 lh-16">Duration</h4>
                        <select name="total_days" id="home-days-filter" class="form-control mt-10" style="border: none; padding: 0; font-size: 15px;">
                          <option value="">All Durations</option>
                          <!-- Will be populated by JS -->
                        </select>
                      </div>

                      <!-- Search Button -->
                      <div class="button-item">
                        <button type="submit" class="mainSearch__submit button -dark-1 py-15 px-40 col-12 rounded-4 bg-blue-1 text-white">
                          <i class="icon-search text-20 mr-10"></i>
                          Search
                        </button>
                      </div>
                    </div>

                    <div class="tabs__pane -tab-item-2 ">
                      <div class="mainSearch bg-white pr-20 py-20 lg:px-20 lg:pt-5 lg:pb-20 rounded-4 shadow-1">
                        <div class="button-grid items-center">

                          <div class="searchMenu-loc px-30 lg:py-20 lg:px-0 js-form-dd js-liverSearch">

                            <div data-x-dd-click="searchMenu-loc">
                              <h4 class="text-15 fw-500 ls-2 lh-16">Location</h4>

                              <div class="text-15 text-light-1 ls-2 lh-16">
                                <input autocomplete="off" type="search" placeholder="Where are you going?" class="js-search js-dd-focus" />
                              </div>
                            </div>


                            <div class="searchMenu-loc__field shadow-2 js-popup-window" data-x-dd="searchMenu-loc" data-x-dd-toggle="-is-active">
                              <div class="bg-white px-30 py-30 sm:px-0 sm:py-15 rounded-4">
                                <div class="y-gap-5 js-results">

                                  <div>
                                    <button class="-link d-block col-12 text-left rounded-4 px-20 py-15 js-search-option">
                                      <div class="d-flex">
                                        <div class="icon-location-2 text-light-1 text-20 pt-4"></div>
                                        <div class="ml-10">
                                          <div class="text-15 lh-12 fw-500 js-search-option-target">London</div>
                                          <div class="text-14 lh-12 text-light-1 mt-5">Greater London, United Kingdom</div>
                                        </div>
                                      </div>
                                    </button>
                                  </div>

                                  <div>
                                    <button class="-link d-block col-12 text-left rounded-4 px-20 py-15 js-search-option">
                                      <div class="d-flex">
                                        <div class="icon-location-2 text-light-1 text-20 pt-4"></div>
                                        <div class="ml-10">
                                          <div class="text-15 lh-12 fw-500 js-search-option-target">New York</div>
                                          <div class="text-14 lh-12 text-light-1 mt-5">New York State, United States</div>
                                        </div>
                                      </div>
                                    </button>
                                  </div>

                                  <div>
                                    <button class="-link d-block col-12 text-left rounded-4 px-20 py-15 js-search-option">
                                      <div class="d-flex">
                                        <div class="icon-location-2 text-light-1 text-20 pt-4"></div>
                                        <div class="ml-10">
                                          <div class="text-15 lh-12 fw-500 js-search-option-target">Paris</div>
                                          <div class="text-14 lh-12 text-light-1 mt-5">France</div>
                                        </div>
                                      </div>
                                    </button>
                                  </div>

                                  <div>
                                    <button class="-link d-block col-12 text-left rounded-4 px-20 py-15 js-search-option">
                                      <div class="d-flex">
                                        <div class="icon-location-2 text-light-1 text-20 pt-4"></div>
                                        <div class="ml-10">
                                          <div class="text-15 lh-12 fw-500 js-search-option-target">Madrid</div>
                                          <div class="text-14 lh-12 text-light-1 mt-5">Spain</div>
                                        </div>
                                      </div>
                                    </button>
                                  </div>

                                  <div>
                                    <button class="-link d-block col-12 text-left rounded-4 px-20 py-15 js-search-option">
                                      <div class="d-flex">
                                        <div class="icon-location-2 text-light-1 text-20 pt-4"></div>
                                        <div class="ml-10">
                                          <div class="text-15 lh-12 fw-500 js-search-option-target">Santorini</div>
                                          <div class="text-14 lh-12 text-light-1 mt-5">Greece</div>
                                        </div>
                                      </div>
                                    </button>
                                  </div>

                                </div>
                              </div>
                            </div>
                            <div class="button-grid items-center">

                              <div class="searchMenu-loc px-30 lg:py-20 lg:px-0 js-form-dd js-liverSearch">

                                <div data-x-dd-click="searchMenu-loc">
                                  <h4 class="text-15 fw-500 ls-2 lh-16">Location</h4>

                                  <div class="text-15 text-light-1 ls-2 lh-16">
                                    <input autocomplete="off" type="search" placeholder="Where are you going?" class="js-search js-dd-focus" />
                                  </div>
                                </div>


                                <div class="searchMenu-loc__field shadow-2 js-popup-window" data-x-dd="searchMenu-loc" data-x-dd-toggle="-is-active">
                                  <div class="bg-white px-30 py-30 sm:px-0 sm:py-15 rounded-4">
                                    <div class="y-gap-5 js-results">

                                      <div>
                                        <button class="-link d-block col-12 text-left rounded-4 px-20 py-15 js-search-option">
                                          <div class="d-flex">
                                            <div class="icon-location-2 text-light-1 text-20 pt-4"></div>
                                            <div class="ml-10">
                                              <div class="text-15 lh-12 fw-500 js-search-option-target">London</div>
                                              <div class="text-14 lh-12 text-light-1 mt-5">Greater London, United Kingdom</div>
                                            </div>
                                          </div>
                                        </button>
                                      </div>

                                      <div>
                                        <button class="-link d-block col-12 text-left rounded-4 px-20 py-15 js-search-option">
                                          <div class="d-flex">
                                            <div class="icon-location-2 text-light-1 text-20 pt-4"></div>
                                            <div class="ml-10">
                                              <div class="text-15 lh-12 fw-500 js-search-option-target">New York</div>
                                              <div class="text-14 lh-12 text-light-1 mt-5">New York State, United States</div>
                                            </div>
                                          </div>
                                        </button>
                                      </div>

                                      <div>
                                        <button class="-link d-block col-12 text-left rounded-4 px-20 py-15 js-search-option">
                                          <div class="d-flex">
                                            <div class="icon-location-2 text-light-1 text-20 pt-4"></div>
                                            <div class="ml-10">
                                              <div class="text-15 lh-12 fw-500 js-search-option-target">Paris</div>
                                              <div class="text-14 lh-12 text-light-1 mt-5">France</div>
                                            </div>
                                          </div>
                                        </button>
                                      </div>

                                      <div>
                                        <button class="-link d-block col-12 text-left rounded-4 px-20 py-15 js-search-option">
                                          <div class="d-flex">
                                            <div class="icon-location-2 text-light-1 text-20 pt-4"></div>
                                            <div class="ml-10">
                                              <div class="text-15 lh-12 fw-500 js-search-option-target">Madrid</div>
                                              <div class="text-14 lh-12 text-light-1 mt-5">Spain</div>
                                            </div>
                                          </div>
                                        </button>
                                      </div>

                                      <div>
                                        <button class="-link d-block col-12 text-left rounded-4 px-20 py-15 js-search-option">
                                          <div class="d-flex">
                                            <div class="icon-location-2 text-light-1 text-20 pt-4"></div>
                                            <div class="ml-10">
                                              <div class="text-15 lh-12 fw-500 js-search-option-target">Santorini</div>
                                              <div class="text-14 lh-12 text-light-1 mt-5">Greece</div>
                                            </div>
                                          </div>
                                        </button>
                                      </div>

                                    </div>
                                  </div>
                                </div>
                              </div>


                              <div class="searchMenu-date px-30 lg:py-20 lg:px-0 js-form-dd js-calendar js-calendar-el">

                                <div data-x-dd-click="searchMenu-date">
                                  <h4 class="text-15 fw-500 ls-2 lh-16">Check in - Check out</h4>

                                  <div class="capitalize text-15 text-light-1 ls-2 lh-16">
                                    <span class="js-first-date">Wed 2 Mar</span>
                                    -
                                    <span class="js-last-date">Fri 11 Apr</span>
                                  </div>
                                </div>


                                <div class="searchMenu-date__field shadow-2" data-x-dd="searchMenu-date" data-x-dd-toggle="-is-active">
                                  <div class="bg-white px-30 py-30 rounded-4">
                                    <div class="elCalendar js-calendar-el-calendar"></div>
                                  </div>
                                </div>
                              </div>


                              <div class="searchMenu-guests px-30 lg:py-20 lg:px-0 js-form-dd js-form-counters">

                                <div data-x-dd-click="searchMenu-guests">
                                  <h4 class="text-15 fw-500 ls-2 lh-16">Guest</h4>

                                  <div class="text-15 text-light-1 ls-2 lh-16">
                                    <span class="js-count-adult">2</span> adults
                                    -
                                    <span class="js-count-child">1</span> childeren
                                    -
                                    <span class="js-count-room">1</span> room
                                  </div>
                                </div>


                                <div class="searchMenu-guests__field shadow-2" data-x-dd="searchMenu-guests" data-x-dd-toggle="-is-active">
                                  <div class="bg-white px-30 py-30 rounded-4">
                                    <div class="row y-gap-10 justify-between items-center">
                                      <div class="col-auto">
                                        <div class="text-15 fw-500">Adults</div>
                                      </div>

                                      <div class="col-auto">
                                        <div class="d-flex items-center js-counter" data-value-change=".js-count-adult">
                                          <button class="button -outline-blue-1 text-blue-1 size-38 rounded-4 js-down">
                                            <i class="icon-minus text-12"></i>
                                          </button>

                                          <div class="flex-center size-20 ml-15 mr-15">
                                            <div class="text-15 js-count">2</div>
                                          </div>

                                          <button class="button -outline-blue-1 text-blue-1 size-38 rounded-4 js-up">
                                            <i class="icon-plus text-12"></i>
                                          </button>
                                        </div>
                                      </div>
                                    </div>

                                    <div class="border-top-light mt-24 mb-24"></div>

                                    <div class="row y-gap-10 justify-between items-center">
                                      <div class="col-auto">
                                        <div class="text-15 lh-12 fw-500">Children</div>
                                        <div class="text-14 lh-12 text-light-1 mt-5">Ages 0 - 17</div>
                                      </div>

                                      <div class="col-auto">
                                        <div class="d-flex items-center js-counter" data-value-change=".js-count-child">
                                          <button class="button -outline-blue-1 text-blue-1 size-38 rounded-4 js-down">
                                            <i class="icon-minus text-12"></i>
                                          </button>

                                          <div class="flex-center size-20 ml-15 mr-15">
                                            <div class="text-15 js-count">1</div>
                                          </div>

                                          <button class="button -outline-blue-1 text-blue-1 size-38 rounded-4 js-up">
                                            <i class="icon-plus text-12"></i>
                                          </button>
                                        </div>
                                      </div>
                                    </div>

                                    <div class="border-top-light mt-24 mb-24"></div>

                                    <div class="row y-gap-10 justify-between items-center">
                                      <div class="col-auto">
                                        <div class="text-15 fw-500">Rooms</div>
                                      </div>

                                      <div class="col-auto">
                                        <div class="d-flex items-center js-counter" data-value-change=".js-count-room">
                                          <button class="button -outline-blue-1 text-blue-1 size-38 rounded-4 js-down">
                                            <i class="icon-minus text-12"></i>
                                          </button>

                                          <div class="flex-center size-20 ml-15 mr-15">
                                            <div class="text-15 js-count">1</div>
                                          </div>

                                          <button class="button -outline-blue-1 text-blue-1 size-38 rounded-4 js-up">
                                            <i class="icon-plus text-12"></i>
                                          </button>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>


                              <div class="button-item">
                                <button class="mainSearch__submit button -dark-1 py-15 px-35 h-60 col-12 rounded-4 bg-blue-1 text-white">
                                  <i class="icon-search text-20 mr-10"></i>
                                  Search
                                </button>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="tabs__pane -tab-item-2 is-tab-el-active">
                          <div class="mainSearch -col-5 border-light bg-white px-20 py-20 lg:px-20 lg:pt-5 lg:pb-20 rounded-4 mt-30">
                            <div class="button-grid items-center">
                              <form id="home-umrah-search-form" action="/umrah-packages/" method="GET"></form>
                              <!-- PICKUP LOCATION -->
                              <div class="pr-30 pl-10 lg:py-20 lg:px-0 js-form-dd js-liverSearch">
                                <h4 class="text-15 fw-500 ls-2 lh-16">Pick up location</h4>
                                <select id="pickup_location" class="js-example-basic-single">
                                  <option>Select</option>
                                  <?php
                                  $locations = [
                                    "Makkah",
                                    "Madina",
                                    "Makkah Airport",
                                    "Madina Airport",
                                    "Makkah Hotel",
                                    "Madina Hotel",
                                    "Makkah Train Station",
                                    "Madina Train Station",
                                    "Jaddah Airport"
                                  ];

                                  foreach ($locations as $loc) {
                                    $selected = ($pickup == $loc) ? "selected" : "";
                                    echo "<option value='$loc' $selected>$loc</option>";
                                  }
                                  ?>
                                </select>
                              </div>

                              <!-- DROPOFF -->
                              <div class="searchMenu-loc px-30 lg:py-20 lg:px-0 js-form-dd js-liverSearch">
                                <h4 class="text-15 fw-500 ls-2 lh-16">Drop off location</h4>
                                <select id="dropoff_location" class="js-example-basic-single">
                                  <option>Select</option>
                                  <?php
                                  foreach ($locations as $loc) {
                                    $selected = ($dropoff == $loc) ? "selected" : "";
                                    echo "<option value='$loc' $selected>$loc</option>";
                                  }
                                  ?>
                                </select>
                              </div>

                              <!-- PASSENGERS -->
                              <div class="passanger-input searchMenu-loc px-30 lg:py-20 lg:px-0 js-form-dd js-liverSearch">
                                <div class="passenger-display flex items-center justify-between cursor-pointer" id="passengerTrigger">
                                  <div>
                                    <h4 class="text-15 fw-500 ls-2 lh-16">Passengers</h4>
                                    <div class="text-15 text-light-1 ls-2 lh-16">
                                      <span id="passengerCountDisplay">2</span> adults
                                    </div>
                                  </div>
                                  <i class="icon-chevron-down text-14 text-dark-1"></i>
                                </div>

                                <div class="passenger-popup shadow-2 absolute bg-white px-30 py-25 rounded-4 hidden" id="passengerPopup">
                                  <div class="row y-gap-10 justify-between items-center">
                                    <div class="col-auto">
                                      <div class="text-15 fw-500">Adults</div>
                                    </div>
                                    <div class="col-auto">
                                      <div class="d-flex items-center">
                                        <button class="button -outline-blue-1 text-blue-1 size-38 rounded-4" id="decreasePassenger">
                                          <i class="icon-minus text-12"></i>
                                        </button>
                                        <div class="flex-center size-20 ml-15 mr-15">
                                          <div class="text-15" id="passengerCount">2</div>
                                        </div>
                                        <button class="button -outline-blue-1 text-blue-1 size-38 rounded-4" id="increasePassenger">
                                          <i class="icon-plus text-12"></i>
                                        </button>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>

                              <!-- SEARCH BTN -->
                              <div class="button-item">
                                <button class="mainSearch__submit button -dark-1 py-20 px-35 col-12 rounded-4 bg-yellow-1 text-dark-1">
                                  <i class="icon-search text-20 mr-10"></i> Search
                                </button>
                              </div>
                              </form.
                                </div>
                            </div>
                          </div>
                        </div>

                        <div class="tabs__pane -tab-item-5 ">
                          <div class="mainSearch bg-white pr-20 py-20 lg:px-20 lg:pt-5 lg:pb-20 rounded-4 shadow-1">
                            <div class="button-grid items-center">

                              <div class="searchMenu-loc px-30 lg:py-20 lg:px-0 js-form-dd js-liverSearch">

                                <div data-x-dd-click="searchMenu-loc">
                                  <h4 class="text-15 fw-500 ls-2 lh-16">Location</h4>

                                  <div class="text-15 text-light-1 ls-2 lh-16">
                                    <input autocomplete="off" type="search" placeholder="Where are you going?" class="js-search js-dd-focus" />
                                  </div>
                                </div>


                                <div class="searchMenu-loc__field shadow-2 js-popup-window" data-x-dd="searchMenu-loc" data-x-dd-toggle="-is-active">
                                  <div class="bg-white px-30 py-30 sm:px-0 sm:py-15 rounded-4">
                                    <div class="y-gap-5 js-results">

                                      <div>
                                        <button class="-link d-block col-12 text-left rounded-4 px-20 py-15 js-search-option">
                                          <div class="d-flex">
                                            <div class="icon-location-2 text-light-1 text-20 pt-4"></div>
                                            <div class="ml-10">
                                              <div class="text-15 lh-12 fw-500 js-search-option-target">London</div>
                                              <div class="text-14 lh-12 text-light-1 mt-5">Greater London, United Kingdom</div>
                                            </div>
                                          </div>
                                        </button>
                                      </div>

                                      <div>
                                        <button class="-link d-block col-12 text-left rounded-4 px-20 py-15 js-search-option">
                                          <div class="d-flex">
                                            <div class="icon-location-2 text-light-1 text-20 pt-4"></div>
                                            <div class="ml-10">
                                              <div class="text-15 lh-12 fw-500 js-search-option-target">New York</div>
                                              <div class="text-14 lh-12 text-light-1 mt-5">New York State, United States</div>
                                            </div>
                                          </div>
                                        </button>
                                      </div>

                                      <div>
                                        <button class="-link d-block col-12 text-left rounded-4 px-20 py-15 js-search-option">
                                          <div class="d-flex">
                                            <div class="icon-location-2 text-light-1 text-20 pt-4"></div>
                                            <div class="ml-10">
                                              <div class="text-15 lh-12 fw-500 js-search-option-target">Paris</div>
                                              <div class="text-14 lh-12 text-light-1 mt-5">France</div>
                                            </div>
                                          </div>
                                        </button>
                                      </div>

                                      <div>
                                        <button class="-link d-block col-12 text-left rounded-4 px-20 py-15 js-search-option">
                                          <div class="d-flex">
                                            <div class="icon-location-2 text-light-1 text-20 pt-4"></div>
                                            <div class="ml-10">
                                              <div class="text-15 lh-12 fw-500 js-search-option-target">Madrid</div>
                                              <div class="text-14 lh-12 text-light-1 mt-5">Spain</div>
                                            </div>
                                          </div>
                                        </button>
                                      </div>

                                      <div>
                                        <button class="-link d-block col-12 text-left rounded-4 px-20 py-15 js-search-option">
                                          <div class="d-flex">
                                            <div class="icon-location-2 text-light-1 text-20 pt-4"></div>
                                            <div class="ml-10">
                                              <div class="text-15 lh-12 fw-500 js-search-option-target">Santorini</div>
                                              <div class="text-14 lh-12 text-light-1 mt-5">Greece</div>
                                            </div>
                                          </div>
                                        </button>
                                      </div>

                                    </div>
                                  </div>
                                </div>
                              </div>


                              <div class="searchMenu-date px-30 lg:py-20 lg:px-0 js-form-dd js-calendar js-calendar-el">

                                <div data-x-dd-click="searchMenu-date">
                                  <h4 class="text-15 fw-500 ls-2 lh-16">Check in - Check out</h4>

                                  <div class="capitalize text-15 text-light-1 ls-2 lh-16">
                                    <span class="js-first-date">Wed 2 Mar</span>
                                    -
                                    <span class="js-last-date">Fri 11 Apr</span>
                                  </div>
                                </div>


                                <div class="searchMenu-date__field shadow-2" data-x-dd="searchMenu-date" data-x-dd-toggle="-is-active">
                                  <div class="bg-white px-30 py-30 rounded-4">
                                    <div class="elCalendar js-calendar-el-calendar"></div>
                                  </div>
                                </div>
                              </div>


                              <div class="searchMenu-guests px-30 lg:py-20 lg:px-0 js-form-dd js-form-counters">

                                <div data-x-dd-click="searchMenu-guests">
                                  <h4 class="text-15 fw-500 ls-2 lh-16">Guest</h4>

                                  <div class="text-15 text-light-1 ls-2 lh-16">
                                    <span class="js-count-adult">2</span> adults
                                    -
                                    <span class="js-count-child">1</span> childeren
                                    -
                                    <span class="js-count-room">1</span> room
                                  </div>
                                </div>


                                <div class="searchMenu-guests__field shadow-2" data-x-dd="searchMenu-guests" data-x-dd-toggle="-is-active">
                                  <div class="bg-white px-30 py-30 rounded-4">
                                    <div class="row y-gap-10 justify-between items-center">
                                      <div class="col-auto">
                                        <div class="text-15 fw-500">Adults</div>
                                      </div>

                                      <div class="col-auto">
                                        <div class="d-flex items-center js-counter" data-value-change=".js-count-adult">
                                          <button class="button -outline-blue-1 text-blue-1 size-38 rounded-4 js-down">
                                            <i class="icon-minus text-12"></i>
                                          </button>

                                          <div class="flex-center size-20 ml-15 mr-15">
                                            <div class="text-15 js-count">2</div>
                                          </div>

                                          <button class="button -outline-blue-1 text-blue-1 size-38 rounded-4 js-up">
                                            <i class="icon-plus text-12"></i>
                                          </button>
                                        </div>
                                      </div>
                                    </div>

                                    <div class="border-top-light mt-24 mb-24"></div>

                                    <div class="row y-gap-10 justify-between items-center">
                                      <div class="col-auto">
                                        <div class="text-15 lh-12 fw-500">Children</div>
                                        <div class="text-14 lh-12 text-light-1 mt-5">Ages 0 - 17</div>
                                      </div>

                                      <div class="col-auto">
                                        <div class="d-flex items-center js-counter" data-value-change=".js-count-child">
                                          <button class="button -outline-blue-1 text-blue-1 size-38 rounded-4 js-down">
                                            <i class="icon-minus text-12"></i>
                                          </button>

                                          <div class="flex-center size-20 ml-15 mr-15">
                                            <div class="text-15 js-count">1</div>
                                          </div>

                                          <button class="button -outline-blue-1 text-blue-1 size-38 rounded-4 js-up">
                                            <i class="icon-plus text-12"></i>
                                          </button>
                                        </div>
                                      </div>
                                    </div>

                                    <div class="border-top-light mt-24 mb-24"></div>

                                    <div class="row y-gap-10 justify-between items-center">
                                      <div class="col-auto">
                                        <div class="text-15 fw-500">Rooms</div>
                                      </div>

                                      <div class="col-auto">
                                        <div class="d-flex items-center js-counter" data-value-change=".js-count-room">
                                          <button class="button -outline-blue-1 text-blue-1 size-38 rounded-4 js-down">
                                            <i class="icon-minus text-12"></i>
                                          </button>

                                          <div class="flex-center size-20 ml-15 mr-15">
                                            <div class="text-15 js-count">1</div>
                                          </div>

                                          <button class="button -outline-blue-1 text-blue-1 size-38 rounded-4 js-up">
                                            <i class="icon-plus text-12"></i>
                                          </button>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>


                              <div class="button-item">
                                <button class="mainSearch__submit button -dark-1 py-15 px-35 h-60 col-12 rounded-4 bg-blue-1 text-white">
                                  <i class="icon-search text-20 mr-10"></i>
                                  Search
                                </button>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="tabs__pane -tab-item-6 ">
                          <div class="mainSearch bg-white pr-20 py-20 lg:px-20 lg:pt-5 lg:pb-20 rounded-4 shadow-1">
                            <div class="button-grid items-center">

                              <div class="searchMenu-loc px-30 lg:py-20 lg:px-0 js-form-dd js-liverSearch">

                                <div data-x-dd-click="searchMenu-loc">
                                  <h4 class="text-15 fw-500 ls-2 lh-16">Location</h4>

                                  <div class="text-15 text-light-1 ls-2 lh-16">
                                    <input autocomplete="off" type="search" placeholder="Where are you going?" class="js-search js-dd-focus" />
                                  </div>
                                </div>


                                <div class="searchMenu-loc__field shadow-2 js-popup-window" data-x-dd="searchMenu-loc" data-x-dd-toggle="-is-active">
                                  <div class="bg-white px-30 py-30 sm:px-0 sm:py-15 rounded-4">
                                    <div class="y-gap-5 js-results">

                                      <div>
                                        <button class="-link d-block col-12 text-left rounded-4 px-20 py-15 js-search-option">
                                          <div class="d-flex">
                                            <div class="icon-location-2 text-light-1 text-20 pt-4"></div>
                                            <div class="ml-10">
                                              <div class="text-15 lh-12 fw-500 js-search-option-target">London</div>
                                              <div class="text-14 lh-12 text-light-1 mt-5">Greater London, United Kingdom</div>
                                            </div>
                                          </div>
                                        </button>
                                      </div>

                                      <div>
                                        <button class="-link d-block col-12 text-left rounded-4 px-20 py-15 js-search-option">
                                          <div class="d-flex">
                                            <div class="icon-location-2 text-light-1 text-20 pt-4"></div>
                                            <div class="ml-10">
                                              <div class="text-15 lh-12 fw-500 js-search-option-target">New York</div>
                                              <div class="text-14 lh-12 text-light-1 mt-5">New York State, United States</div>
                                            </div>
                                          </div>
                                        </button>
                                      </div>

                                      <div>
                                        <button class="-link d-block col-12 text-left rounded-4 px-20 py-15 js-search-option">
                                          <div class="d-flex">
                                            <div class="icon-location-2 text-light-1 text-20 pt-4"></div>
                                            <div class="ml-10">
                                              <div class="text-15 lh-12 fw-500 js-search-option-target">Paris</div>
                                              <div class="text-14 lh-12 text-light-1 mt-5">France</div>
                                            </div>
                                          </div>
                                        </button>
                                      </div>

                                      <div>
                                        <button class="-link d-block col-12 text-left rounded-4 px-20 py-15 js-search-option">
                                          <div class="d-flex">
                                            <div class="icon-location-2 text-light-1 text-20 pt-4"></div>
                                            <div class="ml-10">
                                              <div class="text-15 lh-12 fw-500 js-search-option-target">Madrid</div>
                                              <div class="text-14 lh-12 text-light-1 mt-5">Spain</div>
                                            </div>
                                          </div>
                                        </button>
                                      </div>

                                      <div>
                                        <button class="-link d-block col-12 text-left rounded-4 px-20 py-15 js-search-option">
                                          <div class="d-flex">
                                            <div class="icon-location-2 text-light-1 text-20 pt-4"></div>
                                            <div class="ml-10">
                                              <div class="text-15 lh-12 fw-500 js-search-option-target">Santorini</div>
                                              <div class="text-14 lh-12 text-light-1 mt-5">Greece</div>
                                            </div>
                                          </div>
                                        </button>
                                      </div>

                                    </div>
                                  </div>
                                </div>
                              </div>


                              <div class="searchMenu-date px-30 lg:py-20 lg:px-0 js-form-dd js-calendar js-calendar-el">

                                <div data-x-dd-click="searchMenu-date">
                                  <h4 class="text-15 fw-500 ls-2 lh-16">Check in - Check out</h4>

                                  <div class="capitalize text-15 text-light-1 ls-2 lh-16">
                                    <span class="js-first-date">Wed 2 Mar</span>
                                    -
                                    <span class="js-last-date">Fri 11 Apr</span>
                                  </div>
                                </div>


                                <div class="searchMenu-date__field shadow-2" data-x-dd="searchMenu-date" data-x-dd-toggle="-is-active">
                                  <div class="bg-white px-30 py-30 rounded-4">
                                    <div class="elCalendar js-calendar-el-calendar"></div>
                                  </div>
                                </div>
                              </div>


                              <div class="searchMenu-guests px-30 lg:py-20 lg:px-0 js-form-dd js-form-counters">

                                <div data-x-dd-click="searchMenu-guests">
                                  <h4 class="text-15 fw-500 ls-2 lh-16">Guest</h4>

                                  <div class="text-15 text-light-1 ls-2 lh-16">
                                    <span class="js-count-adult">2</span> adults
                                    -
                                    <span class="js-count-child">1</span> childeren
                                    -
                                    <span class="js-count-room">1</span> room
                                  </div>
                                </div>


                                <div class="searchMenu-guests__field shadow-2" data-x-dd="searchMenu-guests" data-x-dd-toggle="-is-active">
                                  <div class="bg-white px-30 py-30 rounded-4">
                                    <div class="row y-gap-10 justify-between items-center">
                                      <div class="col-auto">
                                        <div class="text-15 fw-500">Adults</div>
                                      </div>

                                      <div class="col-auto">
                                        <div class="d-flex items-center js-counter" data-value-change=".js-count-adult">
                                          <button class="button -outline-blue-1 text-blue-1 size-38 rounded-4 js-down">
                                            <i class="icon-minus text-12"></i>
                                          </button>

                                          <div class="flex-center size-20 ml-15 mr-15">
                                            <div class="text-15 js-count">2</div>
                                          </div>

                                          <button class="button -outline-blue-1 text-blue-1 size-38 rounded-4 js-up">
                                            <i class="icon-plus text-12"></i>
                                          </button>
                                        </div>
                                      </div>
                                    </div>

                                    <div class="border-top-light mt-24 mb-24"></div>

                                    <div class="row y-gap-10 justify-between items-center">
                                      <div class="col-auto">
                                        <div class="text-15 lh-12 fw-500">Children</div>
                                        <div class="text-14 lh-12 text-light-1 mt-5">Ages 0 - 17</div>
                                      </div>

                                      <div class="col-auto">
                                        <div class="d-flex items-center js-counter" data-value-change=".js-count-child">
                                          <button class="button -outline-blue-1 text-blue-1 size-38 rounded-4 js-down">
                                            <i class="icon-minus text-12"></i>
                                          </button>

                                          <div class="flex-center size-20 ml-15 mr-15">
                                            <div class="text-15 js-count">1</div>
                                          </div>

                                          <button class="button -outline-blue-1 text-blue-1 size-38 rounded-4 js-up">
                                            <i class="icon-plus text-12"></i>
                                          </button>
                                        </div>
                                      </div>
                                    </div>

                                    <div class="border-top-light mt-24 mb-24"></div>

                                    <div class="row y-gap-10 justify-between items-center">
                                      <div class="col-auto">
                                        <div class="text-15 fw-500">Rooms</div>
                                      </div>

                                      <div class="col-auto">
                                        <div class="d-flex items-center js-counter" data-value-change=".js-count-room">
                                          <button class="button -outline-blue-1 text-blue-1 size-38 rounded-4 js-down">
                                            <i class="icon-minus text-12"></i>
                                          </button>

                                          <div class="flex-center size-20 ml-15 mr-15">
                                            <div class="text-15 js-count">1</div>
                                          </div>

                                          <button class="button -outline-blue-1 text-blue-1 size-38 rounded-4 js-up">
                                            <i class="icon-plus text-12"></i>
                                          </button>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>


                              <div class="button-item">
                                <button class="mainSearch__submit button -dark-1 py-15 px-35 h-60 col-12 rounded-4 bg-blue-1 text-white">
                                  <i class="icon-search text-20 mr-10"></i>
                                  Search
                                </button>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="tabs__pane -tab-item-7 ">
                          <div class="mainSearch bg-white pr-20 py-20 lg:px-20 lg:pt-5 lg:pb-20 rounded-4 shadow-1">
                            <div class="button-grid items-center">

                              <div class="searchMenu-loc px-30 lg:py-20 lg:px-0 js-form-dd js-liverSearch">

                                <div data-x-dd-click="searchMenu-loc">
                                  <h4 class="text-15 fw-500 ls-2 lh-16">Location</h4>

                                  <div class="text-15 text-light-1 ls-2 lh-16">
                                    <input autocomplete="off" type="search" placeholder="Where are you going?" class="js-search js-dd-focus" />
                                  </div>
                                </div>


                                <div class="searchMenu-loc__field shadow-2 js-popup-window" data-x-dd="searchMenu-loc" data-x-dd-toggle="-is-active">
                                  <div class="bg-white px-30 py-30 sm:px-0 sm:py-15 rounded-4">
                                    <div class="y-gap-5 js-results">

                                      <div>
                                        <button class="-link d-block col-12 text-left rounded-4 px-20 py-15 js-search-option">
                                          <div class="d-flex">
                                            <div class="icon-location-2 text-light-1 text-20 pt-4"></div>
                                            <div class="ml-10">
                                              <div class="text-15 lh-12 fw-500 js-search-option-target">London</div>
                                              <div class="text-14 lh-12 text-light-1 mt-5">Greater London, United Kingdom</div>
                                            </div>
                                          </div>
                                        </button>
                                      </div>

                                      <div>
                                        <button class="-link d-block col-12 text-left rounded-4 px-20 py-15 js-search-option">
                                          <div class="d-flex">
                                            <div class="icon-location-2 text-light-1 text-20 pt-4"></div>
                                            <div class="ml-10">
                                              <div class="text-15 lh-12 fw-500 js-search-option-target">New York</div>
                                              <div class="text-14 lh-12 text-light-1 mt-5">New York State, United States</div>
                                            </div>
                                          </div>
                                        </button>
                                      </div>

                                      <div>
                                        <button class="-link d-block col-12 text-left rounded-4 px-20 py-15 js-search-option">
                                          <div class="d-flex">
                                            <div class="icon-location-2 text-light-1 text-20 pt-4"></div>
                                            <div class="ml-10">
                                              <div class="text-15 lh-12 fw-500 js-search-option-target">Paris</div>
                                              <div class="text-14 lh-12 text-light-1 mt-5">France</div>
                                            </div>
                                          </div>
                                        </button>
                                      </div>

                                      <div>
                                        <button class="-link d-block col-12 text-left rounded-4 px-20 py-15 js-search-option">
                                          <div class="d-flex">
                                            <div class="icon-location-2 text-light-1 text-20 pt-4"></div>
                                            <div class="ml-10">
                                              <div class="text-15 lh-12 fw-500 js-search-option-target">Madrid</div>
                                              <div class="text-14 lh-12 text-light-1 mt-5">Spain</div>
                                            </div>
                                          </div>
                                        </button>
                                      </div>

                                      <div>
                                        <button class="-link d-block col-12 text-left rounded-4 px-20 py-15 js-search-option">
                                          <div class="d-flex">
                                            <div class="icon-location-2 text-light-1 text-20 pt-4"></div>
                                            <div class="ml-10">
                                              <div class="text-15 lh-12 fw-500 js-search-option-target">Santorini</div>
                                              <div class="text-14 lh-12 text-light-1 mt-5">Greece</div>
                                            </div>
                                          </div>
                                        </button>
                                      </div>

                                    </div>
                                  </div>
                                </div>
                              </div>


                              <div class="searchMenu-date px-30 lg:py-20 lg:px-0 js-form-dd js-calendar js-calendar-el">

                                <div data-x-dd-click="searchMenu-date">
                                  <h4 class="text-15 fw-500 ls-2 lh-16">Check in - Check out</h4>

                                  <div class="capitalize text-15 text-light-1 ls-2 lh-16">
                                    <span class="js-first-date">Wed 2 Mar</span>
                                    -
                                    <span class="js-last-date">Fri 11 Apr</span>
                                  </div>
                                </div>


                                <div class="searchMenu-date__field shadow-2" data-x-dd="searchMenu-date" data-x-dd-toggle="-is-active">
                                  <div class="bg-white px-30 py-30 rounded-4">
                                    <div class="elCalendar js-calendar-el-calendar"></div>
                                  </div>
                                </div>
                              </div>


                              <div class="searchMenu-guests px-30 lg:py-20 lg:px-0 js-form-dd js-form-counters">

                                <div data-x-dd-click="searchMenu-guests">
                                  <h4 class="text-15 fw-500 ls-2 lh-16">Guest</h4>

                                  <div class="text-15 text-light-1 ls-2 lh-16">
                                    <span class="js-count-adult">2</span> adults
                                    -
                                    <span class="js-count-child">1</span> childeren
                                    -
                                    <span class="js-count-room">1</span> room
                                  </div>
                                </div>


                                <div class="searchMenu-guests__field shadow-2" data-x-dd="searchMenu-guests" data-x-dd-toggle="-is-active">
                                  <div class="bg-white px-30 py-30 rounded-4">
                                    <div class="row y-gap-10 justify-between items-center">
                                      <div class="col-auto">
                                        <div class="text-15 fw-500">Adults</div>
                                      </div>

                                      <div class="col-auto">
                                        <div class="d-flex items-center js-counter" data-value-change=".js-count-adult">
                                          <button class="button -outline-blue-1 text-blue-1 size-38 rounded-4 js-down">
                                            <i class="icon-minus text-12"></i>
                                          </button>

                                          <div class="flex-center size-20 ml-15 mr-15">
                                            <div class="text-15 js-count">2</div>
                                          </div>

                                          <button class="button -outline-blue-1 text-blue-1 size-38 rounded-4 js-up">
                                            <i class="icon-plus text-12"></i>
                                          </button>
                                        </div>
                                      </div>
                                    </div>

                                    <div class="border-top-light mt-24 mb-24"></div>

                                    <div class="row y-gap-10 justify-between items-center">
                                      <div class="col-auto">
                                        <div class="text-15 lh-12 fw-500">Children</div>
                                        <div class="text-14 lh-12 text-light-1 mt-5">Ages 0 - 17</div>
                                      </div>

                                      <div class="col-auto">
                                        <div class="d-flex items-center js-counter" data-value-change=".js-count-child">
                                          <button class="button -outline-blue-1 text-blue-1 size-38 rounded-4 js-down">
                                            <i class="icon-minus text-12"></i>
                                          </button>

                                          <div class="flex-center size-20 ml-15 mr-15">
                                            <div class="text-15 js-count">1</div>
                                          </div>

                                          <button class="button -outline-blue-1 text-blue-1 size-38 rounded-4 js-up">
                                            <i class="icon-plus text-12"></i>
                                          </button>
                                        </div>
                                      </div>
                                    </div>

                                    <div class="border-top-light mt-24 mb-24"></div>

                                    <div class="row y-gap-10 justify-between items-center">
                                      <div class="col-auto">
                                        <div class="text-15 fw-500">Rooms</div>
                                      </div>

                                      <div class="col-auto">
                                        <div class="d-flex items-center js-counter" data-value-change=".js-count-room">
                                          <button class="button -outline-blue-1 text-blue-1 size-38 rounded-4 js-down">
                                            <i class="icon-minus text-12"></i>
                                          </button>

                                          <div class="flex-center size-20 ml-15 mr-15">
                                            <div class="text-15 js-count">1</div>
                                          </div>

                                          <button class="button -outline-blue-1 text-blue-1 size-38 rounded-4 js-up">
                                            <i class="icon-plus text-12"></i>
                                          </button>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>


                              <div class="button-item">
                                <button class="mainSearch__submit button -dark-1 py-15 px-35 h-60 col-12 rounded-4 bg-blue-1 text-white">
                                  <i class="icon-search text-20 mr-10"></i>
                                  Search
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
          </div>
        </div>
  </div>
</section>

<section class="layout-pt-lg layout-pb-md">
  <div data-anim-wrap class="container">
    <div data-anim-child="slide-up delay-1" class="row justify-center text-center">
      <div class="col-auto">
        <div class="sectionTitle -md">
          <h2 class="sectionTitle__title">Special Offers</h2>
          <p class=" sectionTitle__text mt-5 sm:mt-0">These popular destinations have a lot to offer</p>
        </div>
      </div>
    </div>

    <div class="row y-gap-20 pt-40">
      <div data-anim-child="slide-left delay-3" class="col-lg-4 col-sm-6">

        <div class="ctaCard -type-1 rounded-4 ">
          <div class="ctaCard__image ratio ratio-41:45">
            <img class="img-ratio js-lazy" src="#" data-src="./assets/img/backgrounds/1.png" alt="image">
          </div>

          <div class="ctaCard__content py-50 px-50 lg:py-30 lg:px-30">


            <h4 class="text-30 lg:text-24 text-white">Things To Do On<br> Your Trip</h4>

            <div class="d-inline-block mt-30">
              <a href="#" class="button px-48 py-15 -blue-1 -min-180 bg-white text-dark-1">Experiences</a>
            </div>
          </div>
        </div>

      </div>

      <div data-anim-child="slide-left delay-4" class="col-lg-4 col-sm-6">

        <div class="ctaCard -type-1 rounded-4 ">
          <div class="ctaCard__image ratio ratio-41:45">
            <img class="img-ratio js-lazy" src="#" data-src="./assets/img/backgrounds/3.png" alt="image">
          </div>

          <div class="ctaCard__content py-50 px-50 lg:py-30 lg:px-30">


            <h4 class="text-30 lg:text-24 text-white">Let Your Curiosity<br>Do The Booking</h4>

            <div class="d-inline-block mt-30">
              <a href="#" class="button px-48 py-15 -blue-1 -min-180 bg-white text-dark-1">Learn More</a>
            </div>
          </div>
        </div>

      </div>

      <div data-anim-child="slide-left delay-5" class="col-lg-4 col-sm-6">

        <div class="ctaCard -type-1 rounded-4 ">
          <div class="ctaCard__image ratio ratio-41:45">
            <img class="img-ratio js-lazy" src="#" data-src="./assets/img/backgrounds/2.png" alt="image">
          </div>

          <div class="ctaCard__content py-50 px-50 lg:py-30 lg:px-30">

            <div class="text-15 fw-500 text-white mb-10">Enjoy Summer Deals</div>


            <h4 class="text-30 lg:text-24 text-white">Up to 70% Discount!</h4>

            <div class="d-inline-block mt-30">
              <a href="#" class="button px-48 py-15 -blue-1 -min-180 bg-white text-dark-1">Learn More</a>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</section>

<section class="layout-pt-md layout-pb-md">
  <div class="container">
    <div class="row justify-center text-center">
      <div class="col-auto">
        <div class="sectionTitle -md">
          <h2 class="sectionTitle__title">Why Choose Us</h2>
          <p class=" sectionTitle__text mt-5 sm:mt-0">These popular destinations have a lot to offer</p>
        </div>
      </div>
    </div>

    <div class="row y-gap-40 justify-between pt-50">

      <div class="col-lg-3 col-sm-6">

        <div class="featureIcon -type-1 ">
          <div class="d-flex justify-center">
            <img src="#" data-src="./assets/img/featureIcons/3/1.svg" alt="image" class="js-lazy">
          </div>

          <div class="text-center mt-30">
            <h4 class="text-18 fw-500">Best Price Guarantee</h4>
            <p class="text-15 mt-10">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
          </div>
        </div>

      </div>

      <div class="col-lg-3 col-sm-6">

        <div class="featureIcon -type-1 ">
          <div class="d-flex justify-center">
            <img src="#" data-src="./assets/img/featureIcons/3/2.svg" alt="image" class="js-lazy">
          </div>

          <div class="text-center mt-30">
            <h4 class="text-18 fw-500">Easy & Quick Booking</h4>
            <p class="text-15 mt-10">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
          </div>
        </div>

      </div>

      <div class="col-lg-3 col-sm-6">

        <div class="featureIcon -type-1 ">
          <div class="d-flex justify-center">
            <img src="#" data-src="./assets/img/featureIcons/3/3.svg" alt="image" class="js-lazy">
          </div>

          <div class="text-center mt-30">
            <h4 class="text-18 fw-500">Customer Care 24/7</h4>
            <p class="text-15 mt-10">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
          </div>
        </div>

      </div>

    </div>
  </div>
</section>

<section class="layout-pt-lg layout-pb-md">
      <div class="container" style="overflow: hidden;">
        <div data-anim="slide-up delay-1" class="row y-gap-20 justify-between items-end is-in-view">
          <div class="col-auto">
            <div class="sectionTitle -md">
              <h2 class="sectionTitle__title">Popular Destinations</h2>
              <p class=" sectionTitle__text mt-5 sm:mt-0">These popular destinations have a lot to offer</p>
            </div>
          </div>

          <div class="col-auto md:d-none">

            <a href="#" class="button -md -blue-1 bg-blue-1-05 text-blue-1">
              View All Destinations <div class="icon-arrow-top-right ml-15"></div>
            </a>

          </div>
        </div>

        <div class="relative pt-40 sm:pt-20 js-section-slider swiper-initialized swiper-horizontal swiper-pointer-events swiper-autoheight swiper-watch-progress swiper-backface-hidden is-in-view" data-gap="30" data-scrollbar="" data-slider-cols="base-2 xl-4 lg-3 md-2 sm-2 base-1" data-anim="slide-up delay-2">
          <div class="swiper-wrapper" id="swiper-wrapper-af9cc5eb4f49bc49" aria-live="polite" style="height: 340px;">

            <div class="swiper-slide swiper-slide-visible swiper-slide-active" role="group" aria-label="1 / 5" style="width: 255px; margin-right: 30px;">

              <a href="#" class="citiesCard -type-1 d-block rounded-4 ">
                <div class="citiesCard__image ratio ratio-3:4">
                  <img src="./assets/img/destination/Turkey_Loc.webp" data-src="./assets/img/destination/Turkey_Loc.webp" alt="image" class="js-lazy error" data-ll-status="error">
                </div>

                <div class="citiesCard__content d-flex flex-column justify-between text-center pt-30 pb-20 px-20">
                  <div class="citiesCard__bg"></div>

                    <div class="citiesCard__top">
                  </div>
     
                  <div class="citiesCard__bottom">
                    <h4 class="text-26 md:text-20 lh-13 text-white mb-20">Turkey</h4>
                    <button class="button col-12 h-60 -blue-1 bg-white text-dark-1">View Tours</button>
                  </div>
                </div>
              </a>

            </div>

            <div class="swiper-slide swiper-slide-visible swiper-slide-next" role="group" aria-label="2 / 5" style="width: 255px; margin-right: 30px;">

              <a href="#" class="citiesCard -type-1 d-block rounded-4 ">
                <div class="citiesCard__image ratio ratio-3:4">
                  <img src="./assets/img/destination/Malaysia_Loc.webp" data-src="./assets/img/destination/Malaysia_Loc.webp" alt="image" class="js-lazy error" data-ll-status="error">
                </div>

                <div class="citiesCard__content d-flex flex-column justify-between text-center pt-30 pb-20 px-20">
                  <div class="citiesCard__bg"></div>
               
                 <div class="citiesCard__top">
                  </div>

              <div class="citiesCard__bottom">
                    <h4 class="text-26 md:text-20 lh-13 text-white mb-20">Malaysia</h4>
                    <button class="button col-12 h-60 -blue-1 bg-white text-dark-1">View Tours</button>
                  </div>
                </div>
              </a>

            </div>

            <div class="swiper-slide swiper-slide-visible" role="group" aria-label="3 / 5" style="width: 255px; margin-right: 30px;">

              <a href="#" class="citiesCard -type-1 d-block rounded-4 ">
                <div class="citiesCard__image ratio ratio-3:4">
                  <img src="./assets/img/destination/Baku_Loc.webp" data-src="./assets/img/destination/Baku_Loc.webp" alt="image" class="js-lazy error" data-ll-status="error">
                </div>

                <div class="citiesCard__content d-flex flex-column justify-between text-center pt-30 pb-20 px-20">
                  <div class="citiesCard__bg"></div>

                     <div class="citiesCard__top">
                  </div>
  
                  <div class="citiesCard__bottom">
                    <h4 class="text-26 md:text-20 lh-13 text-white mb-20">Baku</h4>
                    <button class="button col-12 h-60 -blue-1 bg-white text-dark-1">View Tours</button>
                  </div>
                </div>
              </a>

            </div>

            <div class="swiper-slide swiper-slide-visible" role="group" aria-label="4 / 5" style="width: 255px; margin-right: 30px;">

              <a href="#" class="citiesCard -type-1 d-block rounded-4 ">
                <div class="citiesCard__image ratio ratio-3:4">
                  <img src="./assets/img/destination/Thailand_Loc.webp" data-src="./assets/img/destination/Thailand_Loc.webp" alt="image" class="js-lazy error" data-ll-status="error">
                </div>

                <div class="citiesCard__content d-flex flex-column justify-between text-center pt-30 pb-20 px-20">
                  <div class="citiesCard__bg"></div>

                     <div class="citiesCard__top">
                  </div>

                  <div class="citiesCard__bottom">
                    <h4 class="text-26 md:text-20 lh-13 text-white mb-20">Thailand</h4>
                    <button class="button col-12 h-60 -blue-1 bg-white text-dark-1">View Tours</button>
                  </div>
                </div>
              </a>

            </div>

            <div class="swiper-slide" role="group" aria-label="5 / 5" style="width: 255px; margin-right: 30px;">

              <a href="#" class="citiesCard -type-1 d-block rounded-4 ">
                <div class="citiesCard__image ratio ratio-3:4">
                <img src="./assets/img/destination/Paskistan_Loc.webp" data-src="./assets/img/destination/Paskistan_Loc.webp" alt="image" class="js-lazy error" data-ll-status="error">
                </div>

                <div class="citiesCard__content d-flex flex-column justify-between text-center pt-30 pb-20 px-20">
                  <div class="citiesCard__bg"></div>
                 
                    <div class="citiesCard__top">
                  </div>

                  <div class="citiesCard__bottom">
                    <h4 class="text-26 md:text-20 lh-13 text-white mb-20">Pakistan</h4>
                    <button class="button col-12 h-60 -blue-1 bg-white text-dark-1">View Tours</button>
                  </div>
                </div>
              </a>

            </div>


             <div class="swiper-slide" role="group" aria-label="5 / 5" style="width: 255px; margin-right: 30px;">

              <a href="#" class="citiesCard -type-1 d-block rounded-4 ">
                <div class="citiesCard__image ratio ratio-3:4">
                <img src="./assets/img/destination/Saudia_Loc.webp" data-src="./assets/img/destination/Saudia_Loc.webp" alt="image" class="js-lazy error" data-ll-status="error">
                </div>

                <div class="citiesCard__content d-flex flex-column justify-between text-center pt-30 pb-20 px-20">
                  <div class="citiesCard__bg"></div>

                  <div class="citiesCard__top">
                  </div>

                  <div class="citiesCard__bottom">
                    <h4 class="text-26 md:text-20 lh-13 text-white mb-20">Saudia Arabia</h4>
                    <button class="button col-12 h-60 -blue-1 bg-white text-dark-1">View Tours</button>
                  </div>
                </div>
              </a>

            </div>

          </div>


          <button class="section-slider-nav -prev flex-center button -blue-1 bg-white shadow-1 size-40 rounded-full sm:d-none js-prev swiper-button-disabled" disabled="" tabindex="-1" aria-label="Previous slide" aria-controls="swiper-wrapper-af9cc5eb4f49bc49" aria-disabled="true">
            <i class="icon icon-chevron-left text-12"></i>
          </button>

          <button class="section-slider-nav -next flex-center button -blue-1 bg-white shadow-1 size-40 rounded-full sm:d-none js-next" tabindex="0" aria-label="Next slide" aria-controls="swiper-wrapper-af9cc5eb4f49bc49" aria-disabled="false">
            <i class="icon icon-chevron-right text-12"></i>
          </button>


          <div class="slider-scrollbar bg-light-2 mt-40 sm:d-none js-scrollbar"><div class="swiper-scrollbar-drag" style="transform: translate3d(0px, 0px, 0px); width: 547.6px;"></div></div>

          <div class="row pt-20 d-none md:d-block">
            <div class="col-auto">
              <div class="d-inline-block">

                <a href="#" class="button -md -blue-1 bg-blue-1-05 text-blue-1">
                  View All Destinations <div class="icon-arrow-top-right ml-15"></div>
                </a>

              </div>
            </div>
          </div>
        <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
      </div>
    </section>

<section class="layout-pt-md layout-pb-md">
  <div data-anim-wrap class="container">
    <div data-anim-child="slide-up delay-1" class="row y-gap-20 justify-between items-end">
      <div class="col-auto">
        <div class="sectionTitle -md">
          <h2 class="sectionTitle__title">Recommended Hotels</h2>
          <p class=" sectionTitle__text mt-5 sm:mt-0">Interdum et malesuada fames ac ante ipsum</p>
        </div>
      </div>

      <div class="col-auto">

        <a href="#" class="button -md -blue-1 bg-blue-1-05 text-blue-1">
          More <div class="icon-arrow-top-right ml-15"></div>
        </a>

      </div>
    </div>

    <div class="row y-gap-30 pt-40 sm:pt-20">

      <div data-anim-child="slide-up delay-3" class="col-xl-3 col-lg-3 col-sm-6">

        <a href="hotel-single-1.html" class="hotelsCard -type-1 ">
          <div class="hotelsCard__image">

            <div class="cardImage ratio ratio-1:1">
              <div class="cardImage__content">

                <img class="rounded-4 col-12" src="./assets/img/hotels/1.png" alt="image">


              </div>

              <div class="cardImage__wishlist">
                <button class="button -blue-1 bg-white size-30 rounded-full shadow-2">
                  <i class="icon-heart text-12"></i>
                </button>
              </div>


              <div class="cardImage__leftBadge">
                <div class="py-5 px-15 rounded-right-4 text-12 lh-16 fw-500 uppercase bg-dark-1 text-white">
                  Breakfast included
                </div>
              </div>

            </div>

          </div>

          <div class="hotelsCard__content mt-10">
            <h4 class="hotelsCard__title text-dark-1 text-18 lh-16 fw-500">
              <span>The Montcalm At Brewery London City</span>
            </h4>

            <p class="text-light-1 lh-14 text-14 mt-5">Westminster Borough, London</p>

            <div class="d-flex items-center mt-20">
              <div class="flex-center bg-blue-1 rounded-4 size-30 text-12 fw-600 text-white">4.8</div>
              <div class="text-14 text-dark-1 fw-500 ml-10">Exceptional</div>
              <div class="text-14 text-light-1 ml-10">3,014 reviews</div>
            </div>

            <div class="mt-5">
              <div class="fw-500">
                Starting from <span class="text-blue-1">US$72</span>
              </div>
            </div>
          </div>
        </a>

      </div>

      <div data-anim-child="slide-up delay-4" class="col-xl-3 col-lg-3 col-sm-6">

        <a href="hotel-single-1.html" class="hotelsCard -type-1 ">
          <div class="hotelsCard__image">

            <div class="cardImage ratio ratio-1:1">
              <div class="cardImage__content">


                <div class="cardImage-slider rounded-4 overflow-hidden js-cardImage-slider">
                  <div class="swiper-wrapper">

                    <div class="swiper-slide">
                      <img class="col-12" src="./assets/img/hotels/2.png" alt="image">
                    </div>

                    <div class="swiper-slide">
                      <img class="col-12" src="./assets/img/hotels/1.png" alt="image">
                    </div>

                    <div class="swiper-slide">
                      <img class="col-12" src="./assets/img/hotels/3.png" alt="image">
                    </div>

                  </div>

                  <div class="cardImage-slider__pagination js-pagination"></div>

                  <div class="cardImage-slider__nav -prev">
                    <button class="button -blue-1 bg-white size-30 rounded-full shadow-2 js-prev">
                      <i class="icon-chevron-left text-10"></i>
                    </button>
                  </div>

                  <div class="cardImage-slider__nav -next">
                    <button class="button -blue-1 bg-white size-30 rounded-full shadow-2 js-next">
                      <i class="icon-chevron-right text-10"></i>
                    </button>
                  </div>
                </div>

              </div>

              <div class="cardImage__wishlist">
                <button class="button -blue-1 bg-white size-30 rounded-full shadow-2">
                  <i class="icon-heart text-12"></i>
                </button>
              </div>


            </div>

          </div>

          <div class="hotelsCard__content mt-10">
            <h4 class="hotelsCard__title text-dark-1 text-18 lh-16 fw-500">
              <span>Staycity Aparthotels Deptford Bridge Station</span>
            </h4>

            <p class="text-light-1 lh-14 text-14 mt-5">Ciutat Vella, Barcelona</p>

            <div class="d-flex items-center mt-20">
              <div class="flex-center bg-blue-1 rounded-4 size-30 text-12 fw-600 text-white">4.8</div>
              <div class="text-14 text-dark-1 fw-500 ml-10">Exceptional</div>
              <div class="text-14 text-light-1 ml-10">3,014 reviews</div>
            </div>

            <div class="mt-5">
              <div class="fw-500">
                Starting from <span class="text-blue-1">US$72</span>
              </div>
            </div>
          </div>
        </a>

      </div>

      <div data-anim-child="slide-up delay-5" class="col-xl-3 col-lg-3 col-sm-6">

        <a href="hotel-single-1.html" class="hotelsCard -type-1 ">
          <div class="hotelsCard__image">

            <div class="cardImage ratio ratio-1:1">
              <div class="cardImage__content">

                <img class="rounded-4 col-12" src="./assets/img/hotels/3.png" alt="image">


              </div>

              <div class="cardImage__wishlist">
                <button class="button -blue-1 bg-white size-30 rounded-full shadow-2">
                  <i class="icon-heart text-12"></i>
                </button>
              </div>


              <div class="cardImage__leftBadge">
                <div class="py-5 px-15 rounded-right-4 text-12 lh-16 fw-500 uppercase bg-blue-1 text-white">
                  Best Seller
                </div>
              </div>

            </div>

          </div>

          <div class="hotelsCard__content mt-10">
            <h4 class="hotelsCard__title text-dark-1 text-18 lh-16 fw-500">
              <span>The Westin New York at Times Square</span>
            </h4>

            <p class="text-light-1 lh-14 text-14 mt-5">Manhattan, New York</p>

            <div class="d-flex items-center mt-20">
              <div class="flex-center bg-blue-1 rounded-4 size-30 text-12 fw-600 text-white">4.8</div>
              <div class="text-14 text-dark-1 fw-500 ml-10">Exceptional</div>
              <div class="text-14 text-light-1 ml-10">3,014 reviews</div>
            </div>

            <div class="mt-5">
              <div class="fw-500">
                Starting from <span class="text-blue-1">US$72</span>
              </div>
            </div>
          </div>
        </a>

      </div>

      <div data-anim-child="slide-up delay-6" class="col-xl-3 col-lg-3 col-sm-6">

        <a href="hotel-single-1.html" class="hotelsCard -type-1 ">
          <div class="hotelsCard__image">

            <div class="cardImage ratio ratio-1:1">
              <div class="cardImage__content">

                <img class="rounded-4 col-12" src="./assets/img/hotels/4.png" alt="image">


              </div>

              <div class="cardImage__wishlist">
                <button class="button -blue-1 bg-white size-30 rounded-full shadow-2">
                  <i class="icon-heart text-12"></i>
                </button>
              </div>


              <div class="cardImage__leftBadge">
                <div class="py-5 px-15 rounded-right-4 text-12 lh-16 fw-500 uppercase bg-yellow-1 text-dark-1">
                  Top Rated
                </div>
              </div>

            </div>

          </div>

          <div class="hotelsCard__content mt-10">
            <h4 class="hotelsCard__title text-dark-1 text-18 lh-16 fw-500">
              <span>DoubleTree by Hilton Hotel New York Times Square West</span>
            </h4>

            <p class="text-light-1 lh-14 text-14 mt-5">Vaticano Prati, Rome</p>

            <div class="d-flex items-center mt-20">
              <div class="flex-center bg-blue-1 rounded-4 size-30 text-12 fw-600 text-white">4.8</div>
              <div class="text-14 text-dark-1 fw-500 ml-10">Exceptional</div>
              <div class="text-14 text-light-1 ml-10">3,014 reviews</div>
            </div>

            <div class="mt-5">
              <div class="fw-500">
                Starting from <span class="text-blue-1">US$72</span>
              </div>
            </div>
          </div>
        </a>

      </div>

    </div>
  </div>
</section>

<section class="layout-pt-md layout-pb-md">
  <div data-anim-wrap class="container">
    <div data-anim-child="slide-up" class="row y-gap-20 justify-between items-end">
      <div class="col-auto">
        <div class="sectionTitle -md">
          <h2 class="sectionTitle__title">Most Popular Tours</h2>
          <p class=" sectionTitle__text mt-5 sm:mt-0">Interdum et malesuada fames ac ante ipsum</p>
        </div>
      </div>

      <div class="col-auto">

        <a href="#" class="button -md -blue-1 bg-blue-1-05 text-blue-1">
          More <div class="icon-arrow-top-right ml-15"></div>
        </a>

      </div>
    </div>

    <div class="row y-gap-30 pt-40 sm:pt-20">

      <div data-anim-child="slide-up delay-1" class="col-xl-3 col-lg-3 col-sm-6">

        <a href="tour-single.html" class="tourCard -type-1 rounded-4 ">
          <div class="tourCard__image">

            <div class="cardImage ratio ratio-1:1">
              <div class="cardImage__content">

                <img class="rounded-4 col-12" src="./assets/img/tours/1.png" alt="image">


              </div>

              <div class="cardImage__wishlist">
                <button class="button -blue-1 bg-white size-30 rounded-full shadow-2">
                  <i class="icon-heart text-12"></i>
                </button>
              </div>


              <div class="cardImage__leftBadge">
                <div class="py-5 px-15 rounded-right-4 text-12 lh-16 fw-500 uppercase bg-dark-1 text-white">
                  LIKELY TO SELL OUT*
                </div>
              </div>

            </div>

          </div>

          <div class="tourCard__content mt-10">
            <div class="d-flex items-center lh-14 mb-5">
              <div class="text-14 text-light-1">16+ hours</div>
              <div class="size-3 bg-light-1 rounded-full ml-10 mr-10"></div>
              <div class="text-14 text-light-1">Full-day Tours</div>
            </div>

            <h4 class="tourCard__title text-dark-1 text-18 lh-16 fw-500">
              <span>Stonehenge, Windsor Castle and Bath with Pub Lunch in Lacock</span>
            </h4>

            <p class="text-light-1 lh-14 text-14 mt-5">Westminster Borough, London</p>

            <div class="row justify-between items-center pt-15">
              <div class="col-auto">
                <div class="d-flex items-center">
                  <div class="d-flex items-center x-gap-5">

                    <div class="icon-star text-yellow-1 text-10"></div>

                    <div class="icon-star text-yellow-1 text-10"></div>

                    <div class="icon-star text-yellow-1 text-10"></div>

                    <div class="icon-star text-yellow-1 text-10"></div>

                    <div class="icon-star text-yellow-1 text-10"></div>

                  </div>

                  <div class="text-14 text-light-1 ml-10">3,014 reviews</div>
                </div>
              </div>

              <div class="col-auto">
                <div class="text-14 text-light-1">
                  From
                  <span class="text-16 fw-500 text-dark-1">US$72</span>
                </div>
              </div>
            </div>
          </div>
        </a>

      </div>

      <div data-anim-child="slide-up delay-2" class="col-xl-3 col-lg-3 col-sm-6">

        <a href="tour-single.html" class="tourCard -type-1 rounded-4 ">
          <div class="tourCard__image">

            <div class="cardImage ratio ratio-1:1">
              <div class="cardImage__content">


                <div class="cardImage-slider rounded-4 overflow-hidden js-cardImage-slider">
                  <div class="swiper-wrapper">

                    <div class="swiper-slide">
                      <img class="col-12" src="./assets/img/tours/2.png" alt="image">
                    </div>

                    <div class="swiper-slide">
                      <img class="col-12" src="./assets/img/tours/1.png" alt="image">
                    </div>

                    <div class="swiper-slide">
                      <img class="col-12" src="./assets/img/tours/3.png" alt="image">
                    </div>

                  </div>

                  <div class="cardImage-slider__pagination js-pagination"></div>

                  <div class="cardImage-slider__nav -prev">
                    <button class="button -blue-1 bg-white size-30 rounded-full shadow-2 js-prev">
                      <i class="icon-chevron-left text-10"></i>
                    </button>
                  </div>

                  <div class="cardImage-slider__nav -next">
                    <button class="button -blue-1 bg-white size-30 rounded-full shadow-2 js-next">
                      <i class="icon-chevron-right text-10"></i>
                    </button>
                  </div>
                </div>

              </div>

              <div class="cardImage__wishlist">
                <button class="button -blue-1 bg-white size-30 rounded-full shadow-2">
                  <i class="icon-heart text-12"></i>
                </button>
              </div>


            </div>

          </div>

          <div class="tourCard__content mt-10">
            <div class="d-flex items-center lh-14 mb-5">
              <div class="text-14 text-light-1">9+ hours</div>
              <div class="size-3 bg-light-1 rounded-full ml-10 mr-10"></div>
              <div class="text-14 text-light-1">Attractions &amp; Museums</div>
            </div>

            <h4 class="tourCard__title text-dark-1 text-18 lh-16 fw-500">
              <span>Westminster Walking Tour & Westminster Abbey Entry</span>
            </h4>

            <p class="text-light-1 lh-14 text-14 mt-5">Ciutat Vella, Barcelona</p>

            <div class="row justify-between items-center pt-15">
              <div class="col-auto">
                <div class="d-flex items-center">
                  <div class="d-flex items-center x-gap-5">

                    <div class="icon-star text-yellow-1 text-10"></div>

                    <div class="icon-star text-yellow-1 text-10"></div>

                    <div class="icon-star text-yellow-1 text-10"></div>

                    <div class="icon-star text-yellow-1 text-10"></div>

                    <div class="icon-star text-yellow-1 text-10"></div>

                  </div>

                  <div class="text-14 text-light-1 ml-10">3,014 reviews</div>
                </div>
              </div>

              <div class="col-auto">
                <div class="text-14 text-light-1">
                  From
                  <span class="text-16 fw-500 text-dark-1">US$72</span>
                </div>
              </div>
            </div>
          </div>
        </a>

      </div>

      <div data-anim-child="slide-up delay-3" class="col-xl-3 col-lg-3 col-sm-6">

        <a href="tour-single.html" class="tourCard -type-1 rounded-4 ">
          <div class="tourCard__image">

            <div class="cardImage ratio ratio-1:1">
              <div class="cardImage__content">

                <img class="rounded-4 col-12" src="./assets/img/tours/3.png" alt="image">


              </div>

              <div class="cardImage__wishlist">
                <button class="button -blue-1 bg-white size-30 rounded-full shadow-2">
                  <i class="icon-heart text-12"></i>
                </button>
              </div>


              <div class="cardImage__leftBadge">
                <div class="py-5 px-15 rounded-right-4 text-12 lh-16 fw-500 uppercase bg-blue-1 text-white">
                  Best Seller
                </div>
              </div>

            </div>

          </div>

          <div class="tourCard__content mt-10">
            <div class="d-flex items-center lh-14 mb-5">
              <div class="text-14 text-light-1">40–55 minutes</div>
              <div class="size-3 bg-light-1 rounded-full ml-10 mr-10"></div>
              <div class="text-14 text-light-1">Private and Luxury</div>
            </div>

            <h4 class="tourCard__title text-dark-1 text-18 lh-16 fw-500">
              <span>High-Speed Thames River RIB Cruise in London</span>
            </h4>

            <p class="text-light-1 lh-14 text-14 mt-5">Manhattan, New York</p>

            <div class="row justify-between items-center pt-15">
              <div class="col-auto">
                <div class="d-flex items-center">
                  <div class="d-flex items-center x-gap-5">

                    <div class="icon-star text-yellow-1 text-10"></div>

                    <div class="icon-star text-yellow-1 text-10"></div>

                    <div class="icon-star text-yellow-1 text-10"></div>

                    <div class="icon-star text-yellow-1 text-10"></div>

                    <div class="icon-star text-yellow-1 text-10"></div>

                  </div>

                  <div class="text-14 text-light-1 ml-10">3,014 reviews</div>
                </div>
              </div>

              <div class="col-auto">
                <div class="text-14 text-light-1">
                  From
                  <span class="text-16 fw-500 text-dark-1">US$72</span>
                </div>
              </div>
            </div>
          </div>
        </a>

      </div>

      <div data-anim-child="slide-up delay-4" class="col-xl-3 col-lg-3 col-sm-6">

        <a href="tour-single.html" class="tourCard -type-1 rounded-4 ">
          <div class="tourCard__image">

            <div class="cardImage ratio ratio-1:1">
              <div class="cardImage__content">

                <img class="rounded-4 col-12" src="./assets/img/tours/4.png" alt="image">


              </div>

              <div class="cardImage__wishlist">
                <button class="button -blue-1 bg-white size-30 rounded-full shadow-2">
                  <i class="icon-heart text-12"></i>
                </button>
              </div>


              <div class="cardImage__leftBadge">
                <div class="py-5 px-15 rounded-right-4 text-12 lh-16 fw-500 uppercase bg-yellow-1 text-dark-1">
                  Top Rated
                </div>
              </div>

            </div>

          </div>

          <div class="tourCard__content mt-10">
            <div class="d-flex items-center lh-14 mb-5">
              <div class="text-14 text-light-1">94+ days</div>
              <div class="size-3 bg-light-1 rounded-full ml-10 mr-10"></div>
              <div class="text-14 text-light-1">Bus Tours</div>
            </div>

            <h4 class="tourCard__title text-dark-1 text-18 lh-16 fw-500">
              <span>Edinburgh Darkside Walking Tour: Mysteries, Murder and Legends</span>
            </h4>

            <p class="text-light-1 lh-14 text-14 mt-5">Vaticano Prati, Rome</p>

            <div class="row justify-between items-center pt-15">
              <div class="col-auto">
                <div class="d-flex items-center">
                  <div class="d-flex items-center x-gap-5">

                    <div class="icon-star text-yellow-1 text-10"></div>

                    <div class="icon-star text-yellow-1 text-10"></div>

                    <div class="icon-star text-yellow-1 text-10"></div>

                    <div class="icon-star text-yellow-1 text-10"></div>

                    <div class="icon-star text-yellow-1 text-10"></div>

                  </div>

                  <div class="text-14 text-light-1 ml-10">3,014 reviews</div>
                </div>
              </div>

              <div class="col-auto">
                <div class="text-14 text-light-1">
                  From
                  <span class="text-16 fw-500 text-dark-1">US$72</span>
                </div>
              </div>
            </div>
          </div>
        </a>

      </div>

    </div>
  </div>
</section>




<section class="layout-pt-md layout-pb-md">
  <div data-anim-wrap class="container">
    <div data-anim-child="slide-up" class="row y-gap-20 justify-between items-end">
      <div class="col-auto">
        <div class="sectionTitle -md">
          <h2 class="sectionTitle__title">Popular Car Hire</h2>
          <p class=" sectionTitle__text mt-5 sm:mt-0">Interdum et malesuada fames ac ante ipsum</p>
        </div>
      </div>

      <div class="col-auto">

        <a href="#" class="button -md -blue-1 bg-blue-1-05 text-blue-1">
          More <div class="icon-arrow-top-right ml-15"></div>
        </a>

      </div>
    </div>

    <div class="row y-gap-30 pt-40 sm:pt-20">

      <div data-anim-child="slide-up delay-1" class="col-xl-3 col-lg-3 col-sm-6">

        <a href="car-single.html" class="carCard -type-1 d-block rounded-4 ">
          <div class="carCard__image">

            <div class="cardImage ratio border-light ratio-6:5">
              <div class="cardImage__content">

                <img class="rounded-4 col-12" src="./assets/img/cars/1.png" alt="image">


              </div>

              <div class="cardImage__wishlist">
                <button class="button -blue-1 bg-white size-30 rounded-full shadow-2">
                  <i class="icon-heart text-12"></i>
                </button>
              </div>


            </div>

          </div>

          <div class="carCard__content mt-10">
            <div class="d-flex items-center lh-14 mb-5">
              <div class="text-14 text-light-1">Heathrow Airport</div>
              <div class="size-3 bg-light-1 rounded-full ml-10 mr-10"></div>
              <div class="text-14 text-light-1 uppercase">Luxury</div>
            </div>

            <h4 class="text-dark-1 text-18 lh-16 fw-500">
              Mercedes-Benz E-Class <span class="text-15 text-light-1 fw-400">or similar</span>
            </h4>
            <p class="text-light-1 lh-14 text-14 mt-5"></p>

            <div class="row x-gap-20 y-gap-10 items-center pt-5">
              <div class="col-auto">
                <div class="d-flex items-center text-14 text-dark-1">
                  <i class="icon-user-2 mr-10"></i>
                  <div class="lh-14">4</div>
                </div>
              </div>

              <div class="col-auto">
                <div class="d-flex items-center text-14 text-dark-1">
                  <i class="icon-luggage mr-10"></i>
                  <div class="lh-14">1</div>
                </div>
              </div>

              <div class="col-auto">
                <div class="d-flex items-center text-14 text-dark-1">
                  <i class="icon-transmission mr-10"></i>
                  <div class="lh-14">Automatic </div>
                </div>
              </div>

              <div class="col-auto">
                <div class="d-flex items-center text-14 text-dark-1">
                  <i class="icon-speedometer mr-10"></i>
                  <div class="lh-14">Unlimited</div>
                </div>
              </div>
            </div>

            <div class="d-flex items-center mt-20">
              <div class="flex-center bg-yellow-1 rounded-4 size-30 text-12 fw-600 text-dark-1">4.8</div>
              <div class="text-14 text-dark-1 fw-500 ml-10">Exceptional</div>
              <div class="text-14 text-light-1 ml-10">3,014 reviews</div>
            </div>

            <div class="mt-5">
              <div class="text-light-1">
                <span class="fw-500 text-dark-1">US$72</span> total
              </div>
            </div>
          </div>
        </a>

      </div>

      <div data-anim-child="slide-up delay-2" class="col-xl-3 col-lg-3 col-sm-6">

        <a href="car-single.html" class="carCard -type-1 d-block rounded-4 ">
          <div class="carCard__image">

            <div class="cardImage ratio border-light ratio-6:5">
              <div class="cardImage__content">


                <div class="cardImage-slider rounded-4 overflow-hidden js-cardImage-slider">
                  <div class="swiper-wrapper">

                    <div class="swiper-slide">
                      <img class="col-12" src="./assets/img/cars/2.png" alt="image">
                    </div>

                    <div class="swiper-slide">
                      <img class="col-12" src="./assets/img/cars/3.png" alt="image">
                    </div>

                    <div class="swiper-slide">
                      <img class="col-12" src="./assets/img/cars/1.png" alt="image">
                    </div>

                  </div>

                  <div class="cardImage-slider__pagination js-pagination"></div>

                  <div class="cardImage-slider__nav -prev">
                    <button class="button -blue-1 bg-white size-30 rounded-full shadow-2 js-prev">
                      <i class="icon-chevron-left text-10"></i>
                    </button>
                  </div>

                  <div class="cardImage-slider__nav -next">
                    <button class="button -blue-1 bg-white size-30 rounded-full shadow-2 js-next">
                      <i class="icon-chevron-right text-10"></i>
                    </button>
                  </div>
                </div>

              </div>

              <div class="cardImage__wishlist">
                <button class="button -blue-1 bg-white size-30 rounded-full shadow-2">
                  <i class="icon-heart text-12"></i>
                </button>
              </div>


            </div>

          </div>

          <div class="carCard__content mt-10">
            <div class="d-flex items-center lh-14 mb-5">
              <div class="text-14 text-light-1">Heathrow Airport</div>
              <div class="size-3 bg-light-1 rounded-full ml-10 mr-10"></div>
              <div class="text-14 text-light-1 uppercase">Suv</div>
            </div>

            <h4 class="text-dark-1 text-18 lh-16 fw-500">
              Jaguar F-Pace <span class="text-15 text-light-1 fw-400">or similar</span>
            </h4>
            <p class="text-light-1 lh-14 text-14 mt-5"></p>

            <div class="row x-gap-20 y-gap-10 items-center pt-5">
              <div class="col-auto">
                <div class="d-flex items-center text-14 text-dark-1">
                  <i class="icon-user-2 mr-10"></i>
                  <div class="lh-14">4</div>
                </div>
              </div>

              <div class="col-auto">
                <div class="d-flex items-center text-14 text-dark-1">
                  <i class="icon-luggage mr-10"></i>
                  <div class="lh-14">1</div>
                </div>
              </div>

              <div class="col-auto">
                <div class="d-flex items-center text-14 text-dark-1">
                  <i class="icon-transmission mr-10"></i>
                  <div class="lh-14">Automatic </div>
                </div>
              </div>

              <div class="col-auto">
                <div class="d-flex items-center text-14 text-dark-1">
                  <i class="icon-speedometer mr-10"></i>
                  <div class="lh-14">Unlimited</div>
                </div>
              </div>
            </div>

            <div class="d-flex items-center mt-20">
              <div class="flex-center bg-yellow-1 rounded-4 size-30 text-12 fw-600 text-dark-1">4.8</div>
              <div class="text-14 text-dark-1 fw-500 ml-10">Exceptional</div>
              <div class="text-14 text-light-1 ml-10">3,014 reviews</div>
            </div>

            <div class="mt-5">
              <div class="text-light-1">
                <span class="fw-500 text-dark-1">US$72</span> total
              </div>
            </div>
          </div>
        </a>

      </div>

      <div data-anim-child="slide-up delay-3" class="col-xl-3 col-lg-3 col-sm-6">

        <a href="car-single.html" class="carCard -type-1 d-block rounded-4 ">
          <div class="carCard__image">

            <div class="cardImage ratio border-light ratio-6:5">
              <div class="cardImage__content">

                <img class="rounded-4 col-12" src="./assets/img/cars/3.png" alt="image">


              </div>

              <div class="cardImage__wishlist">
                <button class="button -blue-1 bg-white size-30 rounded-full shadow-2">
                  <i class="icon-heart text-12"></i>
                </button>
              </div>


              <div class="cardImage__leftBadge">
                <div class="py-5 px-15 rounded-right-4 text-12 lh-16 fw-500 uppercase bg-blue-1 text-white">
                  Best Seller
                </div>
              </div>

            </div>

          </div>

          <div class="carCard__content mt-10">
            <div class="d-flex items-center lh-14 mb-5">
              <div class="text-14 text-light-1">Heathrow Airport</div>
              <div class="size-3 bg-light-1 rounded-full ml-10 mr-10"></div>
              <div class="text-14 text-light-1 uppercase">Suv</div>
            </div>

            <h4 class="text-dark-1 text-18 lh-16 fw-500">
              Volvo XC90 <span class="text-15 text-light-1 fw-400">or similar</span>
            </h4>
            <p class="text-light-1 lh-14 text-14 mt-5"></p>

            <div class="row x-gap-20 y-gap-10 items-center pt-5">
              <div class="col-auto">
                <div class="d-flex items-center text-14 text-dark-1">
                  <i class="icon-user-2 mr-10"></i>
                  <div class="lh-14">4</div>
                </div>
              </div>

              <div class="col-auto">
                <div class="d-flex items-center text-14 text-dark-1">
                  <i class="icon-luggage mr-10"></i>
                  <div class="lh-14">1</div>
                </div>
              </div>

              <div class="col-auto">
                <div class="d-flex items-center text-14 text-dark-1">
                  <i class="icon-transmission mr-10"></i>
                  <div class="lh-14">Automatic </div>
                </div>
              </div>

              <div class="col-auto">
                <div class="d-flex items-center text-14 text-dark-1">
                  <i class="icon-speedometer mr-10"></i>
                  <div class="lh-14">Unlimited</div>
                </div>
              </div>
            </div>

            <div class="d-flex items-center mt-20">
              <div class="flex-center bg-yellow-1 rounded-4 size-30 text-12 fw-600 text-dark-1">4.8</div>
              <div class="text-14 text-dark-1 fw-500 ml-10">Exceptional</div>
              <div class="text-14 text-light-1 ml-10">3,014 reviews</div>
            </div>

            <div class="mt-5">
              <div class="text-light-1">
                <span class="fw-500 text-dark-1">US$72</span> total
              </div>
            </div>
          </div>
        </a>

      </div>

      <div data-anim-child="slide-up delay-4" class="col-xl-3 col-lg-3 col-sm-6">

        <a href="car-single.html" class="carCard -type-1 d-block rounded-4 ">
          <div class="carCard__image">

            <div class="cardImage ratio border-light ratio-6:5">
              <div class="cardImage__content">

                <img class="rounded-4 col-12" src="./assets/img/cars/4.png" alt="image">


              </div>

              <div class="cardImage__wishlist">
                <button class="button -blue-1 bg-white size-30 rounded-full shadow-2">
                  <i class="icon-heart text-12"></i>
                </button>
              </div>


            </div>

          </div>

          <div class="carCard__content mt-10">
            <div class="d-flex items-center lh-14 mb-5">
              <div class="text-14 text-light-1">Heathrow Airport</div>
              <div class="size-3 bg-light-1 rounded-full ml-10 mr-10"></div>
              <div class="text-14 text-light-1 uppercase">Luxury</div>
            </div>

            <h4 class="text-dark-1 text-18 lh-16 fw-500">
              BMW 5 Series <span class="text-15 text-light-1 fw-400">or similar</span>
            </h4>
            <p class="text-light-1 lh-14 text-14 mt-5"></p>

            <div class="row x-gap-20 y-gap-10 items-center pt-5">
              <div class="col-auto">
                <div class="d-flex items-center text-14 text-dark-1">
                  <i class="icon-user-2 mr-10"></i>
                  <div class="lh-14">4</div>
                </div>
              </div>

              <div class="col-auto">
                <div class="d-flex items-center text-14 text-dark-1">
                  <i class="icon-luggage mr-10"></i>
                  <div class="lh-14">1</div>
                </div>
              </div>

              <div class="col-auto">
                <div class="d-flex items-center text-14 text-dark-1">
                  <i class="icon-transmission mr-10"></i>
                  <div class="lh-14">Automatic </div>
                </div>
              </div>

              <div class="col-auto">
                <div class="d-flex items-center text-14 text-dark-1">
                  <i class="icon-speedometer mr-10"></i>
                  <div class="lh-14">Unlimited</div>
                </div>
              </div>
            </div>

            <div class="d-flex items-center mt-20">
              <div class="flex-center bg-yellow-1 rounded-4 size-30 text-12 fw-600 text-dark-1">4.8</div>
              <div class="text-14 text-dark-1 fw-500 ml-10">Exceptional</div>
              <div class="text-14 text-light-1 ml-10">3,014 reviews</div>
            </div>

            <div class="mt-5">
              <div class="text-light-1">
                <span class="fw-500 text-dark-1">US$72</span> total
              </div>
            </div>
          </div>
        </a>

      </div>

    </div>
  </div>
</section>



<section class="layout-pt-md layout-pb-lg">
  <div data-anim-wrap class="container">
    <div data-anim-child="slide-up" class="row y-gap-20 justify-between items-end">
      <div class="col-auto">
        <div class="sectionTitle -md">
          <h2 class="sectionTitle__title">Popular Routes</h2>
          <p class=" sectionTitle__text mt-5 sm:mt-0">Interdum et malesuada fames ac ante ipsum</p>
        </div>
      </div>

      <div class="col-auto">

        <a href="#" class="button -md -blue-1 bg-blue-1-05 text-blue-1">
          More <div class="icon-arrow-top-right ml-15"></div>
        </a>

      </div>
    </div>

    <div class="row y-gap-30 pt-40 sm:pt-20">

      <div data-anim-child="slide-up delay-1" class="col-12">
        <div class="px-20 py-20 rounded-4 border-light">
          <div class="row y-gap-30 justify-between xl:justify-">

            <div class="col-xl-4 col-lg-6">
              <div class="row y-gap-10 items-center">
                <div class="col-sm-auto">
                  <img class="size-40" src="./assets/img/flightIcons/1.png" alt="image">
                </div>

                <div class="col">
                  <div class="row x-gap-20 items-end">
                    <div class="col-auto">
                      <div class="lh-15 fw-500">14:00</div>
                      <div class="text-15 lh-15 text-light-1">SAW</div>
                    </div>

                    <div class="col text-center">
                      <div class="flightLine">
                        <div></div>
                        <div></div>
                      </div>
                      <div class="text-15 lh-15 text-light-1 mt-10">4h 05m- Nonstop</div>
                    </div>

                    <div class="col-auto">
                      <div class="lh-15 fw-500">22:00</div>
                      <div class="text-15 lh-15 text-light-1">STN</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-4 col-lg-6">
              <div class="row y-gap-10 items-center">
                <div class="col-sm-auto">
                  <img class="size-40" src="./assets/img/flightIcons/2.png" alt="image">
                </div>

                <div class="col">
                  <div class="row x-gap-20 items-end">
                    <div class="col-auto">
                      <div class="lh-15 fw-500">14:00</div>
                      <div class="text-15 lh-15 text-light-1">SAW</div>
                    </div>

                    <div class="col text-center">
                      <div class="flightLine">
                        <div></div>
                        <div></div>
                      </div>
                      <div class="text-15 lh-15 text-light-1 mt-10">4h 05m- Nonstop</div>
                    </div>

                    <div class="col-auto">
                      <div class="lh-15 fw-500">22:00</div>
                      <div class="text-15 lh-15 text-light-1">STN</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>


            <div class="col-auto">
              <div class="d-flex items-center">
                <div class="text-right mr-24">
                  <div class="lh-15 fw-500">US$934</div>
                  <div class="text-15 lh-15 text-light-1">16 deals</div>
                </div>


                <a href="#" class="button -outline-blue-1 px-30 h-50 text-blue-1">
                  View Deal <div class="icon-arrow-top-right ml-15"></div>
                </a>

              </div>
            </div>
          </div>
        </div>
      </div>

      <div data-anim-child="slide-up delay-2" class="col-12">
        <div class="px-20 py-20 rounded-4 border-light">
          <div class="row y-gap-30 justify-between xl:justify-">

            <div class="col-xl-4 col-lg-6">
              <div class="row y-gap-10 items-center">
                <div class="col-sm-auto">
                  <img class="size-40" src="./assets/img/flightIcons/1.png" alt="image">
                </div>

                <div class="col">
                  <div class="row x-gap-20 items-end">
                    <div class="col-auto">
                      <div class="lh-15 fw-500">14:00</div>
                      <div class="text-15 lh-15 text-light-1">SAW</div>
                    </div>

                    <div class="col text-center">
                      <div class="flightLine">
                        <div></div>
                        <div></div>
                      </div>
                      <div class="text-15 lh-15 text-light-1 mt-10">4h 05m- Nonstop</div>
                    </div>

                    <div class="col-auto">
                      <div class="lh-15 fw-500">22:00</div>
                      <div class="text-15 lh-15 text-light-1">STN</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-4 col-lg-6">
              <div class="row y-gap-10 items-center">
                <div class="col-sm-auto">
                  <img class="size-40" src="./assets/img/flightIcons/2.png" alt="image">
                </div>

                <div class="col">
                  <div class="row x-gap-20 items-end">
                    <div class="col-auto">
                      <div class="lh-15 fw-500">14:00</div>
                      <div class="text-15 lh-15 text-light-1">SAW</div>
                    </div>

                    <div class="col text-center">
                      <div class="flightLine">
                        <div></div>
                        <div></div>
                      </div>
                      <div class="text-15 lh-15 text-light-1 mt-10">4h 05m- Nonstop</div>
                    </div>

                    <div class="col-auto">
                      <div class="lh-15 fw-500">22:00</div>
                      <div class="text-15 lh-15 text-light-1">STN</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>


            <div class="col-auto">
              <div class="d-flex items-center">
                <div class="text-right mr-24">
                  <div class="lh-15 fw-500">US$934</div>
                  <div class="text-15 lh-15 text-light-1">16 deals</div>
                </div>


                <a href="#" class="button -outline-blue-1 px-30 h-50 text-blue-1">
                  View Deal <div class="icon-arrow-top-right ml-15"></div>
                </a>

              </div>
            </div>
          </div>
        </div>
      </div>

      <div data-anim-child="slide-up delay-3" class="col-12">
        <div class="px-20 py-20 rounded-4 border-light">
          <div class="row y-gap-30 justify-between xl:justify-">

            <div class="col-xl-4 col-lg-6">
              <div class="row y-gap-10 items-center">
                <div class="col-sm-auto">
                  <img class="size-40" src="./assets/img/flightIcons/1.png" alt="image">
                </div>

                <div class="col">
                  <div class="row x-gap-20 items-end">
                    <div class="col-auto">
                      <div class="lh-15 fw-500">14:00</div>
                      <div class="text-15 lh-15 text-light-1">SAW</div>
                    </div>

                    <div class="col text-center">
                      <div class="flightLine">
                        <div></div>
                        <div></div>
                      </div>
                      <div class="text-15 lh-15 text-light-1 mt-10">4h 05m- Nonstop</div>
                    </div>

                    <div class="col-auto">
                      <div class="lh-15 fw-500">22:00</div>
                      <div class="text-15 lh-15 text-light-1">STN</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-4 col-lg-6">
              <div class="row y-gap-10 items-center">
                <div class="col-sm-auto">
                  <img class="size-40" src="./assets/img/flightIcons/2.png" alt="image">
                </div>

                <div class="col">
                  <div class="row x-gap-20 items-end">
                    <div class="col-auto">
                      <div class="lh-15 fw-500">14:00</div>
                      <div class="text-15 lh-15 text-light-1">SAW</div>
                    </div>

                    <div class="col text-center">
                      <div class="flightLine">
                        <div></div>
                        <div></div>
                      </div>
                      <div class="text-15 lh-15 text-light-1 mt-10">4h 05m- Nonstop</div>
                    </div>

                    <div class="col-auto">
                      <div class="lh-15 fw-500">22:00</div>
                      <div class="text-15 lh-15 text-light-1">STN</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>


            <div class="col-auto">
              <div class="d-flex items-center">
                <div class="text-right mr-24">
                  <div class="lh-15 fw-500">US$934</div>
                  <div class="text-15 lh-15 text-light-1">16 deals</div>
                </div>


                <a href="#" class="button -outline-blue-1 px-30 h-50 text-blue-1">
                  View Deal <div class="icon-arrow-top-right ml-15"></div>
                </a>

              </div>
            </div>
          </div>
        </div>
      </div>

      <div data-anim-child="slide-up delay-4" class="col-12">
        <div class="px-20 py-20 rounded-4 border-light">
          <div class="row y-gap-30 justify-between xl:justify-">

            <div class="col-xl-4 col-lg-6">
              <div class="row y-gap-10 items-center">
                <div class="col-sm-auto">
                  <img class="size-40" src="./assets/img/flightIcons/1.png" alt="image">
                </div>

                <div class="col">
                  <div class="row x-gap-20 items-end">
                    <div class="col-auto">
                      <div class="lh-15 fw-500">14:00</div>
                      <div class="text-15 lh-15 text-light-1">SAW</div>
                    </div>

                    <div class="col text-center">
                      <div class="flightLine">
                        <div></div>
                        <div></div>
                      </div>
                      <div class="text-15 lh-15 text-light-1 mt-10">4h 05m- Nonstop</div>
                    </div>

                    <div class="col-auto">
                      <div class="lh-15 fw-500">22:00</div>
                      <div class="text-15 lh-15 text-light-1">STN</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-4 col-lg-6">
              <div class="row y-gap-10 items-center">
                <div class="col-sm-auto">
                  <img class="size-40" src="./assets/img/flightIcons/2.png" alt="image">
                </div>

                <div class="col">
                  <div class="row x-gap-20 items-end">
                    <div class="col-auto">
                      <div class="lh-15 fw-500">14:00</div>
                      <div class="text-15 lh-15 text-light-1">SAW</div>
                    </div>

                    <div class="col text-center">
                      <div class="flightLine">
                        <div></div>
                        <div></div>
                      </div>
                      <div class="text-15 lh-15 text-light-1 mt-10">4h 05m- Nonstop</div>
                    </div>

                    <div class="col-auto">
                      <div class="lh-15 fw-500">22:00</div>
                      <div class="text-15 lh-15 text-light-1">STN</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>


            <div class="col-auto">
              <div class="d-flex items-center">
                <div class="text-right mr-24">
                  <div class="lh-15 fw-500">US$934</div>
                  <div class="text-15 lh-15 text-light-1">16 deals</div>
                </div>


                <a href="#" class="button -outline-blue-1 px-30 h-50 text-blue-1">
                  View Deal <div class="icon-arrow-top-right ml-15"></div>
                </a>

              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>
 <!-- JavaScript -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAAz77U5XQuEME6TpftaMdX0bBelQxXRlM"></script>
  <script src="../../../unpkg.com/%40googlemaps/markerclusterer%402.6.2/dist/index.min.js"></script>

<?php include '../includes/footer.php'; ?>



<!-- JavaScript to populate home page dropdowns -->
<script>
document.addEventListener("DOMContentLoaded", function() {
    // Load filter options for home page
    fetch('umrah-packages/get_filter_options.php')
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Populate Package Type
                const homePackageType = document.getElementById('home-package-type');
                if (homePackageType) {
                    data.package_types.forEach(type => {
                        const option = document.createElement('option');
                        option.value = type;
                        option.textContent = type;
                        homePackageType.appendChild(option);
                    });
                }
                
                // Populate Days
                const homeDaysFilter = document.getElementById('home-days-filter');
                if (homeDaysFilter) {
                    data.total_days.forEach(days => {
                        const option = document.createElement('option');
                        option.value = days;
                        option.textContent = days + ' Days';
                        homeDaysFilter.appendChild(option);
                    });
                }
            }
        })
        .catch(error => console.error('Error loading filters:', error));
});
</script>
<script>
  $(document).ready(function() {
    $('.js-example-basic-single').select2();
  });
</script>
<script>
document.addEventListener("DOMContentLoaded", () => {
  const trigger = document.getElementById("passengerTrigger");
  const popup = document.getElementById("passengerPopup");
  const countDisplay = document.getElementById("passengerCount");
  const mainDisplay = document.getElementById("passengerCountDisplay");
  const inc = document.getElementById("increasePassenger");
  const dec = document.getElementById("decreasePassenger");

  let passengerCount = parseInt(mainDisplay.textContent);

  trigger.addEventListener("click", e => {
    e.stopPropagation();
    popup.classList.toggle("hidden");
  });

  document.addEventListener("click", e => {
    if (!popup.contains(e.target) && !trigger.contains(e.target)) popup.classList.add("hidden");
  });

  inc.addEventListener("click", () => {
    passengerCount++;
    update();
  });

  dec.addEventListener("click", () => {
    if (passengerCount > 1) passengerCount--;
    update();
  });

  function update() {
    countDisplay.textContent = passengerCount;
    mainDisplay.textContent = passengerCount;
  }
});

// // SUBMIT
// $(document).ready(function() {
//   $(".mainSearch__submit").click(function(e){
//       e.preventDefault();

//       let pickup = $("#pickup_location").val();
//       let dropoff = $("#dropoff_location").val();
//       let passengers = $("#passengerCount").text();

//       let url = `?pickup=${encodeURIComponent(pickup)}&dropoff=${encodeURIComponent(dropoff)}&passengers=${passengers}`;
//       window.location.href = url;
//   });
// });
</script>