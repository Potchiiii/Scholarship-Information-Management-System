<?php include "./head.php";
$a = 3;
?>
<!--directory: /Scholars folder-->

<body>
    <?php include "./controls.php"; ?>
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <?php include "./sidebar.php"; ?>
            <div class="layout-page">
                <?php include "./topbar.php"; ?>
                <div class="content-wrapper">
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap"
                            rel="stylesheet">
                        <!-- FullCalendar CSS -->
                        <link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.css' rel='stylesheet' />
                        <link rel="stylesheet"
                            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

                        <!-- FullCalendar JS -->
                        <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js'></script>
                        <style>
                            body {
                                font-family: 'Poppins', sans-serif;
                            }

                            .card {
                                border: none;
                                border-radius: 16px;
                                box-shadow: 0 8px 20px rgba(0, 0, 0, 0.05);
                                overflow: hidden;
                            }

                            .card-header {
                                background: linear-gradient(135deg, #ffffff 0%, #ddd9d9 100%);
                                color: white;
                                padding: 1.5rem;
                                border: none;
                            }

                            .card-header h1 {
                                font-size: 1.8rem;
                                font-weight: 600;
                                margin: 0;
                            }

                            .card-body {
                                padding: 2rem;
                            }

                            .programme-info {
                                background: #f8f9fa;
                                padding: 1.5rem;
                                border-radius: 12px;
                                margin-bottom: 1.5rem;
                            }

                            .downloadables {
                                display: flex;
                                gap: 0.5rem;
                                flex-wrap: wrap;
                            }

                            .downloadables a {
                                padding: 0.5rem 1rem;
                                background: #fee2e2;
                                color: #800000;
                                border-radius: 8px;
                                text-decoration: none;
                                transition: all 0.3s ease;
                            }

                            .downloadables a:hover {
                                background: #800000;
                                color: white;
                                transform: translateY(-2px);
                            }

                            table.display {
                                width: 100% !important;
                                border-collapse: separate;
                                border-spacing: 0;
                            }

                            table.display thead th {
                                background: #f8f9fa;
                                padding: 1rem;
                                font-weight: 600;
                                color: #2d3436;
                                border: none;
                            }

                            table.display tbody td {
                                padding: 1rem;
                                border-bottom: 1px solid #edf2f7;
                                vertical-align: middle;
                            }

                            .btn {
                                padding: 0.5rem 1rem;
                                border-radius: 8px;
                                font-weight: 500;
                                transition: all 0.3s ease;
                            }

                            .btn:hover {
                                transform: translateY(-2px);
                            }

                            .btn-danger {
                                background: #800000;
                            }

                            .btn-dark {
                                background: #2d3436;
                            }

                            .semester-info {
                                background: #f8f9fa;
                                padding: 1.5rem;
                                border-radius: 12px;
                                margin-bottom: 1.5rem;
                                line-height: 1.8;
                            }

                            .description-section {
                                line-height: 1.8;
                                color: #4a5568;
                            }

                            #scholarship-calendar {
                                background: white;
                                padding: 20px;
                                border-radius: 12px;
                                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                                min-height: 600px;
                                width: 100%;
                            }

                            .date-cell {
                                min-height: 80px;
                                padding: 5px;
                            }

                            .date-number {
                                font-weight: bold;
                                margin-bottom: 8px;
                                font-size: 16px;
                            }

                            .slot-info {
                                font-size: 13px;
                                color: #666;
                                margin-bottom: 8px;
                            }

                            .btn-slot {
                                display: block;
                                width: 100%;
                                padding: 4px 8px;
                                font-size: 12px;
                                border-radius: 4px;
                                text-align: center;
                                text-decoration: none;
                                cursor: pointer;
                                border: none;
                            }

                            .btn-slot.available {
                                background: #800000;
                                color: white;
                            }

                            .btn-slot.available:hover {
                                background: #600000;
                            }

                            .btn-slot.full {
                                background: #2d3436;
                                color: white;
                                cursor: not-allowed;
                            }

                            .fc .fc-daygrid-day {
                                height: 150px !important;
                            }

                            .col-sm-4 {
                                width: 40%;
                            }

                            .col-sm-8 {
                                width: 60%;
                            }

                            .programme-info {
                                background: #ffffff;
                                padding: 2rem;
                                border-radius: 15px;
                                box-shadow: 0 2px 15px rgba(0, 0, 0, 0.05);
                            }

                            .semester-details {
                                background: #f8fafc;
                                padding: 1.5rem;
                                border-radius: 12px;
                            }

                            .documents-section {
                                background: #fff;
                                padding: 1.5rem;
                                border-radius: 12px;
                            }

                            .doc-link {
                                display: inline-block;
                                padding: 0.5rem 1rem;
                                background: #fee2e2;
                                color: #800000;
                                border-radius: 8px;
                                margin: 0.25rem;
                                text-decoration: none;
                                transition: all 0.3s ease;
                            }

                            .doc-link:hover {
                                background: #800000;
                                color: white;
                                transform: translateY(-2px);
                            }

                            .description-content {
                                line-height: 1.8;
                                color: #4a5568;
                                background: #f8fafc;
                                padding: 1.5rem;
                                border-radius: 12px;
                            }

                            .card-header h1 {
                                color: #2d3748;
                                font-size: 1.8rem;
                                font-weight: 600;
                            }

                            .text-primary {
                                color: #800000 !important;
                            }

                            .quick-apply-container {
                                background: #ffffff;
                                padding: 2rem;
                                border-radius: 15px;
                                box-shadow: 0 2px 15px rgba(0, 0, 0, 0.05);
                            }

                            .time-selection-container {
                                background: #f8fafc;
                                padding: 1.5rem;
                                border-radius: 12px;
                                height: 100%;
                            }

                            .time-slots {
                                max-height: 300px;
                                overflow-y: auto;
                            }

                            .time-slots button {
                                transition: all 0.3s ease;
                            }

                            .time-slots button:hover {
                                background: #800000;
                                color: white;
                                border-color: #800000;
                            }

                            .selected-datetime {
                                border-top: 1px solid #edf2f7;
                                padding-top: 1rem;
                            }

                            .slot-available {
                                color: #800000;
                                font-size: 2em;
                                display: flex;
                                justify-content: center;
                                align-items: center;
                                width: 40px;
                                height: 40px;
                                margin: 5px auto;
                                background: #fee2e2;
                                border-radius: 50%;
                                transition: all 0.3s ease;
                            }

                            .slot-full {
                                color: #2d3436;
                                font-size: 2em;
                                display: flex;
                                justify-content: center;
                                align-items: center;
                                width: 40px;
                                height: 40px;
                                margin: 5px auto;
                                background: #e2e8f0;
                                border-radius: 50%;
                            }

                            .slot-link:hover .slot-available {
                                transform: scale(1.1);
                                background: #800000;
                                color: white;
                            }

                            .date-cell {
                                min-height: 100px;
                                padding: 5px;
                                display: flex;
                                flex-direction: column;
                                align-items: center;
                            }

                            .fc-day.has-slot {
                                background: #fee2e2 !important;
                                border-radius: 8px;
                                position: relative;
                                z-index: 1;
                            }

                            .fc-day.has-slot:hover {
                                background: #800000 !important;
                                color: white;
                                transform: translateY(-2px);
                                transition: all 0.3s ease;
                                box-shadow: 0 4px 12px rgba(128, 0, 0, 0.15);
                            }

                            .fc-daygrid-day-number {
                                font-weight: 600;
                                font-size: 1.1em;
                                padding: 8px !important;
                            }

                            .fc-day.has-slot .fc-daygrid-day-number {
                                color: #800000;
                            }

                            .fc-day.has-slot:hover .fc-daygrid-day-number {
                                color: white;
                            }

                            .fc .fc-daygrid-day-frame {
                                min-height: 100px;
                                padding: 4px;
                            }


                            .slot-link {
                                cursor: pointer;
                                display: block;
                                text-decoration: none;
                            }

                            .slot-link:hover .slot-available {
                                transform: scale(1.1);
                                transition: transform 0.2s ease;
                            }
                        </style>
                        <div class="card">
                            <div class="card-header">
                                <h1><i class="fas fa-graduation-cap me-2"></i>Scholarship Details</h1>
                            </div>
                            <div class="card-body">
                                <!-- Scholarship Name Container -->
                                <div class="programme-info mb-4">
                                    <h4 class="text-primary mb-3">
                                        <i class="fas fa-book-reader me-2"></i>
                                        <?php echo $scholar_list['name'] ?>
                                    </h4>
                                </div>
                                <?php
                                // Check if user already has an appointment for this scholarship
                                $checkAppointment = $pdo->prepare("
                                                SELECT sa.* 
                                                FROM scholarship_applications sa
                                                JOIN daily_scholarship ds ON ds.dailyscholarshipID = sa.dailyscholarshipID
                                                WHERE sa.userID = :userID 
                                                AND ds.scholarshipID = :scholarshipID
                                            ");
                                $checkAppointment->bindParam(':userID', $id);
                                $checkAppointment->bindParam(':scholarshipID', $scholar_list['scholarshipID']);
                                $checkAppointment->execute();
                                $existingAppointment = $checkAppointment->fetch();
                                ?>
                                <!-- Quick Apply Container -->
                                <?php if (!$existingAppointment): ?>
                                    <div class="quick-apply-container mb-4">
                                        <h4><i class="fas fa-calendar-check me-2"></i>Quick Apply Here</h4>
                                        <div class="row">
                                            <!-- Calendar on Left -->
                                            <div class="col-md-8">
                                                <div id="scholarship-calendar"></div>
                                            </div>
                                            <!-- Time Selection on Right -->
                                            <div class="col-md-4">
                                                <div class="time-selection-container">
                                                    <h5 class="mb-3">Select Appointment Time</h5>
                                                    <?php
                                                    $available_times = [
                                                        '9:00 AM' => true,
                                                        '10:00 AM' => true,
                                                        '11:00 AM' => true,
                                                        '2:00 PM' => true,
                                                        '3:00 PM' => true
                                                    ];

                                                    // Check existing appointments from database
                                                    $selected_date = isset($_GET['date']) ? $_GET['date'] : null;
                                                    if ($selected_date) {
                                                        $stmt = $pdo->prepare("SELECT appointment_time FROM scholarship_applications WHERE DATE(date_apply) = ?");
                                                        $stmt->execute([$selected_date]);
                                                        $booked_times = $stmt->fetchAll(PDO::FETCH_COLUMN);

                                                        foreach ($booked_times as $time) {
                                                            if (isset($available_times[$time])) {
                                                                $available_times[$time] = false;
                                                            }
                                                        }
                                                    }
                                                    ?>

                                                    <div class="time-slots">
                                                        <?php foreach ($available_times as $time => $available): ?>
                                                            <button
                                                                class="btn btn-outline-primary mb-2 w-100 <?php echo !$available ? 'disabled' : ''; ?>"
                                                                <?php echo !$available ? 'disabled' : ''; ?>
                                                                data-time="<?php echo $time; ?>">
                                                                <?php echo $time; ?>
                                                                <?php echo !$available ? ' (Booked)' : ''; ?>
                                                            </button>
                                                        <?php endforeach; ?>
                                                    </div>

                                                    <div class="selected-datetime mt-3">
                                                        <h6>Selected Date & Time:</h6>
                                                        <p id="selected-date-time" class="text-primary">Please select a date
                                                            and time</p>
                                                        <button class="btn btn-primary w-100">Confirm Appointment</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php else: ?>
                                    <div class="alert alert-info mb-4">
                                        <i class="fas fa-info-circle me-2"></i>
                                        You already have an appointment for this scholarship. Check your application status
                                        in My Applications.
                                    </div>
                                <?php endif; ?>
                                <!-- Rest of your existing content -->
                                <div class="row">
                                    <div class="col-sm-8">
                                        <div class="programme-info mb-4">
                                            <div class="semester-details mb-4">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <p><i
                                                                class="fas fa-calendar-alt me-2"></i><strong>Semester:</strong>
                                                            <?php echo $scholar_list['sememestrName'] ?></p>
                                                        <p><i class="fas fa-clock me-2"></i><strong>Duration:</strong>
                                                            <?php echo $scholar_list['date_start'] . " - " . $scholar_list['date_end'] ?>
                                                        </p>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p><i class="fas fa-money-check-alt me-2"></i><strong>Reimbursement
                                                                Date:</strong>
                                                            <?php echo $scholar_list['reinburment'] ?></p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="documents-section mb-4">
                                                <h5 class="text-dark mb-3"><i class="fas fa-file-alt me-2"></i>Required
                                                    Documents</h5>
                                                <div class="downloadables">
                                                    <?php if ($documents_count > 0): ?>
                                                        <?php foreach ($documents as $files): ?>
                                                            <a href="../assets/forms/<?php echo $files['document'] ?>"
                                                                class="doc-link" download>
                                                                <i
                                                                    class="fas fa-download me-2"></i><?php echo $files['document_name'] ?>
                                                            </a>
                                                        <?php endforeach; ?>
                                                    <?php else: ?>
                                                        <p class="text-muted"><i class="fas fa-info-circle me-2"></i>No
                                                            documents uploaded</p>
                                                    <?php endif; ?>
                                                </div>
                                            </div>

                                            <div class="description-section">
                                                <h5 class="text-dark mb-3"><i
                                                        class="fas fa-info-circle me-2"></i>Program Description</h5>
                                                <div class="description-content">
                                                    <?php echo $scholar_list['description'] ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <script>
                        document.addEventListener('DOMContentLoaded', function () {
                            const calendarEl = document.getElementById('scholarship-calendar');
                            const calendar = new FullCalendar.Calendar(calendarEl, {
                                initialView: 'dayGridMonth',
                                headerToolbar: {
                                    left: 'prev,next today',
                                    center: 'title',
                                    right: 'dayGridMonth'
                                },
                                dayCellContent: function (info) {
                                    let dateStr = info.date.toISOString().split('T')[0];
                                    let hasSlot = false;

                                    <?php foreach ($dailylists as $list): ?>
                                        if (dateStr === '<?php echo $list['sectioned_date']; ?>') {
                                            hasSlot = true;
                                            return {
                                                html: `<div class="date-cell" data-dailyid="<?php echo $list['dailyscholarshipID']; ?>">
                <div class="date-number">${info.dayNumberText}</div>
                <div class="slot-link">
                    ${<?php echo $list['limit_counter'] >= $list['limits'] ? 'true' : 'false'; ?> ?
                                                    '<span class="slot-full"><i class="fas fa-times-circle"></i></span>' :
                                                    '<span class="slot-available"><i class="fas fa-check-circle"></i></span>'}
                </div>
            </div>`
                                            };
                                        }
                                    <?php endforeach; ?>

                                    return info.dayNumberText;
                                }
                            });

                            calendar.render();

                            // Add a variable to store the selected date
                            let selectedAppointmentDate = null;

                            // Update the dateClick handler to store the selected date
                            calendar.on('dateClick', function (info) {
                                if (info.dayEl.querySelector('.date-cell')) {
                                    selectedAppointmentDate = info.dateStr;
                                    const dailyId = info.dayEl.querySelector('.date-cell').dataset.dailyid;
                                    selectedDailyId = dailyId;

                                    const formattedDate = new Date(info.dateStr).toLocaleDateString('en-US', {
                                        weekday: 'long',
                                        year: 'numeric',
                                        month: 'long',
                                        day: 'numeric'
                                    });

                                    document.getElementById('selected-date-time').textContent =
                                        `Date: ${formattedDate} (Please select a time)`;
                                }
                            });
                            // Time slot selection handler
                            document.querySelectorAll('.time-slots button').forEach(btn => {
                                btn.addEventListener('click', function () {
                                    const selectedTime = this.dataset.time;

                                    // Remove selected class from all buttons and add to clicked one
                                    document.querySelectorAll('.time-slots button').forEach(b =>
                                        b.classList.remove('selected'));
                                    this.classList.add('selected');

                                    // Get the formatted date from the existing selected-date-time text
                                    const currentText = document.getElementById('selected-date-time').textContent;
                                    const dateText = currentText.split('Time:')[0]; // Split at 'Time:' to remove old time

                                    // Update display with both selected date and time
                                    document.getElementById('selected-date-time').textContent =
                                        `${dateText.trim()} Time: ${selectedTime}`;
                                });
                            });                            // Update the confirm button handler to use both date and time
                            document.querySelector('.btn-primary').addEventListener('click', function () {
                                const selectedTime = document.querySelector('.time-slots button.selected')?.dataset.time;

                                if (selectedTime && selectedAppointmentDate) {
                                    window.location.href = `scholarships_details.php?apply=${selectedDailyId}&time=${selectedTime}&date=${selectedAppointmentDate}`;
                                } else {
                                    alert('Please select both a date and time');
                                }
                            });
                        });
                    </script>
                    <?php include "./footer.php"; ?>