## Exclude some cms pages from robots index

you can set in a cms page a switch if the page should have 
`<meta name="robots" content="NOINDEX,NOFOLLOW"/>`

## Installation

```
composer require frithjof/magento2-cms-noindex
bin/magento module:enable Frithjof_Cmsnoindex
bin/magento setup:upgrade
```

## License

[MIT](https://opensource.org/licenses/MIT)
