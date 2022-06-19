# WordPress Theme Boilerplate

This project is a WordPress theme boilerplate to develop a new theme.

Everything is setup and optimize to start as soon as the theme is downloaded.

## Tech Stack

**Client:** WordPress, TailwindCSS, Alpinejs and Unpoly

**Server:** WordPress, React

## Installation

```bash
# Install packages
npm ci
```

## Run Locally

In the `wp-config.php`, you must add `define('WP_ENVIRONMENT_TYPE', 'development');` to be sur everything is working.

Dev build

```bash
# Build js
npm run dev:js

# Build css app
npm run dev:css-app

# Build css editor
npm run dev:css-editor

# Build blocks
npm run dev:blocks

# Build all
npm run dev
```

Watch build

```bach
# Watch js
npm run watch:js

# Watch css app
npm run watch:css-app

# Watch css editor
npm run watch:css-editor

# Watch blocks
npm run watch:blocks

# Watch all
npm run watch

# Watch and sync (use browser-sync to reload browser on save)
npm run watch-sync
```

## Deployment

To install dependencies, use `npm ci`.

Before deploying this projet, you must :

- build js and css
- build all custom blocks

```bash
# Build js
npm run production:js

# Build css app
npm run production:css-app

# Build css editor
npm run production:css-editor

# Build blocks
npm run production:blocks

# Build all
npm run production
```

## License

[MIT](https://choosealicense.com/licenses/mit/)

## Authors

- [@barbapapazes](https://www.github.com/barbapapazes)

and inspired by [TailPres](https://tailpres.io)
