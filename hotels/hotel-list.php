<?php include '../includes/header.php'; ?>
<section class="pt-40 pb-40 bg-light-2">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="text-center">
          <h1 class="text-30 fw-600">Find Your Dream Luxury Hotel</h1>
        </div>

        <div class="mainSearch -col-3-big bg-white px-10 py-10 lg:px-20 lg:pt-5 lg:pb-20 rounded-4 mt-30">
          <div class="button-grid items-center">

            <!-- LOCATION DROPDOWN -->
            <div class="searchMenu-loc px-30 lg:py-20 lg:px-0 js-form-dd js-liverSearch">
              <div data-x-dd-click="searchMenu-loc">
                <h4 class="text-15 fw-500 ls-2 lh-16">Location</h4>
                <div class="text-15 text-light-1 ls-2 lh-16">
                  <select id="pickup_location" class="js-example" style="width: 100%;">
                    <option value="all">All Locations</option>
                    <!-- Options will be loaded dynamically via JavaScript -->
                  </select>
                </div>
              </div>
            </div>

            <!-- DATE RANGE PICKER -->
            <div class="searchMenu-date px-30 lg:py-20 lg:px-0 js-form-dd js-calendar js-calendar-el">
              <div data-x-dd-click="searchMenu-date">
                <h4 class="text-15 fw-500 ls-2 lh-16">Check in - Check out</h4>
                <div class="capitalize text-15 text-light-1 ls-2 lh-16">
                  <input type="text" id="pickupDate" placeholder="Select date range" style="width: 100%; border: none; background: transparent;">
                </div>
              </div>
              
              <div class="searchMenu-date__field shadow-2" data-x-dd="searchMenu-date" data-x-dd-toggle="-is-active">
                <div class="bg-white px-30 py-30 rounded-4">
                  <div class="elCalendar js-calendar-el-calendar"></div>
                </div>
              </div>
            </div>

            <!-- NUMBER OF ROOMS -->
            <div class="searchMenu-guests px-30 lg:py-20 lg:px-0 js-form-dd js-form-counters">
              <div data-x-dd-click="searchMenu-guests" id="passengerTrigger">
                <h4 class="text-15 fw-500 ls-2 lh-16">Number of Rooms</h4>
                <div class="text-15 text-light-1 ls-2 lh-16">
                  <span class="js-count-room">1</span> rooms
                </div>
              </div>

              <div class="passenger-popup pos-abs shadow-2 bg-white px-10 py-10 rounded-4 d-none" id="passengerPopup" style="position: absolute; top: 100%; left: 0; z-index: 1000;">
                <div class="row y-gap-10 justify-between items-center">
                  <div class="col-auto">
                    <div class="text-15 fw-500">Rooms</div>
                  </div>
                  <div class="col-auto">
                    <div class="d-flex items-center">
                      <button class="button -outline-blue-1 text-blue-1 size-30 rounded-4" id="decChild">
                        <i class="icon-minus text-12"></i>
                      </button>

                      <div class="flex-center size-20 ml-10 mr-10">
                        <div class="text-15" id="childCount">1</div>
                      </div>

                      <button class="button -outline-blue-1 text-blue-1 size-30 rounded-4" id="incChild">
                        <i class="icon-plus text-12"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- SEARCH BUTTON -->
            <div class="button-item">
              <button class="mainSearch__submit button -dark-1 py-15 px-40 col-12 rounded-4 bg-blue-1 text-white">
                <i class="icon-search text-20 mr-10"></i>
                Search
              </button>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="layout-pt-md layout-pb-lg">
  <div class="container">
    <div class="row y-gap-30">
      <div class="col-xl-3 col-lg-4 lg:d-none">
        <aside class="sidebar y-gap-40">
          <div class="sidebar__item -no-border">
            <div class="flex-center ratio ratio-15:9 js-lazy" data-bg="../assets/img/general/map.png">
              <button class="button py-15 px-24 -blue-1 bg-white text-dark-1 absolute" data-x-click="mapFilter">
                <i class="icon-destination text-22 mr-10"></i>
                Show on map
              </button>
            </div>
          </div>




          <div class="sidebar__item pb-30">
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

          <div class="sidebar__item">
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

          <div class="sidebar__item">
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



          <div class="sidebar__item">
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

          <div class="sidebar__item">
            <h5 class="text-18 fw-500 mb-10">Distance from Markazia</h5>
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




          <div class="sidebar__item">
            <h5 class="text-18 fw-500 mb-10">Distance from Mataf</h5>
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


        </aside>
      </div>

      <div class="col-xl-9 col-lg-8">
        <div class="row y-gap-10 items-center justify-between">
          <div class="col-auto">
            <div class="text-18"><span class="fw-500">3,269 properties</span> in Europe</div>
          </div>

          <div class="col-auto">
            <div class="row x-gap-20 y-gap-20">
              <div class="col-auto">
                <button class="button -blue-1 h-40 px-20 rounded-100 bg-blue-1-05 text-15 text-blue-1">
                  <i class="icon-up-down text-14 mr-10"></i>
                  Top picks for your search
                </button>
              </div>

              <div class="col-auto d-none lg:d-block">
                <button data-x-click="filterPopup" class="button -blue-1 h-40 px-20 rounded-100 bg-blue-1-05 text-15 text-blue-1">
                  <i class="icon-up-down text-14 mr-10"></i>
                  Filter
                </button>
              </div>
            </div>
          </div>
        </div>

        <div class="filterPopup bg-white" data-x="filterPopup" data-x-toggle="-is-active">
          <aside class="sidebar -mobile-filter">
            <div data-x-click="filterPopup" class="-icon-close">
              <i class="icon-close"></i>
            </div>

            <div class="sidebar__item">
              <div class="flex-center ratio ratio-15:9 js-lazy" data-bg="../assets/img/general/map.png">
                <button class="button py-15 px-24 -blue-1 bg-white text-dark-1 absolute" data-x-click="mapFilter">
                  <i class="icon-destination text-22 mr-10"></i>
                  Show on map
                </button>
              </div>
            </div>

            <div class="sidebar__item">
              <h5 class="text-18 fw-500 mb-10">Search by property name</h5>
              <div class="single-field relative d-flex items-center py-10">
                <input class="pl-50 border-light text-dark-1 h-50 rounded-8" type="email" placeholder="e.g. Best Western">
                <button class="absolute d-flex items-center h-full">
                  <i class="icon-search text-20 px-15 text-dark-1"></i>
                </button>
              </div>
            </div>

            <div class="sidebar__item">
              <h5 class="text-18 fw-500 mb-10">Deals</h5>
              <div class="sidebar-checkbox">

                <div class="row items-center justify-between">
                  <div class="col-auto">
                    <div class="d-flex items-center">
                      <div class="form-checkbox">
                        <input type="checkbox">
                        <div class="form-checkbox__mark">
                          <div class="form-checkbox__icon icon-check"></div>
                        </div>
                      </div>
                      <div class="text-15 ml-10">Free cancellation</div>
                    </div>
                  </div>
                </div>

                <div class="row items-center justify-between">
                  <div class="col-auto">
                    <div class="d-flex items-center">
                      <div class="form-checkbox">
                        <input type="checkbox">
                        <div class="form-checkbox__mark">
                          <div class="form-checkbox__icon icon-check"></div>
                        </div>
                      </div>
                      <div class="text-15 ml-10">Reserve now, pay at stay </div>
                    </div>
                  </div>
                </div>

                <div class="row items-center justify-between">
                  <div class="col-auto">
                    <div class="d-flex items-center">
                      <div class="form-checkbox">
                        <input type="checkbox">
                        <div class="form-checkbox__mark">
                          <div class="form-checkbox__icon icon-check"></div>
                        </div>
                      </div>
                      <div class="text-15 ml-10">Properties with special offers</div>
                    </div>
                  </div>
                </div>

              </div>
            </div>

            <div class="sidebar__item">
              <h5 class="text-18 fw-500 mb-10">Popular Filters</h5>
              <div class="sidebar-checkbox">

                <div class="row items-center justify-between">
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

                <div class="row items-center justify-between">
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

                <div class="row items-center justify-between">
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

                <div class="row items-center justify-between">
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

                <div class="row items-center justify-between">
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

            <div class="sidebar__item pb-30">
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

            <div class="sidebar__item">
              <h5 class="text-18 fw-500 mb-10">Amenities</h5>
              <div class="sidebar-checkbox">

                <div class="row items-center justify-between">
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

                <div class="row items-center justify-between">
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

                <div class="row items-center justify-between">
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

                <div class="row items-center justify-between">
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

                <div class="row items-center justify-between">
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

            <div class="sidebar__item">
              <h5 class="text-18 fw-500 mb-10">Star Rating</h5>
              <div class="row y-gap-10 x-gap-10 pt-10">

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

            <div class="sidebar__item">
              <h5 class="text-18 fw-500 mb-10">Guest Rating</h5>
              <div class="sidebar-checkbox">

                <div class="row items-center justify-between">
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

                <div class="row items-center justify-between">
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

                <div class="row items-center justify-between">
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

                <div class="row items-center justify-between">
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

            <div class="sidebar__item">
              <h5 class="text-18 fw-500 mb-10">Style</h5>
              <div class="sidebar-checkbox">

                <div class="row items-center justify-between">
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

                <div class="row items-center justify-between">
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

                <div class="row items-center justify-between">
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

                <div class="row items-center justify-between">
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

                <div class="row items-center justify-between">
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

            <div class="sidebar__item">
              <h5 class="text-18 fw-500 mb-10">Neighborhood</h5>
              <div class="sidebar-checkbox">

                <div class="row items-center justify-between">
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

                <div class="row items-center justify-between">
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

                <div class="row items-center justify-between">
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

                <div class="row items-center justify-between">
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

                <div class="row items-center justify-between">
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
          </aside>
        </div>

        <div class="mt-30"></div>

        <div class="row y-gap-30">
          <?php include('fetch-hotels.php'); ?>
          <?php if (!empty($hotels)): ?>
            <?php foreach ($hotels as $hotel): ?>
              <div class="col-12">
                <div class="border-top-light pt-30">
                  <div class="row x-gap-20 y-gap-20">

                    <!-- Image Section -->
                    <div class="col-md-auto">
                      <div class="cardImage ratio ratio-1:1 w-250 md:w-1/1 rounded-4">
                        <div class="cardImage__content" style="position: relative;">

                          <div class="cardImage-slider rounded-4 overflow-hidden js-cardImage-slider">
                            <div class="swiper-wrapper">

                              <?php if (!empty($hotel['images'])): ?>
                                <?php foreach ($hotel['images'] as $img): ?>
                                  <div class="swiper-slide">
                                    <img class="col-12"
                                      src="/travel-panel/assets/uploads/hotels/<?= htmlspecialchars($img) ?>" alt="<?= htmlspecialchars($hotel['hotel_title']) ?>">
                                  </div>
                                <?php endforeach; ?>
                              <?php else: ?>
                                <div class="swiper-slide">
                                  <img class="col-12" src="../assets/img/no-image.jpg" alt="No image">
                                </div>
                              <?php endif; ?>

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

                    <!-- Hotel Details -->
                    <div class="col-md">
                      <h3 class="text-18 lh-16 fw-500">
                        <?= htmlspecialchars($hotel['hotel_title']) ?>
                        <div class="d-inline-block ml-10">

                        </div>
                      </h3>

                      <div class="row x-gap-10 y-gap-10 items-center pt-10">
                        <div class="col-auto">
                          <p class="text-14"><?= htmlspecialchars($hotel['hotel_location']) ?></p>
                        </div>
                        <div class="col-auto">
                          <button data-x-click="mapFilter" class="d-block text-14 text-blue-1 underline">Show on map</button>
                        </div>
                      </div>

                      <div class="text-14 lh-15 mt-20">
                        <div class="fw-500">Popular Room</div>
                        <div class="text-light-1"><?= htmlspecialchars($hotel['meta_description']) ?></div>
                      </div>

                      <div class="text-14 text-green-2 lh-15 mt-10">
                        <div class="fw-500">Free cancellation</div>
                        <div>You can cancel later, so lock in this great price today.</div>
                      </div>

                      <div class="row x-gap-10 y-gap-10 pt-20">
                        <div class="col-auto">
                          <div class="border-light rounded-100 py-5 px-20 text-14 lh-14">Breakfast</div>
                        </div>
                        <div class="col-auto">
                          <div class="border-light rounded-100 py-5 px-20 text-14 lh-14">WiFi</div>
                        </div>
                        <div class="col-auto">
                          <div class="border-light rounded-100 py-5 px-20 text-14 lh-14">Spa</div>
                        </div>
                        <div class="col-auto">
                          <div class="border-light rounded-100 py-5 px-20 text-14 lh-14">Bar</div>
                        </div>
                      </div>
                    </div>

                    <!-- Right Price / Reviews -->
                    <div class="col-md-auto text-right md:text-left">
                      <div class="row x-gap-10 y-gap-10 justify-end items-center md:justify-start">
                        <div class="col-auto">
                          <div class="text-14 lh-14 fw-500">Exceptional</div>
                          <div class="text-14 lh-14 text-light-1">123 reviews</div>
                        </div>
                        <div class="col-auto">
                          <div class="flex-center text-white fw-600 text-14 size-40 rounded-4 bg-blue-1">4.8</div>
                        </div>
                      </div>

                      <div>
                        <div class="text-14 text-light-1 mt-50 md:mt-20">2 adults, 1 night</div>
                        <div class="text-22 lh-12 fw-600 mt-5">
                          $<?= number_format($hotel['hotel_price'] ?? 0, 2) ?>
                        </div>
                        <div class="text-14 text-light-1 mt-5">+taxes and charges</div>

                        <a href="hotel-details.php?slug=<?= urlencode($hotel['hotel_slug']) ?>"
                          class="button -md -dark-1 bg-blue-1 text-white mt-24">
                          See Availability <div class="icon-arrow-top-right ml-15"></div>
                        </a>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          <?php else: ?>
            <div class="text-center py-30">
              <p>No hotels found.</p>
            </div>
          <?php endif; ?>




        </div>

        <div class="border-top-light mt-30 pt-30">
          <div class="row x-gap-10 y-gap-20 justify-between md:justify-center">
            <div class="col-auto md:order-1">
              <button class="button -blue-1 size-40 rounded-full border-light">
                <i class="icon-chevron-left text-12"></i>
              </button>
            </div>

            <div class="col-md-auto md:order-3">
              <div class="row x-gap-20 y-gap-20 items-center md:d-none">

                <div class="col-auto">

                  <div class="size-40 flex-center rounded-full">1</div>

                </div>

                <div class="col-auto">

                  <div class="size-40 flex-center rounded-full bg-dark-1 text-white">2</div>

                </div>

                <div class="col-auto">

                  <div class="size-40 flex-center rounded-full">3</div>

                </div>

                <div class="col-auto">

                  <div class="size-40 flex-center rounded-full bg-light-2">4</div>

                </div>

                <div class="col-auto">

                  <div class="size-40 flex-center rounded-full">5</div>

                </div>

                <div class="col-auto">

                  <div class="size-40 flex-center rounded-full">...</div>

                </div>

                <div class="col-auto">

                  <div class="size-40 flex-center rounded-full">20</div>

                </div>

              </div>

              <div class="row x-gap-10 y-gap-20 justify-center items-center d-none md:d-flex">

                <div class="col-auto">

                  <div class="size-40 flex-center rounded-full">1</div>

                </div>

                <div class="col-auto">

                  <div class="size-40 flex-center rounded-full bg-dark-1 text-white">2</div>

                </div>

                <div class="col-auto">

                  <div class="size-40 flex-center rounded-full">3</div>

                </div>

              </div>

              <div class="text-center mt-30 md:mt-10">
                <div class="text-14 text-light-1">1 – 20 of 300+ properties found</div>
              </div>
            </div>

            <div class="col-auto md:order-2">
              <button class="button -blue-1 size-40 rounded-full border-light">
                <i class="icon-chevron-right text-12"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<?php include_once __DIR__ . '/../includes/footer.php'; ?>
<script>
// Initialize flatpickr for date range
flatpickr("#pickupDate", {
  mode: "range",
  enableTime: false,
  dateFormat: "Y-m-d",
  minDate: "today"
});

// Initialize Select2 if available
$(document).ready(function() {
  if ($.fn.select2) {
    $('.js-example').select2();
  }
});

// Room counter functionality
document.addEventListener("DOMContentLoaded", () => {
  const trigger = document.getElementById("passengerTrigger");
  const popup = document.getElementById("passengerPopup");
  const childDisplay = document.getElementById("childCount");
  const mainChild = document.querySelector(".js-count-room");

  const incChild = document.getElementById("incChild");
  const decChild = document.getElementById("decChild");

  let children = parseInt(childDisplay.textContent);

  if (trigger) {
    trigger.addEventListener("click", e => {
      e.stopPropagation();
      popup.classList.toggle("d-none");
    });
  }

  document.addEventListener("click", e => {
    if (popup && !popup.contains(e.target) && trigger && !trigger.contains(e.target)) {
      popup.classList.add("d-none");
    }
  });

  if (incChild) {
    incChild.addEventListener("click", () => {
      children++;
      update();
    });
  }

  if (decChild) {
    decChild.addEventListener("click", () => {
      if (children > 1) children--;
      update();
    });
  }

  function update() {
    if (childDisplay) childDisplay.textContent = children;
    if (mainChild) mainChild.textContent = children;
  }
});
</script>
<script>
 document.addEventListener("DOMContentLoaded", function() {
    
    // Load locations on page load
    loadLocations();
    
    // Check URL params and load filtered results
    checkURLParams();
    
    // Search button click event
    const searchBtn = document.querySelector('.mainSearch__submit');
    if (searchBtn) {
        searchBtn.addEventListener('click', function(e) {
            e.preventDefault();
            performSearch();
        });
    }
    
    // Load locations from database
    function loadLocations() {
        fetch('/hotels/get_locations.php')
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    const locationSelect = document.getElementById('pickup_location');
                    if (locationSelect) {
                        // Clear existing options except first
                        locationSelect.innerHTML = '<option value="all">All Locations</option>';
                        
                        // Add locations from database
                        data.locations.forEach(loc => {
                            const option = document.createElement('option');
                            option.value = loc.name;
                            option.textContent = loc.name;
                            locationSelect.appendChild(option);
                        });
                        
                        // Reinitialize Select2 if using it
                        if (typeof $ !== 'undefined' && $.fn.select2) {
                            $(locationSelect).select2('destroy');
                            $(locationSelect).select2();
                        }
                        
                        // After locations loaded, check URL params
                        setTimeout(() => checkURLParams(), 100);
                    }
                }
            })
            .catch(error => {
                console.error('Error loading locations:', error);
            });
    }
    
    // Perform search
    function performSearch() {
        const location = document.getElementById('pickup_location').value || 'all';
        const dateRange = document.getElementById('pickupDate').value || '';
        const numRooms = parseInt(document.getElementById('childCount').textContent) || 1;
        
        // Update URL with search params
        updateURLParams(location, dateRange, numRooms);
        
        // Execute search
        executeSearch(location, dateRange, numRooms);
    }
    
    // Update URL parameters without page reload
    function updateURLParams(location, dateRange, numRooms) {
        const params = new URLSearchParams();
        
        if (location && location !== 'all') {
            params.set('location', location);
        }
        if (dateRange) {
            params.set('dates', dateRange);
        }
        if (numRooms && numRooms > 1) {
            params.set('rooms', numRooms);
        }
        
        const newURL = params.toString() 
            ? `${window.location.pathname}?${params.toString()}`
            : window.location.pathname;
            
        window.history.pushState({}, '', newURL);
    }
    
    // Check URL params on page load
    function checkURLParams() {
        const params = new URLSearchParams(window.location.search);
        
        const location = params.get('location') || 'all';
        const dateRange = params.get('dates') || '';
        const numRooms = parseInt(params.get('rooms')) || 1;
        
        // If URL has params, populate fields and search
        if (params.toString()) {
            // Set location dropdown
            const locationSelect = document.getElementById('pickup_location');
            if (locationSelect && location !== 'all') {
                setTimeout(() => {
                    locationSelect.value = location;
                    if (typeof $ !== 'undefined' && $.fn.select2) {
                        $(locationSelect).val(location).trigger('change');
                    }
                }, 500);
            }
            
            // Set date range
            if (dateRange) {
                const dateInput = document.getElementById('pickupDate');
                if (dateInput) {
                    dateInput.value = dateRange;
                    // Update flatpickr if initialized
                    if (dateInput._flatpickr) {
                        const dates = dateRange.split(' to ');
                        dateInput._flatpickr.setDate(dates, false);
                    }
                }
            }
            
            // Set number of rooms
            if (numRooms > 1) {
                const childDisplay = document.getElementById('childCount');
                const mainChild = document.querySelector('.js-count-room');
                if (childDisplay) childDisplay.textContent = numRooms;
                if (mainChild) mainChild.textContent = numRooms;
            }
            
            // Execute search with URL params
            setTimeout(() => {
                executeSearch(location, dateRange, numRooms);
            }, 600);
        }
    }
    
    // Execute the actual search
    function executeSearch(location, dateRange, numRooms) {
        
        // Show loading state
        const resultsContainer = document.querySelector('.row.y-gap-30');
        if (!resultsContainer) return;
        
        resultsContainer.innerHTML = `
            <div class="col-12 text-center py-40">
                <div class="spinner-border text-blue-1" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
                <p class="mt-20 text-15">Searching hotels...</p>
            </div>
        `;
        
        // Prepare form data
        const formData = new FormData();
        formData.append('location', location);
        formData.append('dateRange', dateRange);
        formData.append('numRooms', numRooms);
        
        // Send AJAX request
        fetch('/hotels/search_hotels.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                displayResults(data.hotels, data.filters);
                
                // Update results count
                updateResultsCount(data.count, location);
            } else {
                resultsContainer.innerHTML = `
                    <div class="col-12 text-center py-40">
                        <p class="text-red-1">Error loading hotels</p>
                    </div>
                `;
            }
        })
        .catch(error => {
            console.error('Search error:', error);
            resultsContainer.innerHTML = `
                <div class="col-12 text-center py-40">
                    <p class="text-red-1">An error occurred. Please try again.</p>
                </div>
            `;
        });
    }
    
    // Display search results
    function displayResults(hotels, filters) {
        const resultsContainer = document.querySelector('.row.y-gap-30');
        
        if (hotels.length === 0) {
            resultsContainer.innerHTML = `
                <div class="col-12 text-center py-40">
                    <i class="icon-search text-60 text-light-1 mb-20"></i>
                    <h3 class="text-22 fw-500">No hotels found</h3>
                    <p class="text-15 text-light-1 mt-10">Try adjusting your search filters</p>
                </div>
            `;
            return;
        }
        
        let html = '';
        
        hotels.forEach(hotel => {
            const images = hotel.images || [];
            const hasImages = images.length > 0;
            
            let imagesHtml = '';
            if (hasImages) {
                images.forEach(img => {
                    imagesHtml += `
                        <div class="swiper-slide">
                            <img class="col-12" 
                                 src="/travel-panel/assets/uploads/hotels/${img}" 
                                 alt="${hotel.hotel_title}">
                        </div>
                    `;
                });
            } else {
                imagesHtml = `
                    <div class="swiper-slide">
                        <img class="col-12" src="../assets/img/no-image.jpg" alt="No image">
                    </div>
                `;
            }
            
            html += `
                <div class="col-12">
                    <div class="border-top-light pt-30">
                        <div class="row x-gap-20 y-gap-20">
                            
                            <!-- Image Section -->
                            <div class="col-md-auto">
                                <div class="cardImage ratio ratio-1:1 w-250 md:w-1/1 rounded-4">
                                    <div class="cardImage__content" style="position: relative;">
                                        <div class="cardImage-slider rounded-4 overflow-hidden js-cardImage-slider">
                                            <div class="swiper-wrapper">
                                                ${imagesHtml}
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

                            <!-- Hotel Details -->
                            <div class="col-md">
                                <h3 class="text-18 lh-16 fw-500">
                                    ${hotel.hotel_title}
                                </h3>

                                <div class="row x-gap-10 y-gap-10 items-center pt-10">
                                    <div class="col-auto">
                                        <p class="text-14">${hotel.hotel_location}</p>
                                    </div>
                                    <div class="col-auto">
                                        <button data-x-click="mapFilter" class="d-block text-14 text-blue-1 underline">Show on map</button>
                                    </div>
                                </div>

                                <div class="text-14 lh-15 mt-20">
                                    <div class="fw-500">Popular Room</div>
                                    <div class="text-light-1">${hotel.meta_description || 'Comfortable accommodations'}</div>
                                </div>

                                <div class="text-14 text-green-2 lh-15 mt-10">
                                    <div class="fw-500">Free cancellation</div>
                                    <div>You can cancel later, so lock in this great price today.</div>
                                </div>

                                <div class="row x-gap-10 y-gap-10 pt-20">
                                    <div class="col-auto">
                                        <div class="border-light rounded-100 py-5 px-20 text-14 lh-14">Breakfast</div>
                                    </div>
                                    <div class="col-auto">
                                        <div class="border-light rounded-100 py-5 px-20 text-14 lh-14">WiFi</div>
                                    </div>
                                    <div class="col-auto">
                                        <div class="border-light rounded-100 py-5 px-20 text-14 lh-14">Spa</div>
                                    </div>
                                    <div class="col-auto">
                                        <div class="border-light rounded-100 py-5 px-20 text-14 lh-14">Bar</div>
                                    </div>
                                </div>
                            </div>

                            <!-- Right Price / Reviews -->
                            <div class="col-md-auto text-right md:text-left">
                                <div class="row x-gap-10 y-gap-10 justify-end items-center md:justify-start">
                                    <div class="col-auto">
                                        <div class="text-14 lh-14 fw-500">Exceptional</div>
                                        <div class="text-14 lh-14 text-light-1">123 reviews</div>
                                    </div>
                                    <div class="col-auto">
                                        <div class="flex-center text-white fw-600 text-14 size-40 rounded-4 bg-blue-1">4.8</div>
                                    </div>
                                </div>

                                <div>
                                    <div class="text-14 text-light-1 mt-50 md:mt-20">
                                        ${filters.numRooms} room(s)${filters.hasDateRange ? ', ' + calculateNights(filters.dateRange) + ' nights' : ''}
                                    </div>
                                    <div class="text-22 lh-12 fw-600 mt-5">
                                        From $${hotel.calculated_price.toFixed(2)}
                                    </div>
                                    <div class="text-14 text-light-1 mt-5">+taxes and charges</div>

                                    <a href="/hotel/${hotel.hotel_slug}?${buildDetailParams(filters)}" 
                                       class="button -md -dark-1 bg-blue-1 text-white mt-24">
                                        See Availability <div class="icon-arrow-top-right ml-15"></div>
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            `;
        });
        
        resultsContainer.innerHTML = html;
        
        // Reinitialize Swiper sliders
        setTimeout(() => {
            if (typeof Swiper !== 'undefined') {
                document.querySelectorAll('.js-cardImage-slider').forEach(slider => {
                    new Swiper(slider, {
                        spaceBetween: 10,
                        pagination: {
                            el: slider.querySelector('.js-pagination'),
                            clickable: true
                        },
                        navigation: {
                            nextEl: slider.querySelector('.js-next'),
                            prevEl: slider.querySelector('.js-prev')
                        }
                    });
                });
            }
        }, 100);
    }
    
    // Update results count display
    function updateResultsCount(count, location) {
        const countElement = document.querySelector('.text-18 .fw-500');
        if (countElement) {
            const locationText = location && location !== 'all' ? ` in ${location}` : '';
            countElement.textContent = `${count} ${count === 1 ? 'property' : 'properties'}`;
            countElement.parentElement.innerHTML = `<span class="fw-500">${count} ${count === 1 ? 'property' : 'properties'}</span>${locationText}`;
        }
    }
    
    // Calculate number of nights from date range
    function calculateNights(dateRange) {
        if (!dateRange || dateRange.indexOf(' to ') === -1) return 0;
        
        const dates = dateRange.split(' to ');
        const start = new Date(dates[0]);
        const end = new Date(dates[1]);
        const diffTime = Math.abs(end - start);
        const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
        
        return diffDays;
    }
    
    // Build URL parameters for hotel detail page
    function buildDetailParams(filters) {
        let params = '';
        
        if (filters.dateRange && filters.hasDateRange) {
            params += '&dates=' + encodeURIComponent(filters.dateRange);
        }
        
        if (filters.numRooms && filters.numRooms > 1) {
            params += '&rooms=' + filters.numRooms;
        }
        
        return params;
    }
    
});
</script>