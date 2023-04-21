<!doctype html>
<html dir="@if(config('ar7_media.locale') == 'fa') rtl @else ltr @endif" lang="{{ config('ar7_media.locale') }}">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>{{ __('ar7_media::global.words.media', [], config('ar7_media.locale')) }}</title>
	<link href="{{ asset(trim(config('ar7_media.url_prefix'), '/') . '/' . 'ar7/media/css/media.css') }}?ver={{ config('ar7_media.version') }}" rel="stylesheet" type="text/css"/>

	@if(config('ar7_media.locale') == 'fa')
		<link href="{{ asset(trim(config('ar7_media.url_prefix'), '/') . '/' . 'ar7/media/css/media-rtl.css') }}?ver={{ config('ar7_media.version') }}" rel="stylesheet" type="text/css"/>
	@endif
</head>
<body>

<div>
	<input type="hidden" name="path" value="">
	<input type="hidden" name="accept" value="{{ implode(',', array_values(config('ar7_media.mime_types'))) }}">
	<input type="file" name="files[]" multiple id="fileInput" accept="{{ implode(',', array_values(config('ar7_media.mime_types'))) }}" class="d-none">
</div>

<header class="mdc-top-app-bar app-bar" id="app-bar">
	<div class="mdc-top-app-bar__row">
		<section class="mdc-top-app-bar__section mdc-top-app-bar__section--align-start">
			<button class="media-action mdc-button mdc-button--raised mdc-theme--secondary-bg" disabled id="new_folder">
				<div class="mdc-button__ripple"></div>
				<i class="material-icons mdc-button__icon">create_new_folder</i>
				<span class="mdc-button__label text-capitalize">{{ __('ar7_media::global.words.new_folder', [], config('ar7_media.locale')) }}</span>
			</button>
			<button class="media-action mdc-button mdc-button--raised mdc-theme--secondary-bg d-none" disabled id="rename">
				<div class="mdc-button__ripple"></div>
				<i class="material-icons mdc-button__icon">format_italic</i>
				<span class="mdc-button__label text-capitalize">{{ __('ar7_media::global.words.rename', [], config('ar7_media.locale')) }}</span>
			</button>
			<button class="media-action mdc-button mdc-button--raised mdc-theme--secondary-bg" disabled id="delete">
				<div class="mdc-button__ripple"></div>
				<i class="material-icons mdc-button__icon">delete</i>
				<span class="mdc-button__label text-capitalize">{{ __('ar7_media::global.words.delete', [], config('ar7_media.locale')) }}</span>
			</button>
		</section>
		<section class="mdc-top-app-bar__section mdc-top-app-bar__section--align-end">
			<button class="media-action mdc-button mdc-button--raised mdc-theme--secondary-bg d-none" id="cancel-upload">
				<div class="mdc-button__ripple"></div>
				<i class="material-icons mdc-button__icon">clear</i>
				<span class="mdc-button__label text-capitalize">{{ __('ar7_media::global.words.cancel_upload', [], config('ar7_media.locale')) }}</span>
			</button>
			<button class="media-action mdc-button mdc-button--raised mdc-theme--secondary-bg" disabled id="upload">
				<div class="mdc-button__ripple"></div>
				<i class="material-icons mdc-button__icon">cloud_upload</i>
				<span class="mdc-button__label text-capitalize">{{ __('ar7_media::global.words.upload', [], config('ar7_media.locale')) }}</span>
			</button>
		</section>
	</div>
</header>

<aside class="mdc-drawer mdc-top-app-bar--fixed-adjust">
	<div class="mdc-drawer__content">
		<div class="mdc-card selected-item h-100">
			<div class="mdc-card__primary-action">
				<div class="mdc-card__media mdc-card__media--16-9 mt-3">
					<div class="no-item-selected">{{ __('ar7_media::global.sentences.no_item_selected', [], config('ar7_media.locale')) }}</div>
				</div>
				<div class="p-3 item-info d-none">
					<h2 class="mdc-typography mdc-typography--headline6 mdc-theme--on-primary item-name"></h2>
					<h3 class="mdc-typography mdc-typography--subtitle2 mdc-theme--on-primary item-type"></h3>
					<h3 class="mdc-typography mdc-typography--subtitle2 mdc-theme--on-primary item-size"></h3>
					<h3 class="mdc-typography mdc-typography--subtitle2 mdc-theme--on-primary item-visibility"></h3>
					<h3 class="mdc-typography mdc-typography--subtitle2 mdc-theme--on-primary item-last-modified"></h3>
				</div>
			</div>
		</div>
	</div>
</aside>

<div class="mdc-drawer-app-content mdc-top-app-bar--fixed-adjust">
	<main class="main-content" id="main-content">
		<nav>
			<ol class="breadcrumb mb-0 mdc-theme--secondary-bg">
				<li class="breadcrumb-item">
					<span class="mdc-theme--on-secondary">{{ config('ar7_media.upload_folder') }}</span>
				</li>
			</ol>
			<div class="data-loading d-none">
				<div class="lds-ring">
					<div></div>
					<div></div>
					<div></div>
					<div></div>
				</div>
			</div>
		</nav>
		<div class="media-explorer d-flex flex-row flex-wrap align-items-start justify-content-start h-auto pb-0"></div>
	</main>
</div>

<script src="{{ route('ar7_media_router') }}?ver={{ config('ar7_media.version') }}" type="text/javascript"></script>
<script src="{{ route('ar7_media_config') }}?ver={{ config('ar7_media.version') }}" type="text/javascript"></script>
<script src="{{ route('ar7_media_lang') }}?ver={{ config('ar7_media.version') }}" type="text/javascript"></script>
<script src="{{ asset(trim(config('ar7_media.url_prefix'), '/') . '/' . 'ar7/media/js/media.js') }}?ver={{ config('ar7_media.version') }}" type="text/javascript"></script>
</body>
</html>
