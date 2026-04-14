<?php require_once __DIR__ . '/../includes/header.php'; ?>
<div class="print-btns no-print mb-3 d-flex gap-2">
    <button class="btn btn-dark" onclick="window.print()">Print / Save PDF</button>
    <a href="../dashboard.php" class="btn btn-outline-secondary">Back</a>
</div>
<div class="resume-shell rounded-4 overflow-hidden">

<div class="p-5">
    <div class="row">
        <div class="col-md-8">
            <h1 class="fw-bold mb-1"><?= e($resume['fullname']) ?></h1>
            <div class="text-primary fw-semibold mb-3"><?= e($resume['email_id']) ?> | <?= e($resume['mobile_no']) ?></div>
            <p><?= nl2br(e($resume['objective'])) ?></p>
        </div>
        <div class="col-md-4 text-md-end">
            <?php if (!empty($resume['image'])): ?>
                <img src="../<?= e($resume['image']) ?>" style="width:120px;height:120px;object-fit:cover;border-radius:18px;">
            <?php endif; ?>
            <div class="small text-muted mt-2"><?= e($resume['address']) ?></div>
        </div>
    </div>
    <hr>
    <h4 class="fw-bold mt-4">Skills</h4>
    <div class="row">
        <?php foreach ($resume['skills'] as $s): ?>
            <div class="col-md-6 mb-2"><?= e($s['skill']) ?><?php if($s['rating']!==''): ?> - <?= e($s['rating']) ?>%<?php endif; ?></div>
        <?php endforeach; ?>
    </div>
    <h4 class="fw-bold mt-4">Work Experience</h4>
    <?php foreach ($resume['work'] as $w): ?>
        <div class="mb-3">
            <div class="fw-bold"><?= e($w['job_role']) ?> - <?= e($w['company']) ?></div>
            <div class="text-muted small"><?= e($w['started']) ?> - <?= e($w['ended']) ?></div>
            <div><?= nl2br(e($w['description'])) ?></div>
        </div>
    <?php endforeach; ?>
    <h4 class="fw-bold mt-4">Education</h4>
    <?php foreach ($resume['education'] as $ed): ?>
        <div class="mb-3">
            <div class="fw-bold"><?= e($ed['board']) ?></div>
            <div><?= e($ed['institute_name']) ?></div>
            <div class="text-muted small"><?= e($ed['start_year']) ?> - <?= e($ed['end_year']) ?> | <?= e($ed['percentage']) ?></div>
        </div>
    <?php endforeach; ?>
</div>

</div>
<?php require_once __DIR__ . '/../includes/footer.php'; ?>
