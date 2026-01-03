<?php include '../includes/header.php';
  
?>


<?php include_once __DIR__ . '/../travel-panel/includes/connection.php';
?>
<?php
$pickup     = $_GET['pickup']     ?? '';
$dropoff    = $_GET['dropoff']    ?? '';
$passengers = $_GET['passengers'] ?? 2;
?>

<section class="pt-60">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="text-center">
          <h1 class="text-30 fw-600">London Rental Cars</h1>
        </div>

      <div class="mainSearch -col-5 border-light bg-white px-20 py-20 lg:px-20 lg:pt-5 lg:pb-20 rounded-4 mt-30">
  <div class="button-grid items-center">

    <!-- PICKUP LOCATION -->
    <div class="pr-30 pl-10 lg:py-20 lg:px-0 js-form-dd js-liverSearch">
      <h4 class="text-15 fw-500 ls-2 lh-16">Pick up location</h4>
      <select id="pickup_location" class="js-example-basic-single">
        <option>Select</option>
        <?php
        $locations = ["Makkah","Madina","Makkah Airport","Madina Airport","Makkah Hotel","Madina Hotel",
                      "Makkah Train Station","Madina Train Station","Jaddah Airport"];

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
            <span id="passengerCountDisplay"><?= $passengers ?></span> adults
          </div>
        </div>
        <i class="icon-chevron-down text-14 text-dark-1"></i>
      </div>

      <div class="passenger-popup shadow-2 absolute bg-white px-30 py-25 rounded-4 hidden" id="passengerPopup">
        <div class="row y-gap-10 justify-between items-center">
          <div class="col-auto"><div class="text-15 fw-500">Adults</div></div>
          <div class="col-auto">
            <div class="d-flex items-center">
              <button class="button -outline-blue-1 text-blue-1 size-38 rounded-4" id="decreasePassenger">
                <i class="icon-minus text-12"></i>
              </button>
              <div class="flex-center size-20 ml-15 mr-15">
                <div class="text-15" id="passengerCount"><?= $passengers ?></div>
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
       
         

          <div class="sidebar__item">
            <h5 class="text-18 fw-500 mb-10">Car Category</h5>
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

                    <div class="text-15 ml-10">Small</div>

                  </div>

                </div>

                <div class="col-auto">
                  <div class="text-15 text-light-1">$92</div>
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

                    <div class="text-15 ml-10">Medium</div>

                  </div>

                </div>

                <div class="col-auto">
                  <div class="text-15 text-light-1">$45</div>
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

                    <div class="text-15 ml-10">Large</div>

                  </div>

                </div>

                <div class="col-auto">
                  <div class="text-15 text-light-1">$21</div>
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

                    <div class="text-15 ml-10">Premium</div>

                  </div>

                </div>

                <div class="col-auto">
                  <div class="text-15 text-light-1">$78</div>
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

                    <div class="text-15 ml-10">SUV</div>

                  </div>

                </div>

                <div class="col-auto">
                  <div class="text-15 text-light-1">$679</div>
                </div>
              </div>

            </div>
          </div>


          <div class="sidebar__item">
            <h5 class="text-18 fw-500 mb-10">Supplier</h5>
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

                    <div class="text-15 ml-10">Avis</div>

                  </div>

                </div>

                <div class="col-auto">
                  <div class="text-15 text-light-1">$92</div>
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

                    <div class="text-15 ml-10">Budget</div>

                  </div>

                </div>

                <div class="col-auto">
                  <div class="text-15 text-light-1">$45</div>
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

                    <div class="text-15 ml-10">Sixt</div>

                  </div>

                </div>

                <div class="col-auto">
                  <div class="text-15 text-light-1">$21</div>
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

                    <div class="text-15 ml-10">Europcar</div>

                  </div>

                </div>

                <div class="col-auto">
                  <div class="text-15 text-light-1">$78</div>
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

                    <div class="text-15 ml-10">Enterprise</div>

                  </div>

                </div>

                <div class="col-auto">
                  <div class="text-15 text-light-1">$679</div>
                </div>
              </div>

            </div>
          </div>


          <div class="sidebar__item">
            <h5 class="text-18 fw-500 mb-10">Supplier</h5>
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

                    <div class="text-15 ml-10">Avis</div>

                  </div>

                </div>

                <div class="col-auto">
                  <div class="text-15 text-light-1">$92</div>
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

                    <div class="text-15 ml-10">Budget</div>

                  </div>

                </div>

                <div class="col-auto">
                  <div class="text-15 text-light-1">$45</div>
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

                    <div class="text-15 ml-10">Sixt</div>

                  </div>

                </div>

                <div class="col-auto">
                  <div class="text-15 text-light-1">$21</div>
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

                    <div class="text-15 ml-10">Europcar</div>

                  </div>

                </div>

                <div class="col-auto">
                  <div class="text-15 text-light-1">$78</div>
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

                    <div class="text-15 ml-10">Enterprise</div>

                  </div>

                </div>

                <div class="col-auto">
                  <div class="text-15 text-light-1">$679</div>
                </div>
              </div>

            </div>
          </div>

        

        </aside>
      </div>

      <div class="col-xl-9 col-lg-8">
        

        <div class="filterPopup bg-white" data-x="filterPopup" data-x-toggle="-is-active">
          <aside class="sidebar -mobile-filter">
            <div data-x-click="filterPopup" class="-icon-close">
              <i class="icon-close"></i>
            </div>


            <div class="sidebar__item">
              <h5 class="text-18 fw-500 mb-10">Car Category</h5>
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

                      <div class="text-15 ml-10">Small</div>

                    </div>

                  </div>

                  <div class="col-auto">
                    <div class="text-15 text-light-1">$92</div>
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

                      <div class="text-15 ml-10">Medium</div>

                    </div>

                  </div>

                  <div class="col-auto">
                    <div class="text-15 text-light-1">$45</div>
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

                      <div class="text-15 ml-10">Large</div>

                    </div>

                  </div>

                  <div class="col-auto">
                    <div class="text-15 text-light-1">$21</div>
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

                      <div class="text-15 ml-10">Premium</div>

                    </div>

                  </div>

                  <div class="col-auto">
                    <div class="text-15 text-light-1">$78</div>
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

                      <div class="text-15 ml-10">SUV</div>

                    </div>

                  </div>

                  <div class="col-auto">
                    <div class="text-15 text-light-1">$679</div>
                  </div>
                </div>

              </div>
            </div>

            <div class="sidebar__item pb-30">
              <h5 class="text-18 fw-500 mb-10">Price</h5>
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
              <h5 class="text-18 fw-500 mb-10">Supplier</h5>
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

                      <div class="text-15 ml-10">Avis</div>

                    </div>

                  </div>

                  <div class="col-auto">
                    <div class="text-15 text-light-1">$92</div>
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

                      <div class="text-15 ml-10">Budget</div>

                    </div>

                  </div>

                  <div class="col-auto">
                    <div class="text-15 text-light-1">$45</div>
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

                      <div class="text-15 ml-10">Sixt</div>

                    </div>

                  </div>

                  <div class="col-auto">
                    <div class="text-15 text-light-1">$21</div>
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

                      <div class="text-15 ml-10">Europcar</div>

                    </div>

                  </div>

                  <div class="col-auto">
                    <div class="text-15 text-light-1">$78</div>
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

                      <div class="text-15 ml-10">Enterprise</div>

                    </div>

                  </div>

                  <div class="col-auto">
                    <div class="text-15 text-light-1">$679</div>
                  </div>
                </div>

              </div>
            </div>

            <div class="sidebar__item">
              <h5 class="text-18 fw-500 mb-10">Car Specifications</h5>
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

                      <div class="text-15 ml-10">With air conditioning</div>

                    </div>

                  </div>

                  <div class="col-auto">
                    <div class="text-15 text-light-1">$92</div>
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

                      <div class="text-15 ml-10">Automatic transmission</div>

                    </div>

                  </div>

                  <div class="col-auto">
                    <div class="text-15 text-light-1">$45</div>
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

                      <div class="text-15 ml-10">Manual transmission</div>

                    </div>

                  </div>

                  <div class="col-auto">
                    <div class="text-15 text-light-1">$21</div>
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

                      <div class="text-15 ml-10">2 doors</div>

                    </div>

                  </div>

                  <div class="col-auto">
                    <div class="text-15 text-light-1">$78</div>
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

                      <div class="text-15 ml-10">4 doors</div>

                    </div>

                  </div>

                  <div class="col-auto">
                    <div class="text-15 text-light-1">$679</div>
                  </div>
                </div>

              </div>
            </div>

            <div class="sidebar__item">
              <h5 class="text-18 fw-500 mb-10">Mileage/Kilometres</h5>
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

                      <div class="text-15 ml-10">Limited</div>

                    </div>

                  </div>

                  <div class="col-auto">
                    <div class="text-15 text-light-1">$92</div>
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

                      <div class="text-15 ml-10">Unlimited</div>

                    </div>

                  </div>

                  <div class="col-auto">
                    <div class="text-15 text-light-1">$45</div>
                  </div>
                </div>

              </div>
            </div>

            <div class="sidebar__item">
              <h5 class="text-18 fw-500 mb-10">Transmission</h5>
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

                      <div class="text-15 ml-10">Automatic</div>

                    </div>

                  </div>

                  <div class="col-auto">
                    <div class="text-15 text-light-1">$92</div>
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

                      <div class="text-15 ml-10">Manual</div>

                    </div>

                  </div>

                  <div class="col-auto">
                    <div class="text-15 text-light-1">$45</div>
                  </div>
                </div>

              </div>
            </div>

            <div class="sidebar__item">
              <h5 class="text-18 fw-500 mb-10">Fuel Policy</h5>
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

                      <div class="text-15 ml-10">Full to full</div>

                    </div>

                  </div>

                  <div class="col-auto">
                    <div class="text-15 text-light-1">$92</div>
                  </div>
                </div>

              </div>
            </div>

          </aside>
        </div>

        <div class="mt-30"></div>

        <div class="row y-gap-30">
        

  <?php include('search-car-rentals.php'); ?>


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

        <div id="searchResults" class="mt-40"></div>
      </div>
    </div>
  
  </div>
</section>

<?php include '../includes/footer.php'; ?>


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

// SUBMIT
$(document).ready(function() {
  $(".mainSearch__submit").click(function(e){
      e.preventDefault();

      let pickup = $("#pickup_location").val();
      let dropoff = $("#dropoff_location").val();
      let passengers = $("#passengerCount").text();

      let url = `?pickup=${encodeURIComponent(pickup)}&dropoff=${encodeURIComponent(dropoff)}&passengers=${passengers}`;
      window.location.href = url;
  });
});
</script>

