<?php
include 'Count.php' ?>

<section class="section dashboard">
    <div class="row">
        <!-- Left side columns -->

        <div class="row">
            <div class="col-xxl-3 col-md-3">
                <div class="card info-card sales-card">
                    <div class="card-body d-flex align-items-center">
                        <div class="card-icon rounded-circle me-3">
                            <i class="bi bi-people"></i> <!-- Icon for members -->
                        </div>
                        <div>
                            <h5 class="card-title mb-0">Total Members</h5>
                            <h6 class="mb-0"><?php echo $totalMembers; ?></h6>
                            <span class="text-muted small">Total members registered</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xxl-3 col-md-3">
                <div class="card info-card sales-card">
                    <div class="card-body d-flex align-items-center">
                        <div class="card-icon rounded-circle me-3">
                            <i class="bi bi-journal-text"></i> <!-- Icon for journals -->
                        </div>
                        <div>
                            <h5 class="card-title mb-0">Total Journals</h5>
                            <h6 class="mb-0"><?php echo $totalJournals; ?></h6>
                            <span class="text-muted small">Total journals published</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xxl-3 col-md-3">
                <div class="card info-card sales-card">
                    <div class="card-body d-flex align-items-center">
                        <div class="card-icon rounded-circle me-3">
                            <i class="bi bi-file-earmark-text"></i> <!-- Icon for applications -->
                        </div>
                        <div>
                            <h5 class="card-title mb-0">Total Applications</h5>
                            <h6 class="mb-0"><?php echo $totalApplications; ?></h6>
                            <span class="text-muted small">Total applications submitted</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xxl-3 col-md-3">
                <div class="card info-card sales-card">
                    <div class="card-body d-flex align-items-center">
                        <div class="card-icon rounded-circle me-3">
                            <i class="bi bi-newspaper"></i> <!-- Icon for papers -->
                        </div>
                        <div>
                            <h5 class="card-title mb-0">Total Papers</h5>
                            <h6 class="mb-0"><?php echo $totalPapers; ?></h6>
                            <span class="text-muted small">Total papers published</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
<div class="col-xxl-12 col-md-12">
    <div class="text-center mt-4">
        <img src="http://localhost/ITSE412-fall23-r12/Team12.jpg" alt="Photo Description" class="img-fluid" style="max-width: 100%; height: auto; border: 2px solid blue; box-shadow: 0 0 7px blue;">
    </div>
</div>