<link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">
<script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>


<style>
.trix-button-group.trix-button-group--file-tools {
    display: none;
}

.trix-button-row {
    padding: 10px 16px;
}

.trix-button-group {
    border: 1px solid transparent!important;
    margin: 0px!important;
}

.trix-button {
    border: none!important;
    width: 16px!important;
    padding: 16px!important;
    margin: 0 8px!important;
}

.dark .trix-toolbar .trix-button.trix-active {
    color: white!important;
}
</style>

<div class="w-full border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-700 dark:border-gray-600">
    <input id="{{ $id }}" value="{{ $value }}" type="hidden" name="{{ $id }}">
    <trix-editor input="{{ $id }}" class="px-4 py-2 bg-white rounded-b-lg rounded-t-none dark:bg-gray-800 min-h-[50vh] border-b border-gray-300 dark:border-gray-600 text-gray-800 dark:text-white"></trix-editor>
</div>