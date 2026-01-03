<?php 
include '../includes/header.php';
include_once __DIR__ . '/../travel-panel/includes/connection.php';

// GET FILTER PARAMETERS FROM URL
$filter_package_type = isset($_GET['package_type']) ? trim($_GET['package_type']) : '';
$filter_total_days = isset($_GET['total_days']) ? intval($_GET['total_days']) : 0;
?>

<section class="pt-40 pb-40 bg-light-2">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="text-center">
                    <h1 class="text-30 fw-600">Umrah Packages</h1>
                    <?php if ($filter_package_type || $filter_total_days): ?>
                        <p class="text-15 text-light-1 mt-10">
                            Filtered by: 
                            <?php if ($filter_package_type): ?>
                                <span class="badge bg-blue-1 text-white"><?= htmlspecialchars($filter_package_type) ?></span>
                            <?php endif; ?>
                            <?php if ($filter_total_days): ?>
                                <span class="badge bg-blue-1 text-white"><?= $filter_total_days ?> Days</span>
                            <?php endif; ?>
                        </p>
                    <?php endif; ?>
                </div>

                <div class="mainSearch -col-3-big bg-white px-10 py-10 lg:px-20 lg:pt-5 lg:pb-20 rounded-4 mt-30">
                    <div class="button-grid items-center" style="grid-template-columns: 0.6fr 0.6fr 0.6fr auto;">

                        <!-- Package Type Dropdown -->
                        <div class="px-30 lg:py-20 lg:px-0">
                            <label for="package-type-filter" class="text-15 fw-500 mb-10">Choose Package Type</label>
                            <select id="package-type-filter" class="form-control" style="height: 50px; border: 1px solid #e5e5e5; border-radius: 4px; padding: 0 15px;">
                                <option value="all">All</option>
                                <!-- Options loaded by JS -->
                            </select>
                        </div>

                        <!-- Days of Visit Dropdown -->
                        <div class="px-30 lg:py-20 lg:px-0">
                            <label for="days-filter" class="text-15 fw-500 mb-10">Choose Days of Visit</label>
                            <select id="days-filter" class="form-control" style="height: 50px; border: 1px solid #e5e5e5; border-radius: 4px; padding: 0 15px;">
                                <option value="0">All</option>
                                <!-- Options loaded by JS -->
                            </select>
                        </div>

                        <!-- Search Button -->
                        <div class="button-item">
                            <button id="umrah-search-btn" class="mainSearch__submit button -dark-1 py-15 px-40 col-12 rounded-4 bg-blue-1 text-white">
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
            <!-- SIDEBAR -->
            <div class="col-xl-3 col-lg-4 lg:d-none">
                <aside class="sidebar y-gap-40">
                    <div class="sidebar__item -no-border">
                        <h5 class="text-18 fw-500 mb-10">Packages Types</h5>
                        <div class="sidebar-checkbox">
                            <div class="row y-gap-10 items-center justify-between">
                                <div class="col-auto">
                                    <div class="d-flex items-center">
                                        <div class="form-checkbox">
                                            <input type="checkbox" name="name">
                                            <div class="form-checkbox__mark">
                                                <div class="form-checkbox__icon icon-check"></div>
                                            </div>
                                        </div>
                                        <div class="text-15 ml-10">Premium Packages</div>
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
                                            <input type="checkbox" name="name">
                                            <div class="form-checkbox__mark">
                                                <div class="form-checkbox__icon icon-check"></div>
                                            </div>
                                        </div>
                                        <div class="text-15 ml-10">Business</div>
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
                                            <input type="checkbox" name="name">
                                            <div class="form-checkbox__mark">
                                                <div class="form-checkbox__icon icon-check"></div>
                                            </div>
                                        </div>
                                        <div class="text-15 ml-10">Economy</div>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <div class="text-15 text-light-1">21</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="sidebar__item">
                        <h5 class="text-18 fw-500 mb-10">Duration</h5>
                        <div class="sidebar-checkbox">
                            <div class="row y-gap-10 items-center justify-between">
                                <div class="col-auto">
                                    <div class="d-flex items-center">
                                        <div class="form-checkbox">
                                            <input type="checkbox" name="name">
                                            <div class="form-checkbox__mark">
                                                <div class="form-checkbox__icon icon-check"></div>
                                            </div>
                                        </div>
                                        <div class="text-15 ml-10">20 Days</div>
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
                                            <input type="checkbox" name="name">
                                            <div class="form-checkbox__mark">
                                                <div class="form-checkbox__icon icon-check"></div>
                                            </div>
                                        </div>
                                        <div class="text-15 ml-10">30 Days</div>
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
                                            <input type="checkbox" name="name">
                                            <div class="form-checkbox__mark">
                                                <div class="form-checkbox__icon icon-check"></div>
                                            </div>
                                        </div>
                                        <div class="text-15 ml-10">15 Days</div>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <div class="text-15 text-light-1">21</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </aside>
            </div>

            <!-- MAIN CONTENT -->
            <div class="col-xl-9 col-lg-8">
                <!-- Mobile Filter Popup -->
                <div class="filterPopup bg-white" data-x="filterPopup" data-x-toggle="-is-active">
                    <aside class="sidebar -mobile-filter">
                        <div data-x-click="filterPopup" class="-icon-close">
                            <i class="icon-close"></i>
                        </div>
                        <!-- Add mobile filter content here if needed -->
                    </aside>
                </div>

                <div class="mt-30"></div>

                <!-- RESULTS SECTION -->
                <div class="row y-gap-30" id="packages-results">
                    <?php
                    // BUILD QUERY WITH FILTERS
                    $query_sql = "
                        SELECT 
                            up.*,
                            mh.hotel_title AS makkah_hotel,
                            mdh.hotel_title AS madinah_hotel
                        FROM umrah_packages up
                        LEFT JOIN hotels mh ON up.makkah_hotel_id = mh.id
                        LEFT JOIN hotels mdh ON up.madinah_hotel_id = mdh.id
                        WHERE up.status = 1
                    ";

                    // Apply package type filter
                    if (!empty($filter_package_type)) {
                        $query_sql .= " AND up.package_type = '" . $conn->real_escape_string($filter_package_type) . "'";
                    }

                    // Apply total days filter
                    if ($filter_total_days > 0) {
                        $query_sql .= " AND (up.nights_makkah + up.nights_madinah) = " . $filter_total_days;
                    }

                    $query_sql .= " ORDER BY up.id DESC";
                    $query = $conn->query($query_sql);

                    if ($query && $query->num_rows > 0):
                        while ($row = $query->fetch_assoc()):
                            $img = !empty($row['package_image']) 
                                   ? '/travelwithsaadzakaria/travel-panel/assets/uploads/umrah-packages/' . $row['package_image'] 
                                   : '/travelwithsaadzakaria/assets/img/placeholder.png';
                    ?>
                    
                    <div class="col-12">
                        <div class="border-top-light pt-30">
                            <div class="row x-gap-20 y-gap-20">
                                <!-- IMAGE -->
                                <div class="col-md-auto">
                                    <div class="cardImage ratio ratio-1:1 w-250 md:w-1/1 rounded-4">
                                        <div class="cardImage__content">
                                            <img class="rounded-4 col-12" src="<?= $img ?>" alt="<?= htmlspecialchars($row['package_title']) ?>">
                                        </div>
                                        <div class="cardImage__wishlist">
                                            <button class="button -blue-1 bg-white size-30 rounded-full shadow-2">
                                                <i class="icon-heart text-12"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <!-- TEXT CONTENT -->
                                <div class="col-md">
                                    <div class="row x-gap-10 items-center">
                                        <div class="col-auto">
                                            <p class="text-14 lh-14 mb-5"><?= $row['nights_makkah'] ?> Nights Makkah</p>
                                        </div>
                                        <div class="col-auto">
                                            <div class="size-3 rounded-full bg-light-1 mb-5"></div>
                                        </div>
                                        <div class="col-auto">
                                            <p class="text-14 lh-14 mb-5"><?= $row['nights_madinah'] ?> Nights Madinah</p>
                                        </div>
                                    </div>
                                    
                                    <h3 class="text-18 lh-16 fw-500"><?= htmlspecialchars($row['package_title']) ?></h3>
                                    
                                    <div class="row">
                                        <div class="col-auto">
                                            <img src="../assets/img/logo/Makkah-icon.jpg" alt="" width="20px">
                                            <p><?= htmlspecialchars($row['makkah_hotel']) ?></p>
                                        </div>
                                        <div class="col-auto">
                                            <img src="../assets/img/logo/Madina-icon.png" alt="" width="20px">
                                            <p><?= htmlspecialchars($row['madinah_hotel']) ?></p>
                                        </div>
                                    </div>

                                    <p class="text-14 lh-14 mt-5">
                                        <b>Route:</b>&nbsp; Jeddah Airport → Makkah(<?= htmlspecialchars($row['makkah_hotel']) ?>) → Madinah(<?= htmlspecialchars($row['madinah_hotel']) ?>) → Jeddah Airport
                                    </p>

                                    <div class="text-14 lh-15 fw-500 mt-20">Taking safety measures</div>
                                    <div class="text-14 text-green-2 fw-500 lh-15 mt-5">Free cancellation</div>
                                </div>

                                <!-- RIGHT SIDE PRICE & BUTTON -->
                                <div class="col-md-auto text-right md:text-left">
                                    <div class="d-flex x-gap-5 items-center justify-end md:justify-start">
                                        <div style="
                                            width: 55px;
                                            height: 55px;
                                            color: white;
                                            background-color: blue;
                                            font-size: 15px;
                                            text-align: center;
                                            font-weight: 500;
                                            line-height: 14px;
                                            align-content:center;
                                            padding-top: 7px;
                                            border-radius: 5px;">
                                            <span style="font-size: 28px;"><b>
                                                <?= $row['nights_makkah'] + $row['nights_madinah'] ?>
                                            </b></span> 
                                            <span>DAYS</span>
                                        </div>
                                    </div>

                                    <div class="text-14 text-light-1 mt-50 md:mt-20">From</div>
                                    <div class="text-22 lh-12 fw-600 mt-5">USD <?= number_format($row['package_price'], 2) ?></div>
                                    <div class="text-14 text-light-1 mt-5">per person</div>

                                    <a href="umrah-package-detail.php?slug=<?= htmlspecialchars($row['package_slug']) ?>" class="button -md -dark-1 bg-blue-1 text-white mt-24">
                                        View Detail <div class="icon-arrow-top-right ml-15"></div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php 
                        endwhile;
                    else:
                    ?>
                        <div class="col-12 text-center py-40">
                            <i class="icon-search text-60 text-light-1 mb-20"></i>
                            <h3 class="text-22 fw-500">No packages found</h3>
                            <p class="text-15 text-light-1 mt-10">Try adjusting your filters</p>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- PAGINATION -->
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
                                <div class="text-14 text-light-1">
                                    <?php 
                                    $total_count = $query ? $query->num_rows : 0;
                                    echo "Showing {$total_count} package" . ($total_count != 1 ? 's' : '');
                                    ?>
                                </div>
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
document.addEventListener("DOMContentLoaded", function() {
    
    // GET URL PARAMETERS
    const urlParams = new URLSearchParams(window.location.search);
    const urlPackageType = urlParams.get('package_type') || '';
    const urlTotalDays = urlParams.get('total_days') || '0';
    
    // Load filter options
    loadFilterOptions();
    
    // Search button event
    const searchBtn = document.getElementById('umrah-search-btn');
    if (searchBtn) {
        searchBtn.addEventListener('click', function(e) {
            e.preventDefault();
            performSearch();
        });
    }
    
    // Load dropdown options and pre-select from URL
    function loadFilterOptions() {
        fetch('get_filter_options.php')
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Package Type dropdown
                    const packageTypeSelect = document.getElementById('package-type-filter');
                    if (packageTypeSelect) {
                        packageTypeSelect.innerHTML = '<option value="all">All</option>';
                        data.package_types.forEach(type => {
                            const option = document.createElement('option');
                            option.value = type;
                            option.textContent = type;
                            // Pre-select if matches URL parameter
                            if (type === urlPackageType) {
                                option.selected = true;
                            }
                            packageTypeSelect.appendChild(option);
                        });
                    }
                    
                    // Days dropdown
                    const daysSelect = document.getElementById('days-filter');
                    if (daysSelect) {
                        daysSelect.innerHTML = '<option value="0">All</option>';
                        data.total_days.forEach(days => {
                            const option = document.createElement('option');
                            option.value = days;
                            option.textContent = days + ' Days';
                            // Pre-select if matches URL parameter
                            if (days == urlTotalDays) {
                                option.selected = true;
                            }
                            daysSelect.appendChild(option);
                        });
                    }
                }
            })
            .catch(error => console.error('Error loading filters:', error));
    }
    
    // Perform AJAX search
    function performSearch() {
        const packageType = document.getElementById('package-type-filter').value;
        const totalDays = document.getElementById('days-filter').value;
        
        const resultsContainer = document.getElementById('packages-results');
        resultsContainer.innerHTML = '<div class="col-12 text-center py-40"><div class="spinner-border text-blue-1" role="status"><span class="sr-only">Loading...</span></div><p class="mt-20">Searching packages...</p></div>';
        
        const formData = new FormData();
        formData.append('package_type', packageType === 'all' ? '' : packageType);
        formData.append('total_days', totalDays);
        
        fetch('search_umrah_packages.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                displayResults(data.packages);
            } else {
                resultsContainer.innerHTML = '<div class="col-12 text-center py-40"><p class="text-red-1">Error loading packages</p></div>';
            }
        })
        .catch(error => {
            console.error('Search error:', error);
            resultsContainer.innerHTML = '<div class="col-12 text-center py-40"><p class="text-red-1">An error occurred. Please try again.</p></div>';
        });
    }
    
    // Display search results
    function displayResults(packages) {
        const resultsContainer = document.getElementById('packages-results');
        
        if (packages.length === 0) {
            resultsContainer.innerHTML = `
                <div class="col-12 text-center py-40">
                    <i class="icon-search text-60 text-light-1 mb-20"></i>
                    <h3 class="text-22 fw-500">No packages found</h3>
                    <p class="text-15 text-light-1 mt-10">Try adjusting your search filters</p>
                </div>
            `;
            return;
        }
        
        let html = '';
        
        packages.forEach(pkg => {
            html += `
                <div class="col-12">
                    <div class="border-top-light pt-30">
                        <div class="row x-gap-20 y-gap-20">
                            
                            <!-- IMAGE -->
                            <div class="col-md-auto">
                                <div class="cardImage ratio ratio-1:1 w-250 md:w-1/1 rounded-4">
                                    <div class="cardImage__content">
                                        <img class="rounded-4 col-12" src="${pkg.image}" alt="${pkg.title}">
                                    </div>
                                    <div class="cardImage__wishlist">
                                        <button class="button -blue-1 bg-white size-30 rounded-full shadow-2">
                                            <i class="icon-heart text-12"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- TEXT CONTENT -->
                            <div class="col-md">
                                <div class="row x-gap-10 items-center">
                                    <div class="col-auto">
                                        <p class="text-14 lh-14 mb-5">${pkg.nights_makkah} Nights Makkah</p>
                                    </div>
                                    <div class="col-auto">
                                        <div class="size-3 rounded-full bg-light-1 mb-5"></div>
                                    </div>
                                    <div class="col-auto">
                                        <p class="text-14 lh-14 mb-5">${pkg.nights_madinah} Nights Madinah</p>
                                    </div>
                                </div>
                                
                                <h3 class="text-18 lh-16 fw-500">${pkg.title}</h3>
                                
                                <div class="row">
                                    <div class="col-auto">
                                        <img src="../assets/img/logo/Makkah-icon.jpg" alt="" width="20px">
                                        <p>${pkg.makkah_hotel}</p>
                                    </div>
                                    <div class="col-auto">
                                        <img src="../assets/img/logo/Madina-icon.png" alt="" width="20px">
                                        <p>${pkg.madinah_hotel}</p>
                                    </div>
                                </div>

                                <p class="text-14 lh-14 mt-5">
                                    <b>Route:</b>&nbsp; Jeddah Airport → Makkah(${pkg.makkah_hotel}) → Madinah(${pkg.madinah_hotel}) → Jeddah Airport
                                </p>

                                <div class="text-14 lh-15 fw-500 mt-20">Taking safety measures</div>
                                <div class="text-14 text-green-2 fw-500 lh-15 mt-5">Free cancellation</div>
                            </div>

                            <!-- RIGHT SIDE PRICE & BUTTON -->
                            <div class="col-md-auto text-right md:text-left">
                                <div class="d-flex x-gap-5 items-center justify-end md:justify-start">
                                    <div style="
                                        width: 55px;
                                        height: 55px;
                                        color: white;
                                        background-color: blue;
                                        font-size: 15px;
                                        text-align: center;
                                        font-weight: 500;
                                        line-height: 14px;
                                        align-content:center;
                                        padding-top: 7px;
                                        border-radius: 5px;">
                                        <span style="font-size: 28px;"><b>${pkg.total_days}</b></span> 
                                        <span>DAYS</span>
                                    </div>
                                </div>

                                <div class="text-14 text-light-1 mt-50 md:mt-20">From</div>
                                <div class="text-22 lh-12 fw-600 mt-5">USD ${pkg.price}</div>
                                <div class="text-14 text-light-1 mt-5">per person</div>

                                <a href="umrah-package-detail.php?slug=${pkg.slug}" class="button -md -dark-1 bg-blue-1 text-white mt-24">
                                    View Detail <div class="icon-arrow-top-right ml-15"></div>
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            `;
        });
        
        resultsContainer.innerHTML = html;
    }
    
});
</script>