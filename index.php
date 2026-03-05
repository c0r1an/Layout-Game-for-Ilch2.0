<?php /** @var $this \Ilch\Layout\Frontend */ ?>
<?php
$siteName = trim((string) $this->getLayoutSetting('siteName'));
$siteTagline = trim((string) $this->getLayoutSetting('siteTagline'));
$footerCopyright = trim((string) $this->getLayoutSetting('footerCopyright'));
$siteLogo = trim((string) $this->getLayoutSetting('siteLogo'));
$request = $this->getRequest();
$requestModule = strtolower((string) $request->getModuleName());
$requestController = strtolower((string) $request->getControllerName());
$requestAction = strtolower((string) $request->getActionName());
$startPage = strtolower((string) $this->getConfigKey('start_page'));
$isHomePage = false;

if (strpos($startPage, 'module_') === 0) {
    $startModule = substr($startPage, 7);
    $isHomePage = $requestModule === $startModule
        && ($requestController === '' || $requestController === 'index')
        && ($requestAction === '' || $requestAction === 'index');
} elseif (strpos($startPage, 'page_') === 0) {
    $startPageId = substr($startPage, 5);
    $isHomePage = $requestModule === 'admin'
        && $requestController === 'page'
        && $requestAction === 'show'
        && (string) $request->getParam('id') === (string) $startPageId;
} elseif (strpos($startPage, 'layouts_') === 0) {
    $startLayoutModule = substr($startPage, 8);
    $isHomePage = $requestModule === $startLayoutModule
        && ($requestController === '' || $requestController === 'index')
        && ($requestAction === '' || $requestAction === 'index');
} else {
    $isHomePage = $requestModule === 'index'
        && ($requestController === '' || $requestController === 'index')
        && ($requestAction === '' || $requestAction === 'index');
}
$showSidebarBoxes = $this->getLayoutSetting('sidebarBoxes') == 1;
$sidebarBoxes = $showSidebarBoxes ? trim($this->getMenu(2, '<section class="game-widget game-widget-boxes"><h3>%s</h3><div class="game-widget-content">%c</div></section>')) : '';
$sliderAutoplay = $this->getLayoutSetting('sliderAutoplay') == 1;
$sliderInterval = max(2000, (int) $this->getLayoutSetting('sliderInterval'));
$sliderId = 'gameShowcaseSlider';
$sliderItems = [];
$platformCards = [];
$socialWidgetTitle = trim((string) $this->getLayoutSetting('socialWidgetTitle'));
$socialItems = [];
$latestVideoTitle = trim((string) $this->getLayoutSetting('latestVideoTitle'));
$latestVideoSource = trim((string) $this->getLayoutSetting('latestVideoSource'));
$latestVideoUrl = trim((string) $this->getLayoutSetting('latestVideoUrl'));
$latestVideoFile = trim((string) $this->getLayoutSetting('latestVideoFile'));
$latestVideoAutoplay = $this->getLayoutSetting('latestVideoAutoplay') == 1;
$latestVideoMuted = $this->getLayoutSetting('latestVideoMuted') == 1;
$latestVideoType = 'placeholder';
$latestVideoSrc = '';
$showCardRow = $this->getLayoutSetting('cardRowEnabled') == 1;
$cardRowVisibility = trim((string) $this->getLayoutSetting('cardRowVisibility'));
$featureCards = [];
$copyrightText = $footerCopyright !== ''
    ? str_replace('{year}', date('Y'), $footerCopyright)
    : 'Copyright © ' . date('Y') . ' ' . $siteName;
$matchRows = [
    ['left' => 'Queen', 'score' => '1:1', 'right' => 'Military Skull'],
    ['left' => 'Wolves', 'score' => '15:5', 'right' => 'Reaper'],
    ['left' => 'Reaper', 'score' => '8:6', 'right' => 'Military Skull'],
];
$galleryCards = [1, 2, 3, 4, 5, 6];
$shopCards = [
    ['badge' => '', 'title' => 'A hundred thousand', 'price' => '$26.00'],
    ['badge' => '', 'title' => 'She was downed', 'price' => '$28.00'],
    ['badge' => 'Sale', 'title' => 'Just this his head', 'price' => '$49.90 - $69.00'],
    ['badge' => '', 'title' => 'In all revolutions of', 'price' => '$23.00'],
];

$extractYouTubeId = static function ($url) {
    $parts = parse_url((string) $url);
    if (!$parts) {
        return '';
    }

    $host = strtolower((string) ($parts['host'] ?? ''));
    $path = trim((string) ($parts['path'] ?? ''), '/');

    if ($host === 'youtu.be') {
        return $path;
    }

    if (strpos($host, 'youtube.com') !== false) {
        if ($path === 'watch') {
            parse_str((string) ($parts['query'] ?? ''), $query);
            return (string) ($query['v'] ?? '');
        }

        if (strpos($path, 'embed/') === 0) {
            return substr($path, 6);
        }

        if (strpos($path, 'shorts/') === 0) {
            return substr($path, 7);
        }
    }

    return '';
};

$extractVimeoId = static function ($url) {
    $parts = parse_url((string) $url);
    if (!$parts) {
        return '';
    }

    $host = strtolower((string) ($parts['host'] ?? ''));
    if (strpos($host, 'vimeo.com') === false) {
        return '';
    }

    $path = trim((string) ($parts['path'] ?? ''), '/');
    if ($path === '') {
        return '';
    }

    $segments = explode('/', $path);
    $lastSegment = end($segments);
    return preg_match('/^\d+$/', (string) $lastSegment) ? (string) $lastSegment : '';
};

switch ($latestVideoSource) {
    case 'youtube':
        $youtubeId = $extractYouTubeId($latestVideoUrl);
        if ($youtubeId !== '') {
            $latestVideoType = 'iframe';
            $latestVideoSrc = 'https://www.youtube.com/embed/' . rawurlencode($youtubeId)
                . '?rel=0&modestbranding=1&autoplay=' . ($latestVideoAutoplay ? '1' : '0')
                . '&mute=' . ($latestVideoMuted ? '1' : '0');
        }
        break;
    case 'vimeo':
        $vimeoId = $extractVimeoId($latestVideoUrl);
        if ($vimeoId !== '') {
            $latestVideoType = 'iframe';
            $latestVideoSrc = 'https://player.vimeo.com/video/' . rawurlencode($vimeoId)
                . '?autoplay=' . ($latestVideoAutoplay ? '1' : '0')
                . '&muted=' . ($latestVideoMuted ? '1' : '0');
        }
        break;
    case 'mp4':
        if ($latestVideoFile !== '') {
            $latestVideoType = 'video';
            $latestVideoSrc = $this->getBaseUrl($latestVideoFile);
        } elseif ($latestVideoUrl !== '') {
            $latestVideoType = 'video';
            $latestVideoSrc = $latestVideoUrl;
        }
        break;
    case 'embed':
        if (filter_var($latestVideoUrl, FILTER_VALIDATE_URL)) {
            $latestVideoType = 'iframe';
            $latestVideoSrc = $latestVideoUrl;
        }
        break;
}

for ($platformIndex = 1; $platformIndex <= 3; $platformIndex++) {
    $platformCards[] = [
        'icon' => trim((string) $this->getLayoutSetting('platformIcon' . $platformIndex)),
        'title' => trim((string) $this->getLayoutSetting('platformTitle' . $platformIndex)),
        'text' => trim((string) $this->getLayoutSetting('platformText' . $platformIndex)),
        'url' => trim((string) $this->getLayoutSetting('platformUrl' . $platformIndex)),
    ];
}

for ($socialIndex = 1; $socialIndex <= 6; $socialIndex++) {
    $icon = trim((string) $this->getLayoutSetting('socialItem' . $socialIndex . 'Icon'));
    $url = trim((string) $this->getLayoutSetting('socialItem' . $socialIndex . 'Url'));

    if ($icon === '') {
        continue;
    }

    $socialItems[] = [
        'icon' => $icon,
        'url' => $url,
    ];
}

for ($slideIndex = 1; $slideIndex <= 3; $slideIndex++) {
    $title = trim((string) $this->getLayoutSetting('sliderTitle' . $slideIndex));
    $text = trim((string) $this->getLayoutSetting('sliderText' . $slideIndex));
    $leftImage = trim((string) $this->getLayoutSetting('sliderLeftImage' . $slideIndex));
    $centerImage = trim((string) $this->getLayoutSetting('sliderCenterImage' . $slideIndex));

    if ($title === '' && $text === '' && $leftImage === '' && $centerImage === '') {
        continue;
    }

    $fallbackClass = 'game-art-' . chr(96 + $slideIndex);

    $sliderItems[] = [
        'tag' => trim((string) $this->getLayoutSetting('sliderTag' . $slideIndex)),
        'title' => $title,
        'text' => $text,
        'buttonLabel' => trim((string) $this->getLayoutSetting('sliderButtonLabel' . $slideIndex)),
        'buttonUrl' => trim((string) $this->getLayoutSetting('sliderButtonUrl' . $slideIndex)),
        'leftImage' => $leftImage,
        'centerImage' => $centerImage,
        'fallbackClass' => $fallbackClass,
        'hasSplitMedia' => $centerImage !== '',
    ];
}

for ($cardIndex = 1; $cardIndex <= 4; $cardIndex++) {
    if ($this->getLayoutSetting('card' . $cardIndex . 'Enabled') != 1) {
        continue;
    }

    $cardTitle = trim((string) $this->getLayoutSetting('card' . $cardIndex . 'Title'));
    $cardText = trim((string) $this->getLayoutSetting('card' . $cardIndex . 'Text'));
    $cardImage = trim((string) $this->getLayoutSetting('card' . $cardIndex . 'Image'));

    if ($cardTitle === '' && $cardText === '' && $cardImage === '') {
        continue;
    }

    $featureCards[] = [
        'tag' => trim((string) $this->getLayoutSetting('card' . $cardIndex . 'Tag')),
        'title' => $cardTitle,
        'text' => $cardText,
        'url' => trim((string) $this->getLayoutSetting('card' . $cardIndex . 'Url')),
        'image' => $cardImage,
        'fallbackClass' => 'game-art-' . chr(101 + $cardIndex),
    ];
}
?>
<!DOCTYPE html>
<html lang="de" data-bs-theme="dark">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <?=$this->getHeader() ?>
    <link href="<?=$this->getVendorUrl('twbs/bootstrap/dist/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?=$this->getLayoutUrl('assets/css/ckeditor-frontend.css') ?>" rel="stylesheet">
    <link href="<?=$this->getLayoutUrl('assets/css/global.css') ?>" rel="stylesheet">
    <link href="<?=$this->getLayoutUrl('assets/css/style.css') ?>" rel="stylesheet">
    <?=$this->getCustomCSS() ?>
    <script src="<?=$this->getVendorUrl('twbs/bootstrap/dist/js/bootstrap.bundle.min.js') ?>"></script>
    <style>
        :root {
            --game-accent: <?=$this->getLayoutSetting('accentColor') ?>;
            --game-accent-soft: <?=$this->getLayoutSetting('accentSoftColor') ?>;
            --game-page-max-width: <?=trim((string) $this->getLayoutSetting('contentMaxWidth')) ?: '1480px' ?>;
        }
    </style>
</head>
<body class="game-theme">
    <div class="game-shell">
        <header class="game-header">
            <div class="game-page">
                <div class="game-header-bar">
                    <a class="game-brand" href="<?=$this->getUrl() ?>">
                        <span class="game-brand-mark<?=$siteLogo !== '' ? ' has-image' : '' ?>">
                            <?php if ($siteLogo !== ''): ?>
                                <img src="<?=$this->getBaseUrl($siteLogo) ?>" alt="<?=$this->escape($siteName) ?>">
                            <?php endif; ?>
                        </span>
                        <span class="game-brand-copy">
                            <strong><?=$this->escape($siteName) ?></strong>
                            <small><?=$this->escape($siteTagline) ?></small>
                        </span>
                    </a>
                    <button class="game-nav-toggle" type="button" data-game-nav-toggle aria-label="">
                        <span></span><span></span><span></span>
                    </button>
                    <nav class="game-nav" data-game-nav>
                        <ul>
                            <?=$this->getMenu(1, '<li>%c</li>', [
                                'menus' => ['ul-class-root' => '', 'ul-class-child' => '', 'allow-nesting' => false],
                                'boxes' => ['render' => false],
                            ]) ?>
                        </ul>
                    </nav>
                </div>
            </div>
        </header>

        <main class="game-main">
            <div class="game-page">
                <section class="game-hero">
                    <div class="game-hero-grid">
                        <div id="<?=$sliderId ?>" class="carousel slide game-showcase-slider" data-bs-ride="<?=$sliderAutoplay ? 'carousel' : 'false' ?>" data-bs-interval="<?=$sliderAutoplay ? $sliderInterval : 'false' ?>">
                            <?php if (count($sliderItems) > 1): ?>
                                <div class="carousel-indicators game-showcase-indicators">
                                    <?php foreach ($sliderItems as $index => $sliderItem): ?>
                                        <button type="button" data-bs-target="#<?=$sliderId ?>" data-bs-slide-to="<?=$index ?>" class="<?=$index === 0 ? 'active' : '' ?>" <?=$index === 0 ? 'aria-current="true"' : '' ?> aria-label="Slide <?=$index + 1 ?>"></button>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
                            <div class="carousel-inner">
                                <?php foreach ($sliderItems as $index => $sliderItem): ?>
                                    <div class="carousel-item<?=$index === 0 ? ' active' : '' ?>">
                                        <article class="game-showcase<?=$sliderItem['hasSplitMedia'] ? ' has-split-media' : '' ?>">
                                            <div class="game-showcase-stage<?=$sliderItem['leftImage'] === '' ? ' ' . $sliderItem['fallbackClass'] : '' ?>">
                                                <?php if ($sliderItem['leftImage'] !== ''): ?><img src="<?=$this->getBaseUrl($sliderItem['leftImage']) ?>" alt="<?=$this->escape($sliderItem['title']) ?>"><?php endif; ?>
                                            </div>
                                            <?php if ($sliderItem['hasSplitMedia']): ?>
                                                <div class="game-showcase-stage game-showcase-stage-secondary">
                                                    <img src="<?=$this->getBaseUrl($sliderItem['centerImage']) ?>" alt="<?=$this->escape($sliderItem['title']) ?>">
                                                </div>
                                            <?php endif; ?>
                                            <div class="game-showcase-copy">
                                                <?php if ($sliderItem['tag'] !== ''): ?><p class="game-kicker"><?=$this->escape($sliderItem['tag']) ?></p><?php endif; ?>
                                                <?php if ($sliderItem['title'] !== ''): ?><h1><?=$this->escape($sliderItem['title']) ?></h1><?php endif; ?>
                                                <?php if ($sliderItem['text'] !== ''): ?><p><?=$this->escape($sliderItem['text']) ?></p><?php endif; ?>
                                                <?php if ($sliderItem['buttonLabel'] !== '' && $sliderItem['buttonUrl'] !== ''): ?><a class="game-showcase-link" href="<?=$sliderItem['buttonUrl'] ?>"><?=$this->escape($sliderItem['buttonLabel']) ?></a><?php endif; ?>
                                            </div>
                                        </article>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <?php if (count($sliderItems) > 1): ?>
                                <button class="carousel-control-prev game-showcase-control" type="button" data-bs-target="#<?=$sliderId ?>" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next game-showcase-control" type="button" data-bs-target="#<?=$sliderId ?>" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            <?php endif; ?>
                        </div>
                        <div class="game-platforms">
                            <?php foreach ($platformCards as $platformCard): ?>
                                <?php if ($platformCard['title'] !== '' || $platformCard['text'] !== ''): ?>
                                    <a class="game-platform-card" href="<?=$platformCard['url'] !== '' ? $platformCard['url'] : '#' ?>">
                                        <span class="game-platform-icon">
                                            <?php if ($platformCard['icon'] !== ''): ?>
                                                <i class="<?=$this->escape($platformCard['icon']) ?>"></i>
                                            <?php else: ?>
                                                &#x1F3AE;
                                            <?php endif; ?>
                                        </span>
                                        <span>
                                            <?php if ($platformCard['title'] !== ''): ?><strong><?=$this->escape($platformCard['title']) ?></strong><?php endif; ?>
                                            <?php if ($platformCard['text'] !== ''): ?><small><?=$this->escape($platformCard['text']) ?></small><?php endif; ?>
                                        </span>
                                    </a>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </section>

                <div class="game-content-grid">
                    <div class="game-primary">
                        <section class="game-section">
                            <?php if ($isHomePage): ?>
                                <div class="game-panel game-article-box-panel">
                                    <?=$this->getBox('article', 'article') ?>
                                </div>
                            <?php endif; ?>
                            <?php if ($showCardRow && ($cardRowVisibility === 'all' || $isHomePage) && !empty($featureCards)): ?>
                                <div class="game-card-row">
                                    <?php foreach ($featureCards as $featureCard): ?>
                                        <article class="game-news-card">
                                            <?php if ($featureCard['tag'] !== ''): ?><span class="game-badge"><?=$this->escape($featureCard['tag']) ?></span><?php endif; ?>
                                            <div class="game-card-image<?=$featureCard['image'] === '' ? ' ' . $featureCard['fallbackClass'] : '' ?>">
                                                <?php if ($featureCard['image'] !== ''): ?>
                                                    <img src="<?=$this->getBaseUrl($featureCard['image']) ?>" alt="<?=$this->escape($featureCard['title']) ?>">
                                                <?php endif; ?>
                                            </div>
                                            <?php if ($featureCard['title'] !== ''): ?><h3><?=$this->escape($featureCard['title']) ?></h3><?php endif; ?>
                                            <?php if ($featureCard['text'] !== ''): ?><p><?=$this->escape($featureCard['text']) ?></p><?php endif; ?>
                                            <?php if ($featureCard['url'] !== ''): ?><a href="<?=$this->escape($featureCard['url']) ?>">Read more</a><?php endif; ?>
                                        </article>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
                        </section>

                        <section class="game-section">
                            <div class="game-section-head"><h2>Community Feed</h2></div>
                            <div class="game-panel">
                                <div class="game-breadcrumbs"><?=$this->getHmenu() ?></div>
                                <div class="game-panel-body"><?=$this->getContent() ?></div>
                            </div>
                        </section>

                    </div>

                    <aside class="game-sidebar">
                        <section class="game-widget">
                            <h3><?=$this->escape($socialWidgetTitle !== '' ? $socialWidgetTitle : 'We Are Social') ?></h3>
                            <div class="game-social-grid">
                                <?php foreach ($socialItems as $socialItem): ?>
                                    <a href="<?=$socialItem['url'] !== '' ? $socialItem['url'] : '#' ?>"><i class="<?=$this->escape($socialItem['icon']) ?>"></i></a>
                                <?php endforeach; ?>
                            </div>
                        </section>

                        <section class="game-widget">
                            <h3><?=$this->escape($latestVideoTitle !== '' ? $latestVideoTitle : 'Latest Video') ?></h3>
                            <?php if ($latestVideoType === 'iframe' && $latestVideoSrc !== ''): ?>
                                <div class="game-video-embed">
                                    <iframe
                                        src="<?=$this->escape($latestVideoSrc) ?>"
                                        title="<?=$this->escape($latestVideoTitle !== '' ? $latestVideoTitle : 'Latest Video') ?>"
                                        loading="lazy"
                                        allow="autoplay; encrypted-media; picture-in-picture; web-share"
                                        allowfullscreen
                                    ></iframe>
                                </div>
                            <?php elseif ($latestVideoType === 'video' && $latestVideoSrc !== ''): ?>
                                <div class="game-video-embed">
                                    <video controls preload="metadata" playsinline<?=$latestVideoAutoplay ? ' autoplay' : '' ?><?=$latestVideoMuted ? ' muted' : '' ?>>
                                        <source src="<?=$this->escape($latestVideoSrc) ?>" type="video/mp4">
                                    </video>
                                </div>
                            <?php else: ?>
                                <div class="game-sidebar-video game-art-t"><span class="game-play-button"></span></div>
                            <?php endif; ?>
                        </section>

                        <?=$sidebarBoxes ?>
                    </aside>
                </div>
            </div>
        </main>

        <footer class="game-footer">
            <div class="game-page">
                <div class="game-footer-bottom">
                    <span><?=$this->escape($copyrightText) ?></span>
                    <div class="game-footer-icons">
                        <?php foreach ($socialItems as $socialItem): ?>
                            <a href="<?=$socialItem['url'] !== '' ? $socialItem['url'] : '#' ?>">
                                <i class="<?=$this->escape($socialItem['icon']) ?>"></i>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <?=$this->getFooter() ?>
    <script>window.jQuery || document.write('<script src="<?=$this->getVendorUrl('npm-asset/jquery/dist/jquery.min.js') ?>">\x3C/script>')</script>
    <script src="<?=$this->getLayoutUrl('assets/js/main.js') ?>"></script>
</body>
</html>
