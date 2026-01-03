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
 * Umrah Package Bookings Dashboard with Real-time Updates
 * Save as: travel-panel/umrah-package-booking.php
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
    
    .status-confirmed { background-color: #d4edda; color: #155724; }
    .status-pending { background-color: #fff3cd; color: #856404; }
    .status-cancelled { background-color: #f8d7da; color: #721c24; }
    
    .package-badge {
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 11px;
        font-weight: 600;
        text-transform: uppercase;
    }
    
    .package-premium { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; }
    .package-business { background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%); color: white; }
    .package-economy { background-color: #e9ecef; color: #495057; }
    
    .auto-refresh-indicator {
        position: fixed;
        top: 20px;
        right: 20px;
        z-index: 9999;
        padding: 10px 20px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        border-radius: 30px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.2);
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
        0%, 100% { opacity: 1; transform: scale(1); }
        50% { opacity: 0.5; transform: scale(1.2); }
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
        background: rgba(0,0,0,0.3);
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
    
    .toast-container {
        position: fixed;
        top: 80px;
        right: 20px;
        z-index: 9998;
    }
    
    .custom-toast {
        min-width: 300px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.2);
    }
    
    .hotel-info {
        font-size: 11px;
        padding: 2px 6px;
        background: #f8f9fa;
        border-radius: 4px;
        margin: 2px 0;
        display: inline-block;
    }
    
    .umrah-icon {
        display: inline-block;
        width: 20px;
        height: 20px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-radius: 4px;
        text-align: center;
        line-height: 20px;
        color: white;
        font-size: 12px;
        margin-right: 5px;
    }
</style>
</head>

<body>
    <div class="content-page">
        <div class="content">

            <!-- Auto-refresh indicator -->
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
                    <p class="mt-2">Loading umrah package bookings...</p>
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
                                        <h4 class="header-title mb-0">
                                            <i class="bi bi-moon-stars-fill text-primary me-2"></i>
                                            Umrah Package Bookings - Real-time Dashboard
                                        </h4>
                                        <p class="text-muted fs-14 mb-0">
                                            Live umrah package booking data with automatic updates every 30 seconds
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

                                <!-- Stats Cards -->
                                <div class="row mb-3">
                                    <div class="col-md-3">
                                        <div class="card bg-primary text-white">
                                            <div class="card-body">
                                                <h6 class="card-title">Total Bookings</h6>
                                                <h3 id="totalCount">0</h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="card bg-success text-white">
                                            <div class="card-body">
                                                <h6 class="card-title">Confirmed</h6>
                                                <h3 id="confirmedCount">0</h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="card bg-warning text-white">
                                            <div class="card-body">
                                                <h6 class="card-title">Pending</h6>
                                                <h3 id="pendingCount">0</h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="card bg-danger text-white">
                                            <div class="card-body">
                                                <h6 class="card-title">Cancelled</h6>
                                                <h3 id="cancelledCount">0</h3>
                                            </div>
                                        </div>
                                    </div>
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
                                                <th>Package Name</th>
                                                <th>Package Type</th>
                                                <th>Duration</th>
                                                <th>Departure Date</th>
                                                <th>Hotels</th>
                                                <th>Room Option</th>
                                                <th>Pilgrims</th>
                                                <th>Total (SAR)</th>
                                                <th>Status</th>
                                                <th>Actions</th>
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

    <!-- Datatable Demo App js -->
    <script src="../assets/js/pages/demo.datatable-init.js"></script>

    <script>
        let dataTable;
        let refreshIntervalId;
        let isAutoRefreshEnabled = true;
        let currentInterval = 30000; // 30 seconds default

        $(document).ready(function() {
            initializeDataTable();
            loadBookings();
            startAutoRefresh();
            setupEventListeners();
        });

        function initializeDataTable() {
            dataTable = $('#datatable-bookings').DataTable({
                responsive: true,
                pageLength: 25,
                order: [[0, 'desc']],
                dom: 'Bfrtip',
                buttons: [
                    {
                        extend: 'copy',
                        className: 'btn btn-sm btn-secondary'
                    },
                    {
                        extend: 'csv',
                        className: 'btn btn-sm btn-secondary',
                        title: 'Umrah_Package_Bookings_' + new Date().toISOString().split('T')[0]
                    },
                    {
                        extend: 'excel',
                        className: 'btn btn-sm btn-secondary',
                        title: 'Umrah Package Bookings - ' + new Date().toLocaleDateString()
                    },
                    {
                        extend: 'pdf',
                        className: 'btn btn-sm btn-secondary',
                        title: 'Umrah Package Bookings Report',
                        orientation: 'landscape',
                        pageSize: 'A3'
                    },
                    {
                        extend: 'print',
                        className: 'btn btn-sm btn-secondary'
                    }
                ],
                language: {
                    emptyTable: "No umrah package bookings found",
                    loadingRecords: "Loading bookings..."
                }
            });
        }

        function loadBookings(showLoading = false) {
            if (showLoading) {
                $('#loadingOverlay').css('display', 'flex');
            }
            
            $.ajax({
                url: 'fetch_umrah_bookings.php',
                method: 'GET',
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        updateTable(response.data);
                        updateStats(response.data);
                        updateLastUpdated();
                        showNotification('success', `Loaded ${response.count} umrah package bookings`);
                    } else {
                        showNotification('error', response.message || 'Failed to load bookings');
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error loading bookings:', error);
                    showNotification('error', 'Network error. Please check your connection.');
                },
                complete: function() {
                    $('#loadingOverlay').css('display', 'none');
                }
            });
        }

        function updateTable(bookings) {
            dataTable.clear();
            
            bookings.forEach(function(booking) {
                const pilgrimsInfo = `${booking.adults}A - ${booking.children}C`;
                const statusBadge = `<span class="status-badge status-${booking.status_class.toLowerCase()}">${booking.status}</span>`;
                const packageBadge = `<span class="package-badge package-${booking.package_type.toLowerCase()}">${booking.package_type}</span>`;
                const umrahIcon = `<span class="umrah-icon"><i class="bi bi-moon-stars"></i></span>`;
                const travelDates = `
                    <div><strong>From:</strong> ${booking.start_date}</div>
                    
                `;
                const hotelsInfo = `
                    <div class="hotel-info">
                        <i class="bi bi-building"></i> Makkah: ${booking.makkah_hotel}
                    </div><br>
                    <div class="hotel-info">
                        <i class="bi bi-building"></i> Madinah: ${booking.madinah_hotel}
                    </div>
                `;
                const actions = `
                    <div class="btn-group btn-group-sm">
                        <button class="btn btn-outline-primary btn-sm" onclick="viewBooking(${booking.id})" title="View Details">
                            <i class="bi bi-eye"></i>
                        </button>
                        <button class="btn btn-outline-success btn-sm" onclick="updateStatus(${booking.id}, 'confirmed')" title="Confirm">
                            <i class="bi bi-check-circle"></i>
                        </button>
                        <button class="btn btn-outline-danger btn-sm" onclick="updateStatus(${booking.id}, 'cancelled')" title="Cancel">
                            <i class="bi bi-x-circle"></i>
                        </button>
                    </div>
                `;
                
                dataTable.row.add([
                    booking.id,
                    booking.name,
                    booking.email,
                    booking.phone,
                    booking.created_at,
                    umrahIcon + booking.package_title,
                    packageBadge,
                    booking.package_duration,
                    travelDates,
                    hotelsInfo,
                    booking.room_option,
                    pilgrimsInfo,
                    booking.total_price,
                    statusBadge,
                    actions
                ]);
            });
            
            dataTable.draw();
        }

        function updateStats(bookings) {
            const total = bookings.length;
            const confirmed = bookings.filter(b => b.status.toLowerCase() === 'confirmed').length;
            const pending = bookings.filter(b => b.status.toLowerCase() === 'pending').length;
            const cancelled = bookings.filter(b => b.status.toLowerCase() === 'cancelled').length;
            
            $('#totalCount').text(total);
            $('#confirmedCount').text(confirmed);
            $('#pendingCount').text(pending);
            $('#cancelledCount').text(cancelled);
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
            stopAutoRefresh();
            
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
            $('#manualRefresh').click(function() {
                loadBookings(true);
            });
            
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
            
            $('#refreshInterval').change(function() {
                currentInterval = parseInt($(this).val()) * 1000;
                
                if (isAutoRefreshEnabled) {
                    startAutoRefresh();
                    showNotification('info', `Refresh interval set to ${$(this).val()} seconds`);
                }
            });
        }

        function viewBooking(bookingId) {
            showNotification('info', `Viewing booking #${bookingId}`);
            // Add your view booking logic here
        }

        function updateStatus(bookingId, newStatus) {
            if (!confirm(`Are you sure you want to mark this booking as ${newStatus}?`)) {
                return;
            }
            
            $.ajax({
                url: 'update_booking_status.php',
                method: 'POST',
                data: {
                    booking_id: bookingId,
                    status: newStatus
                },
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        showNotification('success', response.message);
                        loadBookings(false);
                    } else {
                        showNotification('error', response.message);
                    }
                },
                error: function() {
                    showNotification('error', 'Failed to update booking status');
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
            
            toastElement.addEventListener('hidden.bs.toast', function() {
                $(this).remove();
            });
        }

        $(window).on('beforeunload', function() {
            stopAutoRefresh();
        });
    </script>

</body>
</html>