<?php include '../includes/header.php';
include_once __DIR__ . '/../travel-panel/includes/connection.php';  ?>


<style>
  .my-modal {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.6);
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 1000;
    opacity: 0;
    visibility: hidden;
    transition: all 0.3s ease-in-out;
  }

  .my-modal.active {
    opacity: 1;
    visibility: visible;
  }

  .my-modal-content {
    background: #fff;
    padding: 2rem;
    border-radius: 8px;
    width: 90%;
    max-width: 600px;
    max-height: 90vh;
    overflow-y: auto;
    position: relative;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
    transform: translateY(-30px);
    transition: transform 0.3s ease-in-out;
  }

  .my-modal.active .my-modal-content {
    transform: translateY(0);
  }

  .btn-close-modal {
    position: absolute;
    top: 10px;
    right: 15px;
    font-size: 1.5rem;
    cursor: pointer;
    border: none;
    background: none;
    line-height: 1;
    color: #333;
  }

  .alert-message {
    padding: 12px 15px;
    border-radius: 4px;
    margin-top: 15px;
    display: none;
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

  .booking-summary {
    background: #f8f9fa;
    padding: 15px;
    border-radius: 8px;
    margin-bottom: 20px;
    border-left: 4px solid #3554d1;
  }

  .booking-summary h6 {
    margin-bottom: 10px;
    color: #3554d1;
  }

  .booking-summary p {
    margin: 5px 0;
    font-size: 14px;
  }


  /* Custom CSS for visual polish, outside of utilities */

  /* Assuming shadow-small is not available. If it is, delete this. */
  .shadow-small {
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
    /* Assuming radius is not a utility class */
  }

  /* Base button styling (assuming .btn needs defining) */
  .btn {
    border: none;
    cursor: pointer;
    transition: background-color 0.2s;
  }

  /* Ensuring the image covers the container */
  .object-cover {
    object-fit: cover;
  }

  /* Ensuring the w-full on small screens for the image container */
  .size-160 {
    width: 100%;
    /* Overrides the fixed size for small screens */
    height: 160px;
  }

  /* Re-applying the fixed size for md: (and larger) using the provided utility */
  @media (min-width: 768px) {
    .size-160 {
      width: 160px;
      height: 160px;
    }
  }

  /* The Card Label - Acts as the clickable container */
  .option-card {
    display: flex;
    align-items: center;
    cursor: pointer;
    transition: all 0.3s ease;
    position: relative;
  }

  /* Hover Effect */
  .option-card:hover {
    border-color: #b0b0b0;
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
  }

  /* Hide the default HTML radio button */
  .option-card input[type="radio"] {
    display: none;
  }

  /* Custom Radio Button Design */
  .custom-radio {
    width: 20px;
    height: 20px;
    border: 2px solid #a0a0a0;
    border-radius: 50%;
    margin-right: 20px;
    flex-shrink: 0;
    position: relative;
    transition: border-color 0.3s;
  }

  /* Inner circle for selected state */
  .custom-radio::after {
    content: '';
    width: 10px;
    height: 10px;
    background: #007bff;
    border-radius: 50%;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%) scale(0);
    transition: transform 0.2s ease-in-out;
  }



  /* --- ACTIVE STATE STYLING --- */
  /* When the radio input is checked, style the parent label */
  .option-card:has(input[type="radio"]:checked) {
    border-color: #007bff;
    box-shadow: 0 4px 15px rgba(0, 123, 255, 0.15);
  }

  /* Animate the inner radio circle */
  .option-card input[type="radio"]:checked+.custom-radio {
    border-color: #007bff;
  }

  .option-card input[type="radio"]:checked+.custom-radio::after {
    transform: translate(-50%, -50%) scale(1);
  }

  /* Mobile Responsiveness */
  @media (max-width: 600px) {
    .option-card {
      flex-direction: row;
      flex-wrap: wrap;
      padding: 15px;
    }


    .custom-radio {
      order: 1;
      margin-bottom: 10px;
    }
  }


  .modal {
    --ct-modal-zindex: 1055;
    --ct-modal-width: 500px;
    --ct-modal-padding: 0.75rem;
    --ct-modal-margin: 0.5rem;
    --ct-modal-bg: var(--ct-secondary-bg);
    --ct-modal-border-color: transparent;
    --ct-modal-border-width: var(--ct-border-width);
    --ct-modal-border-radius: var(--ct-border-radius-sm);
    --ct-modal-box-shadow: 0 0.125rem 0.25rem rgba(var(--ct-body-color-rgb), 0.15);
    --ct-modal-inner-border-radius: calc(var(--ct-border-radius-sm) - (var(--ct-border-width)));
    --ct-modal-header-padding-x: 0.75rem;
    --ct-modal-header-padding-y: 0.75rem;
    --ct-modal-header-padding: 0.75rem 0.75rem;
    --ct-modal-header-border-color: var(--ct-border-color);
    --ct-modal-header-border-width: var(--ct-border-width);
    --ct-modal-title-line-height: 1.5;
    --ct-modal-footer-gap: 0.5rem;
    --ct-modal-footer-border-color: var(--ct-border-color);
    --ct-modal-footer-border-width: var(--ct-border-width);
    position: fixed;
    top: 0;
    left: 0;
    z-index: var(--ct-modal-zindex);
    display: none;
    width: 100%;
    height: 100%;
    overflow-x: hidden;
    overflow-y: auto;
    outline: 0;
  }

  .modal-dialog {
    position: relative;
    width: auto;
    margin: var(--ct-modal-margin);
    pointer-events: none;
  }

  .modal.fade .modal-dialog {
    -webkit-transition: -webkit-transform 0.3s ease-out;
    transition: -webkit-transform 0.3s ease-out;
    transition: transform 0.3s ease-out;
    transition:
      transform 0.3s ease-out,
      -webkit-transform 0.3s ease-out;
    -webkit-transform: translate(0, -50px);
    transform: translate(0, -50px);
  }

  @media (prefers-reduced-motion: reduce) {
    .modal.fade .modal-dialog {
      -webkit-transition: none;
      transition: none;
    }
  }

  .modal.show .modal-dialog {
    -webkit-transform: none;
    transform: none;
  }

  .modal.modal-static .modal-dialog {
    -webkit-transform: scale(1.02);
    transform: scale(1.02);
  }

  .modal-dialog-scrollable {
    height: calc(100% - var(--ct-modal-margin) * 2);
  }

  .modal-dialog-scrollable .modal-content {
    max-height: 100%;
    overflow: hidden;
  }

  .modal-dialog-scrollable .modal-body {
    overflow-y: auto;
  }

  .modal-dialog-centered {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    min-height: calc(100% - var(--ct-modal-margin) * 2);
  }

  .modal-content {
    position: relative;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    -ms-flex-direction: column;
    flex-direction: column;
    width: 100%;
    color: var(--ct-modal-color);
    pointer-events: auto;
    background-color: var(--ct-modal-bg);
    background-clip: padding-box;
    border: var(--ct-modal-border-width) solid var(--ct-modal-border-color);
    border-radius: var(--ct-modal-border-radius);
    outline: 0;
  }

  .modal-backdrop {
    --ct-backdrop-zindex: 1050;
    --ct-backdrop-bg: var(--ct-emphasis-color);
    --ct-backdrop-opacity: 0.75;
    position: fixed;
    top: 0;
    left: 0;
    z-index: var(--ct-backdrop-zindex);
    width: 100vw;
    height: 100vh;
    background-color: var(--ct-backdrop-bg);
  }

  .modal-backdrop.fade {
    opacity: 0;
  }

  .modal-backdrop.show {
    opacity: var(--ct-backdrop-opacity);
  }

  .modal-header {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-negative: 0;
    flex-shrink: 0;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    -webkit-box-pack: justify;
    -ms-flex-pack: justify;
    justify-content: space-between;
    padding: var(--ct-modal-header-padding);
    border-bottom: var(--ct-modal-header-border-width) solid var(--ct-modal-header-border-color);
    border-top-left-radius: var(--ct-modal-inner-border-radius);
    border-top-right-radius: var(--ct-modal-inner-border-radius);
  }

  .modal-header .btn-close {
    padding: calc(var(--ct-modal-header-padding-y) * 0.5) calc(var(--ct-modal-header-padding-x) * 0.5);
    margin: calc(-0.5 * var(--ct-modal-header-padding-y)) calc(-0.5 * var(--ct-modal-header-padding-x)) calc(-0.5 * var(--ct-modal-header-padding-y)) auto;
  }

  .modal-title {
    margin-bottom: 0;
    line-height: var(--ct-modal-title-line-height);
  }

  .modal-body {
    position: relative;
    -webkit-box-flex: 1;
    -ms-flex: 1 1 auto;
    flex: 1 1 auto;
    padding: var(--ct-modal-padding);
  }

  .modal-footer {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-negative: 0;
    flex-shrink: 0;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    -webkit-box-pack: end;
    -ms-flex-pack: end;
    justify-content: flex-end;
    padding: calc(var(--ct-modal-padding) - var(--ct-modal-footer-gap) * 0.5);
    background-color: var(--ct-modal-footer-bg);
    border-top: var(--ct-modal-footer-border-width) solid var(--ct-modal-footer-border-color);
    border-bottom-right-radius: var(--ct-modal-inner-border-radius);
    border-bottom-left-radius: var(--ct-modal-inner-border-radius);
  }

  .modal-footer>* {
    margin: calc(var(--ct-modal-footer-gap) * 0.5);
  }

  @media (min-width: 576px) {
    .modal {
      --ct-modal-margin: 1.75rem;
      --ct-modal-box-shadow: var(--ct-box-shadow);
    }

    .modal-dialog {
      max-width: var(--ct-modal-width);
      margin-right: auto;
      margin-left: auto;
    }

    .modal-sm {
      --ct-modal-width: 300px;
    }
  }

  @media (min-width: 992px) {

    .modal-lg,
    .modal-xl {
      --ct-modal-width: 800px;
    }
  }

  @media (min-width: 1200px) {
    .modal-xl {
      --ct-modal-width: 1140px;
    }
  }

  .modal-fullscreen {
    width: 100vw;
    max-width: none;
    height: 100%;
    margin: 0;
  }

  .modal-fullscreen .modal-content {
    height: 100%;
    border: 0;
    border-radius: 0;
  }

  .modal-fullscreen .modal-footer,
  .modal-fullscreen .modal-header {
    border-radius: 0;
  }

  .modal-fullscreen .modal-body {
    overflow-y: auto;
  }

  @media (max-width: 575.98px) {
    .modal-fullscreen-sm-down {
      width: 100vw;
      max-width: none;
      height: 100%;
      margin: 0;
    }

    .modal-fullscreen-sm-down .modal-content {
      height: 100%;
      border: 0;
      border-radius: 0;
    }

    .modal-fullscreen-sm-down .modal-footer,
    .modal-fullscreen-sm-down .modal-header {
      border-radius: 0;
    }

    .modal-fullscreen-sm-down .modal-body {
      overflow-y: auto;
    }
  }

  @media (max-width: 767.98px) {
    .modal-fullscreen-md-down {
      width: 100vw;
      max-width: none;
      height: 100%;
      margin: 0;
    }

    .modal-fullscreen-md-down .modal-content {
      height: 100%;
      border: 0;
      border-radius: 0;
    }

    .modal-fullscreen-md-down .modal-footer,
    .modal-fullscreen-md-down .modal-header {
      border-radius: 0;
    }

    .modal-fullscreen-md-down .modal-body {
      overflow-y: auto;
    }
  }

  @media (max-width: 991.98px) {
    .modal-fullscreen-lg-down {
      width: 100vw;
      max-width: none;
      height: 100%;
      margin: 0;
    }

    .modal-fullscreen-lg-down .modal-content {
      height: 100%;
      border: 0;
      border-radius: 0;
    }

    .modal-fullscreen-lg-down .modal-footer,
    .modal-fullscreen-lg-down .modal-header {
      border-radius: 0;
    }

    .modal-fullscreen-lg-down .modal-body {
      overflow-y: auto;
    }
  }

  @media (max-width: 1199.98px) {
    .modal-fullscreen-xl-down {
      width: 100vw;
      max-width: none;
      height: 100%;
      margin: 0;
    }

    .modal-fullscreen-xl-down .modal-content {
      height: 100%;
      border: 0;
      border-radius: 0;
    }

    .modal-fullscreen-xl-down .modal-footer,
    .modal-fullscreen-xl-down .modal-header {
      border-radius: 0;
    }

    .modal-fullscreen-xl-down .modal-body {
      overflow-y: auto;
    }
  }

  @media (max-width: 1399.98px) {
    .modal-fullscreen-xxl-down {
      width: 100vw;
      max-width: none;
      height: 100%;
      margin: 0;
    }

    .modal-fullscreen-xxl-down .modal-content {
      height: 100%;
      border: 0;
      border-radius: 0;
    }

    .modal-fullscreen-xxl-down .modal-footer,
    .modal-fullscreen-xxl-down .modal-header {
      border-radius: 0;
    }

    .modal-fullscreen-xxl-down .modal-body {
      overflow-y: auto;
    }
  }
</style>
<?php
$slug = $_GET['slug'] ?? '';

if (!$slug) {
  die("Invalid package URL");
}

// Fetch package
$stmt = $conn->prepare("
    SELECT p.*, 
           h1.hotel_title AS makkah_hotel_name,
           h2.hotel_title AS madinah_hotel_name
    FROM umrah_packages p
    LEFT JOIN hotels h1 ON p.makkah_hotel_id = h1.id
    LEFT JOIN hotels h2 ON p.madinah_hotel_id = h2.id
    WHERE p.package_slug = ?
    LIMIT 1
");
$stmt->bind_param("s", $slug);
$stmt->execute();
$package = $stmt->get_result()->fetch_assoc();

if (!$package) {
  die("Package not found");
}

$package_id = $package['id'];

// Fetch itinerary
$itiStmt = $conn->prepare("
    SELECT day_number, itinerary_title, itinerary_description
    FROM umrah_itinerary
    WHERE package_id = ?
    ORDER BY day_number ASC
");
$itiStmt->bind_param("i", $package_id);
$itiStmt->execute();
$itineraries = $itiStmt->get_result();

// Fetch room prices
$roomStmt = $conn->prepare("
    SELECT  r.room_title, pr.room_id ,  pr.room_price
    FROM umrah_package_room_prices pr
    LEFT JOIN rooms r ON pr.room_id = r.id
    WHERE pr.package_id = ?
    ORDER BY r.id ASC
");
$roomStmt->bind_param("i", $package_id);
$roomStmt->execute();
$rooms = $roomStmt->get_result();
?>
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
        <a href="#" class="text-14 text-blue-1 underline">All Umrah Packages</a>
      </div>
    </div>
  </div>
</section>

<section class="pt-40">
  <div class="container">
    <div class="row y-gap-15 justify-between items-end">
      <div class="col-auto">
        <h1 class="text-30 fw-600"><?= $package['package_title'] ?></h1>
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
  </div>
</section>

<section class="pt-40 js-pin-container">
  <div class="container">
    <div class="row y-gap-30">
      <div class="col-lg-8">
        <div class="relative d-flex justify-center overflow-hidden js-section-slider" data-slider-cols="base-1" data-nav-prev="js-img-prev" data-nav-next="js-img-next">
          <div class="swiper-wrapper">
            <div class="swiper-slide">
              <img src="/travel-panel/assets/uploads/umrah-packages/<?= $package['package_image'] ?>" alt="image" class="rounded-4 col-12 h-full object-cover">
            </div>
          </div>



        </div>

        <h3 class="text-22 fw-500 mt-30">
          Tour snapshot
        </h3>

        <div class="row y-gap-30 justify-between pt-20">

          <div class="col-md-auto col-6">
            <div class="d-flex">
              <i class="icon-clock text-22 text-blue-1 mr-10"></i>
              <div class="text-15 lh-15">
                Duration:<br> 11h
              </div>
            </div>
          </div>

          <div class="col-md-auto col-6">
            <div class="d-flex">
              <i class="icon-customer text-22 text-blue-1 mr-10"></i>
              <div class="text-15 lh-15">
                Group size:<br> 52
              </div>
            </div>
          </div>

          <div class="col-md-auto col-6">
            <div class="d-flex">
              <i class="icon-route text-22 text-blue-1 mr-10"></i>
              <div class="text-15 lh-15">
                Near public<br> transportation
              </div>
            </div>
          </div>

          <div class="col-md-auto col-6">
            <div class="d-flex">
              <i class="icon-access-denied text-22 text-blue-1 mr-10"></i>
              <div class="text-15 lh-15">
                Free cancellation <br><a href='#' class='text-blue-1 underline'>Learn more</a>
              </div>
            </div>
          </div>

        </div>

        <div class="row mt-60">
          <div class="col-lg-6">
            <h4 class="text-22 fw-500 pl-5">Makkah Hotel</h4>
            <div class="d-flex px-10 py-10 rounded-4 border-light bg-white shadow-4" style="gap: 20px;">
              <div><img src="/travel-panel/assets/img/gallery/1/1.png" alt="" width="150px"></div>
              <div class="d-flex flex-column justify-between lh-15">
                <div>
                  <h4 class="text-16 fw-500 ">Emaar Khaild </h4>
                  <h4 class="text-14 fw-500 ">Distance from Mataf</h4>
                </div>
                <div class="">
                  <a href="" class="text-blue-1 underline text-14">see map Location</a><br>
                  <a href="" class="text-blue-1 underline text-14">see Photos</a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <h4 class="text-22 fw-500 pl-5">Makkah Hotel</h4>
            <div class="d-flex px-10 py-10 rounded-4 border-light bg-white shadow-4" style="gap: 20px;">
              <div><img src="/travel-panel/img/gallery/1/1.png" alt="" width="150px"></div>
              <div class="d-flex flex-column justify-between lh-15">
                <div>
                  <h4 class="text-16 fw-500 ">Emaar Khaild </h4>
                  <h4 class="text-14 fw-500 ">Distance from Mataf</h4>
                </div>
                <div class="">
                  <a href="" class="text-blue-1 underline text-14">see map Location</a><br>
                  <a href="" class="text-blue-1 underline text-14">see Photos</a>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
      <div class="col-lg-4">
        <div class="d-flex justify-end js-pin-content">
          <div class="w-360 lg:w-full d-flex flex-column items-center">
            <div class="px-30 py-30 rounded-4 border-light bg-white shadow-4">
              <div class="text-14 text-light-1">
                From <span class="text-20 fw-500 text-dark-1 ml-5">PKR <?= $package['package_price'] ?></span>
              </div>

              <div class="row y-gap-20 pt-30">
                <div class="col-12">

                  <div class="searchMenu-date px-20 py-10 border-light rounded-4 -right js-form-dd js-calendar js-calendar-el">

                    <div data-x-dd-click="searchMenu-date">
                      <h4 class="text-15 fw-500 ls-2 lh-16">Date</h4>

                      <div class="capitalize text-15 text-light-1 ls-2 lh-16">

                        <input type="text" id="SingleDate" placeholder="Select Date" required>
                      </div>
                    </div>


                    <div class="searchMenu-date__field shadow-2" data-x-dd="searchMenu-date" data-x-dd-toggle="-is-active">
                      <div class="bg-white px-30 py-30 rounded-4">
                        <div class="elCalendar js-calendar-el-calendar"></div>
                      </div>
                    </div>
                  </div>

                </div>

                <div class="col-12">

                  <div class="searchMenu-guests px-20 py-10 border-light rounded-4 js-form-dd js-form-counters">

                    <div data-x-dd-click="searchMenu-guests" id="passengerTrigger">
                      <h4 class="text-15 fw-500 ls-2 lh-16">Number of travelers</h4>

                      <div class="text-15 text-light-1 ls-2 lh-16">
                        <span id="passengerCountDisplay">2</span> adults -
                        <span class="js-count-child">1</span> children
                      </div>
                    </div>

                    <div class="passenger-popup shadow-2 bg-white px-10 py-10 rounded-4 d-none" id="passengerPopup">

                      <!-- Adults -->
                      <div class="row y-gap-10 justify-between items-center">
                        <div class="col-auto">
                          <div class="text-15 fw-500">Adults</div>
                        </div>
                        <div class="col-auto">
                          <div class="d-flex items-center">
                            <button class="button -outline-blue-1 text-blue-1 size-38 rounded-4" id="decAdult">
                              <i class="icon-minus text-12"></i>
                            </button>

                            <div class="flex-center size-20 ml-15 mr-15">
                              <div class="text-15" id="adultCount">2</div>
                            </div>

                            <button class="button -outline-blue-1 text-blue-1 size-38 rounded-4" id="incAdult">
                              <i class="icon-plus text-12"></i>
                            </button>
                          </div>
                        </div>
                      </div>

                      <!-- Children -->
                      <div class="row y-gap-10 justify-between items-center">
                        <div class="col-auto">
                          <div class="text-15 fw-500">Children</div>
                        </div>
                        <div class="col-auto">
                          <div class="d-flex items-center">
                            <button class="button -outline-blue-1 text-blue-1 size-38 rounded-4" id="decChild">
                              <i class="icon-minus text-12"></i>
                            </button>

                            <div class="flex-center size-20 ml-15 mr-15">
                              <div class="text-15" id="childCount">1</div>
                            </div>

                            <button class="button -outline-blue-1 text-blue-1 size-38 rounded-4" id="incChild">
                              <i class="icon-plus text-12"></i>
                            </button>
                          </div>
                        </div>
                      </div>

                    </div>
                  </div>

                </div>
                <div class="col-12">
                  <?php while ($r = $rooms->fetch_assoc()) { ?>


                    <!-- Option 1 -->
                    <label class="option-card bg-white px-20 py-10 border-light rounded-4 js-form-dd mb-20">
                      <input type="radio" name="room_selection"  value="<?= $r['room_id'] ?>"  data-price="<?= number_format($r['room_price']) ?>" data-title="<?= htmlspecialchars($r['room_title']) ?>" checked>
                      <div class="custom-radio"></div>

                      <div>
                        <span class="text-15 fw-500 ls-2 lh-16 mr-20"><strong><?= $r['room_title'] ?>:</strong></span>
                        <span class="price-tag">PKR <?= number_format($r['room_price']) ?></span>
                      </div>
                    </label>
                  <?php } ?>



                </div>
                <div class="col-12">
                  <button data-modal-target="#modal-umrah-packages" class="button -dark-1 py-15 px-35 h-60 col-12 rounded-4 bg-blue-1 text-white">
                    Book Now
                  </button>


                </div>





                <div id="modal-umrah-packages" class="my-modal">
                  <div class="my-modal-content">
                    <button class="btn-close-modal" data-close-modal>&times;</button>

                    <div class="modal-header mb-20">
                      <h5 class="modal-title text-22 fw-500">Complete Your Umrah Booking</h5>
                    </div>

                    <div class="modal-body">
  <!-- Booking Summary -->
  <div class="booking-summary">
    <h6 class="fw-bold">Booking Summary:</h6>
    <p><strong>Package:</strong> <?= htmlspecialchars($package['package_title']) ?></p>
    <p><strong>Package Type:</strong> <?= htmlspecialchars($package['package_type']) ?></p>
    <p><strong>Duration:</strong> <?= ($package['nights_makkah'] + $package['nights_madinah']) ?> nights</p>
    <p><strong>Travel Date:</strong> <span class="modal-travel-date">-</span></p>
    <p><strong>Room Type:</strong> <span class="modal-room-title">-</span></p>
    <p><strong>Price:</strong> <span class="modal-room-price">-</span></p>
  </div>
  
  <form id="umrah-booking-form">
    <!-- Hidden Fields -->
    <input type="hidden" name="room_type"  class="modal-room-type" value="">
    <input type="hidden" name="package_id" value="<?= $package['id'] ?>">
    <input type="hidden" name="room_id" value="">
    <input type="hidden" name="total_price" value="">
    <input type="hidden" name="booking_adults" id="hidden_adults" value="2">
    <input type="hidden" name="booking_children" id="hidden_children" value="0">
    <input type="hidden" name="travel_date" id="hidden_travel_date" value="">
    
    <div class="row">
      <!-- Name -->
      <div class="col-lg-12">
        <div class="form-input">
          <input type="text" name="booking_name" required>
          <label class="lh-1 text-16 text-light-1">Full Name *</label>
        </div>
      </div>
      
      <!-- Email -->
      <div class="col-lg-12">
        <div class="form-input mt-20">
          <input type="email" name="booking_email" required>
          <label class="lh-1 text-16 text-light-1">Email Address *</label>
        </div>
      </div>
      
      <!-- Phone -->
      <div class="col-lg-12">
        <div class="form-input mt-20">
          <input type="tel" name="booking_phone" required>
          <label class="lh-1 text-16 text-light-1">Phone Number *</label>
        </div>
      </div>
    </div>
    
    <!-- Alert Message -->
    <div class="alert-message" style="display: none;"></div>
  </form>
</div>


                    <div class="modal-footer d-flex justify-center mt-20">
                      <button type="button" class="btn-book-umrah-now button -md -dark-1 bg-blue-1 text-white px-40 py-15">
                        Book Now
                      </button>
                    </div>
                  </div>
                </div>
              </div>

              <div class="d-flex items-center pt-20">
                <div class="size-40 flex-center bg-light-2 rounded-full">
                  <i class="icon-heart text-16 text-green-2"></i>
                </div>
                <div class="text-14 lh-16 ml-10">94% of travelers recommend this experience</div>
              </div>
            </div>

            <div class="px-30">
              <div class="text-14 text-light-1 mt-30">Not sure? You can cancel this reservation up to 24 hours in advance for a full refund.</div>
            </div>
          </div>
        </div>
      </div>




      <div class="border-top-light mt-40 mb-40"></div>

      <div class="row x-gap-40 y-gap-40">
        <div class="col-12">
          <h3 class="text-22 fw-500">Overview</h3>

          <p class="text-15">
            <?= $package['package_description'] ?>
          </p>

          <a href="#" class="d-block text-14 text-blue-1 fw-500 underline mt-10">Show More</a>
        </div>

        <div class="col-md-6">
          <h5 class="text-16 fw-500">Available languages</h5>
          <div class="text-15 mt-10">German, Chinese, Portuguese, Japanese, English, Italian, Chinese, French, Spanish</div>
        </div>

        <div class="col-md-6">
          <h5 class="text-16 fw-500">Cancellation policy</h5>
          <div class="text-15 mt-10">For a full refund, cancel at least 24 hours in advance of the start date of the experience.</div>
        </div>

        <div class="col-12">
          <h5 class="text-16 fw-500">Highlights</h5>
          <ul class="list-disc text-15 mt-10">
            <li>Travel between the UNESCO World Heritage sites aboard a comfortable coach</li>
            <li>Explore with a guide to delve deeper into the history</li>
            <li>Great for history buffs and travelers with limited time</li>
          </ul>
        </div>
      </div>

      <div class="mt-40 border-top-light">
        <div class="row x-gap-40 y-gap-40 pt-40">
          <div class="col-12">
            <h3 class="text-22 fw-500">What's Included</h3>

            <div class="row x-gap-40 y-gap-40 pt-20">
              <div class="col-md-6">
                <div class="text-dark-1 text-15">
                  <i class="icon-check text-10 mr-10"></i> Entry ticket to Harry Potter Warner Bros Studio Tour London
                </div>
                <div class="text-dark-1 text-15">
                  <i class="icon-check text-10 mr-10"></i> Return transfers in air-conditioned coach
                </div>
              </div>

              <div class="col-md-6">
                <div class="text-dark-1 text-15">
                  <i class="icon-close text-green-2 text-10 mr-10"></i> Food and drinks
                </div>
                <div class="text-dark-1 text-15">
                  <i class="icon-close text-green-2 text-10 mr-10"></i> Gratuities
                </div>
                <div class="text-dark-1 text-15">
                  <i class="icon-close text-green-2 text-10 mr-10"></i> Digital guide available in 10 different languages at additional cost
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
    <div class="pt-40 border-top-light">
      <div class="row x-gap-40 y-gap-40">
        <div class="col-auto">
          <h3 class="text-22 fw-500">Important information</h3>
        </div>
      </div>

      <div class="row x-gap-40 y-gap-40 justify-between pt-20">
        <div class="col-lg-4 col-md-6">
          <div class="fw-500 mb-10">Inclusions</div>
          <ul class="list-disc">
            <li>Superior Coach, Wi-Fi and USB Charging On-board</li>
            <li>Expert guide</li>
            <li>Admission to Windsor Castle (if option selected)</li>
            <li>Admission to Stonehenge</li>
          </ul>
        </div>

        <div class="col-lg-4 col-md-6">
          <div class="fw-500 mb-10">Departure details</div>
          <div class="text-15">
            Departures from 01st April 2022: Tour departs at 8 am (boarding at 7.30 am), Victoria Coach Station Gate 1-5
          </div>
        </div>

        <div class="col-lg-3 col-md-6">
          <div class="fw-500 mb-10">Know before you go</div>
          <ul class="list-disc">
            <li>Duration: 11h</li>
            <li>Mobile tickets accepted</li>
            <li>Instant confirmation</li>
          </ul>
        </div>

        <div class="col-lg-4 col-md-6">
          <div class="fw-500 mb-10">Exclusions</div>
          <ul class="list-disc">
            <li>Hotel pick-up and drop-off</li>
            <li>Gratuities</li>
            <li>Lunch</li>
          </ul>
        </div>

        <div class="col-12">
          <div class="fw-500 mb-10">Additional information</div>
          <ul class="list-disc">
            <li>Confirmation will be received at time of booking</li>
            <li>Departs at 8am (boarding at 7.30am), Victoria Coach Station Gate 1-5, 164 Buckingham Palace Road, London, SW1W 9TP</li>
            <li>As Windsor Castle is a working royal palace, sometimes the entire Castle or the State Apartments within the Castle need to be closed at short notice. (if selected this option)</li>
            <li>Stonehenge is closed on 21 June due to the Summer Solstice. During this time, we will instead visit the Avebury Stone Circle.</li>
            <li>Please note: the tour itinerary and order may change</li>
          </ul>
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
    <h3 class="text-22 fw-500 mb-20">Itinerary</h3>

    <div class="row y-gap-30">
      <div class="col-lg-12">
        <div class="relative">
          <div class="border-test"></div>

          <div class="accordion -map row y-gap-20 js-accordion">
            <?php while ($it = $itineraries->fetch_assoc()) { ?>
              <div class="col-12 mb-30">
                <div class="accordion__item ">
                  <div class="d-flex">
                    <div class="accordion__icon size-40 flex-center bg-blue-2 text-blue-1 rounded-full">
                      <div class="text-14 fw-500"><?= $it['day_number'] ?></div>
                    </div>
                    <div class="ml-20">
                      <div class="text-16 lh-15 fw-500"><?= $it['itinerary_title'] ?></div>
                      <div class="text-14 lh-15 text-light-1 mt-5">
                        <p><?= nl2br($it['itinerary_description']) ?></p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
          </div>
        <?php } ?>


        <div class="col-12">
          <div class="accordion__item js-accordion-item-active">
            <div class="d-flex">
              <div class="accordion__icon size-40 flex-center bg-blue-2 text-blue-1 rounded-full">
                <div class="text-14 fw-500">2</div>
              </div>

              <div class="ml-20">
                <div class="text-16 lh-15 fw-500">St. George&#39;s Chapel</div>
                <div class="text-14 lh-15 text-light-1 mt-5">Stop: 60 minutes - Admission included</div>

                <div class="accordion__content">
                  <div class="pt-15 pb-15">
                    <img src="/assets/img/lists/tour/single/2.png" alt="image" class="rounded-4 mt-15">
                    <div class="text-14 lh-17 mt-15">Our first stop is Windsor Castle, the ancestral home of the British Royal family for more than 900 years and the largest, continuously occupied castle in Europe.</div>
                  </div>
                </div>

                <div class="accordion__button">
                  <button data-open-change-title="See less" class="d-block lh-15 text-14 text-blue-1 underline fw-500 mt-5">
                    See details & photo
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-12">
          <div class="accordion__item ">
            <div class="d-flex">
              <div class="accordion__icon size-40 flex-center bg-blue-2 text-blue-1 rounded-full">
                <div class="text-14 fw-500">3</div>
              </div>

              <div class="ml-20">
                <div class="text-16 lh-15 fw-500">The Roman Baths</div>
                <div class="text-14 lh-15 text-light-1 mt-5">Stop: 60 minutes - Admission included</div>

                <div class="accordion__content">
                  <div class="pt-15 pb-15">
                    <img src="/assets/img/lists/tour/single/2.png" alt="image" class="rounded-4 mt-15">
                    <div class="text-14 lh-17 mt-15">Our first stop is Windsor Castle, the ancestral home of the British Royal family for more than 900 years and the largest, continuously occupied castle in Europe.</div>
                  </div>
                </div>

                <div class="accordion__button">
                  <button data-open-change-title="See less" class="d-block lh-15 text-14 text-blue-1 underline fw-500 mt-5">
                    See details & photo
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-12">
          <div class="accordion__item ">
            <div class="d-flex">
              <div class="accordion__icon size-40 flex-center bg-blue-2 text-blue-1 rounded-full">
                <div class="text-14 fw-500">4</div>
              </div>

              <div class="ml-20">
                <div class="text-16 lh-15 fw-500">Stonehenge</div>
                <div class="text-14 lh-15 text-light-1 mt-5">Stop: 60 minutes - Admission included</div>

                <div class="accordion__content">
                  <div class="pt-15 pb-15">
                    <img src="/assets/img/lists/tour/single/2.png" alt="image" class="rounded-4 mt-15">
                    <div class="text-14 lh-17 mt-15">Our first stop is Windsor Castle, the ancestral home of the British Royal family for more than 900 years and the largest, continuously occupied castle in Europe.</div>
                  </div>
                </div>

                <div class="accordion__button">
                  <button data-open-change-title="See less" class="d-block lh-15 text-14 text-blue-1 underline fw-500 mt-5">
                    See details & photo
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
</section>

<div class="container mt-40 mb-40">
  <div class="border-top-light"></div>
</div>

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



<div class="container">
  <div class="mt-50 border-top-light"></div>
</div>

<section class="layout-pt-lg layout-pb-lg">
  <div class="container">
    <div class="row justify-between items-end">
      <div class="col-auto">
        <div class="sectionTitle -md">
          <h2 class="sectionTitle__title">Similar Experiences</h2>
          <p class=" sectionTitle__text mt-5 sm:mt-0">Interdum et malesuada fames ac ante ipsum</p>
        </div>
      </div>

      <div class="col-auto">

        <a href="#" class="button h-50 px-24 -blue-1 bg-blue-1-05 text-blue-1">
          See All <div class="icon-arrow-top-right ml-15"></div>
        </a>

      </div>
    </div>

    <div class="row y-gap-30 pt-40 sm:pt-20">

      <div class="col-xl-3 col-lg-3 col-sm-6">

        <a href="tour-single.html" class="tourCard -type-1 rounded-4 ">
          <div class="tourCard__image">

            <div class="cardImage ratio ratio-1:1">
              <div class="cardImage__content">

                <img class="rounded-4 col-12" src="/assets/img/tours/1.png" alt="image">


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

      <div class="col-xl-3 col-lg-3 col-sm-6">

        <a href="tour-single.html" class="tourCard -type-1 rounded-4 ">
          <div class="tourCard__image">

            <div class="cardImage ratio ratio-1:1">
              <div class="cardImage__content">


                <div class="cardImage-slider rounded-4 overflow-hidden js-cardImage-slider">
                  <div class="swiper-wrapper">

                    <div class="swiper-slide">
                      <img class="col-12" src="/assets/img/tours/2.png" alt="image">
                    </div>

                    <div class="swiper-slide">
                      <img class="col-12" src="/assets/img/tours/1.png" alt="image">
                    </div>

                    <div class="swiper-slide">
                      <img class="col-12" src="/assets/img/tours/3.png" alt="image">
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

      <div class="col-xl-3 col-lg-3 col-sm-6">

        <a href="tour-single.html" class="tourCard -type-1 rounded-4 ">
          <div class="tourCard__image">

            <div class="cardImage ratio ratio-1:1">
              <div class="cardImage__content">

                <img class="rounded-4 col-12" src="/assets/img/tours/3.png" alt="image">


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
                  <span class="text-16 fw-500 text-dark-1"><?= $package['package_price'] ?></span>
                </div>
              </div>
            </div>
          </div>
        </a>

      </div>

      <div class="col-xl-3 col-lg-3 col-sm-6">

        <a href="tour-single.html" class="tourCard -type-1 rounded-4 ">
          <div class="tourCard__image">

            <div class="cardImage ratio ratio-1:1">
              <div class="cardImage__content">

                <img class="rounded-4 col-12" src="/assets/img/tours/4.png" alt="image">


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
</main>
<script>
  const exampleModal = document.getElementById('exampleModal')
  exampleModal.addEventListener('show.bs.modal', event => {
    // Button that triggered the modal
    const button = event.relatedTarget
    // Extract info from data-bs-* attributes
    const recipient = button.getAttribute('data-bs-whatever')
    // If necessary, you could initiate an AJAX request here
    // and then do the updating in a callback.
    //
    // Update the modal's content.
    const modalTitle = exampleModal.querySelector('.modal-title')
    const modalBodyInput = exampleModal.querySelector('.modal-body input')

    modalTitle.textContent = `New message to ${recipient}`
    modalBodyInput.value = recipient
  })
</script>
<script>
  document.addEventListener("DOMContentLoaded", () => {

    const trigger = document.getElementById("passengerTrigger");
    const popup = document.getElementById("passengerPopup");

    const adultDisplay = document.getElementById("adultCount");
    const childDisplay = document.getElementById("childCount");
    const modaladultdisplay = document.getElementById("number_adult");
    const modalchilddisplay = document.getElementById("number_children");
    const mainAdult = document.getElementById("passengerCountDisplay");
    const mainChild = document.querySelector(".js-count-child");

    // Buttons
    const incAdult = document.getElementById("incAdult");
    const decAdult = document.getElementById("decAdult");

    const incChild = document.getElementById("incChild");
    const decChild = document.getElementById("decChild");

    let adults = parseInt(adultDisplay.textContent);
    let children = parseInt(childDisplay.textContent);

    trigger.addEventListener("click", e => {
      e.stopPropagation();
      popup.classList.toggle("d-none");
    });

    document.addEventListener("click", e => {
      if (!popup.contains(e.target) && !trigger.contains(e.target)) {
        popup.classList.add("d-none");
      }
    });

    // Adults
    incAdult.addEventListener("click", () => {
      adults++;
      update();
    });

    decAdult.addEventListener("click", () => {
      if (adults > 1) adults--;
      update();
    });

    // Children
    incChild.addEventListener("click", () => {
      children++;
      update();
    });

    decChild.addEventListener("click", () => {
      if (children > 0) children--;
      update();
    });

    function update() {
      adultDisplay.textContent = adults;
      childDisplay.textContent = children;
      modaladultdisplay.valeue += adults;
      modalchilddisplay.value += children;
      mainAdult.textContent = adults;
      mainChild.textContent = children;
    }
  });
</script>
<script>
  document.addEventListener("DOMContentLoaded", function() {
    const pickupPicker = flatpickr("#SingleDate", {
      enableTime: false,
      dateFormat: "d-m-Y"
    })

  })
</script>
<script>
  // Umrah Package Booking Modal Script
// Umrah Package Booking Modal Script
document.addEventListener("DOMContentLoaded", function() {

  // Modal open/close functionality
  document.addEventListener('click', e => {
    // OPEN MODAL
    const trigger = e.target.closest('[data-modal-target]');
    if (trigger) {
      const targetSelector = trigger.getAttribute('data-modal-target');
      const modal = document.querySelector(targetSelector);
      if (modal) {
        modal.classList.add('active');
        document.body.style.overflow = 'hidden';
      }
    }

    // CLOSE MODAL
    if (e.target.closest('[data-close-modal]') || e.target.classList.contains('my-modal')) {
      const activeModal = document.querySelector('.my-modal.active');
      if (activeModal) {
        activeModal.classList.remove('active');
        document.body.style.overflow = '';
      }
    }
  });

  // ESC KEY CLOSE
  document.addEventListener('keydown', e => {
    if (e.key === 'Escape') {
      const activeModal = document.querySelector('.my-modal.active');
      if (activeModal) {
        activeModal.classList.remove('active');
        document.body.style.overflow = '';
      }
    }
  });

  // Update passenger count display
  function updatePassengerDisplay() {
    const adults = document.getElementById('adultCount').textContent;
    const children = document.getElementById('childCount').textContent;
    document.getElementById('passengerCountDisplay').textContent = adults;
    document.querySelector('.js-count-child').textContent = children;
    
    // Update hidden fields
    document.getElementById('hidden_adults').value = adults;
    document.getElementById('hidden_children').value = children;
  }

  // Adults increment/decrement
  document.getElementById('incAdult').addEventListener('click', function() {
    const adultCount = document.getElementById('adultCount');
    let count = parseInt(adultCount.textContent);
    adultCount.textContent = count + 1;
    updatePassengerDisplay();
  });

  document.getElementById('decAdult').addEventListener('click', function() {
    const adultCount = document.getElementById('adultCount');
    let count = parseInt(adultCount.textContent);
    if (count > 1) {
      adultCount.textContent = count - 1;
      updatePassengerDisplay();
    }
  });

  // Children increment/decrement
  document.getElementById('incChild').addEventListener('click', function() {
    const childCount = document.getElementById('childCount');
    let count = parseInt(childCount.textContent);
    childCount.textContent = count + 1;
    updatePassengerDisplay();
  });

  document.getElementById('decChild').addEventListener('click', function() {
    const childCount = document.getElementById('childCount');
    let count = parseInt(childCount.textContent);
    if (count > 0) {
      childCount.textContent = count - 1;
      updatePassengerDisplay();
    }
  });

  // Get selected room price and date when modal opens
  const bookNowBtn = document.querySelector('[data-modal-target="#modal-umrah-packages"]');
  if (bookNowBtn) {
    bookNowBtn.addEventListener('click', function() {
      // Get selected room
      const selectedRoom = document.querySelector('input[name="room_selection"]:checked');
      if (selectedRoom) {
        const roomId = selectedRoom.value;
        const roomPrice = selectedRoom.dataset.price;
        const roomTitle = selectedRoom.dataset.title;

        // Update modal summary
        document.querySelector('.modal-room-title').textContent = roomTitle;
        document.querySelector('.modal-room-type').value = roomTitle;
        document.querySelector('.modal-room-price').textContent = 'PKR ' + roomPrice;

        // Set hidden fields
        document.querySelector('input[name="room_id"]').value = roomId;
        document.querySelector('input[name="total_price"]').value = roomPrice.replace(/,/g, '');
      }

      // Get selected date (from the date input BEFORE modal)
      const selectedDate = document.getElementById('SingleDate').value;
      if (selectedDate) {
        document.querySelector('.modal-travel-date').textContent = selectedDate;
        document.getElementById('hidden_travel_date').value = selectedDate;
      } else {
        showMessage('Please select a travel date first', 'error');
        // Close modal if no date selected
        setTimeout(() => {
          document.querySelector('.my-modal.active').classList.remove('active');
          document.body.style.overflow = '';
        }, 100);
        return;
      }

      // Get current adults and children count
      const adults = document.getElementById('adultCount').textContent;
      const children = document.getElementById('childCount').textContent;
      document.getElementById('hidden_adults').value = adults;
      document.getElementById('hidden_children').value = children;
    });
  }

  // Handle booking form submission
  const bookingForm = document.getElementById('umrah-booking-form');
  const submitBtn = document.querySelector('.btn-book-umrah-now');

  if (submitBtn && bookingForm) {
    submitBtn.addEventListener('click', function(e) {
      e.preventDefault();

      // Get form data
      const formData = new FormData(bookingForm);

      // Validate required fields
      const travelDate = formData.get('travel_date');
      if (!travelDate) {
        showMessage('Please select a travel date first', 'error');
        return;
      }

      if (!formData.get('room_id')) {
        showMessage('Please select a room option first', 'error');
        return;
      }

      if (!formData.get('booking_name') || !formData.get('booking_email') || !formData.get('booking_phone')) {
        showMessage('Please fill in all required fields', 'error');
        return;
      }

      // Disable button during submission
      submitBtn.disabled = true;
      submitBtn.textContent = 'Processing...';

      // FIXED: Use absolute path from root
      fetch('/umrah-packages/process_umrah_booking.php', {
          method: 'POST',
          body: formData
        })
        .then(response => response.json())
        .then(data => {
          if (data.success) {
            showMessage(data.message, 'success');
            // Reset form after 2 seconds and close modal
            setTimeout(() => {
              bookingForm.reset();
              document.querySelector('.my-modal.active').classList.remove('active');
              document.body.style.overflow = '';
              // Reload page to reset everything
              location.reload();
            }, 2000);
          } else {
            showMessage(data.message, 'error');
          }
        })
        .catch(error => {
          showMessage('An error occurred. Please try again.', 'error');
          console.error('Error:', error);
        })
        .finally(() => {
          submitBtn.disabled = false;
          submitBtn.textContent = 'Book Now';
        });
    });
  }

  // Show message function
  function showMessage(message, type) {
    const alertDiv = document.querySelector('.alert-message');
    if (alertDiv) {
      alertDiv.textContent = message;
      alertDiv.className = 'alert-message mt-20 ' + (type === 'success' ? 'alert-success' : 'alert-danger');
      alertDiv.style.display = 'block';

      setTimeout(() => {
        alertDiv.style.display = 'none';
      }, 5000);
    }
  }
});
</script>

<?php include_once __DIR__ . '/../includes/footer.php'; ?>