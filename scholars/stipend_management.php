<?php include "./head.php"; ?>

<body>
    <?php include "./controls.php";
    if ($roles == 3) {
        echo "<script>window.location.href='index.php'</script>";
    }
    ?>
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <?php include "./sidebar.php"; ?>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
            <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap"
                rel="stylesheet">
            <style>
                body {
                    font-family: 'Poppins', sans-serif;
                }

                .card {
                    border: none;
                    border-radius: 16px;
                    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.05);
                    margin-bottom: 2rem;
                }

                .card-header {
                    background: white;
                    color: #2d3436;
                    padding: 1.5rem;
                    border-bottom: 2px solid #f1f1f1;
                    font-weight: 600;
                }

                .form-control {
                    border: 2px solid #edf2f7;
                    border-radius: 10px;
                    padding: 0.8rem 1rem;
                    transition: all 0.3s ease;
                    margin-bottom: 1rem;
                }

                .form-control:focus {
                    border-color: #800000;
                    box-shadow: 0 0 0 4px rgba(128, 0, 0, 0.1);
                }

                .btn {
                    padding: 0.8rem 1.5rem;
                    border-radius: 8px;
                    font-weight: 500;
                    transition: all 0.3s ease;
                }

                .btn:hover {
                    transform: translateY(-2px);
                }

                .btn-primary {
                    background: #800000;
                    border: none;
                    box-shadow: 0 4px 12px rgba(128, 0, 0, 0.2);
                }

                #stipendTable {
                    width: 100%;
                    border-collapse: separate;
                    border-spacing: 0;
                }

                #stipendTable thead th {
                    background: #f8f9fa;
                    padding: 1rem;
                    font-weight: 600;
                    color: #2d3436;
                    border: none;
                }

                #stipendTable tbody td {
                    padding: 1rem;
                    border-bottom: 1px solid #edf2f7;
                    vertical-align: middle;
                }
            </style>

            <div class="layout-page">
                <?php include "./topbar.php"; ?>
                <div class="content-wrapper">
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <div class="row">
                            <!-- Stipend Schedule Form -->
                            <div class="col-12 mb-4">
                                <div class="card">
                                    <div class="card-header d-flex justify-content-between align-items-center">
                                        <h5><i class="fas fa-money-bill-wave me-2"></i>Set Stipend Release Schedule</h5>
                                    </div>
                                    <div class="card-body">
                                        <form method="POST" action="">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Scholarship Program</label>
                                                        <select name="scholarship_id" class="form-select" required>
                                                            <?php foreach ($scholarships as $scholarship): ?>
                                                                <option
                                                                    value="<?php echo $scholarship['scholarshipID']; ?>">
                                                                    <?php echo $scholarship['name']; ?>
                                                                </option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Release Date & Time</label>
                                                        <input type="datetime-local" name="release_date"
                                                            class="form-control" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Venue</label>
                                                        <input type="text" name="venue" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Amount</label>
                                                        <input type="number" name="amount" class="form-control"
                                                            required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Requirements</label>
                                                <textarea name="requirements" class="form-control" rows="3"></textarea>
                                            </div>
                                            <button type="submit" name="set_stipend" class="btn btn-primary">
                                                <i class="fas fa-save me-2"></i>Save Schedule
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="editStipendModal" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Edit Stipend Schedule</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <form method="POST" action="">
                                            <div class="modal-body">
                                                <input type="hidden" id="edit_stipend_id" name="stipend_id">
                                                <div class="mb-3">
                                                    <label class="form-label">Scholarship Program</label>
                                                    <select id="edit_scholarship_id" name="scholarship_id"
                                                        class="form-select" required>
                                                        <?php foreach ($scholarships as $scholarship): ?>
                                                            <option value="<?php echo $scholarship['scholarshipID']; ?>">
                                                                <?php echo $scholarship['name']; ?>
                                                            </option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Release Date & Time</label>
                                                    <input type="datetime-local" id="edit_release_date"
                                                        name="release_date" class="form-control" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Venue</label>
                                                    <input type="text" id="edit_venue" name="venue" class="form-control"
                                                        required>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Amount</label>
                                                    <input type="number" id="edit_amount" name="amount"
                                                        class="form-control" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Requirements</label>
                                                    <textarea id="edit_requirements" name="requirements"
                                                        class="form-control" rows="3"></textarea>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Status</label>
                                                    <select id="edit_status" name="status" class="form-select" required>
                                                        <option value="pending">Pending</option>
                                                        <option value="ongoing">Ongoing</option>
                                                        <option value="completed">Completed</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="submit" name="edit_stipend" class="btn btn-primary">Save
                                                    Changes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- Stipend Schedule List -->
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5><i class="fas fa-list me-2"></i>Stipend Release Schedules</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table id="stipendTable" class="display">
                                                <thead>
                                                    <tr>
                                                        <th>Scholarship</th>
                                                        <th>Release Date</th>
                                                        <th>Venue</th>
                                                        <th>Amount</th>
                                                        <th>Status</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($stipend_list as $stipend): ?>
                                                        <tr>
                                                            <td><?php echo $stipend['scholarship_name']; ?></td>
                                                            <td><?php echo date('M d, Y h:i A', strtotime($stipend['release_date'])); ?>
                                                            </td>
                                                            <td><?php echo $stipend['release_venue']; ?></td>
                                                            <td>₱<?php echo number_format($stipend['amount'], 2); ?></td>
                                                            <td>
                                                                <span class="badge bg-<?php
                                                                echo $stipend['status'] == 'pending' ? 'warning' :
                                                                    ($stipend['status'] == 'ongoing' ? 'info' : 'success');
                                                                ?>">
                                                                    <?php echo ucfirst($stipend['status']); ?>
                                                                </span>
                                                            </td>
                                                            <td>
                                                                <button class="btn btn-sm btn-primary"
                                                                    onclick="editStipend(<?php echo $stipend['stipend_id']; ?>)">
                                                                    <i class="fas fa-edit"></i>
                                                                </button>
                                                                <button class="btn btn-sm btn-danger"
                                                                    onclick="deleteStipend(<?php echo $stipend['stipend_id']; ?>)">
                                                                    <i class="fas fa-trash"></i>
                                                                </button>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; ?>
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
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function editStipend(stipendId) {
            // Get stipend details via AJAX and show in modal
            $.ajax({
                url: 'controls.php',
                type: 'POST',
                data: { stipend_id: stipendId },
                success: function (response) {
                    const stipend = JSON.parse(response);
                    $('#editStipendModal').modal('show');
                    $('#edit_stipend_id').val(stipend.stipend_id);
                    $('#edit_scholarship_id').val(stipend.scholarship_id);
                    $('#edit_release_date').val(stipend.release_date);
                    $('#edit_venue').val(stipend.release_venue);
                    $('#edit_amount').val(stipend.amount);
                    $('#edit_requirements').val(stipend.requirements);
                    $('#edit_status').val(stipend.status);
                }
            });
        }


        function deleteStipend(stipendId) {
            Swal.fire({
                title: 'Delete Stipend Schedule?',
                text: "This action cannot be undone",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = `stipend_management.php?delete_stipend=${stipendId}`;
                }
            });
        }
    </script>

    <!-- Edit Stipend Modal -->