<?php require_once __DIR__ . '/../includes/header.php'; ?>
<div class="print-btns no-print mb-3 d-flex gap-2">
    <button class="btn btn-dark" onclick="window.print()">Print / Save PDF</button>
    <a href="../dashboard.php" class="btn btn-outline-secondary">Back</a>
</div>
<div class="resume-shell rounded-4 overflow-hidden">

<div class="row g-0">
    <div class="col-md-4 resume-sidebar-dark p-4">
        <?php if (!empty($resume['image'])): ?>
            <img src="../<?= e($resume['image']) ?>" style="width:140px;height:140px;object-fit:cover;border-radius:18px;" class="mb-3">
        <?php endif; ?>
        <h2 class="fw-bold"><?= e($resume['fullname']) ?></h2>
        <p><?= e($resume['email_id']) ?><br><?= e($resume['mobile_no']) ?><br><?= e($resume['address']) ?></p>
        <hr>
        <h5 class="fw-bold">Technical Skills</h5>
        <ul>
            <?php foreach ($resume['skills'] as $s): ?>
                <li><?= e($s['skill']) ?> <?= e($s['rating']) ?>%</li>
            <?php endforeach; ?>
        </ul>
        <h5 class="fw-bold mt-4">Soft Skills</h5>
        <ul>
            <?php foreach ($resume['soft_skills'] as $s): ?>
                <li><?= e($s['skill_name']) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
    <div class="col-md-8 p-5">
        <h4 class="fw-bold">Career Objective</h4>
        <p><?= nl2br(e($resume['objective'])) ?></p>
        <h4 class="fw-bold mt-4">Experience</h4>
        <?php foreach ($resume['work'] as $w): ?>
            <div class="mb-4">
                <div class="fw-bold"><?= e($w['job_role']) ?> | <?= e($w['company']) ?></div>
                <div class="small text-muted"><?= e($w['started']) ?> - <?= e($w['ended']) ?></div>
                <div><?= nl2br(e($w['description'])) ?></div>
            </div>
        <?php endforeach; ?>
        <h4 class="fw-bold mt-4">Education</h4>
        <?php foreach ($resume['education'] as $ed): ?>
            <div class="mb-3">
                <div class="fw-bold"><?= e($ed['board']) ?></div>
                <div><?= e($ed['institute_name']) ?></div>
                <div class="small text-muted"><?= e($ed['start_year']) ?> - <?= e($ed['end_year']) ?> | <?= e($ed['percentage']) ?></div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

</div>
<?php require_once __DIR__ . '/../includes/footer.php'; ?>
