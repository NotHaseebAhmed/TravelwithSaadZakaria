<?php include '../includes/header.php'; ?>
<?php include('fetch-hotel-detail.php'); ?>

<?php
// safety checks: ensure variables exist and are correct types
if (!isset($hotel) || !is_array($hotel)) {
  // fallback to avoid undefined index errors
  $hotel = [];
}
if (!isset($images) || !is_array($images)) {
  $images = [];
}
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

<section class="py-10 d-flex items-center bg-light-2" style="margin-top: 90px;">
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
            <div class="">Hotels</div>
          </div>
          <div class="col-auto">
            <div class="">></div>
          </div>
          <div class="col-auto">
            <div class="text-dark-1"><?= htmlspecialchars($hotel['hotel_title']) ?></div>
          </div>
        </div>
      </div>

      <div class="col-auto">
        <a href="#" class="text-14 text-blue-1 underline">All Hotel</a>
      </div>
    </div>
  </div>
</section>

<div class="singleMenu js-singleMenu">
  <div class="singleMenu__content">
    <div class="container">
      <div class="row y-gap-20 justify-between items-center">
        <div class="col-auto">
          <div class="singleMenu__links row x-gap-30 y-gap-10">
            <div class="col-auto">
              <a href="#overview">Overview</a>
            </div>
            <div class="col-auto">
              <a href="#rooms">Rooms</a>
            </div>
            <div class="col-auto">
              <a href="#reviews">Reviews</a>
            </div>
            <div class="col-auto">
              <a href="#facilities">Facilities</a>
            </div>
            <div class="col-auto">
              <a href="#faq">Faq</a>
            </div>
          </div>
        </div>

        <div class="col-auto">
          <div class="row x-gap-15 y-gap-15 items-center">
            <div class="col-auto">
              <div class="text-14">
                From
                <span class="text-22 text-dark-1 fw-500">US$72</span>
              </div>
            </div>

            <div class="col-auto">

              <a href="#" class="button h-50 px-24 -dark-1 bg-blue-1 text-white">
                Select Room <div class="icon-arrow-top-right ml-15"></div>
              </a>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<section class="pt-40">
  <div class="container">
    <div class="row y-gap-20 justify-between items-end">


      <div class="col-auto">
        <div class="row x-gap-20  items-center">
          <div class="col-auto">
            <h1 class="text-30 sm:text-25 fw-600"><?= htmlspecialchars($hotel['hotel_title']) ?></h1>
          </div>

          <div class="col-auto">

            <i class="icon-star text-10 text-yellow-1"></i>

            <i class="icon-star text-10 text-yellow-1"></i>

            <i class="icon-star text-10 text-yellow-1"></i>

            <i class="icon-star text-10 text-yellow-1"></i>

            <i class="icon-star text-10 text-yellow-1"></i>

          </div>
        </div>

        <div class="row x-gap-20 y-gap-20 items-center">
          <div class="col-auto">
            <div class="d-flex items-center text-15 text-light-1">
              <i class="icon-location-2 text-16 mr-5"></i>
              <?= htmlspecialchars($hotel['hotel_location']) ?>
            </div>

            <div class="col-auto">
              <a target="_blank" href="<?= htmlspecialchars($hotel['map_link']) ?>" class="text-blue-1 text-15 underline">Show on map</a>
            </div>
          </div>
        </div>



      </div>

      <div class="col-auto">
        <div class="row x-gap-15 y-gap-15 items-center">
          <div class="col-auto">
            <div class="text-14">
              From
              <span class="text-22 text-dark-1 fw-500">SAR <?= htmlspecialchars($hotel['hotel_price']) ?></span>
            </div>
          </div>

          <div class="col-auto">

            <a href="#" class="button h-50 px-24 -dark-1 bg-blue-1 text-white">
              Select Room <div class="icon-arrow-top-right ml-15"></div>
            </a>

          </div>
        </div>
      </div>

      <div class="galleryGrid -type-1 pt-30">
        <?php
        $allImages = $images ?? [];
        $firstFive = array_slice($allImages, 0, 5);
        $totalImages = count($allImages);
        ?>

        <?php foreach ($firstFive as $index => $img):
          $imgPath = is_array($img) ? ($img['image_path'] ?? '') : $img;
          if (!$imgPath) continue;

          $fullPath = BASE_URL . "/travel-panel/assets/uploads/hotels/" . htmlspecialchars($imgPath);
        ?>

          <?php if ($index === 0): ?>
            <!-- FIRST IMAGE (with heart icon) -->
            <div class="galleryGrid__item relative d-flex">
              <img src="<?= $fullPath ?>" alt="image" class="rounded-4">

              <div class="absolute px-20 py-20 col-12 d-flex justify-end">
                <button class="button -blue-1 size-40 rounded-full flex-center bg-white text-dark-1">
                  <i class="icon-heart text-16"></i>
                </button>
              </div>
            </div>

          <?php elseif ($index < 4): ?>
            <!-- IMAGE 2, 3, 4 (normal) -->
            <div class="galleryGrid__item">
              <img src="<?= $fullPath ?>" alt="image" class="rounded-4">
            </div>

          <?php else: ?>
            <!-- IMAGE 5 (SEE ALL + hidden gallery) -->
            <div class="galleryGrid__item relative d-flex">
              <img src="<?= $fullPath ?>" alt="image" class="rounded-4">

              <div class="masonry_block">
                <div class="masonry-folio">
                  <div class="masonry_thum ">

                    <a href="<?= $fullPath ?>"
                      class="button -blue-1 px-24 py-15 bg-white text-dark-1 glightbox"
                      data-gallery="edu-gallery3">
                      See All <?= $totalImages ?> Photos
                    </a>

                    <!-- Hidden Links for ALL Images -->
                    <?php foreach ($allImages as $gImg):
                      $gPath = is_array($gImg) ? ($gImg['image_path'] ?? '') : $gImg;
                      if (!$gPath) continue;
                    ?>
                      <a href="<?= BASE_URL ?>/travel-panel/assets/uploads/hotels/<?= htmlspecialchars($gPath) ?>"
                        class="glightbox" data-gallery="edu-gallery3"></a>
                    <?php endforeach; ?>
                  </div>
                </div>
              </div>
            </div>
      </div>

    <?php endif; ?>

  <?php endforeach; ?>
    </div>


</section>

<section class="pt-30">
  <div class="container">
    <div class="row y-gap-30">
      <div class="col-xl-8">
        <div class="row y-gap-40">
          <div class="col-12">
            <h3 class="text-22 fw-500">Property highlights</h3>
            <div class="row y-gap-20 pt-30">

              <div class="col-lg-3 col-6">
                <div class="text-center">
                  <i class="icon-city text-24 text-blue-1"></i>
                  <div class="text-15 lh-1 mt-10">In London City Centre</div>
                </div>
              </div>

              <div class="col-lg-3 col-6">
                <div class="text-center">
                  <i class="icon-airplane text-24 text-blue-1"></i>
                  <div class="text-15 lh-1 mt-10">Airport transfer</div>
                </div>
              </div>

              <div class="col-lg-3 col-6">
                <div class="text-center">
                  <i class="icon-bell-ring text-24 text-blue-1"></i>
                  <div class="text-15 lh-1 mt-10">Front desk [24-hour]</div>
                </div>
              </div>

              <div class="col-lg-3 col-6">
                <div class="text-center">
                  <i class="icon-tv text-24 text-blue-1"></i>
                  <div class="text-15 lh-1 mt-10">Premium TV channels</div>
                </div>
              </div>

            </div>
          </div>

          <div id="overview" class="col-12">
            <h3 class="text-22 fw-500 pt-40 border-top-light">Overview</h3>
            <p class="text-dark-1 text-15 mt-20">
              <?= nl2br(htmlspecialchars($hotel['hotel_overview'])) ?>
            </p>
            <a href="#" class="d-block text-14 text-blue-1 fw-500 underline mt-10">Show More</a>
          </div>

          <div class="col-12">
            <h3 class="text-22 fw-500 pt-40 border-top-light">Most Popular Facilities</h3>
            <div class="row y-gap-10 pt-20">

              <div class="col-md-5">
                <div class="d-flex x-gap-15 y-gap-15 items-center">
                  <i class="icon-no-smoke"></i>
                  <div class="text-15">Non-smoking rooms</div>
                </div>
              </div>

              <div class="col-md-5">
                <div class="d-flex x-gap-15 y-gap-15 items-center">
                  <i class="icon-wifi"></i>
                  <div class="text-15">Free WiFi</div>
                </div>
              </div>

              <div class="col-md-5">
                <div class="d-flex x-gap-15 y-gap-15 items-center">
                  <i class="icon-parking"></i>
                  <div class="text-15">Parking</div>
                </div>
              </div>

              <div class="col-md-5">
                <div class="d-flex x-gap-15 y-gap-15 items-center">
                  <i class="icon-kitchen"></i>
                  <div class="text-15">Kitchen</div>
                </div>
              </div>

              <div class="col-md-5">
                <div class="d-flex x-gap-15 y-gap-15 items-center">
                  <i class="icon-living-room"></i>
                  <div class="text-15">Living Area</div>
                </div>
              </div>

              <div class="col-md-5">
                <div class="d-flex x-gap-15 y-gap-15 items-center">
                  <i class="icon-shield"></i>
                  <div class="text-15">Safety &amp; security</div>
                </div>
              </div>

            </div>
          </div>

          <div class="col-12">
            <div class="px-24 py-20 rounded-4 bg-green-1">
              <div class="row x-gap-20 y-gap-20 items-center">
                <div class="col-auto">
                  <div class="flex-center size-60 rounded-full bg-white">
                    <i class="icon-star text-yellow-1 text-30"></i>
                  </div>
                </div>

                <div class="col-auto">
                  <h4 class="text-18 lh-15 fw-500">This property is in high demand!</h4>
                  <div class="text-15 lh-15">7 travelers have booked today.</div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-xl-4">
        <div class="ml-50 lg:ml-0">
          <div class="px-30 py-30 border-light rounded-4 shadow-4">
            <div class="d-flex items-center justify-between">
              <div class="">
                <span class="text-20 fw-500">SAR <?= nl2br(htmlspecialchars($hotel['hotel_price'])) ?></span><span class="text-14 text-light-1 ml-5">/night</span>
              </div>

              <div class="d-flex items-center">


                <div class="size-40 flex-center bg-blue-1 rounded-4">
                  <div class="text-14 fw-600 text-white">4.8</div>
                </div>
              </div>
            </div>

          </div>

          <div class="px-30 py-30 border-light rounded-4 mt-30">
            <div class="flex-center ratio ratio-15:9 mb-15 js-lazy" data-bg="img/general/map.png">
              <button data-x-click="mapFilter" class="button py-15 px-24 -blue-1 bg-white text-dark-1 absolute">
                <i class="icon-location text-22 mr-10"></i>
                Show on map
              </button>
            </div>

            <div class="row y-gap-10">
              <div class="col-12">
                <div class="d-flex items-center">
                  <i class="icon-award text-20 text-blue-1"></i>
                  <div class="text-14 fw-500 ml-10">Exceptional location - Inside city center</div>
                </div>
              </div>

              <div class="col-12">
                <div class="d-flex items-center">
                  <i class="icon-pedestrian text-20 text-blue-1"></i>
                  <div class="text-14 fw-500 ml-10">Exceptional for walking</div>
                </div>
              </div>
            </div>

            <div class="border-top-light mt-15 mb-15"></div>

            <div class="text-15 fw-500">Popular landmarks</div>

            <div class="d-flex justify-between pt-10">
              <div class="text-14">Royal Pump Room Museum</div>
              <div class="text-14 text-light-1">0.1 km</div>
            </div>

            <div class="d-flex justify-between pt-5">
              <div class="text-14">Harrogate Turkish Baths</div>
              <div class="text-14 text-light-1">0.1 km</div>
            </div>

            <a href="#" class="d-block text-14 fw-500 underline text-blue-1 mt-10">Show More</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<div style="width:100%; ">
  <div style="display: flex;max-width:1320px;margin:auto; padding:20px">
    <input type="text" id="dateRange" placeholder="Select date range" required>
    <button id="checkAvailabilityBtn"   data-hotel-id="<?= $hotel['id'] ?>"  class="button h-50 px-24 bg-blue-1 text-white">Check Availability</button>
  </div>

</div>
<section id="rooms" class="pt-30">
  <div class="container">
    <div class="row pb-20">
      <div class="col-auto">
        <h3 class="text-22 fw-500">Available Rooms</h3>
      </div>
    </div>

    <div class="border-light rounded-4 px-30 py-30 sm:px-20 sm:py-20">
      <div class="row y-gap-20">
        <div class="col-12" style="padding: 0px !important;">
          <h3 class="text-18 fw-500 mb-15">Standard Twin Room</h3>
          <div class="roomGrid">
            <div class="roomGrid__header">
              <div>Room Type</div>
              <div>Benefits</div>
              <div>Sleeps</div>
              <div class="NumberofNIghts"></div>
              <div>Select Rooms</div>
              <div></div>
            </div>




            <?php if (!empty($rooms)): ?>
              <?php foreach ($rooms as $room): ?>

                <div class="y-gap-30" data-room-id="<?= $room['id'] ?>" style="  margin-top: 15px !important;border-bottom: 1px solid #8080805e !important;">

                  <div class="roomGrid__grid">

                    <div class="ratio ratio-1:1">
                      <img
                        src="<?= BASE_URL ?>/travel-panel/<?= htmlspecialchars($room['image_path']) ?>" alt="<?= htmlspecialchars($hotel['hotel_title']) ?>" class="img-ratio rounded-4" style="width: 160px;height:140px;object-fit:cover;position:relative;">
                      <h4><?= htmlspecialchars($room['room_title']) ?></h4>
                    </div>
                    <div class="roomGrid__content">
                      <div>
                        <div class="text-15 fw-500 mb-10">Your price includes:</div>

                        <div class="y-gap-8">

                          <div class="d-flex items-center text-green-2">
                            <i class="icon-check text-12 mr-10"></i>
                            <div class="text-15">Pay at the hotel</div>
                          </div>

                          <div class="d-flex items-center text-green-2">
                            <i class="icon-check text-12 mr-10"></i>
                            <div class="text-15">Pay nothing until March 30, 2022</div>
                          </div>

                          <div class="d-flex items-center text-green-2">
                            <i class="icon-check text-12 mr-10"></i>
                            <div class="text-15">Free cancellation before April 1, 2022</div>
                          </div>

                        </div>

                      </div>

                      <div>
                        <div class="d-flex items-center text-light-1">
                          <div class="icon-man text-24"></div>
                          <div class="icon-man text-24"></div>
                        </div>
                      </div>

                      <div>
                        <div class="text-18 lh-15 fw-500 room-price">US$72</div>
                        <div class="text-14 lh-18 text-light-1">Includes taxes and charges</div>
                      </div>


                      <div>

                        <div class="dropdown js-dropdown js-price-1-active">
                          <select class="room-quantity"></select>

                        </div>

                      </div>
                    </div>

                    <div>
                      <button href="#" data-modal-target="#modal-<?= $room['id'] ?>" class="button h-50 px-24 -dark-1 bg-blue-1 text-white mt-10">
                        Reserve <div class="icon-arrow-top-right ml-15"></div>
                      </button>


                      <div class="text-15 fw-500 mt-30">You'll be taken to the next step</div>

                      <ul class="list-disc y-gap-4 pt-5">

                        <li class="text-14">Confirmation is immediate</li>

                        <li class="text-14">No registration required</li>

                        <li class="text-14">No booking or credit card fees!</li>

                      </ul>
                    </div>


                    <div id="modal-<?= $room['id'] ?>" class="my-modal">
                      <div class="my-modal-content">
                        <button class="btn-close-modal" data-close-modal>&times;</button>
                        <div class="modal-header">
                          <h5 class="modal-title">Complete Your Booking</h5>
                        </div>
                        <div class="modal-body">
                          <form id="booking-form-<?= $room['id'] ?>" class="booking-form" data-room-id="<?= $room['id'] ?>">
                            <div class="row">
                              <div class="col-lg-12">
                                <!-- Booking Summary -->
                                <div class="booking-summary p-3 bg-light rounded mb-3">
                                  <h6 class="fw-bold">Booking Summary:</h6>
                                  <p class="mb-1"><strong>Room:</strong> <?= htmlspecialchars($room['room_title']) ?></p>
                                  <p class="mb-1"><strong>Dates:</strong> <span class="selected-dates">Not selected</span></p>
                                  <p class="mb-1"><strong>Rooms:</strong> <span class="selected-rooms">Not selected</span></p>
                                  <p class="mb-0"><strong>Total Price:</strong> <span class="display-total-price">$0</span></p>
                                </div>

                                <!-- Hidden Fields (auto-filled) -->
                                <input type="hidden" name="booking_room_id" value="<?= $room['id'] ?>">
                                <input type="hidden" name="hotel_id" value="<?= $hotel['id'] ?>">
                                <input type="hidden" name="date_range" class="hidden-date-range">
                                <input type="hidden" name="total_price" class="hidden-total-price" value="0">
                                <input type="hidden" name="number_of_rooms" class="hidden-room-count" value="0">

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
                          <button type="button" class="btn-book-now button -md -dark-1 bg-yellow-1 text-dark-1 mt-20" data-form-id="booking-form-<?= $room['id'] ?>">
                            Book Now
                          </button>
                        </div>
                      </div>
                    </div>

                  </div>
                </div>

              <?php endforeach; ?>
            <?php else: ?>
              <p>No rooms found for this hotel.</p>
            <?php endif; ?>



            <div class="y-gap-30" style="margin-top: 15px !important; border-bottom: 1px solid #8080805e !important;">

              <div class="roomGrid__grid">

                <div class="ratio ratio-1:1" style="width: 160px;height:160px;">
                  <img src="<?= BASE_URL ?>/assets/img/backgrounds/1.png" alt="image" class="img-ratio rounded-4">
                  <h4>
                    Deluxe Double Room
                  </h4>
                </div>
                <div class="roomGrid__content">
                  <div>
                    <div class="text-15 fw-500 mb-10">Your price includes:</div>

                    <div class="y-gap-8">

                      <div class="d-flex items-center text-green-2">
                        <i class="icon-check text-12 mr-10"></i>
                        <div class="text-15">Pay at the hotel</div>
                      </div>

                      <div class="d-flex items-center text-green-2">
                        <i class="icon-check text-12 mr-10"></i>
                        <div class="text-15">Pay nothing until March 30, 2022</div>
                      </div>

                      <div class="d-flex items-center text-green-2">
                        <i class="icon-check text-12 mr-10"></i>
                        <div class="text-15">Free cancellation before April 1, 2022</div>
                      </div>

                    </div>

                  </div>

                  <div>
                    <div class="d-flex items-center text-light-1">
                      <div class="icon-man text-24"></div>
                      <div class="icon-man text-24"></div>
                    </div>
                  </div>

                  <div>
                    <div class="text-18 lh-15 fw-500">US$72</div>
                    <div class="text-14 lh-18 text-light-1">Includes taxes and charges</div>
                  </div>


                  <div>

                    <div class="dropdown js-dropdown js-price-1-active">
                      <div class="dropdown__button d-flex items-center rounded-4 border-light px-15 h-50 text-14" data-el-toggle=".js-price-1-toggle" data-el-toggle-active=".js-price-1-active">
                        <span class="js-dropdown-title">1 (US$ 3,120)</span>
                        <i class="icon icon-chevron-sm-down text-7 ml-10"></i>
                      </div>

                      <div class="toggle-element -dropdown  js-click-dropdown js-price-1-toggle">
                        <div class="text-14 y-gap-15 js-dropdown-list">

                          <div><a href="#" class="d-block js-dropdown-link">2 (US$ 3,120)</a></div>

                          <div><a href="#" class="d-block js-dropdown-link">3 (US$ 3,120)</a></div>

                          <div><a href="#" class="d-block js-dropdown-link">4 (US$ 3,120)</a></div>

                          <div><a href="#" class="d-block js-dropdown-link">5 (US$ 3,120)</a></div>

                        </div>
                      </div>
                    </div>

                  </div>
                </div>

                <div>
                  <a href="#" class="button h-50 px-24 -dark-1 bg-blue-1 text-white mt-10">
                    Reserve <div class="icon-arrow-top-right ml-15"></div>
                  </a>


                  <div class="text-15 fw-500 mt-30">You'll be taken to the next step</div>

                  <ul class="list-disc y-gap-4 pt-5">

                    <li class="text-14">Confirmation is immediate</li>

                    <li class="text-14">No registration required</li>

                    <li class="text-14">No booking or credit card fees!</li>

                  </ul>
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




<div class="container">
  <div class="border-top-light mt-30"></div>
</div>

<div id="facilities"></div>
<section class="mt-40">
  <div class="container">
    <div class="row x-gap-40 y-gap-40">
      <div class="col-12">
        <h3 class="text-22 fw-500">Facilities of The Crown Hotel</h3>

        <div class="row x-gap-40 y-gap-40 pt-20">
          <div class="col-xl-4">
            <div class="row y-gap-30">
              <div class="col-12">

                <div class="">
                  <div class="d-flex items-center text-16 fw-500">
                    <i class="icon-bathtub text-20 mr-10"></i>
                    Bathroom
                  </div>

                  <ul class="text-15 pt-10">

                    <li class="d-flex items-center">
                      <i class="icon-check text-10 mr-20"></i>
                      Towels
                    </li>

                    <li class="d-flex items-center">
                      <i class="icon-check text-10 mr-20"></i>
                      Bath or shower
                    </li>

                    <li class="d-flex items-center">
                      <i class="icon-check text-10 mr-20"></i>
                      Private bathroom
                    </li>

                    <li class="d-flex items-center">
                      <i class="icon-check text-10 mr-20"></i>
                      Toilet
                    </li>

                    <li class="d-flex items-center">
                      <i class="icon-check text-10 mr-20"></i>
                      Free toiletries
                    </li>

                    <li class="d-flex items-center">
                      <i class="icon-check text-10 mr-20"></i>
                      Hairdryer
                    </li>

                    <li class="d-flex items-center">
                      <i class="icon-check text-10 mr-20"></i>
                      Bath
                    </li>

                  </ul>
                </div>

              </div>

              <div class="col-12">

                <div class="">
                  <div class="d-flex items-center text-16 fw-500">
                    <i class="icon-bed text-20 mr-10"></i>
                    Bedroom
                  </div>

                  <ul class="text-15 pt-10">

                    <li class="d-flex items-center">
                      <i class="icon-check text-10 mr-20"></i>
                      Linen
                    </li>

                    <li class="d-flex items-center">
                      <i class="icon-check text-10 mr-20"></i>
                      Wardrobe or closet
                    </li>

                  </ul>
                </div>

              </div>

              <div class="col-12">

                <div class="">
                  <div class="d-flex items-center text-16 fw-500">
                    <i class="icon-bell-ring text-20 mr-10"></i>
                    Reception services
                  </div>

                  <ul class="text-15 pt-10">

                    <li class="d-flex items-center">
                      <i class="icon-check text-10 mr-20"></i>
                      Invoice provided
                    </li>

                    <li class="d-flex items-center">
                      <i class="icon-check text-10 mr-20"></i>
                      Private check-in/check-out
                    </li>

                    <li class="d-flex items-center">
                      <i class="icon-check text-10 mr-20"></i>
                      Luggage storage
                    </li>

                    <li class="d-flex items-center">
                      <i class="icon-check text-10 mr-20"></i>
                      24-hour front desk
                    </li>

                  </ul>
                </div>

              </div>
            </div>
          </div>

          <div class="col-xl-4">
            <div class="row y-gap-30">
              <div class="col-12">

                <div class="">
                  <div class="d-flex items-center text-16 fw-500">
                    <i class="icon-tv text-20 mr-10"></i>
                    Media &amp; Technology
                  </div>

                  <ul class="text-15 pt-10">

                    <li class="d-flex items-center">
                      <i class="icon-check text-10 mr-20"></i>
                      Flat-screen TV
                    </li>

                    <li class="d-flex items-center">
                      <i class="icon-check text-10 mr-20"></i>
                      Satellite channels
                    </li>

                    <li class="d-flex items-center">
                      <i class="icon-check text-10 mr-20"></i>
                      Radio
                    </li>

                    <li class="d-flex items-center">
                      <i class="icon-check text-10 mr-20"></i>
                      Telephone
                    </li>

                    <li class="d-flex items-center">
                      <i class="icon-check text-10 mr-20"></i>
                      TV
                    </li>

                  </ul>
                </div>

              </div>

              <div class="col-12">

                <div class="">
                  <div class="d-flex items-center text-16 fw-500">
                    <i class="icon-juice text-20 mr-10"></i>
                    Food &amp; Drink
                  </div>

                  <ul class="text-15 pt-10">

                    <li class="d-flex items-center">
                      <i class="icon-check text-10 mr-20"></i>
                      Kid meals
                    </li>

                    <li class="d-flex items-center">
                      <i class="icon-check text-10 mr-20"></i>
                      Special diet menus (on request)
                    </li>

                    <li class="d-flex items-center">
                      <i class="icon-check text-10 mr-20"></i>
                      Breakfast in the room
                    </li>

                    <li class="d-flex items-center">
                      <i class="icon-check text-10 mr-20"></i>
                      Bar
                    </li>

                    <li class="d-flex items-center">
                      <i class="icon-check text-10 mr-20"></i>
                      Restaurant
                    </li>

                    <li class="d-flex items-center">
                      <i class="icon-check text-10 mr-20"></i>
                      Tea/Coffee maker
                    </li>

                  </ul>
                </div>

              </div>

              <div class="col-12">

                <div class="">
                  <div class="d-flex items-center text-16 fw-500">
                    <i class="icon-washing-machine text-20 mr-10"></i>
                    Cleaning services
                  </div>

                  <ul class="text-15 pt-10">

                    <li class="d-flex items-center">
                      <i class="icon-check text-10 mr-20"></i>
                      Daily housekeeping
                    </li>

                    <li class="d-flex items-center">
                      <i class="icon-check text-10 mr-20"></i>
                      Dry cleaning
                    </li>

                    <li class="d-flex items-center">
                      <i class="icon-check text-10 mr-20"></i>
                      Laundry
                    </li>

                  </ul>
                </div>

              </div>
            </div>
          </div>

          <div class="col-xl-4">
            <div class="row y-gap-30">
              <div class="col-12">

                <div class="">
                  <div class="d-flex items-center text-16 fw-500">
                    <i class="icon-shield text-20 mr-10"></i>
                    Safety &amp; security
                  </div>

                  <ul class="text-15 pt-10">

                    <li class="d-flex items-center">
                      <i class="icon-check text-10 mr-20"></i>
                      Fire extinguishers
                    </li>

                    <li class="d-flex items-center">
                      <i class="icon-check text-10 mr-20"></i>
                      CCTV in common areas
                    </li>

                    <li class="d-flex items-center">
                      <i class="icon-check text-10 mr-20"></i>
                      Smoke alarms
                    </li>

                    <li class="d-flex items-center">
                      <i class="icon-check text-10 mr-20"></i>
                      24-hour security
                    </li>

                  </ul>
                </div>

              </div>

              <div class="col-12">

                <div class="">
                  <div class="d-flex items-center text-16 fw-500">
                    <i class="icon-city-2 text-20 mr-10"></i>
                    General
                  </div>

                  <ul class="text-15 pt-10">

                    <li class="d-flex items-center">
                      <i class="icon-check text-10 mr-20"></i>
                      Hypoallergenic
                    </li>

                    <li class="d-flex items-center">
                      <i class="icon-check text-10 mr-20"></i>
                      Non-smoking throughout
                    </li>

                    <li class="d-flex items-center">
                      <i class="icon-check text-10 mr-20"></i>
                      Wake-up service
                    </li>

                    <li class="d-flex items-center">
                      <i class="icon-check text-10 mr-20"></i>
                      Heating
                    </li>

                    <li class="d-flex items-center">
                      <i class="icon-check text-10 mr-20"></i>
                      Packed lunches
                    </li>

                    <li class="d-flex items-center">
                      <i class="icon-check text-10 mr-20"></i>
                      Carpeted
                    </li>

                    <li class="d-flex items-center">
                      <i class="icon-check text-10 mr-20"></i>
                      Lift
                    </li>

                    <li class="d-flex items-center">
                      <i class="icon-check text-10 mr-20"></i>
                      Fan
                    </li>

                    <li class="d-flex items-center">
                      <i class="icon-check text-10 mr-20"></i>
                      Family rooms
                    </li>

                    <li class="d-flex items-center">
                      <i class="icon-check text-10 mr-20"></i>
                      Facilities for disabled guests
                    </li>

                    <li class="d-flex items-center">
                      <i class="icon-check text-10 mr-20"></i>
                      Ironing facilities
                    </li>

                    <li class="d-flex items-center">
                      <i class="icon-check text-10 mr-20"></i>
                      Non-smoking rooms
                    </li>

                    <li class="d-flex items-center">
                      <i class="icon-check text-10 mr-20"></i>
                      Iron
                    </li>

                    <li class="d-flex items-center">
                      <i class="icon-check text-10 mr-20"></i>
                      Room service
                    </li>

                  </ul>
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
      <div class="col-12">
        <div class="px-24 py-20 rounded-4 bg-light-2">
          <div class="row x-gap-20 y-gap-20 items-center">
            <div class="col-auto">
              <div class="flex-center size-60 rounded-full bg-white">
                <img src="<?= BASE_URL ?>/assets/img/icons/health.svg" alt="icon">
              </div>
            </div>

            <div class="col-auto">
              <h4 class="text-18 lh-15 fw-500">Extra health & safety measures</h4>
              <div class="text-15 lh-15">This property has taken extra health and hygiene measures to ensure that your safety is their priority</div>
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
      <div class="col-12">
        <h3 class="text-22 fw-500">Hotel surroundings</h3>
      </div>
    </div>

    <div class="row x-gap-50 y-gap-30 pt-20">
      <div class="col-lg-4 col-md-6">
        <div class="d-flex items-center">
          <i class="icon-nearby text-20 mr-10"></i>
          <div class="text-16 fw-500">What's nearby</div>
        </div>

        <div class="row y-gap-10 pt-10">

          <div class="col-12">
            <div class="row items-center justify-between">
              <div class="col-auto">
                <div class="text-15">Royal Pump Room Museum</div>
              </div>

              <div class="col-auto">
                <div class="text-15 text-right">0.1 km</div>
              </div>
            </div>
          </div>


          <div class="col-12">
            <div class="border-top-light"></div>
          </div>


          <div class="col-12">
            <div class="row items-center justify-between">
              <div class="col-auto">
                <div class="text-15">Harrogate Turkish Baths</div>
              </div>

              <div class="col-auto">
                <div class="text-15 text-right">0.1 km</div>
              </div>
            </div>
          </div>


          <div class="col-12">
            <div class="border-top-light"></div>
          </div>


          <div class="col-12">
            <div class="row items-center justify-between">
              <div class="col-auto">
                <div class="text-15">Royal Hall Theatre</div>
              </div>

              <div class="col-auto">
                <div class="text-15 text-right">0.1 km</div>
              </div>
            </div>
          </div>


          <div class="col-12">
            <div class="border-top-light"></div>
          </div>


          <div class="col-12">
            <div class="row items-center justify-between">
              <div class="col-auto">
                <div class="text-15">Harrogate Theatre</div>
              </div>

              <div class="col-auto">
                <div class="text-15 text-right">0.1 km</div>
              </div>
            </div>
          </div>


          <div class="col-12">
            <div class="border-top-light"></div>
          </div>


          <div class="col-12">
            <div class="row items-center justify-between">
              <div class="col-auto">
                <div class="text-15">Harrogate Library</div>
              </div>

              <div class="col-auto">
                <div class="text-15 text-right">0.1 km</div>
              </div>
            </div>
          </div>


          <div class="col-12">
            <div class="border-top-light"></div>
          </div>


          <div class="col-12">
            <div class="row items-center justify-between">
              <div class="col-auto">
                <div class="text-15">The Valley Gardens</div>
              </div>

              <div class="col-auto">
                <div class="text-15 text-right">0.1 km</div>
              </div>
            </div>
          </div>


          <div class="col-12">
            <div class="border-top-light"></div>
          </div>


          <div class="col-12">
            <div class="row items-center justify-between">
              <div class="col-auto">
                <div class="text-15">Harrogate District Hospital</div>
              </div>

              <div class="col-auto">
                <div class="text-15 text-right">0.1 km</div>
              </div>
            </div>
          </div>


        </div>
      </div>

      <div class="col-lg-4 col-md-6">
        <div class="mb-40 md:mb-30">
          <div class="d-flex items-center">
            <i class="icon-airplane text-20 mr-10"></i>
            <div class="text-16 fw-500">Closest airports</div>
          </div>

          <div class="row y-gap-10 pt-10">

            <div class="col-12">
              <div class="row items-center justify-between">
                <div class="col-auto">
                  <div class="text-15">Leeds Bradford International Airport</div>
                </div>

                <div class="col-auto">
                  <div class="text-15 text-right">57.9 km</div>
                </div>
              </div>
            </div>


            <div class="col-12">
              <div class="border-top-light"></div>
            </div>


            <div class="col-12">
              <div class="row items-center justify-between">
                <div class="col-auto">
                  <div class="text-15">Durham Tees Valley Airport</div>
                </div>

                <div class="col-auto">
                  <div class="text-15 text-right">57.9 km</div>
                </div>
              </div>
            </div>


            <div class="col-12">
              <div class="border-top-light"></div>
            </div>


            <div class="col-12">
              <div class="row items-center justify-between">
                <div class="col-auto">
                  <div class="text-15">Doncaster Sheffield Airport</div>
                </div>

                <div class="col-auto">
                  <div class="text-15 text-right">57.9 km</div>
                </div>
              </div>
            </div>


          </div>
        </div>

        <div class="">
          <div class="d-flex items-center">
            <i class="icon-food text-20 mr-10"></i>
            <div class="text-16 fw-500">Restaurants & cafes</div>
          </div>

          <div class="row y-gap-10 pt-10">

            <div class="col-12">
              <div class="row items-center justify-between">
                <div class="col-auto">
                  <div class="text-15">Cafe/bar Bettys Café Tea Rooms</div>
                </div>

                <div class="col-auto">
                  <div class="text-15 text-right">57.9 km</div>
                </div>
              </div>
            </div>


            <div class="col-12">
              <div class="border-top-light"></div>
            </div>


            <div class="col-12">
              <div class="row items-center justify-between">
                <div class="col-auto">
                  <div class="text-15">Cafe/bar Bettys Café Tea Rooms</div>
                </div>

                <div class="col-auto">
                  <div class="text-15 text-right">57.9 km</div>
                </div>
              </div>
            </div>


          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6">
        <div class="">
          <div class="d-flex items-center">
            <i class="icon-ticket text-20 mr-10"></i>
            <div class="text-16 fw-500">Top attractions</div>
          </div>

          <div class="row y-gap-10 pt-10">

            <div class="col-12">
              <div class="row items-center justify-between">
                <div class="col-auto">
                  <div class="text-15">Ripley Castle</div>
                </div>

                <div class="col-auto">
                  <div class="text-15 text-right">57.9 km</div>
                </div>
              </div>
            </div>


            <div class="col-12">
              <div class="border-top-light"></div>
            </div>


            <div class="col-12">
              <div class="row items-center justify-between">
                <div class="col-auto">
                  <div class="text-15">Roundhay Park</div>
                </div>

                <div class="col-auto">
                  <div class="text-15 text-right">57.9 km</div>
                </div>
              </div>
            </div>


            <div class="col-12">
              <div class="border-top-light"></div>
            </div>


            <div class="col-12">
              <div class="row items-center justify-between">
                <div class="col-auto">
                  <div class="text-15">Bramham Park</div>
                </div>

                <div class="col-auto">
                  <div class="text-15 text-right">57.9 km</div>
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
      <div class="row">
        <div class="col-12">
          <h3 class="text-22 fw-500">Some helpful facts</h3>
        </div>
      </div>

      <div class="row x-gap-50 y-gap-30 pt-20">
        <div class="col-lg-4 col-md-6">
          <div class="">
            <div class="d-flex items-center">
              <i class="icon-calendar text-20 mr-10"></i>
              <div class="text-16 fw-500">Check-in/Check-out</div>
            </div>

            <div class="row x-gap-50 y-gap-5 pt-10">

              <div class="col-12">
                <div class="text-15">Check-in from: 16:00</div>
              </div>

              <div class="col-12">
                <div class="text-15">Check-out until: 12:00</div>
              </div>

              <div class="col-12">
                <div class="text-15">Reception open until: 00:00</div>
              </div>

            </div>
          </div>

          <div class="mt-30">
            <div class="d-flex items-center">
              <i class="icon-location-pin text-20 mr-10"></i>
              <div class="text-16 fw-500">Getting around</div>
            </div>

            <div class="row x-gap-50 y-gap-5 pt-10">

              <div class="col-12">
                <div class="text-15">Airport transfer fee: 60 USD</div>
              </div>

              <div class="col-12">
                <div class="text-15">Distance from city center: 2 km</div>
              </div>

              <div class="col-12">
                <div class="text-15">Travel time to airport (minutes): 45</div>
              </div>

            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6">
          <div class="">
            <div class="d-flex items-center">
              <i class="icon-ticket text-20 mr-10"></i>
              <div class="text-16 fw-500">Extras</div>
            </div>

            <div class="row x-gap-50 y-gap-5 pt-10">

              <div class="col-12">
                <div class="text-15">Breakfast charge (unless included in room price): 25 USD</div>
              </div>

              <div class="col-12">
                <div class="text-15">Daily Internet/Wi-Fi fee: 10 USD</div>
              </div>

            </div>
          </div>

          <div class="mt-30">
            <div class="d-flex items-center">
              <i class="icon-parking text-20 mr-10"></i>
              <div class="text-16 fw-500">Parking</div>
            </div>

            <div class="row x-gap-50 y-gap-5 pt-10">

              <div class="col-12">
                <div class="text-15">Daily parking fee: 65 USD</div>
              </div>

            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6">
          <div class="">
            <div class="d-flex items-center">
              <i class="icon-plans text-20 mr-10"></i>
              <div class="text-16 fw-500">The property</div>
            </div>

            <div class="row x-gap-50 y-gap-5 pt-10">

              <div class="col-12">
                <div class="text-15">Non-smoking rooms/floors: Yes</div>
              </div>

              <div class="col-12">
                <div class="text-15">Number of bars/lounges: 1</div>
              </div>

              <div class="col-12">
                <div class="text-15">Number of floors: 26</div>
              </div>

              <div class="col-12">
                <div class="text-15">Number of restaurants: 1</div>
              </div>

              <div class="col-12">
                <div class="text-15">Number of rooms : 443</div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section id="faq" class="pt-40 layout-pb-md">
  <div class="container">
    <div class="pt-40 border-top-light">
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
  </div>
</section>

<section class="layout-pt-md layout-pb-lg">
  <div class="container">
    <div class="row justify-center text-center">
      <div class="col-auto">
        <div class="sectionTitle -md">
          <h2 class="sectionTitle__title">Popular properties similar to The Crown Hotel</h2>
          <p class=" sectionTitle__text mt-5 sm:mt-0">Interdum et malesuada fames ac ante ipsum</p>
        </div>
      </div>
    </div>

    <div class="row y-gap-30 pt-40 sm:pt-20">

      <div class="col-xl-3 col-lg-3 col-sm-6">

        <a href="hotel-single-1.html" class="hotelsCard -type-1 ">
          <div class="hotelsCard__image">

            <div class="cardImage ratio ratio-1:1">
              <div class="cardImage__content">

                <img class="rounded-4 col-12" src="<?= BASE_URL ?>/assets/img/hotels/1.png" alt="image">


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

      <div class="col-xl-3 col-lg-3 col-sm-6">

        <a href="hotel-single-1.html" class="hotelsCard -type-1 ">
          <div class="hotelsCard__image">

            <div class="cardImage ratio ratio-1:1">
              <div class="cardImage__content">


                <div class="cardImage-slider rounded-4 overflow-hidden js-cardImage-slider">
                  <div class="swiper-wrapper">

                    <div class="swiper-slide">
                      <img class="col-12" src="<?= BASE_URL ?>/assets/img/hotels/2.png" alt="image">
                    </div>

                    <div class="swiper-slide">
                      <img class="col-12" src="<?= BASE_URL ?>/assets/img/hotels/1.png" alt="image">
                    </div>

                    <div class="swiper-slide">
                      <img class="col-12" src="<?= BASE_URL ?>/assets/img/hotels/3.png" alt="image">
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

      <div class="col-xl-3 col-lg-3 col-sm-6">

        <a href="hotel-single-1.html" class="hotelsCard -type-1 ">
          <div class="hotelsCard__image">

            <div class="cardImage ratio ratio-1:1">
              <div class="cardImage__content">

                <img class="rounded-4 col-12" src="<?= BASE_URL ?>/assets/img/hotels/3.png" alt="image">


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

      <div class="col-xl-3 col-lg-3 col-sm-6">

        <a href="hotel-single-1.html" class="hotelsCard -type-1 ">
          <div class="hotelsCard__image">

            <div class="cardImage ratio ratio-1:1">
              <div class="cardImage__content">

                <img class="rounded-4 col-12" src="<?= BASE_URL ?>/assets/img/hotels/4.png" alt="image">


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







<section class="layout-pt-md layout-pb-md bg-dark-2">
  <div class="container">
    <div class="row y-gap-30 justify-between items-center">
      <div class="col-auto">
        <div class="row y-gap-20  flex-wrap items-center">
          <div class="col-auto">
            <div class="icon-newsletter text-60 sm:text-40 text-white"></div>
          </div>

          <div class="col-auto">
            <h4 class="text-26 text-white fw-600">Your Travel Journey Starts Here</h4>
            <div class="text-white">Sign up and we'll send the best deals to you</div>
          </div>
        </div>
      </div>

      <div class="col-auto">
        <div class="single-field -w-410 d-flex x-gap-10 y-gap-20">
          <div>
            <input class="bg-white h-60" type="text" placeholder="Your Email">
          </div>

          <div>
            <button class="button -md h-60 bg-blue-1 text-white">Subscribe</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- GLightbox CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css" />

<!-- GLightbox JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/glightbox/dist/js/glightbox.min.js"></script>

<script>
  /* Masonry */
  var masonryFolio = function() {
    var containerBricks = $(".masonry");

    containerBricks.imagesLoaded(function() {
      containerBricks.masonry({
        itemSelector: ".masonry_block",
        resize: true
      });
    });
  };

  /* glightbox
   */
  var glightbox = GLightbox({
    loop: true,
    selector: ".glightbox",
    openEffect: "zoom",
    closeEffect: "fade",
    startAt: 0,
    closeOnOutsideClick: false,
    zoomable: true,
    height: "auto",
    width: "100vw",
    height: "100vh"
  });

  feather.replace()
</script>
<!-- <script>
  document.addEventListener("DOMContentLoaded", function() {
    // --- Initialize flatpickr for date range ---
    flatpickr("#dateRange", {
      mode: "range",
      dateFormat: "Y-m-d",
      minDate: "today",
      onChange: function(selectedDates) {
        if (selectedDates.length === 2) {
          const checkIn = selectedDates[0];
          const checkOut = selectedDates[1];
          const timeDiff = Math.abs(checkOut - checkIn);
          const nights = Math.ceil(timeDiff / (1000 * 60 * 60 * 24));

          // 💤 Update the Number of Nights section
          const nightsEl = document.querySelector(".NumberofNIghts");
          if (nightsEl) {
            nightsEl.textContent = `${nights} night${nights > 1 ? "s" : ""}`;
          }
        }
      }
    });

    // --- Handle Check Availability ---
    const checkBtn = document.getElementById("checkAvailabilityBtn");
    const dateRangeInput = document.getElementById("dateRange");

    checkBtn.addEventListener("click", function() {
      const dateRange = dateRangeInput.value.trim();
      const hotelId = <?= json_encode($hotel['id']) ?>; // PHP hotel ID

      if (!dateRange) {
        alert("Please select a date range first.");
        return;
      }

      // Send AJAX request
      fetch("/hotels/fetch_room_prices.php", {
          method: "POST",
          headers: {
            "Content-Type": "application/x-www-form-urlencoded"
          },
          body: new URLSearchParams({
            hotel_id: hotelId,
            dateRange: dateRange
          })
        })
        .then(response => response.json())
        .then(data => {
          if (!data.success) {
            alert("No price data found for selected dates.");
            return;
          }

          // Update room prices dynamically
          data.prices.forEach(room => {
            const priceEl = document.querySelector(`[data-room-id="${room.id}"] .room-price`);
            const selectEl = document.querySelector(`[data-room-id="${room.id}"] .room-quantity`);
            if (priceEl) {
              priceEl.textContent = `US$${room.total_price}`;
            }

            // Clear old options
            if (selectEl) {
              selectEl.innerHTML = "";

              // Add room count options (1–5)
              for (let i = 1; i <= 5; i++) {
                const opt = document.createElement("option");
                const totalForRooms = room.total_price * i;
                opt.value = i;
                opt.textContent = `${i} Room(s) — US$${totalForRooms}`;
                selectEl.appendChild(opt);
              }
            }
          });
        })
        .catch(err => {
          console.error("Error fetching room prices:", err);
        });
    });
  });
</script> -->
<script>
// Hotel Detail Page - Complete Fixed JavaScript
document.addEventListener("DOMContentLoaded", function() {

    // ==========================================
    // 1. INITIALIZE FLATPICKR FOR DATE RANGE
    // ==========================================
    const dateRangeInput = document.getElementById('dateRange');
    let flatpickrInstance = null;
    
    if (dateRangeInput) {
        flatpickrInstance = flatpickr(dateRangeInput, {
            mode: "range",
            dateFormat: "Y-m-d",
            minDate: "today",
            onChange: function(selectedDates) {
                if (selectedDates.length === 2) {
                    const checkIn = selectedDates[0];
                    const checkOut = selectedDates[1];
                    const timeDiff = Math.abs(checkOut - checkIn);
                    const nights = Math.ceil(timeDiff / (1000 * 60 * 60 * 24));

                    // Update the Number of Nights section
                    const nightsEl = document.querySelector(".NumberofNIghts");
                    if (nightsEl) {
                        nightsEl.textContent = `${nights} night${nights > 1 ? "s" : ""}`;
                    }
                }
            }
        });
    }

    // ==========================================
    // 2. CHECK AND APPLY URL PARAMETERS
    // ==========================================
    function checkAndApplyURLParams() {
        const urlParams = new URLSearchParams(window.location.search);
        
        const dateRange = urlParams.get('dates');
        const numRooms = urlParams.get('rooms');
        
        let paramsApplied = false;
        
        // Apply date range if present
        if (dateRange && flatpickrInstance) {
            const dates = dateRange.split(' to ');
            if (dates.length === 2) {
                flatpickrInstance.setDate([dates[0], dates[1]], true);
                paramsApplied = true;
            }
        }
        
        // Apply number of rooms if present
        if (numRooms) {
            const roomCount = parseInt(numRooms);
            if (roomCount > 0) {
                const adultCountDisplay = document.getElementById('adultCount');
                const passengerCountDisplay = document.getElementById('passengerCountDisplay');
                
                if (adultCountDisplay) {
                    adultCountDisplay.textContent = roomCount;
                }
                if (passengerCountDisplay) {
                    passengerCountDisplay.textContent = roomCount;
                }
                
                paramsApplied = true;
            }
        }
        
        // If params were applied, auto-trigger price calculation
        if (paramsApplied && dateRange) {
            setTimeout(() => {
                triggerPriceCalculation();
            }, 500);
        }
    }
    
    function triggerPriceCalculation() {
        const checkAvailabilityBtn = document.getElementById('checkAvailabilityBtn');
        if (checkAvailabilityBtn) {
            checkAvailabilityBtn.click();
        }
    }

    // Call URL params check
    checkAndApplyURLParams();

    // ==========================================
    // 3. CHECK AVAILABILITY BUTTON HANDLER
    // ==========================================
    const checkBtn = document.getElementById("checkAvailabilityBtn");

    if (checkBtn) {
        checkBtn.addEventListener("click", function() {
            const dateRange = dateRangeInput.value.trim();
            const hotelId = parseInt(document.querySelector('[data-hotel-id]')?.dataset.hotelId) || 
                           parseInt(checkBtn.dataset.hotelId);

            if (!dateRange) {
                alert("Please select a date range first.");
                return;
            }

            // Show loading state
            checkBtn.disabled = true;
            checkBtn.textContent = 'Loading...';

            // Send AJAX request
            fetch('<?= BASE_URL ?>/hotels/fetch_room_prices.php', {
                method: "POST",
                headers: {
                    "Content-Type": "application/x-www-form-urlencoded"
                },
                body: new URLSearchParams({
                    hotel_id: hotelId,
                    dateRange: dateRange
                })
            })
            .then(response => response.json())
            .then(data => {
                if (!data.success) {
                    alert("No price data found for selected dates.");
                    return;
                }

                // Update room prices dynamically
                data.prices.forEach(room => {
                    const roomContainer = document.querySelector(`[data-room-id="${room.id}"]`);
                    if (!roomContainer) return;

                    const priceEl = roomContainer.querySelector('.room-price');
                    const selectEl = roomContainer.querySelector('.room-quantity');
                    
                    if (priceEl) {
                        priceEl.textContent = `US$${room.total_price}`;
                    }

                    // Populate room quantity dropdown
                    if (selectEl) {
                        selectEl.innerHTML = "";

                        for (let i = 1; i <= 5; i++) {
                            const opt = document.createElement("option");
                            const totalForRooms = room.total_price * i;
                            opt.value = i;
                            opt.textContent = `${i} Room(s) - US$${totalForRooms}`;
                            opt.dataset.unitPrice = room.total_price;
                            opt.dataset.totalPrice = totalForRooms;
                            selectEl.appendChild(opt);
                        }

                        // Add change event to update modal when rooms selected
                        selectEl.addEventListener('change', function() {
                            updateModalPrices(room.id, this);
                        });
                    }
                });
            })
            .catch(err => {
                console.error("Error fetching room prices:", err);
                alert("Error fetching prices. Please try again.");
            })
            .finally(() => {
                checkBtn.disabled = false;
                checkBtn.textContent = 'Check Availability';
            });
        });
    }

    // ==========================================
    // 4. MODAL FUNCTIONALITY
    // ==========================================
    
    // Open modal
    document.addEventListener('click', e => {
        const trigger = e.target.closest('[data-modal-target]');
        if (trigger) {
            const targetSelector = trigger.getAttribute('data-modal-target');
            const modal = document.querySelector(targetSelector);
            if (modal) {
                // Get room data before opening modal
                const roomContainer = trigger.closest('[data-room-id]');
                if (roomContainer) {
                    updateModalData(modal, roomContainer);
                }
                
                modal.classList.add('active');
                document.body.style.overflow = 'hidden';
            }
        }

        // Close modal
        if (e.target.closest('[data-close-modal]') || e.target.classList.contains('my-modal')) {
            const activeModal = document.querySelector('.my-modal.active');
            if (activeModal) {
                activeModal.classList.remove('active');
                document.body.style.overflow = '';
            }
        }
    });

    // ESC key to close modal
    document.addEventListener('keydown', e => {
        if (e.key === 'Escape') {
            const activeModal = document.querySelector('.my-modal.active');
            if (activeModal) {
                activeModal.classList.remove('active');
                document.body.style.overflow = '';
            }
        }
    });

    // ==========================================
    // 5. UPDATE MODAL DATA
    // ==========================================
    function updateModalData(modal, roomContainer) {
        const roomId = roomContainer.dataset.roomId;
        const roomTitle = roomContainer.querySelector('h4')?.textContent || 'Room';
        const roomPrice = roomContainer.querySelector('.room-price')?.textContent || '$0';
        const selectEl = roomContainer.querySelector('.room-quantity');
        const dateRange = dateRangeInput.value;

        // Update booking summary in modal
        const summaryDateEl = modal.querySelector('.selected-dates');
        const summaryRoomsEl = modal.querySelector('.selected-rooms');
        const summaryPriceEl = modal.querySelector('.display-total-price');

        if (summaryDateEl) {
            summaryDateEl.textContent = dateRange || 'Not selected';
        }

        if (selectEl && summaryRoomsEl) {
            const selectedOption = selectEl.options[selectEl.selectedIndex];
            const numRooms = selectedOption?.value || '1';
            summaryRoomsEl.textContent = `${numRooms} room(s)`;
        }

        if (summaryPriceEl && selectEl) {
            const selectedOption = selectEl.options[selectEl.selectedIndex];
            const totalPrice = selectedOption?.dataset.totalPrice || '0';
            summaryPriceEl.textContent = `US$${totalPrice}`;
        }

        // Update hidden fields
        const hiddenDateRange = modal.querySelector('.hidden-date-range');
        const hiddenTotalPrice = modal.querySelector('.hidden-total-price');
        const hiddenRoomCount = modal.querySelector('.hidden-room-count');

        if (hiddenDateRange) {
            hiddenDateRange.value = dateRange;
        }

        if (hiddenTotalPrice && selectEl) {
            const selectedOption = selectEl.options[selectEl.selectedIndex];
            hiddenTotalPrice.value = selectedOption?.dataset.totalPrice || '0';
        }

        if (hiddenRoomCount && selectEl) {
            hiddenRoomCount.value = selectEl.value || '1';
        }
    }

    // ==========================================
    // 6. UPDATE MODAL PRICES WHEN ROOM COUNT CHANGES
    // ==========================================
    function updateModalPrices(roomId, selectEl) {
        const modal = document.querySelector(`#modal-${roomId}`);
        if (!modal) return;

        const selectedOption = selectEl.options[selectEl.selectedIndex];
        const numRooms = selectedOption?.value || '1';
        const totalPrice = selectedOption?.dataset.totalPrice || '0';

        const summaryRoomsEl = modal.querySelector('.selected-rooms');
        const summaryPriceEl = modal.querySelector('.display-total-price');
        const hiddenTotalPrice = modal.querySelector('.hidden-total-price');
        const hiddenRoomCount = modal.querySelector('.hidden-room-count');

        if (summaryRoomsEl) {
            summaryRoomsEl.textContent = `${numRooms} room(s)`;
        }

        if (summaryPriceEl) {
            summaryPriceEl.textContent = `US$${totalPrice}`;
        }

        if (hiddenTotalPrice) {
            hiddenTotalPrice.value = totalPrice;
        }

        if (hiddenRoomCount) {
            hiddenRoomCount.value = numRooms;
        }
    }

    // ==========================================
    // 7. HANDLE BOOKING FORM SUBMISSION
    // ==========================================
    const bookNowButtons = document.querySelectorAll('.btn-book-now');

    bookNowButtons.forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();

            const formId = this.dataset.formId;
            const form = document.getElementById(formId);
            
            if (!form) return;

            const formData = new FormData(form);

            // Validate required fields
            const name = formData.get('booking_name');
            const email = formData.get('booking_email');
            const phone = formData.get('booking_phone');
            const dateRange = formData.get('date_range');

            if (!name || !email || !phone) {
                showMessage(form, 'Please fill in all required fields', 'error');
                return;
            }

            if (!dateRange) {
                showMessage(form, 'Please select dates first', 'error');
                return;
            }

            // Disable button
            this.disabled = true;
            this.textContent = 'Processing...';

            // Submit booking
            fetch('process_booking.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    showMessage(form, data.message, 'success');
                    setTimeout(() => {
                        form.reset();
                        const modal = form.closest('.my-modal');
                        if (modal) {
                            modal.classList.remove('active');
                            document.body.style.overflow = '';
                        }
                        location.reload();
                    }, 2000);
                } else {
                    showMessage(form, data.message, 'error');
                }
            })
            .catch(error => {
                showMessage(form, 'An error occurred. Please try again.', 'error');
                console.error('Error:', error);
            })
            .finally(() => {
                this.disabled = false;
                this.textContent = 'Book Now';
            });
        });
    });

    // ==========================================
    // 8. SHOW MESSAGE FUNCTION
    // ==========================================
    function showMessage(form, message, type) {
        const alertDiv = form.querySelector('.alert-message');
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







<?php include '../includes/footer.php'; ?>