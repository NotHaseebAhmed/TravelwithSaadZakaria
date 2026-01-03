<?php
include_once __DIR__ . '/../travel-panel/includes/connection.php';

$pickup     = $_GET['pickup']     ?? '';
$dropoff    = $_GET['dropoff']    ?? '';
$passengers = $_GET['passengers'] ?? 0;

$sql = "
    SELECT 
        c.id,
        c.car_rental_title,
        c.car_rental_slug,
        c.car_rental_price,
        c.car_capacity,
        r.pickup_location,
        r.dropoff_location,
        (
            SELECT GROUP_CONCAT(image_path ORDER BY id ASC)
            FROM car_rentals_images 
            WHERE car_rental_id = c.id
        ) AS image_paths
    FROM car_rentals c
    LEFT JOIN car_rentals_routes r ON c.route_id = r.id
    WHERE 1=1
";

if ($pickup !== "") {
    $sql .= " AND r.pickup_location = '" . $conn->real_escape_string($pickup) . "' ";
}

if ($dropoff !== "") {
    $sql .= " AND r.dropoff_location LIKE '%" . $conn->real_escape_string($dropoff) . "%' ";
}

if ($passengers > 0) {
    $sql .= " AND CAST(SUBSTRING_INDEX(c.car_capacity, '-', -1) AS UNSIGNED) >= " . intval($passengers);
}

$sql .= " ORDER BY c.id DESC";

$result = $conn->query($sql);

if ($result->num_rows === 0) {
    echo "<div class='text-center text-danger text-18'>No cars found</div>";
    return;
}

while ($row = $result->fetch_assoc()) {
    $images = explode(",", $row['image_paths']);
    $firstImage = $images[0] ?? "no-image.jpg";

    echo '
    <div class="col-12">
    <div class="border-top-light pt-30">
        <div class="row x-gap-20 y-gap-20">

            <div class="col-md-auto">
                <div class="relative d-flex">

                    <div class="cardImage ratio ratio-1:1 w-250 md:w-1/1 rounded-4">
                        <div class="cardImage__content">
                            <img class="rounded-4 col-12" src="/travel-panel/assets/uploads/car-rentals/' . $firstImage . '" alt="' . htmlspecialchars($row['car_rental_title']) . '">
                        </div>

                        <div class="cardImage__wishlist">
                            <button class="button -blue-1 bg-white size-30 rounded-full shadow-2">
                                <i class="icon-heart text-12"></i>
                            </button>
                        </div>
                    </div>

                    <div class="absolute h-full col-12 d-flex items-end px-10 py-15">
                        <img src="/assets/img/lists/car/1/badge.png" alt="badge">                    </div>

                </div>
            </div>

            <div class="col-md">
                <div class="d-flex flex-column h-full justify-between">

                    <div>
                        <div class="row x-gap-5 items-center">
                            <div class="col-auto">
                                <div class="text-14 text-light-1">Heathrow Airport</div>
                            </div>
                            <div class="col-auto">
                                <div class="size-3 rounded-full bg-light-1"></div>
                            </div>
                            <div class="col-auto">
                                <div class="text-14 text-light-1">SUV</div>
                            </div>
                        </div>

                        <h3 class="text-18 lh-16 fw-500 mt-5">
                            ' . htmlspecialchars($row['car_rental_title']) . '
                            <span class="text-15 text-light-1">or similar</span>
                        </h3>
                    </div>

                    <div class="col-lg-7 mt-20">
                        <div class="row y-gap-5">

                            <div class="col-sm-6">
                                <div class="d-flex items-center"><i class="icon-user-2"></i>
                                    <div class="text-14 ml-10">4</div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="d-flex items-center"><i class="icon-luggage"></i>
                                    <div class="text-14 ml-10">1</div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="d-flex items-center"><i class="icon-transmission"></i>
                                    <div class="text-14 ml-10">Automatic</div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="d-flex items-center"><i class="icon-speedometer"></i>
                                    <div class="text-14 ml-10">Unlimited</div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="d-flex items-center"><i class="icon-transmission"></i>
                                    <div class="text-14 ml-10">Air conditioning</div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="d-flex items-center"><i class="icon-speedometer"></i>
                                    <div class="text-14 ml-10">Full to full</div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="mt-20">
                        <div class="d-flex items-center">
                            <i class="icon-check text-10"></i>
                            <div class="text-14 fw-500 ml-10">Free Amendments</div>
                        </div>
                        <div class="d-flex items-center mt-5">
                            <i class="icon-check text-10"></i>
                            <div class="text-14 fw-500 text-green-2 ml-10">Free Cancellation</div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-md-auto text-right md:text-left">
                <div class="row x-gap-10 y-gap-10 justify-end items-center md:justify-start">
                    <div class="col-auto">
                        <div class="text-14 lh-14 fw-500">Exceptional</div>
                        <div class="text-14 lh-14 text-light-1">3,014 reviews</div>
                    </div>
                    <div class="col-auto">
                        <div class="flex-center text-dark-1 fw-600 text-14 size-40 rounded-4 bg-yellow-1">4.8</div>
                    </div>
                </div>

                <div class="text-22 lh-12 fw-600 mt-70 md:mt-20">
                    $' . htmlspecialchars($row['car_rental_price']) . '
                </div>
                <div class="text-14 text-light-1 mt-5">Total</div>

                <a href="car-rental-detail.php?slug=' . htmlspecialchars($row['car_rental_slug']) . '" class="button h-50 px-24 bg-dark-1 -yellow-1 text-white mt-24">
                    View Detail <div class="icon-arrow-top-right ml-15"></div>
                </a>
            </div>

        </div>
    </div>
    
</div>
    ';
}
?>
