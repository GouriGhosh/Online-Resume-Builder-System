<?php require_once __DIR__ . '/../includes/header.php'; ?>
<div class="print-btns no-print mb-3 d-flex gap-2">
    <button class="btn btn-dark" onclick="window.print()">Print / Save PDF</button>
    <a href="../dashboard.php" class="btn btn-outline-secondary">Back</a>
</div>
<div class="resume-shell rounded-4 overflow-hidden">

<div class="p-5">
    <div class="text-center mb-4">
        <h1 class="fw-bold"><?= e($resume['fullname']) ?></h1>
        <div><?= e($resume['email_id']) ?> | <?= e($resume['mobile_no']) ?> | <?= e($resume['address']) ?></div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <h4 class="fw-bold border-bottom pb-2">Profile</h4>
            <p><?= nl2br(e($resume['objective'])) ?></p>
            <h4 class="fw-bold border-bottom pb-2 mt-4">Technical Skills</h4>
            <?php foreach ($resume['skills'] as $s): ?>
                <div class="mb-2 d-flex justify-content-between">
                    <span><?= e($s['skill']) ?></span>
                    <span><?= e($s['rating']) ?>%</span>
                </div>
            <?php endforeach; ?>
            <h4 class="fw-bold border-bottom pb-2 mt-4">Soft Skills</h4>
            <ul>
                <?php foreach ($resume['soft_skills'] as $s): ?>
                    <li><?= e($s['skill_name']) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <div class="col-md-6">
            <h4 class="fw-bold border-bottom pb-2">Work</h4>
            <?php foreach ($resume['work'] as $w): ?>
                <div class="mb-3">
                    <div class="fw-bold"><?= e($w['job_role']) ?></div>
                    <div><?= e($w['company']) ?></div>
                    <div class="text-muted small"><?= e($w['started']) ?> - <?= e($w['ended']) ?></div>
                    <div><?= nl2br(e($w['description'])) ?></div>
                </div>
            <?php endforeach; ?>
            <h4 class="fw-bold border-bottom pb-2 mt-4">Education</h4>
            <?php foreach ($resume['education'] as $ed): ?>
                <div class="mb-3">
                    <div class="fw-bold"><?= e($ed['board']) ?></div>
                    <div><?= e($ed['institute_name']) ?></div>
                    <div class="text-muted small"><?= e($ed['start_year']) ?> - <?= e($ed['end_year']) ?> | <?= e($ed['percentage']) ?></div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

</div>
<?php require_once __DIR__ . '/../includes/footer.php'; ?>
