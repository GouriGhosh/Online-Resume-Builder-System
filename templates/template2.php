<?php require_once __DIR__ . '/../includes/header.php'; ?>
<div class="print-btns no-print mb-3 d-flex gap-2">
    <button class="btn btn-dark" onclick="window.print()">Print / Save PDF</button>
    <a href="../dashboard.php" class="btn btn-outline-secondary">Back</a>
</div>
<div class="resume-shell rounded-4 overflow-hidden">

<div class="row g-0">
    <div class="col-md-4 bg-light p-4">
        <?php if (!empty($resume['image'])): ?>
            <img src="../<?= e($resume['image']) ?>" style="width:140px;height:140px;object-fit:cover;border-radius:50%;" class="mb-3">
        <?php endif; ?>
        <h2 class="fw-bold"><?= e($resume['fullname']) ?></h2>
        <p class="mb-1"><?= e($resume['email_id']) ?></p>
        <p class="mb-1"><?= e($resume['mobile_no']) ?></p>
        <p><?= e($resume['address']) ?></p>
        <hr>
        <h5 class="fw-bold">Personal</h5>
        <p class="mb-1"><strong>Gender:</strong> <?= e($resume['gender']) ?></p>
        <p class="mb-1"><strong>Marital:</strong> <?= e($resume['marital']) ?></p>
        <p class="mb-1"><strong>Nationality:</strong> <?= e($resume['nationality']) ?></p>
        <p class="mb-1"><strong>Languages:</strong> <?= e($resume['language']) ?></p>
        <hr>
        <h5 class="fw-bold">Soft Skills</h5>
        <ul>
            <?php foreach ($resume['soft_skills'] as $s): ?>
                <li><?= e($s['skill_name']) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
    <div class="col-md-8 p-5">
        <h4 class="fw-bold">Objective</h4>
        <p><?= nl2br(e($resume['objective'])) ?></p>
        <h4 class="fw-bold mt-4">Technical Skills</h4>
        <ul>
            <?php foreach ($resume['skills'] as $s): ?>
                <li><?= e($s['skill']) ?> <?php if($s['rating']!==''): ?>(<?= e($s['rating']) ?>%)<?php endif; ?></li>
            <?php endforeach; ?>
        </ul>
        <h4 class="fw-bold mt-4">Experience</h4>
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

</div>
<?php require_once __DIR__ . '/../includes/footer.php'; ?>
