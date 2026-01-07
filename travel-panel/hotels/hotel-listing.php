<?php include_once __DIR__ . '/../includes/header.php'; ?>
<?php include_once __DIR__ . '/../includes/sidebar.php'; ?>
<!-- Datatables css -->
<link href="../assets/vendor/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
<link href="../assets/vendor/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet" type="text/css" />
<link href="../assets/vendor/datatables.net-fixedcolumns-bs5/css/fixedColumns.bootstrap5.min.css" rel="stylesheet" type="text/css" />
<link href="../assets/vendor/datatables.net-fixedheader-bs5/css/fixedHeader.bootstrap5.min.css" rel="stylesheet" type="text/css" />
<link href="../assets/vendor/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css" rel="stylesheet" type="text/css" />
<link href="../assets/vendor/datatables.net-select-bs5/css/select.bootstrap5.min.css" rel="stylesheet" type="text/css" />

<!-- Theme Config Js -->
<script src="../assets/js/config.js"></script>

<!-- ============================================================== -->
<!-- Start Page Content here -->
<!-- ============================================================== -->

<?php
/**
 * Hotel Bookings Dashboard with Real-time Updates
 * Save as: travel-panel/hotel-bookings.php
 */

require_once __DIR__ . '/../includes/auth_functions.php';
start_secure_session();
require_login();

?>
<style>
    .status-badge {
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
    }

    .status-confirmed {
        background-color: #d4edda;
        color: #155724;
    }

    .status-pending {
        background-color: #fff3cd;
        color: #856404;
    }

    .status-cancelled {
        background-color: #f8d7da;
        color: #721c24;
    }

    .auto-refresh-indicator {
        position: fixed;
        top: 20px;
        right: 20px;
        z-index: 9999;
        padding: 10px 20px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        border-radius: 30px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        font-size: 13px;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .pulse {
        width: 8px;
        height: 8px;
        background: #4ade80;
        border-radius: 50%;
        animation: pulse 2s infinite;
    }

    @keyframes pulse {

        0%,
        100% {
            opacity: 1;
            transform: scale(1);
        }

        50% {
            opacity: 0.5;
            transform: scale(1.2);
        }
    }

    .last-updated {
        font-size: 11px;
        opacity: 0.9;
    }

    .refresh-controls {
        display: flex;
        gap: 10px;
        align-items: center;
        margin-bottom: 20px;
    }

    .loading-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.3);
        display: none;
        justify-content: center;
        align-items: center;
        z-index: 10000;
    }

    .loading-spinner {
        background: white;
        padding: 30px;
        border-radius: 10px;
        text-align: center;
    }

    /* Toast notifications */
    .toast-container {
        position: fixed;
        top: 80px;
        right: 20px;
        z-index: 9998;
    }

    .custom-toast {
        min-width: 300px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    }
</style>
</head>

<body>
    <div class="content-page">
        <div class="content">

          

                <div class="auto-refresh-indicator" id="refreshIndicator">
                    <div class="pulse"></div>
                    <span>Auto-refresh: <strong id="refreshStatus">ON</strong></span>
                    <span class="last-updated">Last: <span id="lastUpdated">--:--</span></span>
                </div>

                <!-- Loading overlay -->
                <div class="loading-overlay" id="loadingOverlay">
                    <div class="loading-spinner">
                        <div class="spinner-border text-primary" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        <p class="mt-2">Loading bookings...</p>
                    </div>
                </div>

                <!-- Toast Container -->
                <div class="toast-container"></div>



                <div class="container-fluid mt-4">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <div>
                                            <h4 class="header-title mb-0">Hotel Bookings - Real-time Dashboard</h4>
                                            <p class="text-muted fs-14 mb-0">
                                                Live booking data with automatic updates every 30 seconds
                                            </p>
                                        </div>

                                        <!-- Refresh Controls -->
                                        <div class="refresh-controls">
                                            <button class="btn btn-sm btn-primary" id="manualRefresh">
                                                <i class="bi bi-arrow-clockwise"></i> Refresh Now
                                            </button>

                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="autoRefreshToggle" checked>
                                                <label class="form-check-label" for="autoRefreshToggle">
                                                    Auto-refresh
                                                </label>
                                            </div>

                                            <select class="form-select form-select-sm" id="refreshInterval" style="width: 150px;">
                                                <option value="10">10 seconds</option>
                                                <option value="30" selected>30 seconds</option>
                                                <option value="60">1 minute</option>
                                                <option value="120">2 minutes</option>
                                                <option value="300">5 minutes</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="alert alert-info" id="bookingCount">
                                        <strong>Total Bookings:</strong> <span id="totalCount">0</span>
                                    </div>

                                    <div class="table-responsive">
                                        <table id="datatable-bookings" class="table table-striped table-hover dt-responsive nowrap w-100">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Phone</th>
                                                    <th>Inquiry Date</th>
                                                    <th>Hotel Name</th>
                                                    <th>Check In</th>
                                                    <th>Check Out</th>
                                                    <th>Guests</th>
                                                    <th>Room Type</th>
                                                    <th>Rooms</th>
                                                    <th>Total (SAR)</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- Data will be loaded via AJAX -->
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

        </div>

    </div>



    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->

    </div>
    <!-- END wrapper -->

    <?php include_once '../includes/footer.php'; ?>
    <!-- Datatables js -->
    <script src="../assets/vendor/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../assets/vendor/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
    <script src="../assets/vendor/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../assets/vendor/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js"></script>
    <script src="../assets/vendor/datatables.net-fixedcolumns-bs5/js/fixedColumns.bootstrap5.min.js"></script>
    <script src="../assets/vendor/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="../assets/vendor/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../assets/vendor/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js"></script>
    <script src="../assets/vendor/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../assets/vendor/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="../assets/vendor/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../assets/vendor/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="../assets/vendor/datatables.net-select/js/dataTables.select.min.js"></script>

    <!-- Datatable Demo Aapp js -->
    <script src="../assets/js/pages/demo.datatable-init.js"></script>


    <script>
        let dataTable;
        let refreshIntervalId;
        let isAutoRefreshEnabled = true;
        let currentInterval = 30000; // 30 seconds default

        $(document).ready(function() {
            // Initialize DataTable
            initializeDataTable();

            // Load initial data
            loadBookings();

            // Setup auto-refresh
            startAutoRefresh();

            // Event listeners
            setupEventListeners();
        });

        function initializeDataTable() {
            dataTable = $('#datatable-bookings').DataTable({
                responsive: true,
                pageLength: 25,
                order: [
                    [0, 'desc']
                ], // Sort by ID descending
                dom: 'Bfrtip',
                buttons: [{
                        extend: 'copy',
                        className: 'btn btn-sm btn-secondary'
                    },
                    {
                        extend: 'csv',
                        className: 'btn btn-sm btn-secondary'
                    },
                    {
                        extend: 'excel',
                        className: 'btn btn-sm btn-secondary',
                        title: 'Hotel Bookings - ' + new Date().toLocaleDateString()
                    },
                    {
                        extend: 'pdf',
                        className: 'btn btn-sm btn-secondary',
                        title: 'Hotel Bookings Report',
                        orientation: 'landscape',
                        pageSize: 'A4'
                    },
                    {
                        extend: 'print',
                        className: 'btn btn-sm btn-secondary'
                    }
                ],
                language: {
                    emptyTable: "No bookings found",
                    loadingRecords: "Loading bookings..."
                }
            });
        }

        // function loadBookings(showLoading = false) {
        //     if (showLoading) {
        //         $('#loadingOverlay').css('display', 'flex');
        //     }

        //     $.ajax({
        //         url: 'fetch_hotel_bookings.php',
        //         method: 'GET',
        //         dataType: 'json',
        //         success: function(response) {
        //             if (response.success) {
        //                 updateTable(response.data);
        //                 updateStats(response.count);
        //                 updateLastUpdated();

        //                 // Show success notification
        //                 showNotification('success', `Loaded ${response.count} bookings`);
        //             } else {
        //                 showNotification('error', response.message || 'Failed to load bookings');
        //             }
        //         },
        //         error: function(xhr, status, error) {
        //             console.error('Error loading bookings:', error);
        //             showNotification('error', 'Network error. Please check your connection.');
        //         },
        //         complete: function() {
        //             $('#loadingOverlay').css('display', 'none');
        //         }
        //     });
        // }

        function updateTable(bookings) {
            // Clear existing data
            dataTable.clear();

            // Add new data
            bookings.forEach(function(booking) {
                const guestsInfo = `${booking.adults}A - ${booking.children}C`;
                const statusBadge = `<span class="status-badge status-${booking.status_class.toLowerCase()}">${booking.status}</span>`;

                dataTable.row.add([
                    booking.id,
                    booking.name,
                    booking.email,
                    booking.phone,
                    booking.inquiry_date,
                    booking.hotel_name,
                    booking.check_in,
                    booking.check_out,
                    guestsInfo,
                    booking.room_type,
                    booking.number_of_rooms,
                    booking.total_price,
                    statusBadge
                ]);
            });

            // Redraw table
            dataTable.draw();
        }

        function updateStats(count) {
            $('#totalCount').text(count);
        }

        function updateLastUpdated() {
            const now = new Date();
            const timeString = now.toLocaleTimeString('en-US', {
                hour: '2-digit',
                minute: '2-digit',
                second: '2-digit'
            });
            $('#lastUpdated').text(timeString);
        }

        function startAutoRefresh() {
            stopAutoRefresh(); // Clear any existing interval

            if (isAutoRefreshEnabled) {
                refreshIntervalId = setInterval(function() {
                    loadBookings(false);
                }, currentInterval);

                $('#refreshStatus').text('ON');
                $('.pulse').show();
            }
        }

        function stopAutoRefresh() {
            if (refreshIntervalId) {
                clearInterval(refreshIntervalId);
                refreshIntervalId = null;
            }
            $('#refreshStatus').text('OFF');
            $('.pulse').hide();
        }

        function setupEventListeners() {
            // Manual refresh button
            $('#manualRefresh').click(function() {
                loadBookings(true);
            });

            // Auto-refresh toggle
            $('#autoRefreshToggle').change(function() {
                isAutoRefreshEnabled = $(this).is(':checked');

                if (isAutoRefreshEnabled) {
                    startAutoRefresh();
                    showNotification('info', 'Auto-refresh enabled');
                } else {
                    stopAutoRefresh();
                    showNotification('info', 'Auto-refresh disabled');
                }
            });

            // Refresh interval change
            $('#refreshInterval').change(function() {
                currentInterval = parseInt($(this).val()) * 1000;

                if (isAutoRefreshEnabled) {
                    startAutoRefresh();
                    showNotification('info', `Refresh interval set to ${$(this).val()} seconds`);
                }
            });
        }

        function showNotification(type, message) {
            const toastColors = {
                'success': 'bg-success',
                'error': 'bg-danger',
                'info': 'bg-info',
                'warning': 'bg-warning'
            };

            const toastIcons = {
                'success': 'bi-check-circle-fill',
                'error': 'bi-exclamation-triangle-fill',
                'info': 'bi-info-circle-fill',
                'warning': 'bi-exclamation-circle-fill'
            };

            const toastId = 'toast-' + Date.now();
            const toastHTML = `
                <div id="${toastId}" class="toast custom-toast ${toastColors[type]} text-white" role="alert">
                    <div class="toast-header ${toastColors[type]} text-white">
                        <i class="bi ${toastIcons[type]} me-2"></i>
                        <strong class="me-auto">${type.charAt(0).toUpperCase() + type.slice(1)}</strong>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast"></button>
                    </div>
                    <div class="toast-body">
                        ${message}
                    </div>
                </div>
            `;

            $('.toast-container').append(toastHTML);

            const toastElement = document.getElementById(toastId);
            const toast = new bootstrap.Toast(toastElement, {
                autohide: true,
                delay: 3000
            });

            toast.show();

            // Remove toast element after it's hidden
            toastElement.addEventListener('hidden.bs.toast', function() {
                $(this).remove();
            });
        }

        // Cleanup on page unload
        $(window).on('beforeunload', function() {
            stopAutoRefresh();
        });
    </script>