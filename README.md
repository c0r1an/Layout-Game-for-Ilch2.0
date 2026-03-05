# Game Layout for Ilch 2.0

Game is a dark esports layout for Ilch 2.0 with a configurable showcase slider, platform cards, dynamic content blocks and custom module box overrides.

## Features

- configurable branding (name, tagline, logo), colors and max content width
- configurable hero slider with up to 3 slides
- optional split-image slides (left + right media)
- configurable platform cards with icon picker, text and links
- configurable feature card row (up to 4 cards, visibility options)
- configurable social widget and footer icons
- configurable video widget (YouTube, Vimeo, MP4, Embed URL)
- custom frontend styles for article, forum, vote, gallery and user login boxes
- layout-specific module view overrides in `views/modules/...`

## Installation

1. Copy the `game` folder into `application/layouts/`.
2. Install or activate the layout in the Ilch admin area.
3. Open the layout settings in the admin area and configure the available options.

The ZIP export created by `export-layout.ps1` is built so that the top-level folder is exactly `game`.

## Menu Usage

- Menu 1 is used as the main navigation.
- Menu 2 is used as sidebar/widget boxes.

## Notes

- This layout contains module view overrides inside `views/modules/...`.
- Settings are grouped with separators in the advanced layout settings.

## Export

Run the PowerShell script below from inside the `game` folder to build a distributable ZIP:

```powershell
powershell -ExecutionPolicy Bypass -File .\export-layout.ps1
```

The archive is written to `dist/game-v<version>.zip`.

## License

This project is licensed under the MIT License. See `LICENSE`.
