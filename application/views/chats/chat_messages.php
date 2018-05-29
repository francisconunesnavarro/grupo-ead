<?php foreach ($chat as $f): ?>
    <li>
        <div class="tm-info">
            <div class="tm-icon" style="padding: 0px; border: 0px;">
                <img src="<?= $this->config->base_url(IMGPATH . $f['user_image']) ?>" class="img-circle" height="55px" />
            </div>
        </div>
        <div class="tm-box">
            <p>
                <?= $f['post'] ?>
            </p>
            <div class="tm-meta">
                <span>
                    <i class="fa fa-user"></i> <?= $f['user_name'] ?> - <?= $f['date'] ?>   <?= $f['hour'] ?>
                </span>
            </div>
        </div>
    </li>
<?php endforeach; ?>