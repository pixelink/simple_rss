
plugin.tx_simplerss_rssfeed {
    view {
        # cat=plugin.tx_simplerss_rssfeed/file; type=string; label=Path to template root (FE)
        templateRootPath = EXT:simple_rss/Resources/Private/Templates/
        # cat=plugin.tx_simplerss_rssfeed/file; type=string; label=Path to template partials (FE)
        partialRootPath = EXT:simple_rss/Resources/Private/Partials/
        # cat=plugin.tx_simplerss_rssfeed/file; type=string; label=Path to template layouts (FE)
        layoutRootPath = EXT:simple_rss/Resources/Private/Layouts/
    }
    persistence {
        # cat=plugin.tx_simplerss_rssfeed//a; type=string; label=Default storage PID
        storagePid =
    }
}
