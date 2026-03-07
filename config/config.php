<?php

namespace Layouts\Game\Config;

class Config extends \Ilch\Config\Install
{
    public $config = [
        'name' => 'Game',
        'version' => '1.0.0',
        'ilchCore' => '2.2.0',
        'author' => 'c0r1an',
        'link' => 'https://ilch.de',
        'desc' => 'Dunkles Gaming-Layout im Stil einer E-Sports Landingpage mit Magazin-Blöcken und rechter Sidebar.',
        'layouts' => [
            'panel' => [
                ['module' => 'user', 'controller' => 'login'],
                ['module' => 'user', 'controller' => 'regist'],
            ],
        ],
        'settings' => [
            'generalSection' => [
                'type' => 'separator',
            ],
            'siteName' => [
                'type' => 'text',
                'default' => 'Ilch Game',
                'description' => '',
            ],
            'siteTagline' => [
                'type' => 'text',
                'default' => 'Gaming Community Netzwerk',
                'description' => '',
            ],
            'footerCopyright' => [
                'type' => 'text',
                'default' => 'Copyright © {year} Ilch Game',
                'description' => '',
            ],
            'siteLogo' => [
                'type' => 'text',
                'default' => '',
                'description' => '',
            ],
            'accentColor' => [
                'type' => 'colorpicker',
                'default' => '#ff1848',
                'description' => '',
            ],
            'accentSoftColor' => [
                'type' => 'colorpicker',
                'default' => '#ff5b8c',
                'description' => '',
            ],
            'sidebarBoxes' => [
                'type' => 'flipswitch',
                'default' => '1',
                'description' => '',
            ],
            'contentMaxWidth' => [
                'type' => 'text',
                'default' => '1480px',
                'description' => '',
            ],
            'sliderSection' => [
                'type' => 'separator',
            ],
            'sliderAutoplay' => [
                'type' => 'flipswitch',
                'default' => '1',
                'description' => '',
            ],
            'sliderInterval' => [
                'type' => 'text',
                'default' => '5000',
                'description' => '',
            ],
            'sliderTag1' => [
                'type' => 'text',
                'default' => 'Titelstory',
                'description' => '',
            ],
            'sliderTitle1' => [
                'type' => 'text',
                'default' => 'Er machte seinen Passagier zum Captain',
                'description' => '',
            ],
            'sliderText1' => [
                'type' => 'textarea',
                'default' => 'Ein showcase-orientiertes Layout für Clans, E-Sports-Teams und Gaming-Communities.',
                'description' => '',
            ],
            'sliderButtonLabel1' => [
                'type' => 'text',
                'default' => 'Mehr lesen',
                'description' => '',
            ],
            'sliderButtonUrl1' => [
                'type' => 'url',
                'default' => '',
                'description' => '',
            ],
            'sliderLeftImage1' => [
                'type' => 'text',
                'default' => '',
                'description' => '',
            ],
            'sliderCenterImage1' => [
                'type' => 'text',
                'default' => '',
                'description' => '',
            ],
            'sliderTag2' => [
                'type' => 'text',
                'default' => 'Aktuelle Kampagne',
                'description' => '',
            ],
            'sliderTitle2' => [
                'type' => 'text',
                'default' => 'Baue dein nächstes Highlight',
                'description' => '',
            ],
            'sliderText2' => [
                'type' => 'textarea',
                'default' => 'Nutze den zweiten Slide für Aktionen, Team-Updates oder Match-Ankündigungen.',
                'description' => '',
            ],
            'sliderButtonLabel2' => [
                'type' => 'text',
                'default' => 'Update ansehen',
                'description' => '',
            ],
            'sliderButtonUrl2' => [
                'type' => 'url',
                'default' => '',
                'description' => '',
            ],
            'sliderLeftImage2' => [
                'type' => 'text',
                'default' => '',
                'description' => '',
            ],
            'sliderCenterImage2' => [
                'type' => 'text',
                'default' => '',
                'description' => '',
            ],
            'sliderTag3' => [
                'type' => 'text',
                'default' => 'Turnier',
                'description' => '',
            ],
            'sliderTitle3' => [
                'type' => 'text',
                'default' => 'Setze eine Hero-Story über volle Breite',
                'description' => '',
            ],
            'sliderText3' => [
                'type' => 'textarea',
                'default' => 'Nutze den dritten Slide für Event-Trailer, Top-Artikel oder Sponsor-Kampagnen.',
                'description' => '',
            ],
            'sliderButtonLabel3' => [
                'type' => 'text',
                'default' => 'Artikel öffnen',
                'description' => '',
            ],
            'sliderButtonUrl3' => [
                'type' => 'url',
                'default' => '',
                'description' => '',
            ],
            'sliderLeftImage3' => [
                'type' => 'text',
                'default' => '',
                'description' => '',
            ],
            'sliderCenterImage3' => [
                'type' => 'text',
                'default' => '',
                'description' => '',
            ],
            'platformSection' => [
                'type' => 'separator',
            ],
            'platformIcon1' => [
                'type' => 'text',
                'default' => 'fa-solid fa-desktop',
                'description' => '',
                'options' => [],
            ],
            'platformTitle1' => [
                'type' => 'text',
                'default' => 'PC',
                'description' => '',
            ],
            'platformText1' => [
                'type' => 'text',
                'default' => 'Spiele ansehen',
                'description' => '',
            ],
            'platformUrl1' => [
                'type' => 'url',
                'default' => '',
                'description' => '',
            ],
            'platformIcon2' => [
                'type' => 'text',
                'default' => 'fa-brands fa-playstation',
                'description' => '',
                'options' => [],
            ],
            'platformTitle2' => [
                'type' => 'text',
                'default' => 'PS5',
                'description' => '',
            ],
            'platformText2' => [
                'type' => 'text',
                'default' => 'Spiele ansehen',
                'description' => '',
            ],
            'platformUrl2' => [
                'type' => 'url',
                'default' => '',
                'description' => '',
            ],
            'platformIcon3' => [
                'type' => 'text',
                'default' => 'fa-brands fa-xbox',
                'description' => '',
                'options' => [],
            ],
            'platformTitle3' => [
                'type' => 'text',
                'default' => 'Xbox',
                'description' => '',
            ],
            'platformText3' => [
                'type' => 'text',
                'default' => 'Spiele ansehen',
                'description' => '',
            ],
            'platformUrl3' => [
                'type' => 'url',
                'default' => '',
                'description' => '',
            ],
            'cardRowSection' => [
                'type' => 'separator',
            ],
            'cardRowEnabled' => [
                'type' => 'flipswitch',
                'default' => '1',
                'description' => '',
            ],
            'cardRowVisibility' => [
                'type' => 'select',
                'default' => 'home',
                'description' => '',
                'options' => [],
            ],
            'card1Enabled' => [
                'type' => 'flipswitch',
                'default' => '1',
                'description' => '',
            ],
            'card1Tag' => [
                'type' => 'text',
                'default' => 'Neu',
                'description' => '',
            ],
            'card1Title' => [
                'type' => 'text',
                'default' => 'Neuer Beitrag aus deinem Bereich',
                'description' => '',
            ],
            'card1Text' => [
                'type' => 'textarea',
                'default' => 'Kurzer Teasertext passend zum Layoutstil.',
                'description' => '',
            ],
            'card1Url' => [
                'type' => 'url',
                'default' => '',
                'description' => '',
            ],
            'card1Image' => [
                'type' => 'text',
                'default' => '',
                'description' => '',
            ],
            'card2Enabled' => [
                'type' => 'flipswitch',
                'default' => '1',
                'description' => '',
            ],
            'card2Tag' => [
                'type' => 'text',
                'default' => 'Story',
                'description' => '',
            ],
            'card2Title' => [
                'type' => 'text',
                'default' => 'Wir haben eine Hexe gefunden',
                'description' => '',
            ],
            'card2Text' => [
                'type' => 'textarea',
                'default' => 'Kurzer Teasertext passend zum Layoutstil.',
                'description' => '',
            ],
            'card2Url' => [
                'type' => 'url',
                'default' => '',
                'description' => '',
            ],
            'card2Image' => [
                'type' => 'text',
                'default' => '',
                'description' => '',
            ],
            'card3Enabled' => [
                'type' => 'flipswitch',
                'default' => '1',
                'description' => '',
            ],
            'card3Tag' => [
                'type' => 'text',
                'default' => 'Info',
                'description' => '',
            ],
            'card3Title' => [
                'type' => 'text',
                'default' => 'Wichtige Neuigkeiten und Updates',
                'description' => '',
            ],
            'card3Text' => [
                'type' => 'textarea',
                'default' => 'Kurzer Teasertext passend zum Layoutstil.',
                'description' => '',
            ],
            'card3Url' => [
                'type' => 'url',
                'default' => '',
                'description' => '',
            ],
            'card3Image' => [
                'type' => 'text',
                'default' => '',
                'description' => '',
            ],
            'card4Enabled' => [
                'type' => 'flipswitch',
                'default' => '1',
                'description' => '',
            ],
            'card4Tag' => [
                'type' => 'text',
                'default' => 'Aktion',
                'description' => '',
            ],
            'card4Title' => [
                'type' => 'text',
                'default' => 'Verpasse keine wichtigen Aktionen',
                'description' => '',
            ],
            'card4Text' => [
                'type' => 'textarea',
                'default' => 'Kurzer Teasertext passend zum Layoutstil.',
                'description' => '',
            ],
            'card4Url' => [
                'type' => 'url',
                'default' => '',
                'description' => '',
            ],
            'card4Image' => [
                'type' => 'text',
                'default' => '',
                'description' => '',
            ],
            'videoWidgetSection' => [
                'type' => 'separator',
            ],
            'latestVideoTitle' => [
                'type' => 'text',
                'default' => 'Neuestes Video',
                'description' => '',
            ],
            'latestVideoSource' => [
                'type' => 'select',
                'default' => 'youtube',
                'description' => '',
                'options' => [],
            ],
            'latestVideoUrl' => [
                'type' => 'url',
                'default' => '',
                'description' => '',
            ],
            'latestVideoFile' => [
                'type' => 'text',
                'default' => '',
                'description' => '',
            ],
            'latestVideoAutoplay' => [
                'type' => 'flipswitch',
                'default' => '0',
                'description' => '',
            ],
            'latestVideoMuted' => [
                'type' => 'flipswitch',
                'default' => '1',
                'description' => '',
            ],
            'socialWidgetSection' => [
                'type' => 'separator',
            ],
            'socialWidgetTitle' => [
                'type' => 'text',
                'default' => 'Wir sind Social',
                'description' => '',
            ],
            'socialItem1Icon' => [
                'type' => 'text',
                'default' => 'fa-brands fa-facebook-f',
                'description' => '',
                'options' => [],
            ],
            'socialItem1Url' => [
                'type' => 'url',
                'default' => '',
                'description' => '',
            ],
            'socialItem2Icon' => [
                'type' => 'text',
                'default' => 'fa-brands fa-x-twitter',
                'description' => '',
                'options' => [],
            ],
            'socialItem2Url' => [
                'type' => 'url',
                'default' => '',
                'description' => '',
            ],
            'socialItem3Icon' => [
                'type' => 'text',
                'default' => 'fa-brands fa-instagram',
                'description' => '',
                'options' => [],
            ],
            'socialItem3Url' => [
                'type' => 'url',
                'default' => '',
                'description' => '',
            ],
            'socialItem4Icon' => [
                'type' => 'text',
                'default' => 'fa-brands fa-youtube',
                'description' => '',
                'options' => [],
            ],
            'socialItem4Url' => [
                'type' => 'url',
                'default' => '',
                'description' => '',
            ],
            'socialItem5Icon' => [
                'type' => 'text',
                'default' => 'fa-brands fa-twitch',
                'description' => '',
                'options' => [],
            ],
            'socialItem5Url' => [
                'type' => 'url',
                'default' => '',
                'description' => '',
            ],
            'socialItem6Icon' => [
                'type' => 'text',
                'default' => 'fa-brands fa-discord',
                'description' => '',
                'options' => [],
            ],
            'socialItem6Url' => [
                'type' => 'url',
                'default' => '',
                'description' => '',
            ],
        ],
    ];

    public function __construct()
    {
        $platformIconOptions = $this->getPlatformIconOptions();
        $socialIconOptions = $this->getSocialIconOptions();
        $videoSourceOptions = $this->getVideoSourceOptions();
        $this->config['settings']['platformIcon1']['options'] = $platformIconOptions;
        $this->config['settings']['platformIcon2']['options'] = $platformIconOptions;
        $this->config['settings']['platformIcon3']['options'] = $platformIconOptions;
        $this->config['settings']['cardRowVisibility']['options'] = $this->getCardVisibilityOptions();
        $this->config['settings']['latestVideoSource']['options'] = $videoSourceOptions;
        $this->config['settings']['socialItem1Icon']['options'] = $socialIconOptions;
        $this->config['settings']['socialItem2Icon']['options'] = $socialIconOptions;
        $this->config['settings']['socialItem3Icon']['options'] = $socialIconOptions;
        $this->config['settings']['socialItem4Icon']['options'] = $socialIconOptions;
        $this->config['settings']['socialItem5Icon']['options'] = $socialIconOptions;
        $this->config['settings']['socialItem6Icon']['options'] = $socialIconOptions;
    }

    /**
     * @return array<string, string>
     */
    private function getPlatformIconOptions(): array
    {
        return [
            'fa-solid fa-desktop' => 'Desktop',
            'fa-solid fa-gamepad' => 'Gamepad',
            'fa-solid fa-computer' => 'Computer',
            'fa-solid fa-mobile-screen' => 'Mobile',
            'fa-solid fa-tv' => 'TV',
            'fa-solid fa-headset' => 'Headset',
            'fa-solid fa-rocket' => 'Rocket',
            'fa-solid fa-trophy' => 'Trophy',
            'fa-solid fa-shield-halved' => 'Shield',
            'fa-solid fa-joystick' => 'Joystick',
            'fa-brands fa-playstation' => 'PlayStation',
            'fa-brands fa-xbox' => 'Xbox',
            'fa-brands fa-steam' => 'Steam',
            'fa-brands fa-discord' => 'Discord',
            'fa-brands fa-twitch' => 'Twitch',
            'fa-brands fa-youtube' => 'YouTube',
            'fa-brands fa-windows' => 'Windows',
            'fa-brands fa-apple' => 'Apple',
            'fa-brands fa-linux' => 'Linux',
            'fa-brands fa-android' => 'Android',
        ];
    }

    /**
     * @return array<string, string>
     */
    private function getSocialIconOptions(): array
    {
        return [
            'fa-brands fa-facebook-f' => 'Facebook',
            'fa-brands fa-x-twitter' => 'X',
            'fa-brands fa-instagram' => 'Instagram',
            'fa-brands fa-youtube' => 'YouTube',
            'fa-brands fa-twitch' => 'Twitch',
            'fa-brands fa-discord' => 'Discord',
            'fa-brands fa-tiktok' => 'TikTok',
            'fa-brands fa-linkedin-in' => 'LinkedIn',
            'fa-brands fa-github' => 'GitHub',
            'fa-brands fa-steam' => 'Steam',
            'fa-brands fa-reddit-alien' => 'Reddit',
            'fa-solid fa-globe' => 'Website',
        ];
    }

    /**
     * @return array<string, string>
     */
    private function getVideoSourceOptions(): array
    {
        return [
            'youtube' => 'YouTube',
            'vimeo' => 'Vimeo',
            'mp4' => 'MP4 / Datei',
            'embed' => 'Embed URL',
        ];
    }

    /**
     * @return array<string, string>
     */
    private function getCardVisibilityOptions(): array
    {
        return [
            'home' => 'Nur Startseite',
            'all' => 'Überall',
        ];
    }
}
