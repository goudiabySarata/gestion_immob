<!-- resources/views/components/dialog-close-button.blade.php -->

<div x-data="{ open: false }">
    <button @click="open = true" class="border border-gray-300 px-4 py-2 rounded-md">Share</button>

    <!-- Le dialogue -->
    <div x-show="open" @click.away="open = false" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50">
        <div class="bg-white p-4 rounded-md w-80">
            <h3 class="text-lg font-semibold mb-2">Share link</h3>
            <p class="text-sm mb-4">Anyone who has this link will be able to view this.</p>
            <div class="flex items-center space-x-2">
                <input type="text" value="https://example.com" readonly class="border border-gray-300 rounded-md flex-1 px-2 py-1">
                <button @click="copyToClipboard()" class="border border-blue-500 px-4 py-2 rounded-md text-blue-500">Copy</button>
            </div>
            <button @click="open = false" class="mt-4 px-4 py-2 rounded-md bg-gray-200 hover:bg-gray-300">Close</button>
        </div>
    </div>
</div>

<script>
    function copyToClipboard() {
        var copyText = document.querySelector('.copy-link');
        copyText.select();
        document.execCommand('copy');
    }
</script>
