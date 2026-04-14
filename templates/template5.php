<?php require_once __DIR__ . '/../includes/header.php'; ?>
<div class="print-btns no-print mb-3 d-flex gap-2">
    <button class="btn btn-dark" onclick="window.print()">Print / Save PDF</button>
    <a href="../dashboard.php" class="btn btn-outline-secondary">Back</a>
</div>
<div class="resume-shell rounded-4 overflow-hidden">

<div class="p-0">
    <div class="bg-dark text-white p-5">
        <div class="row align-items-center">
            <div class="col-md-9">
                <h1 class="fw-bold mb-2"><?= e($resume['fullname']) ?></h1>
                <div><?= e($resume['email_id']) ?> | <?= e($resume['mobile_no']) ?> | <?= e($resume['language']) ?></div>
                <div><?= e($resume['address']) ?></div>
            </div>
            <div class="col-md-3 text-md-end">
                <?php if (!empty($resume['image'])): ?>
                    <img src="../<?= e($resume['image']) ?>" style="width:120px;height:120px;object-fit:cover;border-radius:50%;">
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="p-5">
        <h4 class="fw-bold">Objective</h4>
        <p><?= nl2br(e($resume['objective'])) ?></p>
        <div class="row mt-4">
            <div class="col-md-6">
                <h4 class="fw-bold">Skills</h4>
                <ul>
                    <?php foreach ($resume['skills'] as $s): ?>
                        <li><?= e($s['skill']) ?> <?php if($s['rating']!==''): ?>- <?= e($s['rating']) ?>%<?php endif; ?></li>
                    <?php endforeach; ?>
                </ul>
                <h4 class="fw-bold mt-4">Soft Skills</h4>
                <ul>
                    <?php foreach ($resume['soft_skills'] as $s): ?>
                        <li><?= e($s['skill_name']) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="col-md-6">
                <h4 class="fw-bold">Education</h4>
                <?php foreach ($resume['education'] as $ed): ?>
                    <div class="mb-3">
                        <div class="fw-bold"><?= e($ed['board']) ?></div>
                        <div><?= e($ed['institute_name']) ?></div>
                        <div class="small text-muted"><?= e($ed['start_year']) ?> - <?= e($ed['end_year']) ?> | <?= e($ed['percentage']) ?></div>
                    </div>
                <?php endforeach; ?>
                <h4 class="fw-bold mt-4">Experience</h4>
                <?php foreach ($resume['work'] as $w): ?>
                    <div class="mb-3">
                        <div class="fw-bold"><?= e($w['job_role']) ?> - <?= e($w['company']) ?></div>
                        <div class="small text-muted"><?= e($w['started']) ?> - <?= e($w['ended']) ?></div>
                        <div><?= nl2br(e($w['description'])) ?></div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

</div>
<?php require_once __DIR__ . '/../includes/footer.php'; ?>
