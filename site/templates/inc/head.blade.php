<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<meta property="og:site_name" content="{{ $site->title() }}" />
<meta property="og:description" content="{{ $site->description() }}" />
<meta property="og:title" content="{{ $site->title() }} | {{ $page->title() }}" />
<meta property="og:type" content="website" />
<meta property="og:url" content="{{ kirby()->request()->url() }}" />
<!-- <meta property="og:image" content="{{ $site->url() }}/assets/gfx/logo-social.png" />
<meta property="og:image:width" content="1200" />
<meta property="og:image:height" content="630" /> -->
<title>{{ $site->title()->html() }} | {{ $page->title()->html() }}</title>
<link rel="stylesheet" href="/assets/css/screen.css" media="all">
<link rel="stylesheet" href="/assets/css/print.css" media="print">
<link rel="manifest" href="/manifest.json">
<style>

</style>
